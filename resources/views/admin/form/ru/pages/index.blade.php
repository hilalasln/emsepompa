<!-- Turkish Page Form -->
<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="ru-custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="ru-page-info" data-toggle="pill" href="#ru-page-info-tab" role="tab"
                    aria-controls="ru-page-info-tab" aria-selected="true">Sayfa
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
                        <h3 class="card-title">Sayfa Bilgileri</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="titleRu">Sayfa Adı</label>
                                    <input type="text" class="form-control" id="titleRu" name="titleRu"
                                        @if (!empty($pages['titleRu'])) value="{{ $pages['titleRu'] }}" @endif />
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-12 mt-3 border-top pt-3">
                                <div class="form-group">
                                    <label for="contentRu">Sayfa Açıklaması</label><br>
                                    <textarea id="ru-editor" name="contentRu" class="col-md-12 form-control">
                                                                @if (!empty($pages['contentRu']))
{{ $pages['contentRu'] }}
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
                                        CKEDITOR.replace('ru-editor', options);
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
                            @if (isset($pages['imageRu']) && !empty($pages['imageRu'])) value="{{ asset($pages['imageRu']) }}" @endif>
                    </div>
                    <div class="imageContent">
                        @if (isset($pages['imageRu']) && !empty($pages['image']))
                            <img id="holder" style="margin-top:15px; max-height:100px;"
                                src="{{ asset($pages['imageRu']) }}">
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
                    <label for="metaUrlRu">Meta Url</label>
                    <input type="text" class="form-control" id="metaUrlRu" name="metaUrlRu"
                        @if (!empty($pages['urlRu'])) value="{{ $pages['urlRu'] }}" @endif
                        oninput="this.value = slugify(this.value);" />
                </div>

                <div class="form-group">
                    <label for="metaTitleRu">Meta Başlık</label>
                    <input type="text" class="form-control" id="metaTitleRu" name="metaTitleRu"
                        @if (!empty($pages['meta_titleRu'])) value="{{ $pages['meta_titleRu'] }}" @endif />
                </div>
                <div class="form-group">
                    <label for="metaContentRu">Meta Açıklama</label>
                    <textarea class="form-control" id="metaContentRu" name="metaContentRu">
@if (!empty($pages['meta_descriptionRu']))
{{ $pages['meta_descriptionRu'] }}
@endif
                                                </textarea>
                </div>
                <div class="form-group">
                    <label for="metaKeyRu">Meta Keywords</label>
                    <textarea class="form-control" id="metaKeyRu" name="metaKeyRu">
@if (!empty($pages['meta_keywordsRu']))
{{ $pages['meta_keywordsRu'] }}
@endif
                                                </textarea>
                </div>
                <!-- /.form-group -->
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>
