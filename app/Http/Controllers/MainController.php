<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;

class MainController extends Controller
{

    public function index(AuthorService $authorService) {
        $authors = $authorService->getListWithBooks();
        return view('main.index', compact('authors'));
    }

}
