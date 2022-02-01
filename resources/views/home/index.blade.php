@extends('layout.master')

@section('content')

    {{-- CHECK: https://freefrontend.com/bootstrap-product-cards/ --}}

    <div class="container">
        <h1>Home</h1>
        <h2>Books Available</h2>

        {{-- Book cards --}}
        <div class="row g-2">
            @foreach ($books as $book)
                <div class="col-4">
                    <div class="p-3 border bg-light card">
                        <a href="/book/{{ $book->id }}">
                            {{ $book->title }} <br>
                            {{ $book->author }} <br>
                            Rating: {{ number_format($book->rating, 1) }} <br>
                            {{ $book->count }} reviews
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Link --}}
        <div class="d-flex justify-content-end" style="padding-top: 1rem">
            {{ $books->links() }}
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
