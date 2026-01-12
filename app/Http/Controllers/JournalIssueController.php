<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\JournalIssue;
use Illuminate\Http\Request;

class JournalIssueController extends Controller
{
    public function index()
    {
        $issues = JournalIssue::withCount('articles')->get();
        return view('admin.jurnalissues.index', compact('issues'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',

        ]);

        JournalIssue::create($request->all());

        return back();
    }

    public function show($id)
    {
        $issue = JournalIssue::with('articles.authors', 'articles.categories')->findOrFail($id);
        return view('journal_issues.show', compact('issue'));
    }

    public function update(Request $request, $id)
    {
        $news = JournalIssue::findOrFail($id);

        $request->validate([
            'title' => 'required',
        ]);

        $data = [
            'title' => $request->title,
        ];


        $news->update($data);

        return redirect()->route('jurnalissues.index');
    }

    public function destroy($id)
    {
        $news = JournalIssue::findOrFail($id);
        $news->delete();
        return back();
    }
}

