<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookDetail;
use App\Models\Cart;
use App\Models\Detail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyController extends Controller
{
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
            'transaction_type' => 1,
            'book_amount' => 1
        ]);

        $book = BookDetail::where('book_id', '=', $request->book_id)->first();

        // dd($book->book_id);

        BookDetail::where('book_id', '=', $request->book_id)
            ->update([
                'buy_stock' => $book->buy_stock - 1,
            ]);

        Cart::where([
            ['book_id', '=', $request->book_id],
            ['user_id', '=' , Auth::id()],
        ])->delete();

        return redirect('/buy/success');
    }

    public function show(Request $request)
    {
        $request->validate([
            'book_id' => 'required'
        ]);

        $book = Book::find($request->book_id);

        return view('buy.show', [
            'title' => sprintf("Buy %s - readme", $book->title),
            'book' => $book,
        ]);
    }
}
