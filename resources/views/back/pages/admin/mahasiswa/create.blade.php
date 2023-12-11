@extends('back.layout.admin.pages-layout')
@section('pagetitle', @isset($pageTitle) ? $pagetitle : 'Mahasiswa')
@push('stylesheets')
    <!-- CSS Libraries -->
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Data Mahasiswa</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('admin.mhs.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nim">Nomor Induk Mahasiswa (NIM)</label>
                                <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim"
                                    name="nim" placeholder="Masukkan NIM" value="{{ old('nim') }}">
                                @error('nim')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Mahasiswa</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" placeholder="Masukkan Nama Mahasiswa"
                                    value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="prodi">Program Studi</label>
                                <select class="form-control @error('prodi_id') is-invalid @enderror" name="prodi_id"
                                    id="prodi_id">
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
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}"
                                    placeholder="Masukkan Email Aktif">
                                @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Nomor HP</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone') }}"
                                    placeholder="Masukkan Nomor HP">
                                @error('phone')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('admin.mhs.index') }}" class="btn btn-warning">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
@endpush
