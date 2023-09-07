<!--/** 
 * @Author: flydreame 
 * @Date: 2023-08-12 15:13:54 
 * @Desc:  halaman untuk cart/
 */  -->
<aside class="col-sm-9">

  <div class="container">
    <?php include 'breadcumb.php'; ?>
    <?php include 'pencarian-order.php'; ?>

    <?php if (empty($getBookings)) { ?>
      <div class="col">
        <br><br><br>
        <div class="card-body">
          <center class="alert alert-light text-dark">
            <br>
            <h4 class="text-center"><br><span class="logo"><i class="fa-solid fa-cart-arrow-down fa-2xl "></i></span><br>
              <br><b>Ups, kamu belum pernah memesan nih ! ...</b> <br><br>
            </h4>
          </center>
          <br><br><br>
        </div>
      </div>
  </div>
<?php } else { ?>

  <div id="respon-transaksi">
    <table class="table">
      <thead>
        <tr>
          <th><small><b>check in</b><br>(booking id dan nama vila)</small></th>
          <th><small><b>check in</b><br>(masuk)</small></th>
          <th><small><b>check in</b><br>(keluar)</small></th>
          <th><small><b>Status</b><br>(progress order)</small></th>
          <th><small><b>Pembayaran</b><br>(status pembayaran)</small></th>
          <th><small><b>...</b></small></th>
          <!-- Tambahkan kolom lain sesuai kebutuhan -->
        </tr>
      </thead>
      <tbody>
        <?php foreach ($getBookings as $gb) : ?>
          <tr>
            <small>
              <td><b>#<?php echo $gb->bookingId; ?></b><br>
                <a class="text-primary" href="<?= base_url('guess/cart?view=' . $gb->bookingId . ''); ?>">
                  <u>Lihat Tagihan</u>
                </a>
              </td>
              <td><?php echo date('d F Y', strtotime($gb->bookingStDt)); ?></td>
              <td><?php echo date('d F Y', strtotime($gb->bookingEdDt)); ?></td>
              <td><?php echo $gb->status_name; ?></td>
              <td><?php echo $gb->status_booking_name; ?></td>


            </small>
            <!-- Tambahkan kolom lain sesuai kebutuhan -->
          </tr>

        <?php endforeach; ?>
      </tbody>
    </table>
    <ul class="pagination justify-content-end">

      <center><?php echo $pagination; ?></center>
    </ul>

  </div>
  <?php

  ?>

<?php } ?>



<script>
  $(function() {
    $('#myTab li:first-child a').tab('show')
  })
</script>



</div>


</aside> <!-- col.// -->


</div> <!-- row.// -->

</div>