<style>
       body {
              font-family: Arial, sans-serif;
              font-size: 10pt;
       }

       .header {
              text-align: center;
              margin-bottom: 10px;
       }

       .header h2,
       .header p {
              margin: 0;
       }

       .table {
              width: 100%;
              border-collapse: collapse;
       }

       .table th,
       .table td {
              padding: 5px;
              border: 1px solid #000;
       }

       .total {
              margin-top: 10px;
              text-align: right;
       }

       /* Menghindari pemisahan elemen pada halaman cetak */
       .avoid-page-break {
              page-break-inside: avoid;
       }
</style>


<body>
       <div class="header">
              <h2>Restoran Retreat Center</h2>
              <p>Sukamakmur, Deliserdang, Sumatera Utara</p>
              <hr>


              <div style="margin:-2px;">
                     <?php
                     $showButton = false;
                     $cetakButton = false; // Variabel flag untuk melacak apakah tombol sudah ditampilkan

                     foreach ($menu_edit_view as $h) {
                            if ($h->status_pembayaran != 'Pembayaran Berhasil dilakukan') {
                                   // Jika ada data yang memenuhi kondisi, ubah variabel flag menjadi true dan hentikan iterasi
                                   $showButton = true;
                                   break;
                            } else {

                                   $cetakButton = true;
                                   break;
                            }
                     }


                     if ($cetakButton) {
                     ?>
                            <div class="alert bg-info mb-5 py-3 __button_khas" role="alert" style="width:100%;">
                                   <div class="d-flex">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle">
                                                 <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                 <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                          </svg>
                                          <div class="px-2">

                                                 <p>Order id :<b>#&nbsp;<?= $h->bookingId; ?></b> <br>
                                                        Customer :<b>&nbsp;<?= $h->nama_customer; ?></b> <br>
                                                        No. Meja :<b>&nbsp;<?= $h->no_meja; ?></b><br>
                                                        Tanggal :<b>&nbsp;<?= $h->tanggal; ?></b></p>




                                          </div>
                                   </div>
                            </div>



                     <?php
                     }


                     ?>


              </div>
              <br>
              <table class="table avoid-page-break">
                     <thead>
                            <tr>
                                   <th>Items</th>
                                   <th>Qty</th>
                                   <th>Subtotal</th>
                            </tr>
                     </thead>

                     <tbody>
                            <?php foreach ($menu_edit_view as $h) : ?>
                                   <tr><small>
                                                 <td><?= $h->masakan; ?></td>
                                                 <td><?= $h->total; ?>*<?= $h->total_harga / $h->total; ?></td>
                                                 <td>Rp.<?= number_format($h->total_harga, 0, ',', '.'); ?>,-</td>
                                          </small>
                                   </tr>


                                   <!-- Tambahkan item lainnya sesuai kebutuhan -->
                            <?php endforeach; ?>
                     </tbody>
              </table>
              <div class="total avoid-page-break">
                     <?php foreach ($sum_total as $s) : ?>
                            <?php $rupiah = number_format($s->price_total, 0, ',', '.'); ?>
                            <h3></h3>
                            <h4>Total Rp.<?= $rupiah; ?>,-</h4>
                     <?php endforeach; ?>
              </div>
              <center>
                     <h3>--Terima Kasih--</h3>
                     <br>Jl. Jamin Ginting, Sukamakmur, Deliserdang, Sumut, Indonesia
                     <p>Telp: 1234567890</p>
              </center>

</body>

</html>