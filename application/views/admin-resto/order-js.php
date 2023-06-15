<script>
       document.getElementById('addOrderResto').addEventListener('submit', function(event) {
              event.preventDefault(); // Mencegah form dikirim secara normal

              var addOrder = document.getElementById('addOrder');
              addOrder.disabled = true; // Menonaktifkan tombol
              addOrder.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mohon menunggu ...'; // Mengganti teks tombol dengan indikator loading

              // Mengambil data form dan file gambar yang diunggah
              var formData = new FormData(this);

              // Mengirim permintaan Ajax ke controller untuk menambahkan data
              $.ajax({
                     url: '<?php echo base_url("Adminresto/tambah_order"); ?>',
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