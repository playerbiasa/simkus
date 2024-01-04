<!-- Modal -->
<div class="modal fade" id="semproModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Daftar Seminar Proposal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.sempro.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nomor Induk Mahasiswa (NIM)</label>
                        <input type="hidden" name="redirect_to" value="{{ route('admin.sempro.index') }}">
                        <input type="hidden" id="mahasiswa_id" name="mahasiswa_id">
                        <input type="text" class="form-control" id="nim" name="nim" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Program Studi</label>
                        <input type="text" class="form-control" id="prodi_id" name="prodi_id" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Judul Skripsi</label>
                        <textarea class="form-control editorck" name="judul_skripsi" placeholder="Enter text ..." autofocus>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Batch Kegiatan</label>
                        <select class="form-control" name="batch_id" id="batch_id" required>
                            @foreach ($batches as $batch)
                            <option value="{{ $batch->id }}">{{ $batch->nama }} | {{ $batch->kegiatan->deskripsi }} | {{ $batch->tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
