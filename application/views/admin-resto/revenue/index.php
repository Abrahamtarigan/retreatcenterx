<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container-fluid">
       <br>
       <div class="row">
              <div class="col-lg-3">

                     <b>Laporan restorant </b>
                     <hr>



                     <article class="card-group-item">

                            <div class="filter-content">
                                   <div class="jumbotron">



                                          <i class="fa-solid fa-print"></i>&nbsp;<b>Informasi</b>
                                          <hr>
                                          <small>Untuk melihat dan cetak report per periode yang diingin silahkan klik tombol dibawah</small>
                                          <hr>
                                          <p class="lead">
                                                 <a href="<?= base_url('Rrevenue/search'); ?>" class="btn btn-default rounded text-white btn-sm" style="border-radius:12px;background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);"><i class="fa-solid fa-file-pdf"></i>&nbsp;Buat laporan</a>
                                          </p>



                                   </div>
                                   <!-- <div class="modal-content " style="border-radius:10px;">
                                          <br>




                                   </div> -->
                            </div>
              </div>
              <div class="col-lg-9">
                     <b>Visualisasi grafik terkini</b> <br><small>Visulisasi menggambarkan kondisi real dari transaksi data yang ada</small>
                     <hr>
                     <article class="card-group-item">
                            <div class="form-row">
                                   <div class="col-lg-4">

                                          <i class="fa-solid fa-chart" style="margin-bottom:-10px;"></i>&nbsp;<b>Menu terlaris</b>
                                          <hr>
                                          <canvas id="larisMasakanChart"></canvas>

                                   </div>
                                   <div class="col-lg-8">

                                          <i class=" fa-solid fa-chart" style="margin-bottom:-10px;"></i>&nbsp;<b>Grafik Index Penjualan</b>
                                          <hr>
                                          <canvas id="myChart"></canvas>
                                   </div>

                                   <div class="col-lg-4">

                                          <br>
                                          <div class="card">

                                                 <div class="card-body">
                                                        <b>Total pemasukan hari ini</b>
                                                        <hr>
                                                        <small>Dibawah ini merupakan total pemasukan dari restorant di hari ini</small><br>


                                                        <b>Rp. <?= number_format($total_pemasukan_hari_ini, 0, ',', '.'); ?>,-</b>
                                                 </div>
                                          </div>
                                          <br>
                                          <div class="card">

                                                 <div class="card-body">
                                                        <b>Total pemasukan keseluruhan</b>
                                                        <hr>
                                                        <small>Dibawah ini merupakan total pemasukan dari restorant</small>


                                                        <b>Rp. <?= number_format($totalPemasukan, 0, ',', '.'); ?>,-</b>
                                                 </div>
                                          </div>


                                   </div>
                                   <div class="col-lg-8">
                                          <br>
                                          <i class="fa-solid fa-chart" style="margin-bottom:-10px;"></i>&nbsp;<b>Pendapatan bulanan</b>
                                          <hr>
                                          <canvas id="chartPemasukan"></canvas>
                                          <br>
                                   </div>
                                   <br>


                     </article>
              </div>


              </article> <!-- card-group-item.// -->

              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
              <script>
                     var data = <?php echo json_encode($laris_masakan); ?>;
                     var labels = [];
                     var values = [];

                     data.forEach(function(item) {
                            labels.push(item.masakan);
                            values.push(item.total);
                     });

                     var ctx = document.getElementById('larisMasakanChart').getContext('2d');
                     var chart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                   labels: labels,
                                   datasets: [{
                                          label: 'Laris Masakan',
                                          data: values,
                                          backgroundColor: [
                                                 '#FF6384',
                                                 '#36A2EB',
                                                 '#FFCE56',
                                                 '#8e5ea2',
                                                 '#3cba9f'
                                          ],
                                          borderColor: '#fff',
                                          borderWidth: 1
                                   }]
                            },
                            options: {
                                   responsive: true
                            }
                     });
              </script>

              <script>
                     // Data transaksi dari controller
                     var chartData = <?php echo json_encode($chartData); ?>;

                     // Ambil konteks canvas
                     var ctx = document.getElementById('myChart').getContext('2d');

                     // Siapkan data dan label untuk chart
                     var labels = Object.keys(chartData);
                     var data = Object.values(chartData);

                     // Buat chart dengan Chart.js
                     new Chart(ctx, {
                            type: 'line',
                            data: {
                                   labels: labels,
                                   datasets: [{
                                          label: 'Peningkatan Transaksi Masakan Setiap Bulan',
                                          data: data,
                                          backgroundColor: 'rgba(0, 123, 255, 0.5)',
                                          borderColor: 'rgba(0, 123, 255, 1)',
                                          borderWidth: 1
                                   }]
                            },
                            options: {
                                   responsive: true,
                                   scales: {
                                          x: {
                                                 display: true,
                                                 title: {
                                                        display: true,
                                                        text: 'Bulan Tahun'
                                                 }
                                          },
                                          y: {
                                                 display: true,
                                                 title: {
                                                        display: true,
                                                        text: 'Total Masakan'
                                                 }
                                          }
                                   }
                            }
                     });
              </script>
              <script>
                     // Ambil data dari PHP dan ubah menjadi format JavaScript
                     var dataPemasukan = <?php echo json_encode($pemasukan); ?>;

                     // Ambil bulan dan total pemasukan dari data
                     var labels = [];
                     var pemasukan = [];
                     for (var i = 0; i < dataPemasukan.length; i++) {
                            labels.push(dataPemasukan[i].bulan);
                            pemasukan.push(dataPemasukan[i].total_pemasukan);
                     }

                     // Buat grafik bar chart menggunakan Chart.js
                     var ctx = document.getElementById('chartPemasukan').getContext('2d');
                     var chart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                   labels: labels,
                                   datasets: [{
                                          label: 'Total Pemasukan per Bulan',
                                          data: pemasukan,
                                          backgroundColor: 'rgba(0, 123, 255, 0.7)', // Warna latar belakang bar
                                          borderColor: 'rgba(0, 123, 255, 1)', // Warna border bar
                                          borderWidth: 1
                                   }]
                            },
                            options: {
                                   scales: {
                                          x: {
                                                 display: true,
                                                 title: {
                                                        display: true,
                                                        text: 'Bulan-Tahun'
                                                 }
                                          },
                                          y: {
                                                 display: true,
                                                 title: {
                                                        display: true,
                                                        text: 'Range Pemasukan'
                                                 }
                                          }
                                   }
                            }
                     });
              </script>