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
                        <input type="text" class="form-control" value="" required="">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="" required="">
                    </div>
                    <div class="form-group">
                        <label>Program Studi</label>
                        <select class="custom-select2 form-control" name="prodi" style="width: 100%; height: 38px">
                            <option value="">Akuntansi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Judul Skripsi</label>
                        <textarea class="form-control editorck" name="judul_skripsi" placeholder="Enter text ..." autofocus>
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
