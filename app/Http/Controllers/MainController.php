<?php

namespace App\Http\Controllers;

use App\Models\Author;

class MainController extends Controller
{

    public function index() {
        $authors = Author::with('books')->get();
        return view('main.index', compact('authors'));
    }

}
