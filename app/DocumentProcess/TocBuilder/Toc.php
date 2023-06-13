<?php

namespace App\DocumentProcess\TocBuilder;

class Toc
{
    private ?Part $value = null;

    public ?Toc $parent = null;

    /**
     * @var array<int, Toc>
     */
    private array $children = [];

    /**
     * @param mixed                     $value
     * @param array<int, Toc> $children
     */
    public function __construct(Part $value = null, array $children = [])
    {
        $this->setValue($value);

        if (!empty($children)) {
            $this->setChildren($children);
        }
    }

    public static function build(array $parts): static
    {
        $root = new self(null);
        $last_node = $root;
        foreach ($parts as $part) {
            $depth = $part->level;
            $node = new self($part);
            $last_depth = $last_node->getHeadingLevel();
            if ($depth > $last_depth) {
                $last_node->addChild($node);
            } else {
                if ($depth == $last_depth) {
                    $parent_node = $last_node->getParent();
                    $parent_node->addChild($node);
                } else {
                    $expect_parent = $last_node->parentUntil($depth);
                    $expect_parent->addChild($node);
                }
            }
            $last_node = $node;
        }
        return $root;
    }

    public function setValue(?Part $value): static
    {
        $this->value = $value;

        return $this;
    }

    public function getValue(): ?Part
    {
        return $this->value;
    }

    public function addChild(Toc $child): static
    {
        $child->setParent($this);
        $this->children[] = $child;

        return $this;
    }

    public function unshiftChild(Toc $child): static
    {
        $child->setParent($this);
        array_unshift($this->children, $child);

        return $this;
    }

    public function removeChild(Toc $child): static
    {
        foreach ($this->children as $key => $my_child) {
            if ($child === $my_child) {
                unset($this->children[$key]);
            }
        }

        $this->children = array_values($this->children);

        $child->setParent(null);

        return $this;
    }

    public function removeAllChildren(): static
    {
        $this->setChildren([]);

        return $this;
    }

    public function getChildren(): array
    {
        return $this->children;
    }

    public function setChildren(array $children): static
    {
        foreach ($this->getChildren() as $child) {
            $child->setParent(null);
        }

        $this->children = [];

        foreach ($children as $child) {
            $this->addChild($child);
        }

        return $this;
    }

    public function setParent(?Toc $parent = null): static
    {
        $this->parent = $parent;
        return $this;
    }

    public function getParent(): ?static
    {
        return $this->parent;
    }

    public function getAncestors(): array
    {
        $parents = [];
        $node = $this;
        while ($parent = $node->getParent()) {
            array_unshift($parents, $parent);
            $node = $parent;
        }

        return $parents;
    }

    public function getAncestorsAndSelf(): array
    {
        return array_merge($this->getAncestors(), [$this]);
    }

    public function getNeighbors(): array
    {
        $neighbors_and_self = $this->getNeighborsAndSelf();
        $current = $this;

        // Uses array_values to reset indexes after filter.
        return array_values(
            array_filter(
                $neighbors_and_self,
                function (Toc $item) use ($current) {
                    return $item !== $current;
                }
            )
        );
    }

    public function getNeighborsAndSelf(): array
    {
        return $this->getParent()->getChildren();
    }

    public function isLeaf(): bool
    {
        return count($this->children) === 0;
    }

    public function isRoot(): bool
    {
        return $this->getParent() === null;
    }

    public function isChild(): bool
    {
        return $this->getParent() !== null;
    }

    public function root(): static
    {
        $node = $this;

        while ($parent = $node->getParent())
            $node = $parent;

        return $node;
    }

    /**
     * Return the distance from the current node to the root.
     *
     * Warning, can be expensive, since each descendant is visited
     */
    public function getDepth(): int
    {
        if ($this->isRoot()) {
            return -1;
        }

        return $this->getParent()->getDepth() + 1;
    }

    /**
     * Return the height of the tree whose root is this node
     */
    public function getHeight(): int
    {
        if ($this->isLeaf()) {
            return 0;
        }

        $heights = [];

        foreach ($this->getChildren() as $child) {
            $heights[] = $child->getHeight();
        }

        return max($heights) + 1;
    }

    /**
     * Return the number of nodes in a tree
     *
     * @return int
     */
    public function getSize()
    {
        $size = 1;
        foreach ($this->getChildren() as $child) {
            $size += $child->getSize();
        }

        return $size;
    }

    public function getHeadingLevel(): int
    {
        $cur_heading = $this->getValue();

        if (!$cur_heading) return -1;

        return $cur_heading->level;
    }

    public function parentUntil($level): static
    {
        if ($this->isRoot()) return $this;

        if ($this->getHeadingLevel() < $level) return $this;

        return $this->getParent()->parentUntil($level);
    }

    /**
     * @return array
     */
    public function getArray()
    {
        if ($this->isRoot()) {

            $result = $this->getChildrenArray();

        } else {

            $value = $this->getValue();
            $arr_value = empty($value) ? [] : $value->toArray();

            $result = array_merge($arr_value, ['children' => $this->getChildrenArray()]);
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getChildrenArray()
    {
        $array = [];

        foreach ($this->children as $child) {

            $array[] = $child->getArray();
        }

        return $array;
    }

    public function updateEndPage(int $default_end_page = 0, Bookmark $default_end_position = null): static
    {
        if (empty($default_end_position)) {
            $default_end_position = Bookmark::from([
                'content' => null,
                'page' => $default_end_page,
                'position' => [],
            ]);
        }

        $nodes = $this->getChildren();
        for ($i = 0; $i < count($nodes); $i++) {
            if (!empty($nodes[$i+1])) {
                $end_position = $nodes[$i+1]->getValue()->start_position;
                if ($nodes[$i+1]->getValue()->start_page) {
                    $end_page = $nodes[$i+1]->getValue()->start_page;
                } elseif($nodes[$i+1]->getChildren() && $nodes[$i+1]->getChildren()[0]->getValue()->start_page) {
                    $end_page = $nodes[$i+1]->getChildren()[0]->getValue()->start_page;
                } else {
                    $end_page = $default_end_page;
                }
//                $end_page = $nodes[$i+1]->getValue()->start_page ?: $default_end_page;
            } else {
                $end_position = $default_end_position;
                $end_page = $default_end_page;
            }

            $nodes[$i]->getValue()->end_position = $end_position;
            $nodes[$i]->getValue()->end_page = $end_page;

            if (!empty($nodes[$i]->getChildren())) {
                $nodes[$i]->updateEndPage($end_page, $end_position);
            }
        }

        return $this;
    }

    public function dump(): void
    {
        if (!$this->isRoot()) {
            $value = $this->value;
            $x = '';
            foreach (range(1, $value->level) as $i) {
                $x .= " ";
            }
            dump("$x [$value->prefix] [$value->heading] [$value->start_page] [$value->end_page]");
        }

        foreach ($this->getChildren() as $child) {
            $child->dump();
        }
    }
}