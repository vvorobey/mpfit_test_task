@extends('layout.main')
@section('content')
    <div>
        <ul>
            @foreach($authors as $index=>$author)
                <li class="mt-5">{{ $author->name }}</li>
                @if($author->books)
                    <ul>
                        @foreach($author->books as $index=>$book)
                            <li>{{ $book->title }}</li>
                        @endforeach
                    </ul>
                @endif
            @endforeach
        </ul>
    </div>

@endsection

