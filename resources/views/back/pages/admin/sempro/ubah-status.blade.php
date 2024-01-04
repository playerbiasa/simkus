@extends('back.layout.admin.pages-layout')
@section('pagetitle', @isset($pageTitle) ? $pagetitle : 'Seminar Proposal')
@push('stylesheets')
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Ubah Status Daftar</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card card-primary">
                            <div class="card-body table-responsive">
                                <table class="table table-borderless table-sm" aria-labelledby="simkus">
                                    <tr>
                                        <td class="col-sm-2"><strong>NIM</strong></td>
                                        <td class="col-sm-4">{{ $sempros->mahasiswa->nim }}</td>
                                        <td class="col-sm-2"><strong>Program Studi</strong></td>
                                        <td class="col-sm-4">{{ $sempros->mahasiswa->prodi->jenjang }}
                                            {{ $sempros->mahasiswa->prodi->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2"><strong>Nama</strong></td>
                                        <td class="col-sm-4">{{ $sempros->mahasiswa->nama }}</td>
                                        <td class="col-sm-2"><strong>Judul Skripsi</strong></td>
                                        <td class="col-sm-4">{!! $sempros->judul_skripsi !!}</td>
                                    </tr>
                                </table>
                                <hr>
                                <form action="{{ route('admin.sempro.status.update', $sempros->id) }}" method="post"
                                    class="form-horizontal">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"><strong>Status
                                                Pendaftaran</strong></label>
                                        <div class="col-sm-5">
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="" disabled selected>-- Pilih Status --</option>
                                                <option value="2">Teruskan Ke Kaprodi</option>
                                                <option value="3">Revisi</option>
                                                <option value="4">Ditolak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"><strong>Keterangan</strong></label>
                                        <div class="col-sm-9">
                                            <input name="keterangan" id="keterangan" class="form-control"
                                                placeholder="Masukkan Keterangan">
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <a href="{{ route('admin.sempro.index') }}" class="btn btn-warning">Kembali</a>
                                        <button type="submit" name="simpan" id="simpan"
                                            class="btn btn-primary">Simpan</button>
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
@endpush
