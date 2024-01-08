@extends('back.layout.admin.pages-layout')
@section('pagetitle', @isset($pageTitle) ? $pagetitle : 'Seminar Proposal')
@push('stylesheets')
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Ubah Pendaftaran</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card card-primary">
                            <div class="card-body table-responsive">
                                <form action="{{ route('admin.sempro.update', $sempros->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nomor Induk Mahasiswa (NIM)</label>
                                            <input type="text" class="form-control" id="nim" name="nim"
                                                value="{{ old('nim', $sempros->mahasiswa->nim) }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                readonly value="{{ old('nama', $sempros->mahasiswa->nama) }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Program Studi</label>
                                            <input type="text" class="form-control" id="prodi_id" name="prodi_id"
                                                readonly value="{{ old('prodi_id', $sempros->mahasiswa->prodi->nama) }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Judul Skripsi</label>
                                            <textarea class="form-control editorck" name="judul_skripsi">
                                                {{ $sempros->judul_skripsi }}
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Batch Kegiatan</label>
                                            <input type="text" class="form-control" id="batch_id" name="batch_id"
                                                value="{{ $sempros->batch->nama }} - {{ $sempros->batch->kegiatan->deskripsi }} - {{ $sempros->batch->tahun }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('admin.sempro.index') }}" class="btn btn-warning">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
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
