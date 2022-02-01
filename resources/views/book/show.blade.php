@extends('layout.master')

@section('content')

    <h1>{{ $book->title }}</h1>
    <h1>{{ $book->author }}</h1>


    <form action="/bookmark/store" method="POST">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <input type="submit" class="btn btn-primary" value="{{ $text }}" id="submitBtn">
    </form>

    <h2 class="display-6">Reviews by readme users</h2>
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

    <script>
        // Change submitBtn value when clicked
        document.addEventListener('DOMContentLoaded', () => {
            submitBtn = document.getElementById('submitBtn')
            submitBtn.addEventListener('click', () => {
                console.log('clicked')
                if(submitBtn.value == 'Add to Bookmark') {
                    submitBtn.value = 'Remove from Bookmark'
                } else {
                    submitBtn.value = 'Add to Bookmark'
                }
            })
        })
    </script>

@endsection
