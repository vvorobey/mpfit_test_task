@extends('layout.admin')
@section('content')
    <form action="{{ route('books.update', $book->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="book_name" class="form-label">Book title</label>
            <input type="text" class="form-control" id="book_name" name="title" value="{{ $book->title }}">
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="book_authors">Set authors</label>
            <select multiple class="form-control" id="book_authors" name="authors[]">
                @foreach($authors as $author)
                    <option
                        @foreach($book->authors as $bookAuthor)
                        {{ $author->id === $bookAuthor->id ? 'selected' : '' }}
                        @endforeach
                        value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
            @error('authors')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="btn-group">
            <div><a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a></div>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
