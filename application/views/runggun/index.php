<div class="role-berhasil-pop" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php if ($this->session->flashdata('message')) : ?>

<?php endif; ?>

<aside class="col-sm-9">
       <div class="container">
              <h3>List Runggun
                     <button class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#tambahMenuModal">Tambah Runggun Baru</button>
              </h3>
              <small>Silahkan Gunakan halaman ini manajemen Runggun dan Sektor</small>
              <hr />

              <table id="menadata" class="display">

                     <thead>
                            <tr>

                                   <th style="width: 580px;">Runggun</th>
  
                                   <th>Aksi</th>
                            </tr>
                     </thead>
                     <tbody>
        <?php $i = 1; ?>
        <?php foreach ($runggun as $rg) : ?>
          <tr>
            <th><a style="font-weight:bold"><?= $rg['runggunNama']; ?></a><br />
              <small>Alamat : <a style="font-weight:bold"> <?= $rg['runggunAlamat']; ?></small></a>
              <br/><small  style="height:10px;"><a href="" style="font-weight:light">Tambah Pendeta</small></a>
              <small><a  style="font-weight:light">Tambah Ketua Runggun</small></a>
            </th>

            <td>
              <a href="<?= base_url(); ?>menu/editMenu/<?= $rg['runggunId']; ?>" class="btn btn-outline-secondary btn btn-sm "></i>&nbsp;Edit</a>
              <a href="<?= base_url(); ?>menu/hapusMenu/<?= $rg['runggunId']; ?>" class="btn btn-outline-secondary btn-sm update-record tombol-hapus-menu"></i>&nbsp;Delete</a>
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
<form action="<?php echo site_url('runggun/tambah_runggun'); ?>" method="post">
       <div class="modal fade" id="tambahMenuModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                            <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLabel">Tambah Runggun Baru</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                   </button>
                            </div>
                            <div class="modal-body">
                            <div class='form-group'>
                                          <label>Nama Runggun</label>
                                          <small><i>Cth.GBKP Runggun Simpang Selayang</i></small>
                                          <input type="text" name="runggunNama" class="form-control input-lg" placeholder="Masukkan Nama Runggun" >
                                                
                                   </div>
                                   <div class='form-group'>
                                          <label>Klasis</label>
                                          <select name="runggunKlasisId" id="klasis" class="form-control ">
                                                 <option value="">Pilih Klasis</option>
                                                        <?php
                                                        foreach($klasis as $row)
                                                        {
                                                        echo '<option value="'.$row->klasisId.'">'.$row->klasisNama.'</option>';
                                                        }
                                                        ?>
                                          </select>
                                   </div>

                                   

                                 
                                   <div class='form-group'>
                                          <label>Provinsi</label>
                                          <select name="runggunProvId" id="provinsi" class="form-control ">
                                                 <option value="">Pilih Provinsi</option>
                                                        <?php
                                                        foreach($provinsi as $row)
                                                        {
                                                        echo '<option value="'.$row->provId.'">'.$row->provNama.'</option>';
                                                        }
                                                        ?>
                                          </select>
                                   </div>

                                   <div class='form-group'>
                                          <label>Kabupaten/kota</label>
                                          <select name="runggunKabId" id="kabupaten" class="form-control input-lg">
                                                 <option value="">Pilih Kabupaten/ Kota</option>
                                          </select>
                                   </div>


                                   <div class='form-group'>
                                          <label>Kecamatan</label>
                                          <select name="runggunKecId" id="kecamatan" class="form-control">
                                                  <option value="">Pilih Kecamatan</option>
                                          </select>
                                   </div>


                                   <div class='form-group'>
                                          <label>Kelurahan/desa</label>
                                          <select name="runggunKelId" id="kelurahan"class="form-control">
                                                 <option value='0'>Pilih Kelurahan/ Desa</option>
                                          </select>
                                   </div>
                                   <div class='form-group'>
                                          <label>Alamat Runggun</label>
                                          <textarea name="runggunAlamat" id="runggunAlamat"class="form-control"></textarea>
                                                 
                                   </div>
                            </div>
                            <div class="modal-footer">
                                   <input type="hidden" name="edit_id" required>
                                   <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                                   <button type="submit" class="btn btn-primary btn-sm">Tambah Runggun</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


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
<script>
$(document).ready(function(){
 $('#provinsi').change(function(){
  var provId = $('#provinsi').val();
  if(provId != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>runggun/getKabupaten",
    method:"POST",
    data:{provId:provId},
    success:function(data)
    {
     $('#kabupaten').html(data);
    
    }
   });
  }
  else
  {
   $('#kabupaten').html('<option value="">Pilih Kabupaten/ kota 2</option>');
   $('#city').html('<option value="">Select City</option>');
  }
 });

 $('#kabupaten').change(function(){
  var kabId = $('#kabupaten').val();
  if(kabId != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>runggun/getKecamatan",
    method:"POST",
    data:{kabId:kabId},
    success:function(data)
    {
     $('#kecamatan').html(data);
    }
   });
  }
  else
  {
   $('#city').html('<option value="">Select City</option>');
  }
 });
 $('#kecamatan').change(function(){
  var kecId = $('#kecamatan').val();
  if(kecId != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>runggun/getKelurahan",
    method:"POST",
    data:{kecId:kecId},
    success:function(data)
    {
     $('#kelurahan').html(data);
    }
   });
  }
  else
  {
   $('#city').html('<option value="">Select City</option>');
  }
 });
 
});
</script>