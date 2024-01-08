@extends('back.layout.admin.pages-layout')
@section('pagetitle', @isset($pageTitle) ? $pagetitle : 'Tambah Dosen')
@push('stylesheets')
    <!-- CSS Libraries -->
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Dosen</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form action="#" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputNamaBatch" class="col-sm-3 col-form-label">
                                            Nama Batch</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="nama"
                                                class="form-control @error('nama') is-invalid @enderror" id="inputNamaBatch"
                                                value="{{ old('nama') }}" placeholder="Masukkan Nama Batch">
                                            @error('nama')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputNamaKegiatan" class="col-sm-3 col-form-label">
                                            Kegiatan</label>
                                        <div class="col-sm-9">
                                            <select class="form-control @error('kegiatan_id') is-invalid @enderror"
                                                name="kegiatan_id" id="kegiatan_id">
                                                <option value="" disabled selected>-- Pilih Program Studi --</option>
                                            </select>
                                            @error('kegiatan_id')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputTanggalMulai" class="col-sm-3 col-form-label">
                                            Tanggal Mulai</label>
                                        <div class="col-sm-3">
                                            <input type="date" name="mulai" class="form-control" id="mulai">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputTanggalSelesai" class="col-sm-3 col-form-label">
                                            Tanggal Selesai</label>
                                        <div class="col-sm-3">
                                            <input type="date" name="selesai" class="form-control" id="selesai">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputNamaKegiatan" class="col-sm-3 col-form-label">
                                            Tahun Pelaksanaan</label>
                                        <div class="col-sm-2">
                                            <input type="number" name="tahun" class="form-control" id="tahun"
                                                placeholder="Tahun">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                                    <button class="btn btn-secondary" type="reset">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
