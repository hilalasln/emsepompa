@extends('admin.layout.layout')
@section('content')
    <!-- Content Wrapper. Contains page content asdf-->
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
                        <div class="card card-primary card-outline card-outline-tabs">
                            <form name="cmsForm" id="cmsForm"
                                @if (empty($users['id'])) action="{{ url('NPanel/users/crud') }}" @else
                            action="{{ url('NPanel/users/crud/' . $users['id']) }}" @endif
                                method="post">
                                @csrf
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                                href="#custom-tabs-four-home" role="tab"
                                                aria-controls="custom-tabs-four-home" aria-selected="true">Kullanıcı
                                                Bilgileri</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                                href="#custom-tabs-four-profile" role="tab"
                                                aria-controls="custom-tabs-four-profile" aria-selected="false">Resim</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                                href="#custom-tabs-four-messages" role="tab"
                                                aria-controls="custom-tabs-four-messages" aria-selected="false">Şifre
                                                İşlemleri</a>
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
                                        <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-home-tab">

                                            <!-- SELECT2 EXAMPLE -->
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title">Kullanıcı Bilgileri</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <!-- /.form-group -->
                                                            <div class="form-group">
                                                                <label for="typeId">Kullanıcı Tipi</label>
                                                                <input type="text" class="form-control" id="typeId"
                                                                    name="typeId"
                                                                    @if (!empty($users['type'])) value="{{ $users['type'] }}" @endif />
                                                            </div>
                                                            <!-- /.form-group -->
                                                        </div>
                                                        <!-- /.col -->


                                                        <div class="col-md-4">
                                                            <!-- /.form-group -->
                                                            <div class="form-group">
                                                                <label for="name">Adı</label>
                                                                <input type="text" class="form-control" id="name"
                                                                    name="name"
                                                                    @if (!empty($users['name'])) value="{{ $users['name'] }}" @endif />
                                                            </div>
                                                            <!-- /.form-group -->
                                                        </div>
                                                        <!-- /.col -->

                                                        <div class="col-md-4">
                                                            <!-- /.form-group -->
                                                            <div class="form-group">
                                                                <label for="surname">Soyadı</label>
                                                                <input type="text" class="form-control" id="surname"
                                                                    name="surname"
                                                                    @if (!empty($users['surname'])) value="{{ $users['surname'] }}" @endif />
                                                            </div>
                                                            <!-- /.form-group -->
                                                        </div>
                                                        <!-- /.col -->

                                                        <div class="col-md-4">
                                                            <!-- /.form-group -->
                                                            <div class="form-group">
                                                                <label for="email">E-Posta</label>
                                                                <input type="text" class="form-control" id="email"
                                                                    name="email"
                                                                    @if (!empty($users['email'])) value="{{ $users['email'] }}" @endif />
                                                            </div>
                                                            <!-- /.form-group -->
                                                        </div>
                                                        <!-- /.col -->

                                                        <div class="col-md-4">
                                                            <!-- /.form-group -->
                                                            <div class="form-group">
                                                                <label for="mobile">Telefon</label>
                                                                <input type="text" class="form-control" id="mobile"
                                                                    name="mobile"
                                                                    @if (!empty($users['mobile'])) value="{{ $users['mobile'] }}" @endif />
                                                            </div>
                                                            <!-- /.form-group -->
                                                        </div>
                                                        <!-- /.col -->


                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="status">Durumu</label><br>
                                                                        <input type="checkbox" name="status"
                                                                            id="status" checked
                                                                            @if (!empty($users['status'] === 1)) checked @endif
                                                                            data-bootstrap-switch>
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
                                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-profile-tab">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="lfm" data-input="image" data-preview="holder"
                                                            class="btn btn-primary">
                                                            <i class="fa fa-picture-o"></i> Resim Seç
                                                        </a>
                                                    </span>
                                                    <input id="image" class="form-control" type="text"
                                                        name="image"
                                                        @if (!empty($users['image'])) value="{{ $users['image'] }}" @endif />
                                                </div>
                                                <div class="imageContent">
                                                    @if (isset($users['image']) && !empty($users['image']))
                                                        <img id="holder" style="margin-top:15px; max-height:100px;"
                                                            src="{{ asset($users['image']) }}">
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
                                        <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-messages-tab">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password">Şifre</label>
                                                            <input type="password" class="form-control" id="password"
                                                                name="password" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password2">Şifre Tekrar</label>
                                                            <input type="password" class="form-control" id="password2"
                                                                name="password2" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Bilgileri Kaydet</button>

                                    </div>
                                </div>
                            </form>
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
    document.addEventListener('DOMContentLoaded', function() {
        var password = document.getElementById("password");
        var password2 = document.getElementById("password2");

        function validatePassword() {
            if (password.value != password2.value) {
                password2.setCustomValidity("Şifreler eşleşmiyor");
            } else {
                password2.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        password2.onkeyup = validatePassword;
    });
</script>
