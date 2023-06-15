
   
        
        <h5 class="card-title">
        <table id="menadata" class="display " style="width:100%; " >
            
           
        <tr>
           
            <td ><a style="font-size:16px;color:black;font-weight:bold;">Keterangan</a></td>
            <td><a style="font-size:16px;color:black;font-weight:bold;">Harga</a></td>
            
           
        </tr>
           
       
        <?php
          date_default_timezone_set('Asia/Jakarta');
          $current_date = date('Y-m-d H:i:s');
          ?>

        <?php foreach ($getBookings as $gt) { 
       
       $tgl_check_in = date_create($gt->bookingStDt_check);
       $tgl_check_out = date_create($gt->bookingEdDt_check);
       
       //format tanggal dan waktu check in
       $formatted_date_check_in_date = date_format($tgl_check_in, 'd/m/Y');
       $formatted_date_check_in_time = date_format($tgl_check_in, 'h:i:s');

       //format tanggal dan waktu check out
       $formatted_date_check_out_date = date_format($tgl_check_out, 'd/m/Y');
       $formatted_date_check_out_time = date_format($tgl_check_out, 'h:i:s');
       ?>
       

        <tr>
            <td class=""><a style="font-size:26px;color:black;font-weight:bold;"><?= $gt->roomName;?></a><h6><i class="icon flaticon-placeholder mr-2 font-size-10"><?=$gt->roomLocation;?></i></a></h6>
            <small>Booking Id : <a style="font-weight:bold"> <?= $gt->bookingId_text; ?></small></a><br/>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16">
  <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z"/>
  <path d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z"/>
  <small><a style="font-size:13 px;font-weight:bold;">
            
            Check-in:&nbsp;<?= $formatted_date_check_in_date; ?></a> <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jam <?= $formatted_date_check_in_time;?><h6>

</svg>
<hr/>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16">
  <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z"/>
  <path d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z"/>
  <small><a style="font-size:13 px;font-weight:bold;">
            
            <a style="font-size:15 px;font-weight:bold;">Check-out:&nbsp;<?= $formatted_date_check_out_date; ?><h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jam <?= $formatted_date_check_out_time;?><h6>



</svg>




            
            
            
           
           
            
            <?php
       
             if ($gt->status_booking == 1) {

                if($current_date >= $gt->bookingTimeStacEnd){
                  ?>
                     <div class="clockdiv alert alert-danger btn-sm" data-date="<?= $gt->bookingTimeStacEnd;?>">
            <span style="font-weight: bold;">
            Masa Pembayaran akan habis dalam :<br/></span>
            <small><span class="days"></span>
            Hari
          
          
            <span class="hours"></span>
            Jam
          
          
            <span class="minutes"></span>
            Menit
          
          
            <span class="seconds"></span>
            Detik</small>
           
          
        </div>
                  <?php
                  //$this->db->query("UPDATE tb_rooms_bookings SET  status_booking = 0 WHERE status_booking = 1 AND bookingId = $gt->bookingId");
                 
                  // $this->db->query("INSERT INTO tb_trash_rooms_bookings
                  // VALUES ($gt->bookingId, $gt->bookingRoomId, $gt->bookingStDt, $gt->bookingEdDt, $gt->bookingTime, $gt->bookingTimeStacEnd, $gt->bookingUserId, $gt->bookingNights, $gt->bookingTotalPay, $gt->status_booking, $gt->is_pay )");
                  $this->db->query("INSERT INTO `tb_log_rooms_bookings` (`bookingId`,`bookingId_text`, `bookingRoomId`, `bookingStDt`, `bookingEdDt`,`bookingStDt_check`,`bookingEdDt_check`, `bookingTime`, `bookingTimeStacEnd`, `bookingUserId`, `bookingNights`, `bookingTotalPay`, `userEditPriceId`,`userEditKeterangan`,`status_booking`, `payment_prove_image`,`adminOpValidate`,`is_pay`) VALUES ('$gt->bookingId',
                  '$gt->bookingId_text', 
                  '$gt->bookingRoomId', 
                  '$gt->bookingStDt', 
                  '$gt->bookingEdDt', 
                  '$gt->bookingStDt_check', 
                  '$gt->bookingEdDt_check', 
                  '$gt->bookingTime', 
                  '$gt->bookingTimeStacEnd', 
                  '$gt->bookingUserId', 
                  '$gt->bookingNights', 
                  '$gt->bookingTotalPay', 
                  '$gt->userEditPriceId',
                  '$gt->userEditKeterangan', 
                  '0', 
                  '$gt->payment_prove_image', 
                  '$gt->adminOpValidate',
                  '$gt->is_pay')");
                  $this->db->query("DELETE from tb_rooms_bookings  WHERE status_booking = 1 AND bookingId = $gt->bookingId");
                  // echo $this->db->last_query();
                  // die;
                  redirect('guess/cart');

                }
                else{
                  
                  
                }
              }elseif($gt->status_booking == 0 ) {
                echo "";
              }
            
            
            ?>
            
         
            
            
           
            </td>
            <td>

            <?php 
            if ($gt->userEditPriceId == '-'){
              echo '';
            }else {
              ?>
               <small>Pengubah Harga<a class="text-danger" style="font-weight:bold"> <?=  $gt->userEditPriceId?></small></a><br/>
              
              <?php
            }
           ?>
            <h6  style="font-size:16px;color:black;font-weight:bold;">
           Rp. 
            <?= number_format($gt->bookingTotalPay, 0, ".", ".")?></h6>
              <hr/>
            <?php
                if ($gt->status_booking == 1){
                 ?>
                  <a data-toggle="modal" data-target="#validasi-pembayaran<?=$gt->bookingId;?>" class="add-facility-js btn btn-warning hupdate-record add-facility"></i>&nbsp;Pembayaran Sekarang</a><hr/>
                 <?php
                }elseif($gt->status_booking == 3){
                  ?>
                  <a data-toggle="modal" class="add-facility-js btn btn-primary hupdate-record add-facility text-white"></i>&nbsp;Menunggu Proses Validasi Admin</a><hr/>
                 <?php
                }elseif($gt->status_booking == 2){
                  ?>
                  <a data-toggle="modal" class="add-facility-js btn btn-success hupdate-record add-facility text-white"></i>&nbsp;Transaksi Sukses</a><hr/>
                 <?php
                }
                elseif($gt->status_booking == 0)
                {
                  echo '<a class="alert alert-danger" style="font-size:16px;color:red;font-weight:bold;">Tagihan ini Kadaluarsa</a>';
                }
            ?>
             
        </td>
            <td>
            
               

            </td>
            
            
            
        </tr>
        <?php }?>
    </table>
    <br/>
  </div>
  
  
          </div>
        </div>
      </div>
    </div>
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