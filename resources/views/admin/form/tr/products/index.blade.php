<div class="card card-primary card-outline card-outline-tabs">

    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Ürün Bilgileri</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Dosya
                    Yönetmi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">SEO
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
            <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">

                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">


                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="title">Ürün Adı</label>
                                    <input type="text" class="form-control" id="title" name="title" @if (!empty($rooms['title'])) value="{{ $rooms['title'] }}" @endif />
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categories">Kategori</label>
                                    <select class="duallistbox" style="width: 100%;" name="categories[]" id="categories" multiple>
                                        @foreach ($allCategories as $subCategories)
                                        @php
                                        $subCategoryTitle = '';
                                        if ($subCategories['subId'] > 0) {
                                        foreach ($allCategories as $category) {
                                        if ($category['id'] == $subCategories['subId']) {
                                        $subCategoryTitle = $category['title'];
                                        break;
                                        }
                                        }
                                        }
                                        @endphp
                                        @if ($subCategoryTitle)
                                        <option value="{{ $subCategories['id'] }}" {{ !empty($rooms['category_id']) && $rooms['category_id'] == $subCategories['id'] ? 'selected' : '' }} {{ in_array($subCategories['id'], $selectedCategory) ? 'selected' : '' }}>
                                            {{ $subCategoryTitle }} > {{ $subCategories['title'] }}
                                        </option>
                                        @else
                                        <option value="{{ $subCategories['id'] }}" {{ !empty($rooms['category_id']) && $rooms['category_id'] == $subCategories['id'] ? 'selected' : '' }} {{ in_array($subCategories['id'], $selectedCategory) ? 'selected' : '' }}>
                                            {{ $subCategories['title'] }}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="title">Ürün Kodu</label>
                                            <input type="text" class="form-control" id="code" name="code" @if (!empty($rooms['code'])) value="{{ $rooms['code'] }}" @endif />
                                        </div>

                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="status">Durumu</label><br>
                                            <input type="checkbox" name="status" id="status" checked @if (!empty($rooms['status']===1)) checked @endif data-bootstrap-switch>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="home_page">Anasayfada Göster</label><br>
                                            <input type="checkbox" name="home_page" id="home_page" @if (!empty($rooms['home_page']===1)) checked @endif data-bootstrap-switch>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="content">Ürün Açıklaması</label><br>
                                            <textarea id="content" name="content" class="col-md-12 form-control summernote">
@if (!empty($rooms['content']))
{{ $rooms['content'] }}
@endif
</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="shortContent">Kullanım Alanları</label><br>
                                            <textarea id="shortContent" name="shortContent" class="col-md-12 form-control summernote">
@if (!empty($rooms['shortContent']))
{{ $rooms['shortContent'] }}
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


            <!-- Dosya Yönetimi -->

            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                <div class="row">
                    @for ($i = 1; $i <= 12; $i++) <div class="col-md-4">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm{{ $i }}" data-input="image{{ $i }}" data-preview="holder{{ $i }}" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Resim Seç
                                    </a>
                                </span>
                                <input id="image{{ $i }}" class="form-control" type="text" name="image{{ $i }}" @if (!empty($roomImages["image{$i}"])) value="{{ $roomImages["image{$i}"] }}" @endif />
                            </div>
                            <div class="imageContent" style="height: 150px">
                                @php
                                $imageExists = false;
                                @endphp
                                @foreach ($roomImages as $roomImage)
                                @if ($roomImage['room_id'] == $rooms['id'] && $roomImage['image_id'] == $i)
                                <div>
                                    <img id="holder{{ $i }}" style="margin-top:15px; max-height:100px;" src="{{ asset($roomImage['image_path']) }}">
                                    <button type="button" class="btn btn-danger delete-image" data-image-id="{{ $roomImage['id'] }}">
                                        Sil
                                    </button>
                                </div>
                                @php
                                $imageExists = true;
                                @endphp
                                @endif
                                @endforeach
                                @if (!$imageExists)
                                <img id="holder{{ $i }}" style="display: none;">
                                @endif
                            </div>
                        </div>
                </div>
                @endfor
            </div>
        </div>
      
        <script>
    @for($i = 1; $i <= 12; $i++)
    var route_prefix{{ $i }} = "{{ asset('NPanel/laravel-filemanager') }}";
    $('#lfm{{ $i }}').filemanager('image', {
        prefix: route_prefix{{ $i }}
    });

    // Silme butonunun tıklanma olayını dinleyelim
    $('.delete-image').click(function() {
        var imageId = $(this).data('image-id');
        var deleteUrl = "/NPanel/rooms/images/delete" + (imageId ? "/" + imageId : "");

        // Ajax isteği gönderelim
        $.ajax({
            url: deleteUrl,
            type: 'POST',
            data: {
                image_id: imageId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log('Görsel silindi:', imageId);
                // Silme işlemi başarılı olduysa, görseli sayfadan kaldırabiliriz
                $('#holder{{ $i }}').parent().remove();
            },
            error: function(xhr, status, error) {
                console.error('Silme hatası:', error);
                // Hata durumunda kullanıcıya uygun mesajı gösterebiliriz
            }
        });
    });
    @endfor
</script>





        <!-- SEO Ayarları -->
        <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
            <!-- /.form-group -->
            <div class="form-group">
                <label for="url">Meta Url</label>
                <input type="text" class="form-control" id="url" name="url" @if (!empty($rooms['url'])) value="{{ $rooms['url'] }}" @endif oninput="this.value = slugify(this.value);" />
            </div>

            <div class="form-group">
                <label for="metaTitle">Meta Başlık</label>
                <input type="text" class="form-control" id="metaTitle" name="metaTitle" @if (!empty($rooms['meta_title'])) value="{{ $rooms['meta_title'] }}" @endif />
            </div>
            <div class="form-group">
                <label for="metaContent">Meta Açıklama</label>
                <textarea class="form-control" id="metaContent" name="metaContent">
@if (!empty($rooms['meta_description']))
{{ $rooms['meta_description'] }}
@endif
</textarea>
            </div>
            <div class="form-group">
                <label for="metaKey">Meta Keywords</label>
                <textarea class="form-control" id="metaKey" name="metaKey">
@if (!empty($rooms['meta_keywords']))
{{ $rooms['meta_keywords'] }}
@endif
</textarea>
            </div>
            <!-- /.form-group -->
        </div>
    </div>
</div>
</div>