<div class="card card-primary card-outline card-outline-tabs m-2">
    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="en-custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="en-page-info" data-toggle="pill" href="#en-page-info-tab" role="tab"
                    aria-controls="en-page-info-tab" aria-selected="true">Slider
                    Bilgileri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="en-document" data-toggle="pill" href="#en-document-tab" role="tab"
                    aria-controls="en-document-tab" aria-selected="false">Dosya
                    Yönetmi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="en-seo-settings" data-toggle="pill" href="#en-seo-settings-tab" role="tab"
                    aria-controls="en-seo-settings-tab" aria-selected="false">SEO
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
            <div class="tab-pane fade show active" id="en-page-info-tab" role="tabpanel" aria-labelledby="en-page-info">


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
                                    <label for="nameEn">Slider Adı</label>
                                    <input type="text" class="form-control" id="nameEn" name="nameEn"
                                        @if (!empty($sliders['nameEn'])) value="{{ $sliders['nameEn'] }}" @endif />
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                            <div class="col-md-12 mt-3 border-top pt-3">
                                <div class="form-group">
                                    <label for="descriptionEn">Açıklama</label><br>
                                    <textarea id="my-editorEn" name="descriptionEn" class="col-md-12 form-control">
                                                                    @if (!empty($sliders['descriptionEn']))
{{ $sliders['descriptionEn'] }}
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
                                        CKEDITOR.replace('my-editorEn', options);
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
            <div class="tab-pane fade" id="en-document-tab" role="tabpanel" aria-labelledby="en-document">

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfmEn" data-input="imageEn" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Resim Seç
                            </a>
                        </span>
                        <input id="imageEn" class="form-control" type="text" name="imageEn"
                            @if (!empty($sliders['imageEn'])) value="{{ $sliders['imageEn'] }}" @endif />

                    </div>
                    <div class="imageContent">
                        @if (isset($sliders['imageEn']) && !empty($sliders['imageEn']))
                            <img id="holder" style="margin-top:15px; max-height:100px;"
                                src="{{ asset($sliders['imageEn']) }}">
                        @endif
                    </div>

                </div>
                <script>
                    var route_prefix = "{{ asset('NPanel/laravel-filemanager') }}";
                    $('#lfmEn').filemanager('image', {
                        prefix: route_prefix
                    });
                </script>
            </div>

            <!-- SEO Ayarları -->
            <div class="tab-pane fade" id="en-seo-settings-tab" role="tabpanel" aria-labelledby="en-seo-settings">

                <!-- /.form-group -->
                <div class="form-group">
                    <label for="buttonLinkEn">Slider Url</label>
                    <input type="text" class="form-control" id="buttonLinkEn" name="buttonLinkEn"
                        @if (!empty($sliders['buttonLinkEn'])) value="{{ $sliders['buttonLinkEn'] }}" @endif
                        oninput="this.value = slugify(this.value);" />
                </div>

                <div class="form-group">
                    <label for="buttonNameEn">Buton Adı</label>
                    <input type="text" class="form-control" id="buttonNameEn" name="buttonNameEn"
                        @if (!empty($sliders['buttonNameEn'])) value="{{ $sliders['buttonNameEn'] }}" @endif />
                </div>
                <!-- /.form-group -->
            </div>

        </div>
    </div>
    <!-- /.card -->
</div>
