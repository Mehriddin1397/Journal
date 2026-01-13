<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // Yangiliklar ro'yxati
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.news.index', compact('news'));
    }


    // Saqlash
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif'
        ]);

        $imagePath = null;
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('news', 'public');
        }

        News::create([
            'title' => $request->title,
            'text' => $request->text,
            'image' => $imagePath
        ]);

        return redirect()->route('news.index');
    }

    // Yangilikni ko'rish


    // Yangilikni tahrirlash formasi
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    // Yangilikni yangilash
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif'
        ]);

        $data = [
            'title' => $request->title,
            'text' => $request->text
        ];

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);

        return redirect()->route('news.index');
    }

    // Yangilikni o'chirish
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return back();
    }
}

