<?php

namespace App\DTO;

class BookDTO
{
    public string $title;
    public int $publisherId;
    public array $authors;


    public function __construct(string $title, int $publisher_id, array $authors)
    {
        $this->title = $title;
        $this->publisherId = $publisher_id;
        $this->authors = $authors;
    }
}
