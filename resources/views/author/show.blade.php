@extends('layout.admin')
@section('content')
    @foreach($author->getAttributes() as $key=>$value)
        <div>{{ $key }} : {{ $value }}</div>
    @endforeach
    <div class="btn-group">
        <div>
            <a href="{{ route('authors.index') }}" class="btn btn-secondary">Back</a>
        </div>
        <div>
            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-secondary">Edit</a>
        </div>
        <div>
            <form action="{{ route('authors.destroy', $author->id) }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Delete" class="btn btn-secondary">
            </form>
        </div>
    </div>
@endsection
