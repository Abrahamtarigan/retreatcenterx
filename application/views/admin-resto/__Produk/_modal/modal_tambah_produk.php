<!-- Modal -->
<div class="modal fade" id="modal_tambah_produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document" style="width: 1000px;border-radius:9px;">
        <div class="modal-content " style="border-radius:10px;">
            <div class="form-group col-md-12">
                <label for="recipient-name" class="col-form-label modal-title" id="exampleModalLabel">
                    <h5><b>Tambah menu baru</b> </h5>
                    <small style="font-color:grey">Silahkan tambah menu baru melalui form ini, dan perhatikan pengisian
                        nominal harganya</small>
                </label>


                <div class="modal-body" style="margin-top:-20px;">
                    <form id="addMenuResto" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="col-form-label"><b>Nama Menu</b></label>
                                <input type="text" name="nama" class="form-control  form-kecil form-sm border-form" id="inputTitle" placeholder="cth. Carbonara Spaghetti" oninput="generateSlug()" style="border-radius:8px;height:40%;">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="col-form-label"><b>Slugs url</b></label>
                                <input class="form-control form-sm" type="text" name="slugs" id="inputSlug" placeholder="Slug URL" readonly style="border-radius:8px;height:40%;">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4" style="margin-top"><b>Harga (Rp.)</b></label>
                                <input type="text" name="harga" enctype="multipart/form-data" class="form-control selectpicker" id="inputMoney" style="border-radius:8px;height:50%;" placeholder="cth. 100.000">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4"><b>Kategori</b></label>
                                <select name="id_kategori" class="form-control selectpicker" data-live-search="true" data-size="3" style="border-radius:8px;height:50%;">
                                    <option class="form-control alert alert-success" value=""><i>Silahkan Dipilih</i>
                                    </option>
                                    <hr>
                                    <?php foreach ($kategori as $k) : ?>
                                        <option class="form-control" value="<?php echo $k->id; ?>"><?php echo $k->nama_kategori; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4"><b>Gambar</b></label>
                                <input type="file" name="gambar" class="form-control" style="border-radius:8px;height:70%;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label"><b>Deskripsi Produk index </b> </label>
                            <textarea name="desc_index" class="form-control" style="border-radius:8px;height:20%;">Cth. Kombinasi rempah-rempah tradisional menghadirkan cita rasa tinggi</textarea>
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label"><b>Keterangan/ Deskripsi </b> </label>
                            <textarea id="example" name="desc_masakan" class="form-control"></textarea>
                        </div>

                        <div class="modal-footer">
                            <label id="pesan"></label>
                            <button type="submit" id="submitButton" class="btn btn-light circular btn-sm " style="width: 200px;background-color: #D3D3D3;border-radius:9px;float:right;"><b>Simpan Data</b></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>