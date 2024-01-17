@extends('layout.admin')
@section('content')
    <form action="{{ route('authors.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="author_name" class="form-label">Author name</label>
            <input type="text" class="form-control" id="author_name" name="name" value="{{ old('name') }}">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="btn-group">
            <div><a href="{{ route('authors.index') }}" class="btn btn-secondary">Back</a></div>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
@endsection
