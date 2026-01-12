<!--! ================================================================ !-->
@foreach($articles as $article )
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="tasksDetailsOffcanvasEdit{{ $article->id }}">
        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                     data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close">
                    <i class="feather-arrow-left"></i>
                </div>
                <span class="vr text-muted mx-4"></span>
                <a href="javascript:void(0);">
                    <h2 class="fs-14 fw-bold text-truncate-1-line">Maqolalar</h2>
                    <span class="fs-12 fw-normal text-muted text-truncate-1-line"> O'zgartirish</span>
                </a>
            </div>
        </div>

        <div class="offcanvas-body">
            <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Nomi(uz):</label>
                            <input type="text" name="title" value="{{old('title',$article->title)}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label"> Qisqa mazmuni:</label>
                        <textarea name="abstract" class="form-control ckeditor">{{old('abstract',$article->abstract)}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label" for="categories">Maqola muallifi:</label>
                            <select name="authors[]" class="form-select form-control">
                                @foreach($authors as $category)
                                    <option value="{{ $category->id }}"
                                            @if($article->authors->contains($category->id)) selected @endif>{{ $category->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label" for="categories">Kategoriyalari:</label>
                            <select name="categories[]" class="form-select form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                            @if($article->categories->contains($category->id)) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label" for="categories">Jurnal soni:</label>
                            <select name="journal_issue_id" class="form-select form-control">
                                @foreach($issues as $category)
                                    <option value="{{ $category->id }}"
                                            >{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">PDF shakli:</label>
                        <input type="file" name="pdf" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary d-inline-block mt-4">Saqlash</button>

                    <iframe
                        src="{{ asset('storage/' . $article->pdf_path) }}"
                        width="100%"
                        height="600px"
                        style="border:1px solid #ccc;">
                    </iframe>
                </div>
            </form>
        </div>
    </div>
    </div>
@endforeach

<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
