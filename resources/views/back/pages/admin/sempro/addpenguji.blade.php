@extends('back.layout.admin.pages-layout')
@section('pagetitle', @isset($pageTitle) ? $pagetitle : 'Seminar Proposal')
@push('stylesheets')
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Penguji</h1>
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
                                <form action="#" method="POST" class="form-horizontal">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Dosen Penguji</strong></label>
                                        <div class="col-sm-8">
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="" disabled selected>-- Daftar Dosen --</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sebagai" class="col-sm-2 col-form-label">Penguji</label>
                                        <div class="col-sm-3">
                                            <select id="sebagai" name="sebagai" class="form-control" required>
                                                <option value="Ketua Penguji">Ketua Penguji</option>
                                                <option value="Anggota Penguji">Anggota Penguji</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ke" class="col-sm-2 col-form-label">Penguji Ke</label>
                                        <div class="col-sm-2">
                                            <select id="ke" name="ke" class="form-control" required>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="button" class="btn btn-warning">Kembali</button>
                                        <button type="submit" class="btn btn-primary" name="simpan"
                                            id="simpan">Tambah</button>
                                    </div>
                                </form>
                            </div>
                            <hr>
                            <div class="card-footer">
                                <i>
                                    * Berdasarkan Panduan Skripsi Tahun 2022 :<br />
                                    1. Penguji Ke 1 Merupakan Ketua Penguji<br />
                                    2. Penguji Ke 2 Merupakan Anggota Penguji<br />
                                    3. Penguji Ke 3 Merupakan Anggota Penguji (Pembimbing Skripsi)
                                </i>
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
