
<div class="container-fluid">
  <div class="page-breadcrumb __areasin">
  <div class="vertical-line">&nbsp;<h3 class="title-breadcumb" style="font-family:'Open Sans', sans-serif;">
  <b><?= $title;?></b></h3></div>
 
 
                                <nav aria-label="breadcrumb ">
                                
                                    <ol class="breadcrumb list-breadcumb">
                                    
                                  
                                        <li class="breadcrumb-item active " aria-current="page"><a href="<?php echo site_url(''); ?>" class="breadcrumb-link"><?php echo $this->uri->segment(1); ?></a></li>
                                        <?php if ($this->uri->segment(2)) {;?>
                                        <li class="breadcrumb-item active " aria-current="page"><a href="<?php echo site_url(''); ?>" class="breadcrumb-link"><?php echo $this->uri->segment(2); ?></a></li>
                                            <?php if ($this->uri->segment(3)) {;?>
                                            <li class="breadcrumb-item active " aria-current="page"><a href="<?php echo site_url(''); ?>" class="breadcrumb-link"><?php echo $this->uri->segment(3); ?></a></li>
                                            <?php } ?>
                                        <?php } ?>
                                    </ol>
                                </nav>
                                
                                <hr>
                            </div>
                            
                           
</div>


