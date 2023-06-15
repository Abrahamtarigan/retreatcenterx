<!-- Basics Accordion -->
<div id="basicsAccordion">


    <!-- Card -->
    <div class="card mb-3">
        <div class="card-header card-collapse  text-white" id="basicsHeadingTwo" style="background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);">
            <h5 class="mb-0">
                <button type="button" class="btn btn-link btn-block d-flex justify-content-between card-btn collapsed p-3 " data-toggle="collapse" data-target="#basicsCollapseTwo" aria-expanded="false" aria-controls="basicsCollapseTwo">
                    <b style="color:white">Pencarian</b>

                    <span class="card-btn-arrow" style="color:white">
                        <span class="fas fa-arrow-down small"></span>
                    </span>
                </button>
            </h5>
        </div>
        <div id="basicsCollapseTwo" class="collapse" aria-labelledby="basicsHeadingTwo" data-parent="#basicsAccordion">
            <div class="card-body">
                <form id="cari_menu" method="GET" action="<?= base_url('Produkresto/pencarian'); ?>">
                    <div class="form-group">
                        <label for="inputPassword4"><b>Nama menu</b></label>
                        <input type="text" class="form-control form-control-sm" name="nama" id="nama" placeholder="Cth. Spaghetti carbonarra">
                    </div>
                    <div class="form-group">
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
                    <button id="cari_menu" type="submit" class="btn btn-primary btn-sm" style=" border-radius:px;background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);""> Lakukan Pencarian</button>&nbsp


                </form>
            </div>
        </div>
    </div>
    <!-- End Card -->




</div>
<!-- End Basics Accordion -->