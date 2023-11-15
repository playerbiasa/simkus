@extends('back.layout.user.pages-layout')
@section('pagetitle', @isset($pageTitle) ? $pagetitle : 'Layanan | Seminar Proposal')
@push('stylesheets')
    <!-- CSS Libraries -->
@endpush

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Form Daftar Seminar Proposal</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Seminar Proposal
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Default Basic Forms Start -->
        <div class="pd-20 card-box mb-30">
            <form method="POST">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">NIM</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" name="nim" placeholder="Nomor Induk Mahasiswa"
                            readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" name="nama" placeholder="Nama Mahasiswa">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Program Studi</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="custom-select2 form-control" name="prodi" style="width: 100%; height: 38px">
                            <option value="AZ">Arizona</option>
                            <option value="CO">Colorado</option>
                            <option value="ID">Idaho</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Judul Skripsi</label>
                    <div class="col-sm-12 col-md-10">
                        <textarea class="textarea_editor form-control border-radius-0" name="judul_skripsi" placeholder="Enter text ..."></textarea>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="pull-right">
                        <button type="submit" class="btn" data-bgcolor="#00aff0" data-color="#ffffff"
                            style="color: rgb(255, 255, 255); background-color: rgb(0, 175, 240);">
                            <span class="icon-copy ti-save"></span> simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Default Basic Forms End -->
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('front/vendors/scripts/advanced-components.js') }}"></script>
    <!-- Page Specific JS File -->
@endpush
