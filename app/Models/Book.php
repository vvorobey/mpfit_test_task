<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='books';
    protected $fillable = ['title'];

    public function authors() {
        return $this->belongsToMany(Author::class, 'author_books', 'book_id', 'author_id');
    }

}
