@extends('back.layout.admin.pages-layout')
@section('pagetitle', @isset($pageTitle) ? $pagetitle : 'Tambah Kegiatan')
@push('stylesheets')
    <!-- CSS Libraries -->
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Kegiatan</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form action="{{ route('admin.kegiatan.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputNamaKegiatan" class="col-sm-3 col-form-label">
                                            Nama Kegiatan</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                id="inputNamaKegiatan">
                                            @error('nama')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputDeskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="deskripsi"
                                                class="form-control @error('deskripsi') is-invalid @enderror"
                                                id="inputDeskripsi">
                                            @error('deskripsi')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
