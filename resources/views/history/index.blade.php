@extends('layout.master')

@section('content')

    <h2 class="display-6 text-center">Rent History</h2>

    @if(!count($user->books))
        <h2 class="display-6 text-center">You have no rent history yet</h2>
    @else
        @foreach ($user->books as $book)
            <div class="row g-2 d-flex justify-content-center">
                <div class="col-6 p-2">
                    <div class="p-3 border bg-light card">
                        <a href="/book/{{ $book->id }}">
                            {{ $book->title }} <br>
                            {{ $book->author }} <br>
                        </a>
                        Rented date: {{ date('d F Y', strtotime($book->pivot->rent_date)) }} <br>
                        Return date: {{ date('d F Y', strtotime($book->pivot->return_date)) }} <br>
                        {{-- Return date: {{ date_format($book->pivot->return_date, "d F Y") }} <br> --}}
                    </div>
                </div>
            </div>
        @endforeach
    @endif

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
