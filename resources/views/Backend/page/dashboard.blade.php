@extends('Backend.master')

@section('main')

<div class="page-content">

    {{-- =========================================================
        HEADER DASHBOARD
    ========================================================== --}}
    <div class="dashboard-header mb-4">
        <h4 class="dashboard-title mb-1">
            Dashboard
        </h4>

        <p class="dashboard-subtitle mb-0">
            Ringkasan informasi website Anda
        </p>
    </div>


    {{-- =========================================================
        STATISTIK UTAMA
    ========================================================== --}}
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">


        {{-- =====================================================
            TOTAL PORTFOLIO
        ====================================================== --}}
        <div class="col">

            <div class="card dashboard-card h-100">

                <div class="card-body">

                    <div class="d-flex align-items-center">

                        <div>

                            <p class="dashboard-label mb-1">
                                Total Portfolio
                            </p>

                            <h4 class="dashboard-number mb-0">
                                12
                            </h4>

                        </div>


                        <div class="dashboard-icon ms-auto">
                            <i class='bx bx-briefcase'></i>
                        </div>

                    </div>


                    <div class="dashboard-footer">

                        <span class="dashboard-status">
                            <i class='bx bx-check'></i>
                            Aktif
                        </span>

                        <span class="dashboard-description">
                            portfolio tersimpan
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
            TOTAL TEKNOLOGI
        ====================================================== --}}
        <div class="col">

            <div class="card dashboard-card h-100">

                <div class="card-body">

                    <div class="d-flex align-items-center">

                        <div>

                            <p class="dashboard-label mb-1">
                                Total Teknologi
                            </p>

                            <h4 class="dashboard-number mb-0">
                                15
                            </h4>

                        </div>


                        <div class="dashboard-icon ms-auto">
                            <i class='bx bx-code-alt'></i>
                        </div>

                    </div>


                    <div class="dashboard-footer">

                        <span class="dashboard-status">
                            <i class='bx bx-check'></i>
                            Tersedia
                        </span>

                        <span class="dashboard-description">
                            teknologi digunakan
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
            PENGALAMAN KERJA
        ====================================================== --}}
        <div class="col">

            <div class="card dashboard-card h-100">

                <div class="card-body">

                    <div class="d-flex align-items-center">

                        <div>

                            <p class="dashboard-label mb-1">
                                Pengalaman Kerja
                            </p>

                            <h4 class="dashboard-number mb-0">
                                6
                            </h4>

                        </div>


                        <div class="dashboard-icon ms-auto">
                            <i class='bx bx-user-check'></i>
                        </div>

                    </div>


                    <div class="dashboard-footer">

                        <span class="dashboard-status">
                            <i class='bx bx-check'></i>
                            Tersimpan
                        </span>

                        <span class="dashboard-description">
                            data pengalaman
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
            PESAN KONTAK
        ====================================================== --}}
        <div class="col">

            <div class="card dashboard-card h-100">

                <div class="card-body">

                    <div class="d-flex align-items-center">

                        <div>

                            <p class="dashboard-label mb-1">
                                Pesan Kontak
                            </p>

                            <h4 class="dashboard-number mb-0">
                                8
                            </h4>

                        </div>


                        <div class="dashboard-icon ms-auto">
                            <i class='bx bx-envelope'></i>
                        </div>

                    </div>


                    <div class="dashboard-footer">

                        <span class="dashboard-status">
                            <i class='bx bx-message'></i>
                            Pesan
                        </span>

                        <span class="dashboard-description">
                            pesan masuk
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =============================================================
    CSS DASHBOARD
============================================================= --}}
<style>

    /* =========================================================
       AREA DASHBOARD
    ========================================================= */

    .page-content {
        padding-top: 28px;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .dashboard-header {
        padding-left: 1px;
    }

    .dashboard-title {
        color: #172b4d;
        font-size: 28px;
        font-weight: 600;
        line-height: 1.2;
    }

    .dashboard-subtitle {
        color: #64748b;
        font-size: 15px;
    }


    /* =========================================================
       CARD
    ========================================================= */

    .dashboard-card {
        background: #ffffff;

        border: 1px solid #dfe3e8;

        border-radius: 8px;

        box-shadow: none;

        transition:
            border-color .2s ease,
            box-shadow .2s ease;
    }


    .dashboard-card:hover {
        border-color: #cbd1d8;

        box-shadow: 0 3px 10px rgba(0, 0, 0, .04);
    }


    /* =========================================================
       BODY CARD
    ========================================================= */

    .dashboard-card .card-body {
        padding: 20px;
    }


    /* =========================================================
       LABEL
    ========================================================= */

    .dashboard-label {
        color: #64748b;

        font-size: 15px;

        font-weight: 500;

        line-height: 1.4;
    }


    /* =========================================================
       ANGKA
    ========================================================= */

    .dashboard-number {
        color: #172b4d;

        font-size: 30px;

        font-weight: 600;

        line-height: 1.2;
    }


    /* =========================================================
       ICON
    ========================================================= */

    .dashboard-icon {

        width: 56px;
        height: 56px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #f5f6f8;

        border: 1px solid #e1e5ea;

        border-radius: 9px;

        color: #243b5a;

        font-size: 27px;

        flex-shrink: 0;
    }


    /* =========================================================
       FOOTER
    ========================================================= */

    .dashboard-footer {

        display: flex;

        align-items: center;

        gap: 8px;

        margin-top: 22px;

        padding-top: 13px;

        border-top: 1px solid #edf0f2;

        font-size: 13px;

        min-height: 30px;
    }


    /* =========================================================
       STATUS
    ========================================================= */

    .dashboard-status {

        display: inline-flex;

        align-items: center;

        gap: 3px;

        color: #16a34a;

        font-weight: 500;

        white-space: nowrap;
    }


    .dashboard-status i {
        font-size: 16px;
    }


    /* =========================================================
       DESKRIPSI
    ========================================================= */

    .dashboard-description {
        color: #64748b;

        font-size: 13px;

        white-space: nowrap;
    }


    /* =========================================================
       TABLET
    ========================================================= */

    @media (max-width: 991px) {

        .dashboard-title {
            font-size: 25px;
        }

        .dashboard-number {
            font-size: 27px;
        }

    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 576px) {

        .page-content {
            padding-top: 20px;
        }

        .dashboard-title {
            font-size: 23px;
        }

        .dashboard-subtitle {
            font-size: 14px;
        }

        .dashboard-card .card-body {
            padding: 18px;
        }

        .dashboard-number {
            font-size: 26px;
        }

        .dashboard-icon {
            width: 48px;
            height: 48px;
            font-size: 23px;
        }

        .dashboard-footer {
            flex-wrap: wrap;
            gap: 5px;
        }

    }

</style>

@endsection