@extends('layout.master')

@section('content')

    <div class="row g-2 d-flex justify-content-center">
        <div class="col-6 p-2">
            <div class="p-3 border bg-light card">
                <a href="/book/{{ $book->id }}">
                    {{ $book->title }} <br>
                    {{ $book->author }} <br>
                </a>
            </div>
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
