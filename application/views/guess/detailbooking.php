<div class="col-sm-12 center">

       <br>
       <div class="container">
              <!-- Breadcrumb -->

              <ol class="breadcrumb list-breadcrumb" style="margin:10px;margin-top:-20px;margin-bottom:-30px;margin-left:-15px;">
                     <a href="<?= base_url('guess/cart/'); ?>" style="font-weight: bold; font-size: 14px;color:black;float:left"><i class="fa-solid fa-arrow-left"></i>&nbsp;kembali</a>
                     <hr>
                     <?php if ($this->uri->segment(2)) { ?>
                            <li class="breadcrumb-item active" aria-current="page">
                                   <a href="<?php echo site_url($this->uri->segment(1) . '/' . $this->uri->segment(2)); ?>" class="breadcrumb-link" style="font-weight: bold; font-size: 14px;color:black;float:right;"><?php echo $this->uri->segment(2); ?></a>
                            </li>
                     <?php } ?>
                     <?php if ($_GET['view']) { ?>
                            <li class="breadcrumb-item active" aria-current="page" style="font-weight: bold; font-size: 14px;color:black;float:right;">
                                   <?php echo $_GET['view']; ?>
                            </li>
                     <?php } ?>
              </ol>



              <br>



              <div id="respon-transaksi">
                     <div class="modal-content" style="border-radius: 10px;">
                            <div class="form-group col-md-12">
                                   <br>

                                   <p class="text-black col-md-12"><span style="display: inline-block; width: 280px;">No Rekening pembayaran <br><small>Bank Number Account</small></span> <span class="text-black" style="white-space: nowrap;"><u>(BNI)191 200 3001</u></span>&nbsp;<a href="<?= base_url('guess/cart') . '?pembayaran=' . $_GET['view']; ?>" class="badge badge-warning btn-sm" style="float:right">Lakukan pembayaran</a><span></span></p>
                                   <?php foreach ($getTotRelBookId as $gtrb) : ?>

                                          <p class="text-black col-md-12"><span style="display: inline-block; width: 280px;">Nominal tagihan seluruhnya <br><small>Full Payment Service</small> </span> <span class="text-black" style="white-space: nowrap;"><u>Rp. <?= number_format($gtrb->totalPrice, 0, ".", ".") ?></u></span></p>

                                   <?php endforeach; ?>
                                   <hr>
                                   <?php foreach ($getTotRelBookId as $gtrb) : ?>
                                          <?php
                                          $a = $gtrb->totalPrice;
                                          $b = 0.3; // 30% dalam bentuk pecahan (0.3) dari 1 (100%)
                                          $totalAfterDownPayment = ($a * $b);
                                          ?>
                                          <p class="text-black col-md-12"><span style="display: inline-block; width: 280px;"><b>Nominal Panjar (30%)</b> <br><small>Down Payment Service</small></span> <span class="text-black" style="white-space: nowrap;"><u><b>Rp.
                                                                      <?= number_format($a, 0, ".", ".");
                                                                      echo ' x 30% ='; ?>
                                                                      Rp. <?= number_format($totalAfterDownPayment, 0, ".", ".") ?></b></u></span></p>

                                   <?php endforeach; ?>

                                   <!-- Datepicker Check-in -->
                            </div>
                     </div>


                     <br>
                     <table class="table">
                            <thead>
                                   <tr>
                                          <th><small><b>check in</b><br>(booking id dan nama vila)</small></th>
                                          <th><small><b>Tanggal</b><br>(Checkin - Checkout)</small></th>

                                          <th><small><b>Status</b><br>(progress order)</small></th>
                                          <th><small><b>Status Pembayaran</b><br>(Validasi pembayaran)</small></th>
                                          <th><small><b>Harga</b><br>(per items termasuk fasilitas)</small></th>
                                          <th><small><b>...</b></small></th>
                                          <!-- Tambahkan kolom lain sesuai kebutuhan -->
                                   </tr>
                            </thead>
                            <tbody>
                                   <?php foreach ($getRelatedBookingId as $grb) : ?>
                                          <tr>
                                                 <small>
                                                        <td><?php echo $grb->bookingId; ?><br>
                                                               <small><b><?php echo $grb->roomName; ?></b>
                                                               </small>

                                                 </small>
                                                 </td>

                                                 <td><?php echo date('d M Y', strtotime($grb->bookingStDt)); ?>&nbsp;-
                                                        <?php echo date('d M Y', strtotime($grb->bookingEdDt)); ?></td>
                                                 <td><?php echo $grb->status_name; ?></td>

                                                 <td>
                                                        <?= number_format($grb->bookingTotalPay, 0, ".", ".") ?></td>

                                                 </small>
                                                 <td><b>
                                                               <?php echo $grb->status_booking_name; ?></b></td>
                                                 <td><a href="<?= base_url('guess/cart/') . '?view=' . $grb->bookingId . '&fasilitas=' . $grb->ext_id; ?>" class="badge badge-primary">Cek fasilitas</a></td>
                                                 <!-- Tambahkan kolom lain sesuai kebutuhan -->
                                          </tr>


                                   <?php endforeach; ?>
                            </tbody>
                     </table>





              </div>
              <?php

              ?>





              <script>
                     $(function() {
                            $('#myTab li:first-child a').tab('show')
                     })
              </script>



       </div>


       </aside> <!-- col.// -->


</div> <!-- row.// -->

</div>
<script>
       // Wait for the document to be ready
       $(document).ready(function() {
              // Check if 'fasilitas' is obtained
              const fasilitasValue = '<?php echo $fasilitas; ?>';
              if (fasilitasValue) {
                     // Hide the element with class 'fasilitas-data'
                     $('.fasilitas-data').hide();
              }
       });
</script>