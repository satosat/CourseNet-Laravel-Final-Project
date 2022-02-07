@extends('layout.master')

@section('content')

    <h1>{{ $book->title }}</h1>
    <h1>{{ $book->author }}</h1>

    <div style="display: flex;">
        <form action="/bookmark/store" method="POST" style="padding-right: 3rem">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <input type="submit" class="btn btn-primary" value="{{ $submitBtnText }}" id="submitBtn">
        </form>

        <form action="/cart/store" method="POST">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <input type="submit" class="btn btn-primary" value="{{ $cartBtnText }}" id="cartBtn">
        </form>
    </div>


    <h2 class="display-6">Reviews by readme users</h2>
    <ul>
        @foreach ($reviews as $review)
            <li class="row border-bottom p-3">
                "{{ $review->comment }}" <br>
                {{ $review->rating }}/10 <br>
                <small class="text-muted" style="padding-left: 0">
                    {{ $review->user->name }}, {{ date_format($review->created_at, "d F Y") }}
                </small>
            </li>
        @endforeach
    </ul>

    <h2 class="display-6">Leave A Review</h2>
    <form action="/review/store" method="POST">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea name="comment" id="comment" class="form-control">{{ old('comment') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Rating</label>
            <div style="display: flex; justify-content: space-around;" class="p-2">
                @for ($i = 1; $i < 11; $i++)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rating" id="inlineRadio{{ $i }}" value="{{ $i }}">
                        <label class="form-check-label" for="inlineRadio{{ $i }}">{{ $i }}</label>
                    </div>
                @endfor
            </div>
        </div>
        <input type="submit" class="btn btn-primary justify-content-end" value="Submit Review">
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Change submitBtn value when clicked
            submitBtn = document.getElementById('submitBtn')

            submitBtn.addEventListener('click', () => {
                if (submitBtn.value === 'Add to Bookmark') {
                    submitBtn.value = 'Remove from Bookmark'
                } else {
                    submitBtn.value = 'Add to Bookmark'
                }
            })

            // Change cartBtn value when clicked
            cartBtn = document.getElementById('cartBtn')

            cartBtn.addEventListener('click', () => {
                if (cartBtn.value === 'Add to Cart') {
                    cartBtn.value = 'Remove from Cart'
                } else {
                    cartBtn.value = 'Add to Cart'
                }
            })
        })
    </script>

@endsection
