<aside class="col-sm-8">
    <div class="container">
        <h3><?= $sub_title; ?></h3>
        <small>Form ini digunakan untuk merubah User beserta passwordnya</small>
        <hr />
        <form action="<?= base_url('users/update_users'); ?>" method="POST">
            <?php foreach ($user_Edit as $ue) : ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">User id</label>
                    <input type="text" class="form-control" name="userId" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $ue->userId ?>" readonly>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">User Google Id</label>
                    <input type="text" class="form-control" name="" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $ue->userGoogleId ?>" readonly>

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">User Name</label>
                    <input type="text" name="userNama" class="form-control" id="exampleInputPassword1" value="<?php echo $ue->userNama ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email User</label>
                    <input type="text" name="userEmail" class="form-control" id="exampleInputPassword1" value="<?php echo $ue->userEmail ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password User</label>
                    <input type="text" name="userPassword" class="form-control" id="exampleInputPassword1" value="<?php echo $ue->userPassword ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Role User</label>
                    <input type="text" name="role_id" class="form-control" id="exampleInputPassword1" value="<?php echo $ue->role_id ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">No Telepon</label>
                    <input type="text" name="userNoTelepon" class="form-control" id="exampleInputPassword1" value="<?php echo $ue->userNoTelepon ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">is_active</label>
                    <input type="text"  name="is_active" class="form-control" id="exampleInputPassword1" value="<?php echo $ue->is_active ?>">
                </div>
                <hr />
                <button type="submit" class="btn btn-primary">Perbaharui User</button>
                <?php break; ?>
            <?php endforeach; ?>
        </form>
    </div>







</aside> <!-- col.// -->

</div> <!-- row.// -->

</div>