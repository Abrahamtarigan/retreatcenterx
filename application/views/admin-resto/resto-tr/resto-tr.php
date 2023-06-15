<script>
       function hitung() {

              var total = document.getElementById("total").value;
              var total_tanpa_rb = total.replace(/\./g, '');
              document.getElementById("total").value = formatRupiah(total);
              var bayar = document.getElementById("bayar").value;
              var kembalian = parseInt(hapusRupiah(bayar)) - total_tanpa_rb;
              document.getElementById("kembalian").value = formatRupiah(kembalian);
       }

       function formatRupiah(angka) {
              var reverse = angka.toString().split('').reverse().join('');
              var ribuan = reverse.match(/\d{1,3}/g);
              var hasil = ribuan.join('.').split('').reverse().join('');
              return hasil;
       }

       function hapusRupiah(angka) {
              return angka.replace(/[^0-9]/g, '');
       }
</script>
<script>
       var inputMoney = document.getElementById('bayar');

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
       document.getElementById('validasi_transaksi').addEventListener('submit', function(event) {
              event.preventDefault(); // Mencegah form dikirim secara normal

              var submitButton = document.getElementById('validasiOrder');
              submitButton.disabled = true; // Menonaktifkan tombol
              submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mohon menunggu ...'; // Mengganti teks tombol dengan indikator loading

              // Mengambil data form dan file gambar yang diunggah
              var formData = new FormData(this);

              // Mengirim permintaan Ajax ke controller untuk menambahkan data
              $.ajax({
                     url: '<?php echo base_url("Adminresto/validasi_pembayaran"); ?>',
                     type: 'POST',
                     data: formData,
                     contentType: false,
                     processData: false,
                     success: function(response) {
                            // Menangani respons dari server setelah data berhasil ditambahkan
                            console.log(response); // Anda dapat melakukan tindakan lain seperti menampilkan pesan sukses, memperbarui daftar data, dll.
                            document.getElementById("pesan").innerHTML = '<b class="text-primary">Berhasil Validasi data</b>';

                            //submitButton.disabled = false;
                            //submitButton.innerHTML = 'Tutup Modal';
                            setTimeout(function() {
                                   location.reload();
                            }, 4000);

                     }
              });
       });
</script>