<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title"><?= $title ?></h4>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table Paspor</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="div-table-paspor"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Paspor</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- isi form -->
                <form id="formTambahPaspor">
                    <div class="form-group">
                        <label for="negara">Pilih Negara</label>
                        <select class="form-control" id="negara" name="negara" required>
                            <option value="">-- Pilih Negara --</option>
                            <?php if (isset($get_country)): ?>
                                <?php foreach ($get_country as $kode => $nama): ?>
                                    <option value="<?= $kode ?>"><?= $nama ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="icon">Asal Negara</label>
                                <input type="text" class="form-control" id="asal_negara" name="asal_negara">
                            </div>
                        </div>
                    </div>
                    <div class="row" id="fotoStempelGroup" style="display: none;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Foto</label>
                                <input type="file" class="form-control" id="filefoto" name="filefoto">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="icon">Stempel</label>
                                <input type="file" class="form-control" id="filestempel" name="filestempel">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="formTambahPaspor" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>