<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\News;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::withCount('articles')->get();
        return view('admin.authors.index', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required'
        ]);

        Author::create([
            'full_name' => $request->full_name
        ]);

        return back();
    }
    public function update(Request $request, $id)
    {
        $news = Author::findOrFail($id);

        $request->validate([
            'full_name' => 'required',
        ]);

        $data = [
            'full_name' => $request->full_name,
        ];


        $news->update($data);

        return redirect()->route('authors.index');
    }

    public function destroy($id)
    {
        $news = Author::findOrFail($id);
        $news->delete();
        return back();
    }
}

