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

    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Data Pengajuan</h4>
        </div>
        <div class="pb-20">
            <div class="table-responsive">
                <table class="table table-striped" aria-label="Data Pengajuan">
                    <thead>
                        <tr>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Judul Skripsi</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tanggal Ajuan</th>
                            {{-- <th scope="col">Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sempros as $item)
                            <tr>
                                <td>{{ $item->mahasiswa->nim }}</td>
                                <td>{{ $item->mahasiswa->nama }}</td>
                                <td>{!! $item->judul_skripsi !!}</td>
                                <td>{!! getStatusSkripsi($item->status) !!}</td>
                                <td>{{ $item->created_at->isoFormat('D MMMM YYYY') }}</td>
                                {{-- <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                            href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                        </div>
                                    </div>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
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
