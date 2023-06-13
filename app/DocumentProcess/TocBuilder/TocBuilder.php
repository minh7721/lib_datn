<?php

namespace App\DocumentProcess\TocBuilder;

use App\DocumentProcess\Utilities\HeadingHelper;
use App\DocumentProcess\Utilities\LineHelper;
use App\Enum\DetectPartsType;
use App\Libs\StringUtils;
use ThikDev\PdfParser\Objects\Document;
use ThikDev\PdfParser\Objects\Line;
use ThikDev\PdfParser\Objects\Page;

class TocBuilder
{
    /** @var Page[] $tableOfContentPages */
    protected array $tableOfContentPages = [];

    protected Toc $toc;

    protected int $type_detect = DetectPartsType::UNKNOWN;

    public function __construct(
        protected Document $document
    )
    {
        foreach ($document->getPages() as $index => $page) {
            if ($page->is_table_content) {
                $this->tableOfContentPages[] = $page;
            }
        }
    }

    public function getToc(): Toc
    {
        return $this->toc;
    }

    public function getTypeDetect(): int
    {
        return $this->type_detect;
    }

    public function getTableOfContentPages(): array
    {
        return $this->tableOfContentPages;
    }

    public function detectToc() {
        $toc = [];
        if (!empty($this->tableOfContentPages)) {
            $this->type_detect = DetectPartsType::HAS_TOC;
            $toc = $this->detectTocFromTableOfContentPages();
        }
        if(!$this->validateTocItems($toc)) {
            $this->type_detect = DetectPartsType::NO_TOC;
            $toc = $this->detectTocFromContent();
        }

        $toc = $this->uniqueTocItems($toc);
        $toc = Toc::build($toc)->updateEndPage($this->document->pageCount());
        $this->toc = $toc;
    }

    protected function detectTocFromOutlines() {
        //
    }

    protected function detectTocFromTableOfContentPages() {
        $toc = [];

        /** @var Page $page */
        foreach ($this->tableOfContentPages as $page) {
            /** @var Line $line */
            foreach ($page->getMainLines() as $line) {
                if (!$line->in_toc || $line->merge_up) continue;
                if ($result = HeadingHelper::findHeadingType($line->text)) {
                    $toc[] = Part::from($result + [
                        'start_position' => [
                            'content' => null,
                            'page' => 0,
                        ]
                    ]);
                }
            }
        }

        /** Tìm Heading đang ở trang nào? */
        /**
         * @var int $key
         * @var Page $page
         */
        foreach ($this->document->getPages() as $key => $page) {
            if ($page->is_table_content) continue;

            $lines = $page->getMainLines();
            /** @var Line $line */
            foreach ($lines as $i => $line) {
                if ($line->merge_up
                    && !preg_match("/^[\p{N}\s]*(BAB|CHƯƠNG|CHƢƠNG)\s/", $line->text)
                    && HeadingHelper::findHeadingType($line->text) === null) continue;

                if (HeadingHelper::hasIgnoreText($line->text)) continue;

                //@todo: what? why not use $line->is_toc?
                if (preg_match("/(\.\s*|\-\s*|\s\s|…\s*|·\s*)\g{1}+\W*[\p{N}IVXⅠⅡⅢⅣⅤⅥⅦⅧⅨⅩ]*\W*$/ui", $line->text)) continue;

                $line_text_normalize = str_replace(' ', '', StringUtils::normalize($line->text));
                $max_length = mb_strlen($line_text_normalize);

                foreach ($toc as $part) {
                    if (($part->level == 2 || $part->level == 3)
                        && !(LineHelper::getHeadingLevel($line) > 0 || LineHelper::isUpperText($line) || LineHelper::isBold($line))) {
                        continue;
                    }

                    $max_length = max($max_length, mb_strlen(str_replace(' ', '', StringUtils::normalize($part->prefix))), 5);
                    $start_string = mb_substr(str_replace(' ', '', StringUtils::normalize($part->getFullHeading())), 0, $max_length);

                    if ($part->start_page == 0 && preg_match("/$start_string/u", $line_text_normalize)) {
                        //@ nếu next line có trạng thái merge_up
                        if (!empty($lines[$i+1]) && $lines[$i+1]->merge_up) {
                            foreach ($lines[$i+1]->components as $text) {
                                $line->appendText($text);
                            }
                            $start_position_content = $lines[$i+1]->text;
                        } else {
                            $start_position_content = $line->text;
                        }
                        //@ end
                        $part->start_page = $key + 1;
                        $part->start_position = Bookmark::from([
                            'content' => empty($start_position_content) ? $line->text : $start_position_content,
                            'page' => $key + 1,
                            'position' => [
                                'x_top' => $line->left, //left
                                'x_bottom' => $line->left + $line->width, //right
                                'y_top' => $line->top, //top
                                'y_bottom' => $line->top + $line->height, //bottom
                            ],
                        ]);

                        break;
                    }
                }
            }
        }

        return $toc;
    }

    protected function detectTocFromContent() {
        $parts = [];
        /** @var Page $page */
        foreach ($this->document->getPages() as $key => $page) {
            if ($key < 10 || $page->is_table_content) continue;

            $lines = $page->getMainLines();
            /** @var Line $line */
            foreach ($lines as $i => $line) {
                if ($line->in_toc || $line->is_noise || $line->merge_up) continue;
                if (HeadingHelper::hasIgnoreText($line->text)) continue;
                if (preg_match("/(\.\s*|\-\s*|\s\s|…\s*|·\s*)\g{1}{1,}\W*[\p{N}IVXⅠⅡⅢⅣⅤⅥⅦⅧⅨⅩ]*\W*$/ui", $line->text)) continue;

                $heading_level = LineHelper::getHeadingLevel($line);
                if ($heading_level < 0) continue;
                if (LineHelper::isUpperText($line) || LineHelper::isBold($line) || $heading_level > 0) {
                    if ($result = HeadingHelper::findHeadingType($line->text)) {
                        ['prefix' => $prefix, 'level' => $level] = $result;
                    } elseif ($heading_level > 0 && (LineHelper::isUpperText($line) || LineHelper::isBold($line))) {
                        $level = HeadingHelper::HEADING_H2_UPPER_TYPE;
                        $prefix = '';
                    } else {
                        continue;
                    }
                } else {
                    continue;
                }

                //@ nếu next line có trạng thái merge_up
                if (!empty($lines[$i+1]) && $lines[$i+1]->merge_up) {
                    foreach ($lines[$i+1]->components as $text) {
                        $line->appendText($text);
                    }
                    $start_position_content = $lines[$i+1]->text;
                } else {
                    $start_position_content = $line->text;
                }
                //@ end

                $content = HeadingHelper::standardizedHeading($line->text, $prefix);
                if (!HeadingHelper::validateHeading($content)) {
                    continue;
                }

                $parts[] = Part::from([
                    'heading' => $content,
                    'prefix' => $prefix,
                    'level' => $level,
                    'start_page' => $key + 1,
                    'start_position' => [
                        'content' => empty($start_position_content) ? $line->text : $start_position_content,
                        'page' => $key + 1,
                        'position' => [
                            'x_top' => $line->left, //left
                            'x_bottom' => $line->left + $line->width, //right
                            'y_top' => $line->top, //top
                            'y_bottom' => $line->top + $line->height, //bottom
                        ],
                    ],
                ]);
            }
        }

        return $parts;
    }

    /**
     * @param Part[]|null $parts
     * @return bool
     */
    protected function validateTocItems(?array $parts): bool {
        if (empty($parts)) return false;
        $good_parts = 0;
        foreach ($parts as $part) {
            if ($part->start_page) {
                $good_parts++;
            }
        }
        return $good_parts >= 3 && (round($good_parts/count($parts), 2) > 0.6);
    }

    protected function uniqueTocItems(array $parts) {
        $unique_parts = [];
        return array_filter($parts, function (Part $part) use (&$unique_parts) {
            if (in_array($part->getFullHeading(), $unique_parts)) {
                return false;
            } else {
                $unique_parts[] = $part->getFullHeading();
                return true;
            }
        });
    }
}
