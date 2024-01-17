@extends('layout.admin')
@section('content')
    <div>
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add new</a>
    </div>

    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Book id</th>
                <th scope="col">Book title</th>
                <th scope="col">Authors</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $index=>$book)
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td><a href="{{ route('books.show', $book->id) }}">{{ $book->id }}</a></td>
                    <td><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></td>
                    <td><span>
                           @foreach($book->authors as $index => $author)
                                <a href="{{ route('authors.show', $author->id) }}"> {{ $author->name . ($index+1 === $book->authors->count() ? '' : ',' )}}</a>
                            @endforeach
                        </span></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
