<aside class="col-sm-8">
    <div class="container">
        <h3><?= $sub_title; ?></h3>
        <small>Form ini digunakan untuk merubah menu yang ada tolong diperhatikan controllernya</small>
        <hr />
        <form action="<?= base_url('menu/update_menu'); ?>" method="POST">
            <?php foreach ($menu_edit as $m) : ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">id</label>
                    <input type="text" class="form-control" name="menuId" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $m->menuId ?>" readonly>

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama Judul Menu</label>
                    <input type="text" name="title" class="form-control" id="exampleInputPassword1" value="<?php echo $m->title ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama Controller Menu</label>
                    <input type="text" name="menu" class="form-control" id="exampleInputPassword1" value="<?php echo $m->menu ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Url Menu</label>
                    <input type="text" name="menu_url" class="form-control" id="exampleInputPassword1" value="<?php echo $m->menu_url ?>">
                </div>
                <hr />
                <button type="submit" class="btn btn-primary">Ubah Menu</button>
                <?php break; ?>
            <?php endforeach; ?>
        </form>
    </div>







</aside> <!-- col.// -->

</div> <!-- row.// -->

</div>