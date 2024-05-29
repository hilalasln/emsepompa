<?php

use App\Models\RoomsAndFeatures;

// Blade dosyasının devamı...

?>
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="language-tabs" role="tablist">
                             <li class="nav-item">
                                <a class="nav-link active" id="tr-tab" data-toggle="pill" href="#tr" role="tab" aria-controls="tr" aria-selected="true">Türkçe</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="en-tab" data-toggle="pill" href="#en" role="tab" aria-controls="en" aria-selected="false">İngilizce</a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" id="ru-tab" data-toggle="pill" href="#ru" role="tab" aria-controls="ru" aria-selected="false">Rusça</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="ar-tab" data-toggle="pill" href="#ar" role="tab" aria-controls="ar" aria-selected="false">Arapça</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="language-tabs-content">
                        <div class="card card-primary card-outline card-outline-tabs">
                        <form name="roomsForm" id="roomsForm" action="{{ url('NPanel/products/crud' . (isset($rooms['id']) ? '/' . $rooms['id'] : '')) }}" method="post">
    @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="tab-content">
                                            

                                            <!-- Turkish Content -->
                                            <div class="tab-pane fade show active" id="tr" role="tabpanel" aria-labelledby="tr-tab">
                                                @include('admin.form.tr.products.index', ['language' => 'tr'])
                                            </div>
                                            <!-- /Turkish Content -->
                                            <!-- English Content -->
                                            <div class="tab-pane fade " id="en" role="tabpanel" aria-labelledby="en-tab">
                                                @include('admin.form.en.products.index', ['language' => 'en'])
                                            </div>
                                            <!-- /English Content -->

                                            <!-- Russian Content -->
                                            <div class="tab-pane fade" id="ru" role="tabpanel" aria-labelledby="ru-tab">
                                                @include('admin.form.ru.products.index', ['language' => 'ru'])
                                            </div>
                                            <!-- /Russian Content -->

                                            <!-- Arabic Content -->
                                            <div class="tab-pane fade" id="ar" role="tabpanel" aria-labelledby="ar-tab">
                                                @include('admin.form.ar.products.index', ['language' => 'ar'])
                                            </div>
                                            <!-- /Arabic Content -->
                                        </div>
                                    </div>
                                    <input type="hidden" id="roomSelectedId" value="{{ isset($rooms['id']) ? $rooms['id'] : '' }}">
                                    <div class="col-12 mt-5 mb-5 pr-5">
                                        <button type="submit" class="btn btn-primary float-right">Bilgileri Kaydet</button>
                                    </div>
                                   
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
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
            .replace(/\s+/g, '-') // boşlukları tire ile değiştir
            .replace(/[^a-z0-9-]/g, ''); // harf, rakam ve tire dışındaki karakterleri temizle
        return text;
    }
</script>
