<?php

namespace App\Services\DTO;

use Illuminate\Http\Request;

class AuthorUpdateDTO
{
    private int $id;

    private string $name;

    public function __construct(int $id, string $name) {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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
            $request->get('name'),
        );
    }

}
