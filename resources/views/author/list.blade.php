@extends('layout.admin')
@section('content')
    <div>
        <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3">Add new</a>
    </div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Author id</th>
                <th scope="col">Author name</th>
                <th scope="col">Books on site</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $index=>$author)
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td><a href="{{ route('authors.show', $author->id) }}">{{ $author->id }}</td>
                    <td><a href="{{ route('authors.show', $author->id) }}">{{ $author->name }}</td>
                    <td>{{ $author->books ? $author->books->count() : 0 }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
