<div class="role-berhasil-pop" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php if ($this->session->flashdata('message')) : ?>

<?php endif; ?>

<aside class="col-sm-9">
  <div class="container">
    <h3>List Role
      <button class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#tambahMenuModal">Tambah Role Baru</button>
    </h3>
    <small>Silahkan Gunakan halaman ini untuk menambah, menghapus, dan mengedit Role</small>
    <hr />

    <table id="menadata" class="display">

      <thead>
        <tr>

          <th>Rule</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($role as $r) : ?>
          <tr>

            <td style="font-weight:bold"><?= $r['role']; ?></td>
            <td>
              <a href="<?= base_url('roles/roleaccess/') . $r['id']; ?>" class="btn btn-outline-secondary btn btn-sm">&nbsp;Edit Akses</a>
              <a href="#" class="btn btn-outline-secondary btn btn-sm update-record" data-id="<?= $r['id']; ?>" data-role="<?= $r['role']; ?>">&nbsp;Edit</a>
              <a href="<?= base_url(); ?>dashboard/hapus_role/<?= $r['id']; ?>" class="btn btn-outline-secondary btn btn-sm tombol-hapus-role" data-toggle="tooltip" title="Hapus">&nbsp;Delete</a>
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
<form action="<?php echo site_url('dashboard/tambah_role'); ?>" method="post">
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
            <label class="col-sm-2 col-form-label">Nama Role</label>
            <div class="col-sm-10">
              <input type="text" name="role" class="form-control" placeholder="Ketikkan nama role baru" required>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="edit_id" required>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary btn-sm">Tambah Role</button>
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
  const flashData = $('.role-berhasil-pop').data('flashdata');

  if (flashData) {
    Swal({
      title: 'Rule ',
      text: flashData,
      type: 'success'
    });
  }

  // tombol-hapus
  $('.tombol-hapus-role').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
      title: 'Apakah anda yakin',
      text: "Akan menghapus data ini ?",
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
    $('.update-record').on('click', function() {
      var id = $(this).data('id');
      var role = $(this).data('role');
      $(".strings").val('');
      $('#UpdateModal').modal('show');
      $('[name="edit_id"]').val(id);
      $('[name="role_edit"]').val(role);

      return false;
    });



  });
</script>