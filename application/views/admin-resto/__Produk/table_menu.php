<table id="menadata" class="display table table-stripped  ">

  <thead>
    <tr>
      <th style="width:5px;">No.</th>
      <th>Nama Menu Masakan</th>


    </tr>
  </thead>

  <tbody>

    <?php foreach ($hasil as $h) : ?>
      <tr>
        <td style="font-family: 'Open Sans', sans-serif;background-color: #fff;">
          <center><b>
              <?= $n; ?>
            </b></center>
        </td>
        <td style="font-family: 'Open Sans', sans-serif;background-color: #fff;">
          <div class="gallery">
            <a href="gambar1.jpg" data-size="1200x900">
              <img style="width:140px;height:100px" class="img rounded float-left mr-2" src="<?= base_url('upload/resto/' . $h->gambar); ?>" alt="Gambar 1"></a>
          </div>
          <div>


            <a style="font-size:18px"><?php echo $h->nama; ?></a><br>
            <small><u><?php echo $h->desc_index; ?></u> </small><br>


            <small><B>Harga:</B>Rp.
              <?php echo $h->harga; ?>
            </small><br>
            <a href="<?= base_url('Produkresto/edit/' . $h->id_menu); ?>" class=" btn btn-xs btn-icon btn-primary" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Edit">
              <span class="fas fa-pen btn-icon__inner"></span>
            </a>
            <button type="button" class="btn btn-xs btn-icon btn-primary">
              <span class="fas fa-eye btn-icon__inner"></span>
            </button>
            <button type="button" class="btn btn-xs btn-icon btn btn-danger">
              <span class="fas fa-times btn-icon__inner"></span>
            </button>




          </div>

        </td>


      </tr>
      <?php $n++; ?>
    <?php endforeach; ?>

  </tbody>


</table>
<br>