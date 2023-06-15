<br>
<div class="container-fluid">
    <div class="row">

        <div class="col-lg-3">





            <article class="card-group-item">
                <?php foreach ($menu_edit_view as $h) : ?>
                    <label for="inputPassword4"><b>Preview</b></label>
                    <hr>


                    <div> <img src="<?= $h->img_url; ?>" class="rounded mb-5" alt="..." style="height: 200px;width:350px;"></div>
                <?php endforeach; ?>
                <div class="filter-content">
                    <div class="jumbotron">



                        <i class="fa-solid fa-microphone"></i>&nbsp; <b>Informasi</b>
                        <hr>
                        <small>Silahkan gunakan menu dibawah ini untuk menambah kategori</small>
                        <hr>
                        <p class="lead">
                            <a type="button" data-toggle="modal" class="btn btn-default rounded text-white btn-sm" data-target="#modal_tambah_produk" data-whatever="@mdo" style="border-radius:12px;background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);">Tambah Kategori</a>
                        </p>


                    </div>



                </div>

        </div>
        </article> <!-- card-group-item.// -->



        <div class="col-lg-9">





            <article class="card-group-item">

                <div class="filter-content">


                    <!-- Modal -->
                    <?php foreach ($menu_edit_view as $h) : ?>

                        <div class="modal-content " style="border-radius:10px;">
                            <div class="form-group col-md-12">
                                <label for="recipient-name" class="col-form-label modal-title" id="exampleModalLabel">
                                    <h5><b>Edit Menu <small><?= $h->nama; ?></small> </b> </h5>
                                    <small style="font-color:grey">Silahkan Edit Keterangan dari menu <b><?= $h->nama; ?></b> </small>
                                </label>


                                <div class="modal-body" style="margin-top:-20px;">
                                    <form id="editMenuResto" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="recipient-name" class="col-form-label"><b>Nama Menu</b></label>
                                                <input type="text" name="nama" class="form-control  form-kecil form-sm border-form" id="inputTitle" placeholder="cth. Carbonara Spaghetti" oninput="generateSlug()" style="border-radius:8px;height:40%;" value="<?= $h->nama; ?>" required>
                                            </div>
                                            <input type="text" name="id_menu" value="<?= $h->id_menu; ?>" class="form-control" hidden>
                                            <div class="form-group col-md-6">
                                                <label for="recipient-name" class="col-form-label"><b>Slugs url</b></label>
                                                <input class="form-control form-sm" type="text" name="slugs" id="inputSlug" placeholder="Slug URL" readonly style="border-radius:8px;height:40%;" value="<?= $h->slugs; ?>" required>
                                            </div>
                                        </div>


                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4"><b>Harga (Rp.)</b></label>
                                                <input type="text" name="harga" value="<?= $h->harga; ?>" style="border-radius:8px;height:43px;" enctype="multipart/form-data" class="form-control selectpicker" id="inputMoney" style="border-radius:8px;height:50%;" placeholder="cth. 100.000" required>
                                            </div>
                                            <div class="form-group col-md-4">

                                                <label for="inputPassword4"><b>Kategori</b></label><br>
                                                <select name="id_kategori" class="form-control selectpicker" data-live-search="true" data-size="3" style="border-radius:8px;height:40px;width:200px;" required>
                                                    <?php if (!$h->$id_kategori <= 0) {
                                                    ?>
                                                        <option class="form-control" value="" required><i>Silahkan dipilih</i>
                                                        </option>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option class="form-control" value="<?php echo $h->id_kategori; ?>" required><i><?php echo $h->nama_kategori; ?></i>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>


                                                    <hr>
                                                    <?php foreach ($kategori as $k) : ?>
                                                        <option class="form-control" value="<?php echo $k->id; ?>"><?php echo $k->nama_kategori; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for=" inputPassword4"><b>Update Gambar</b></label>

                                                <input name="gambar" type="file" class="form-control" required>
                                                </label>
                                                <!-- End File Attachment Button -->
                                                <!-- End File Attachment Input -->


                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label"><b>Deskripsi Produk index </b> </label>
                                            <textarea name="desc_index" class="form-control" style="border-radius:8px;height:20%;" required><?= $h->desc_index; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label"><b>Keterangan/ Deskripsi </b> </label>
                                            <textarea id="editor" name="desc_masakan" class="form-control"><?= $h->desc_masakan; ?></textarea>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <label id="pesan"></label>
                                    <button type="submit" id="updateButtonProduk" class="btn btn-light circular btn-sm " style="width: 200px;background-color: #D3D3D3;border-radius:9px;float:right;"><b>Update Data</b></button>
                                </div>
                                </form>
                            </div>
                        </div>
                </div>


                <script>
                    function <?= $h->id_menu; ?>() {
                        var title = document.getElementById('inputTitleEdit<?= $h->id_menu; ?>').value;
                        var slug = slugify(title);
                        document.getElementById('inputSlugEdit<?= $h->id_menu; ?>').value = slug;
                    }

                    function slugify(text) {
                        return text.toString().toLowerCase()
                            .replace(/\s+/g, '-') // Ganti spasi dengan tanda "-"
                            .replace(/[^\w\-]+/g, '') // Hapus karakter non-alphanumerik kecuali "-"
                            .replace(/\-\-+/g, '-') // Ganti multiple "-" dengan satu "-"
                            .replace(/^-+/, '') // Hapus "-" di awal string
                            .replace(/-+$/, ''); // Hapus "-" di akhir string
                    }
                </script>
            <?php endforeach; ?>