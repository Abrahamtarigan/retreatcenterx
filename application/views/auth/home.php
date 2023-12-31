 <?php if (isset($reservation)) { ?>
   <div class="col-lg-9">
     <div class="d-flex justify-content-between mb-3 pt-md-3 mt-1 pb-md-3 mb-md-2 align-items-end">
       <a href="" style="font-weight: bold; font-size: 20px;color:black;float:left">Pencarian Tersedia >&nbsp;<small><?= $this->input->post('bookingStDt'); ?> <i class="fas fa-angle-right"></i> <?= $this->input->post('bookingEdDt'); ?></small></a>
       <!-- <a href="#" class="font-weight-bold d-flex text-lh-1 mb-md-2 ml-2">More
                    <i class="flaticon-right-arrow ml-2"></i>
                </a> -->
     </div>
     <hr>
     <?php if ($reservation) {; ?>


       <div class="row">
         <?php foreach ($reservation as $r) { ?>

           <div class="col-md-4">
             <div class="card transition-3d-hover shadow-hover-2 h-100">
               <div class="position-relative">
                 <a href="#" class="d-block gradient-overlay-half-bg-gradient-v5">
                   <img class="card-img-top" src="<?= base_url(); ?>upload/head/<?= $r->roomHeadPicture; ?>">
                 </a>
                 <div class="position-absolute top-0 right-0 pt-3 pr-3">
                   <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Save for later">
                     <!-- <span class="flaticon-heart-1 font-size-20"></span> -->
                   </button>
                 </div>
                 <div class="position-absolute bottom-0 left-0 right-0">
                   <div class="px-4 pb-3">
                     <a href="#" class="d-block">
                       <div class="d-flex align-items-center font-size-14 text-white">
                         <i class="icon flaticon-placeholder mr-2 font-size-20"></i><?= $r->roomLocation; ?>

                         <hr>
                       </div>
                     </a>
                   </div>
                 </div>
               </div>
               <div class="card-body px-4 py-3">
                 <span class="text-dark" style="font-weight: bold; font-size: 20px;float:left"><?= $r->roomName; ?></span><br><br>

                 <div class="mb-0">
                   <span class="mr-1 font-size-14 text-dark-1"> Harga </span>
                   <span class="font-weight-bold">Rp <?= number_format($r->roomPricePerNight, 0, ".", "."); ?></span>
                   <span class="font-size-14 text-dark-1"> / malam</span>
                   <span class="text-dark" style="font-weight: bold; font-size: 14px;float:left"><u>Maksimum tamu <?= $r->total_guess; ?> orang</u></span><br>
                   <br>
                 </div>
                 <hr />
                 <div class="mb-0">
                   <center><a style="width: 100%;" href="<?= base_url('auth/details/' . encrypt_url($r->roomId) . ''); ?>" class="btn btn-warning">Lihat Sekarang&nbsp;
                       <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                         <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                       </svg></a></center>
                 </div>
               </div>
             </div>
           </div>
         <?php } ?>
       <?php } else {
        ?>
         <div class="__areasin">
           <center>
             <br>
             <h3>Stok Hotel Kosong</h3><b><small><?= $this->input->post('bookingStDt'); ?> <i class="fas fa-angle-right"></i> <?= $this->input->post('bookingEdDt'); ?></small></b>
         </div><br /><br /><br /><br /><br /><br><br><br><br><br><br><br>
       <?php
      } ?>
       <br>
       </div>
   </div>
   </div>
   </div>
 <?php } ?><br />

 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


 <script type="text/javascript">
   const flashData = $('.menu-berhasil-pop').data('flashdata');

   if (flashData) {
     Swal({
       title: '',
       text: 'Berhasil ' + flashData,
       type: 'success'
     });
   }

   // tombol-hapus
   $('.tombol-hapus-menu').on('click', function(e) {

     e.preventDefault();
     const href = $(this).attr('href');

     Swal({
       title: 'Apakah anda yakin',
       text: "Akan menghapus menu ini ?",
       type: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Hapus'
     }).then((result) => {
       if (result.value) {
         document.location.href = href;
       }
     })

   });
 </script>
 <script type="text/javascript">
   $(document).ready(function() {
     //$('.bootstrap-select').selectpicker();

     //GET UPDATE
     $('.update-record-menu').on('click', function() {
       var id = $(this).data('id');
       var menu = $(this).data('menu');
       $(".strings").val('');
       $('#UpdateModalMenu').modal('show');
       $('[name="edit_id"]').val(id);
       $('[name="menu_edit"]').val(menu);

       return false;
     });



   });
 </script>