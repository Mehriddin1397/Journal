<x-main title="Yangiliklar Category_show">
    <!-- Most Populer News Start -->
    <div class="container-fluid populer-news py-5">
        <div class="container py-5">
            <div class="tab-class mb-4">
                <div class="row g-4">
                    <div class="col-lg-7 col-xl-8 mt-0">
                        <div class="position-relative overflow-hidden rounded">

                        </div>
                        <div class="border-bottom py-3">
                            <a href="#" class="display-4 text-dark mb-0 link-hover">{{$query}} - natijasi:</a>
                        </div>

                                <div class="row g-4 mt-3">
                                    @if($articles->count())
                                        @foreach($articles as $article)
                                            <div class="card mb-3 p-3">
                                                <h4>{{ $article->title }}</h4>

                                                <p>
                                                    Mualliflar:
                                                    {{ $article->authors->pluck('name')->join(', ') }}
                                                </p>

                                                <p>
                                                    Jurnal: {{ $article->journalIssue->title ?? 'Noma’lum' }}
                                                </p>

                                                <a href="{{ route('maqola_show', $article->id) }}">
                                                    Batafsil
                                                </a>
                                            </div>
                                        @endforeach
                                    @else
                                        <p>Hech narsa topilmadi 😕</p>
                                    @endif

                                        <a href="{{ route('main') }}" class="btn btn-danger">
                                            ⬅ Ortga
                                        </a>
                                </div>


                    </div>
                    <div class="col-lg-5 col-xl-4">
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
