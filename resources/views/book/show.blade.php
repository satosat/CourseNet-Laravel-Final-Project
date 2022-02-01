@extends('layout.master')

@section('content')

    <h1>{{ $book->title }}</h1>
    <h1>{{ $book->author }}</h1>

    <h2 class="display-6">Reviews by readme users</h2>

    <form action="/bookmark" method="POST">
        <button type="submit" class="btn btn-light">Add to Bookmark</button>
    </form>

    <ul>
        @foreach ($reviews as $review)
            <li class="row border-bottom p-3">
                "{{ $review->comment }}" <br>
                <small class="text-muted">
                    {{ $review->user->name }}, {{ date_format($review->created_at, "d-m-Y") }}
                </small>
            </li>
        @endforeach
    </ul>

@endsection
