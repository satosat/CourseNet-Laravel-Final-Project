<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $carts = Cart::where('user_id', '=', Auth::id())->get();

        return view('cart.index', [
            'title' => 'cart - readme',
            'carts' => $carts,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required'
        ]);

        $row = Cart::where([
            'user_id' => Auth::id(),
            'book_id' => $request->book_id,
        ]);

        if(count($row->get()))
        {
            $row->delete();
        }
        else
        {
            Cart::create([
                'user_id' => Auth::id(),
                'book_id' => $request->book_id,
            ]);
        }

        return response()->noContent();
    }
}
