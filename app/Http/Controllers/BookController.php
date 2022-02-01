<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        if(request('search')) {
            $books = Book::title()->paginate(15);

            return view('home.index', [
                'title' => 'Books - readme',
                'books' => $books,
            ]);
        }
        else {
            return redirect('/home');
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $book = Book::find($id);

        $reviews = Review::where('book_id', '=', $id)->get();

        return view('book.show', [
            'title' => sprintf('%s - readme', $book->title),
            'book' => $book,
            'reviews' => $reviews,
        ]);
    }

    public function search()
    {
        dd(request('search'));
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
