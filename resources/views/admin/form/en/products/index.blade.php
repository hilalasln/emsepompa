<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="en-custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="en-custom-tabs-four-home-tab" data-toggle="pill"
                    href="#en-custom-tabs-four-home" role="tab" aria-controls="en-custom-tabs-four-home"
                    aria-selected="true">Ürün Bilgileri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="en-custom-tabs-four-messages-tab" data-toggle="pill"
                    href="#en-custom-tabs-four-messages" role="tab" aria-controls="en-custom-tabs-four-messages"
                    aria-selected="false">SEO
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
        <div class="tab-content" id="en-custom-tabs-four-tabContent">
            <!-- Sayfa Bilgileri -->
            <div class="tab-pane fade show active" id="en-custom-tabs-four-home" role="tabpanel"
                aria-labelledby="en-custom-tabs-four-home-tab">

                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="titleEn">Ürün Adı</label>
                                    <input type="text" class="form-control" id="titleEn" name="titleEn"
                                        @if (!empty($rooms['titleEn'])) value="{{ $rooms['titleEn'] }}" @endif />
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->


                            <div class="col-md-12">
                                <div class="row">



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contentEn">Ürün Açıklaması</label><br>
                                            <textarea id="contentEn" name="contentEn" class="col-md-12 form-control summernote">
@if (!empty($rooms['contentEn']))
{{ $rooms['contentEn'] }}
@endif
</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="shortContentEn">Kullanım Alanları</label><br>
                                            <textarea id="shortContentEn" name="shortContentEn" class="col-md-12 form-control summernote">
@if (!empty($rooms['shortContentEn']))
{{ $rooms['shortContentEn'] }}
@endif
</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <!-- SEO Ayarları -->
            <div class="tab-pane fade" id="en-custom-tabs-four-messages" role="tabpanel"
                aria-labelledby="en-custom-tabs-four-messages-tab">
                <!-- /.form-group -->
                <div class="form-group">
    <label for="urlEn">Meta Url</label>
    <input type="text" class="form-control" id="urlEn" name="urlEn"
        @if (!empty($rooms['urlEn'])) value="{{ $rooms['urlEn'] }}" @endif
        oninput="this.value = slugify(this.value);" />
</div>

<div class="form-group">
    <label for="metaTitleEn">Meta Başlık</label>
    <input type="text" class="form-control" id="metaTitleEn" name="metaTitleEn"
        @if (!empty($rooms['meta_titleEn'])) value="{{ $rooms['meta_titleEn'] }}" @endif />
</div>

<div class="form-group">
    <label for="metaContentEn">Meta Açıklama</label>
    <textarea class="form-control" id="metaContentEn" name="metaContentEn">
@if (!empty($rooms['meta_descriptionEn']))
{{ $rooms['meta_descriptionEn'] }}
@endif
</textarea>
</div>

<div class="form-group">
    <label for="metaKeyEn">Meta Keywords</label>
    <textarea class="form-control" id="metaKeyEn" name="metaKeyEn">
@if (!empty($rooms['meta_keyworsdEn']))
{{ $rooms['meta_keyworsdEn'] }}
@endif
</textarea>
</div>
                <!-- /.form-group -->
            </div>
        </div>
    </div>
</div>
