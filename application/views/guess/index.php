<div class="login-pop" data-flashdata="<?= $this->session->flashdata('message-berhasil'); ?>"></div>
<?php if ($this->session->flashdata('message-berhasil')) : ?>




<?php endif; ?>

<div class="menu-berhasil-pop" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php if ($this->session->flashdata('message')) : ?>

<?php endif; ?>


<div class="col-lg-9">
  <article class="card-group-item">
    <div class="col-lg-12">

      <div class="media">

        <div class="media-body">
          <h5 class="mt-0 text-left"><b>Mengapa harus Staycation di Retreat Center</b></h5>
          <p class="text-left"><small>Dengan pengalaman maksimal kami dalam melayani tamu dengan harga yang rendah, kami menawarkan beberapa layanan</small></p>


        </div>
      </div>
      <!-- <img style="width:100%; border-radius:8px;" src="<?= base_url('upload/slide/slide1.png'); ?>" alt="Gambar Hotel XYZ"> -->
    </div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div class="container">
        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ul>

        <!-- Slides -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?= base_url('upload/slide/slide1.png'); ?>" style="width:100%; border-radius:8px;" alt=" Image 1">
          </div>

        </div>

        <!-- Controls -->
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
  </article>

</div>

<br>

</div>
</div>
</article>
</div>
</div>
</div>
<script>
  $(function() {
    $("#datepicker").datepicker({
      dateFormat: "dd/mm/yy",
      minDate: 0,
      showButtonPanel: true,
      beforeShow: function(input) {
        $(input).attr("autocomplete", "off");
      }
    });
  });
</script>
<script>
  // Mendapatkan elemen tombol dan input field jumlah tamu
  var decreaseBtn = document.getElementById('decreaseBtn');
  var increaseBtn = document.getElementById('increaseBtn');
  var guestsInput = document.getElementById('guestsInput');

  // Menambahkan event listener untuk tombol tambah
  increaseBtn.addEventListener('click', function() {
    guestsInput.value = parseInt(guestsInput.value) + 1;
  });

  // Menambahkan event listener untuk tombol kurang
  decreaseBtn.addEventListener('click', function() {
    if (parseInt(guestsInput.value) > 1) {
      guestsInput.value = parseInt(guestsInput.value) - 1;
    }
  });
</script>
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