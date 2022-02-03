<?php

namespace App\Http\Controllers;

use App\Models\BookUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookUserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $histories = BookUser::where('user_id', Auth::id())->get();

        dd($histories);

        return view('history.index', [
            'title' => 'History',
            'histories' => $histories,
        ]);
    }
}
