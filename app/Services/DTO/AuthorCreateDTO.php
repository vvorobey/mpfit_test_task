<?php

namespace App\Services\DTO;

use Illuminate\Http\Request;

class AuthorCreateDTO
{
    private string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public static function fromRequest(Request $request) : self {
        return new static(
            $request->get('name'),
        );
    }

}
