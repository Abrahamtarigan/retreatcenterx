<div id="basicsAccordion">


       <!-- Card -->
       <div class="card mb-3">
              <div class="card-header card-collapse  text-white" id="basicsHeadingTwo" style="background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);">
                     <h5 class="mb-0">
                            <button type="button" class="btn btn-link btn-block d-flex justify-content-between card-btn collapsed p-3 " data-toggle="collapse" data-target="#basicsCollapseTwo" aria-expanded="false" aria-controls="basicsCollapseTwo">
                                   <b style="color:white"><small><b>Pencarian</b></small></b>

                                   <span class="card-btn-arrow" style="color:white">
                                          <span class="fas fa-arrow-down small"></span>
                                   </span>
                            </button>
                     </h5>
              </div>
              <div id="basicsCollapseTwo" class="collapse" aria-labelledby="basicsHeadingTwo" data-parent="#basicsAccordion">
                     <div class="card-body">
                            <form id="cari_menu" method="GET" action="<?= base_url('Restotr/'); ?>">
                                   <div class="form-group">
                                          <label for="inputPassword4" style="float:left;"><small><b>booking id</b></small></label>
                                          <input type="text" class="form-control form-control-sm" name="bookingId" id="bookingId" placeholder="Cth. 8901001010">
                                   </div>
                                   <div class="form-group">
                                          <label for="inputPassword4" style="float:left;"><small><b>Status transaksi</b></small></label>
                                          <input type="text" class="form-control form-control-sm" name="no_telepon" id="no_telepon" placeholder="Cth. 080102312123">
                                   </div>

                                   <!-- Datepicker -->
                                   <div class="form-group">
                                          <label for="inputPassword4" style="float:left;"><small><b>Check in</b></small></label>
                                          <div id="datepickerWrapperFrom" class="u-datepicker input-group">
                                                 <div class="input-group-prepend">
                                                        <span class="input-group-text text-white" style="background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);">
                                                               <span class="fas fa-calendar"></span>
                                                        </span>
                                                 </div>
                                                 <input class="js-range-datepicker form-control bg-transparent rounded-right" type="date" name="tanggal" id="tanggal" placeholder="Pilih tanggal" aria-label="Pilih tanggal" data-rp-wrapper="#datepickerWrapperFrom" data-rp-date-format="d/m/Y">
                                                 <!-- <input class="form-control bg-transparent rounded-right" type="date" name="tanggal" id="tanggal" placeholder="From" aria-label="Pilih tanggal" data-rp-date-format="d/m/Y"> -->
                                          </div>
                                          <br>
                                          <div class="form-group">
                                                 <label for="inputPassword4" style="float:left;"><small><b>Check in</b></small></label>
                                                 <div id="datepickerWrapperFrom" class="u-datepicker input-group">
                                                        <div class="input-group-prepend">
                                                               <span class="input-group-text text-white" style="background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);">
                                                                      <span class="fas fa-calendar"></span>
                                                               </span>
                                                        </div>
                                                        <input class="js-range-datepicker form-control bg-transparent rounded-right" type="date" name="tanggal" id="tanggal" placeholder="Pilih tanggal" aria-label="Pilih tanggal" data-rp-wrapper="#datepickerWrapperFrom" data-rp-date-format="d/m/Y">
                                                        <!-- <input class="form-control bg-transparent rounded-right" type="date" name="tanggal" id="tanggal" placeholder="From" aria-label="Pilih tanggal" data-rp-date-format="d/m/Y"> -->
                                                 </div>

                                          </div>


                                          <button id="cari_menu" type="submit" class="btn btn-primary btn-sm" style=" border-radius:px;background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);float:left;"> Lakukan Pencarian</button>&nbsp


                            </form>
                     </div>
                     <br>
              </div>

       </div>
       <!-- End Card -->




</div>