<div class="modal fade editProdi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Program Studi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.prodi.update.details') }}" method="post" id="update-prodi-form">
                    @csrf
                    <input type="hidden" name="cid">
                    <div class="form-group">
                        <label for="">Nama Program Studi</label>
                        <input type="text" class="form-control" name="nama"
                            placeholder="Masukkan Nama Program Studi">
                        <span class="text-danger error-text nama_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Singkatan</label>
                        <input type="text" class="form-control" name="singkatan"
                            placeholder="Masukkan Singkatan Program Studi">
                        <span class="text-danger error-text singkatan_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Jenjang Studi</label>
                        <input type="text" class="form-control" name="jenjang" placeholder="Masukkan Jenjang Studi">
                        <span class="text-danger error-text jenjang_error"></span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-success">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
