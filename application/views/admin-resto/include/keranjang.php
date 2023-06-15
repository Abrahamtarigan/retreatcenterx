<div class="col-lg-4">

  <b><i class="fa-solid fa-basket-shopping"></i>&nbsp;Keranjang</b>
  <hr>
  <div class="table table-responsive mb-2 ">
    <?php if (count($this->cart->contents()) != 0) : ?>
      <table class="table mb-1">
        <thead class="">
          <tr class="">
            <th scope="col" class="border-0 bg-light ">
              <div class="">Produk</div>
            </th>

            <th scope="col" class="border-0 bg-light">
              <div class="py-2">qty</div>
            </th>
            <th scope="col" class="border-0 bg-light">
              <div class="py-2">Total</div>
            </th>


            <th scope="col" class="border-0 bg-light ">
              <div class="py-2">. . .</div>
            </th>
          </tr>
        </thead>
        <tbody id="detail_cart">
          <?php foreach ($this->cart->contents() as $items) : ?>
            <tr>


  </div>
  <td class="align-middle"><small><strong><strong><?= $items['name'] ?></strong></small></strong></td>
  <td class="align-middle"><small><strong><strong>x<?= $items['qty'] ?></strong></small></strong></td>
  <td class="align-middle"><small><strong><?= number_format($items['subtotal'], 0, ',', '.') ?></strong></small></td>
  <td class="align-middle text-center"><a href="<?= base_url('restaurant/hapus_items/' . $items['rowid']) ?>"><small><i class="fa fa-trash text-danger" aria-hidden="true"></i></small></a></td>
  </tr>
  </tr>
<?php endforeach; ?>

<br />
</tbody>
<td><a href="<?= base_url('adminresto/confirmation/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/?o=dinein') ?>"><button class="btn btn-warning btn-md float-right __button_khas btn btn-outline-warning font-weight-bold btn btn-block">Total Rp <?= number_format($this->cart->total(), 0, ',', '.') ?></h5><i class="fa-solid fa-cart-shopping"></i></button></a></td>

</table>
</div>
<?php else : ?>
  <h3 class="text-center"><small><b>Keranjang Belanja Kosong</b> </small></h3>
<?php endif; ?>
</div>
</div>
</div>