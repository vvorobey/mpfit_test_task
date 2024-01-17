<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuthorBook extends Model
{
    use HasFactory;

    protected $table='author_books';
    protected $guarded=false;

}
