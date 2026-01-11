<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JournalIssue;
use Illuminate\Http\Request;

class JournalIssueController extends Controller
{
    public function index()
    {
        $issues = JournalIssue::withCount('articles')->get();
        return view('journal_issues.index', compact('issues'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'year' => 'required|integer',
            'issue_number' => 'required|integer',
        ]);

        JournalIssue::create($request->all());

        return back();
    }

    public function show($id)
    {
        $issue = JournalIssue::with('articles.authors', 'articles.categories')->findOrFail($id);
        return view('journal_issues.show', compact('issue'));
    }
}

