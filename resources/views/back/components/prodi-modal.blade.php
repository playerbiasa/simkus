<div class="modal fade" id="ajaxProdi" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="prodiForm" name="prodiForm" class="form-horizontal">
                    <input type="hidden" name="prodi_id" id="prodi_id">
                    <div class="form-group">
                        <label for="nama" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Enter Nama" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="singkatan" class="col-sm-2 control-label">Singkatan</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="singkatan" name="singkatan"
                                placeholder="Enter Singkatam" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenjang" class="col-sm-2 control-label">Jenjang</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="jenjang" name="jenjang"
                                placeholder="Enter Jenjang" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
