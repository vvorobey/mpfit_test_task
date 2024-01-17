<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Http\Controllers\Controller;
use App\Services\BookService;
use App\Services\DTO\BookUpdateDTO;
use Illuminate\Http\Response;

class BookController extends Controller
{
    protected $service;

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
        return BookResource::collection($this->service->getList());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return new BookResource($this->service->get($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, int $id)
    {
        $dto = BookUpdateDTO::fromRequest($id, $request);
        $book = $this->service->update($dto);

        return new BookResource($book);
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
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
