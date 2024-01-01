@extends('back.layout.admin.pages-layout')
@section('pagetitle', @isset($pageTitle) ? $pagetitle : 'Mahasiswa')
@push('stylesheets')
    <link href="{{ asset('back/library/datatables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('back/library/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/src/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Mahasiswa</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="card-header-action">
                                    <a href="{{ route('admin.mhs.create') }}" class="btn btn-primary">Tambah</a>
                                    <button class="btn btn-info" data-toggle="modal"
                                        data-target="#importExcel">Import</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-md table-striped nowrap" id="mhs-table"
                                        aria-describedby="simkus">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>NIM</th>
                                                <th>Nama</th>
                                                <th>Program Studi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('back.pages.admin.mahasiswa.import-modal')
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('back/library/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back/library/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('front/src/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    @if (Session::has('success'))
        <script type="text/javascript">
            Swal.fire({
                title: "Berhasil",
                text: "{{ Session::get('success') }}",
                icon: "success"
            });
        </script>
    @endif

    <script>
        $(function() {
            //get all prodi
            $('#mhs-table').DataTable({
                processing: true,
                info: true,
                responsive: true,
                ordering: false,
                ajax: "{{ route('api.getDataMhs') }}",
                type: 'GET',
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
                        data: 'nim',
                        name: 'nim'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'prodi.nama',
                        name: 'prodi.nama'
                    },
                    {
                        data: 'actions',
                        name: 'actions'
                    },
                ]
            });
        });
    </script>
@endpush
