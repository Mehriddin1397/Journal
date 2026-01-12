<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ArticleRequest;
use Illuminate\Http\Request;

class ArticleRequestController extends Controller
{
    // Admin uchun ro'yxat
    public function index()
    {
        $requests = ArticleRequest::latest()->get();
        return view('admin.article_requests.index', compact('requests'));
    }

    // Forma yuborish
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'tel_number' => 'required',
            'pdf_path' => 'required|mimes:pdf,doc,docx|max:3024',
            'message' => 'nullable',
        ]);


        $pdfPath = $request->file('pdf_path')->store('articles', 'public');

        ArticleRequest::create([
            'full_name' => $request->full_name,
            'tel_number' => $request->tel_number,
            'message' => $request->message,
            'pdf_path' => $pdfPath,
        ]);

        return back()->with('success', 'So‘rovingiz muvaffaqiyatli yuborildi! Tez orada siz bilan bog‘lanamiz.');

    }

    // Bitta so‘rovni ko‘rish
    public function show($id)
    {
        $requestData = ArticleRequest::findOrFail($id);
        return view('article_requests.show', compact('requestData'));
    }

    // O‘chirish
    public function destroy($id)
    {
        $requestData = ArticleRequest::findOrFail($id);
        $requestData->delete();
        return back();
    }

    public function markAsRead($id)
    {
        $requestData = ArticleRequest::findOrFail($id);
        $requestData->update(['is_read' => true]);

        return redirect()->back();
    }

}

