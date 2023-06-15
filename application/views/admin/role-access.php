<div class="role-berhasil-pop" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php if ($this->session->flashdata('message')) : ?>

<?php endif; ?>

<aside class="col-sm-9">
       <div class="container">
              <h3>Setting Rule Manager
              </h3>
              <small>Silahkan Gunakan halaman ini untuk mengubah akses rule </small>
              <hr />
              <table id="menadata" class="display">

                     <?= $this->session->flashdata('message'); ?>

                     <thead>
                            <tr>
                                   <th scope="col">Menu</th>
                                   <th scope="col">Check</th>

                            </tr>
                     </thead>
                     <tbody>

                            <?php foreach ($menu as $m) : ?>

                                   <tr>

                                          <td style="font-weight: bold;"><?= $m['title']; ?><br />
                                                 <button style="font-weight:bold;">Controller :: <?= $m['menu']; ?> </button>
                                          </td>


                                          <td>
                                                 <div class="form-check">
                                                        <input class="form-check-input-menu" type="checkbox" <?= check_access_menu($role['id'], $m['menuId']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['menuId']; ?>">

                                                 </div>

                                          </td>

                                   </tr>

                            <?php endforeach; ?>

                     </tbody>



       </div>
       </table>

       </div>

</aside>