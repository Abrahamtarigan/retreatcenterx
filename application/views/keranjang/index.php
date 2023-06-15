<div class="menu-berhasil-pop" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php if ($this->session->flashdata('message')) : ?>

<?php endif; ?>
<div class="container  __areas">

  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 __areasin">
    <div class="page-header ">


      <div class="page-breadcrumb">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item text-warning"><a href="<?php echo site_url(''); ?>" class="breadcrumb-link text-dark">Dashboard</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page"><?php echo $this->uri->segment(1); ?></li>

          </ol>
        </nav>
      </div>
      <hr>
    </div>
    <main class="mt-4 pt-4">
      <div class="container dark-grey-text mt-5">

        <div class="card-body">
          <!-- Shopping cart table -->
          <?php if (count($this->cart->contents()) != 0) : ?>
            <h3 style="margin:-80px;" class="text-center">Keranjang Belanja anda</h3>
            <br><br><br>

            <div class="alert bg-info mb-5 py-4 __button_khas" role="alert">
              <div class="d-flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle">
                  <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                  <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                <div class="px-3">
                  <h5 class="alert-heading text-white">Lihat Kembali Pesanan anda</h5>
                  <p>Silahkan Lihat Kembali keseluruhan pesanan anda, untuk mencegah kekeliruan dalam memesan</p>

                  <a href="#" class="btn btn-warning __button_khas text-warning btn-sm" data-dismiss="alert" aria-label="Close" data-abc="true">Tutup Info ini</a>
                  <a href="<?= base_url('restaurant/menu'); ?>" class="btn btn-white mx-1 btn-sm" data-abc="true">
                    Lanjutkan Belanja
                    <i class="fa-solid fa-arrow-right-long"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="table table-responsive mb-2 __areas">
              <table class="table mb-0">
                <thead class="">
                  <tr class="">
                    <th scope="col" class="border-0 bg-light ">
                      <div class="p-2 px-3  __button_khas_all">Produk</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 __button_khas_all">Categori</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 __button_khas_all">Harga</div>
                    </th>

                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 __button_khas_all">Sub Total</div>
                    </th>
                    <th scope="col" class="border-0 bg-light text-center">
                      <div class="py-2 __button_khas_all">Aksi</div>
                    </th>
                  </tr>
                </thead>
                <tbody id="detail_cart">
                  <?php foreach ($this->cart->contents() as $items) : ?>
                    <tr>
                      <th scope="row">
                        <div class="p-2">
                          <!-- <img src="<?= $items['gambar'] ?>" alt="" width="70" class="img-fluid rounded shadow-sm"> -->

                          <div class="ml-3 d-inline-block align-middle">
                            <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block"><small><?= $items['name'] ?> </small><b></b></a></h5>
                          </div>
                        </div>
                      </th>
                      <td class="align-middle">

                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block"><small><?= $items['option']; ?></small><b></b></a></h5>

                      </td>
            </div>
            <td class="align-middle"><small><strong>Rp <?= number_format($items['price'], 0, ',', '.') ?> x (<strong><?= $items['qty'] ?></strong> item)</small></strong></td>
            <td class="align-middle"><small><strong>Rp <?= number_format($items['subtotal'], 0, ',', '.') ?></strong></small></td>
            <td class="align-middle text-center"><a href="<?= base_url('restaurant/hapus_items/' . $items['rowid']) ?>"><small><i class="fa fa-trash text-danger" aria-hidden="true"></i></small></a></td>
            </tr>
            </tr>
          <?php endforeach; ?>
          <tr>
            <td colspan="3" class="align-middle text-right __area_text"><span class="">
                <h5>
                  <u>Total Rp <?= number_format($this->cart->total(), 0, ',', '.') ?>
                </h5></u>
                </<span>
            </td>
            <?php
            if (isset($userId)) {
            ?>
              <td><a href="<?= base_url('keranjang/checkout') ?>"><button class="btn btn-warning btn-md float-right __button_khas btn btn-outline-warning font-weight-bold ">Lanjutkan Pembayaran&nbsp;<i class="fa-solid fa-cart-shopping"></i></button></a></td>
            <?php
            } else {
            ?>
              <td><a href="<?= base_url('auth/sign_in') ?>"><button class="btn btn-success rounded btn-md float-right">
                    <p class="text-dark" style="font-weight:5px;">Login Terlebih Dahulu<i class="fa-solid fa-cart-shopping"></i></p>
                  </button></a></td>
            <?php
            }

            ?>

          </tr>
          </tbody>
          </table>
        </div>
      <?php else : ?>
        <h3 class="text-center">Keranjang Belanja Kosong!</h3>
      <?php endif; ?>
      </div>

  </div>
  </main>



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