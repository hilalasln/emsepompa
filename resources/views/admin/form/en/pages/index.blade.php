<!-- Turkish Page Form -->
<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="en-custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="en-page-info" data-toggle="pill" href="#en-page-info-tab" role="tab"
                    aria-controls="en-page-info-tab" aria-selected="true">Sayfa
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
                        <h3 class="card-title">Sayfa Bilgileri</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="titleEn">Sayfa Adı</label>
                                    <input type="text" class="form-control" id="titleEn" name="titleEn"
                                        @if (!empty($pages['titleEn'])) value="{{ $pages['titleEn'] }}" @endif />
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-12 mt-3 border-top pt-3">
                                <div class="form-group">
                                    <label for="contentEn">Sayfa Açıklaması</label><br>
                                    <textarea id="en-editor" name="contentEn" class="col-md-12 form-control">
                                                                @if (!empty($pages['contentEn']))
{{ $pages['contentEn'] }}
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
                                        CKEDITOR.replace('en-editor', options);
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
                            @if (isset($pages['imageEn']) && !empty($pages['imageEn'])) value="{{ asset($pages['imageEn']) }}" @endif>
                    </div>
                    <div class="imageContent">
                        @if (isset($pages['imageEn']) && !empty($pages['image']))
                            <img id="holder" style="margin-top:15px; max-height:100px;"
                                src="{{ asset($pages['imageEn']) }}">
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
                    <label for="metaUrlEn">Meta Url</label>
                    <input type="text" class="form-control" id="metaUrlEn" name="metaUrlEn"
                        @if (!empty($pages['urlEn'])) value="{{ $pages['urlEn'] }}" @endif
                        oninput="this.value = slugify(this.value);" />
                </div>

                <div class="form-group">
                    <label for="metaTitleEn">Meta Başlık</label>
                    <input type="text" class="form-control" id="metaTitleEn" name="metaTitleEn"
                        @if (!empty($pages['meta_titleEn'])) value="{{ $pages['meta_titleEn'] }}" @endif />
                </div>
                <div class="form-group">
                    <label for="metaContentEn">Meta Açıklama</label>
                    <textarea class="form-control" id="metaContentEn" name="metaContentEn">
@if (!empty($pages['meta_descriptionEn']))
{{ $pages['meta_descriptionEn'] }}
@endif
                                                </textarea>
                </div>
                <div class="form-group">
                    <label for="metaKeyEn">Meta Keywords</label>
                    <textarea class="form-control" id="metaKeyEn" name="metaKeyEn">
@if (!empty($pages['meta_keywordsEn']))
{{ $pages['meta_keywordsEn'] }}
@endif
                                                </textarea>
                </div>
                <!-- /.form-group -->
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>
