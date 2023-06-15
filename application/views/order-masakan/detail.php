<div class="menu-berhasil-pop" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php if ($this->session->flashdata('message')) : ?>

<?php endif; ?>
<div class="container __areas">

  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 __areasin">
    <div class="page-header ">
      <?php foreach ($masakan as $key => $value) { ?>

      <?php } ?>

      <div class="page-breadcrumb">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item text-warning"><a href="<?php echo site_url(''); ?>" class="breadcrumb-link text-dark">Dashboard</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page"><?php echo $this->uri->segment(1); ?></li>
            <li class="breadcrumb-item active text-dark" aria-current="page"><?php echo $value->nama; ?></li>
          </ol>
        </nav>
      </div>
      <hr>
    </div>



  </div>
  <div class="dashboard-wrapper">
    <div class="container-fluid">
      <br>
      <div class="row">
        <div class="col-sm-4">
          <div class="__area text-center">
            <a href="#" class="__card card-body" id="">
              <button class="__favorit"><i class="la la-heart-o"></i></button>
              <img src="<?php echo base_url('upload/resto/') . $value->gambar; ?>" class="img-fluid __img" />

            </a>
          </div>
        </div>
        <div class="col-sm-8">

          <div class="__area">
            <a href="#" class="card-body" id="<?php echo $value->id_menu; ?>">
              <button class="__favorit"><i class="la la-heart-o"></i></button>

              <div class=" text-left" id="<?php echo $value->id_menu; ?>">
                <h2 class="card-title mb-2 text-black"><?php echo $value->nama; ?></h2>
                <p class="lear">Tersedia di Retreat Center Sukamakmur</p>
                <div class="__type">
                  <span href="#Italian"><?php echo $value->kategori; ?></span>
                </div>
                <p>
                  <?php echo $value->desc_masakan; ?> <br>

                </p>
                <!-- <form method="POST" action="<?= base_url('restaurant/keranjang/' . $value->id_menu); ?>">
      <div class = "text-bold">
      <h3 class="card-title mb-2 text-black">Rp. <?= number_format($value->harga, 0, ".", ".") ?>, -</h3> 
      <div class="input-group mt-3">
      <input type="text" hidden name="nama" value="<?= $value->nama; ?>">
      <input type="text" hidden name="harga" value="<?= $value->harga; ?>">
      <!-- //<input type="text" hidden name="nama" value="<?= $value->nama; ?>"> -->
                <!-- <button class=" __button_khas btn btn-primary font-weight-bold " id="minus" hidden >−</button>
    <input style=" max-width: 100px;" name="qty" class="form-control" type="number" value="0" id="input" required/>
<button class=" __button_khas btn btn-primary font-weight-bold " id="plus">+</button>
            &nbsp;&nbsp;<button type="submit" disabled id="pesan" class="btn btn-primary tambah  font-weight-bold rounded-pill __button_khas"><i class="fa-solid fa-basket-shopping"></i>&nbsp;Masukkan Keranjang</button> -->

              </div>
              <br><br><br><br>
          </div>
          <!-- </form>  -->


        </div>
        </a>
      </div>
    </div>
  </div>


</div>
</div>
</div>
<script>
  const minusButton = document.getElementById('minus');
  const plusButton = document.getElementById('plus');
  const inputField = document.getElementById('input');
  const pesanButton = document.getElementById('pesan');

  minusButton.addEventListener('click', event => {
    event.preventDefault();
    const currentValue = Number(inputField.value) || 0;
    inputField.value = currentValue - 1;
    pesan.disabled = true;
  });

  plusButton.addEventListener('click', event => {
    event.preventDefault();
    const currentValue = Number(inputField.value) || 0;
    inputField.value = currentValue + 1;
    pesan.disabled = false;
  });
</script>
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
</div>