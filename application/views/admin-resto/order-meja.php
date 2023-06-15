<br>
<div class="container-fluid">

  <div class="col-lg-12">
    <center>
      <h1>Pilih Meja</h1>
    </center> <br>


    <div class="row">
      <?php if ($meja === 'kosong') { ?>
        <div class="col">
          <br><br><br>
          <div class="card-body">
            <center class="alert alert-warning text-warning __button_khas">
              <br>
              <i class="fa-solid fa-martini-glass-empty fa-2xl"></i>
              <h4>Belum ada Meja</h4>
            </center>

          </div>

        </div>
    </div>

  <?php } else { ?>
    <div class="container">
      <div class="row">

        <?php foreach ($meja as $key => $value) { ?>
          <?php if ($value->status == 1) { ?>
            <div class="col-md-4">
              <div class="card btn btn-warning">
                <div class="card-header btn btn-warning text-dark">
                  <h2>Meja No.#<?php echo $value->no_meja; ?></h2>
                </div>
                <div class="card-body" style="margin:-40px;">
                  <p class="text-primary text-dark ">
                    Kapasitas Meja untuk <?php echo $value->jumlah_kursi; ?> orang</p>
                  <br>

                </div>
              </div>
              <br>
            </div>
          <?php } else { ?>
            <div class="col-md-4">
              <a href="<?= base_url('adminresto/order/') . $this->uri->segment(3) . '/' . $value->no_meja . '/?o=dinein'; ?>">
                <div class="card btn btn-success ">
                  <div class="card-header  btn btn-success text-dark">
                    <h2><?php echo $value->nama_meja; ?>#<?php echo $value->no_meja; ?></h2>
                  </div>
                  <div class="card-body" style="margin:-40px;">
                    <p class="text-primary text-dark ">
                      Kapasitas Meja untuk <?php echo $value->jumlah_kursi; ?> orang</p>
                    <br>
                  </div>
                </div>
              </a>
              <br>
            </div>
          <?php } ?>
        <?php } ?>
      </div>

    </div>
  <?php } ?>




  </div>
</div>

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