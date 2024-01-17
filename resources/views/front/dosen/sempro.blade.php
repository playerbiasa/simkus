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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Tanggal Pendaftaran</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sempros as $sempro)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sempro->mahasiswa->nim }}</td>
                                <td>{{ $sempro->mahasiswa->nama }}</td>
                                <td>{{ $sempro->mahasiswa->prodi->nama }}</td>
                                <td>{{ $sempro->created_at->isoFormat('D MMMM YYYY') }}</td>
                                <td>
                                    @if ($sempro->status == 0)
                                        <span class="badge badge-info">Baru</span>
                                    @elseif ($sempro->status == 2)
                                        <a href="{{ route('dosen.sempro.penguji', $sempro->id) }}"
                                            class="badge badge-primary">
                                            Set Penguji
                                        </a>
                                    @else
                                        <span class="badge badge-success">Diterima</span>
                                        <a href="{{ route('dosen.sempro.penguji', $sempro->id) }}"
                                            class="badge badge-warning">
                                            Ubah Penguji
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data Pendaftar Seminar Proposal belum tersedia.
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
