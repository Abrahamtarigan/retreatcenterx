<!-- Button trigger modal -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
<div class="container">
    <br>
    <br>
    <div class="row">

        <div class="col-lg-8">
            <article class="card-group-item">
                <div class="col-lg-12">

                    <div class="container">
                        <img style="width:100%; border-radius:8px;" src="<?= base_url('upload/slide/slide1.png'); ?>" alt="Gambar Hotel XYZ">
                        <br><br>
                        <h5 class="mt-0 text-left"><b>Bagaimana kami menyimpan data anda</b></h5>
                        <hr>
                        <p class="text-left"><small>Dengan pengalaman maksimal kami dalam melayani tamu dengan harga yang rendah, kami menawarkan beberapa layanan</small></p>
                        <!-- <div class="modal-content" style="border-radius:10px;">
                            <div class="form-group col-md-12 ">
                                <br>
                                <b style="float:left;"><span class="logo"><i class="fa-solid fa-headset"></i></span>&nbsp;&nbsp;&nbsp;Hubungi cepat :</b>
                                <br>
                                <hr>
                                <li><small>Whatsapp : <b>+62 813 890 900</b></small></li>
                                <li><small>Email : <b>infopromo@retreatcenter.id</b></small></li>


                            </div>
                        </div> -->


                    </div>

                </div>



        </div>
        <div class="col-lg-4">






            <article class="card-group-item">

                <div class="modal-content " style="border-radius:10px;">
                    <div class="form-group col-md-12 ">
                        <br>
                        <b>Daftar Sekarang</b>
                        <hr>
                        <small id="validationMessage" class="text-danger pl-3" ></small>
                        <!-- Datepicker Check-in -->
                        <form action="" method="POST" enctype="multipart/form-data" id="myForm">
                            <div class="form-group">
                                <label for="check-in"><small><b>Nama lengkap</b></small></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text form-control-sm">
                                            <i class="fa-solid fa-hand text-black"></i>
                                        </span>
                                    </div>
                                    <input nama="userNama" id="userNama" class="form-control form-control-sm" type="text" placeholder="Masukkan nama lengkap kamu">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="check-in"><small><b>Email </b></small></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text form-control-sm">
                                            <i class="fa-solid fa-envelope text-black"></i>
                                        </span>
                                    </div>
                                    <input nama="userEmail" id="userEmail" class="form-control form-control-sm" type="email" placeholder="Masukkan email kamu">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="check-in"><small><b>Password/ Sandi</b></small></label>
                                <div class="input-group">
                                    <input id="password1" name="password1" class="form-control form-control-sm" type="password" placeholder="Ketikkan sandi baru kamu">
                                    <span id="togglePassword" class="input-group-append">
                                        <span class="input-group-text form-control-sm">
                                            <i id="eyeIcon" class="fa-solid fa-eye text-black"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="check-in"><small><b>Konfirmasi Password/ Sandi</b></small></label>
                                <div class="input-group">
                                    <input id="password2" name="password2" class="form-control form-control-sm" type="password" placeholder="Konfirmasi sandi baru kamu">
                                    <span id="togglePassword2" class="input-group-append">
                                        <span class="input-group-text form-control-sm">
                                            <i id="eyeIcon2" class="fa-solid fa-eye text-black"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="check-in"><small><b>No Telepon/ handphone</b></small></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text form-control-sm">
                                            <i class="fa-solid fa-phone-volume text-black"></i>
                                        </span>
                                    </div>
                                    <input nama="userNoTelepon" id="userNoTelepon" class="form-control form-control-sm" type="text" placeholder="Masukkan no telepon kamu">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" style="width:100%; border-radius:8px;background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);float:left;">Daftar akun baru</button>
                                <small id="validationMessage" class="text-danger pl-3"></small>
                            </div>
                        </form>



                    </div>


                </div>
                <br>


            </article>
        </div>
    </div>

    <br />

    <?= $this->session->flashdata('message'); ?>



    <h2>Registrasi</h2>
    <hr />
    <form action="<?= base_url('auth/regis/'); ?>" method="POST">
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="userNama" name="userNama" placeholder="Masukkan nama anda" value="<?= set_value('userNama'); ?>">
            <?= form_error('userNama', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <input type="email" class="form-control form-control-user" id="userEmail" name="userEmail" placeholder="Masukkan alamat email" value="<?= set_value('userEmail'); ?>">
            <?= form_error('userEmail', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-sm-6">
                <input type="password" class="form-control form-control-user" id="password2" name="userPassword" placeholder="Konfirmasi password">
            </div>
        </div>
        <div class="form-group">
            <input type="number" class="form-control form-control-user" id="userNoTelepeon" name="userTelepon" placeholder="Masukkan nomor telepon anda" value="<?= set_value('userEmail'); ?>">
            <?= form_error('userNoTelepon', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <hr />

        <div class="mb-3 pb-1">
            <button type="submit" class="btn btn-warning btn-md btn-block rounded-xs font-weight-bold transition-3d-hover">Daftar</button>
        </div>

    </form>










    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script type="text/javascript">
        const flashData = $('.login-pop').data('flashdata');
        const berhasil = $('.logout-pop').data('flashdata');

        if (flashData) {
            Swal({
                title: 'Gagal Login',
                text: flashData,
                type: 'success'

            });
        }
        if (berhasil) {
            Swal({
                title: 'Anda Telah Keluar',
                text: berhasil,
                type: 'success',
                timer: 3000,
                timerProgressBar: true,
                onBeforeOpen: () => {
                    Swal.showLoading()

                },



            });
        }
    </script>
    <script>
        var togglePassword = document.getElementById("togglePassword");
        var eyeIcon = document.getElementById("eyeIcon");
        var passwordInput1 = document.getElementById("password1");
        var togglePassword2 = document.getElementById("togglePassword2");
        var eyeIcon2 = document.getElementById("eyeIcon2");
        var passwordInput2 = document.getElementById("password2");


        togglePassword.addEventListener("click", function() {
            if (passwordInput1.type === "password") {
                passwordInput1.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput1.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        });
        togglePassword2.addEventListener("click", function() {
            if (passwordInput2.type === "password") {
                passwordInput2.type = "text";
                eyeIcon2.classList.remove("fa-eye");
                eyeIcon2.classList.add("fa-eye-slash");
            } else {
                passwordInput2.type = "password";
                eyeIcon2.classList.remove("fa-eye-slash");
                eyeIcon2.classList.add("fa-eye");
            }
        });
    </script>
    <script>
        document.getElementById("myForm").addEventListener("submit", function(event) {
            event.preventDefault();

            var userNama = document.getElementById("userNama").value.trim();
            var userEmail = document.getElementById("userEmail").value.trim();
            var password1 = document.getElementById("password1").value;
            var password2 = document.getElementById("password2").value;
            var userNoTelepon = document.getElementById("userNoTelepon").value.trim();

            // Validasi Nama Lengkap
            if (userNama === "") {
                document.getElementById("validationMessage").innerHTML = "Silakan masukkan nama lengkap Anda.";
                return;
            }

            // Validasi Email
            if (userEmail === "") {
                document.getElementById("validationMessage").innerHTML = "Silakan masukkan email Anda.";
                return;
            }

            // Validasi Password
            if (password1 === "" || password2 === "") {
                document.getElementById("validationMessage").innerHTML = "Silakan masukkan password Anda dan konfirmasi password.";
                return;
            }

            if (password1 !== password2) {
                document.getElementById("validationMessage").innerHTML = "Password dan konfirmasi password tidak cocok.";
                return;
            }

            // Validasi No Telepon
            if (userNoTelepon === "") {
                document.getElementById("validationMessage").innerHTML = "Silakan masukkan nomor telepon Anda.";
                return;
            }

            // Submit form jika validasi sukses
            this.submit();
        });
    </script>