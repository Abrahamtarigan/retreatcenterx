<div class="col-lg-3">
    <br>
    <b>Master Data Restaurant</b>
    <hr>



    <article class="card-group-item">

        <div class="filter-content">
            <div class="jumbotron">



                <i class="fa-solid fa-microphone"></i>&nbsp;<b>Informasi</b>
                <hr>
                <small>Silahkan gunakan menu dibawah ini untuk menambah Daftar Menu, dan Kategori Menu</small>
                <hr>
                <p class="lead">
                    <a type="button" data-toggle="modal" class="btn btn-default rounded text-white btn-sm" data-target="#modal_tambah_produk" data-whatever="@mdo" style="border-radius:12px;background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);">Tambah menu</a>
                </p>


            </div>
            <div class="modal-content " style="border-radius:10px;">
                <br>
                <div class="container">
                    <i class="fa-solid fa-eye"></i>&nbsp;<b>Kategori Produk</b>
                    <hr>
                    <p class="badge badge-dark" data-toggle="modal" class="btn btn-default rounded text-white btn-sm" data-target="#modal_tambah_kategori" data-whatever="@mdo"><i class="fa-solid fa-plus"></i> Tambah kategori</p>
                    <div id="listkat">


                    </div>


                    <!-- Untuk menampilkan datanya, menggunakan JQuery + AJAX -->
                </div>



            </div>
        </div>
</div>

</article> <!-- card-group-item.// -->
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