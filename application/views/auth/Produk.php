<style>
    .__keatas {
       margin:-12px;
       margin-left:2px;
       margin-bottom:10px;
    }
    .__redbadge{

    }
        
    
</style>
<div class="menu-berhasil-pop" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php if ($this->session->flashdata('message')) : ?>

<?php endif; ?>
<div class="container __areas">
 
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 __areasin">
                        <div class="page-header ">
                        
                           
                            <div class="page-breadcrumb">
                                
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item text-warning"><a href="<?php echo site_url(''); ?>" class="breadcrumb-link text-dark">Dashboard</a></li>
                                        <li class="breadcrumb-item active text-dark" aria-current="page">Hotel</li>
                                        <li class="breadcrumb-item active text-dark" aria-current="page"><?=$room['roomName']?></li>
                                    </ol>
                                </nav>
                            </div>
                            <hr>
                        </div>
                        </div>
<div class="dashboard-wrapper">
            <div class="container-fluid">
                               
            <div class="row">
                      
            <div class="col-sm-4">
  <div class = "__area">
  <a href = "#" class = "__card card-body" id="">
      <button class = "__favorit"><i class = "la la-heart-o"></i></button>
        <img src="<?php echo base_url('upload/head/').$room['roomHeadPicture']; ?>" class="img-fluid __img"/>
        
    </a>
    <div class="border border-color-7 rounded ">
                <div class="border-bottom">
                    <div class="p-4">
                    <h5 class="card-title mb-2 text-black">Harga Order/ Order Price :</h5><hr/>
                    <?php
                                                   $startTimeStamp = strtotime($bookingStDt);
                                                   $endTimeStamp = strtotime($bookingEdDt);
                                                   
                                                   $timeDiff = abs($endTimeStamp - $startTimeStamp);
                                                   
                                                   $numberDays = $timeDiff/86400;  // 86400 seconds in one day
                                                   
                                                   // and you might want to convert to integer
                                                   $numberDays = intval($numberDays);
                                                   echo "<span class='font-weight-normal font-size-14 text-warning __button_khas rounded' style='font-size:16px;;'>&nbsp;$numberDays&nbsp;Malam/ Nights&nbsp;</span>";?> 
                                            
                                       
                                        <span class="font-size-30  font-weight-bold ml-1 text-black __"><br/>Rp.  <?php 
                                                $total_bayar = $room['roomPricePerNight'] * $numberDays; 
                                                $room['roomPricePerNight'] * $numberDays;
                                                
                                                echo number_format($total_bayar, 0, ".", ".") ?></span>
                                                
                                                <div class="mb-4">
                                                <span style="font-weight: bold;" class="d-block text-primary-2 font-weight-bold mb-0 text-left">Check In</span>
                                        <div class="border-bottom border-width-2 border-color-1">
                                            <div id="datepickerWrapperPick" class="u-datepicker input-group">
                                                <div class="input-group-prepend">
                                                    <span class="d-flex align-items-center mr-2 font-size-21">
                                                      <i class="flaticon-calendar text-black font-weight-semi-bold"></i>
                                                    </span>
                                                </div>
                                                
                                                <input   name="bookingStDt" class="datepicker font-size-lg-16 shadow-none font-weight-bold form-control hero-form bg-transparent  border-0" type="date" value="<?= $bookingStDt;?>">
                                               
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
                                                
                                                <input   name="bookingStDt" class="datepicker font-size-lg-16 shadow-none font-weight-bold form-control hero-form bg-transparent  border-0" type="date" value="<?= $bookingEdDt;?>">
                                                
                                               
                                            
                                            <!-- End Datepicker -->
                                           
                                        </div> 
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="alert alert-secondary btn-sm btn btn-outline-warning    btn btn-outline-warning" role="alert">
                                    nb: Harga Normal sebelum terdapat layanan yang dilanggakan</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="border border-color-7 rounded ">
                <div class="border-bottom">
                    <div class="p-4">
                    <h5 class="card-title mb-2 text-black">Fasilitas/ Facility :</h5><hr/>
                       
                        <?php foreach ($facility as $fac){?>
                        <span class="badge badge-success __button_khas"><?= $fac->rmFacName; ?></span
                        
                                <?= $fac->rmFacIcon?><?= $fac->rmFacName?><br/>
                           <?php } ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>

  
 
  <a href = "#" class = "card-body" id="">

   
    <div class = " text-left __keatas" sty id="">
        <div class="p-4">
            
      <h2 class="card-title mb-2 text-black"><?=$room['roomName'];?></h2>
      <p class="__keatas"><i class="icon flaticon-placeholder mr-2 font-size-20"></i><?=$room['roomLocation']?></p>
      <div class = "__type">
        <span class="font-weight-normal font-size-14 text-white _button_khas">
        <?php
                                         if($room['roomBrfAva']== 1){
                                            echo "Gratis Sarapan Pagi";
                                         }else{
                                            echo "Tidak Termasuk Sarapan Pagi";
                                         }
                                        ?>
        </span>
         <span class="font-weight-normal font-size-14 text-white button">
                                        
                                        <?php
                                         if($room['roomWifiAva']== 1){
                                            echo "Free Wi-fi";
                                         }else{
                                            echo "Wi-fi Belum tersedia diarea ini";
                                         }
                                        ?></span> 
        
      </div>
      
      <p><?=$room['roomDescription']?>
      <br>
     
      </p>
     
      
    
    </div>
                                        </div>
<hr>
  <form  action="<?= base_url('auth/cart');?>" method="POST" enctype="multipart/form-data"> 
    <div class="form-group col-md-6">
     <h3 class="card-title mb-2 text-black">Order Fasilitas </h3>
     
    </div>
    
    <div class="card-body">
    
      <div class="form-row">
        
      <?php $no=0; foreach($getExtender as $ge): $no++; ?>
        <div class="form-group col-md-6">
        <input hidden type='text' name='bookingUserId' value='<?= $user['userId'];?>'>                           
                <label for="inputEmail4"><b><?= $ge->roomExtenderFacility;?></b><br/><?= number_format($ge->roomExtenderFacilityPrice, 0, ".", ".");?>&nbsp;x&nbsp;1</label>
                <input hidden type="number" class="form-control form-control-sm" name="id[]"   value="<?= $ge->id;?>">
                <input hidden  type="text" class="form-control form-control-sm" name="price[]"   value="<?= $ge->roomExtenderFacilityPrice;?>">
                <input type="number" class="form-control form-control-sm" name="quantity[]" type="number">
                
                
             
        </div>
        <?php endforeach; ?>
     </div>                                
    
    <div class="modal-footer">
      
        <button type="submit" class="btn btn-primary __button_khas button button-warning text-warning">Masukkan Kedalam Keranjang</button>
    </div>
    </form>

                     </div> </div> </div> </div> </div></div> </div> </div></div>
                    
</body>
</html>
      

