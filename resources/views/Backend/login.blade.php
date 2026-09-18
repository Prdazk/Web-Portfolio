<!doctype html>
<html lang="id">

    <head>

        <meta charset="utf-8" />
        <title>Masuk Admin & Dasbor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Template Admin & Dasbor Premium Multifungsi" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('Backend/assets/images/favicon.ico') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('Backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('Backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('Backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="index.html" class="auth-logo">
                                    <img src="{{ asset('Backend/assets/images/logo-dark.png') }}" height="30" class="logo-dark mx-auto" alt="Logo">
                                    <img src="{{ asset('Backend/assets/images/logo-light.png') }}" height="30" class="logo-light mx-auto" alt="Logo">
                                </a>
                            </div>
                        </div>

                        <h4 class="text-muted text-center font-size-18"><b>Masuk ke Akun Anda</b></h4>
                        <p class="text-muted text-center mb-0">Silakan masukkan email dan kata sandi Anda untuk melanjutkan</p>

                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="p-3">
                            <form class="form-horizontal mt-3" method="POST" action="/user-login">
                                {{ @csrf_field() }}

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <label for="email" class="form-label">Alamat Email</label>
                                        <input class="form-control" id="email" name="email" type="email" required
                                            placeholder="nama@contoh.com" autofocus>
                                    </div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <label for="password" class="form-label">Kata Sandi</label>
                                        <input class="form-control" id="password" name="password" type="password" required
                                            placeholder="Masukkan kata sandi">
                                    </div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                                            <label class="form-label ms-1" for="customCheck1">Ingat saya</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3 text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Masuk</button>
                                    </div>
                                </div>

                                <div class="form-group mb-0 row mt-2">
                                    <div class="col-sm-7 mt-3">
                                        <a href="auth-recoverpw.html" class="text-muted">
                                            <i class="mdi mdi-lock"></i> Lupa kata sandi Anda?
                                        </a>
                                    </div>
                                    <div class="col-sm-5 mt-3">
                                        <a href="auth-register.html" class="text-muted">
                                            <i class="mdi mdi-account-circle"></i> Buat akun baru
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- akhir form -->
                    </div>
                    <!-- akhir cardbody -->
                </div>
                <!-- akhir card -->
            </div>
            <!-- akhir container -->
        </div>
        <!-- akhir wrapper -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('Backend/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('Backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <script src="{{ asset('Backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('Backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('Backend/assets/libs/node-waves/waves.min.js') }}"></script>

        <script src="{{ asset('Backend/assets/js/app.js') }}"></script>

    </body>
</html>