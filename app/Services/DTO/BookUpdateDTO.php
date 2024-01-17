<?php

namespace App\Services\DTO;

use Illuminate\Http\Request;

class BookUpdateDTO
{
    private string $title;
    private array $authors;
    private int $id;

    public function __construct(int $id, string $title, array $authors) {
        $this->id = $id;
        $this->title = $title;
        $this->authors = $authors;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return array
     */
    public function getAuthors(): array
    {
        return $this->authors;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public static function fromRequest(int $id, Request $request) : self {
        return new static(
            $id,
            $request->get('title', ''),
            $request->get('authors', [])
        );
    }

}
