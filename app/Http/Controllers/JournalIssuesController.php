<?php

namespace App\Http\Controllers;

use App\Models\JournalIssue;
use App\Models\JournalIssues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JournalIssuesController extends Controller
{
    public function index()
    {
        $issues = JournalIssues::latest()->get();
        return view('admin.journalissues.index', compact('issues'));
    }

    public function create()
    {
        return view('admin.journalissues.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,webp|max:5048',
            'pdf_path' => 'required|mimes:pdf|max:50120',
        ]);


        $photoPath = $request->file('photo')->store('journal_photos', 'public');
        $pdfPath = $request->file('pdf_path')->store('journal_pdfs', 'public');

        JournalIssues::create([
            'title' => $request->title,
            'photo' => $photoPath,
            'pdf_path' => $pdfPath,
        ]);

        return redirect()->route('journal_issues.index')->with('success', 'Jurnal soni yuklandi!');
    }
    public function update(Request $request, $id)
    {
        $issue = JournalIssues::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5048',
            'pdf_path' => 'nullable|mimes:pdf|max:50120',
        ]);

        $data = [
            'title' => $request->title,
        ];

        // Agar yangi rasm yuklansa
        if ($request->hasFile('photo')) {
            // eski rasmni o‘chiramiz
            Storage::disk('public')->delete($issue->photo);

            $photoPath = $request->file('photo')->store('journal_photos', 'public');
            $data['photo'] = $photoPath;
        }

        // Agar yangi PDF yuklansa
        if ($request->hasFile('pdf_path')) {
            // eski pdfni o‘chiramiz
            Storage::disk('public')->delete($issue->pdf_path);

            $pdfPath = $request->file('pdf_path')->store('journal_pdfs', 'public');
            $data['pdf_path'] = $pdfPath;
        }

        $issue->update($data);

        return redirect()->route('journal_issues.index')
            ->with('success', 'Jurnal soni muvaffaqiyatli yangilandi!');
    }

    public function destroy($id)
    {
        $issue = JournalIssues::findOrFail($id);

        Storage::disk('public')->delete($issue->photo);
        Storage::disk('public')->delete($issue->pdf_path);

        $issue->delete();

        return back()->with('success', 'O‘chirildi');
    }
}

