<!-- Turkish Page Form -->
<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="ar-custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="ar-page-info" data-toggle="pill" href="#ar-page-info-tab" role="tab"
                    aria-controls="ar-page-info-tab" aria-selected="true">Sayfa
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
                        <h3 class="card-title">Sayfa Bilgileri</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="titleAr">Sayfa Adı</label>
                                    <input type="text" class="form-control" id="titleAr" name="titleAr"
                                        @if (!empty($pages['titleAr'])) value="{{ $pages['titleAr'] }}" @endif />
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-12 mt-3 border-top pt-3">
                                <div class="form-group">
                                    <label for="contentAr">Sayfa Açıklaması</label><br>
                                    <textarea id="ar-editor" name="contentAr" class="col-md-12 form-control">
                                                                @if (!empty($pages['contentAr']))
{{ $pages['contentAr'] }}
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
                                        CKEDITOR.replace('ar-editor', options);
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
                            @if (isset($pages['imageAr']) && !empty($pages['imageAr'])) value="{{ asset($pages['imageAr']) }}" @endif>
                    </div>
                    <div class="imageContent">
                        @if (isset($pages['imageAr']) && !empty($pages['image']))
                            <img id="holder" style="margin-top:15px; max-height:100px;"
                                src="{{ asset($pages['imageAr']) }}">
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
                    <label for="metaUrlAr">Meta Url</label>
                    <input type="text" class="form-control" id="metaUrlAr" name="metaUrlAr"
                        @if (!empty($pages['urlAr'])) value="{{ $pages['urlAr'] }}" @endif
                        oninput="this.value = slugify(this.value);" />
                </div>

                <div class="form-group">
                    <label for="metaTitleAr">Meta Başlık</label>
                    <input type="text" class="form-control" id="metaTitleAr" name="metaTitleAr"
                        @if (!empty($pages['meta_titleAr'])) value="{{ $pages['meta_titleAr'] }}" @endif />
                </div>
                <div class="form-group">
                    <label for="metaContentAr">Meta Açıklama</label>
                    <textarea class="form-control" id="metaContentAr" name="metaContentAr">
@if (!empty($pages['meta_descriptionAr']))
{{ $pages['meta_descriptionAr'] }}
@endif
                                                </textarea>
                </div>
                <div class="form-group">
                    <label for="metaKeyAr">Meta Keywords</label>
                    <textarea class="form-control" id="metaKeyAr" name="metaKeyAr">
@if (!empty($pages['meta_keywordsAr']))
{{ $pages['meta_keywordsAr'] }}
@endif
                                                </textarea>
                </div>
                <!-- /.form-group -->
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>
