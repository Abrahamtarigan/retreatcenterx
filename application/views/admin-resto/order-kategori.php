<div class="container-fluid">
  <br>


  <div class="container-fluid ">
    <?php include 'include/nav-kategori.php'; ?>
    <div class="col-lg-6">
      <b>Menu</b>
      <hr />

      <div class="row">
        <?php if ($masakan === 'kosong') { ?>

          <div class="card-body">




            <h5>
              </p><i class="fa-solid fa-martini-glass-empty fa-2xl"></i>&nbsp;<small>Maaf Pencarian Anda tidak ditemukan</small> </h5>



          </div>



        <?php } else { ?>
          <?php foreach ($masakan as $key => $value) { ?>
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-5">
                  <div class="__area">
                    <a href="#" class="__card card-body" id="">
                      <button class="__favorit"><i class="la la-heart-o"></i></button>
                      <img src="<?php echo base_url('upload/resto/') . $value->gambar; ?>" class="img-fluid __img" />

                    </a>
                  </div>
                </div>
                <div class="col-sm-6" style="margin:10px;">

                  <div class="__area">


                    <div class=" text-left" id="<?php echo $value->id_menu; ?>">
                      <h4 class="card-title mb-0 text-black"><?php echo $value->nama; ?></h4>

                      <form method="POST" action="<?= base_url('restaurant/keranjang/' . $value->id_menu); ?>">
                        <small class="card-title mb-2 text-black">Rp. <?= number_format($value->harga, 0, ".", ".") ?>/ Porsi</small>
                        <div class="input-group mt-3">
                          <input type="text" hidden name="nama" id="nama" value="<?= $value->nama; ?>">
                          <input type="text" hidden name="harga" id="harga" value="<?= $value->harga; ?>">
                          <!-- //<input type="text" hidden name="nama" value="<?= $value->nama; ?>"> -->



                          <input style=" max-width: 100px;" name="qty" class="form-control" type="number" value="" id="qty" required />

                          <button id="btn_save" type="submit" class="btn btn-primary tambah  font-weight-bold __button_khas btn-sm"><i class="fa-solid fa-basket-shopping text-warning"></i></button>&nbsp;
                          <button type="submit" id="pesan" class="btn btn-warning tambah  font-weight-bold btn-sm"><i class="fa-solid fa-basket-shopping"></i>&nbsp;Detail</button>


                        </div>

                    </div>

                    </form>



                  </div>

                  </a>
                </div>

              </div>
            </div>

          <?php } ?>
        <?php } ?>

      </div>
    </div>
    <?php include 'include/keranjang.php'; ?>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>