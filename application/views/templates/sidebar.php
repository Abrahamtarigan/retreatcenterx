<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->

                <li>

                    <!-- User profile -->
                    <!--<div class="user-profile text-center position-relative pt-4 mt-1" >
                        <!-- User profile image -->
                        <!--
                        <div class="m-auto">
                          <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="user" class="rounded-circle" style="height:100px;width:95px;" /> </div>
                        <!-- User profile text-->
                      <!--  <br>
                        <h6><?= $user['name']; ?></h6>


                    </div>-->
                    <!-- End User profile text-->
                </li>

                <!-- User Profile-->
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Dashboard Menu</span>
                </li>

                <?php
                    $role_id = $this->session->userdata('role_id');
                    $this->db->select('*');
                    $this->db->from('user_menu');
                    $this->db->join('user_access_menu', 'user_access_menu.menu_id = user_menu.id');
                    $this->db->where('user_access_menu.role_id', $role_id);
                    $this->db->order_by('user_access_menu.role_id', "asc");
                    $menu = $this->db->get()->result_array();

                    //return $menu->$role_id;

                ?>
                <?php foreach ($menu as $m) : ?>

                <li class="sidebar-item alert-link"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i data-feather="sidebar" class="feather-icon"></i><span class="hide-menu"></span><?= $m['menu']; ?></a>

                    <ul aria-expanded="false" class="collapse  first-level">
                      <?php
                       $menuId = $m['menu_id'];
                      // $role_id = $this->session->userdata('role_id');
                         $this->db->select('*');
                         $this->db->from('user_access_sub_menu');
                         $this->db->join('user_sub_menu', 'user_sub_menu.id = user_access_sub_menu.submenu_id');
                         $this->db->where('user_access_sub_menu.menu_id', $menuId);
                          $this->db->where('user_access_sub_menu.role_id', $role_id);
                         $subMenu = $this->db->get()->result_array();

                   ?>
                      <?php foreach ($subMenu as $sm) : ?>
                        <li class="sidebar-item"><a href="<?= base_url($sm['url']); ?>" class="sidebar-link" style="text-decoration:none;"><i class="mdi mdi-view-quilt"></i><span class="hide-menu"><?= $sm['title']; ?></span></a></li>
                      <?php endforeach;?>
                    </ul>
                </li>
              <?php endforeach;?>
              <hr/>



               

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
      
    </div>
    <!-- End Bottom points-->
</aside>
