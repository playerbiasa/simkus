@extends('back.layout.admin.pages-layout')
@section('pagetitle', @isset($pageTitle) ? $pagetitle : 'Program Studi')
@push('stylesheets')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('back/library/datatables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('back/library/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Program Studi</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-8">
                        <div class="card card-primary">
                            <div class="card-body">
                                <table class="table table-striped nowrap" style="width:100%" id="prodi-table"
                                    aria-labelledby="simkus">
                                    <thead>
                                        <th>#</th>
                                        <th>Nama Prodi</th>
                                        <th>Singkatan</th>
                                        <th>Jenjang</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="card-header-action">
                                    <h4>Tambah Program Studi</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.prodi.add.prodi') }}" method="post" id="add-prodi-form">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama Program Studi</label>
                                        <input type="text" name="nama" class="form-control form-control-sm">
                                        <span class="text-danger error-text nama_error"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Singkatan</label>
                                        <input type="text" name="singkatan" class="form-control form-control-sm">
                                        <span class="text-danger-error-text singkatan_error"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenjang Studi</label>
                                        <input type="text" name="jenjang" class="form-control form-control-sm">
                                        <span class="text-danger error-text jenjang_error"></span>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('back.pages.admin.prodi.edit-prodi-modal')
@endsection

@push('scripts')
    <script src="{{ asset('back/library/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back/library/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function() {
            //add new prodi
            $('#add-prodi-form').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.code == 0) {
                            $.each(data.error, function(prefix, val) {
                                $(form).find('span.' + prefix + '_error').text(val[0]);
                            });
                        } else {
                            $(form)[0].reset();
                            $('#prodi-table').DataTable().ajax.reload(null, false);
                        }
                    }
                });
            });

            //get all prodi
            $('#prodi-table').DataTable({
                processing: true,
                info: true,
                responsive: true,
                ordering: false,
                ajax: "{{ route('admin.prodi.getprodi.list') }}",
                "pageLength": 5,
                "aLengthMenu": [
                    [5, 10, 25, -1],
                    [5, 10, 25, "All"]
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'singkatan',
                        name: 'singkatan'
                    },
                    {
                        data: 'jenjang',
                        name: 'jenjang'
                    },
                    {
                        data: 'actions',
                        name: 'actions'
                    },
                ]
            });

            $(document).on('click', '#editProdiBtn', function() {
                var prodi_id = $(this).data('id');
                $('.editProdi').find('form')[0].reset();
                $('.editProdi').find('span.error-text').text('');
                $.post('<?= route('admin.prodi.getprodi.details') ?>', {
                    prodi_id: prodi_id
                }, function(data) {
                    $('.editProdi').find('input[name="cid"]').val(data.details.id);
                    $('.editProdi').find('input[name="nama"]').val(data.details.nama);
                    $('.editProdi').find('input[name="singkatan"]').val(data.details.singkatan);
                    $('.editProdi').find('input[name="jenjang"]').val(data.details.jenjang);
                    $('.editProdi').modal('show');
                }, 'json');
            });

            //update prodi detail
            $('#update-prodi-form').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.code == 0) {
                            $.each(data.error, function(prefix, val) {
                                $(form).find('span.' + prefix + '_error').text(val[0]);
                            });
                        } else {
                            $('#prodi-table').DataTable().ajax.reload(null, false);
                            $('.editProdi').modal('hide');
                            // $(form)[0].reset();
                            $('.editProdi').find('form')[0].reset();
                        }
                    }
                });
            });

            //delete prodi record
            $(document).on('click', '#deleteProdiBtn', function() {
                var prodi_id = $(this).data('id');
                var url = '<?= route('admin.prodi.delete') ?>';

            });
        });
    </script>
@endpush
