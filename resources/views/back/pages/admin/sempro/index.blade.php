@extends('back.layout.admin.pages-layout')
@section('pagetitle', @isset($pageTitle) ? $pagetitle : 'Seminar Proposal')
@push('stylesheets')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('back/library/datatables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('back/library/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Seminar Proposal</h1>
            </div>
            <div class="buttons">
                <a href="#" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah</a>
                <a href="#" class="btn btn-icon icon-left btn-info"><i class="fas fa-print"></i> Cetak</a>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <table class="display responsive nowrap table-striped" width="100%" id="sempro-table"
                                    aria-describedby="simkus">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('back/library/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back/library/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('back/library/datatables/responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('back/library/datatables/responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#sempro-table').dataTable({
            processing: true,
            info: true,
            responsive: true,
            fixedColumns: true,
            fixedHeader: true,
            ordering: false,
            ajax: "{{ route('admin.sempro.getSempro') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'actions',
                    name: 'actions'
                }
            ]
        });
    </script>
@endpush
