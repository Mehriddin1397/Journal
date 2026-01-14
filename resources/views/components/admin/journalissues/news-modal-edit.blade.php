<!--! ================================================================ !-->
@foreach($issues as $issue )
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="tasksDetailsOffcanvasEdit{{ $issue->id }}">
        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                     data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close">
                    <i class="feather-arrow-left"></i>
                </div>
                <span class="vr text-muted mx-4"></span>
                <a href="javascript:void(0);">
                    <h2 class="fs-14 fw-bold text-truncate-1-line">Jurnal sonlari</h2>
                    <span class="fs-12 fw-normal text-muted text-truncate-1-line"> O'zgartirish</span>
                </a>
            </div>
        </div>

        <div class="offcanvas-body">
            <form action="{{ route('journal_issues.update', $issue->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Nomi:</label>
                            <input type="text" name="title" value="{{old('title',$issue->title)}}" class="form-control">
                        </div>
                    </div>
                    @if($issue->photo)
                        <!-- Munosabat mavjudligini tekshirish -->
                            <!-- Munosabatni chaqirish va kolleksiyani aylanish -->
                            <img src="{{ asset('storage/' . $issue->photo) }}" alt="Question Image"
                                 class="img-fluid mt-2" width="150">
                    @endif
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Rasmi:</label>
                            <input type="file" name="photo" class="form-control" multiple >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">PDF file:</label>
                            <input type="file" name="pdf_path" class="form-control" multiple >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary d-inline-block mt-4">Saqlash</button>

                    <iframe
                        src="{{ asset('storage/' . $issue->pdf_path) }}"
                        width="100%"
                        height="600px"
                        style="border:1px solid #ccc;">
                    </iframe>
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
