<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="ru-custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="ru-custom-tabs-four-home-tab" data-toggle="pill" href="#ru-custom-tabs-four-home" role="tab" aria-controls="ru-custom-tabs-four-home" aria-selected="true">Bilgiler</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ru-custom-tabs-four-profile-tab" data-toggle="pill" href="#ru-custom-tabs-four-profile" role="tab" aria-controls="ru-custom-tabs-four-profile" aria-selected="false">Dosya Yönetimi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ru-custom-tabs-four-messages-tab" data-toggle="pill" href="#ru-custom-tabs-four-messages" role="tab" aria-controls="ru-custom-tabs-four-messages" aria-selected="false">SEO Ayarları</a>
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
        <div class="tab-content" id="ru-custom-tabs-four-tabContent">
            <!-- Sayfa Bilgileri -->
            <div class="tab-pane fade show active" id="ru-custom-tabs-four-home" role="tabpanel" aria-labelledby="ru-custom-tabs-four-home-tab">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="titleRu">Kategori Adı</label>
                                    <input type="text" class="form-control" id="titleRu" name="titleRu" @if (!empty($categories['titleRu'])) value="{{ $categories['titleRu'] }}" @endif />
                                </div>
                            </div>

                            <div class="col-md-12 mt-3 border-top pt-3">
                                <div class="form-group">
                                    <label for="contentRu">Kategori Açıklaması</label><br>
                                    <textarea id="my-editor" name="contentRu" class="col-md-12 form-control">@if (!empty($categories['contentRu'])){{ $categories['contentRu'] }}@endif</textarea>
                                    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                                    <script>
                                        var options = {
                                            filebrowserImageBrowseUrl: '/NPanel/laravel-filemanager?type=Images',
                                            filebrowserImageUploadUrl: '/NPanel/laravel-filemanager/upload?type=Images&_token=',
                                            filebrowserBrowseUrl: '/NPanel/laravel-filemanager?type=Files',
                                            filebrowserUploadUrl: '/NPanel/laravel-filemanager/upload?type=Files&_token='
                                        };
                                        CKEDITOR.replace('my-editor', options);
                                    </script>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- Dosya Yönetimi -->
            <div class="tab-pane fade" id="ru-custom-tabs-four-profile" role="tabpanel" aria-labelledby="ru-custom-tabs-four-profile-tab">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfmRu" data-input="imageRu" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Resim Seç
                            </a>
                        </span>
                        <input id="imageRu" class="form-control" type="text" name="imageRu">
                    </div>
                    <div class="imageContent">
                        @if (isset($categories['imageRu']) && !empty($categories['imageRu']))
                        <img id="holder" style="margin-top:15px; max-height:100px;" src="{{ asset($categories['imageRu']) }}">
                        @endif
                    </div>
                </div>
                <script>
                    var route_prefix = "{{ asset('NPanel/laravel-filemanager') }}";
                    $('#lfm').filemanager('image', {
                        prefix: route_prefix
                    });
                </script>
            </div>
            <!-- SEO Ayarları -->
            <div class="tab-pane fade" id="ru-custom-tabs-four-messages" role="tabpanel" aria-labelledby="ru-custom-tabs-four-messages-tab">
                <div class="form-group">
                    <label for="metaUrlRu">Meta Url</label>
                    <input type="text" class="form-control" id="metaUrlRu" name="metaUrlRu" @if (!empty($categories['urlRu'])) value="{{ $categories['urlRu'] }}" @endif oninput="this.value = slugify(this.value);" />
                </div>
                <div class="form-group">
                    <label for="metaTitleRu">Meta Başlık</label>
                    <input type="text" class="form-control" id="metaTitleRu" name="metaTitleRu" @if (!empty($categories['meta_titleRu'])) value="{{ $categories['meta_titleRu'] }}" @endif />
                </div>
                <div class="form-group">
                    <label for="metaContentRu">Meta Açıklama</label>
                    <textarea class="form-control" id="metaContentRu" name="metaContentRu">@if (!empty($categories['meta_descriptionRu'])){{ $categories['meta_descriptionRu'] }}@endif</textarea>
                </div>
                <div class="form-group">
                    <label for="metaKeyRu">Meta Keywords</label>
                    <textarea class="form-control" id="metaKeyRu" name="metaKeyRu">@if (!empty($categories['meta_keywordsRu'])){{ $categories['meta_keywordsRu'] }}@endif</textarea>
                </div>
            </div>

        </div>
    </div>
</div>