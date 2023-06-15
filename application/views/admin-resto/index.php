<div class="login-pop" data-flashdata="<?= $this->session->flashdata('message-berhasil'); ?>"></div>
<?php if ($this->session->flashdata('message-berhasil')) : ?>




<?php endif; ?>
<div class="menu-berhasil-pop" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php if ($this->session->flashdata('message')) : ?>

<?php endif; ?>

<section>
<div class="container  __areas">
 
 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 __areasin">
 <center><h1>Buat Order Baru</h1></center> <hr>
    <form method="get" action="">
    <div class="container-fluid" id="option" name="option">
        <div class="row">
            <div class="col-lg-6">
                <div class="jumbotron __button_khas text-warning">
                    <h1 class="display-4">Dine in</h1>
                    
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                    <p class="lead">
                    <button class="btn btn-outline-white badge badge-success  btn-block btn btn-lg"  id="option" name="option" value="1" type="submit"><h2>Order Sekarang</h2> </button>
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="jumbotron __button_khas text-warning">
                    <h1 class="display-4">Take away</h1>
                    
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                    <p class="lead">
                    <button class="btn btn-outline-white badge badge-success  btn-block btn btn-lg"  id="option" name="option" value="2" type="submit"><h2>Order Sekarang</h2> </button>
                    </p>
                </div>
            </div>
            </div>
        </div>
    </div>
    </form>
</section>



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