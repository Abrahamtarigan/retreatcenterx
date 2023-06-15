
<div class="container">
<main id="content" role="main">
          <br>
          <div class="rounded" style="background: linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);">
              
                
                  <div class="border-1">
                    
                      <div class="card-body">
                          <ul class="nav tab-nav tab-nav-1-inner flex-nowrap pb-2 mb-md-1 px-lg-3 px-2" role="tablist">
                          <span  class="tabtext font-size-35 font-weight-semi-bold text-white __area">Lihat Ketersedian Retreat Centre Disini</span>
                              
                          </ul>
                          <div class="tab-content hero-tab-pane" style="color:whitesmoke;">
                              <div class="tab-pane fade active show" id="pills-one-example2" role="tabpanel" aria-labelledby="pills-one-example2-tab">
                                  <form  action="" method="POST" enctype='multipart/form-data'>
                                    <div class="row nav-select nav-select-1 d-block d-lg-flex mb-lg-2 px-lg-3 px-2 align-items-end">
                                      

                                      <div class="col-sm-12 col-lg-6 col-xl-3 mb-4 mb-xl-0 ">
                                          <!-- Input -->
                                          <p class="d-block  text-left  mb-0" style="color:whitesmoke;font-weight:bold;">Check-in</p>
                                          <div class="border-bottom-1">
                                              <div id="datepickerWrapperFromOne" class="u-datepicker input-group">
                                                  <div class="input-group-prepend">
                                                      <span class="d-flex align-items-center mr-2">
                                                        <i class="flaticon-calendar text-warning font-weight-semi-bold"></i>
                                                      </span>
                                                  </div>
                                                 
                                                   <input name="bookingStDt" style="color:whitesmoke;" class=" font-size-17  text-warning shadow-none font-weight-bold form-control hero-form bg-transparent  border-0" type="date" id="datepicker" value="<?= $this->input->post('bookingStDt');?>" min="<?php echo date('Y-m-d');?>">
                                              </div>
                                             
                                               <!-- End Datepicker -->
                                          </div>
                                          <!-- End Input -->
                                      </div>
                                      <?php 
                                      $tomorrow = date("Y-m-d", strtotime("+1 day"));
                                     
                                      ?>
                                      <div class="col-sm-12 col-lg-6 col-xl-3 mb-4 mb-xl-0 ">
                                          <!-- Input -->
                                          <p class="d-block  text-left  mb-0" style="color:whitesmoke;font-weight:bold;">Check-out</p>
                                          <div class="border-bottom-1">
                                              <div id="datepickerWrapperFromOne" class="u-datepicker input-group">
                                                  <div class="input-group-prepend">
                                                      <span class="d-flex align-items-center mr-2">
                                                        <i class="flaticon-calendar text-warning font-weight-semi-bold"></i>
                                                      </span>
                                                  </div>
                                                   <input name="bookingEdDt" style="color:whitesmoke;" class="datepicker font-size-17  text-warning shadow-none font-weight-bold form-control  bg-transparent  border-0" type="date" id="datepicker" value="<?= $this->input->post('bookingEdDt');?>" min="<?php echo $tomorrow;?>">
                                              </div>
                                               <!-- End Datepicker -->
                                          </div>
                                          <!-- End Input -->
                                          
                                      </div>
                                      
                                      
            
                                      <div class="col-sm-12 col-lg col-xl-1dot9">
                                          <button type="submit" class="btn btn-warning __areas __button_khas text-white"><i class="flaticon-magnifying-glass mr-2"></i>Cek Ketersedian Sekarang</button>
                                      </div>
                                    </div>
                                    
                                    <!-- End Checkbox -->
                                  </form>
                              </div>
                              
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!--Banner v2-->
