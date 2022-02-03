<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookDetail;
use App\Models\Cart;
use App\Models\Detail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('rent.success', [
            'title' => 'readme'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required'
        ]);

        $transaction = Transaction::create([
            'user_id' => Auth::id(),
        ]);

        Detail::create([
            'transaction_id' => $transaction->id,
            'book_id' => $request->book_id,
            'transaction_type' => 0,
            'book_amount' => 1
        ]);

        $book = BookDetail::where('book_id', '=', $request->book_id)->first();

        BookDetail::where('book_id', '=', $request->book_id)
            ->update([
                'rent_stock' => $book->rent_stock - 1,
            ]);

        Cart::where([
            ['book_id', '=', $request->book_id],
            ['user_id', '=' , Auth::id()],
        ])->delete();

        return redirect('/rent/success');
    }

    public function show(Request $request)
    {
        $request->validate([
            'book_id' => 'required'
        ]);

        $book = Book::find($request->book_id);

        return view('rent.show', [
            'title' => sprintf("Rent %s - readme", $book->title),
            'book' => $book,
        ]);
    }
}
