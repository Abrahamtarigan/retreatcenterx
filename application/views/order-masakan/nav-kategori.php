<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 __breadcumb_ rounded">
                        <div class="page-header "><br/>
                           
                            <div class="container">
                           
                              <a href="" class="__areasin text-white" style="font-size:25px;">Kategori Menu :&nbsp;</a>
                        <a href="<?= base_url('restaurant/menu');?>" class="tambah rounded-pill  rounded-sm border border-warning btn btn-warning __button_khas_all text-dark" ><i class="fa-sharp fa-solid fa-worm"></i>&nbsp;Semua Masakan </a>&nbsp;
                          <?php foreach ($getKategori as $gc){?>
                          <a href="<?= base_url('restaurant/cari/'.$gc->nama_kategori);?>" class="btn btn-primary tambah  font-weight-bold rounded-pill __button_khas rounded-sm border border-warning" ><i class="fa-sharp fa-solid fa-worm"></i>&nbsp;<?= $gc->nama_kategori;?></a>&nbsp;
                          
                          <?php } ?>
                          
                          
                        </div>
                        </div>
                       
                        
                        
                        <br>
                    </div>
                    