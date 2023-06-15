<?php include '_cari_tr.php'; ?>

<style>
       /* Pagination styles */
       .pagination {
              display: flex;
              padding: 1em 0;
       }

       .pagination a,
       .pagination strong {
              border: 1px solid silver;
              border-radius: 5px;
              color: black;
              padding: 0.5em;
              margin-right: 0.5em;
              text-decoration: none;
              width: 50px;
       }

       .pagination a:hover,
       .pagination strong {
              border: 1px solid linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);
              background: linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);
              color: white;
       }
</style>


<?php $n = 1; ?>


<div class="row">
       <?php foreach ($hasil as $h) : ?>
              <?php
              $tanggal = $h->tanggal; // Tanggal yang ingin diubah formatnya

              $tanggal = date("D, d M Y", strtotime($tanggal));



              ?>
              <div class="col-sm-3" style="margin-top:12px;">
                     <div class="card btn btn-success" style="border-radius:12px;">
                            <div class="card-body text-left">
                                   <small class="text-white font-weight-bold" style="font-weight:text-bold;"><?= $tanggal; ?></small><br>
                                   <!-- <small class="text-white font-weight-bold"><?= $h->admin; ?></small> -->
                                   <small><span class="badge badge-primary"><?= $h->nama_customer; ?></span></small>
                                   <p class="card-text text-black font-weight-bolder">#<?= $h->bookingId; ?>
                                          <a href="<?= base_url('Restotr/detail/' . $h->bookingId); ?>" class="card-link btn btn-warning btn-sm" style="border-radius:8px;"><i class="fa-solid fa-money-check-dollar"></i>&nbsp;Pembayaran</a>
                                   </p>



                            </div>
                     </div>
              </div>

              <br>

       <?php endforeach; ?>



</div>
<ul class="pagination justify-content-end">

       <?php echo $pagination; ?>
</ul>