
<?php foreach ($getPrintTf as $gb) { ?>
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
<div class="container-fluid">
   <div id="ui-view" data-select2-id="ui-view">
      <div>
         <div class="card">
            <div class="card-header">Invoice<br/>
               <strong><?= $gb->bookingId_text;?></strong>
               <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true">
               <i class="fa fa-print"></i> Print</a>
               <a class="btn btn-sm btn-info float-right mr-1 d-print-none" href="#" onclick="javascript:window.save();" data-abc="true" data-abc="true">
               <i class="fa fa-save"></i> Save</a>
            </div>
            <div class="card-body">
               <div class="row mb-4">
                  <div class="col-sm-4">
                     <h6 class="mb-3">Pengirim :</h6>
                     <div>
                        <strong>Retreat Center Sukamakmur</strong>
                     </div>
                     <div>Kabupaten Deliserdang</div>
                     <div>Sumut, Indonesia</div>
                     
                     <div>Email: info@retretcenter.com</div>
                     <div>Phone: +62 123 456 789</div>
                  </div>
                  <div class="col-sm-4">
                     <h6 class="mb-3">Kepada:</h6>
                     <div>
                        <strong><?= $gb->userNama;?></strong>
                     </div>
                     <div><?= $gb->userEmail;?></div>
                     <div>##</div>
                     <div>##</div>
                  </div>
                  <div class="col-sm-4">
                     <h6 class="mb-3">Details:</h6>
                     <div>Invoice
                        <strong>#<?= $gb->bookingId_text;?></strong>
                     </div>
                     <div><?= $gb->bookingTime;?></div>
                     <hr/>
                     <div><strong><?= $gb->status_booking_name;?></strong></div>
                     
                  </div>
               </div>
               <div class="table-responsive-sm">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th class="center">#</th>
                           <th>booking id</th>
                           <th>Deskripsi</th>
                           <th class="center">Quantity</th>
                           <th class="right">Check in/<br/>Check out</th>
                           <th class="right">Harga</th>
                          
                        </tr>
                     </thead>
                     <tbody>
                     <?php $i = 1; ?>
                     <?php foreach ($getPrintTf as $gb) { ?>
                      
                        <tr>
                           <td class="center"><?= $i;?></td>
                           <td class="left"><?= $gb->bookingId_text;?></td>
                           <td class="left"><?= $gb->roomName;?></td>
                           <td class="center"><?= $gb->bookingNights;?> Malam</td>
                           <td class="center"><?= $formatted_date_check_in_date;?>&nbsp;<?= $formatted_date_check_in_time;?><hr/><?= $formatted_date_check_out_date;?>&nbsp;<?= $formatted_date_check_out_time;?>&nbsp;</td>
                           <td class="right"><?= number_format($gb->total_price_hotel, 0, ".", ".")?></td>
                           
                        </tr>
                        <?php $i++;?>
                       <?php } ?>  
                     </tbody>
                  </table>
               </div>
               
               <div class="row">
                  
                  <div class="col-lg-4 col-sm-5 ml-auto">
                     <table class="table table-clear">
                        <tbody>
                           <tr>
                              <td class="left">
                                 <strong>Subtotal</strong>
                              </td>
                              <td class="right">Rp <?= number_format($gb->total_price_hotel, 0, ".", ".")?></td>
                           </tr>
                           
                        </tbody>
                     </table>
                     
                  </div>
               </div>
               <br/>
               <div class="table-responsive-sm">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th class="center">#</th>
                           <th>booking id</th>
                           <th>Deskripsi</th>
                           <th class="center">Quantity</th>
                           
                           <th class="right">Harga</th>
                          
                        </tr>
                     </thead>
                     <tbody>
                     <?php $i = 1; ?>
                     <?php foreach ($getExtenderTf as $ge) { ?>
                      
                        <tr>
                           <td class="center"><?= $i;?></td>
                           <td class="left"><?= $ge->bookingId_text;?></td>
                           <td class="left"><?= $ge->roomExtenderFacility;?></td>
                           <td class="center">x <?= $ge->quantity;?></td>
                           
                           <td class="right"><?= number_format($ge->price, 0, ".", ".")?></td>
                           
                        </tr>
                        <?php $i++;?>
                       <?php } ?>  
                     </tbody>
                  </table>
               </div>
               <div class="row">
                  <div class="col-lg-4 col-sm-5">Note: <hr/><?= $ge->userEditKeterangan;?></div>
                  <div class="col-lg-4 col-sm-5 ml-auto">
                     <table class="table table-clear">
                        <tbody>
                           <tr>
                              <td class="left">
                                 <strong>Subtotal</strong>
                              </td>
                              <td class="right">Rp <?= number_format($ge->total_price, 0, ".", ".")?></td>
                           </tr>
                           <tr>
                              <td class="left">
                                 <h2>Total : 
                              </td>
                              <td class="right"><h2><strong>Rp <?= number_format($ge->bookingTotalPay, 0, ".", ".")?></strong></h2></td>
                              
                           </tr>
                           
                        </tbody>
                        
                     </table>
                     
                  </div>
                  
               </div>
            </div>
            <center>
            <p>--Terima Kasih--</p>        
            </center>
            
         </div>
      </div>
   </div>
</div>
<?php } ?>  
<style>
  .card {
    margin-bottom: 1.5rem;
}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #c8ced3;
    border-radius: .25rem;
} 

.card-header:first-child {
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}

.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: #f0f3f5;
    border-bottom: 1px solid #c8ced3;
}
</style>

