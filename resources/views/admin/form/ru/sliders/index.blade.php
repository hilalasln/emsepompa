<div class="card card-primary card-outline card-outline-tabs m-2">
    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="ru-custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="ru-page-info" data-toggle="pill" href="#ru-page-info-tab" role="tab"
                    aria-controls="ru-page-info-tab" aria-selected="true">Slider
                    Bilgileri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ru-document" data-toggle="pill" href="#ru-document-tab" role="tab"
                    aria-controls="ru-document-tab" aria-selected="false">Dosya
                    Yönetmi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ru-seo-settings" data-toggle="pill" href="#ru-seo-settings-tab" role="tab"
                    aria-controls="ru-seo-settings-tab" aria-selected="false">SEO
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
            <div class="tab-pane fade show active" id="ru-page-info-tab" role="tabpanel" aria-labelledby="ru-page-info">


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
                                    <label for="nameRu">Slider Adı</label>
                                    <input type="text" class="form-control" id="nameRu" name="nameRu"
                                        @if (!empty($sliders['nameRu'])) value="{{ $sliders['nameRu'] }}" @endif />
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->



                            <!-- /.col -->
                            <div class="col-md-12 mt-3 border-top pt-3">
                                <div class="form-group">
                                    <label for="descriptionRu">Açıklama</label><br>
                                    <textarea id="my-editorRu" name="descriptionRu" class="col-md-12 form-control">
                                                                    @if (!empty($sliders['descriptionRu']))
{{ $sliders['descriptionRu'] }}
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
                                        CKEDITOR.replace('my-editorRu', options);
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
            <div class="tab-pane fade" id="ru-document-tab" role="tabpanel" aria-labelledby="ru-document">

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfmRu" data-input="imageRu" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Resim Seç
                            </a>
                        </span>
                        <input id="imageRu" class="form-control" type="text" name="imageRu"
                            @if (!empty($sliders['imageRu'])) value="{{ $sliders['imageRu'] }}" @endif />

                    </div>
                    <div class="imageContent">
                        @if (isset($sliders['imageRu']) && !empty($sliders['imageRu']))
                            <img id="holder" style="margin-top:15px; max-height:100px;"
                                src="{{ asset($sliders['imageRu']) }}">
                        @endif
                    </div>

                </div>
                <script>
                    var route_prefix = "{{ asset('NPanel/laravel-filemanager') }}";
                    $('#lfmRu').filemanager('image', {
                        prefix: route_prefix
                    });
                </script>
            </div>

            <!-- SEO Ayarları -->
            <div class="tab-pane fade" id="ru-seo-settings-tab" role="tabpanel" aria-labelledby="ru-seo-settings">

                <!-- /.form-group -->
                <div class="form-group">
                    <label for="buttonLinkRu">Slider Url</label>
                    <input type="text" class="form-control" id="buttonLinkRu" name="buttonLinkRu"
                        @if (!empty($sliders['buttonLinkRu'])) value="{{ $sliders['buttonLinkRu'] }}" @endif
                        oninput="this.value = slugify(this.value);" />
                </div>

                <div class="form-group">
                    <label for="buttonNameRu">Buton Adı</label>
                    <input type="text" class="form-control" id="buttonNameRu" name="buttonNameRu"
                        @if (!empty($sliders['buttonNameRu'])) value="{{ $sliders['buttonNameRu'] }}" @endif />
                </div>
                <!-- /.form-group -->
            </div>

        </div>
    </div>
    <!-- /.card -->
</div>
