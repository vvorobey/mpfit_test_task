<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_books', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('book_id');

            $table->index('author_id', 'author_book_author_idx');
            $table->index('book_id', 'author_book_book_idx');

            $table->foreign('author_id', 'author_book_author_fk')->on('authors')->references('id');
            $table->foreign('book_id', 'author_book_book_fk')->on('books')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('author_books');
    }
}
