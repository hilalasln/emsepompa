<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="en-custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="en-custom-tabs-four-home-tab" data-toggle="pill" href="#en-custom-tabs-four-home" role="tab" aria-controls="en-custom-tabs-four-home" aria-selected="true">Bilgiler</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="en-custom-tabs-four-profile-tab" data-toggle="pill" href="#en-custom-tabs-four-profile" role="tab" aria-controls="en-custom-tabs-four-profile" aria-selected="false">Dosya Yönetimi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="en-custom-tabs-four-messages-tab" data-toggle="pill" href="#en-custom-tabs-four-messages" role="tab" aria-controls="en-custom-tabs-four-messages" aria-selected="false">SEO Ayarları</a>
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
        <div class="tab-content" id="en-custom-tabs-four-tabContent">
            <!-- Sayfa Bilgileri -->
            <div class="tab-pane fade show active" id="en-custom-tabs-four-home" role="tabpanel" aria-labelledby="en-custom-tabs-four-home-tab">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="titleEn">Kategori Adı</label>
                                    <input type="text" class="form-control" id="titleEn" name="titleEn" @if (!empty($categories['titleEn'])) value="{{ $categories['titleEn'] }}" @endif />
                                </div>
                            </div>

                            <div class="col-md-12 mt-3 border-top pt-3">
                                <div class="form-group">
                                    <label for="contentEn">Kategori Açıklaması</label><br>
                                    <textarea id="my-editor" name="contentEn" class="col-md-12 form-control">@if (!empty($categories['contentEn'])){{ $categories['contentEn'] }}@endif</textarea>
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
            <div class="tab-pane fade" id="en-custom-tabs-four-profile" role="tabpanel" aria-labelledby="en-custom-tabs-four-profile-tab">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfmEn" data-input="imageEn" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Resim Seç
                            </a>
                        </span>
                        <input id="imageEn" class="form-control" type="text" name="imageEn">
                    </div>
                    <div class="imageContent">
                        @if (isset($categories['imageEn']) && !empty($categories['imageEn']))
                        <img id="holder" style="margin-top:15px; max-height:100px;" src="{{ asset($categories['imageEn']) }}">
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
            <div class="tab-pane fade" id="en-custom-tabs-four-messages" role="tabpanel" aria-labelledby="en-custom-tabs-four-messages-tab">
                <div class="form-group">
                    <label for="metaUrlEn">Meta Url</label>
                    <input type="text" class="form-control" id="metaUrlEn" name="metaUrlEn" @if (!empty($categories['urlEn'])) value="{{ $categories['urlEn'] }}" @endif oninput="this.value = slugify(this.value);" />
                </div>
                <div class="form-group">
                    <label for="metaTitleEn">Meta Başlık</label>
                    <input type="text" class="form-control" id="metaTitleEn" name="metaTitleEn" @if (!empty($categories['meta_titleEn'])) value="{{ $categories['meta_titleEn'] }}" @endif />
                </div>
                <div class="form-group">
                    <label for="metaContentEn">Meta Açıklama</label>
                    <textarea class="form-control" id="metaContentEn" name="metaContentEn">@if (!empty($categories['meta_descriptionEn'])){{ $categories['meta_descriptionEn'] }}@endif</textarea>
                </div>
                <div class="form-group">
                    <label for="metaKeyEn">Meta Keywords</label>
                    <textarea class="form-control" id="metaKeyEn" name="metaKeyEn">@if (!empty($categories['meta_keywordsEn'])){{ $categories['meta_keywordsEn'] }}@endif</textarea>
                </div>
            </div>

        </div>
    </div>
</div>