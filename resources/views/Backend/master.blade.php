<!doctype html>
<html lang="id" class="semi-dark">

<head>
    <!-- Meta tag wajib -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="icon" href="{{ asset('Backend/assets/images/favicon-32x32.png') }}" type="image/png" />

    <!-- plugin -->
    <link href="{{ asset('Backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('Backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('Backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('Backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('Backend/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('Backend/assets/js/pace.min.js') }}"></script>
    <link href="{{ asset('Backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('Backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('Backend/assets/css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('Backend/assets/css/icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('Backend/assets/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('Backend/assets/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ asset('Backend/assets/css/header-colors.css') }}" rel="stylesheet" />

    <link href="{{ asset('flatpicker.css') }}" rel="stylesheet" />

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- plugin -->
    <link href="{{ asset('Backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">

    <title>Portofolio Pribadi</title>
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!-- sidebar wrapper -->
        @include('Backend.body.sidebar')
        <!-- akhir sidebar wrapper -->

        <!-- header -->
        @include('Backend.body.header')
        <!-- akhir header -->

        <!-- page wrapper -->
        <div class="page-wrapper">

            @yield('main')

        </div>
        <!-- akhir page wrapper -->

        <!-- overlay -->
        <div class="overlay toggle-icon"></div>
        <!-- akhir overlay -->

        <!-- tombol kembali ke atas -->
        <a href="javascript:;" class="back-to-top" title="Kembali ke atas"><i class='bx bxs-up-arrow-alt'></i></a>
        <!-- akhir tombol kembali ke atas -->

        <footer class="page-footer">
            <p class="mb-0">Hak Cipta &copy; {{ date('Y') }}. Seluruh hak dilindungi undang-undang.</p>
        </footer>
    </div>
    <!-- akhir wrapper -->


    <!-- modal pencarian -->
    <div class="modal" id="SearchModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header gap-2">
                    <div class="position-relative popup-search w-100">
                        <input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search"
                            placeholder="Cari...">
                        <span
                            class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i
                                class='bx bx-search'></i></span>
                    </div>
                    <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal"
                        aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="search-list">
                        <p class="mb-1">Template HTML</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action active align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-angular fs-4'></i>Template HTML Terbaik</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-vuejs fs-4'></i>Template HTML5</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-magento fs-4'></i>Template HTML5 Responsif</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-shopify fs-4'></i>Template HTML eCommerce</a>
                        </div>
                        <p class="mb-1 mt-3">Perusahaan Desain Web</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-windows fs-4'></i>Template HTML Terbaik</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-dropbox fs-4'></i>Template HTML5</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-opera fs-4'></i>Template HTML5 Responsif</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-wordpress fs-4'></i>Template HTML eCommerce</a>
                        </div>
                        <p class="mb-1 mt-3">Pengembangan Perangkat Lunak</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-mailchimp fs-4'></i>Template HTML Terbaik</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-zoom fs-4'></i>Template HTML5</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-sass fs-4'></i>Template HTML5 Responsif</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-vk fs-4'></i>Template HTML eCommerce</a>
                        </div>
                        <p class="mb-1 mt-3">Portal Belanja Online</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-slack fs-4'></i>Template HTML Terbaik</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-skype fs-4'></i>Template HTML5</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-twitter fs-4'></i>Template HTML5 Responsif</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-vimeo fs-4'></i>Template HTML eCommerce</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir modal pencarian -->


    <!-- switcher tema -->
    <div class="switcher-wrapper">
        <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
        </div>
        <div class="switcher-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-uppercase">Kustomisasi Tema</h5>
                <button type="button" class="btn-close ms-auto close-switcher" aria-label="Tutup"></button>
            </div>
            <hr />
            <h6 class="mb-0">Gaya Tema</h6>
            <hr />
            <div class="d-flex align-items-center justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode">
                    <label class="form-check-label" for="lightmode">Terang</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                    <label class="form-check-label" for="darkmode">Gelap</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark" checked>
                    <label class="form-check-label" for="semidark">Semi Gelap</label>
                </div>
            </div>
            <hr />
            <div class="form-check">
                <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
                <label class="form-check-label" for="minimaltheme">Tema Minimalis</label>
            </div>
            <hr />
            <h6 class="mb-0">Warna Header</h6>
            <hr />
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator headercolor1" id="headercolor1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor2" id="headercolor2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor3" id="headercolor3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor4" id="headercolor4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor5" id="headercolor5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor6" id="headercolor6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor7" id="headercolor7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor8" id="headercolor8"></div>
                    </div>
                </div>
            </div>
            <hr />
            <h6 class="mb-0">Warna Sidebar</h6>
            <hr />
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir switcher -->


    <!-- Bootstrap JS -->
    <script src="{{ asset('Backend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- plugin -->
    <script src="{{ asset('Backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        // Konfigurasi berbagai jenis input tanggal/waktu (flatpickr)
        $(".datepicker").flatpickr();

        $(".time-picker").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "Y-m-d H:i",
        });

        $(".date-time").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        $(".date-format").flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });

        $(".date-range").flatpickr({
            mode: "range",
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });

        $(".date-inline").flatpickr({
            inline: true,
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
    </script>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        $(function () {
            $(".knob").knob();
        });
    </script>
    <script src="{{ asset('Backend/assets/js/index.js') }}"></script>
    <!-- JS aplikasi -->
    <script src="{{ asset('Backend/assets/js/app.js') }}"></script>
    <script>
        new PerfectScrollbar(".app-container")
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if(Session::has('message'))
        <script>
            toastr.options = ({
                "progressBar": true,
                "closeBar": true
            })

            @if(Session::get('message')['type'] == 'success')
                toastr.success("{{ Session::get('message')['text'] }}");
            @elseif(Session::get('message')['type'] == 'error')
                toastr.error("{{ Session::get('message')['text'] }}");
            @endif
        </script>
    @endif


    <script src="{{ asset('Backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    <script>
        $(document).ready(function () {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>

</body>

</html>