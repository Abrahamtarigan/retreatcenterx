
<div class="container">
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

    <div class="row mt-3" >
        <div class="col-md-6">

                
                <img style="height:300px;" src="<?= base_url('assets/image-dashboard/cover-login.jpeg');?>">
            <?php if (empty($news)) : ?>
                <div class="alert alert-danger" role="alert">
                data mahasiswa tidak ditemukan.
                </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php foreach ($news as $nw) : ?>
                <li class="list-group-item">
                    <?= $nw['news_title']; ?>
                    <a href="<?= base_url(); ?>news/hapus/<?= $nw['id']; ?>"
                        class="badge badge-danger float-right tombol-hapus">hapus</a>
                    <a href="<?= base_url(); ?>news/ubah/<?= $nw['id']; ?>"
                        class="badge badge-success float-right">ubah</a>
                    <a href="<?= base_url(); ?>news/detail/<?= $nw['id']; ?>"
                        class="badge badge-primary float-right"> ! Lihat</a>
                </li>
                <?php endforeach; ?>
            </ul>
            <br/>
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari data mahasiswa.." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
                <h2>Login</h2>
                <hr/>
                <form action="<?= base_url('auth/login/'); ?>" method="POST" >
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Induk Penduduk</label>
                        <input type="text" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nomor Induk Penduduk anda disini">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password"  class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password anda disini">
                    </div>
                    <hr/>
                    <label for="exampleInputPassword1">Belum memiliki akun <a href="">Silahkan Mendaftar</a> dan 
                    klik  untuk <a href="">Lupa Password</a></label>
                    <button type="submit" class="btn btn-primary" style="float: left;">Login Disini</button>&nbsp;
                    
                    
                    </form>
                
        </div>
        
    </div>

    

</div>

