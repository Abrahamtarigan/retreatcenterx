
<div class="container ">
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<?php if ($this->session->flashdata('flash')) : ?>
<!-- <div class="row mt-3">
    <div class="col-md-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div> -->
<?php endif; ?>

<div class="row mt-3 " >
    <div class="col-md-6">

            
            <img style="height:300px;" src="<?= base_url('assets/image-dashboard/cover-login.jpeg');?>">
        
        <br/>
    
    </div>
    <div class="col-md-6">
            <h2>Verifikasi Akun</h2>
            <hr/>
            <form action="<?= base_url('auth/login/'); ?>" method="POST" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Email yang terdaftar</label>
                    <input type="text" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email yang terdaftar">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
              
             
                <label for="exampleInputPassword1">Silahkan Cek Ketentuan Verifikasi Akun<a href="">Disini</a></label>
                <hr/>
                
                <button type="submit" class="btn btn-primary" style="float: left;">Verifikasi Akun anda</button>&nbsp;
                
                </form>
            
    </div>
    
</div>



</div>

