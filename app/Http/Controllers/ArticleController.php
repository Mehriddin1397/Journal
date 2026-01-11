<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\JournalIssue;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with(['authors', 'categories'])->latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        $issues = JournalIssue::all();

        return view('articles.create', compact('authors', 'categories', 'issues'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'abstract' => 'required',
            'pdf' => 'required|mimes:pdf',
            'authors' => 'required|array',
            'categories' => 'required|array',
            'journal_issue_id' => 'nullable|exists:journal_issues,id'
        ]);

        $pdfPath = $request->file('pdf')->store('articles', 'public');

        $article = Article::create([
            'title' => $request->title,
            'abstract' => $request->abstract,
            'keywords' => $request->keywords,
            'pdf_path' => $pdfPath,
            'journal_issue_id' => $request->journal_issue_id
        ]);

        $article->authors()->sync($request->authors);
        $article->categories()->sync($request->categories);

        return redirect()->route('articles.index');
    }


    public function show($id)
    {
        $article = Article::with(['authors', 'categories'])->findOrFail($id);
        $article->increment('views');

        return view('articles.show', compact('article'));
    }
}

