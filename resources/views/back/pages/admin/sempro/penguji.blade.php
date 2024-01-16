@extends('back.layout.admin.pages-layout')
@section('pagetitle', @isset($pageTitle) ? $pagetitle : 'Seminar Proposal')
@push('stylesheets')
    <link href="{{ asset('front/src/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
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
                                <table class="table table-borderless table-sm" aria-labelledby="simkus">
                                    <tr>
                                        <td class="col-sm-2"><strong>NIM</strong></td>
                                        <td class="col-sm-4">{{ $sempros->mahasiswa->nim }}</td>
                                        <td class="col-sm-2"><strong>Program Studi</strong></td>
                                        <td class="col-sm-4">{{ $sempros->mahasiswa->prodi->jenjang }}
                                            {{ $sempros->mahasiswa->prodi->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2"><strong>Nama</strong></td>
                                        <td class="col-sm-4">{{ $sempros->mahasiswa->nama }}</td>
                                        <td class="col-sm-2"><strong>Judul Skripsi</strong></td>
                                        <td class="col-sm-4">{!! $sempros->judul_skripsi !!}</td>
                                    </tr>
                                </table>
                                <div class="d-flex justify-content-end mt-2 mb-2">
                                    <a href="{{ route('admin.sempro.penguji.add', $sempros->id, '/add') }}"
                                        class="btn btn-primary">Tambah Penguji</a>
                                </div>
                                <hr>
                                <table class="table table-bordered table-md" aria-labelledby="simkus">
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
                                                    <form action="{{ route('admin.sempro.penguji.delete', $sempros->id) }}"
                                                        method="POST">
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
                                <hr>
                                @if ($sempros->status == 5)
                                    <form action="{{ route('admin.sempro.penguji.update', $sempros->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="tanggal_sempro"><strong>Tanggal
                                                    Ujian</strong></label>
                                            <div class="col-sm-3">
                                                <input type="date" name="tanggal_sempro"
                                                    class="form-control @error('tanggal_sempro') is-invalid @enderror"
                                                    value="{{ $sempros->tanggal_sempro }}">
                                                @error('tanggal_sempro')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="jam_mulai"><strong>Mulai
                                                    Ujian</strong></label>
                                            <div class="col-sm-3">
                                                <input type="time" name="jam_mulai"
                                                    class="form-control @error('jam_mulai') is-invalid @enderror"
                                                    value="{{ $sempros->jam_mulai }}">
                                                @error('jam_mulai')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="jam_selesai"><strong>Selesai
                                                    Ujian</strong></label>
                                            <div class="col-sm-3">
                                                <input type="time" name="jam_selesai"
                                                    class="form-control @error('jam_selesai') is-invalid @enderror"
                                                    value="{{ $sempros->jam_selesai }}">
                                                @error('jam_selesai')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="ruang"><strong>Selesai
                                                    Ujian</strong></label>
                                            <div class="col-sm-3">
                                                <select name="ruang" id="ruang"
                                                    class="form-control @error('ruang') is-invalid @enderror">
                                                    @foreach ($ruang as $r)
                                                        @if ($sempros->ruang == $r)
                                                            <option value="{{ $r }}" selected>
                                                                {{ $r }}</option>
                                                        @else
                                                            <option value="{{ $r }}">{{ $r }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('ruang')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <a href="{{ route('admin.sempro.index') }}" class="btn btn-warning">Kembali</a>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                @else
                                    <form action="{{ route('admin.sempro.penguji.update', $sempros->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="tanggal_sempro"><strong>Tanggal
                                                    Ujian</strong></label>
                                            <div class="col-sm-3">
                                                <input type="date" name="tanggal_sempro"
                                                    class="form-control @error('tanggal_sempro') is-invalid @enderror">
                                                @error('tanggal_sempro')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="jam_mulai"><strong>Mulai
                                                    Ujian</strong></label>
                                            <div class="col-sm-3">
                                                <input type="time" name="jam_mulai"
                                                    class="form-control @error('jam_mulai') is-invalid @enderror">
                                                @error('jam_mulai')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="jam_selesai"><strong>Selesai
                                                    Ujian</strong></label>
                                            <div class="col-sm-3">
                                                <input type="time" name="jam_selesai"
                                                    class="form-control @error('jam_selesai') is-invalid @enderror">
                                                @error('jam_selesai')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="ruang"><strong>Selesai
                                                    Ujian</strong></label>
                                            <div class="col-sm-3">
                                                <select name="ruang" id="ruang"
                                                    class="form-control @error('ruang') is-invalid @enderror">
                                                    <option value="" disabled selected>-- Pilih Ruang --</option>
                                                    <option value="2.06">2.06</option>
                                                    <option value="2.09">2.09</option>
                                                    <option value="2.10">2.10</option>
                                                    <option value="3.06">3.06</option>
                                                    <option value="3.07">3.07</option>
                                                    <option value="3.10">3.10</option>
                                                </select>
                                                @error('ruang')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <a href="{{ route('admin.sempro.index') }}"
                                                class="btn btn-warning">Kembali</a>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('front/src/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('front/src/plugins/sweetalert2/sweetalert2global.js') }}"></script>
    @if (Session::has('success'))
        <script type="text/javascript">
            Toast.fire({
                icon: "success",
                text: "{{ Session::get('success') }}"
            });
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $('.button-delete').on('click', function(e) {
                const form = $(this).closest("form");
                const message = $(this).data("message");
                e.preventDefault();
                Swal.fire({
                    title: 'Yakin ?',
                    text: "Apakah Anda Yakin Menghapus " + message +
                        "? Karena Data Setelah Terhapus Tidak Dapat Di Kembalikan !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })
            });
        })
    </script>
@endpush
