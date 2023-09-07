<!-- Include Dropzone.css -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/min/dropzone.min.css" />

<!-- Include Dropzone.js -->
<script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/min/dropzone.min.js"></script>

<style>
       .upload-form {
              margin-top: 20px;
       }

       .dropzone {
              border: 3px dashed #ccc;
              width: '20%';
              border-radius: 10px;
              padding: 20px;
              text-align: center;
              cursor: pointer;
              background: linear-gradient(to bottom, #fff 0%, #f5f5f5 100%);
       }

       .dropzone.dz-drag-hover {
              border-color: #3498db;
              /* Ubah warna border ketika elemen di-hover */
       }

       .dropzone .dz-message {
              font-size: 1.5em;
              margin-top: 20px;
       }

       /* Additional custom styles can be added here */
</style>

<div class="container col-md-4"><br>
       <div class="container">
              <br>
              <div class="modal-content" style="border-radius: 10px;">
                     <div class="form-group col-md-12"><br><small class="text-dark"><b>
                                          <center>Upload bukti pembayaran Nomor booking <?= $_GET['pembayaran']; ?>
                                          </center>

                                   </b>
                                   <hr>
                            </small>
                            <div class="payment-menu">
                                   <!-- Tambahkan konten untuk menu pembayaran jika diperlukan -->
                            </div>
                            <!-- Form Upload File -->
                            <div class="upload-form">

                                   <small class="text-dark">
                                          <b>
                                                 Lakukan pembayaran ke BNI a/n Retreat
                                                 Nomor rekening 190 192 312 121</b>
                                   </small><br />
                                   <small><i>*) Metode Pembayaran Virtual Account sedang dalam pengembangan, silakan pilih tipe pembayaran</i> <b>Manual Transfer</b></small>

                                   <div class="form-group col-md-12">
                                          <form action="<?php echo site_url('guess/cart'); ?>?pembayaran=<?php echo htmlspecialchars($_GET['pembayaran']); ?>" method="post" enctype="multipart/form-data">

                                                 <div class="form-group col-md-12">
                                                        <br />
                                                        <div class="input-group">
                                                               <select name="status_order_id" class="form-control form-kecil form-sm border-form" id="inputTitle">
                                                                      <option selected disabled>Status pembayaran</option>
                                                                      <option value="5">Panjar 30 %</option>
                                                                      <option value="6">Lunas</option>
                                                                      <!-- Tambahkan opsi lain sesuai kebutuhan -->
                                                               </select>
                                                        </div>
                                                 </div>
                                                 <div class="form-group col-md-12">
                                                        <div class="input-group">
                                                               <select name="tipe_pembayaran" class="form-control form-kecil form-sm border-form" id="inputTitle" onchange="toggleSections(this)">
                                                                      <option selected disabled>Pilih tipe pembayaran</option>
                                                                      <option value="1">Manual transfer (harus konfirmasi)</option>
                                                                      <option value="2">Virtual Account</option>
                                                                      <!-- Tambahkan opsi lain sesuai kebutuhan -->
                                                               </select>
                                                        </div>
                                                 </div>
                                                 <div class="form-group col-md-12" id="uploadSection" style="display: none;">
                                                        <label for="gambar" class="btn btn-outline-green btn-sm" style="width: 100%; border: 2px dashed green;">
                                                               <span id="custom-choose-file">Pilih File Anda</span>
                                                               <input type="file" class="sr-only" name="gambar" id="gambar" />
                                                        </label>
                                                 </div>
                                                 <div class="form-group col-md-12" id="virtualAccountSection" style="display: none;">
                                                        <div class="alert alert-secondary" role="alert" style="border: 2px dashed black;">
                                                               <small>Sedang dalam pengembangan, silakan pilih tipe pembayaran <b>Manual Transfer</b></small>
                                                        </div>
                                                 </div>

                                                 <div class="form-group col-md-12" id="submitButtonSection" style="display: none;">
                                                        <hr />
                                                        <center><small>Pastikan <b>Bukti Pembayaran</b>yang anda upload <b>Benar</b></center>
                                                        <br />
                                                        <button type="submit" style="width: 100%;" class="btn btn-dark btn-sm">Konfirmasi pembayaran</button>
                                                 </div>

                                                 <!-- Menyimpan nama file gambar -->



                                          </form>
                                   </div>
                            </div>
                     </div>
              </div>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
              <script>
                     // Ambil elemen input file dan custom span
                     var input = document.getElementById('gambar');
                     var customChooseFile = document.getElementById('custom-choose-file');

                     // Tambahkan event listener saat file dipilih
                     input.addEventListener('change', function(e) {
                            var fileName = e.target.files[0].name;
                            customChooseFile.innerHTML = fileName;
                     });
              </script>
              <script>
                     function toggleSections(selectElement) {
                            const uploadSection = document.getElementById('uploadSection');
                            const virtualAccountSection = document.getElementById('virtualAccountSection');
                            const submitButtonSection = document.getElementById('submitButtonSection');

                            if (selectElement.value === '1') {
                                   uploadSection.style.display = 'block';
                                   virtualAccountSection.style.display = 'none';
                                   submitButtonSection.style.display = 'block';
                            } else if (selectElement.value === '2') {
                                   uploadSection.style.display = 'none';
                                   virtualAccountSection.style.display = 'block';
                                   submitButtonSection.style.display = 'none';
                            } else {
                                   uploadSection.style.display = 'none';
                                   virtualAccountSection.style.display = 'none';
                                   submitButtonSection.style.display = 'none';
                            }
                     }
              </script>
              <script>
                     $(document).ready(function() {
                            $('form').submit(function() {
                                   var submitBtn = $(this).find('button[type="submit"]');
                                   submitBtn.attr('disabled', 'disabled').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
                                   setTimeout(function() {
                                          // submitBtn.removeAttr('disabled').html('Search...');
                                   }, 5000);
                            });
                     });
              </script>