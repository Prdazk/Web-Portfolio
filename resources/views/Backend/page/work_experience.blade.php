@extends('Backend.master')
@section('main')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>


    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Semua Pengalaman</div>
            
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Semua Pengalaman</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="/add/banner" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleVerticallycenteredModal">Tambah Pengalaman</a>
                </div>

            

                <!-- Modal -->
                <div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Masukkan Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>

                            <div class="modal-body">

                                <form method="POST" action="/admin/add-experience" id="experienceForm">
                                    {{ @csrf_field() }}

                                    <div class="col-12">
                                        <label for="cname" class="form-label">Nama Perusahaan</label>
                                        <input type="text" class="form-control" name="company_name" id="cname"
                                            placeholder="Nama Perusahaan">
                                    </div>
                                    <br>

                                    <div class="col-12">
                                        <label for="designation" class="form-label">Jabatan</label>
                                        <input type="text" class="form-control" name="designation" id="designation"
                                            placeholder="Jabatan">
                                    </div>

                                    <br>

                                    <div class="mb-3">
                                        <label class="form-label">Rentang Tanggal</label>
                                        <input type="text" name="date" class="form-control date-range" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tambah Tanggung Jawab</label>
                                        <textarea rows="6" class="form-control" name="responsiblity" id="editor"></textarea>
                                    </div>

                                   


                                    <button type="submit" class="btn btn-primary">Kirim</button>

                                </form>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>

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
                                    <th>Nama Perusahaan</th>  
                                    <th>Jabatan</th>         
                                    <th>Tanggal</th>          
                                    <th>Tanggung Jawab</th>   
                                    <th>Aksi</th>              
                                </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->company_name }}</td>
                                    <td>{{ $item->designation }} </td>

                                    @php
                                    // Diasumsikan $item->date dalam format "2024-04-16 to 2024-04-25"
                                    $dateRange = explode(' to ', $item->date);
                                    $start = \Carbon\Carbon::parse($dateRange[0])->format('Y-M');
                                    $end = \Carbon\Carbon::parse($dateRange[1])->format('Y-M');
                                @endphp

                                    <td>{{ $start }} s/d {{ $end }}</td>

                                    <td>{!! $item->responsiblity !!}</td>

                                    <td>
                                        <a href="/admin/edit/experience/{{ $item->id }}" class="btn btn-info"
                                            >

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>


                                        </a>
                                        <a href="#" class="btn btn-danger delete-item" data-id="{{ $item->id }}"
                                            style="margin-left: 15px">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-trash-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                </path>
                                                <line x1="10" y1="11" x2="10" y2="17">
                                                </line>
                                                <line x1="14" y1="11" x2="14" y2="17">
                                                </line>
                                            </svg>

                                        </a>

                                    </td>

                                </tr>

                                
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>



    </div>

    

    

    

<script>
        ClassicEditor
    .create(document.querySelector('#editor'))
    .then(editor => {
        const form = document.querySelector('#experienceForm');

        form.addEventListener('submit', function() {
            document.querySelector('#editor').value = editor.getData();
        });
    })
    .catch(error => {
        console.error(error);
    });
</script>








    <script>
        // Reset input file
        $('input[type="file"][name="avatar"]').val('');

        // Pratinjau gambar
        $('input[type="file"][name="avatar"]').on('change', function() {

            var img_path = $(this)[0].value;
            var img_holder = $('.img-holder');
            var extension = img_path.substring(img_path.lastIndexOf('.') + 1).toLowerCase();

            $('.avatarPreview').hide();

            if (extension == 'jpeg' || extension == 'jpg' || extension == 'png') {
                if (typeof(FileReader) != 'undefined') {
                    img_holder.empty();
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('<img/>', {
                            'src': e.target.result,
                            'class': 'img-fluid',
                            'style': 'max-width:100px;margin-bottom:10px;'
                        }).appendTo(img_holder);
                    }
                    img_holder.show();
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                    $(img_holder).html('Browser ini tidak mendukung FileReader');
                }
            } else {
                $(img_holder).empty();
            }
        });
    </script>


    <script>
        $(document).on('click', '.delete-item', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            swal({
                    title: "Apakah Anda yakin?",
                    text: "Setelah dihapus, Anda tidak akan bisa memulihkan item ini!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: '/admin/delete-experience/' + id, // Sesuaikan URL dengan route Anda
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                swal("Berhasil! Item Anda telah dihapus!", {
                                    icon: "success",
                                });
                                // Perbarui tabel setelah berhasil menghapus
                                window.location.reload();
                            },
                            error: function(xhr) {
                                swal("Ups!", "Terjadi kesalahan!", "error");
                            }
                        });
                    } else {
                        swal("Item Anda aman!");
                    }
                });
        });
    </script>
@endsection