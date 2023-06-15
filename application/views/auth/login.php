
<div class="login-pop" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php if ($this->session->flashdata('message')) : ?>




<?php endif; ?>
<div class="logout-pop" data-flashdata="<?= $this->session->flashdata('message-sign-out'); ?>"></div>
<?php if ($this->session->flashdata('message-sign-out')) : ?>




<?php endif; ?>

<!-- Button trigger modal -->
<div class="container" style="width: 400px;">

    <br />

    

        
       
            <h2>Login</h2>
            <hr />
            <form action="<?= base_url('auth/loginProses/'); ?>" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="userEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Email anda">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="userPassword" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password anda disini">
                </div>
                <hr />
                <label for="exampleInputPassword1">Klik disini untuk <a href="">Lupa Password</a></label>
                <div class="mb-3 pb-1">
                    <button type="submit" class="btn btn-warning btn-md btn-block rounded-xs font-weight-bold transition-3d-hover">Login Sekarang&nbsp;<i class="fa-solid fa-arrow-right"></i></button>
                </div>
                <div class="mb-3 pb-1">
                    <a href=<?= base_url('auth/regis');?> type="submit" class="btn btn-primary btn-md btn-block rounded-xs font-weight-bold transition-3d-hover"><i class="fa-solid fa-user-plus"></i>&nbsp;Registrasi Manual</a>
                </div>
                <center><label for="exampleInputPassword1">atau</label></center>
                <div class="mb-3 pb-1">
                    <a href="<?= base_url('auth/google_regis');?>" class="btn btn-danger text-white btn-block "><i class="lni lni-google"></i> Daftar/Login dengan Google</a>
                </div>
            </form>

    



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