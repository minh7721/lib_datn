<?php

namespace App\DocumentProcess\TocBuilder;

use Spatie\LaravelData\Data;

class Part extends Data
{
    public function __construct(
        public string $heading,
        public ?string $prefix,
        public int $level,
        public ?int $start_page = 0,
        public ?int $end_page = 0,
        public ?Bookmark $start_position = null,
        public ?Bookmark $end_position = null,
        public ?array $important_sentences = [],
        public string $content = "",
    ){
    }

    public function getFullHeading() {
        return $this->prefix . ' ' . $this->heading;
    }

    public function getPageCount() {
        return $this->end_page - $this->start_page;
    }
}