<x-main title="Yangiliklar">
    <!-- Most Populer News Start -->
    <div class="container-fluid populer-news py-5">
        <div class="container py-5">
            <div class="tab-class mb-4">
                <div class="row g-4">
                    <div class="col-lg-8 col-xl-9">



                        <div class="mt-5 lifestyle">
                            <div class="border-bottom mb-4">
                                <h1 class="mb-4">Jurnal tuliq sahifalari</h1>
                            </div>

                            <div class="row g-4 mt-3">
                                @foreach($latestIssueArticles as $article)
                                    <div class="col-md-4">
                                        <div class="article-card">
                                            <div class="article-img">
                                                <img src="{{ asset('storage/' . $article->photo) }}" alt="Article image">
                                            </div>

                                            <div class="article-body">
                                                <h5 class="article-title">
                                                    {{$article->title}}
                                                </h5>

                                                <p class="article-author">
                                                    @foreach($article->authors as $author)
                                                        ✍ Muallif: <span><a href="{{ route('author_show', $author->name) }}">{{$author->name}}</a></span>
                                                    @endforeach
                                                </p>
                                                <p class="article-author">

                                                    Jurnal soni: <span><a href="{{ route('journal_show', $article->journalIssue->title) }}">{{$article->journalIssue->title}}</a></span>

                                                </p>

                                                <a href="{{ route('maqola_show', $article->id) }}" class="article-link">
                                                    Batafsil o‘qish →
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="p-3 rounded border">
                                    <h4 class="mb-4">Kategoriyalar</h4>
                                    <div class="row g-4">
                                        <div class="col-12">
                                            @foreach($categories as $category)
                                                <a href="{{ route('category_show', $category->name) }}"
                                                   class="w-100 rounded btn btn-{{$category->slug}} d-flex align-items-center p-3 mb-2">
                                                    <i class="fas fa-book d-flex align-items-center justify-content-center bg-light rounded-circle shadow-sm me-3"
                                                       style="width:45px;height:45px;"></i>
                                                    <span class="text-white">{{$category->name}}</span>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <h4 class="my-4">Eng kup kurilgan maqolalar</h4>

                                    <div class="row g-4">

                                        @foreach($popularArticles as $article)
                                        <div class="col-12">
                                            <div class="row g-4 align-items-center features-item">
                                                <div class="col-4">
                                                    <div class="rounded-circle position-relative">
                                                        <div class="overflow-hidden rounded-circle">
                                                            <img src="{{ asset('storage/' . $article->photo) }}" class="img-zoomin img-fluid rounded-circle w-100" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="features-content d-flex flex-column">
                                                        @foreach($article->authors as $author)
                                                        <p class="text-uppercase mb-2">{{$author->name}}</p>
                                                        @endforeach
                                                        <a href="#" class="h6">
                                                            {{$article->title}}
                                                        </a>
                                                        <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i>
                                                            {{$article->created_at->format('Y.m.d')}}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .article-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .article-img {
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .article-img img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* MUHIM: rasmni buzmaydi */
        }

        .article-body {
            padding: 15px;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .article-title {
            font-size: 16px;
            font-weight: 600;
            color: #222;
            line-height: 1.4;
            margin-bottom: 10px;
            word-break: break-word; /* uzun title tushib ketadi */
        }

        .article-author {
            font-size: 14px;
            color: #777;
            margin-bottom: 10px;
        }

        .article-author span {
            font-weight: 500;
            color: #333;
        }

        .article-link {
            margin-top: auto;
            font-size: 14px;
            font-weight: 600;
            color: #0d6efd;
            text-decoration: none;
        }

        .article-link:hover {
            text-decoration: underline;
        }

    </style>
    <!-- Most Populer News End -->
</x-main>
