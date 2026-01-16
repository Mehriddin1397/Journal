<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Article;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        if (!$query) {
            return back();
        }

        $articles = Article::with(['authors', 'journalIssue'])
            ->where('title', 'LIKE', "%{$query}%")

            // Author nomi bo‘yicha
            ->orWhereHas('authors', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })

            // JournalIssue title bo‘yicha
            ->orWhereHas('journalIssue', function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%");
            })

            ->latest()
            ->get();
        $categories = Category::all();

        return view('pages.search', compact('articles', 'query', 'categories'));
    }
}

