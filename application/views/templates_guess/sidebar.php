<div class="container">
       <br><br>
       <div class="row">

              <div class="col-lg-3">






                     <article class="card-group-item">

                            <div class="modal-content " style="border-radius:10px;">
                                   <div class="form-group col-md-12 ">
                                          <br>
                                          <b>
                                                 Hi, <?= $user['userNama']; ?>
                                          </b>
                                          <hr>
                                          <!-- Datepicker Check-in -->
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
                                          <?php foreach ($menu as $m) : ?>
                                          <article class=" card-group-item ">



                                                 <small><b>
                                                               <i class="fas fa-chevron-right" style="float:right;"></i>
                                                               <a class="text-dark"
                                                                      href="<?= base_url(); ?><?= $m['menu_url']; ?>"
                                                                      style="text-decoration: none;"><?= $m['icon'];  ?>&nbsp;<?= $m['title'];  ?>
                                                               </a></b>
                                                 </small>


                                          </article> <!-- card-group-item.// -->
                                          <br>
                                          <?php endforeach; ?>
                                          <hr />
                                          <small><b>
                                                        <i class="fas fa-chevron-right" style="float:right;"></i>
                                                        <a class="text-dark" href="<?= base_url(); ?>"
                                                               style="text-decoration: none;"><i
                                                                      class="fa-solid fa-gear"></i>
                                                               Profile </a></b>
                                          </small>


                                   </div>
                                   <br>
                                   <!-- <div class=" modal-content" style="border-radius:10px;">
                                                        <div class="form-group col-md-12 ">
                                                               <br>
                                                               <b style="float:left;"><span class="logo"><i
                                                                                    class="fa-solid fa-headset"></i></span>&nbsp;&nbsp;&nbsp;Hubungi
                                                                      cepat :</b>
                                                               <br>
                                                               <hr>
                                                               <li><small>Whatsapp : <b>+62 813 890 900</b></small></li>
                                                               <li><small>Email :
                                                                             <b>infopromo@retreatcenter.id</b></small>
                                                               </li>


                                                        </div>
                                   </div> -->

                     </article>
              </div>