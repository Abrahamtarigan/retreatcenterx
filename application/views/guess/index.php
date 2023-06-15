<div class="login-pop" data-flashdata="<?= $this->session->flashdata('message-berhasil'); ?>"></div>
<?php if ($this->session->flashdata('message-berhasil')) : ?>




<?php endif; ?>

<div class="menu-berhasil-pop" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php if ($this->session->flashdata('message')) : ?>

<?php endif; ?>

<aside class="col-lg-9">
  <div class="container">
  
   
    <div class="row">
   
      <div class="col-sm-12" style="width: 100%;">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Selamat Datang di Dashboard kamu</h5>
            <hr />
           
            <div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        
        <h5 class="card-title">
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
  <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
  <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
</svg>  
          Profil kamu belum lengkap</h5>
        <p class="card-text">Silahkan Lengkapi Profil kamu untuk mendapatkan promo - promo dari kami</p>
        <a href="#" class="btn btn-warning">
            
        Lengkapi Profil</a>
      </div>
    </div>
    <br/>
  </div>
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
  <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg>&nbsp;Lanjutkan Proses Pembayaran kamu</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-warning">Go somewhere</a>
      </div>
    </div>
  </div>
</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php

  $menu = $this->uri->segment(2);
  echo $menu;
  $queryMenu = $this->db->get_where('user_menu', ['menu' => $menu])->row_array();
  $menu_id = $queryMenu['id'];

  echo $menu_id;
  ?>
</aside> <!-- col.// -->

</div> <!-- row.// -->

</div>
<form action="<?php echo site_url('menu/'); ?>" method="post">
  <div class="modal fade" id="tambahMenuModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Menu baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Menu</label>
            <div class="col-sm-10">
              <input type="text" name="menu" class="form-control" placeholder="ketikkan nama menu" required>
            </div>
            <label class="col-sm-2 col-form-label">Url Menu</label>
            <div class="col-sm-10">
              <input type="text" name="menu_url" class="form-control" placeholder="Url Menu" required>
            </div>

            <label class="col-sm-2 col-form-label">Icon Menu</label>
            <div class="col-sm-10">
              <input type="text" name="icon" class="form-control" placeholder="masukkan icon menu" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="edit_id" required>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary btn-sm">Tambah Menu</button>
        </div>
      </div>
    </div>
  </div>
</form>

<form action="<?php echo site_url('menu/updateMenu'); ?>" method="post">
  <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Menu</label>
            <div class="col-sm-10">
              <input type="text" name="menu_edit" class="form-control" placeholder="menu" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="edit_id" required>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </div>
      </div>
    </div>
  </div>
</form>

<!--container end.//-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<script type="text/javascript">
  const flashData = $('.menu-berhasil-pop').data('flashdata');
  const berhasil_login = $('.login-pop').data('flashdata');

  if (flashData) {
    Swal({
      title: 'Menu',
      text: 'Berhasil ' + flashData,
      type: 'success'
    });
  }
  if (berhasil_login) {
    Swal({
      title: 'Berhasil Login',
      text: berhasil_login,
      type: 'success',
      timer: 3000,
      timerProgressBar: true,
      onBeforeOpen: () => {
        Swal.showLoading()

      },



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