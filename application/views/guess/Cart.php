

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="menu-berhasil-pop" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php if ($this->session->flashdata('message')) : ?>

<?php endif; ?>

<aside class="col-sm-9">

  <div class="container">
    <h3>List Transaksi
    </h3>

    <small>Silahkan Gunakan halaman ini untuk melihat semua transasksi</small>
    <hr />
    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
    <a class="nav-link text-warning active" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="true">Transaksi Berjalan</a>
  </li>
  <li class="nav-item">
    <a href="<?= base_url('guess/totalTf');?>" class="nav-link">Total Transaksi</a>
  </li>
 
  <!-- <li class="nav-item">
    <a class="nav-link text-success" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Transaksi Sukses</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-danger" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Transaksi Batal</a>
  </li>
  -->
</ul>

<div id ="respon-transaksi">
  <?php include 'respon-tf.php';?>
</div>

<script>
  $(function () {
    $('#myTab li:first-child a').tab('show')
  })
</script>
    


  </div>


</aside> <!-- col.// -->


</div> <!-- row.// -->

</div>




