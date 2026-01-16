<x-main title="Journal">
<!-- Most Populer News Start -->
    <div class="container-fluid populer-news py-5">
        <div class="container py-5">
            <div class="tab-class mb-4">
                <div class="row g-4">
                    <div class="col-lg-7 col-xl-8 mt-0">
                        <div class="position-relative overflow-hidden rounded">
                            <img src="{{ asset('storage/' . $news->photo) }}" class="img-fluid rounded img-zoomin w-100" alt="">
                            <div class="d-flex justify-content-center px-4 position-absolute flex-wrap" style="bottom: 10px; left: 0;">
                                <a href="#" class="text-white me-3 link-hover"><i class="fa fa-clock"></i> {{ $news->created_at->format('Y.m.d') }}</a>
                                <a href="#" class="text-white me-3 link-hover"><i class="fa fa-eye"></i> {{$news->views}}</a>
                            </div>
                        </div>
                        <div class="border-bottom py-3">
                            <a href="#" class="display-4 text-dark mb-0 link-hover">{{$news->title}}</a>
                        </div>

                        <br>
                        <p class="article-author">
                            @foreach($news->authors as $author)
                                Muallif: <span><a href="{{ route('author_show', $author->name) }}">{{$author->name}}</a></span>
                            @endforeach
                        </p>
                        <p class="article-author">

                            Jurnal soni: <span><a href="{{ route('journal_show', $news->journalIssue->title) }}">{{$news->journalIssue->title}}</a></span>

                        </p>

                        <p class="mt-3 mb-4">
                            {!! $news->abstract !!}
                        </p>
                        <p class="mt-3 mb-4"><iframe
                                src="{{ asset('storage/' . $news->pdf_path) }}"
                                width="100%"
                                height="600px"
                                style="border:1px solid #ccc;">
                            </iframe>
                        </p>
                        <a href="{{ asset('storage/' . $news->pdf_path) }}"
                           class="btn btn-success"
                           download>
                            📥 PDF yuklab olish
                        </a>
                        <a href="{{ route('main') }}" class="btn btn-danger">
                            ⬅ Ortga
                        </a>
                    </div>
                    <div class="col-lg-5 col-xl-4">

                        <div class="row g-4">
                            <div class="col-12">
                                <div class="p-3 rounded border">
                                    <h4 class="mb-4">Kategoriyalar</h4>
                                    <div class="row g-4">
                                        <div class="col-12">
                                            @foreach($categories as $category)
                                                <a href="{{ route('category_show', $category->name) }}" class="w-100 rounded btn btn-{{$category->slug}} d-flex align-items-center p-3 mb-2">
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
        <!-- Most Populer News End -->
</x-main>
