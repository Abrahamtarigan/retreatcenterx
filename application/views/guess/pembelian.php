<div class="login-pop" data-flashdata="<?= $this->session->flashdata('message-berhasil'); ?>"></div>
<?php if ($this->session->flashdata('message-berhasil')) : ?>




<?php endif; ?>

<div class="menu-berhasil-pop" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php if ($this->session->flashdata('message')) : ?>

<?php endif; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
<aside class="col-sm-9">

  <div class="container">
    <h3>Daftar Total Pembelian
      
    </h3>

    <small>Silahkan Gunakan halaman ini untuk melihat total pembelian</small>
    
    <table id="transaksi_clear_by_id" class="table table-striped" >
      <thead>
        <tr>

          <th>Booking Details</th>
          <th>Status Transaksi</th>

        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($getAllSucessTrById as $ubo) { ?>
          <?php
          date_default_timezone_set('Asia/Jakarta');
          $current_date = date('Y-m-d H:i:s');

            $tgl_check_in = date_create($ubo->bookingStDt);
            $tgl_check_out = date_create($ubo->bookingEdDt);
            $time_booking = date_create($ubo->bookingTime);
            $end_period = date_create($ubo->bookingTimeStacEnd);

            
            //format tanggal dan waktu check in
            $formatted_date_check_in_date = date_format($tgl_check_in, 'd/m/Y');
            $formatted_date_check_in_time = date_format($tgl_check_in, 'h:i:s');
     
            //format tanggal dan waktu check out
            $formatted_date_check_out_date = date_format($tgl_check_out, 'd/m/Y');
            $formatted_date_check_out_time = date_format($tgl_check_out, 'h:i:s');

            //format tanggal untuk booking time
            $formatted_date_booking_time = date_format($time_booking, 'd/m/Y h:i:s');
            //format tanggal end periode pembayaran
            $formatted_end_period_payment = date_format($end_period, 'd/m/Y h:i:s');
            

          ?>
          <tr>
            <th><a style="font-weight:bold"><?= $ubo->roomName; ?></a>&nbsp;<br/>by:
              <a style="font-weight:bold"><a class="text-primary"><?= $ubo->userNama; ?></a></a><br />
              <small>Id Booking : <a style="font-weight:bold"> <?= $ubo->bookingId_text; ?></small></a><br/>
              <small>Check-in : <a class="text-orange" style="font-weight:bold"> <?= $formatted_date_check_in_date; ?>&nbsp;<?= $formatted_date_check_in_time; ?></small></a>
              <small>Check-out : <a class="text-orange" style="font-weight:bold"> <?= $formatted_date_check_out_date; ?>&nbsp;<?= $formatted_date_check_out_time; ?></small></a><br/>
              <small>Booking Time : <a class="text-green" style="font-weight:bold"> <?= $formatted_date_booking_time?></small></a><br/>
              <small>End Period Payments: <a class="text-danger" style="font-weight:bold"> <?= $formatted_end_period_payment; ?></small></a><br/>
            <small>Total Bayar :<a class="text-black" style="font-weight:bold; font-size:17px;"> Rp. 
            <?= number_format($ubo->bookingTotalPay, 0, ".", ".")?></small></a>
              
            </th>

            
            <td style="width:200px;">
              <?php if ($ubo->status_booking == 2 )
              {
                ?>
                  <div class="alert alert-success" role="alert">
                    <?= $ubo->status_booking_name; ?>
                   </div>
                <?php
              }else if($ubo->status_booking_name == 1 )
              {
                ?>
                <div class="alert alert-warning" role="alert">
                  <?= $ubo->status_booking; ?>
                 </div>
              <?php
              }else if($ubo->status_booking_name == 0 ){
                ?>
                <div class="alert alert-danger" role="alert">
                  <?= $ubo->status_booking_name; ?>
                 </div>
              <?php
              }
              ?>
            
            
               
            </td>
          </tr>
          <?php $i++; ?>
        <?php } ?>
      </tbody>

    </table>
            </div>
            </div>
    </body>
    
</html>
<script>
    $(document).ready( function () {
    $('#transaksi_clear_by_id').DataTable();
} );
</script>

<style>
  .box {
  position: relative;
  background: #ffffff;
  width: 100%;
}
  .box-header {
  color: #444;
  display: block;
  padding: 10px;
  position: relative;
  border-bottom: 1px solid #f4f4f4;
  margin-bottom: 10px;
}
.box-tools {
  position: absolute;
  right: 10px;
  top: 5px;
}
.dropzone-wrapper {
  border: 2px dashed #91b0b3;
  color: #92b0b3;
  position: relative;
  height: 150px;
}
.dropzone-desc {
  position: absolute;
  margin: 0 auto;
  left: 0;
  right: 0;
  text-align: center;
  width: 40%;
  top: 50px;
  font-size: 16px;
}
.dropzone,
.dropzone:focus {
  position: absolute;
  outline: none !important;
  width: 100%;
  height: 150px;
  cursor: pointer;
  opacity: 0;
}
.dropzone-wrapper:hover,
.dropzone-wrapper.dragover {
  background: #ecf0f5;
}
.preview-zone {
  text-align: center;
}
.preview-zone .box {
  box-shadow: none;
  border-radius: 0;
  margin-bottom: 0;
}</style>
<script>
      /**
     *
     * app.js
     *
     */
    function readFile(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function (e) {
    var htmlPreview = 
    '<img width="200" src="' + e.target.result + '" />'+
    '<p>' + input.files[0].name + '</p>';
    var wrapperZone = $(input).parent();
    var previewZone = $(input).parent().parent().find('.preview-zone');
    var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');
    
    wrapperZone.removeClass('dragover');
    previewZone.removeClass('hidden');
    boxZone.empty();
    boxZone.append(htmlPreview);
    };
    
    reader.readAsDataURL(input.files[0]);
    }
    }
    function reset(e) {
    e.wrap('<form>').closest('form').get(0).reset();
    e.unwrap();
    }
    $(".dropzone").change(function(){
    readFile(this);
    });
    $('.dropzone-wrapper').on('dragover', function(e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).addClass('dragover');
    });
    $('.dropzone-wrapper').on('dragleave', function(e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).removeClass('dragover');
    });
    $('.remove-preview').on('click', function() {
    var boxZone = $(this).parents('.preview-zone').find('.box-body');
    var previewZone = $(this).parents('.preview-zone');
    var dropzone = $(this).parents('.form-group').find('.dropzone');
    boxZone.empty();
    previewZone.addClass('hidden');
    reset(dropzone);
    });
</script>