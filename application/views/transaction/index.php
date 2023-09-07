<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="menu-berhasil-pop" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php if ($this->session->flashdata('message')) : ?>

<?php endif; ?>

<aside class="col-sm-12">

       <div class="container">

              <ul class="nav nav-tabs" id="myTab" role="tablist">
                     <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><b>Total Transaksi</b></a>
                     </li>


              </ul>

              <div class="tab-content">
                     <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br />
                            <table id="example" class="table table-striped">
                                   <thead>
                                          <tr>
                                                 <th>Booking Details</th>
                                                 <th>Total Pembayaran</th>
                                                 <th>Booking Status</th>
                                                 <th>Status order</th>

                                                 <th>...</th>
                                          </tr>
                                   </thead>
                                   <tbody>
                                          <?php $i = 1; ?>
                                          <?php foreach ($getAllOnGoingTransactions as $gaog) { ?>
                                                 <?php
                                                 $tgl_check_in = date_create($gaog->bookingStDt_check);
                                                 $tgl_check_out = date_create($gaog->bookingEdDt_check);
                                                 $time_booking = date_create($gaog->bookingTime);
                                                 $end_period = date_create($gaog->bookingTimeStacEnd);

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
                                                        <th style="width:400px;">
                                                               <a style="font-weight:bold">
                                                                      #<?= $gaog->bookingId; ?>
                                                               </a>&nbsp;<br />by:
                                                               <a style="font-weight:bold"><a class="text-primary">
                                                                             <?= $gaog->userNama; ?>
                                                                      </a><br>
                                                                      <small>Booking Id : <a style="font-weight:bold">
                                                                                    <?= $gaog->bookingId_text; ?></small></a>&nbsp;
                                                               <br>
                                                               <small>Booking Time : <a class="text-green" style="font-weight:bold">
                                                                             <?= $formatted_date_booking_time ?></small></a><br>
                                                               <small>End Period Payments: <a class="text-danger" style="font-weight:bold">
                                                                             <?= $formatted_end_period_payment ?></small></a>&nbsp;





                                                               <?php if ($gaog->userEditPriceId == '-') {
                                                                      echo '';
                                                               } else {
                                                               ?>
                                                                      <hr />
                                                                      <small>Telah diubah oleh : <a class="text-danger" style="font-weight:bold"><br />
                                                                                    <?= $gaog->userEditPriceId ?>
                                                                      </small></a><br />
                                                               <?php
                                                               }
                                                               ?>





                                                        </th>
                                                        <td><a class="text-dark" style="font-weight:bold">
                                                                      <?= number_format($gaog->price_total, 0, ".", ".") ?></a>
                                                        </td>

                                                        <td>


                                                               <?php

                                                               if ($gaog->status_booking == 1) {
                                                                      date_default_timezone_set('Asia/Jakarta');
                                                                      $current_date = date('Y-m-d H:i:s');
                                                               ?>
                                                                      <div class="clockdiv alert alert-danger btn-sm" data-date="<?= $gaog->bookingTimeStacEnd; ?>">
                                                                             <span style="font-weight: bold;">
                                                                                    Masa Pembayaran akan habis dalam :&nbsp;</span>
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

                                                                      if ($current_date >= $gaog->bookingTimeStacEnd) {
                                                                             //$this->db->query("UPDATE tb_rooms_bookings SET  is_active = 0 WHERE is_active = 1 AND bookingId = $gt->bookingId");

                                                                             // $this->db->query("INSERT INTO tb_trash_rooms_bookings
                                                                             // VALUES ($gt->bookingId, $gt->bookingRoomId, $gt->bookingStDt, $gt->bookingEdDt, $gt->bookingTime, $gt->bookingTimeStacEnd, $gt->bookingUserId, $gt->bookingNights, $gt->bookingTotalPay, $gt->is_active, $gt->is_pay )");
                                                                             $this->db->query("INSERT INTO `tb_log_rooms_bookings` (`bookingId`,`bookingId_text`, `bookingRoomId`, `bookingStDt`, `bookingEdDt`,`bookingStDt_check`,`bookingEdDt_check`, `bookingTime`, `bookingTimeStacEnd`, `bookingUserId`, `bookingNights`, `bookingTotalPay`, `userEditPriceId`,`userEditKeterangan`,`status_booking`, `payment_prove_image`,`adminOpValidate`,`is_pay`) VALUES ('$gaog->bookingId',
                                    '$gaog->bookingId_text', 
                                    '$gaog->bookingRoomId', 
                                    '$gaog->bookingStDt', 
                                    '$gaog->bookingEdDt', 
                                    '$gaog->bookingStDt_check', 
                                    '$gaog->bookingEdDt_check', 
                                    '$gaog->bookingTime', 
                                    '$gaog->bookingTimeStacEnd', 
                                    '$gaog->bookingUserId', 
                                    '$gaog->bookingNights', 
                                    '$gaog->bookingTotalPay', 
                                    '$gaog->userEditPriceId',
                                    '$gaog->userEditKeterangan', 
                                    '0', 
                                    '$gaog->payment_prove_image', 
                                    '$gaog->adminOpValidate',
                                    '$gaog->is_pay')");
                                                                             $this->db->query("DELETE from tb_rooms_bookings  WHERE status_booking = 1 AND bookingId = $gaog->bookingId");
                                                                             // $this->db->query("DELETE from tb_rooms_bookings  WHERE is_active = 2 AND bookingId = $gaog->bookingId");
                                                                             // $this->db->query("DELETE from tb_rooms_bookings  WHERE is_active = 0 AND bookingId = $gaog->bookingId");
                                                                             // echo $this->db->last_query();
                                                                             // die;
                                                                             redirect('transactions/');
                                                                      } else {
                                                                      }
                                                               } elseif ($gaog->status_booking == 2) {
                                                                      ?>
                                                                      <a data-toggle="modal" class="add-facility-js btn btn-dark text-warning hupdate-record add-facility btn-sm"></i>&nbsp;Transaksi
                                                                             Sukses</a>


                                                               <?php

                                                               } elseif ($gaog->status_booking == 3) {
                                                               ?>
                                                                      <a data-toggle="modal" class="add-facility-js btn btn-warning text-dark hupdate-record add-facility text-white btn-sm"></i>&nbsp;Menunggu
                                                                             Konfirmasi Operator</a>


                                                               <?php

                                                               }


                                                               ?>

                                                        </td>
                                                        <td>
                                                               <small> <b><?= $gaog->status_name; ?></b></small>
                                                        </td>

                                                        <td>
                                                               <?php

                                                               $role_id = $this->session->userdata('role_id');
                                                               if ($gaog->status_booking == 1 && $role_id == 1) {
                                                               ?>
                                                                      <a data-toggle="modal" data-target="#add-facility<?= $gaog->bookingId; ?>" class="add-facility-js badge badge-danger text-white hupdate-record add-facility"></i>&nbsp;Ubah
                                                                             Harga</a><br />
                                                                      <a data-toggle="modal" data-target="#lihat-konfirmasi<?= $gaog->bookingId; ?>" class="add-facility-js badge badge-warning hupdate-record add-facility"></i>&nbsp;Lihat
                                                                             Konfirmasi
                                                                             Transaksi</a>
                                                                      <a data-toggle="modal" data-target="#validasi-pembayaran<?= $gaog->bookingId; ?>" class="add-facility-js badge badge-success hupdate-record add-facility"></i>&nbsp;Validasi</a>


                                                               <?php
                                                               } else if ($role_id == 105) {
                                                               ?>
                                                                      <a data-toggle="modal" data-target="#lihat-konfirmasi<?= $gaog->bookingId; ?>" class="add-facility-js badge badge-warning hupdate-record add-facility"></i>&nbsp;Lihat
                                                                             Konfirmasi
                                                                             Transaksi</a>
                                                                      <a data-toggle="modal" data-target="#validasi-pembayaran<?= $gaog->bookingId; ?>" class="add-facility-js badge badge-success hupdate-record add-facility"></i>&nbsp;Validasi</a>
                                                                      <hr />
                                                               <?php
                                                               } else if ($role_id == 1 && $role_id == 2 && $gaog->status_booking == 2) {
                                                               ?>
                                                                      <a data-toggle="modal" class="add-facility-js btn btn-warning hupdate-record add-facility btn-sm"></i>&nbsp;Transaksi
                                                                             Sukses</a>


                                                               <?php
                                                               } else if ($role_id == 1 && $role_id == 2 && $gaog->status_booking == 3) {
                                                               ?>
                                                                      <a data-toggle="modal" data-target="#lihat-konfirmasi<?= $gaog->bookingId; ?>" class="add-facility-js badge badge-warning hupdate-record add-facility"></i>&nbsp;Lihat
                                                                             Konfirmasi
                                                                             Transaksi</a>
                                                                      <a data-toggle="modal" data-target="#validasi-pembayaran<?= $gaog->bookingId; ?>" class="add-facility-js badge badge-success hupdate-record add-facility"></i>&nbsp;Validasi</a>
                                                                      <hr />
                                                               <?php
                                                               } else {
                                                               ?>

                                                               <?php

                                                               }




                                                               if ($gaog->userEditKeterangan == '-') {
                                                                      echo '';
                                                               } else {
                                                               ?>
                                                                      <a data-toggle="modal" data-target="#cek-perubahan<?= $gaog->bookingId; ?>" class="add-facility-js badge badge-primary text-white hupdate-record add-facility"></i>&nbsp;Lihat
                                                                             Keterangan
                                                                             Perubahan</a>

                                                               <?php
                                                               }

                                                               if ($gaog->status_booking == 2) {
                                                               ?>
                                                                      <a data-toggle="modal" data-target="#lihat-konfirmasi<?= $gaog->bookingId; ?>" class="add-facility-js badge badge-success hupdate-record add-facility"></i>&nbsp;Lihat
                                                                             Konfirmasi
                                                                             Transaksi</a><br>
                                                                      <a data-toggle="modal" data-target="#lihat-konfirmasi<?= $gaog->bookingId; ?>" class="add-facility-js badge badge-dark text-warning hupdate-record add-facility"></i>&nbsp;Status
                                                                             order</a><?php
                                                                                    }
                                                                                           ?>
                                                               <?php if ($gaog->status_booking == 3 && $role_id == 1) {
                                                               ?>
                                                                      <a data-toggle="modal" data-target="#lihat-konfirmasi<?= $gaog->bookingId; ?>" class="add-facility-js badge badge-success hupdate-record add-facility"></i>&nbsp;Lihat
                                                                             Konfirmasi
                                                                             Transaksi</a><br>
                                                                      <a data-toggle="modal" data-target="#lihat-konfirmasi<?= $gaog->bookingId; ?>" class="add-facility-js badge badge-dark text-warning hupdate-record add-facility"></i>&nbsp;Status
                                                                             order</a>
                                                               <?php    }  ?>




                                                        </td>
                                                 </tr>
                                                 <?php $i++; ?>
                                          <?php } ?>
                                   </tbody>

                            </table>
                     </div>


              </div>

              <script>
                     $(function() {
                            $('#myTab li:first-child a').tab('show')
                     })
              </script>



       </div>


</aside> <!-- col.// -->


</div> <!-- row.// -->

</div>
<?php $no = 0;
foreach ($getAllOnGoingTransactions as $gaog) :
       $no++; ?>
       <form action="<?php echo site_url('transactions/ubah_harga'); ?>" method="post">
              <div class="modal fade bd-example-modal-lg" id="add-facility<?= $gaog->bookingId; ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                   <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Ubah total
                                                 harga&nbsp;<?= $gaog->bookingId_text; ?></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                          </button>
                                   </div>
                                   <div class="modal-body">

                                          <div class="alert alert-warning Text-bold btn-sm">Total Pembayaran ini akan diubah
                                                 oleh
                                                 <?= $user['userNama']; ?>
                                          </div>



                                          <div class="form-group row">

                                                 <!-- <input type="text" name="rmId" value="<?= $user['userNama']; ?>" class="form-control"> -->
                                                 <input type="hidden" name="bookingId" value="<?= $gaog->bookingId; ?>" class="form-control">

                                                 <label class="col-sm-2 col-form-label">Ubah Harga</label>
                                                 <div class="col-sm-10">
                                                        <input type="number" name="bookingTotalPay" class="form-control" required>
                                                 </div>
                                                 <label class="col-sm-2 col-form-label">Keterangan</label>
                                                 <div class="col-sm-12">
                                                        <textarea name="userEditKeterangan" id="froala-editor">Masukkan Deskripsi disini</textarea>
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
<?php endforeach; ?>

<?php $no = 0;
foreach ($getAllOnGoingTransactions as $gaog) :
       $no++; ?>
       <form action="<?php echo site_url('transactions/validate'); ?>" method="post" enctype="multipart/form-data">
              <div class="modal fade bd-example-modal-lg" id="validasi-pembayaran<?= $gaog->bookingId; ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                   <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Validasi
                                                 Pembayaran&nbsp;<?= $gaog->bookingId_text; ?></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                          </button>
                                   </div>
                                   <div class="modal-body">

                                          <div class="alert alert-warning Text-bold btn-sm">Status Pembayaran ini akan
                                                 divalidasi oleh
                                                 <?= $user['userNama']; ?>
                                          </div>



                                          <div class="form-group row">

                                                 <!-- <input type="text" name="rmId" value="<?= $user['userNama']; ?>" class="form-control"> -->

                                                 <input type="hidden" name="bookingId" value="<?= $gaog->bookingId; ?>" class="form-control">

                                                 <label class="col-sm-2 col-form-label">Validasi Pembayaran</label>
                                                 <div class="col-sm-10">
                                                        <?php $no = 0;
                                                        foreach ($getValidateOption as $gvo) :
                                                               $no++; ?>
                                                               <select name="status_booking" class="form-control" required>
                                                                      <?= $gvo->status_booking_id; ?>
                                                                      <option value="0">Pilih Status Pembayaran</option>
                                                                      <option value="<?= $gvo->status_booking_id; ?>">
                                                                             <?= $gvo->status_booking_name; ?></option>

                                                               </select>
                                                        <?php endforeach; ?>
                                                 </div>
                                                 <label class="col-sm-2 col-form-label">Keterangan</label>
                                                 <div class="col-sm-12">
                                                        <div class="preview-zone hidden">
                                                               <div class="box box-solid">
                                                                      <div class="box-header with-border">
                                                                             <div><b>Preview</b></div>
                                                                             <div class="box-tools pull-right">
                                                                                    <button type="button" class="btn btn-danger btn-xs remove-preview">
                                                                                           <i class="fa fa-times"></i> Reset
                                                                                           This Form
                                                                                    </button>
                                                                             </div>
                                                                      </div>
                                                                      <div class="box-body"></div>
                                                               </div>
                                                        </div>
                                                        <div class="dropzone-wrapper">
                                                               <div class="dropzone-desc">
                                                                      <i class="glyphicon glyphicon-download-alt"></i>
                                                                      <p>Upload Bukti Pembayaran disini</p>
                                                               </div>
                                                               <input type="file" name="payment_prove_image" class="dropzone">
                                                        </div>

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
<?php endforeach; ?>

<?php $no = 0;
foreach ($getAllOnGoingTransactions as $gaog) :
       $no++; ?>
       <form action="" method="post">
              <div class="modal fade bd-example-modal-lg" id="cek-perubahan<?= $gaog->bookingId; ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                   <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Keterangan
                                                 Perubahan&nbsp;<?= $gaog->bookingId_text; ?></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                          </button>
                                   </div>
                                   <div class="modal-body">

                                          <div class="alert alert-warning Text-bold btn-sm">
                                                 <a href="" style="font-weight:bold">PENJELASAN KETERANGAN</a>
                                                 <hr />
                                                 <?= $gaog->userEditKeterangan; ?>

                                          </div>

                                   </div>
                                   <div class="modal-footer">
                                          <input type="hidden" name="edit_id" required>
                                          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>

                                   </div>
                            </div>
                     </div>
              </div>
       </form>
<?php endforeach; ?>

<?php $no = 0;
foreach ($getAllOnGoingTransactions as $gaog) :
       $no++; ?>
       <form action="<?= base_url('transactions/validate_confirmation'); ?>" method="post">
              <div class="modal fade bd-example-modal-lg" id="lihat-konfirmasi<?= $gaog->bookingId; ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                   <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Keterangan
                                                 Perubahan&nbsp;<?= $gaog->bookingId_text; ?></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                          </button>
                                   </div>
                                   <div class="modal-body">
                                          <label class="col-sm-2 col-form-label">Validasi Pembayaran</label>
                                          <div class="col-sm-10">
                                                 <?php $no = 0;
                                                 foreach ($getValidateOption as $gvo) :
                                                        $no++; ?>
                                                        <select name="status_booking" class="form-control" required>
                                                               <?= $gvo->status_booking_id; ?>
                                                               <option value="0">Pilih Status Pembayaran</option>
                                                               <option value="<?= $gvo->status_booking_id; ?>">
                                                                      <?= $gvo->status_booking_name; ?></option>

                                                        </select>
                                                        <input type="hidden" name="bookingId" value="<?= $gaog->bookingId; ?>" class="form-control">

                                                 <?php endforeach; ?>
                                          </div>
                                          <div class="Text-bold btn-sm">
                                                 <a href="" style="font-weight:bold">Keterangan Gambar</a>
                                                 <hr />
                                                 <?= $gaog->userEditKeterangan; ?>
                                                 <img src="<?php echo $gaog->payment_prove_image; ?>" alt="..." class="img-thumbnail">
                                          </div>

                                   </div>
                                   <div class="modal-footer">
                                          <input type="hidden" name="edit_id" required>
                                          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                                          <button type="submit" class="btn btn-success btn-sm">Konfirmasi Pembayaran</button>
                                   </div>
                            </div>
                     </div>
              </div>
       </form>
<?php endforeach; ?>




<script>
       $(document).ready(function() {
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
                                   countDownDate[i]['days'] = Math.floor(distance / (1000 * 60 *
                                          60 * 24));
                                   countDownDate[i]['hours'] = Math.floor((distance % (1000 * 60 *
                                          60 * 24)) / (1000 * 60 * 60));
                                   countDownDate[i]['minutes'] = Math.floor((distance % (1000 *
                                          60 * 60)) / (1000 * 60));
                                   countDownDate[i]['seconds'] = Math.floor((distance % (1000 *
                                          60)) / 1000);

                                   if (distance < 0) {
                                          window.location.href =
                                                 "<?= base_url('transactions/'); ?>";
                                   } else {
                                          countDownDate[i]['el'].querySelector('.days').innerHTML =
                                                 countDownDate[i]['days'];
                                          countDownDate[i]['el'].querySelector('.hours')
                                                 .innerHTML = countDownDate[i]['hours'];
                                          countDownDate[i]['el'].querySelector('.minutes')
                                                 .innerHTML = countDownDate[i]['minutes'];
                                          countDownDate[i]['el'].querySelector('.seconds')
                                                 .innerHTML = countDownDate[i]['seconds'];
                                   }

                            }
                     }, 1000);
              }
       });
</script>
<link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'>
</script>
<script>
       new FroalaEditor('textarea#froala-editor')
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
       }
</style>
<script>
       /**
        *
        * app.js
        *
        */
       function readFile(input) {
              if (input.files && input.files[0]) {
                     var reader = new FileReader();

                     reader.onload = function(e) {
                            var htmlPreview =
                                   '<img width="200" src="' + e.target.result + '" />' +
                                   '<p>' + input.files[0].name + '</p>';
                            var wrapperZone = $(input).parent();
                            var previewZone = $(input).parent().parent().find('.preview-zone');
                            var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find(
                                   '.box-body');

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
       $(".dropzone").change(function() {
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