@extends('admin.layout.layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $pageTitle }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                        <li class="breadcrumb-item active">{{ $pageTitle }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Language Tabs -->
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="language-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tr-tab" data-toggle="pill" href="#tr" role="tab" aria-controls="tr" aria-selected="true">Türkçe</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="en-tab" data-toggle="pill" href="#en" role="tab" aria-controls="en" aria-selected="false">İngilizce</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="ru-tab" data-toggle="pill" href="#ru" role="tab" aria-controls="ru" aria-selected="false">Rusça</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="ar-tab" data-toggle="pill" href="#ar" role="tab" aria-controls="ar" aria-selected="false">Arapça</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /Language Tabs -->

                    <!-- Tab Content -->
                    <div class="tab-content" id="language-tabs-content">
                        <div class="card card-primary card-outline card-outline-tabs">
                            <form name="cmsForm" id="cmsForm" @if (empty($categories['id'])) action="{{ url('NPanel/products/categories/crud') }}" @else action="{{ url('NPanel/products/categories/crud/' . $categories['id']) }}" @endif method="post">
                                @csrf
                                <div class="row">
                                    <!-- /Turkish Content -->
                                    <div class="col-12">
                                        <div class="tab-panel fade show active" id="tr" role="tabpanel" aria-labelledby="tr-tab">
                                            @include('admin.form.tr.categories.index', [
                                            'language' => 'tr',
                                            ])
                                        </div>
                                        <!-- /Turkish Content -->
                                        <!-- English Content -->
                                        <div class="tab-panel fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                                            @include('admin.form.en.categories.index', [
                                            'language' => 'en',
                                            ])
                                        </div>
                                        <!-- /English Content -->

                                        <!-- Russian Content -->
                                        <div class="tab-panel fade" id="ru" role="tabpanel" aria-labelledby="ru-tab">
                                            @include('admin.form.ru.categories.index', [
                                            'language' => 'ru',
                                            ])
                                        </div>
                                        <!-- /Russian Content -->


                                        <!-- Arabic Content -->
                                        <div class="tab-panel fade" id="ar" role="tabpanel" aria-labelledby="ar-tab">
                                            @include('admin.form.ar.categories.index', [
                                            'language' => 'ar',
                                            ])
                                        </div>
                                        <!-- /Arabic Content -->


                                    </div>


                                    <div class="col-12 mt-3 mb-3 pr-5">
                                        <button type="submit" class="btn btn-primary float-right">Bilgileri
                                            Kaydet</button>
                                    </div>



                                </div>

                            </form>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /Tab Content -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

<script>
    function slugify(text) {
        text = text.toLowerCase()
            .replace(/ğ/g, 'g')
            .replace(/ü/g, 'u')
            .replace(/ş/g, 's')
            .replace(/ı/g, 'i')
            .replace(/ö/g, 'o')
            .replace(/ç/g, 'c')
            .replace(/\s+/g, '-')
            .replace(/[^a-z0-9-]/g, '');
        return text;
    }
</script>