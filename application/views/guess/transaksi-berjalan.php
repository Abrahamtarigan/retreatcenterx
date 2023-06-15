<br>
<table id="example" class="table table-striped" >
      <thead>
        <tr>
          <th style="width:400px;">Booking Details</th>
          <th>Booking Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($getBookings as $gb) { ?>
          <?php
            $tgl_check_in = date_create($gb->bookingStDt_check);
            $tgl_check_out = date_create($gb->bookingEdDt_check);
            $time_booking = date_create($gb->bookingTime);
            $end_period = date_create($gb->bookingTimeStacEnd);
            
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
            <th><a style="font-weight:bold"><?= $gb->roomName; ?></a>&nbsp;
            <!-- by: -->
              <!-- <a style="font-weight:bold"><a class="text-primary"><?= $gb->userNama; ?></a></a><br /> -->
              <small>Booking Id : <a style="font-weight:bold"> <?= $gb->bookingId_text; ?></small></a><br/>
              <small>Check-in : <a class="text-dark" style="font-weight:bold"> <?= $formatted_date_check_in_date; ?>&nbsp;<?= $formatted_date_check_in_time; ?></small></a><br/>
              <small>Check-out : <a class="text-dark" style="font-weight:bold"> <?= $formatted_date_check_out_date; ?>&nbsp;<?= $formatted_date_check_out_time; ?></small></a><br/>
              <!-- <small>Booking Time : <a class="text-green" style="font-weight:bold"> <?= $formatted_date_booking_time?></small></a><br/> -->
              <!-- <small>End Period Payments: <a class="text-danger" style="font-weight:bold"> <?=  $formatted_end_period_payment ?></small></a><br/> -->
              
              <small>Total Bayar :<a class="text-dark" style="font-weight:bold; font-size:17px;"> Rp. 
            <?= number_format($gb->bookingTotalPay, 0, ".", ".")?></small></a>

             
                
                <?php if($gb->userEditPriceId == '-'){
                  echo '';
                }else {
                    ?>
                    <hr/>
                  <small>Telah diubah oleh : <a class="text-danger" style="font-weight:bold"><br/>
                  <?= $gb->userEditPriceId?>
                  </small></a><br/>
                    <?php
                }
                ?>
             
               

           
              
            </th>
           
            
            <td>
           

             <?php
       
             if ($gb->status_booking == 1) {
              date_default_timezone_set('Asia/Jakarta');
              $current_date = date('Y-m-d H:i:s');
              ?>
                     <div class="clockdiv alert alert-warning btn-sm" data-date="<?= $gb->bookingTimeStacEnd;?>">
            <span style="font-weight: bold;">
            Masa Pembayaran akan habis pada :<br/>
            <?=  $formatted_end_period_payment ?> </span>
            <hr/>
            <a data-toggle="modal" data-target="#validasi-pembayaran<?=$gb->bookingId;?>" class="add-facility-js btn btn-primary hupdate-record add-facility btn-sm text-white"></i>&nbsp;Pembayaran Sekarang</a>
        </div>
      
              <?php

                if($current_date >= $gb->bookingTimeStacEnd){
                  //$this->db->query("UPDATE tb_rooms_bookings SET  is_active = 0 WHERE is_active = 1 AND bookingId = $gt->bookingId");
                 
                  // $this->db->query("INSERT INTO tb_trash_rooms_bookings
                  // VALUES ($gt->bookingId, $gt->bookingRoomId, $gt->bookingStDt, $gt->bookingEdDt, $gt->bookingTime, $gt->bookingTimeStacEnd, $gt->bookingUserId, $gt->bookingNights, $gt->bookingTotalPay, $gt->is_active, $gt->is_pay )");
                  $this->db->query("INSERT INTO `tb_log_rooms_bookings` (`bookingId`,`bookingId_text`, `bookingRoomId`, `bookingStDt`, `bookingEdDt`,`bookingStDt_check`,`bookingEdDt_check`, `bookingTime`, `bookingTimeStacEnd`, `bookingUserId`, `bookingNights`, `bookingTotalPay`, `userEditPriceId`,`userEditKeterangan`,`status_booking`, `payment_prove_image`,`adminOpValidate`,`is_pay`) VALUES ('$gb->bookingId',
                                    '$gb->bookingId_text', 
                                    '$gb->bookingRoomId', 
                                    '$gb->bookingStDt', 
                                    '$gb->bookingEdDt', 
                                    '$gb->bookingStDt_check', 
                                    '$gb->bookingEdDt_check', 
                                    '$gb->bookingTime', 
                                    '$gb->bookingTimeStacEnd', 
                                    '$gb->bookingUserId', 
                                    '$gb->bookingNights', 
                                    '$gb->bookingTotalPay', 
                                    '$gb->userEditPriceId',
                                    '$gb->userEditKeterangan', 
                                    '0', 
                                    '$gb->payment_prove_image', 
                                    '$gb->adminOpValidate',
                                    '$gb->is_pay')");
                  $this->db->query("DELETE from tb_rooms_bookings  WHERE status_booking = 1 AND bookingId = $gb->bookingId");
                  // $this->db->query("DELETE from tb_rooms_bookings  WHERE is_active = 2 AND bookingId = $gb->bookingId");
                  // $this->db->query("DELETE from tb_rooms_bookings  WHERE is_active = 0 AND bookingId = $gb->bookingId");
                  // echo $this->db->last_query();
                  // die;
                  redirect('guess/cart');

                }
                else{
                  
                  
                }
              }elseif($gb->status_booking == 2 ) {
                ?>
                                  <a data-toggle="modal" class="add-facility-js btn btn-dark hupdate-record add-facility btn-sm text-warning"></i><i class="fa-solid fa-check-double"></i>&nbsp;Transaksi Sukses</a>
                                  <a href="<?= base_url('guess/cetak/'.$gb->bookingId);?>"  class="add-facility-js border border-warning btn btn-warning hupdate-record add-facility btn-sm text-black rounded-pill" ></i><i class="fa-solid fa-print"></i>&nbsp;Bukti Pembayaran</a>
                <?php
                
              }
              elseif($gb->status_booking == 3 ) {
                ?>
                                  <a data-toggle="modal" class="add-facility-js btn btn-warning hupdate-record add-facility text-dark btn-sm"></i><i class="fa-regular fa-clock"></i>&nbsp;Menunggu Konfirmasi Operator</a>

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
    $(document).ready( function () {
    $('#example').DataTable();
} );
</script>