<?php require_once '__breadcumb.php';?>
<style>
    .hidden {
  display: none;
}
</style>

<br>
<div class="container-fluid">

           
           
            <div class="row">   
<div class="col-lg-12">

List Daftar Menu
<hr>

sdf


	<article class="card-group-item">
		<div class="filter-content">
        <div class="row">
                 <?php if ($daftar_masakan === 'kosong') { ?>
                                      <div class="col">
                                              <div class="card-body">
                                                  <center class="alert alert-warning text-warning __button_khas">
                                                      <br>
                                                  <i class="fa-solid fa-martini-glass-empty fa-2xl"></i>
                                                  <h4>Belum ada Masakan</h4>
                                                  </center>
                                               
                                              </div>
                                          
                                      </div>
                                       </div>
                                       
                                  <?php } else { ?>
                                    <div class="container">
                                 <?php require_once '_pencarian/_cari_menu.php';?>
                                   
<br>
    <table id="menadata" class="display">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($daftar_masakan as $key => $value) { ?>
        <tr>
          <td><?php echo $value->nama ?></td>
          <td><?php echo $value->slugs ?></td>
          <td><?php echo $value->harga ?></td>
          <td><?php echo $value->nama ?></td>
          <td><?php echo $value->slugs ?></td>
          <td><?php echo $value->harga ?></td>
        </tr>
      <?php }; ?>
    </tbody>
  </table>

  
  </div>
  
</div>
                                  <?php } ?>
		</div>
	</article> <!-- card-group-item.// -->
	
 <!-- card.// -->



	</aside> <!-- col.// -->
            </div>

           
                          
                          
                                 
                                  
  

                                  
                              </div> </div>

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
<script>

$(document).ready(function() {
    $('form').submit(function() {
        var submitBtn = $(this).find('button[type="submit"]');
        submitBtn.attr('disabled', 'disabled').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
        setTimeout(function(){
            submitBtn.removeAttr('disabled').html('Search');
        }, 4000);
    });
});


$(document).ready(function() {
  $('#show-btn').click(function() {
    $('#my-div').show();
    $('#show-btn').hide();
  });

  $('#close-button').click(function() {
    $('#my-div').hide();
  });
});




</script>


