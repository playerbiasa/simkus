@extends('back.layout.user.pages-layout')
@section('pagetitle', @isset($pageTitle) ? $pagetitle : 'Layanan | Dashboard')
@push('stylesheets')
    <!-- CSS Libraries -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('front/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('front/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/src/plugins/sweetalert2/sweetalert2.css') }}" type="text/css">
@endpush

@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="{{ asset('front/vendors/images/banner-img.png') }}" alt="">
            </div>
            <div class="col-md-8">
                <h4 class="font-20 weight-500 mb-10 text-capitalize">
                    Selamat Datang
                    <div class="weight-600 font-30 text-blue">{{ Auth::user()->nama }}!</div>
                </h4>
                <p class="font-18 max-width-600">
                    Selamat menggunakan layanan Administrasi yang disediakan oleh Fakultas Ekonomi, Universitas Hasyim
                    Asy'ari Tebuireng Jombang
                </p>
            </div>
        </div>
    </div>

    <div class="min-height-200px">
        <!-- Daftar Pengajuan Start -->
        <div class="card-box pb-10">
            <div class="h5 pd-20 mb-0">Daftar Pengajuan</div>
            <table class="data-table table nowrap" aria-describedby="simkus">
                <thead>
                    <tr>
                        <th>Nama</th>y
                        <th>Program Studi</th>
                        <th>Tanggal Ajuan</th>
                        <th>Judul Skripsi</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Daftar Pengajuan End -->
    </div>

@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('front/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('front/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('front/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('front/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('front/src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>

    <!-- Page Specific JS File -->

    @if (Session::has('success'))
        <script type="text/javascript">
            swal({
                title: 'Pendaftaran Sempro Berhasil',
                text: "{{ Session::get('success') }}",
                type: 'success',
                confirmButtonClass: 'btn btn-success',
            })
        </script>
    @endif

@endpush
