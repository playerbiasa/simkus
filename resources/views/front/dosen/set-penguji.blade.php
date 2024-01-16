@extends('back.layout.user.pages-layout')
@section('pagetitle', @isset($pageTitle) ? $pagetitle : 'Dosen | Seminar Proposal')
@push('stylesheets')
    <!-- CSS Libraries -->
@endpush

@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Pendaftar Seminar Proposal</h4>
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
            <div class="table-responsive">
                <table class="table table-borderless">
                    <tr>
                        <td class="col-sm-2">NIM</td>
                        <td class="col-sm-4">{{ $sempros->mahasiswa->nim }}</td>
                        <td class="col-sm-2">Nama</td>
                        <td class="col-sm-4">{{ $sempros->mahasiswa->nama }}</td>
                    </tr>
                    <tr>
                        <td class="col-sm-2">Program Studi</td>
                        <td class="col-sm-4">{{ $sempros->mahasiswa->prodi->jenjang }}
                            {{ $sempros->mahasiswa->prodi->nama }}</td>
                        <td class="col-sm-2">Judul Seminar Proposal</td>
                        <td class="col-sm-4">{!! $sempros->judul_skripsi !!}</td>
                    </tr>
                </table>
                <div class="d-flex justify-content-end mt-2 mb-2">
                    <a href="{{ route('dosen.sempro.penguji.add', $sempros->id, '/add') }}"
                        class="btn btn-primary btn-sm">Tambah
                        Penguji</a>
                </div>
                <hr>
                <table class="table" aria-labelledby="simkus">
                    <thead>
                        <th>No</th>
                        <th>NIY</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Sebagai</th>
                        <th>Penguji</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @forelse ($sempros->dosen as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->niy }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->prodi->nama }}</td>
                                <td>{{ $item->pivot->sebagai }}</td>
                                <td>{{ $item->pivot->ke }}</td>
                                <td>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="dosen_id" value="{{ $item->id }}">
                                        <button class="btn btn-icon btn-sm btn-danger button-delete"
                                            data-message=" Penguji {{ $item->nama }} ">
                                            <i class="fas fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Dosen penguji masih kosong.
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Default Basic Forms End -->
    </div>
@endsection

@push('scripts')
@endpush
