<?php

namespace App\Http\Controllers;

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

        return response()->noContent();
    }

    public function show(Request $request)
    {

    }
}
