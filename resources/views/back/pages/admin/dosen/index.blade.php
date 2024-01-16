@extends('back.layout.admin.pages-layout')
@section('pagetitle', @isset($pageTitle) ? $pagetitle : 'Dosen')
@push('stylesheets')
    <link href="{{ asset('front/src/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('back/library/toastr/toastr.min.css') }}" rel="stylesheet">
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
                <h1>Halaman Dosen</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="buttons">
                            <a href="{{ route('admin.dosen.create') }}" class="btn btn-icon icon-left btn-primary"><i
                                    class="far fa-edit"></i>
                                Tambah</a>
                            <button class="btn btn-info" data-toggle="modal" data-target="#importExcel">Import</button>
                        </div>
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md" aria-labelledby="simkus">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIY</th>
                                                <th>Nama</th>
                                                <th>Prodi</th>
                                                <th>Jabatan</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($dosens as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->niy }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->prodi->nama }}</td>
                                                    <td>{{ $item->jabatan }}</td>
                                                    <td></td>
                                                </tr>
                                            @empty
                                                <div class="alert alert-danger">
                                                    Data Dosen belum Tersedia.
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end">
                                    {{ $dosens->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('back.pages.admin.dosen.import-modal-dosen')
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('front/src/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('front/src/plugins/sweetalert2/sweetalert2global.js') }}"></script>
    @if (Session::has('success'))
        <script type="text/javascript">
            Toast.fire({
                icon: "success",
                text: "{{ Session::get('success') }}"
            });
        </script>
    @endif
@endpush
