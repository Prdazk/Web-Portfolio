@extends('Backend.master')
@section('main')
<style>
    .description-cell {
        max-width: 250px;
        max-height: 100px;
        overflow-y: auto;
        overflow-x: hidden;
        word-wrap: break-word;
        overflow-wrap: break-word;
        white-space: normal;
    }

        #example th,
    #example td {
        word-wrap: break-word;
        vertical-align: top;
    }

    .gallery-thumb-wrapper {
        position: relative;
        display: inline-block;
        margin: 4px;
    }

    .gallery-thumb-wrapper img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #ddd;
    }

    .gallery-thumb-wrapper .btn-remove-gallery {
        position: absolute;
        top: -6px;
        right: -6px;
        background: #dc3545;
        color: #fff;
        border: none;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 12px;
        line-height: 1;
        cursor: pointer;
    }

    .gallery-container {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 8px;
    }
</style>
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Semua Proyek</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Semua Proyek</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="/add/banner" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleVerticallycenteredModal">
                        <i class="bx bx-plus"></i> Tambah Proyek
                    </a>
                </div>

                <!-- Modal Tambah -->
                <div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Proyek Baru</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>

                            <div class="modal-body">

                                <form method="POST" action="/admin/add-technology" enctype="multipart/form-data">
                                    {{ @csrf_field() }}

                                    <div class="row g-3">

                                        <div class="col-md-6">
                                            <label for="name" class="form-label">Nama Proyek</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Contoh: Sistem Manajemen Toko" required>
                                        </div>

                                     <div class="col-md-6">
                                            <label for="category" class="form-label">Kategori Proyek</label>
                                            <select class="form-control" name="category" id="category" required>
                                                <option value="" disabled selected>Pilih kategori</option>
                                                <option value="Web">Web</option>
                                                <option value="Mobile App">Mobile App</option>
                                                <option value="Desktop">Desktop</option>
                                                <option value="IoT">IoT</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="stack_id" class="form-label">Bahasa Pemrograman / Teknologi</label>
                                            <input type="text" class="form-control" name="stack_id" id="stack_id"
                                                placeholder="Contoh: Laravel, MySQL, Bootstrap" required>
                                        </div>

                                                    <div class="col-12">
                                                        <label for="description" class="form-label">Deskripsi Proyek</label>
                                                        <textarea class="form-control" name="description" id="description"
                                                            rows="4" placeholder="Jelaskan tentang proyek ini, fitur utama, teknologi yang digunakan, dsb." required></textarea>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="github_link" class="form-label">
                                                            <i class="bx bxl-github"></i> Link GitHub
                                                        </label>
                                                        <input type="url" class="form-control" name="github_link" id="github_link"
                                                            placeholder="https://github.com/username/repo">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="demo_link" class="form-label">
                                                            <i class="bx bx-link-external"></i> Link Demo / Live
                                                        </label>
                                                        <input type="url" class="form-control" name="demo_link" id="demo_link"
                                                            placeholder="https://contoh-demo.com">
                                                    </div>

                                            <div class="col-12">
                                                <label for="screenshot" class="form-label">Screenshot / Gambar Proyek</label>
                                                <input type="file" class="form-control" name="screenshot" id="screenshot"
                                                    accept="image/*" required>
                                                <div class="img-holder-add mt-2"></div>
                                            </div>

                                        </div>

                                    <br>

                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="bx bx-save"></i> Simpan Proyek
                                    </button>

                                </form>

                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!--end breadcrumb-->

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Proyek</th>
                              <th>Kategori / Stack</th>
                                <th>Deskripsi</th>
                                <th>Link</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $index => $item)
                                <tr>
                                    <td>{{ $index+1 }}</td>

                                    <td>
                                        @if ($item->screenshot)
                                            <img src="{{ asset('upload/' . $item->screenshot) }}"
                                                alt="{{ $item->name }}" width="90" style="border-radius: 6px; object-fit: cover;">
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </td>

                                    <td>{{ $item->name }}</td>
    
                                   <td>
                                        @if ($item->category)
                                            <span class="badge bg-info text-dark">{{ $item->category }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                        <br>
                                        @if ($item->stack_id)
                                            <span class="badge bg-primary mt-1">{{ $item->stack_id }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="description-cell">
                                            {{ \Illuminate\Support\Str::limit($item->description, 80) }}
                                        </div>
                                    </td>

                                    <td>
                                        @if ($item->github_link)
                                            <a href="{{ $item->github_link }}" target="_blank" class="btn btn-dark btn-sm mb-1" title="GitHub">
                                                <i class="bx bxl-github"></i>
                                            </a>
                                        @endif
                                        @if ($item->demo_link)
                                            <a href="{{ $item->demo_link }}" target="_blank" class="btn btn-success btn-sm mb-1" title="Demo">
                                                <i class="bx bx-link-external"></i>
                                            </a>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="#" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $item->id }}" title="Ubah">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>

                                        </a>
                                        <a href="#" class="btn btn-danger delete-item" data-id="{{ $item->id }}"
                                            style="margin-left: 10px" title="Hapus">

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
                                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ubah Proyek</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Tutup"></button>
                                            </div>

                                            <div class="modal-body">

                                                <form method="POST" action="/admin/update-technology"
                                                    enctype="multipart/form-data">
                                                    {{ @csrf_field() }}

                                                    <input type="hidden" name="id" value="{{ $item->id }}" />

                                                    <div class="row g-3">

                                                        <div class="col-md-6">
                                                            <label class="form-label">Nama Proyek</label>
                                                            <input type="text" class="form-control"
                                                                name="name" value="{{ $item->name }}" required>
                                                        </div>

                                        <div class="col-md-6">
                                            <label for="category" class="form-label">Kategori Proyek</label>
                                            <select class="form-control" name="category" id="category" required>
                                                <option value="Web" {{ $item->category == 'Web' ? 'selected' : '' }}>Web</option>
                                                <option value="Mobile App" {{ $item->category == 'Mobile App' ? 'selected' : '' }}>Mobile App</option>
                                                <option value="Desktop" {{ $item->category == 'Desktop' ? 'selected' : '' }}>Desktop</option>
                                                <option value="IoT" {{ $item->category == 'IoT' ? 'selected' : '' }}>IoT</option>
                                            </select>
                                        </div>

                                            <div class="col-md-6">
                                                <label for="stack_id" class="form-label">Bahasa Pemrograman / Teknologi</label>
                                                <input type="text" class="form-control" name="stack_id" id="stack_id"
                                                    value="{{ $item->stack_id }}"
                                                    placeholder="Contoh: Laravel, MySQL, Bootstrap" required>
                                            </div>

                                                        <div class="col-12">
                                                            <label class="form-label">Deskripsi Proyek</label>
                                                            <textarea class="form-control" name="description"
                                                                rows="4" required>{{ $item->description }}</textarea>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label">
                                                                <i class="bx bxl-github"></i> Link GitHub
                                                            </label>
                                                            <input type="url" class="form-control"
                                                                name="github_link" value="{{ $item->github_link }}">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label">
                                                                <i class="bx bx-link-external"></i> Link Demo / Live
                                                            </label>
                                                            <input type="url" class="form-control"
                                                                name="demo_link" value="{{ $item->demo_link }}">
                                                        </div>

                                                                                                              <div class="col-12">
                                                            <label class="form-label">Screenshot Utama</label>
                                                            @if ($item->screenshot)
                                                                <div class="mb-2">
                                                                    <img src="{{ asset('upload/' . $item->screenshot) }}"
                                                                        width="100" style="border-radius: 6px;">
                                                                </div>
                                                            @endif
                                                            <input type="file" class="form-control"
                                                                name="screenshot" accept="image/*">
                                                            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar utama.</small>
                                                        </div>

                                                    </div>

                                                    <br>

                                                    <button type="submit" class="btn btn-primary w-100">
                                                        <i class="bx bx-save"></i> Simpan Perubahan
                                                    </button>

                                                </form>

                                                <hr>

                                                <div class="gallery-section" data-technology-id="{{ $item->id }}">
                                                    <label class="form-label">
                                                        Galeri Gambar Proyek
                                                        <span class="text-muted gallery-count">({{ $item->images->count() }}/10)</span>
                                                    </label>

                                                    <div class="gallery-container">
                                                        @foreach ($item->images as $img)
                                                            <div class="gallery-thumb-wrapper" data-image-id="{{ $img->id }}">
                                                                <img src="{{ asset('upload/' . $img->image) }}">
                                                                <button type="button" class="btn-remove-gallery"
                                                                    data-id="{{ $img->id }}">&times;</button>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <input type="file" class="form-control gallery-input"
                                                        name="images[]" accept="image/*" multiple>
                                                    <button type="button" class="btn btn-secondary w-100 mt-2 btn-upload-gallery">
                                                        <i class="bx bx-upload"></i> Tambah Gambar ke Galeri
                                                    </button>
                                                    <small class="text-muted d-block mt-1">Maksimal 10 gambar total per proyek.</small>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>


                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>



    </div>


    <script>
        // Upload gambar galeri (tambah, bukan ganti)
        $(document).on('click', '.btn-upload-gallery', function() {
            var section = $(this).closest('.gallery-section');
            var techId = section.data('technology-id');
            var input = section.find('.gallery-input')[0];

            if (!input.files || input.files.length === 0) {
                swal("Oops!", "Pilih minimal 1 gambar terlebih dahulu.", "warning");
                return;
            }

            var currentCount = section.find('.gallery-thumb-wrapper').length;
            if (currentCount + input.files.length > 10) {
                swal("Oops!", "Total gambar tidak boleh lebih dari 10. Sisa slot: " + (10 - currentCount), "warning");
                return;
            }

            var formData = new FormData();
            for (var i = 0; i < input.files.length; i++) {
                formData.append('images[]', input.files[i]);
            }
            formData.append('_token', '{{ csrf_token() }}');

            var btn = $(this);
            btn.prop('disabled', true).text('Mengunggah...');

            $.ajax({
                url: '/admin/technology/' + techId + '/images',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        response.images.forEach(function(img) {
                            var thumb = $(
                                '<div class="gallery-thumb-wrapper" data-image-id="' + img.id + '">' +
                                '<img src="' + img.url + '">' +
                                '<button type="button" class="btn-remove-gallery" data-id="' + img.id + '">&times;</button>' +
                                '</div>'
                            );
                            section.find('.gallery-container').append(thumb);
                        });

                        var newCount = section.find('.gallery-thumb-wrapper').length;
                        section.find('.gallery-count').text('(' + newCount + '/10)');

                        input.value = '';
                        swal("Berhasil!", "Gambar berhasil ditambahkan.", "success");
                    } else {
                        swal("Gagal!", response.message || "Terjadi kesalahan.", "error");
                    }
                },
                error: function(xhr) {
                    var msg = (xhr.responseJSON && xhr.responseJSON.message)
                        ? xhr.responseJSON.message
                        : "Terjadi kesalahan saat mengunggah gambar.";
                    swal("Gagal!", msg, "error");
                },
                complete: function() {
                    btn.prop('disabled', false).html('<i class="bx bx-upload"></i> Tambah Gambar ke Galeri');
                }
            });
        });

        // Hapus 1 gambar dari galeri
        $(document).on('click', '.btn-remove-gallery', function() {
            var id = $(this).data('id');
            var wrapper = $(this).closest('.gallery-thumb-wrapper');
            var section = $(this).closest('.gallery-section');

            swal({
                title: "Hapus gambar ini?",
                icon: "warning",
                buttons: ["Batal", "Ya, Hapus!"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '/admin/technology/image/' + id,
                        type: 'DELETE',
                        data: { "_token": "{{ csrf_token() }}" },
                        success: function() {
                            wrapper.remove();
                            var newCount = section.find('.gallery-thumb-wrapper').length;
                            section.find('.gallery-count').text('(' + newCount + '/10)');
                            swal("Berhasil!", "Gambar telah dihapus.", "success");
                        },
                        error: function() {
                            swal("Ups!", "Gagal menghapus gambar.", "error");
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).on('click', '.delete-item', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            swal({
                title: "Apakah Anda yakin?",
                text: "Setelah dihapus, Anda tidak akan bisa memulihkan item ini!",
                icon: "warning",
                buttons: ["Batal", "Ya, Hapus!"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '/admin/delete-technology/' + id,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            swal("Berhasil!", "Proyek telah dihapus.", "success");
                            window.location.reload();
                        },
                        error: function(xhr) {
                            swal("Ups!", "Terjadi kesalahan saat menghapus data.", "error");
                        }
                    });
                } else {
                    swal("Aman!", "Data Anda tidak jadi dihapus.", "info");
                }
            });
        });
    </script>

@endsection