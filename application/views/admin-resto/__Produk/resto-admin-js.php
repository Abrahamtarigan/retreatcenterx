<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
<script>
       var editor = new FroalaEditor('#example');
</script>

<script>
       var inputMoney = document.getElementById('inputMoney');

       inputMoney.addEventListener('input', function() {
              // Mengambil nilai teks dari input
              var value = this.value;

              // Menghapus karakter selain angka
              value = value.replace(/[^0-9]/g, '');

              // Mengatur format dengan tanda titik sebagai pemisah ribuan
              value = formatRupiah(value);

              // Menampilkan nilai yang sudah diformat pada input
              this.value = value;
       });

       function formatRupiah(angka) {
              var reverse = angka.toString().split('').reverse().join('');
              var ribuan = reverse.match(/\d{1,3}/g);
              ribuan = ribuan.join('.').split('').reverse().join('');
              return ribuan;
       }
</script>
<script>
       document.getElementById('addMenuResto').addEventListener('submit', function(event) {
              event.preventDefault(); // Mencegah form dikirim secara normal

              var submitButton = document.getElementById('submitButton');
              submitButton.disabled = true; // Menonaktifkan tombol
              submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mohon menunggu ...'; // Mengganti teks tombol dengan indikator loading

              // Mengambil data form dan file gambar yang diunggah
              var formData = new FormData(this);

              // Mengirim permintaan Ajax ke controller untuk menambahkan data
              $.ajax({
                     url: '<?php echo base_url("Produkresto/tambah_menu_resto"); ?>',
                     type: 'POST',
                     data: formData,
                     contentType: false,
                     processData: false,
                     success: function(response) {
                            // Menangani respons dari server setelah data berhasil ditambahkan
                            console.log(response); // Anda dapat melakukan tindakan lain seperti menampilkan pesan sukses, memperbarui daftar data, dll.
                            document.getElementById("pesan").innerHTML = '<b class="text-primary">Berhasil menambahkan data</b>';

                            //submitButton.disabled = false;
                            //submitButton.innerHTML = 'Tutup Modal';
                            setTimeout(function() {
                                   location.reload();
                            }, 4000);

                     }
              });
       });
</script>
<script>
       document.getElementById('editMenuResto').addEventListener('submit', function(event) {
              event.preventDefault(); // Mencegah form dikirim secara normal

              var submitButton = document.getElementById('updateButtonProduk');
              submitButton.disabled = true; // Menonaktifkan tombol
              submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mohon menunggu ...'; // Mengganti teks tombol dengan indikator loading

              // Mengambil data form dan file gambar yang diunggah
              var formData = new FormData(this);

              // Mengirim permintaan Ajax ke controller untuk menambahkan data
              $.ajax({
                     url: '<?php echo base_url("Produkresto/proses_update/"); ?>',
                     type: 'POST',
                     data: formData,
                     contentType: false,
                     processData: false,
                     success: function(response) {
                            // Menangani respons dari server setelah data berhasil ditambahkan
                            console.log(response); // Anda dapat melakukan tindakan lain seperti menampilkan pesan sukses, memperbarui daftar data, dll.
                            document.getElementById("pesan").innerHTML = '<b class="text-primary">Berhasil update data</b>';

                            //submitButton.disabled = false;
                            //submitButton.innerHTML = 'Tutup Modal';
                            setTimeout(function() {
                                   location.reload();
                            }, 4000);

                     }
              });
       });
</script>
<!-- add menu kategory resto -->

<!-- <script>
    $(document).ready(function () {
        // Pembaruan data table saat tombol refresh diklik
        $('#refreshButton').click(function () {
            $.ajax({
                url: '<?php echo site_url("Produkresto/auto_refresh"); ?>', // Ganti dengan URL yang sesuai dengan metode controller Anda
                type: 'GET',
                dataType: 'html',
                success: function (response) {
                    $('#menadata').html(response);
                    // Memperbarui isi data table dengan respons dari server
                },
                error: function (xhr, status, error) {
                    console.log('AJAX error: ' + error); // Menampilkan pesan error jika terjadi kesalahan AJAX
                }
            });
        });

        // Pembaruan data table secara otomatis setiap beberapa detik
        setInterval(function () {
            $('#refreshButton').click();
        }, 2000); // Pembaruan setiap 5 detik (5000 milidetik)
    });
</script> -->
<link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
<script>
       new FroalaEditor('textarea#froala-editor')
</script>
<script>
       function generateSlug() {
              var title = document.getElementById('inputTitle').value;
              var slug = slugify(title);
              document.getElementById('inputSlug').value = slug;
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