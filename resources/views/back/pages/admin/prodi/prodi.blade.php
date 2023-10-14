@extends('back.layout.admin.pages-layout')
@section('pagetitle', @isset($pageTitle) ? $pagetitle : 'Program Studi')
@push('stylesheets')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('back/datatables/datatables.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Program Studi</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="card-header-action">
                                    <a class="btn btn-success" href="javascript:void(0)" id="createNewProdi">Create New
                                        Prodi</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table myProdiTable">

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('back.components.prodi-modal')
@endsection

@push('scripts')
    <script src="{{ asset('back/datatables/datatables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.myProdiTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.prodi.index') }}",
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
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#createNewProdi').click(function() {
                $('#saveBtn').val("create-product");
                $('#prodi_id').val('');
                $('#prodiForm').trigger("reset");
                $('#modelHeading').html("Create New Product");
                $('#ajaxProdi').modal('show');
            });

            $('body').on('click', '.editProduct', function() {
                var prodi_id = $(this).data('id');
                $.get("{{ route('admin.prodi.index') }}" + '/' + prodi_id + '/edit', function(data) {
                    $('#modelHeading').html("Edit Product");
                    $('#saveBtn').val("edit-user");
                    $('#ajaxProdi').modal('show');
                    $('#prodi_id').val(data.id);
                    $('#nama').val(data.nama);
                    $('#singkatan').val(data.singkatan);
                    $('#jenjang').val(data.jenjang);
                })
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#prodiForm').serialize(),
                    url: "{{ route('admin.prodi.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {

                        $('#prodiForm').trigger("reset");
                        $('#ajaxProdi').modal('hide');
                        table.draw();

                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });

            $('body').on('click', '.deleteProduct', function() {

                var prodi_id = $(this).data("id");
                confirm("Are You sure want to delete !");

                $.ajax({
                    type: "DELETE",
                    url: "{{ route('admin.prodi.store') }}" + '/' + prodi_id,
                    success: function(data) {
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });
        });
    </script>
@endpush
