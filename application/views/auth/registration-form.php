
<!-- Button trigger modal -->
<div class="container" style="width: 400px;">

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
