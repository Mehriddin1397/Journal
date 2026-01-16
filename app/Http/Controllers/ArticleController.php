<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\JournalIssue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with(['authors', 'categories','journalIssue'])->latest()->get();
        $authors = Author::all();
        $categories = Category::all();
        $issues = JournalIssue::all();
        return view('admin.articles.index', compact('articles', 'authors', 'categories', 'issues'));
    }




    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'abstract' => 'required',//qisqa mazmun
            'pdf' => 'required|mimes:pdf',
            'authors' => 'required|array',
            'categories' => 'required|array',
            'journal_issue_id' => 'nullable|exists:journal_issues,id',
            'photo' => 'required|image|mimes:jpg,jpeg,png,webp|max:5048',
        ]);
        $photoPath = $request->file('photo')->store('journal_photos', 'public');
        $pdfPath = $request->file('pdf')->store('articles', 'public');

        $article = Article::create([
            'title' => $request->title,
            'abstract' => $request->abstract,
            'keywords' => $request->keywords,
            'pdf_path' => $pdfPath,
            'photo' => $photoPath,
            'journal_issue_id' => $request->journal_issue_id
        ]);

        $article->authors()->sync($request->authors);
        $article->categories()->sync($request->categories);

        return redirect()->route('articles.index');
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'abstract' => 'required',
            'pdf' => 'nullable|mimes:pdf',
            'authors' => 'required|array',
            'categories' => 'required|array',
            'journal_issue_id' => 'nullable|exists:journal_issues,id',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5048',
        ]);

        $data = [
            'title' => $request->title,
            'abstract' => $request->abstract,
            'keywords' => $request->keywords,
            'journal_issue_id' => $request->journal_issue_id
        ];

        // Agar yangi PDF yuklansa
        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('articles', 'public');
            $data['pdf_path'] = $pdfPath;
        }
        // Agar yangi rasm yuklansa
        if ($request->hasFile('photo')) {
            // eski rasmni o‘chiramiz
            Storage::disk('public')->delete($article->photo);

            $photoPath = $request->file('photo')->store('journal_photos', 'public');
            $data['photo'] = $photoPath;
        }

        $article->update($data);

        // Pivot table'larni yangilash
        $article->authors()->sync($request->authors);
        $article->categories()->sync($request->categories);

        return redirect()->route('articles.index')->with('success', 'Maqola yangilandi!');
    }


    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        // Pivot table'larni tozalash
        $article->authors()->detach();
        $article->categories()->detach();

        // PDF o‘chirish (ixtiyoriy, lekin tavsiya qilaman)
        if ($article->pdf_path && Storage::disk('public')->exists($article->pdf_path)) {
            Storage::disk('public')->delete($article->pdf_path);
        }
        if ($article->photo && Storage::disk('public')->exists($article->photo)) {
            Storage::disk('public')->delete($article->photo);
        }

        $article->delete();

        return back()->with('success', 'Maqola o‘chirildi!');
    }



    public function show($id)
    {
        $article = Article::with(['authors', 'categories'])->findOrFail($id);
        $article->increment('views');

        return view('articles.show', compact('article'));
    }
}

