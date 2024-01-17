@extends('layout.admin')
@section('content')
    @foreach($book->getAttributes() as $key=>$value)
        <div>{{ $key }} : {{ $value }}</div>
    @endforeach
    <div class="btn-group">
        <div>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
        </div>
        <div>
            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-secondary">Edit</a>
        </div>
        <div>
            <form action="{{ route('books.destroy', $book->id) }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Delete" class="btn btn-secondary">
            </form>
        </div>
    </div>
@endsection
