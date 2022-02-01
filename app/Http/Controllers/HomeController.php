<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $books = DB::table('books')
                    ->join('reviews', 'books.id', '=', 'reviews.book_id')
                    ->selectRaw('id, title, author, AVG(rating) AS rating, COUNT(*) AS count')
                    ->groupBy('book_id')
                    ->paginate(15);

        return view('home.index', [
            'title' => 'Home',
            'books' => $books,
        ]);
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
        //
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
