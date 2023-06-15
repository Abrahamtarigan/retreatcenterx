
<div class="container ">
  <br>
  <h2><?= $title; ?> <?= $user['userNama']; ?>
  
  
  

<svg style="float:right;position:absolute; margin:7px;"xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-list hidden visible-xs" viewBox="0 0 16 16" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
</svg>


    
  </h2>
  <hr>
  <div class="row " style="width:100%;">
    <aside class="col-sm-3 collapse dont-collapse-sm" id="collapseExample">

<?php
$role_id = $this->session->userdata('role_id');
$this->db->select('*');
$this->db->from('user_menu');
$this->db->join('user_access_menu', 'user_access_menu.menu_id = user_menu.menuId');
$this->db->where('user_access_menu.role_id', $role_id);
$this->db->order_by('user_access_menu.role_id', "asc");
$menu = $this->db->get()->result_array();

//return $menu->$role_id;

?>  



    <article class=" card-group-item ">
      <header class=" card-header alert alert-primary border border-warning rounded-pill">
    <h6 class="title">
      
      <?php 
          // jika tidak login menggunakan google 
          if(!$user['userGoogleId'] == null) { ?>

        <img class="rounded-circle" style="height:28px;width:28px;" src="<?= $user['image'];?>" alt="avatar">&nbsp;
        <a type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none;color:black"><?= $user['userNama']; ?>&nbsp;
        <?php } else { ?>
          <img class="avatar-img rounded-circle shadow" style="height:28px;width:28px;" src="https://ui-avatars.com/api/?name=<?= $user['userNama']; ?>" alt="avatar">&nbsp;
          <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none;color:black"><?= $user['userNama']; ?>
          <?php } ?>
   
          <!-- untuk mengambil dropdown profile -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#" style="font-weight:bold;">Profil Pengguna</a>
            <a class="dropdown-item" href="#" style="font-weight:bold;">Ubah Password</a>
            <a class="btn btn-outline-secondary btn btn-sm dropdown-item" href="<?= base_url('auth/logout'); ?>">Logout</a>
          </div>
        <!-- -->
        
        </a> </h6>
    </header>
      </article> <!-- card-group-item.// -->



    <?php foreach ($menu as $m) : ?>
	  <article class=" card-group-item ">
      
      <header class=" card-header ">
        
        <h6 class=" title">
          <i class="fas fa-chevron-right" style="float:right;"></i>
          <a href="<?= base_url(); ?><?= $m['menu_url']; ?>" style="text-decoration: none;color:black"><?= $m['icon'];  ?>&nbsp;<?= $m['title'];  ?> 
        </a> 
      </h6>
      </header>
      </article> <!-- card-group-item.// -->
      
    <?php endforeach; ?>
    <br>
    <center>
    <a href="<?= base_url();?>" style="width: 100%"  class=" btn btn-dark text-warning"></i>Kembali Ke Beranda</a>
    </center>
    <br>
    <br>
    </aside> <!-- col.// -->
    