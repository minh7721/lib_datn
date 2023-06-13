<?php

namespace App\DocumentProcess\TocBuilder;

use Spatie\LaravelData\Data;

class Bookmark extends Data
{
    public function __construct(
        public ?string $content,
        public int $page,
        public array $position = [] //x_top, x_bottom, y_top, y_bottom
    ) {
    }
}
