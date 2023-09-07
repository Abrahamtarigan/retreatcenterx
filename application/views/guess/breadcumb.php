<ol class="breadcrumb list-breadcumb" style="margin:10px;margin-top:-20px;margin-bottom:-30px;margin-left:-15px;">

       <a href="<?= base_url('guess/cart/'); ?>" style="font-weight: bold; font-size: 17px;color:black;float:left">Data transaksi</a>
       <hr>
       <li class="breadcrumb-item active " aria-current="page"><a href="<?php echo site_url(''); ?>" class="breadcrumb-link"><?php echo $this->uri->segment(1); ?></a></li>
       <?php if ($this->uri->segment(2)) {; ?>
              <li class="breadcrumb-item active " aria-current="page"><a href="<?php echo site_url(''); ?>" class="breadcrumb-link"><?php echo $this->uri->segment(2); ?></a></li>
              <?php if ($this->uri->segment(3)) {; ?>
                     <li class="breadcrumb-item active " aria-current="page"><a href="<?php echo site_url(''); ?>" class="breadcrumb-link"><?php echo $this->uri->segment(3); ?></a></li>
              <?php } ?>
       <?php } ?>
</ol>
<br>