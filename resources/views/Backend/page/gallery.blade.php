@extends('Backend.master')
@section('main')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <div class="page-content">
        <!-- breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Galeri Produk</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Galeri Produk</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="/add/banner" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalTambahGaleri">
                        <i class="bx bx-plus"></i> Tambah Galeri Produk
                    </a>
                </div>

                <!-- Modal Tambah -->
                <div class="modal fade" id="modalTambahGaleri" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Data Galeri</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>

                            <div class="modal-body">
                                <form method="POST" action="/admin/add-product-gallery" enctype="multipart/form-data">
                                    {{ @csrf_field() }}

                                    <div class="col-md-12">
                                        <label for="input7" class="form-label">Pilih Produk</label>
                                        <select id="input7" name="product_id" class="form-select" required>
                                            <option selected disabled value="">-- Silakan pilih produk --</option>
                                            @foreach($product as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <br>

                                    <div class="col-12">
                                        <label for="avatar" class="form-label">Foto / Gambar Produk</label>
                                        <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" required>
                                        <small class="text-muted">Format yang didukung: JPG, JPEG, PNG</small>
                                        <br><br>
                                        <div class="img-holder"></div>
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
                                <th>Gambar</th>
                                <th>Nama Produk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <img class="avatarPreview rounded"
                                             src="{{ asset('upload/' . $item->avatar) }}"
                                             alt="Gambar {{ $item->product->name ?? 'Produk' }}"
                                             width="80" height="80">
                                    </td>
                                    <td>{{ $item->product->name ?? '-' }}</td>
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
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Modal Ubah -->
                                <div class="modal fade" id="modalUbah{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ubah Data Galeri Produk</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Tutup"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form method="POST" action="/admin/update-product-gallery" enctype="multipart/form-data">
                                                    {{ @csrf_field() }}
                                                    <input type="hidden" name="id" value="{{ $item->id }}" />

                                                    <div class="col-md-12">
                                                        <label for="input7" class="form-label">Pilih Produk</label>
                                                        <select id="input7" name="product_id" class="form-select" required>
                                                            <option selected disabled value="">-- Silakan pilih produk --</option>
                                                            @foreach($product as $p)
                                                                <option value="{{ $p->id }}" @if($p->id == $item->product_id) selected @endif>
                                                                    {{ $p->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <br>

                                                    <div class="col-12">
                                                        <label for="avatar" class="form-label">Foto / Gambar Produk</label>
                                                        <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
                                                        <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
                                                        <br><br>
                                                        <img class="avatarPreview rounded" src="{{ asset('upload/' . $item->avatar) }}"
                                                             alt="Pratinjau" width="100" height="100">
                                                        <div class="img-holder"></div>
                                                    </div>
                                                    <br>

                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="bx bx-save"></i> Simpan Perubahan
                                                    </button>
                                                </form>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada data galeri produk.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Reset input file saat halaman dimuat
        $('input[type="file"][name="avatar"]').val('');

        // Pratinjau gambar sebelum diunggah
        $('input[type="file"][name="avatar"]').on('change', function () {
            var pathGambar = $(this)[0].value;
            var wadahGambar = $(this).closest('.col-12').find('.img-holder');
            var ekstensi = pathGambar.substring(pathGambar.lastIndexOf('.') + 1).toLowerCase();

            $(this).closest('.modal-body').find('.avatarPreview').hide();

            if (ekstensi === 'jpeg' || ekstensi === 'jpg' || ekstensi === 'png') {
                if (typeof (FileReader) !== 'undefined') {
                    wadahGambar.empty();
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('<img/>', {
                            src: e.target.result,
                            class: 'img-fluid rounded',
                            style: 'max-width:100px;margin-bottom:10px;'
                        }).appendTo(wadahGambar);
                    };
                    wadahGambar.show();
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                    wadahGambar.html('Peramban ini tidak mendukung pratinjau gambar (FileReader).');
                }
            } else {
                wadahGambar.empty();
            }
        });
    </script>

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
                        url: '/admin/delete-product-gallery/' + id,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function (response) {
                            swal("Berhasil!", "Data galeri produk telah dihapus.", "success");
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