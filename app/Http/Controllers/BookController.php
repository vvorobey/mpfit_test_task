<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Services\AuthorService;
use App\Services\BookService;
use App\Services\DTO\BookCreateDTO;
use App\Services\DTO\BookUpdateDTO;

class BookController extends Controller
{
    protected BookService $service;

    public function __construct(BookService $service) {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->service->getList();
        return view('book.list', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AuthorService $service)
    {
        $authors = $service->getList();
        return view('book.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $dto = BookCreateDTO::fromRequest($request);
        $this->service->create($dto);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $book = $this->service->get($id);
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $book = $this->service->get($id);
        $authors = (new AuthorService)->getList();
        return view('book.edit', compact('book', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, int $id)
    {
        $dto = BookUpdateDTO::fromRequest($id, $request);
        $this->service->update($dto);
        return redirect()->route('books.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);
        return redirect()->route('books.index');
    }
}
