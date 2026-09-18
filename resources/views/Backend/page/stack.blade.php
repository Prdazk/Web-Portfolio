@extends('Backend.master')
@section('main')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <div class="page-content">
        <!-- breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Semua Kategori</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Semua Kategori</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="/add/banner" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalTambahKategori">
                        <i class="bx bx-plus"></i> Tambah Kategori
                    </a>
                </div>

                <!-- Modal Tambah -->
                <div class="modal fade" id="modalTambahKategori" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Data Kategori</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>

                            <div class="modal-body">

                                <form method="POST" action="/admin/add-stack" enctype="multipart/form-data">
                                    {{ @csrf_field() }}

                                    <div class="col-12">
                                        <label for="title" class="form-label">Nama Kategori</label>
                                        <input type="text" class="form-control" name="name" id="title"
                                            placeholder="Masukkan nama kategori" required>
                                    </div>
                                    <br>

                                    <div class="col-12">
                                        <label for="logo" class="form-label">Logo Kategori</label>
                                        <input type="file" class="form-control" name="logo" id="logo"
                                            accept="image/*">
                                    </div>

                                    <br>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="bx bx-save"></i> Simpan
                                    </button>

                                </form>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- akhir breadcrumb -->

        <hr />

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Logo</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($data as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        @if ($item->logo)
                                            <img src="{{ asset('upload/' . $item->logo) }}" alt="{{ $item->name }}"
                                                width="50" height="50" style="object-fit: cover; border-radius: 6px;">
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="/edit/hero/{{ $item->id }}" class="btn btn-info" title="Ubah Data"
                                            data-bs-toggle="modal" data-bs-target="#modalUbah{{ $item->id }}">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>

                                        </a>
                                        <a href="#" class="btn btn-danger delete-item" title="Hapus Data"
                                            data-id="{{ $item->id }}" style="margin-left: 15px">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-trash-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                </path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>

                                        </a>

                                    </td>

                                </tr>

                                <!-- Modal Ubah -->
                                <div class="modal fade" id="modalUbah{{ $item->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ubah Data Kategori</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Tutup"></button>
                                            </div>

                                            <div class="modal-body">

                                                <form method="POST" action="/admin/update-stack" enctype="multipart/form-data">
                                                    {{ @csrf_field() }}

                                                    <input type="hidden" name="id" value="{{ $item->id }}" />

                                                    <div class="col-12">
                                                        <label for="technology{{ $item->id }}" class="form-label">Nama Kategori</label>
                                                        <input type="text" class="form-control"
                                                            name="name" value="{{ $item->name }}" id="technology{{ $item->id }}" required>
                                                    </div>
                                                    <br>

                                                    <div class="col-12">
                                                        <label for="logo{{ $item->id }}" class="form-label">Logo Kategori</label>
                                                        @if ($item->logo)
                                                            <div class="mb-2">
                                                                <img src="{{ asset('upload/' . $item->logo) }}" alt="{{ $item->name }}"
                                                                    width="60" height="60" style="object-fit: cover; border-radius: 6px;">
                                                            </div>
                                                        @endif
                                                        <input type="file" class="form-control"
                                                            name="logo" id="logo{{ $item->id }}" accept="image/*">
                                                        <small class="text-muted">Kosongkan jika tidak ingin mengganti logo.</small>
                                                    </div>

                                                    <br>

                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="bx bx-save"></i> Simpan Perubahan
                                                    </button>

                                                </form>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada data kategori.</td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

    <script>
        $(document).on('click', '.delete-item', function (e) {
            e.preventDefault();
            var id = $(this).data('id');

            swal({
                title: "Apakah Anda yakin?",
                text: "Data yang sudah dihapus tidak dapat dikembalikan lagi!",
                icon: "warning",
                buttons: ["Batal", "Ya, Hapus!"],
                dangerMode: true,
            }).then((yakinHapus) => {
                if (yakinHapus) {
                    $.ajax({
                        url: '/admin/delete-stack/' + id,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function (response) {
                            swal("Berhasil!", "Data kategori telah dihapus.", "success");
                            window.location.reload();
                        },
                        error: function (xhr) {
                            swal("Gagal!", "Terjadi kesalahan saat menghapus data.", "error");
                        }
                    });
                } else {
                    swal("Aman!", "Data Anda tidak jadi dihapus.", "info");
                }
            });
        });
    </script>

@endsection