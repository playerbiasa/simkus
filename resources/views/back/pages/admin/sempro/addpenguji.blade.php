@extends('back.layout.admin.pages-layout')
@section('pagetitle', @isset($pageTitle) ? $pagetitle : 'Seminar Proposal')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('front/src/plugins/select2/css/select2.css') }}">
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
                                <form action="{{ route('admin.sempro.penguji.store', $sempros->id) }}" method="POST"
                                    class="form-horizontal">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><strong>Dosen Penguji</strong></label>
                                        <div class="col-sm-8">
                                            <select name="dosen_id" id="dosen_id" class="form-control select2">
                                                <option value="" disabled selected>-- Pilih Dosen --</option>
                                                @foreach ($dosens as $dosen)
                                                    <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sebagai" class="col-sm-2 col-form-label">Penguji</label>
                                        <div class="col-sm-3">
                                            <select id="sebagai" name="sebagai" class="form-control">
                                                <option value="Ketua Penguji">Ketua Penguji</option>
                                                <option value="Anggota Penguji">Anggota Penguji</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ke" class="col-sm-2 col-form-label">Penguji Ke</label>
                                        <div class="col-sm-2">
                                            <select id="ke" name="ke" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <a href="{{ route('admin.sempro.penguji', $sempros->id) }}"
                                            class="btn btn-warning">Kembali</a>
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
    <script src="{{ asset('front/src/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        // Inisialisasi Select2 pada elemen dengan ID 'pilihan'
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
