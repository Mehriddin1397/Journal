<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('articles')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        return back();
    }
    public function update(Request $request, $id)
    {
        $news = Category::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
        ];


        $news->update($data);

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $news = Category::findOrFail($id);
        $news->delete();
        return back();
    }
}

