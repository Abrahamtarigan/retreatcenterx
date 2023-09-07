<!-- halaman untuk cart?view={bookingId} -->
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
                     <p><small class="text-dark"><b><u>Informasi :</u></b>
                                   <hr>
                                   <ol>
                                          <li>List ini merupakan daftar fasilitas yang dilanggkan pada saat booking di awal.</li>
                                          <li>Beban biaya otomatis di akumulasi tertera seluruhnya dihalam sebelumnya </li>
                                   </ol>

                            </small></p>
                     <div class="modal-content" style="border-radius: 10px;">

                            <div class="form-group col-md-12">


                                   <table class="table table-stripped">
                                          <thead>
                                                 <tr>
                                                        <th><small><b>Booking id</b><br>(booking id order)</small></th>

                                                        <th><small><b>Nama Fasilitas</b><br>(Fasilitas yang dilanggkan)</small></th>
                                                        <th><small><b>Quantity</b><br>(Jumlah)</small></th>
                                                        <th><small><b>Harga</b><br>(per items termasuk fasilitas)</small></th>

                                                        <!-- Tambahkan kolom lain sesuai kebutuhan -->
                                                 </tr>
                                          </thead>
                                          <tbody>
                                                 <?php $i = 1; ?>
                                                 <?php foreach ($getExtenderTf as $ge) { ?>

                                                        <tr>
                                                               <td><small><b><?= $i; ?></b></td>
                                                               <!-- <td class="left"><?= $ge->bookingId_text; ?></td> -->
                                                               <td class="left"><small><b><?= $ge->roomExtenderFacility; ?></small></b></td>
                                                               <td class="center"><small><b>x <?= $ge->quantity; ?></small></b></td>

                                                               <td class="right"><small><b>Rp. <?= number_format($ge->price, 0, ".", ".") ?></b></small></td>
                                                               </small>

                                                        </tr>
                                                        <?php $i++; ?>
                                                 <?php } ?>
                                          </tbody>

                                   </table>



                                   <!-- Datepicker Check-in -->
                            </div>
                     </div>


                     <br>




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