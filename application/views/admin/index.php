<div class="login-pop" data-flashdata="<?= $this->session->flashdata('message-berhasil'); ?>"></div>
<?php if ($this->session->flashdata('message-berhasil')) : ?>




<?php endif; ?>
<div class="menu-berhasil-pop" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php if ($this->session->flashdata('message')) : ?>

<?php endif; ?>

<aside class="col-lg-9">
  <div class="container">
    
    <div class="alert alert-success">
      <h3>Statistik Terkini
      </h3>
      <small>Lihat Informasi Aktual dari Keseluruhan kesimpulan data yang ada

      </small>

    </div>
   
    <div id="responseContainer">
    </div>
    
  <br/>
  
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

<script>
    $(document).ready(function(){  
        setInterval(function(){   
          $('#responseContainer').load('test');
        }, 1000);
    });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>