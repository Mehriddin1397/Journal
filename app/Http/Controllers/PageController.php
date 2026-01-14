<?php

namespace App\Http\Controllers;

use App\Models\Academia;
use App\Models\Articles;
use App\Models\Author;
use App\Models\Bibliophilia;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Crimes;
use App\Models\Expertise;
use App\Models\Institut;
use App\Models\Journal;
use App\Models\JournalIssue;
use App\Models\JournalIssues;
use App\Models\News;
use App\Models\Partner;
use App\Models\Rahbariyat;
use App\Models\Research;
use App\Models\Scholars;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function main()
    {
        $one_new = News::latest()->first();

        $one_journal = JournalIssues::latest()->first();

        $news = News::latest()->skip(1)->take(4)->get();
        return view('pages.main', compact('one_new', 'news', 'one_journal'));

    }

    public function contact()
    {
        return view('pages.contact');
    }
    public function joural()
    {
        return view('pages.article_show');
    }
    public function new_journal()
    {
        return view('pages.new_journal');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function new_show($id)
    {
        $news = News::findOrFail($id);
        $news->increment('views');
        $categories = Category::all();
        return view('pages.new_show', compact('news', 'categories'));
    }
    public function journal_show($id)
    {
        $news = JournalIssues::findOrFail($id);
        $categories = Category::all();
        return view('pages.journal_show', compact('news', 'categories'));
    }

    public function category_show($name)
    {
        $category = Category::where('name', $name)->firstOrFail();
        $categories = Category::all();
        $articles = $category->articles()->latest()->get();

        return view('pages.category_show', compact('category', 'articles', 'categories'));
    }
    public function author_show($name)
    {
        $category = Author::where('name', $name)->firstOrFail();
        $categories = Category::all();
        $articles = $category->articles()->latest()->get();

        return view('pages.category_show', compact('category', 'articles', 'categories'));
    }
    public function journals_show($name)
    {
        $category = JournalIssue::where('title', $name)->firstOrFail();
        $categories = Category::all();
        $articles = $category->articles()->latest()->get();

        return view('pages.jurnal_soni_show', compact('category', 'articles', 'categories'));
    }








    public function test(Request $request)
    {
        $category_id = $request->input('category_id');
        $id = $request->input('id');
        $category = Category::find($category_id);

        switch ($category->object_type) {

            case 'institut':
                $institut = Institut::find($id);

                return view('pages.texts', compact('institut', 'category'));
                break;
        }
    }


    //1-guruh(junallar,kitobxonlik, tadqiqotlar,ilmiy kengash, maqola)







}
