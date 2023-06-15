<div class="container">

  <div class="page-breadcrumb __areasin">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url(''); ?>" class="breadcrumb-link">Dashboard</a></li>
        <li class="breadcrumb-item active " aria-current="page"><a href="<?php echo site_url(''); ?>" class="breadcrumb-link"><?php echo $this->uri->segment(1); ?></a></li>
      </ol>
    </nav>
  </div>
  <?php
  require_once('nav-kategori.php');
  ?>



  <div class="dashboard-wrapper">
    <div class="container-fluid">
      <!-- ============================================================== -->
      <!-- pageheader  -->
      <!-- ============================================================== -->


      <br>



      <!-- ============================================================== -->
      <!-- end pageheader  -->
      <!-- ============================================================== -->
      <div class="__area" style="margin-bottom:-40px;padding-bottom:-60px;">
        <h3>Pilihan Terbaik kami ...</h3>
      </div><br>

      <div class="row">
        <?php if ($masakan === 'kosong') { ?>
          <div class="col">
            <br><br><br>
            <div class="card-body">
              <center class="alert alert-warning text-warning __button_khas">
                <br>
                <i class="fa-solid fa-martini-glass-empty fa-2xl"></i>
                <h4>Maaf Pencarian Anda tidak ditemukan</h4>
              </center>
              <br><br><br>
            </div>

          </div>
      </div>
    <?php } else { ?>
      <?php foreach ($masakan as $key => $value) { ?>
        <div class="col-sm-4">


          <div class="__area text-center">
            <a href="#" class="__card card-body" id="<?php echo $value->id_menu; ?>">
              <button class="__favorit"><i class="la la-heart-o"></i></button>
              <img src="<?php echo base_url('upload/resto/') . $value->gambar; ?>" class="img-fluid __img" style="width:300px; height:210px;" />
              <div class="__card_detail text-left" id="<?php echo $value->id_menu; ?>">
                <h4 class="card-title mb-2"><?php echo $value->nama; ?></h4>
                <p>
                  <?php
                  $val =
                    $limited_desc = $value->desc_index;
                  $desc = word_limiter($limited_desc, 10);
                  $desc_trim = trim($desc);
                  ?>
                  <?php echo $desc_trim; ?> <br>


                </p>
                <div class="__type">
                  <span href="#Italian"><?php echo $value->kategori ?></span>
                </div>
                <div class="__detail text-center">

                  <h4 class="card-title mb-2">Rp. <?php echo $value->harga; ?>, -</h4>
                </div>
                <hr>

                <div class="col text-center">
                  <!-- <?php
                        $url = str_replace(' ', '_', $value->nama);
                        $url = str_replace("_", ' ', $url);
                        $url = str_replace(":", '', $url);
                        $url = str_replace("'", '', $url);

                        ?> -->
                  <form action="<?= base_url('restaurant/detail/') . $value->slugs . '/'; ?>">
                    <button class="btn btn-primary  font-weight-bold rounded-pill __button_khas"><i class="fa-sharp fa-solid fa-worm"></i>&nbsp;Lihat Detail</button>
                  </form>

                  <!-- <button href="<? base_url('restaurant/detail/' . $value->nama); ?>"class="btn btn-primary tambah  font-weight-bold rounded-pill __button_khas" ><i class="fa-sharp fa-solid fa-worm"></i>&nbsp;Lihat Detail</button> -->

                </div>

              </div>
            </a>
          </div>

        </div>

      <?php } ?>
    <?php } ?>

    </div>
  </div>
</div>
</div>





<!-- jquery 3.3.1 -->
<script src="<?php echo base_url(); ?>assets/concept-master/assets/vendor/jquery/jquery-3.3.1.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/order/masakan.js" type="text/javascript"></script>
</body>



</html>