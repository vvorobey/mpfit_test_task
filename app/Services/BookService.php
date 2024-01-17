<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Book;
use App\Services\DTO\BookCreateDTO;
use App\Services\DTO\BookUpdateDTO;
use Illuminate\Support\Facades\DB;

final class BookService
{

    public function getList() {
        return Book::with('authors')->get();
    }

    public function get(int $id) {
        return Book::findOrFail($id);
    }

    public function create(BookCreateDTO $dto) {
        DB::transaction(function () use ($dto) {
            $book = Book::create([
                'title' => $dto->getTitle()
            ]);
            $book->authors()->attach($dto->getAuthors());
            return $book->fresh();
        });
        return null;
    }

    public function update(BookUpdateDTO $dto) {
        $book = $this->get($dto->getId());
        DB::transaction(function () use ($book, $dto) {
            $book->update(['title' =>$dto->getTitle()]);
            $book->authors()->sync($dto->getAuthors());
            $book->refresh();
        });

        return $book;
    }

    public function delete(int $id) {
        $book = $this->get($id);
        DB::transaction(function () use ($book) {
            $book->authors()->detach();
            $book->delete();
        });
    }

}
