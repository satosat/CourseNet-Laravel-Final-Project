@extends('layout.master')

@section('content')

    @if (!count($carts))
        <div class="row text-center">
            <h2 class="display-6">You don't have anything on your cart yet</h2>
        </div>
    @endif

    @foreach ($carts as $cart)
        <div class="row g-2 d-flex justify-content-center">
            <div class="col-6 p-2">
                <div class="p-3 border bg-light card">
                    <a href="/book/{{ $cart->book_id }}">
                        {{ $cart->book->title }} <br>
                        {{ $cart->book->author }}
                    </a>
                </div>
                <div class="d-flex justify-content-evenly">
                    @if ($cart->book->bookdetails->rent_stock)
                        <button class="btn btn-primary" id="rentBtn">Rent Book</button>
                    @else
                        <button class="btn btn-primary" disabled>Rent stock not available</button>
                    @endif
                    @if ($cart->book->bookdetails->buy_stock)
                        <button class="btn btn-success" id="buyBtn">Buy Book</button>
                    @else
                        <button class="btn btn-success" disabled>Buy stock not available</button>
                    @endif
                </div>
            </div>
        </div>
    @endforeach

    <form action="/rent/show" id="rentForm" method="POST">
        @csrf
        <input type="hidden" name="book_id" value="{{ $cart->book->id }}">
    </form>

    <form action="/buy/show" id="buyForm" method="POST">
        @csrf
        <input type="hidden" name="book_id" value="{{ $cart->book->id }}">
    </form>

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

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const rentBtn = document.getElementById('rentBtn')
            const buyBtn = document.getElementById('buyBtn')

            const rentForm = document.getElementById('rentForm')
            const buyForm = document.getElementById('buyForm')

            // Submit rent form on click
            rentBtn.addEventListener('click', () => {
                console.log('click')
                rentForm.submit()
            })

            // Submit buy form on click
            buyBtn.addEventListener('click', () => {
                buyForm.submit
            })
        })
    </script>

@endsection
