<!doctype html>
<html lang="id" class="semi-dark">


<head>
    <!-- Meta tag wajib -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('Backend/assets/images/Login.png') }}" type="image/png" />
    <!--plugin-->
    <link href="{{ asset('Backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('Backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('Backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('Backend/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('Backend/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('Backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('Backend/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('Backend/assets/css/icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Lupa Kata Sandi</title>
</head>

<body class="">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-cover">
            <div class="">
                <div class="row g-0">
                    <div
                        class="col-12 col-xl-7 col-xxl-8 auth-cover-left bg-gradient-branding align-items-center justify-content-center d-none d-xl-flex">
                        <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
                            <div class="card-body">
                                <img src="{{ asset('Backend/assets/images/login-images/forgot-password-cover.svg') }}"
                                    class="img-fluid" width="600" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
                        <div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
                            <div class="card-body p-sm-5">
                                <div class="p-3">
                                    <div class="text-center">
                                        <img src="{{ asset('Backend/assets/images/icons/forgot-2.png') }}"
                                            width="100" alt="" />
                                    </div>
                                    <h4 class="mt-5 font-weight-bold">Lupa Kata Sandi?</h4>
                                    <p class="text-muted">Masukkan email terdaftar Anda untuk mengatur ulang kata sandi</p>

                                    <form method="POST" action="/forgot-password">
                                        {{ @csrf_field() }}
                                        <div class="my-4">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control" placeholder="example@user.com"
                                                type="email" name="email" :value="old('email')" required />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                            <a href="/login" class="btn btn-light"><i
                                                    class='bx bx-arrow-back me-1'></i>Kembali ke
                                                Login</a>
                                        </div>




                                    </form>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--akhir row-->
            </div>
        </div>
    </div>
    <!--akhir wrapper-->



    <!-- Bootstrap JS -->
    <script src="{{ asset('Backend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugin-->
    <script src="{{ asset('Backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!--Script tampilkan & sembunyikan kata sandi -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <!--app JS-->
    <script src="{{ asset('Backend/assets/js/app.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (Session::has('message'))
        <script>
            toastr.options = ({
                "progressBar": true,
                "closeBar": true
            })

            @if (Session::get('message')['type'] == 'success')
                toastr.success("{{ Session::get('message')['text'] }}");
            @elseif (Session::get('message')['type'] == 'error')
                toastr.error("{{ Session::get('message')['text'] }}");
            @endif
        </script>
    @endif




</body>


<!-- Mirrored from codervent.com/rukada/demo/vertical/ltr/auth-cover-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Apr 2024 02:10:31 GMT -->

</html>