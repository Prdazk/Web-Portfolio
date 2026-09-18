@extends('Backend.master')
@section('main')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>


    <div class="page-content">
        <!-- breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Ubah Pengalaman Kerja</div>

            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah Pengalaman Kerja</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!-- akhir breadcrumb -->

        <hr />
        <div class="card">
            <div class="card-body">
                <h5 class="mb-4">Ubah Data Pengalaman Kerja</h5>

                <form class="row g-3" method="post" action="/admin/update-experience">
                    {{ @csrf_field() }}

                    <input type="hidden" name="id" value="{{ $data->id }}" />

                    <div class="col-md-12">
                        <label for="company_name" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" name="company_name" value="{{ $data->company_name }}"
                            id="company_name" placeholder="Masukkan nama perusahaan" required>
                    </div>

                    <div class="col-md-12">
                        <label for="designation" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" name="designation" id="designation"
                            value="{{ $data->designation }}" placeholder="Masukkan jabatan" required>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="date">Rentang Tanggal</label>
                        <input type="text" name="date" id="date" class="form-control date-range"
                            value="{{ $data->date }}" placeholder="Contoh: Jan 2020 - Des 2022" required>
                    </div>

                    <div class="col-md-12">
                        <label for="editor" class="form-label">Tanggung Jawab</label>
                        <textarea class="form-control" id="editor" name="responsiblity" rows="3">{{ $data->responsiblity }}</textarea>
                    </div>

                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bx bx-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection