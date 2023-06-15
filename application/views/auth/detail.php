
<!-- ========== MAIN CONTENT ========== -->
<main id="content">


            <!-- Breadcrumb -->
            <div class="border-bottom mb-7">
                <div class="container">
                    <nav class="py-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter mb-0 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="#">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="#" style="font-weight:bold;"><?=$room['roomName']?></a></li>
                            
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- End Breadcrumb -->
            
            <div class="container">
            <?php if ($this->session->userdata('userEmail') == null){
                                            ?>
                                            <p class='alert alert-warning' style='font-weight:bold;'>Anda belum bisa memesan karena belum login</p>
                                            <?php
            }   
                                            ?>
                <div class="row">
                    <div class="col-lg-8 col-xl-9">
                        
                        <div class="d-block d-md-flex flex-center-between align-items-start mb-2">
                            
                            <div class="mb-3">
                            
                                <ul class="list-unstyled mb-2 d-md-flex flex-lg-wrap flex-xl-nowrap mb-2">
                                    
                                    <li class="border border-brown bg-brown rounded-xs d-flex align-items-center text-lh-1 py-1 px-3 mr-md-2 mb-2 mb-md-0 mb-lg-2 mb-xl-0">
                                        
                                        <span class="font-weight-normal text-white font-size-14"><?php
                                         if($room['roomBrfAva']== 1){
                                            echo "Gratis Sarapan Pagi";
                                         }else{
                                            echo "Tidak Termasuk Sarapan Pagi";
                                         }
                                        ?></span>
                                    </li>
                                    <li class="border border-maroon bg-maroon rounded-xs d-flex align-items-center text-lh-1 py-1 px-3 mr-md-2 mb-2 mb-md-0 mb-lg-2 mb-xl-0 mb-md-0">
                                        <span class="font-weight-normal font-size-14 text-white">
                                        
                                        <?php
                                         if($room['roomWifiAva']== 1){
                                            echo "Free Wi-fi";
                                         }else{
                                            echo "Wi-fi Belum tersedia diarea ini";
                                         }
                                        ?></span> 
                                    </li>
                                </ul>
                                <div class="d-block d-md-flex flex-horizontal-center mb-2 mb-md-0">
                                    <h4 class="font-size-23 font-weight-bold mb-1"><?=$room['roomName']?></h4>
                                    <div class="ml-3 font-size-10 letter-spacing-2">
                                        <span class="d-block green-lighter ml-1">
                                            <span class="fas fa-star"></span>
                                            <span class="fas fa-star"></span>
                                            <span class="fas fa-star"></span>
                                            <span class="fas fa-star"></span>
                                            <span class="fas fa-star"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="d-block d-md-flex flex-horizontal-center font-size-14 text-gray-1">
                                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> <?=$room['roomLocation']?>
                                    
                                </div>
                            </div>

                        </div>
                        <div class="pb-4 mb-2">
                            <div class="position-relative">
                            <?php if (isset($picture)) { ?>
                                <div class="card-deck">
                                <?php foreach ($picture as $pic){?>
                                <div class="card">
                                    <img class="card-img-top" src="<?= base_url();?>upload/hotel/<?= $pic->roomsPicture?>" alt="Card image cap">
                                   
                                </div>
                                <?php } ?>
                            
                            
                            </div>
                            <?php } ?>
                                <!-- Images Carousel -->
                                                    
                                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    
                    
                    <div class="carousel-inner">
                   
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>
                                <!-- End Images Carousel -->
                            </div>
                        </div>
                        <div class="border-bottom position-relative">
                           
                            <h3 style="font-weight: bold;"><?=$room['roomName']?></h3>
                            <p><?=$room['roomLocation']?></p>

                            <div class="collapse" id="collapseLinkExample">
                                <p><?=$room['roomDescription']?></p>
                            </div>

                            <a class="link-collapse link-collapse-custom gradient-overlay-half mb-5 d-inline-block border-bottom border-primary" data-toggle="collapse" href="#collapseLinkExample" role="button" aria-expanded="false" aria-controls="collapseLinkExample">
                                <span class="link-collapse__default font-size-14">View More <i class="flaticon-down-chevron font-size-10 ml-1"></i></span>
                                <span class="link-collapse__active font-size-14">View Less <i class="flaticon-arrow font-size-10 ml-1"></i></span>
                            </a>
                        </div>
                        <div class="border-bottom py-4">
                           

                            <h5 id="scroll-amenities" class="font-size-21 font-weight-bold text-dark mb-4">
                                Fasilitas
                            </h5>
                            
                            <?php if (isset($facility)) { ?>
                                    
                            <ul class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
                            <?php foreach ($facility as $fac){?>
                                <li class="col-md-4 list-group-item"><?= $fac->rmFacIcon?><?= $fac->rmFacName?></li>
                           <?php } ?>
                           
                            </ul>
                            <?php } ?>
                        </div>
                      
                       
                        <div class="border-bottom py-4 position-relative">
                            <h5 id="scroll-specifications" class="font-size-21 font-weight-bold text-dark mb-4">
                                Aturan Menginap
                            </h5>
                            <ul class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
                                <li class="col-md-4 list-group-item py-0">
                                    <div class="font-weight-bold text-dark mb-2">Check-in/Check-out</div>
                                    <div class="text-gray-1 mb-2 pt-1">Check-in from: 15:00</div>
                                    <div class="text-gray-1 mb-4 pt-1">Check-out until: 11:00</div>
                                    <div class="font-weight-bold text-dark mb-2">Getting around</div>
                                    <div class="text-gray-1 mb-4 pt-1">Distance from city center: 0 km</div>
                                    <div class="font-weight-bold text-dark mb-2">The property</div>
                                    <div class="text-gray-1 mb-2 pt-1">Number of floors: 8</div>
                                    <div class="text-gray-1 mb-2 pt-1">Number of rooms : 998</div>
                                    <div class="text-gray-1 mb-4 pt-1">Most recent renovation: 2019</div>
                                </li>
                                </li>
                                <li class="col-md-4 list-group-item py-0">
                                    <div class="font-weight-bold text-dark mb-2">Extras</div>
                                    <div class="text-gray-1 mb-2 pt-1">Breakfast charge (unless included in room price): 20 GBP</div>
                                    <div class="text-gray-1 mb-4 pt-1">Still Water Horse Head Statue - 70 m</div>
                                    <div class="font-weight-bold text-dark mb-2">The property</div>
                                    <div class="text-gray-1 mb-2 pt-1">Number of floors: 8</div>
                                    <div class="text-gray-1 mb-2 pt-1">Number of rooms : 998</div>
                                    <div class="text-gray-1 mb-2 pt-1">Most recent renovation: 2019</div>
                                </li>
                            </ul>
                            <div class="collapse" id="collapseLinkExample4">
                                <ul class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
                                    <li class="col-md-4 list-group-item py-0">
                                        <div class="font-weight-bold text-dark mb-2">Check-in/Check-out</div>
                                        <div class="text-gray-1 mb-2 pt-1">Check-in from: 15:00</div>
                                        <div class="text-gray-1 mb-4 pt-1">Check-out until: 11:00</div>
                                        <div class="font-weight-bold text-dark mb-2">Getting around</div>
                                        <div class="text-gray-1 mb-2 pt-1">Distance from city center: 0 km</div>
                                    </li>
                                    <li class="col-md-4 list-group-item py-0">
                                        <div class="font-weight-bold text-dark mb-2">Extras</div>
                                        <div class="text-gray-1 mb-2 pt-1">Breakfast charge (unless included in room price): 20 GBP</div>
                                        <div class="text-gray-1 mb-4 pt-1">Still Water Horse Head Statue - 70 m</div>
                                        <div class="font-weight-bold text-dark mb-2">The property</div>
                                        <div class="text-gray-1 mb-2 pt-1">Number of floors: 8</div>
                                        <div class="text-gray-1 mb-2 pt-1">Number of rooms : 998</div>
                                        <div class="text-gray-1 mb-4 pt-1">Most recent renovation: 2019</div>
                                    </li>
                                </ul>
                            </div>

                            <a class="link-collapse link-collapse-custom gradient-overlay-half mb-5 d-inline-block border-bottom border-primary" data-toggle="collapse" href="#collapseLinkExample4" role="button" aria-expanded="false" aria-controls="collapseLinkExample4">
                                <span class="link-collapse__default font-size-14">View More <i class="flaticon-down-chevron font-size-10 ml-1"></i></span>
                                <span class="link-collapse__active font-size-14">View Less <i class="flaticon-arrow font-size-10 ml-1"></i></span>
                            </a>
                        </div>
                      
                        <div id="stickyBlockEndPoint"></div>
                        
                      
                    </div>
                    <div class="col-lg-4 col-xl-3">
                      
                       
                        <div class="mb-4">
                            <div class="border border-color-7 rounded mb-5">
                                <div class="border-bottom">
                                    <div class="p-4">
                                    <!-- <span style="font-weight: bold;" class="d-block text-primary-2 font-weight-bold mb-0 text-left alert alert-warning"> Anda memesan untuk :<br/>
                                            <?php
                                                   $startTimeStamp = strtotime($bookingStDt);
                                                   $endTimeStamp = strtotime($bookingEdDt);
                                                   
                                                   $timeDiff = abs($endTimeStamp - $startTimeStamp);
                                                   
                                                   $numberDays = $timeDiff/86400;  // 86400 seconds in one day
                                                   
                                                   // and you might want to convert to integer
                                                   $numberDays = intval($numberDays);
                                                   echo "<span class='text-primary-2 font-weight-bold  text-left ' style='font-size:16px;'>$numberDays&nbsp;Malam</span>";?> 
                                            </span> -->
                                        <span class="font-size-14">Total Harga</span>
                                        <span class="font-size-30  font-weight-bold ml-1 text-black"><br/>Rp.  <?php 
                                                $total_bayar = $room['roomPricePerNight'] * $numberDays; 
                                                $room['roomPricePerNight'] * $numberDays;
                                                
                                                echo number_format($total_bayar, 0, ".", ".") ?></span>
                                       
                                    </div>
                                </div>
                                <form action="<?= base_url('auth/cart');?>" method="POST" enctype="multipart/form-data"> 
                                <?php if ($user['userEmail'] == null) {
                                    echo "";
                                }else { ?>
                                <input hidden type='text' name='bookingUserId' value='<?= $user['userId'];?>'>
                               
                                <?php } ?>
                                <div class="p-4">
                                    <!-- Input -->
                                    <span style="font-weight: bold;" class="d-block text-primary-2 font-weight-bold mb-0 text-left">Check In</span>
                                    
                                    <div class="mb-4">
                                        <div class="border-bottom border-width-2 border-color-1">
                                            <div id="datepickerWrapperPick" class="u-datepicker input-group">
                                                <div class="input-group-prepend">
                                                    <span class="d-flex align-items-center mr-2 font-size-21">
                                                      <i class="flaticon-calendar text-black font-weight-semi-bold"></i>
                                                    </span>
                                                </div>
                                                
                                                <input disabled  name="bookingStDt" class="datepicker font-size-lg-16 shadow-none font-weight-bold form-control hero-form bg-transparent  border-0" type="date" value="<?= $bookingStDt;?>">
                                               
                                            </div>
                                            <!-- End Datepicker -->
                                        </div>
                                        <br/>
                                        <span style="font-weight: bold;" class="d-block text-primary-2 font-weight-bold mb-0 text-left">Check Outd</span>
                                        <div class="border-bottom border-width-2 border-color-1">
                                            <div id="datepickerWrapperPick" class="u-datepicker input-group">
                                                <div class="input-group-prepend">
                                                    <span class="d-flex align-items-center mr-2 font-size-21">
                                                      <i class="flaticon-calendar text-black font-weight-semi-bold"></i>
                                                    </span>
                                                </div>
                                                
                                                <input disabled name="bookingEdDt" class="datepicker font-size-lg-16 shadow-none font-weight-bold form-control hero-form bg-transparent  border-0" type="date" value="<?= $bookingEdDt;?>">
                                               
                                            </div>
                                            <!-- End Datepicker -->
                                           
                                        </div>
                                        <br/>
                                        
                                            
                                           </span>
                                    </div>
                                    <!-- End Input -->
                                    <!-- Input -->
                                   
                                    
                                    <!-- End Input -->

                                    <div class="text-center">
                                        <?php if ($this->session->userdata('userEmail') == null){
                                          ?>
                                            
                                             <div class="mb-3 pb-1">
                                                 <a  href="<?= base_url('auth/google_regis');?>" class="text-black btn btn-warning  btn-block border border-dark rounded-pill"><i class="lni lni-google"></i>&nbsp;Login dengan Google</a>
                                            </div> 
                                        <?php
                                        }else { ?>
                                        
                                                <?php if($numberDays <= 0)
                                                {
                                                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                                                } 
                                                ?>

<button type="button" class="btn btn-warning height-70 w-100 mb-xl-0 mb-lg-1 transition-3d-hover rounded-pill text-black" style="font-weight: bold;" data-toggle="modal" data-target="#exampleModal">
  Pesan Sekarang&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
</svg>
</button>




                                        <?php } ?>
                                    </div>

                                </div>
                                </form>
                            </div>
                          
                        </div>
                    </div>
                </div>
                <!-- Product Cards Ratings With carousel -->
                
            </div>
        </main>
        <!-- ========== END MAIN CONTENT ========== -->

        <!-- Modal -->


<div class="modal fade modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
                                            
      <div class="modal-header">
        
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pemesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
      <div class="row">
      <div class="col-md-12"> 
      <div class="card-body">
    <h5 class="card-title">
        Total Bayar : Rp.  <?php 
                             $total_bayar = $room['roomPricePerNight'] * $numberDays; 
                             $room['roomPricePerNight'] * $numberDays;
                             echo number_format($total_bayar, 0, ".", ".") ?>
    </h5>
    <p class="card-text">Silahkan memasukkan jumlah dari fasilitas yang ingin anda sewa,<b>Jika Tidak Kosongkan saja dan klik tombol Konfirmasi Pemesanan</b>
         <!-- <button type="submit" class="btn btn-warning btn-sm">Lanjutkan Ke Pembayaran</button></p> -->
    
    <hr/>
  </div>  
  <form action="<?= base_url('auth/cart');?>" method="POST" enctype="multipart/form-data"> 
 
    <div class="card-body">
      <div class="form-row">
      <?php $no=0; foreach($getExtender as $ge): $no++; ?>
        <div class="form-group col-md-6">
        <input hidden type='text' name='bookingUserId' value='<?= $user['userId'];?>'>                           
                <label for="inputEmail4"><b><?= $ge->roomExtenderFacility;?></b><br/><?= number_format($ge->roomExtenderFacilityPrice, 0, ".", ".");?>&nbsp;x&nbsp;1</label>
                <input hidden type="number" class="form-control form-control-sm" name="id[]"   value="<?= $ge->id;?>">
                <input hidden type="text" class="form-control form-control-sm" name="price[]"  value="<?= $ge->roomExtenderFacilityPrice;?>">
                <input type="number" class="form-control form-control-sm" name="quantity[]" type="number">
             
        </div>
        <?php endforeach; ?>
     </div>                                
    
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Lanjutkan ke pembayaran</button>
    </div>
    </form>
                                        </div> </div> </div> </div> </div></div> </div> </div></div>
      
     
      
