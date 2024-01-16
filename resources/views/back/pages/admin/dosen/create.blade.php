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
                            <form action="{{ route('admin.dosen.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputNiy" class="col-sm-3 col-form-label">
                                            NIY</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="niy"
                                                class="form-control @error('niy') is-invalid @enderror" id="niy"
                                                value="{{ old('niy') }}" placeholder="Masukkan NIY">
                                            @error('niy')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputNidn" class="col-sm-3 col-form-label">
                                            NIDN</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="nidn"
                                                class="form-control @error('niy') is-invalid @enderror" id="nidn"
                                                value="{{ old('nidn') }}" placeholder="Masukkan NIDN">
                                            @error('nidn')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputNama" class="col-sm-3 col-form-label">
                                            Nama</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="nama"
                                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                value="{{ old('nama') }}" placeholder="Masukkan Nama">
                                            @error('nama')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputProdiId" class="col-sm-3 col-form-label">
                                            Program Studi</label>
                                        <div class="col-sm-5">
                                            <select class="form-control @error('prodi_id') is-invalid @enderror"
                                                name="prodi_id" id="prodi_id">
                                                <option value="" disabled selected>-- Pilih Program Studi --</option>
                                                @foreach ($prodis as $prodi)
                                                    <option value="{{ $prodi->id }}" @selected(old('prodi_id') == $prodi->id)>
                                                        {{ $prodi->jenjang }}
                                                        {{ $prodi->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('prodi_id')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputJabatan" class="col-sm-3 col-form-label">
                                            Jabatan</label>
                                        <div class="col-sm-5">
                                            <select class="form-control @error('jabatan') is-invalid @enderror"
                                                name="jabatan" id="jabatan">
                                                <option value="" disabled selected>-- Pilih Jabatan --</option>
                                                <option value="Dekan">Dekan</option>
                                                <option value="Wakil Dekan">Wakil Dekan</option>
                                                <option value="Kaprodi">Kaprodi</option>
                                                <option value="Dosen Tetap">Dosen Tetap</option>
                                            </select>
                                            @error('jabatan')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <a href="{{ route('admin.dosen.index') }}" class="btn btn-warning">Kembali</a>
                                    <button class="btn btn-primary mr-1" type="submit">Simpan</button>
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
