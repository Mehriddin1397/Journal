<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;

use App\Models\JournalIssue;
use App\Models\JournalIssues;
use App\Models\News;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function main()
    {
        $one_new = News::latest()->first();

        $one_journal = JournalIssues::latest()->first();

        $news = News::latest()->skip(1)->take(4)->get();
        $categories = Category::all();
        return view('pages.main', compact('one_new', 'news', 'one_journal', 'categories'));

    }

    public function contact()
    {
        return view('pages.contact');
    }
    public function joural()
    {
        $categories = Category::all();
        $journals = JournalIssues::all();
        return view('pages.article_show', compact('categories', 'journals'));
    }
    public function new_journal()
    {
        $categories = Category::all();
        // 1️⃣ Eng oxirgi jurnal soni

        $latestjurnal = JournalIssue::latest()->first();

        // 2️⃣ Shu songa tegishli articlelar
        $latestIssueArticles = [];

        if ($latestjurnal) {
            $latestIssueArticles = $latestjurnal->articles()->latest()->get();
        }

        // 3️⃣ Eng ko‘p ko‘rilgan 5 ta article
        $popularArticles = Article::orderByDesc('views')
            ->take(5)
            ->get();


        return view('pages.new_journal', compact('categories',  'latestIssueArticles', 'popularArticles'));
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


    public function article_show($id)
    {
        $news = Article::findOrFail($id);
        $news->increment('views');
        $categories = Category::all();
        $popularArticles = Article::orderByDesc('views')
            ->take(5)
            ->get();
        return view('pages.maqola_show', compact('news', 'categories', 'popularArticles'));
    }











    //1-guruh(junallar,kitobxonlik, tadqiqotlar,ilmiy kengash, maqola)







}
