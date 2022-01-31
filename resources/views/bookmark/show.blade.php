@extends('layout.master')

@section('content')

    <div class="container">
        <h1>My Bookmarks</h1>
        <div class="row g-2">
            @foreach ($bookmarks as $bookmark)
                <div class="col-3">
                    <div class="p-3 border bg-light">{{ $bookmark->book->title }}</div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
