<?php

namespace App\Services\DTO;

use Illuminate\Http\Request;

class BookCreateDTO
{
    private string $title;
    private array $authors;

    public function __construct(string $title, array $authors) {
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

    public static function fromRequest(Request $request) : self {
        return new static(
            $request->get('title'),
            $request->get('authors')
        );
    }

}
