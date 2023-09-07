<div class="col-sm-4">
       <div class="__area">
              <div class="__area" style="position: relative;">
                     <!-- Button to trigger the modal -->
                     <a href="#" data-toggle="modal" data-target="#imageModal">
                            <img src="<?php echo base_url('upload/head/') . $room['roomHeadPicture']; ?>" class="rounded mb-5" alt="..." style="height: 200px; width: 350px;">

                            <!-- Magnifying glass icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 24 24" style="fill:rgba(255, 255, 255, 0.7); position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                   <path d="M17.656 16.142c-.004-.007-.004-.015-.01-.023l-2.9-2.896a5.942 5.942 0 1 0-.678.68l2.898 2.9a.753.753 0 1 0 1.03-1.09zM6.005 10.5c0-2.485 2.018-4.5 4.503-4.5s4.5 2.015 4.5 4.5-2.018 4.5-4.503 4.5-4.5-2.015-4.5-4.5zm1.5 0c0 1.933 1.567 3.5 3.503 3.5s3.5-1.567 3.5-3.5-1.567-3.5-3.503-3.5-3.5 1.567-3.5 3.5z" />
                            </svg>

                     </a>

                     <!-- Rest of the code remains the same -->
              </div>
              <!-- Rest of the code remains the same -->

              <!-- Modal -->
              <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                   <div class="modal-body">
                                          <img src="<?php echo base_url('upload/head/') . $room['roomHeadPicture']; ?>" class="img-fluid" alt="...">
                                   </div>
                            </div>
                     </div>
              </div>

              <div class="border border-color-7 rounded ">
                     <div class="border-bottom">
                            <div class="p-4">
                                   <h5 class="card-title mb-2 text-black">Harga Order/ Order Price :</h5>
                                   <hr />
                                   <?php
                                   $startTimeStamp = strtotime($bookingStDt);
                                   $endTimeStamp = strtotime($bookingEdDt);

                                   $timeDiff = abs($endTimeStamp - $startTimeStamp);

                                   $numberDays = $timeDiff / 86400;  // 86400 seconds in one day

                                   // and you might want to convert to integer
                                   $numberDays = intval($numberDays);
                                   echo "<span class='font-weight-normal font-size-14 text-warning __button_khas rounded' style='font-size:16px;;'>&nbsp;$numberDays&nbsp;Malam/ Nights&nbsp;</span>"; ?>


                                   <span class="font-size-30  font-weight-bold ml-1 text-black __"><br /><b>Rp. <?php
                                                                                                                $total_bayar = $room['roomPricePerNight'] * $numberDays;
                                                                                                                $room['roomPricePerNight'] * $numberDays;

                                                                                                                echo number_format($total_bayar, 0, ".", ".") ?></b></span>

                                   <div class="mb-4">
                                          <span style="font-weight: bold;" class="d-block text-primary-2 font-weight-bold mb-0 text-left">Check In</span>
                                          <div class="border-bottom border-width-2 border-color-1">
                                                 <div id="datepickerWrapperPick" class="u-datepicker input-group">
                                                        <div class="input-group-prepend">
                                                               <span class="d-flex align-items-center mr-2 font-size-21">
                                                                      <i class="flaticon-calendar text-black font-weight-semi-bold"></i>
                                                               </span>
                                                        </div>

                                                        <input name="bookingStDt" class="datepicker font-size-lg-16 shadow-none font-weight-bold form-control hero-form bg-transparent  border-0" type="date" value="<?= $bookingStDt; ?>">

                                                 </div>
                                                 <!-- End Datepicker -->


                                                 <span style="font-weight: bold;" class="d-block text-primary-2 font-weight-bold mb-0 text-left">Check Out</span>
                                                 <div class="border-bottom border-width-2 border-color-1">
                                                        <div id="datepickerWrapperPick" class="u-datepicker input-group">
                                                               <div class="input-group-prepend">
                                                                      <span class="d-flex align-items-center mr-2 font-size-21">
                                                                             <i class="flaticon-calendar text-black font-weight-semi-bold"></i>
                                                                      </span>
                                                               </div>

                                                               <input name="bookingStDt" class="datepicker font-size-lg-16 shadow-none font-weight-bold form-control hero-form bg-transparent  border-0" type="date" value="<?= $bookingEdDt; ?>">



                                                               <!-- End Datepicker -->

                                                        </div>

                                                 </div>

                                          </div>
                                          <a href="" class="left" style="float:left;"><b>*) Harga Normal sebelum terdapat layanan yang dilanggakan</b></a><br>
                                   </div>

                            </div>

                     </div>

              </div>

       </div>
       <br>



       <div class="border border-color-7 rounded ">
              <div class="border-bottom">
                     <div class="p-4">
                            <h5 class="card-title mb-2 text-black"><b><small></small>Fasilitas</b></h5>
                            <hr />

                            <?php foreach ($facility as $fac) { ?>
                                   <span class="badge badge-success" style=" background: linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);"><?= $fac->rmFacName; ?></span>
                            <?php } ?>
                            </span>
                     </div>
              </div>
       </div>
</div>