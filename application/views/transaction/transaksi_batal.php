<html>
    <head>
   
  
    </head>
    <body>
    <div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <br/>
  <table id="transaksi_fail" class="table table-striped" >
      <thead>
        <tr>

          <th>Booking Details</th>
          <th>Status Transaksi</th>

        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($getCanceledTransactions as $gtc) { ?>
          <?php
          date_default_timezone_set('Asia/Jakarta');
          $current_date = date('Y-m-d H:i:s');

            $tgl_check_in = date_create($gtc->bookingStDt);
            $tgl_check_out = date_create($gtc->bookingEdDt);
            $time_booking = date_create($gtc->bookingTime);
            $end_period = date_create($gtc->bookingTimeStacEnd);

            
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
            <th><a style="font-weight:bold"><?= $gtc->roomName; ?></a>&nbsp;<br/>by:
              <a style="font-weight:bold"><a class="text-primary"><?= $gtc->userNama; ?></a></a><br />
              <small>Id Booking : <a style="font-weight:bold"> <?= $gtc->bookingId_text; ?></small></a><br/>
              <small>Check-in : <a class="text-orange" style="font-weight:bold"> <?= $formatted_date_check_in_date; ?>&nbsp;<?= $formatted_date_check_in_time; ?></small></a>
              <small>Check-out : <a class="text-orange" style="font-weight:bold"> <?= $formatted_date_check_out_date; ?>&nbsp;<?= $formatted_date_check_out_time; ?></small></a><br/>
              <small>Booking Time : <a class="text-green" style="font-weight:bold"> <?= $formatted_date_booking_time?></small></a><br/>
              <small>End Period Payments: <a class="text-danger" style="font-weight:bold"> <?= $formatted_end_period_payment; ?></small></a><br/>
            <small>Total Bayar :<a class="text-black" style="font-weight:bold; font-size:17px;"> Rp. 
            <?= number_format($gtc->bookingTotalPay, 0, ".", ".")?></small></a>
              
            </th>

            
            <td style="width:200px;">
              <?php if ($gtc->status_booking == 2 )
              {
                ?>
                  <div class="alert alert-success" role="alert">
                    <?= $gtc->status_booking_name; ?>
                   </div>
                <?php
              }else if($gtc->status_booking_name == 1 )
              {
                ?>
                <div class="alert alert-warning" role="alert">
                  <?= $gtc->status_booking; ?>
                 </div>
              <?php
              }else if($gtc->status_booking_name == 0 ){
                ?>
                <div class="alert alert-danger" role="alert">
                  <?= $gtc->status_booking_name; ?>
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
    </body>
    
</html>
<script>
    $(document).ready( function () {
    $('#transaksi_fail').DataTable();
} );
</script>
