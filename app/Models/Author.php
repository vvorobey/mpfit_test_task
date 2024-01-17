<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='authors';
    protected $fillable = ['name'];


    public function books() {
        return $this->belongsToMany(Book::class, 'author_books', 'author_id', 'book_id');
    }
}
