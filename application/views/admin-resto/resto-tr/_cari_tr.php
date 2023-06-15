<!-- Basics Accordion -->

<div id="basicsAccordion">


       <!-- Card -->
       <div class="card mb-3">
              <div class="card-header card-collapse  text-white" id="basicsHeadingTwo" style="background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);">
                     <h5 class="mb-0">
                            <button type="button" class="btn btn-link btn-block d-flex justify-content-between card-btn collapsed p-3 " data-toggle="collapse" data-target="#basicsCollapseTwo" aria-expanded="false" aria-controls="basicsCollapseTwo">
                                   <b style="color:white">Pencarian</b>

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
                                          <label for="inputPassword4" style="float:left;"><b>booking id</b></label>
                                          <input type="text" class="form-control form-control-sm" name="bookingId" id="bookingId" placeholder="Cth. 8901001010">
                                   </div>
                                   <div class="form-group">
                                          <label for="inputPassword4" style="float:left;"><b>no whatsapp</b></label>
                                          <input type="text" class="form-control form-control-sm" name="no_telepon" id="no_telepon" placeholder="Cth. 080102312123">
                                   </div>
                                   <div class="form-group">
                                          <label for="inputPassword4" style="float:left;"><b>nama customer</b></label>
                                          <input type="text" class="form-control form-control-sm" name="nama_customer" id="nama_customer" placeholder="Cth. Lukacenko">
                                   </div>

                                   <!-- Datepicker -->
                                   <div class="form-group">
                                          <label for="inputPassword4" style="float:left;"><b>tanggal transaksi</b></label>
                                          <div id="datepickerWrapperFrom" class="u-datepicker input-group">
                                                 <div class="input-group-prepend">
                                                        <span class="input-group-text text-warning" style="background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);">
                                                               <span class="fas fa-calendar"></span>
                                                        </span>
                                                 </div>
                                                 <input class="js-range-datepicker form-control bg-transparent rounded-right" type="tanggal" name="tanggal" id="tanggal" placeholder="Pilih tanggal" aria-label="Pilih tanggal" data-rp-wrapper="#datepickerWrapperFrom" data-rp-date-format="d/m/Y">
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
<!-- End Basics Accordion -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/flatpickr/dist/flatpickr.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/components/hs.range-datepicker.js"></script>
<script>
       $(document).on('ready', function() {
              // initialization of range datepicker
              $.HSCore.components.HSRangeDatepicker.init('.js-range-datepicker');
       });
</script>

<script>
       $(document).ready(function() {
              $('form').submit(function() {
                     var submitBtn = $(this).find('button[type="submit"]');
                     submitBtn.attr('disabled', 'disabled').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
                     setTimeout(function() {
                            // submitBtn.removeAttr('disabled').html('Search...');
                     }, 2000);
              });
       });
</script>