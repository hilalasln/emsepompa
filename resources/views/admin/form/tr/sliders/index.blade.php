<div class="card card-primary card-outline card-outline-tabs m-2">
    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="tr-custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="tr-page-info" data-toggle="pill" href="#tr-page-info-tab" role="tab"
                    aria-controls="tr-page-info-tab" aria-selected="true">Slider
                    Bilgileri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tr-document" data-toggle="pill" href="#tr-document-tab" role="tab"
                    aria-controls="tr-document-tab" aria-selected="false">Dosya
                    Yönetmi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tr-seo-settings" data-toggle="pill" href="#tr-seo-settings-tab" role="tab"
                    aria-controls="tr-seo-settings-tab" aria-selected="false">SEO
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
            <div class="tab-pane fade show active" id="tr-page-info-tab" role="tabpanel" aria-labelledby="tr-page-info">


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
                                    <label for="name">Slider Adı</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        @if (!empty($sliders['name'])) value="{{ $sliders['name'] }}" @endif />
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->


                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="orderNo">Sıra Numarası</label><br>
                                            <input type="number" class="form-control" id="orderNo" name="orderNo"
                                                @if (!empty($sliders['orderNo'])) value="{{ $sliders['orderNo'] }}" @endif />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="status">Durumu</label><br>
                                            <input type="checkbox" name="status" id="status" checked
                                                @if (!empty($sliders['status'] === 1)) checked @endif data-bootstrap-switch>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- /.col -->
                            <div class="col-md-12 mt-3 border-top pt-3">
                                <div class="form-group">
                                    <label for="description">Açıklama</label><br>
                                    <textarea id="my-editor" name="description" class="col-md-12 form-control">
                                                                    @if (!empty($sliders['description']))
{{ $sliders['description'] }}
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
                                        CKEDITOR.replace('my-editor', options);
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
            <div class="tab-pane fade" id="tr-document-tab" role="tabpanel" aria-labelledby="tr-document">

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Resim Seç
                            </a>
                        </span>
                        <input id="image" class="form-control" type="text" name="image"
                            @if (!empty($sliders['image'])) value="{{ $sliders['image'] }}" @endif />

                    </div>
                    <div class="imageContent">
                        @if (isset($sliders['image']) && !empty($sliders['image']))
                            <img id="holder" style="margin-top:15px; max-height:100px;"
                                src="{{ asset($sliders['image']) }}">
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
            <div class="tab-pane fade" id="tr-seo-settings-tab" role="tabpanel" aria-labelledby="tr-seo-settings">

                <!-- /.form-group -->
                <div class="form-group">
                    <label for="buttonLink">Slider Url</label>
                    <input type="text" class="form-control" id="buttonLink" name="buttonLink"
                        @if (!empty($sliders['buttonLink'])) value="{{ $sliders['buttonLink'] }}" @endif
                        oninput="this.value = slugify(this.value);" />
                </div>

                <div class="form-group">
                    <label for="buttonName">Buton Adı</label>
                    <input type="text" class="form-control" id="buttonName" name="buttonName"
                        @if (!empty($sliders['buttonName'])) value="{{ $sliders['buttonName'] }}" @endif />
                </div>
                <!-- /.form-group -->
            </div>

        </div>
    </div>
    <!-- /.card -->
</div>
