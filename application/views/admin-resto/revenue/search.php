<div class="menu-berhasil-pop" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php if ($this->session->flashdata('message')) : ?>

<?php endif; ?>



<div class="container">

       <br>
       <div id="basicsAccordion">


              <!-- Card -->
              <div class="card mb-3">
                     <div class="card-header card-collapse  text-white" id="basicsHeadingTwo" style="background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);">
                            <h5 class="mb-0">
                                   <button type="button" class="btn btn-link btn-block d-flex justify-content-between card-btn collapsed p-3 " data-toggle="collapse" data-target="#basicsCollapseTwo" aria-expanded="false" aria-controls="basicsCollapseTwo">
                                          <b style="color:white">Filter Pencarian ... <a href="<?= base_url('Rrevenue/search'); ?>">Reset Filter</a>
                                                 <br></b>


                                          <span class="card-btn-arrow" style="color:white">
                                                 <span class="fas fa-arrow-down small"></span>
                                          </span>
                                   </button>
                            </h5>
                     </div>
                     <div id="basicsCollapseTwo" class="collapse" aria-labelledby="basicsHeadingTwo" data-parent="#basicsAccordion">
                            <div class="card-body">
                                   <form method=" get" action="">
                                          <label for="inputPassword4" style="float:left;"><b>Cari berdasarkan</b></label>
                                          <select class="form-control form-sm" id="xfil" name="xfil" onchange="Div()">
                                                 <option value="">Pilih</option>
                                                 <option value="1">Per Tanggal</option>
                                                 <option value="2">Per Bulan</option>
                                                 <option value="3">Per Tahun</option>
                                          </select><br>
                                          <div id="tanggal" style="display: none">
                                                 <label for="inputPassword4" style="float:left;"><b>Tanggal</b></label><br>
                                                 <input class="js-range-datepicker form-control input-tanggal u-datepicker input-group " type="date" name="tanggal" aria-label="Pilih tanggal" data-rp-wrapper="#datepickerWrapperFrom" data-rp-date-format="d/m/Y" />



                                                 <!-- <input class="form-control bg-transparent rounded-right" type="date" name="tanggal" id="tanggal" placeholder="From" aria-label="Pilih tanggal" data-rp-date-format="d/m/Y"> -->



                                          </div>
                                          <div id="bulan" style="display: none">
                                                 <label for="inputPassword4" style="float:left;"><b>Bulan</b></label>
                                                 <select class="form-control" name="bulan">
                                                        <option value="">Pilih</option>
                                                        <option value="1">Januari</option>
                                                        <option value="2">Februari</option>
                                                        <option value="3">Maret</option>
                                                        <option value="4">April</option>
                                                        <option value="5">Mei</option>
                                                        <option value="6">Juni</option>
                                                        <option value="7">Juli</option>
                                                        <option value="8">Agustus</option>
                                                        <option value="9">September</option>
                                                        <option value="10">Oktober</option>
                                                        <option value="11">November</option>
                                                        <option value="12">Desember</option>
                                                 </select>

                                          </div>
                                          <div id="tahun" style="display: none">
                                                 <label for="inputPassword4" style="float:left;"><b>Tahun</b></label>
                                                 <select class="form-control" name="tahun">
                                                        <option value="">Pilih</option>
                                                        <?php
                                                        $currentYear = date('Y');

                                                        for ($i = 2022; $i <= $currentYear; $i++) {
                                                               echo '<option value="' . $i . '">' . $i . '</option>';
                                                        }
                                                        ?>
                                                 </select>

                                          </div>

                                          <div>
                                                 <br>

                                                 <button type="submit" class="btn btn-primary btn-sm" style=" border-radius:px;background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);float:left;"> Lakukan Pencarian</button>

                                          </div>



                                   </form>

                            </div>
                            <br><br>
                     </div>
              </div>

       </div>


       <div class="modal-content " style="border-radius:10px;">
              <div class="form-group col-md-12 ">
                     <br>
                     <b><?php echo $ket; ?></b><br />
                     <a class="btn btn-outline-secondary-btn-lg badge badge-danger" href="<?php echo $url_cetak; ?>">CETAK PDF</a><br /><br />

                     <table id="menadata" class="table table-striped">
                            <thead>
                                   <tr>
                                          <th>No.</th>
                                          <th>Order id</th>
                                          <th>Customer</th>
                                          <th>Status Transaksi</th>
                                          <th>Tanggal order</th>
                                          <th>Subtotal</th>




                                   </tr>
                            </thead>

                            <tbody>
                                   <?php
                                   if (!empty($transaksi)) {
                                          $no = 1;
                                          foreach ($transaksi as $data) {
                                                 $tgl = date('d M Y', strtotime($data->tanggal));

                                                 echo "<tr>";
                                                 echo "<th>$no</th>";
                                                 echo "<td>" . $data->bookingId . "</td>";
                                                 echo "<td>" . $data->nama_customer . "</td>";

                                                 echo "<td>" . $data->status_pembayaran . "</td>";

                                                 echo "<td>" . $tgl . "</td>";
                                                 echo "<td>" . $data->total_harga . "</td>";



                                                 echo "</tr>";
                                                 $no++;
                                          }
                                   }
                                   ?>

                            </tbody>



                     </table>
                     <span style="">Total Pemasukan&nbsp;<?php echo $ket; ?></span>
                     <hr />
                     <h2> <span style="font-weight:bold;" id="val"></span></h2>

              </div>
       </div>
       <script>
              var table = document.getElementById("menadata"),
                     sumVal = 0;

              for (var i = 1; i < table.rows.length; i++) {
                     sumVal = sumVal + parseInt(table.rows[i].cells[5].innerHTML);
              }

              document.getElementById("val").innerHTML = "Rp. " + sumVal.toLocaleString();
              console.log(sumVal);
       </script>


       </body>

       <script src="<?= base_url('assets/'); ?>vendor/flatpickr/dist/flatpickr.min.js"></script>
       <script src="<?= base_url('assets/'); ?>js/components/hs.range-datepicker.js"></script>
       <script>
              $(document).on('ready', function() {
                     // initialization of range datepicker
                     $.HSCore.components.HSRangeDatepicker.init('.js-range-datepicker');
              });
       </script>
       <script>
              function Div() {

                     if (xfil.value == 1) {
                            tanggal.style.display = 'block';
                            bulan.style.display = 'none';
                            tahun.style.display = 'none';
                     } else if (xfil.value == 2) {
                            bulan.style.display = 'block';
                            tahun.style.display = 'block';
                            tanggal.style.display = 'none';
                     } else if (xfil.value == 3) {
                            tahun.style.display = 'block';
                            bulan.style.display = 'none';
                            tanggal.style.display = 'none';
                     }

              }
       </script>
       <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
       <!-- <script src="<?= base_url('assets/'); ?>jquery.tableTotal.js"></script>
    <script>
    $('#example').tableTotal();
    
</script> -->

       </html>


       <script>
              $(document).ready(function() {
                     $('form').submit(function() {
                            var submitBtn = $(this).find('button[type="submit"]');
                            submitBtn.attr('disabled', 'disabled').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
                            setTimeout(function() {
                                   // submitBtn.removeAttr('disabled').html('Search...');
                            }, 2000);
                     });
              });
       </script>
       <script>
              $(document).ready(function() {
                                   $('#example').DataTable({

                                   });
       </script>
       <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
       <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
       <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
       <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
       <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>