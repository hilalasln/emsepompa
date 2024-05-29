<div class="card card-primary card-outline card-outline-tabs m-2">
    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="ar-custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="ar-page-info" data-toggle="pill" href="#ar-page-info-tab" role="tab"
                    aria-controls="ar-page-info-tab" aria-selected="true">Slider
                    Bilgileri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ar-document" data-toggle="pill" href="#ar-document-tab" role="tab"
                    aria-controls="ar-document-tab" aria-selected="false">Dosya
                    Yönetmi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ar-seo-settings" data-toggle="pill" href="#ar-seo-settings-tab" role="tab"
                    aria-controls="ar-seo-settings-tab" aria-selected="false">SEO
                    Ayarları</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="tab-content" id="custom-tabs-four-tabContent">
            <!-- Sayfa Bilgileri -->
            <div class="tab-pane fade show active" id="ar-page-info-tab" role="tabpanel" aria-labelledby="ar-page-info">


                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Slider Bilgileri</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="nameAr">Slider Adı</label>
                                    <input type="text" class="form-control" id="nameAr" name="nameAr"
                                        @if (!empty($sliders['nameAr'])) value="{{ $sliders['nameAr'] }}" @endif />
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->



                            <!-- /.col -->
                            <div class="col-md-12 mt-3 border-top pt-3">
                                <div class="form-group">
                                    <label for="descriptionAr">Açıklama</label><br>
                                    <textarea id="my-editorAr" name="descriptionAr" class="col-md-12 form-control">
                                                                    @if (!empty($sliders['descriptionAr']))
{{ $sliders['descriptionAr'] }}
@endif
                                                                </textarea>
                                    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                                    <script>
                                        var options = {
                                            filebrowserImageBrowseUrl: '/NPanel/laravel-filemanager?type=Images',
                                            filebrowserImageUploadUrl: '/NPanel/laravel-filemanager/upload?type=Images&_token=',
                                            filebrowserBrowseUrl: '/NPanel/laravel-filemanager?type=Files',
                                            filebrowserUploadUrl: '/NPanel/laravel-filemanager/upload?type=Files&_token='
                                        };
                                        CKEDITOR.replace('my-editorAr', options);
                                    </script>
                                </div>
                            </div>
                            <!-- /.col -->

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <!-- Dosya Yönetimi -->
            <div class="tab-pane fade" id="ar-document-tab" role="tabpanel" aria-labelledby="ar-document">

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfmAr" data-input="imageAr" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Resim Seç
                            </a>
                        </span>
                        <input id="imageAr" class="form-control" type="text" name="imageAr"
                            @if (!empty($sliders['imageAr'])) value="{{ $sliders['imageAr'] }}" @endif />

                    </div>
                    <div class="imageContent">
                        @if (isset($sliders['imageAr']) && !empty($sliders['imageAr']))
                            <img id="holder" style="margin-top:15px; max-height:100px;"
                                src="{{ asset($sliders['imageAr']) }}">
                        @endif
                    </div>

                </div>
                <script>
                    var route_prefix = "{{ asset('NPanel/laravel-filemanager') }}";
                    $('#lfmAr').filemanager('image', {
                        prefix: route_prefix
                    });
                </script>
            </div>

            <!-- SEO Ayarları -->
            <div class="tab-pane fade" id="ar-seo-settings-tab" role="tabpanel" aria-labelledby="ar-seo-settings">

                <!-- /.form-group -->
                <div class="form-group">
                    <label for="buttonLinkAr">Slider Url</label>
                    <input type="text" class="form-control" id="buttonLinkAr" name="buttonLinkAr"
                        @if (!empty($sliders['buttonLinkAr'])) value="{{ $sliders['buttonLinkAr'] }}" @endif
                        oninput="this.value = slugify(this.value);" />
                </div>

                <div class="form-group">
                    <label for="buttonNameAr">Buton Adı</label>
                    <input type="text" class="form-control" id="buttonNameAr" name="buttonNameAr"
                        @if (!empty($sliders['buttonNameAr'])) value="{{ $sliders['buttonNameAr'] }}" @endif />
                </div>
                <!-- /.form-group -->
            </div>

        </div>
    </div>
    <!-- /.card -->
</div>
