<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Author;
use App\Services\DTO\AuthorCreateDTO;
use App\Services\DTO\AuthorUpdateDTO;
use Illuminate\Support\Facades\DB;

final class AuthorService
{

    public function getList() {
        return Author::all();
    }

    public function getListWithBooks() {
        return Author::with('books')->get();
    }

    public function get(int $id) {
        return Author::findOrFail($id);
    }

    public function create(AuthorCreateDTO $dto) {
        $author = Author::create([
            'name' => $dto->getName()
        ]);
        return $author->fresh();
    }

    public function update(AuthorUpdateDTO $dto) {
        $author = $this->get($dto->getId());
        $author->update([
            'name' => $dto->getName()
        ]);
        return $author->fresh();
    }

    public function delete(int $id) {
        $author = $this->get($id);
        DB::transaction(function () use ($author) {
            $author->books()->detach();
            $author->delete();
        });
    }

}
