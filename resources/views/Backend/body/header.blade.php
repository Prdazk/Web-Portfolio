<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">

            <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal"
                data-bs-target="#SearchModal">
                <input class="form-control px-5" type="search" placeholder="Cari...">
                <span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i
                        class='bx bx-search'></i></span>
            </div>


            <div class="top-menu ms-auto">

                <ul class="navbar-nav align-items-center gap-1">

                    <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal"
                        data-bs-target="#SearchModal">
                        <a class="nav-link" href="javascript:;"><i class='bx bx-search'></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown dropdown-laungauge d-none d-sm-flex">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                            data-bs-toggle="dropdown"><img src="{{ asset('Backend/assets/images/county/02.png') }}" width="22"
                                alt="Bendera bahasa">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                        src="{{ asset('Backend/assets/images/county/01.png') }}" width="20" alt="Bendera Indonesia"><span
                                        class="ms-2">Bahasa Indonesia</span></a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item dark-mode d-none d-sm-flex" style="display: none">
                        <a class="nav-link dark-mode-icon" href="javascript:;" title="Mode Gelap"><i class='bx bx-moon'></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown dropdown-app" style="display: none !important">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"
                            href="javascript:;"><i class='bx bx-grid-alt'></i></a>
                        <div class="dropdown-menu dropdown-menu-end p-0">
                            <div class="app-container p-2 my-2">
                                <div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2">

                                    <div class="col">
                                        <a href="javascript:;">
                                            <div class="app-box text-center">
                                                <div class="app-icon">
                                                    <img src="{{ asset('Backend/assets/images/app/slack.png') }}" width="30"
                                                        alt="Slack">
                                                </div>
                                                <div class="app-name">
                                                    <p class="mb-0 mt-1">Slack</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                </div><!--akhir row-->

                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown dropdown-large" style="display: none">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            data-bs-toggle="dropdown"><span class="alert-count">7</span>
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifikasi</p>
                                    <p class="msg-header-badge">8 Baru</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="{{ asset('Backend/assets/images/avatars/avatar-1.png') }}" class="msg-avatar"
                                                alt="Avatar pengguna">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Daisy Anderson<span class="msg-time float-end">5 detik yang
                                                    lalu</span></h6>
                                            <p class="msg-info">Contoh teks notifikasi</p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            <a href="javascript:;">
                                <div class="text-center msg-footer">
                                    <button class="btn btn-primary w-100">Lihat Semua Notifikasi</button>
                                </div>
                            </a>
                        </div>
                    </li>



                    <li class="nav-item dropdown dropdown-large" style="display: none">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span
                                class="alert-count">8</span>
                            <i class='bx bx-shopping-bag'></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">



                            <div class="header-message-list">



                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="position-relative">
                                            <div class="cart-product rounded-circle bg-light">
                                                <img src="{{ asset('Backend/assets/images/products/02.png') }}" class=""
                                                    alt="Gambar produk">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="cart-product-title mb-0">Kaos Putih Pria</h6>
                                            <p class="cart-product-price mb-0">1 X Rp 29.000</p>
                                        </div>
                                        <div class="">
                                            <p class="cart-price mb-0">Rp 250.000</p>
                                        </div>
                                        <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                        </div>
                                    </div>
                                </a>

                            </div>

                        </div>
                    </li>

                </ul>

            </div>

            <div class="user-box dropdown px-3">
                <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('Backend/assets/images/avatars/avatar-2.png') }}" class="user-img" alt="Avatar pengguna">
                    <div class="user-info">
                        <p class="user-name mb-0">Pauline Seitz</p>
                        <p class="designattion mb-0">Desainer Web</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                class="bx bx-user fs-5"></i><span>Profil</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                class="bx bx-cog fs-5"></i><span>Pengaturan</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                class="bx bx-home-circle fs-5"></i><span>Dashboard</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                class="bx bx-dollar-circle fs-5"></i><span>Penghasilan</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                class="bx bx-download fs-5"></i><span>Unduhan</span></a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/admin/logout">
                            <i class="bx bx-log-out-circle"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </div>

        </nav>
    </div>
</header>