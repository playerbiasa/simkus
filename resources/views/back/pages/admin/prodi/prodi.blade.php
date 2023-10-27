@extends('back.layout.admin.pages-layout')
@section('pagetitle', @isset($pageTitle) ? $pagetitle : 'Program Studi')
@push('stylesheets')
    <link href="{{ asset('back/datatables/datatables.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Program Studi</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-8">
                        <div class="card card-primary">
                            <div class="card-body">
                                ini halaman tabel
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="card-header-action">
                                    <h4>Tambah Program Studi</h4>
                                </div>
                            </div>
                            <form action="" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Program Studi</label>
                                        <input type="text" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group">
                                        <label>Singkatan</label>
                                        <input type="text" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenjang Studi</label><br>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio">S1
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio">S2
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio">S3
                                            </label>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
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
    <script src="{{ asset('back/datatables/datatables.min.js') }}"></script>
@endpush
