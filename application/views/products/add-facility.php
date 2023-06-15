<aside class="col-sm-8">
    <div class="container">
        <h3><?= $title; ?></h3>
        <small>Tambah atau Update Fasilitas </small>
        <hr />
        <form action="<?= base_url('products/add_facility'); ?>" method="POST">
        
           


                <div class="form-group">
                    <label for="exampleInputEmail1">id</label>
                    <input type="text" class="form-control" name="rmId" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $roomIdToEdit;?>" readonly>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Facility Name</label>
                    <input type="text" class="form-control" name="rmFacName" id="exampleInputEmail1" aria-describedby="emailHelp" value=""  >

                </div>
                
               
                <div class="form-group">
                    <label for="exampleInputEmail1">Fasility Description</label>
                    <input type="text" class="form-control" name="rmFacDes" id="exampleInputEmail1" aria-describedby="emailHelp" value="" >

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Fasility Icon</label>
                    <input type="text" class="form-control" name="rmFacIcon" id="exampleInputEmail1" aria-describedby="emailHelp" value="" >

                </div>
               
                
                <hr />
                <button type="submit" class="btn btn-primary">Tambah Fasilitas</button>
                
            
        </form>
    </div>







</aside> <!-- col.// -->

</div> <!-- row.// -->

</div>