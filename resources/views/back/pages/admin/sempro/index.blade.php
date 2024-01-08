@extends('back.layout.admin.pages-layout')
@section('pagetitle', @isset($pageTitle) ? $pagetitle : 'Seminar Proposal')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('back/library/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/src/plugins/sweetalert2/sweetalert2.min.css') }}">
@endpush

@section('content')
    <style>
        .ui-autocomplete {
            z-index: 2147483647;
        }
    </style>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Seminar Proposal</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="buttons">
                            <button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal"
                                data-target="#semproModal"><i class="far fa-edit"></i>
                                Tambah</button>
                            <button type="button" class="btn btn-icon icon-left btn-info"><i class="fas fa-print"></i>
                                Cetak</button>
                        </div>
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md" aria-labelledby="simkus">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Prodi</th>
                                                <th>Tanggal Daftar</th>
                                                <th>Batch</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sempros as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->mahasiswa->nama }}</td>
                                                    <td>{{ $item->mahasiswa->prodi->nama }}</td>
                                                    <td>{{ $item->created_at->isoFormat('D MMMM YYYY') }}</td>
                                                    <td>{{ $item->batch->nama }} - {{ $item->batch->kegiatan->nama }} -
                                                        {{ $item->batch->tahun }}
                                                    </td>
                                                    <td>{!! getStatusSkripsi($item->status) !!}</td>
                                                    <td>
                                                        <div class="btn-group mb-2">
                                                            <button class="btn btn-info btn-sm dropdown-toggle"
                                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">option
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.sempro.edit', $item->id) }}">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.sempro.status', $item->id) }}">Ubah
                                                                    Daftar</a>
                                                                @if ($item->status == 2)
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admin.sempro.addpenguji', $item->id) }}">Set
                                                                        Penguji</a>
                                                                @endif
                                                                <form
                                                                    action="{{ route('admin.sempro.delete', $item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button"
                                                                        class="dropdown-item show_confirm"
                                                                        style="font-size: 14px">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('back.pages.admin.sempro.daftar-modal')
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('back/library/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('front/src/plugins/ckeditor5/ckeditor.js') }}"></script>
    <script src="{{ asset('front/src/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Page Specific JS File -->
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
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {

            $("#nim").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('api.getMhs') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    // $('#nim').val(ui.item.label);
                    $('#nim').val(ui.item.nim);
                    $('#mahasiswa_id').val(ui.item.id);
                    $('#nama').val(ui.item.nama);
                    $('#prodi_id').val(ui.item.prodi);
                    return false;
                }
            });
        });

        ClassicEditor
            .create(document.querySelector('.editorck'), {
                removePlugins: ['Heading'],
                toolbar: ['bold', 'italic']
            })
            .catch(error => {
                console.error(error);
            });

        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire(
                            'Deleted!',
                            'Your data has been deleted.',
                            'success'
                        )
                    }
                });
        });
    </script>
@endpush
