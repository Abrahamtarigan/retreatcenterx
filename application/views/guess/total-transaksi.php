<aside class="col-sm-9">

  <div class="container">
    <h3>Total Transaksi Hotel
    </h3>

    <small>Silahkan Gunakan halaman ini untuk melihat semua transasksi</small>
    <hr />
<table id="menadata" class="table" >
      <thead>
        <tr>

          <th>Booking Details</th>
          <th>Status Transaksi</th>

        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($getBookingsClear as $gbc) { ?>
          <?php
          date_default_timezone_set('Asia/Jakarta');
          $current_date = date('Y-m-d H:i:s');

            $tgl_check_in = date_create($gbc->bookingStDt);
            $tgl_check_out = date_create($gbc->bookingEdDt);
            $time_booking = date_create($gbc->bookingTime);
            $end_period = date_create($gbc->bookingTimeStacEnd);

            
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
            <th><a style="font-weight:bold"><?= $gbc->roomName; ?></a>&nbsp;<br/>by:
              <!-- <a style="font-weight:bold"><a class="text-primary"><?= $gbc->userNama; ?></a></a><br /> -->
              <small>Id Booking : <a style="font-weight:bold"> <?= $gbc->bookingId_text; ?></small></a><br/>
              <small>Check-in : <a class="text-orange" style="font-weight:bold"> <?= $formatted_date_check_in_date; ?>&nbsp;<?= $formatted_date_check_in_time; ?></small></a>
              <small>Check-out : <a class="text-orange" style="font-weight:bold"> <?= $formatted_date_check_out_date; ?>&nbsp;<?= $formatted_date_check_out_time; ?></small></a><br/>
              <small>Booking Time : <a class="text-green" style="font-weight:bold"> <?= $formatted_date_booking_time?></small></a><br/>
              <small>End Period Payments: <a class="text-danger" style="font-weight:bold"> <?= $formatted_end_period_payment; ?></small></a><br/>
            <small>Total Bayar :<a class="text-black" style="font-weight:bold; font-size:17px;"> Rp. 
            <?= number_format($gbc->bookingTotalPay, 0, ".", ".")?></small></a>
              
            </th>

            
            <td style="width:200px;">
              <?php if ($gbc->status_booking == 2 )
              {
                ?>
                 <a data-toggle="modal" class="add-facility-js btn btn-success hupdate-record add-facility btn-sm"></i><svg style="height:18px;width:18px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M374.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 178.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l80 80c12.5 12.5 32.8 12.5 45.3 0l160-160zm96 128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 402.7 86.6 297.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l256-256z"/></svg>&nbsp;Transaksi Sukses</a><hr/>
                                  <a href="<?= base_url('guess/cetak/'.$gbc->bookingId);?>"  class="add-facility-js border border-warning btn btn-warning hupdate-record add-facility btn-sm text-black rounded-pill" ></i><svg style="height:18px;width:18px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>&nbsp;Bukti Pembayaran</a>
                   
                <?php
              }else if($gbc->status_booking == 1 )
              {
                ?>
                <div class="alert alert-warning" role="alert">
                  <?= $gbc->status_booking_name; ?>
                 </div>
              <?php
              }else if($gbc->status_booking == 0 ){
                ?>
                <div class="alert alert-danger" role="alert">
                  <?= $gbc->status_booking_name; ?>
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
    <script>
  $(document).ready(function () {
    $('#example').DataTable();
});
</script>
<script>
  document.addEventListener('readystatechange', event => {
    if (event.target.readyState === "complete") {
        var clockdiv = document.getElementsByClassName("clockdiv");
      var countDownDate = new Array();
        for (var i = 0; i < clockdiv.length; i++) {
            countDownDate[i] = new Array();
            countDownDate[i]['el'] = clockdiv[i];
            countDownDate[i]['time'] = new Date(clockdiv[i].getAttribute('data-date')).getTime();
            countDownDate[i]['days'] = 0;
            countDownDate[i]['hours'] = 0;
            countDownDate[i]['seconds'] = 0;
            countDownDate[i]['minutes'] = 0;
        }
      
      var countdownfunction = setInterval(function() {
for (var i = 0; i < countDownDate.length; i++) {
                var now = new Date().getTime();
                var distance = countDownDate[i]['time'] - now;
                 countDownDate[i]['days'] = Math.floor(distance / (1000 * 60 * 60 * 24));
                 countDownDate[i]['hours'] = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                 countDownDate[i]['minutes'] = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                 countDownDate[i]['seconds'] = Math.floor((distance % (1000 * 60)) / 1000);
                
                 if (distance < 0) {
                  window.location.href = "<?= base_url('guess/cart');?>";
                 }else{
countDownDate[i]['el'].querySelector('.days').innerHTML = countDownDate[i]['days'];
                countDownDate[i]['el'].querySelector('.hours').innerHTML = countDownDate[i]['hours'];
                countDownDate[i]['el'].querySelector('.minutes').innerHTML = countDownDate[i]['minutes'];
                countDownDate[i]['el'].querySelector('.seconds').innerHTML = countDownDate[i]['seconds'];
}
  
     }
            }, 1000);
    }
});

</script>
<link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' /><script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
<script>  new FroalaEditor('textarea#froala-editor')</script>

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