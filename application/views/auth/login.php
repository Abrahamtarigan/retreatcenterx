<div class="login-pop" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php if ($this->session->flashdata('message')) : ?>




<?php endif; ?>
<div class="logout-pop" data-flashdata="<?= $this->session->flashdata('message-sign-out'); ?>"></div>
<?php if ($this->session->flashdata('message-sign-out')) : ?>




<?php endif; ?>
<!-- Button trigger modal -->
<style>
    .login-with-google-btn {
        transition: background-color .3s, box-shadow .3s;

        padding: 12px 16px 12px 42px;
        border: none;
        border-radius: 3px;
        box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 1px 1px rgba(0, 0, 0, .25);

        color: #757575;
        font-size: 14px;
        font-weight: 500;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;

        background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNMTcuNiA5LjJsLS4xLTEuOEg5djMuNGg0LjhDMTMuNiAxMiAxMyAxMyAxMiAxMy42djIuMmgzYTguOCA4LjggMCAwIDAgMi42LTYuNnoiIGZpbGw9IiM0Mjg1RjQiIGZpbGwtcnVsZT0ibm9uemVybyIvPjxwYXRoIGQ9Ik05IDE4YzIuNCAwIDQuNS0uOCA2LTIuMmwtMy0yLjJhNS40IDUuNCAwIDAgMS04LTIuOUgxVjEzYTkgOSAwIDAgMCA4IDV6IiBmaWxsPSIjMzRBODUzIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNNCAxMC43YTUuNCA1LjQgMCAwIDEgMC0zLjRWNUgxYTkgOSAwIDAgMCAwIDhsMy0yLjN6IiBmaWxsPSIjRkJCQzA1IiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNOSAzLjZjMS4zIDAgMi41LjQgMy40IDEuM0wxNSAyLjNBOSA5IDAgMCAwIDEgNWwzIDIuNGE1LjQgNS40IDAgMCAxIDUtMy43eiIgZmlsbD0iI0VBNDMzNSIgZmlsbC1ydWxlPSJub256ZXJvIi8+PHBhdGggZD0iTTAgMGgxOHYxOEgweiIvPjwvZz48L3N2Zz4=);
        background-color: white;
        background-repeat: no-repeat;
        background-position: 12px 11px;

        &:hover {
            box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 2px 4px rgba(0, 0, 0, .25);
        }

        &:active {
            background-color: #eeeeee;
        }

        &:focus {
            outline: none;
            box-shadow:
                0 -1px 0 rgba(0, 0, 0, .04),
                0 2px 4px rgba(0, 0, 0, .25),
                0 0 0 3px #c8dafc;
        }

        &:disabled {
            filter: grayscale(100%);
            background-color: #ebebeb;
            box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 1px 1px rgba(0, 0, 0, .25);
            cursor: not-allowed;
        }
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
<div class="container">
    <br>
    <br>
    <div class="row">

        <div class="col-lg-8">
            <article class="card-group-item">
                <div class="col-lg-12">

                    <div class="container">
                        <br><br><br>
                        <img style="width:100%; border-radius:8px;" src="<?= base_url('upload/slide/slide1.png'); ?>" alt="Gambar Hotel XYZ">
                        <br><br><br><br><br>
                        <!-- <h5 class="mt-0 text-left"><b>Bagaimana kami menyimpan data anda</b></h5>
                        <hr>
                        <p class="text-left"><small>Dengan pengalaman maksimal kami dalam melayani tamu dengan harga yang rendah, kami menawarkan beberapa layanan</small></p> -->
                        <br><br><br><br>
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
                        <b>Login ...</b>
                        <hr>

                        <form action="<?= base_url('auth/loginProses/'); ?>" method="POST">

                            <div class="form-group">
                                <label for="check-in"><small><b>E-mail</b></small></label>
                                <input type="text" name="userEmail" id="userEmail" class="form-control form-control-sm" placeholder="cth. mailku@mail.com" style="border-radius:6px;" required>
                                <?= form_error('userEmail', '<small class="text-danger" style="font-weight:bold;">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="userPassword"><small><b>Password / sandi</b></small></label>
                                <div class="input-group">
                                    <input id="userPassword" name="userPassword" class="form-control form-control-sm" type="password" placeholder="masukkan sandi atau passwod kamu">
                                    <span class="input-group-append">
                                        <button class="btn btn-outline-dark toggle-password btn-sm" type="button"><i id="eyeIcon2" class="fa-solid fa-eye-slash"></i></button>
                                    </span>
                                </div>
                            </div>




                            <center>
                                <button type="submit" id="buttonRegist" class="btn btn-primary btn-sm" style="width:60%; border-radius:8px;background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);margin-bottom:10px;">Login sekarang</button>
                            </center>
                            <center>
                                <a href="<?= base_url('auth/google_regis'); ?>" class="login-with-google-btn btn btn-light" style="width:60%; border-radius:8px;">

                                    Sign in with Google
                                </a>
                            </center>
                            <center> <label for="exampleInputPassword1"><small><a href=""><b>Lupa Password ? klik disini</b></a></small></label></center>

                            <center> <label for="exampleInputPassword1"><small><a href="<?= base_url('register'); ?>"><b>
                                                <u>Daftar akun baru</u>
                                            </b></a></small></label></center>




                        </form>





                    </div>
                </div>
            </article>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script type="text/javascript">
    const flashData = $('.login-pop').data('flashdata');
    const berhasil = $('.logout-pop').data('flashdata');

    if (flashData) {
        Swal({
            title: 'Gagal Login',
            text: flashData,
            type: 'error'

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
    $(document).ready(function() {
        $(".toggle-password").on("click", function() {
            var field = $(this).closest(".input-group").find(".form-control");
            $(this).find("i").toggleClass("fa-eye fa-eye-slash");
            if (field.attr("type") === "password") {
                field.attr("type", "text");
            } else {
                field.attr("type", "password");
            }
        });
    });
</script>