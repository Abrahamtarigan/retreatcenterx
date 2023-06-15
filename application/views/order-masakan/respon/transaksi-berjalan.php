<br>
<table id="example" class="table table-striped" >
      <thead>
        <tr>
          <th style="width:400px;">Order</th>
          <th>Harga</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($getBookingUserResto as $gb ) { ?>
          <?php
            // $tgl_check_in = date_create($gb->bookingStDt_check);
            // $tgl_check_out = date_create($gb->bookingEdDt_check);
            // $time_booking = date_create($gb->bookingTime);
            // $end_period = date_create($gb->bookingTimeStacEnd);

            // // format tanggal dan waktu check in
            // $formatted_date_check_in_date = date_format($tgl_check_in, 'd/m/Y');
            // $formatted_date_check_in_time = date_format($tgl_check_in, 'h:i:s');

            // // format tanggal dan waktu check out
            // $formatted_date_check_out_date = date_format($tgl_check_out, 'd/m/Y');
            // $formatted_date_check_out_time = date_format($tgl_check_out, 'h:i:s');

            // // format tanggal untuk booking time
            // $formatted_date_booking_time = date_format($time_booking, 'd/m/Y h:i:s');

            // // format tanggal end periode pembayaran
            // $formatted_end_period_payment = date_format($end_period, 'd/m/Y h:i:s');
            ?>
          <tr>
            <th><a style="font-weight:bold">#<?php echo $gb->id; ?></a>&nbsp;<br/>
            <small>Pesanan: <a style="font-weight:bold"> </small><br/>
            <a style="font-weight:bold"><?php echo $gb->masakan; ?></a>&nbsp;<br/>
            <!-- by: -->
              <!-- <a style="font-weight:bold"><a class="text-primary"><?php echo $gb->userNama; ?></a></a><br /> -->
             
              

             
               
               

           
              
            </th>
            <th><a style="font-weight:bold">Rp. <?= number_format($gb->total_harga, 0, ".", ".")?></a>&nbsp;<br/>
            
            <th><a style="font-weight:bold">#<?php echo $gb->status_pembayaran; ?></a>&nbsp;<br/>
           

             
        
        
            </td>
          </tr>
          <?php ++$i; ?>
        <?php } ?>
      </tbody>

    </table>
 


<script>
    $(document).ready( function () {
    $('#example').DataTable();
} );
</script>