<x-main title="Asosiy sahifa">
<!-- Main Post Section Start -->
<div class="container-fluid py-5">
    <div class="container py-3">
        <div class="row g-4">
            <div class="col-lg-7 col-xl-8 mt-0">
                <div class="position-relative overflow-hidden rounded">
                    <a href="{{ route('new.show', $one_new->id) }}"><img src="{{ asset('storage/' . $one_new->image) }}" class="img-fluid rounded img-zoomin w-100" alt=""></a>
                    <div class="d-flex justify-content-center px-4 position-absolute flex-wrap" style="bottom: 10px; left: 0;">
                        <a href="#" class="text-white me-3 link-hover"><i class="fa fa-clock"></i> {{ $one_new->created_at->format('Y.m.d') }}
                        </a>
                        <a href="#" class="text-white me-3 link-hover"><i class="fa fa-eye"></i> {{$one_new->views}}</a>
                    </div>
                </div>
                <div class="border-bottom py-3">
                    <a href="{{ route('new.show', $one_new->id) }}" class="display-4 text-dark mb-0 link-hover">{{$one_new->title}}</a>
                </div>
                <p class="mt-3 mb-4">{!! $one_new->text!!}
                </p>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 pt-0">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="rounded overflow-hidden">
                                <img src="{{ asset('storage/' . $one_journal->photo) }}" class="img-fluid rounded img-zoomin w-100" alt="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex flex-column">
                                <a href="{{ route('journal.show', $one_journal->id) }}" class="h4 mb-2">{{$one_journal->title}}</a>
                                <p class="fs-5 mb-0"><i class="fa fa-clock"> {{ $one_journal->created_at->format('Y.m.d') }}</i> </p>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row g-4 align-items-center">
                                <div class="col-5">
                                    <div class="overflow-hidden rounded">
                                        <img src="img/news-4.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="features-content d-flex flex-column">
                                        <a href="#" class="h6">Institut haqida qisqacha ma'lumot</a>
                                        <small><i class="fa fa-clock"> 06 minute read</i> </small>
                                        <small><i class="fa fa-eye"> 3.5k Views</i></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4 align-items-center">
                                <div class="col-5">
                                    <div class="overflow-hidden rounded">
                                        <img src="img/news-5.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="features-content d-flex flex-column">
                                        <a href="#" class="h6">Jurnal nizomi.</a>
                                        <small><i class="fa fa-clock"> 06 minute read</i> </small>
                                        <small><i class="fa fa-eye"> 3.5k Views</i></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row g-4 align-items-center">
                                <div class="col-5">
                                    <div class="overflow-hidden rounded">
                                        <img src="img/news-7.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="features-content d-flex flex-column">
                                        <a href="#" class="h6">"Eng yaxshi maqola" ko'rik tanlovi nizomi</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4 align-items-center">
                                <div class="col-5">
                                    <div class="overflow-hidden rounded">
                                        <img src="img/news-7.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="features-content d-flex flex-column">
                                        <a href="#" class="h6">Eng yaxshi ilmiy taklif</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Post Section End -->

<!-- Latest News Start -->
<div class="container-fluid latest-news py-3">
    <div class="container py-5">
        <h2 class="mb-4">Sungi yangiliklar</h2>
        <div class="latest-news-carousel owl-carousel">
            <div class="latest-news-item">
                <div class="bg-light rounded">
                    <div class="rounded-top overflow-hidden">
                        <a href="{{ route('new.show', $one_new->id) }}"><img src="{{ asset('storage/' . $one_new->image) }}" class="img-zoomin img-fluid rounded-top w-100" alt=""></a>
                    </div>
                    <div class="d-flex flex-column p-4">
                        <a href="{{ route('new.show', $one_new->id) }}" class="h4 ">{{$one_new->title}}</a>
                        <div class="d-flex justify-content-between">
                            <small><i class="fa fa-eye"> {{$one_new->views}}</i></small>
                            <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> {{ $one_new->created_at->format('Y.m.d') }}</small>
                        </div>
                    </div>
                </div>
            </div>


            @foreach($news as $new)
                <div class="latest-news-item">
                    <div class="bg-light rounded">
                        <div class="rounded-top overflow-hidden">
                            <a {{ route('new.show', $new->id) }}><img src="{{ asset('storage/' . $new->image) }}" class="img-zoomin img-fluid rounded-top w-100" alt=""></a>
                        </div>
                        <div class="d-flex flex-column p-4">
                            <a href="{{ route('new.show', $new->id) }}" class="h4">{{$new->title}}</a>
                            <div class="d-flex justify-content-between">
                                <small><i class="fa fa-eye"></i> {{$one_new->views}}</small>
                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> {{ $new->created_at->format('Y.m.d') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</div>
<!-- Latest News End -->



</x-main>
