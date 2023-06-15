<br>
<div class="container-fluid">
       <div class="row">




              <div class="col-lg-8 mx-auto">





                     <article class="card-group">

                            <div class="filter-content" id="myDiv2">



                                   <div class="modal-content " style="border-radius:10px;">
                                          <div class="form-group col-md-12">
                                                 <label for="recipient-name" class="col-form-label modal-title" id="exampleModalLabel">
                                                        <h5><b>Daftar list belanja <small></small> </b> </h5>
                                                        <table class="table">
                                                               <thead>
                                                                      <tr>
                                                                             <th scope="col">#</th>
                                                                             <th scope="col">Order id</th>
                                                                             <th scope="col">Customer</th>
                                                                             <th scope="col">Tanggal Transaksi</th>
                                                                             <th scope="col">Order meja</th>
                                                                             <th scope="col">Jenis masakan/ minuman</th>

                                                                             <th scope="col">Sub total</th>
                                                                             <th scope="col">Status Pembayaran</th>
                                                                      </tr>
                                                               </thead>


                                                 </label>
                                                 <tbody>
                                                        <?php $n = 1; ?>
                                                        <?php foreach ($menu_edit_view as $h) : ?>
                                                               <?php

                                                               $dateString = $h->tanggal;
                                                               $date = date('d F Y', strtotime($dateString));
                                                               ?>
                                                               <tr>
                                                                      <th scope="row"><?php echo $n; ?></th>
                                                                      <td><?= $h->bookingId; ?></td>
                                                                      <td><?= $h->nama_customer; ?></td>
                                                                      <td><?= $date; ?></td>
                                                                      <td>Meja #<?= $h->no_meja; ?></td>
                                                                      <td><?= $h->masakan; ?></td>
                                                                      <td><?= $h->total_harga; ?></td>
                                                                      <td><span class="badge badge-primary"><?= $h->status_pembayaran; ?></span></td>
                                                               </tr>


                                                               <?php $n++; ?>
                                                        <?php endforeach; ?>

                                                 </tbody>
                                                 </table>
                                                 <div class="modal-footer">

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

                                                        // Tampilkan tombol hanya jika variabel flag adalah true
                                                        if ($showButton) {
                                                        ?>
                                                               <button type="submit" onclick="showDiv()" class="btn btn-light circular btn-sm" style="width: 100%; background-color: #D3D342; border-radius: 9px; float: right;">
                                                                      <b>Pembayaran Sekarang</b>
                                                               </button>
                                                        <?php
                                                        }
                                                        // Tampilkan tombol cetak hanya jika variabel flag adalah true
                                                        if ($cetakButton) {
                                                        ?>
                                                               <div class="alert bg-info mb-5 py-3 __button_khas" role="alert" style="width:100%;">
                                                                      <div class="d-flex">
                                                                             <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle">
                                                                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                                             </svg>
                                                                             <div class="px-3">
                                                                                    <h5 class="alert-heading text-white">Transaksi Sukses dan Pembayaran Berhasil dilakukan</h5>
                                                                                    <p>Transaksi dengan no order id <b><?= $h->bookingId; ?></b> telah berhasil dilakukan, Terima kasih</p>


                                                                                    <a href="<?= base_url('Restotr/view_pdf/' . $h->bookingId); ?>" class="btn btn-white mx-1 btn-sm" data-abc="true">
                                                                                           <i class="fa-solid fa-print"></i>
                                                                                           Cetak struk/ bukti bayar

                                                                                    </a>
                                                                             </div>
                                                                      </div>
                                                               </div>



                                                        <?php
                                                        }


                                                        ?>


                                                 </div>

                                                 </form>

                                          </div>


                                   </div>

                            </div>
                     </article>


                     <div id="myDiv" class="mx-auto" style="display: none;">

                            <?php include 'form-bayar.php'; ?>
                     </div>
                     <?php include 'resto-tr.php'; ?>



                     <script>
                            function showDiv() {


                                   var div = document.getElementById("myDiv2");
                                   div.style.display = "none";
                                   var div2 = document.getElementById("myDiv");
                                   div2.style.display = "block";


                            }
                     </script>

                     <script>
                            function <?= $h->id_menu; ?>() {
                                   var title = document.getElementById('inputTitleEdit<?= $h->id_menu; ?>').value;
                                   var slug = slugify(title);
                                   document.getElementById('inputSlugEdit<?= $h->id_menu; ?>').value = slug;
                            }

                            function slugify(text) {
                                   return text.toString().toLowerCase()
                                          .replace(/\s+/g, '-') // Ganti spasi dengan tanda "-"
                                          .replace(/[^\w\-]+/g, '') // Hapus karakter non-alphanumerik kecuali "-"
                                          .replace(/\-\-+/g, '-') // Ganti multiple "-" dengan satu "-"
                                          .replace(/^-+/, '') // Hapus "-" di awal string
                                          .replace(/-+$/, ''); // Hapus "-" di akhir string
                            }
                     </script>