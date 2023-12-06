@extends('back.layout.admin.pages-layout')
@section('pagetitle', @isset($pageTitle) ? $pagetitle : 'Seminar Proposal')
@push('stylesheets')
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Seminar Proposal</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="buttons">
                                    <button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal"
                                        data-target="#semproModal"><i class="far fa-edit"></i>
                                        Tambah</button>
                                    <button type="button" class="btn btn-icon icon-left btn-info"><i
                                            class="fas fa-print"></i>
                                        Cetak</button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>NIM</th>
                                                <th>Nama</th>
                                                <th>Judul Skripsi</th>
                                                <th>Tanggal Daftar</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sempros as $item)
                                                <tr>
                                                    <td>{{ $item->mahasiswa->nim }}</td>
                                                    <td>{{ $item->mahasiswa->nama }}</td>
                                                    <td>{!! $item->judul_skripsi !!}</td>
                                                    <td>{{ $item->created_at->isoFormat('D MMMM YYYY') }}</td>
                                                    <td>{!! getStatusSkripsi($item->status) !!}</td>
                                                    <td>Actions</td>
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
    <script src="{{ asset('front/vendors/scripts/advanced-components.js') }}"></script>
    <script src="{{ asset('front/src/plugins/ckeditor5/ckeditor.js') }}"></script>

    <!-- Page Specific JS File -->
    <script>
        ClassicEditor
            .create(document.querySelector('.editorck'), {
                removePlugins: ['Heading'],
                toolbar: ['bold', 'italic']
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
