<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="ru-custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="ru-custom-tabs-four-home-tab" data-toggle="pill"
                    href="#ru-custom-tabs-four-home" role="tab" aria-controls="ru-custom-tabs-four-home"
                    aria-selected="true">Ürün Bilgileri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ru-custom-tabs-four-messages-tab" data-toggle="pill"
                    href="#ru-custom-tabs-four-messages" role="tab" aria-controls="ru-custom-tabs-four-messages"
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
        <div class="tab-content" id="ru-custom-tabs-four-tabContent">
            <!-- Sayfa Bilgileri -->
            <div class="tab-pane fade show active" id="ru-custom-tabs-four-home" role="tabpanel"
                aria-labelledby="ru-custom-tabs-four-home-tab">

                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="titleRu">Ürün Adı</label>
                                    <input type="text" class="form-control" id="titleRu" name="titleRu"
                                        @if (!empty($rooms['titleRu'])) value="{{ $rooms['titleRu'] }}" @endif />
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->


                            <div class="col-md-12">
                                <div class="row">



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contentRu">Ürün Açıklaması</label><br>
                                            <textarea id="contentRu" name="contentRu" class="col-md-12 form-control summernote">
@if (!empty($rooms['contentRu']))
{{ $rooms['contentRu'] }}
@endif
</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="shortContentRu">Kullanım Alanları</label><br>
                                            <textarea id="shortContentRu" name="shortContentRu" class="col-md-12 form-control summernote">
@if (!empty($rooms['shortContentRu']))
{{ $rooms['shortContentRu'] }}
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
            <div class="tab-pane fade" id="ru-custom-tabs-four-messages" role="tabpanel"
                aria-labelledby="ru-custom-tabs-four-messages-tab">
                <!-- /.form-group -->
                <div class="form-group">
    <label for="urlRu">Meta Url</label>
    <input type="text" class="form-control" id="urlRu" name="urlRu"
        @if (!empty($rooms['urlRu'])) value="{{ $rooms['urlRu'] }}" @endif
        oninput="this.value = slugify(this.value);" />
</div>

<div class="form-group">
    <label for="metaTitleRu">Meta Başlık</label>
    <input type="text" class="form-control" id="metaTitleRu" name="metaTitleRu"
        @if (!empty($rooms['meta_titleRU'])) value="{{ $rooms['meta_titleRU'] }}" @endif />
</div>

<div class="form-group">
    <label for="metaContentRu">Meta Açıklama</label>
    <textarea class="form-control" id="metaContentRu" name="metaContentRu">
@if (!empty($rooms['meta_descriptionRu']))
{{ $rooms['meta_descriptionRu'] }}
@endif
</textarea>
</div>

<div class="form-group">
    <label for="metaKeyRu">Meta Keywords</label>
    <textarea class="form-control" id="metaKeyRu" name="metaKeyRu">
@if (!empty($rooms['meta_keyworsdRu']))
{{ $rooms['meta_keyworsdRu'] }}
@endif
</textarea>
</div>
                <!-- /.form-group -->
            </div>
        </div>
    </div>
</div>
