<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="ar-custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="ar-custom-tabs-four-home-tab" data-toggle="pill"
                    href="#ar-custom-tabs-four-home" role="tab" aria-controls="ar-custom-tabs-four-home"
                    aria-selected="true">Ürün Bilgileri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ar-custom-tabs-four-messages-tab" data-toggle="pill"
                    href="#ar-custom-tabs-four-messages" role="tab" aria-controls="ar-custom-tabs-four-messages"
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
        <div class="tab-content" id="ar-custom-tabs-four-tabContent">
            <!-- Sayfa Bilgileri -->
            <div class="tab-pane fade show active" id="ar-custom-tabs-four-home" role="tabpanel"
                aria-labelledby="ar-custom-tabs-four-home-tab">

                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="titleAr">Ürün Adı</label>
                                    <input type="text" class="form-control" id="titleAr" name="titleAr"
                                        @if (!empty($rooms['titleAr'])) value="{{ $rooms['titleAr'] }}" @endif />
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->


                            <div class="col-md-12">
                                <div class="row">



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contentAr">Ürün Açıklaması</label><br>
                                            <textarea id="contentAr" name="contentAr" class="col-md-12 form-control summernote">
@if (!empty($rooms['contentAr']))
{{ $rooms['contentAr'] }}
@endif
</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="shortContentAr">Kullanım Alanları</label><br>
                                            <textarea id="shortContentAr" name="shortContentAr" class="col-md-12 form-control summernote">
@if (!empty($rooms['shortContentAr']))
{{ $rooms['shortContentAr'] }}
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
            <div class="tab-pane fade" id="ar-custom-tabs-four-messages" role="tabpanel"
                aria-labelledby="ar-custom-tabs-four-messages-tab">
                <!-- /.form-group -->
                <div class="form-group">
    <label for="urlAr">Meta Url</label>
    <input type="text" class="form-control" id="urlAr" name="urlAr"
        @if (!empty($rooms['urlAr'])) value="{{ $rooms['urlAr'] }}" @endif
        oninput="this.value = slugify(this.value);" />
</div>

<div class="form-group">
    <label for="metaTitleAr">Meta Başlık</label>
    <input type="text" class="form-control" id="metaTitleAr" name="metaTitleAr"
        @if (!empty($rooms['meta_titleAR'])) value="{{ $rooms['meta_titleAR'] }}" @endif />
</div>

<div class="form-group">
    <label for="metaContentAr">Meta Açıklama</label>
    <textarea class="form-control" id="metaContentAr" name="metaContentAr">
@if (!empty($rooms['meta_descriptionAr']))
{{ $rooms['meta_descriptionAr'] }}
@endif
</textarea>
</div>

<div class="form-group">
    <label for="metaKeyAr">Meta Keywords</label>
    <textarea class="form-control" id="metaKeyAr" name="metaKeyAr">
@if (!empty($rooms['meta_keyworsdAr']))
{{ $rooms['meta_keyworsdAr'] }}
@endif
</textarea>
</div>
                <!-- /.form-group -->
            </div>
        </div>
    </div>
</div>
