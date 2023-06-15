<div class="menu-berhasil-pop" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php if ($this->session->flashdata('message')) : ?>

<?php endif; ?>

<aside class="col-sm-9">

  <div class="container">
    <h3>List Menu
      <button class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#tambahMenuModal">Tambah menu</button>
    </h3>

    <small>Silahkan Gunakan halaman ini untuk menambah, menghapus, dan mengedit menu</small>
    <hr />
    <table id="menadata" class="display" style="width:100%">
      <thead>
        <tr>

          <th>Menu</th>
          <th>Url</th>

        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($menu as $m) : ?>
          <tr>
            <th><a style="font-weight:bold"><?= $m['title']; ?></a><br />
              <a style="font-weight:bold"><button>Controller :: <?= $m['menu']; ?></a></button><br />
              <small>Menu yang dapat diakses : <a style="font-weight:bold"> <?= $m['menu_url']; ?></small></a>
            </th>

            <td>


              <a href="<?= base_url(); ?>menu/editMenu/<?= $m['menuId']; ?>" class="btn btn-outline-secondary btn btn-sm "></i>&nbsp;Edit</a>
              <a href="<?= base_url(); ?>menu/hapusMenu/<?= $m['menuId']; ?>" class="btn btn-outline-secondary btn-sm update-record tombol-hapus-menu"></i>&nbsp;Delete</a>
              </small>
            </td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>

    </table>


  </div>


</aside> <!-- col.// -->


</div> <!-- row.// -->

</div>
<form action="<?php echo site_url('menu/'); ?>" method="post">
  <div class="modal fade  dropdown-unfold dropdown-menu-right  font-size-16" id="tambahMenuModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Menu baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Menu Controller</label>
            <div class="col-sm-10">
              <input type="text" name="menu" class="form-control" placeholder="ketikkan nama Controller menu" required>
            </div>

            <label class="col-sm-2 col-form-label">Title Menu</label>
            <div class="col-sm-10">
              <input type="text" name="title" class="form-control" placeholder="ketikkan nama Title menu" required>
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

  if (flashData) {
    Swal({
      title: 'Menu',
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