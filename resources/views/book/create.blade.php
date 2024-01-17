@extends('layout.admin')
@section('content')
    <form action="{{ route('books.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="book_title" class="form-label">Book title</label>
            <input type="text" class="form-control" id="book_title" name="title" value="{{ old('title') }}">
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="book_authors">Set authors</label>
            <select multiple class="form-control" id="book_authors" name="authors[]">
                @foreach($authors as $author)
                    <option
                        {{ in_array($author->id, old('authors') ?? []) ? 'selected' : '' }}
                        value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
            @error('authors')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="btn-group">
            <div><a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a></div>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
@endsection
