@extends('layout.master')

@section('content')

    <div class="container">
        <h1>My Bookmarks</h1>
        <div class="row g-2">
            @foreach ($bookmarks as $bookmark)
                <div class="col-3">
                    <div class="p-3 border bg-light card">
                        <a href="/book/{{ $bookmark->book_id }}">
                            {{ $bookmark->book->title }} <br>
                            {{ $bookmark->book->author }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .card {
            display: flex;
            height: 100px;
            justify-content: space-around;
            align-items: center;
            text-align: center;
        }

        .card a {
            text-decoration: none;
            color: black;
        }

        .card a:hover {
            text-decoration: underline;
        }
    </style>

@endsection
