<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container-fluid">
       <br>
       <div class="row">
              <div class="col-lg-3">

                     <b>Lihat laporan restorant</b>
                     <hr>



                     <article class="card-group-item">

                            <div class="filter-content">
                                   <div class="jumbotron">



                                          <i class="fa-solid fa-print"></i>&nbsp;<b>Informasi</b>
                                          <hr>
                                          <small>Untuk melihat dan cetak report per periode yang diingin silahkan klik tombol dibawah</small>
                                          <hr>
                                          <p class="lead">
                                                 <a type="button" data-toggle="modal" class="btn btn-default rounded text-white btn-sm" data-target="#modal_tambah_produk" data-whatever="@mdo" style="border-radius:12px;background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);"><i class="fa-solid fa-file-pdf"></i>&nbsp;Laporan</a>
                                          </p>
                                          <a href="#" class="ajaxLink" data-controller="Rrevenue/redirect">Go to Home</a>



                                          <script>
                                                 var base_url = '<?php echo base_url(); ?>'; // Menyimpan base_url dalam variabel JavaScript

                                                 $(document).ready(function() {
                                                        // Menangani klik pada tautan dengan kelas "ajaxLink"
                                                        $('.ajaxLink').click(function(e) {
                                                               e.preventDefault(); // Mencegah perilaku standar klik pada tautan

                                                               var controller = $(this).data('controller');
                                                               var url = base_url + controller;

                                                               // Perbarui URL pada baris alamat
                                                               window.history.pushState({
                                                                      path: url
                                                               }, '', url);

                                                               // Muat konten yang sesuai menggunakan Ajax
                                                               $.ajax({
                                                                      url: url,
                                                                      method: 'GET',
                                                                      success: function(response) {
                                                                             $('#contentContainer').html(response);
                                                                      },
                                                                      error: function(error) {
                                                                             console.log('Error:', error);
                                                                      }
                                                               });
                                                        });

                                                        // Tangani tombol back/forward browser untuk memuat ulang konten yang sesuai
                                                        $(window).on('popstate', function() {
                                                               var url = window.location.pathname.substring(1);

                                                               $.ajax({
                                                                      url: base_url + url,
                                                                      method: 'GET',
                                                                      success: function(response) {
                                                                             $('#contentContainer').html(response);
                                                                      },
                                                                      error: function(error) {
                                                                             console.log('Error:', error);
                                                                      }
                                                               });
                                                        });
                                                 });
                                          </script>
                                   </div>
                                   <div class="modal-content " style="border-radius:10px;">
                                          <br>




                                   </div>
                            </div>
              </div>
              <div class="col-lg-9">
                     <b>Visualisasi grafik terkini</b> <br><small>Visulisasi menggambarkan kondisi real dari transaksi data yang ada</small>
                     <hr>
                     <article class="card-group-item">
                            <div class="form-row">
                                   <div id="contentContainer">
                                          <!-- Konten awal -->
                                   </div>
                                   <div class="col-lg-3">

                                          <div class="jumbotron" style="max-width:400px;">

                                                 <i class="fa-solid fa-print"></i>&nbsp;<b>Informasi</b>
                                                 <hr>
                                                 <small>Untuk melihat dan cetak report per periode yang diingin silahkan klik tombol dibawah</small>
                                                 <hr>
                                                 <p class="lead">
                                                        <a type="button" data-toggle="modal" class="btn btn-default rounded text-white btn-sm" data-target="#modal_tambah_produk" data-whatever="@mdo" style="border-radius:12px;background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);"><i class="fa-solid fa-file-pdf"></i>&nbsp;Laporan</a>
                                                 </p>

                                          </div>
                                   </div>
                                   <div class="col-lg-3">

                                          <div class="jumbotron" style="max-width:400px;">

                                                 <i class="fa-solid fa-print"></i>&nbsp;<b>Informasi</b>
                                                 <hr>
                                                 <small>Untuk melihat dan cetak report per periode yang diingin silahkan klik tombol dibawah</small>
                                                 <hr>
                                                 <p class="lead">
                                                        <a type="button" data-toggle="modal" class="btn btn-default rounded text-white btn-sm" data-target="#modal_tambah_produk" data-whatever="@mdo" style="border-radius:12px;background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);"><i class="fa-solid fa-file-pdf"></i>&nbsp;Laporan</a>
                                                 </p>

                                          </div>
                                   </div>


                     </article>
              </div>

              </article> <!-- card-group-item.// -->
              <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

              <script>
                     // Data untuk chart
                     var data = {
                            labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4'],
                            datasets: [{
                                   data: [30, 25, 15, 30], // Jumlah untuk masing-masing label
                                   backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#63FF84'] // Warna untuk masing-masing label
                            }]
                     };

                     // Opsi chart
                     var options = {
                            responsive: true
                     };

                     // Membuat chart pie
                     var ctx = document.getElementById('pieChart').getContext('2d');
                     new Chart(ctx, {
                            type: 'pie',
                            data: data,
                            options: options
                     });
              </script>
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
              <script>
                     $(document).ready(function() {
                            listKat();

                            // list all user in datatable
                            function listKat() {
                                   $.ajax({
                                          type: 'ajax',
                                          url: '<?php echo base_url('Produkresto/getKategori'); ?>',
                                          async: false,
                                          dataType: 'json',
                                          success: function(data) {
                                                 var html = '';
                                                 var i;
                                                 var no = 1;
                                                 for (i = 0; i < data.length; i++) {
                                                        html +=

                                                               '<p class="badge badge-warning">' + data[i].nama_kategori + '</p>&nbsp;'

                                                        ;
                                                 }
                                                 $('#listkat').html(html);
                                          }

                                   });
                            }
                            document.getElementById('addRestoKategori').addEventListener('submit', function(event) {
                                   event.preventDefault(); // Mencegah form dikirim secara normal

                                   var submitKategori = document.getElementById('submitKategori');
                                   submitKategori.disabled = true; // Menonaktifkan tombol
                                   submitKategori.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mohon menunggu ...'; // Mengganti teks tombol dengan indikator loading

                                   // Mengambil data form dan file gambar yang diunggah
                                   var formData = new FormData(this);

                                   // Mengirim permintaan Ajax ke controller untuk menambahkan data
                                   $.ajax({
                                          url: '<?php echo base_url("Produkresto/tambah_kategori/"); ?>',
                                          type: 'POST',
                                          data: formData,
                                          contentType: false,
                                          processData: false,
                                          success: function(response) {
                                                 // Menangani respons dari server setelah data berhasil ditambahkan
                                                 console.log(response); // Anda dapat melakukan tindakan lain seperti menampilkan pesan sukses, memperbarui daftar data, dll.
                                                 document.getElementById("pesan").innerHTML = '<b class="text-primary">Berhasil menambah kategori</b>';

                                                 //submitKategori.disabled = false;
                                                 //submitKategori.innerHTML = 'Tutup Modal';
                                                 setTimeout(function() {
                                                        // Reset formulir
                                                        $('#addRestoKategori')[0].reset();
                                                        submitKategori.disabled = false;
                                                        submitKategori.innerHTML = 'Simpan Data'
                                                        // submitKategori.removeAttr('disabled').html('Simpan data');
                                                        // Sembunyikan modal
                                                        $('#modal_tambah_kategori').modal('hide');
                                                        listKat();
                                                 }, 2000);


                                          }
                                   });
                            });
                            // show edit modal form with user data
                            $('#listUser').on('click', '.editRecord', function() {
                                   $('#editUserModal').modal('show');
                                   $("#userId").val($(this).data('id'));
                                   $("#usernameEdit").val($(this).data('username'));
                                   $("#emailEdit").val($(this).data('email'));
                            });
                            // save edit record
                            $('#editUserForm').on('submit', function() {
                                   var id = $('#userId').val();
                                   var username = $('#usernameEdit').val();
                                   var email = $('#emailEdit').val();
                                   $.ajax({
                                          type: "POST",
                                          url: "user/update",
                                          dataType: "JSON",
                                          data: {
                                                 id: id,
                                                 username: username,
                                                 email: email
                                          },
                                          success: function(data) {
                                                 $("#userId").val("");
                                                 $("#usernameEdit").val("");
                                                 $('#emailEdit').val("");
                                                 $('#editUserModal').modal('hide');
                                                 listUsers();
                                          }
                                   });
                                   return false;
                            });
                            // show delete modal
                            $('#listUser').on('click', '.deleteRecord', function() {
                                   var UserId = $(this).data('id');
                                   $('#deleteUserModal').modal('show');
                                   $('#deleteUserId').val(UserId);
                            });
                            // delete user record
                            $('#deleteUserForm').on('submit', function() {
                                   var UserId = $('#deleteUserId').val();
                                   $.ajax({
                                          type: "POST",
                                          url: "user/hapus",
                                          dataType: "JSON",
                                          data: {
                                                 id: UserId
                                          },
                                          success: function(data) {
                                                 $("#" + UserId).remove();
                                                 $('#deleteUserId').val("");
                                                 $('#deleteUserModal').modal('hide');
                                                 listUsers();
                                          }
                                   });
                                   return false;
                            });
                     });
              </script>