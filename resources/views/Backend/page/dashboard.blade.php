```blade
@extends('Backend.master')

@section('main')
    <div class="page-content">

        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">

            {{-- Total Pesanan --}}
            <div class="col">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">9526</h5>
                            <div class="ms-auto">
                                <i class='bx bx-cart fs-3 text-white'></i>
                            </div>
                        </div>

                        <div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
                            <div class="progress-bar bg-white"
                                role="progressbar"
                                style="width: 55%"
                                aria-valuenow="55"
                                aria-valuemin="0"
                                aria-valuemax="100">
                            </div>
                        </div>

                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Pesanan</p>
                            <p class="mb-0 ms-auto">
                                +4.2%
                                <span>
                                    <i class='bx bx-up-arrow-alt'></i>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Pendapatan --}}
            <div class="col">
                <div class="card radius-10 bg-gradient-ohhappiness">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">Rp8.323.000</h5>
                            <div class="ms-auto">
                                <i class='bx bx-dollar fs-3 text-white'></i>
                            </div>
                        </div>

                        <div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
                            <div class="progress-bar bg-white"
                                role="progressbar"
                                style="width: 55%"
                                aria-valuenow="55"
                                aria-valuemin="0"
                                aria-valuemax="100">
                            </div>
                        </div>

                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Pendapatan</p>
                            <p class="mb-0 ms-auto">
                                +1.2%
                                <span>
                                    <i class='bx bx-up-arrow-alt'></i>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Pengunjung --}}
            <div class="col">
                <div class="card radius-10 bg-gradient-ibiza">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">6200</h5>
                            <div class="ms-auto">
                                <i class='bx bx-group fs-3 text-white'></i>
                            </div>
                        </div>

                        <div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
                            <div class="progress-bar bg-white"
                                role="progressbar"
                                style="width: 55%"
                                aria-valuenow="55"
                                aria-valuemin="0"
                                aria-valuemax="100">
                            </div>
                        </div>

                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Pengunjung</p>
                            <p class="mb-0 ms-auto">
                                +5.2%
                                <span>
                                    <i class='bx bx-up-arrow-alt'></i>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Pesan --}}
            <div class="col">
                <div class="card radius-10 bg-gradient-moonlit">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">5630</h5>
                            <div class="ms-auto">
                                <i class='bx bx-envelope fs-3 text-white'></i>
                            </div>
                        </div>

                        <div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
                            <div class="progress-bar bg-white"
                                role="progressbar"
                                style="width: 55%"
                                aria-valuenow="55"
                                aria-valuemin="0"
                                aria-valuemax="100">
                            </div>
                        </div>

                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Pesan</p>
                            <p class="mb-0 ms-auto">
                                +2.2%
                                <span>
                                    <i class='bx bx-up-arrow-alt'></i>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div><!--end row-->

    </div>
@endsection
```