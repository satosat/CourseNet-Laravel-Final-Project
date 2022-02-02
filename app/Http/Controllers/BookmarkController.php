<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookmarkController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Adds to user's bookmark
        $request->validate([
            'book_id' => 'required'
        ]);

        $row = Bookmark::where([
                    ['user_id', '=', Auth::id()],
                    ['book_id', '=', $request->book_id],
                ]);

        if(count($row->get()))
        {
            $row->delete();
        }
        else
        {
            Bookmark::create([
                'user_id' => Auth::id(),
                'book_id' => $request->book_id,
            ]);
        }

        return response()->noContent();
    }

    public function show()
    {
        // Show books in bookmark

        $bookmarks = Bookmark::where('user_id', Auth::id())->get();

        return view('bookmark.show', [
            'title' => 'Bookmark',
            'bookmarks' => $bookmarks,
        ]);
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
