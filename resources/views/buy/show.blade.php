@extends('layout.master')

@section('content')

    <div class="row g-2 d-flex justify-content-center">
        <div class="col-6 p-2">
            <div class="p-3 border bg-light card">
                <a href="/book/{{ $book->id }}">
                    {{ $book->title }} <br>
                    {{ $book->author }} <br>
                </a>
                Length: {{ $book->bookdetails->page_length }} <br>
                Buy Price: Rp.{{ number_format($book->bookdetails->buy_price) }} <br>
            </div>
            <div class="d-flex justify-content-evenly">
                <form action="/cart" method="GET">
                    <button class="btn btn-danger">Cancel</button>
                </form>
                <form action="/buy/store" method="POST">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    @if ($book->bookdetails->buy_stock)
                        <button type="submit" class="btn btn-success">Buy Book</button>
                    @else
                        <button type="submit" class="btn btn-success" disabled>Buy stock not available</button>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <style>
        .card {
            display: flex;
            height: max-content;
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
