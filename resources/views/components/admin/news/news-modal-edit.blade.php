<!--! ================================================================ !-->
@foreach($news as $new )
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="tasksDetailsOffcanvasEdit{{ $new->id }}">
        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                     data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close">
                    <i class="feather-arrow-left"></i>
                </div>
                <span class="vr text-muted mx-4"></span>
                <a href="javascript:void(0);">
                    <h2 class="fs-14 fw-bold text-truncate-1-line">Yangiliklar</h2>
                    <span class="fs-12 fw-normal text-muted text-truncate-1-line"> O'zgartirish</span>
                </a>
            </div>
        </div>

        <div class="offcanvas-body">
            <form action="{{ route('news.update', $new->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Nomi(uz):</label>
                            <input type="text" name="title" value="{{old('title',$new->title)}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label"> Matni(uz):</label>
                        <textarea name="text"  class="form-control ckeditor">{{old('text',$new->text)}}</textarea>
                    </div>
                    @if($new->image)
                        <!-- Munosabat mavjudligini tekshirish -->
                            <!-- Munosabatni chaqirish va kolleksiyani aylanish -->
                            <img src="{{ asset('storage/' . $new->image) }}" alt="Question Image"
                                 class="img-fluid mt-2" width="150">
                    @endif
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Rasmi:</label>
                            <input type="file" name="image" class="form-control" multiple >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary d-inline-block mt-4">Saqlash</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.querySelectorAll('.ckeditor').forEach((el) => {
            CKEDITOR.replace(el);
        });
    </script>
    </div>
@endforeach

<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
