@extends('back.layout.admin.pages-layout')
@section('pagetitle', @isset($pageTitle) ? $pagetitle : 'Batch')
@push('stylesheets')
    <!-- CSS Libraries -->
    <link href="{{ asset('front/src/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Batch Kegiatan</h1>
            </div>

            <div class="section-body">
                <div class="buttons">
                    <a href="{{ route('admin.batch.create') }}" class="btn btn-icon icon-left btn-primary"><i
                            class="far fa-edit"></i> Tambah</a>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card card-primary">
                            <div class="card-body table-responsive">
                                <table class="table table-bordered" aria-labelledby="simkus">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Batch</th>
                                            <th>Kegiatan</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($batches as $batch)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $batch->nama }}</td>
                                                <td>{{ $batch->kegiatan->nama }}</td>
                                                <td>{{ \Carbon\Carbon::parse($batch->mulai)->isoFormat('dddd,D MMMM YYYY') }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($batch->selesai)->isoFormat('dddd,D MMMM YYYY') }}
                                                </td>
                                                <td>
                                                    <div class="d-flex buttons">
                                                        <a href="{{ route('admin.batch.edit', $batch->id) }}"
                                                            class="btn btn-icon btn-primary"><i class="far fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('admin.batch.delete', $batch->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                class="btn btn-icon btn-danger show_confirm"><i
                                                                    class="fas fa-times"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Kegiatan belum Tersedia.
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
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

    @if (Session::has('success'))
        <script type="text/javascript">
            Swal.fire({
                title: "Berhasil",
                text: "{{ Session::get('success') }}",
                icon: "success"
            });
        </script>
    @endif

    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire(
                            'Deleted!',
                            'Your data has been deleted.',
                            'success'
                        )
                    }
                });
        });
    </script>
@endpush
