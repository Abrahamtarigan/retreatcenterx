<!-- Modal -->
<div class="modal fade" id="modal_tambah_kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="form-group col-md-12">
                <label for="recipient-name" class="col-form-label modal-title" id="exampleModalLabel">
                    <h5><b>Tambah Kategori baru</b> </h5>
                    <small style="font-color:grey">Silahkan tambah kategori baru melalui form ini</small>
                </label>
                <div class="modal-body" style="margin-top:-25px;">
                    <form id="addRestoKategori">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label"><b>Nama kategori</b></label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control  form-kecil form-sm border-form" placeholder="cth. Italian" style="border-radius:8px;height:40%;width:100%" required>

                        </div>

                        <div class="form-group" style="padding-top:20px;">
                            <label id="pesan"></label>
                            <button type="submit" id="submitKategori" class="btn btn-light circular btn-sm " style="width: 200px;background-color: #D3D3D3;border-radius:9px;float:right;"><b>Simpan Data</b></button>
                        </div>
                    </form>
                </div>
            </div>