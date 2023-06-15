<div class="container-fluid">
  <br>


  <div class="container-fluid ">
    <?php include 'include/nav-kategori.php'; ?>
    <div class="col-lg-6">
      <b>Menu</b>
      <hr />

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

            </div>

          </div>
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
                      <input type="text" hidden name="nama" value="<?= $value->nama; ?>">
                      <input type="text" hidden name="harga" value="<?= $value->harga; ?>">
                      <!-- //<input type="text" hidden name="nama" value="<?= $value->nama; ?>"> -->



                      <input style=" max-width: 100px;" name="qty" class="form-control" type="number" value="" id="input" required />

                      <button type="submit" id="pesan" class="btn btn-primary tambah  font-weight-bold __button_khas btn-sm"><i class="fa-solid fa-basket-shopping text-warning"></i></button>&nbsp;
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


<script type="text/javascript">
  const flashData = $('.menu-berhasil-pop').data('flashdata');

  if (flashData) {
    Swal({
      title: '',
      text: 'Berhasil ' + flashData,
      type: 'success'
    });
  }

  // tombol-hapus
  $('.tombol-hapus-menu').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
      title: 'Apakah anda yakin',
      text: "Akan menghapus menu ini ?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus'
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    })

  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    //$('.bootstrap-select').selectpicker();

    //GET UPDATE
    $('.update-record-menu').on('click', function() {
      var id = $(this).data('id');
      var menu = $(this).data('menu');
      $(".strings").val('');
      $('#UpdateModalMenu').modal('show');
      $('[name="edit_id"]').val(id);
      $('[name="menu_edit"]').val(menu);

      return false;
    });



  });
</script>