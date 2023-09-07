<div class="menu-berhasil-pop" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php if ($this->session->flashdata('message')) : ?>

<?php endif; ?>

<aside class="col-lg-12">
  <div class="container">
    <h3>List Products
      <button class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#add-product">Tambah Produk</button>
    </h3>

    <small>Silahkan Gunakan halaman ini untuk menambah, menghapus, dan mengedit Produk Hotel</small>
    <hr />
    <table id="menadata" class="display" style="width:100%">
      <thead>
        <tr>

          <th>Menu</th>
          <th>Harga/ Malam</th>
          <th>Kapasitas tamu</th>
          <th>Aksi</th>

        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($getAllProducts as $gap) : ?>
          <tr>
            <th><a style="font-weight:bold"><?= $gap->roomName ?></a><br />

              <small>Lokasi : <a style="font-weight:bold"> <?= $gap->roomLocation; ?></small></a><br />

              <small>Fasilitas : </small>

              <?php

              $facility = $this->db->query("SELECT * FROM tb_rooms_facility WHERE rmId = '$gap->roomId'");

              foreach ($facility->result() as $row) {
                $icon = $row->rmFacIcon;
                $facility_name = $row->rmFacName;
                $facility_id = $row->rmId;
              ?>


                <small>
                  <a class="text-orange" style="font-weight:bold;"> <?= $facility_name; ?></small></a>,
              <?php
                //$bookingTimeStacEnd = $row->bookingTimeStacEnd;
              }
              ?><br />
              <small>Gambar : </small>
              <?php

              $image = $this->db->query("SELECT * FROM tb_rooms_picture WHERE rmId = '$gap->roomId'");

              foreach ($image->result() as $img) {
                $picture = $img->roomsPicture;
                // $facility_name = $row->rmFacName;
                // $facility_id = $row->rmId;
              ?>


                <small>

                  <img src="<?= base_url(); ?>/upload/hotel/<?= $picture; ?>" alt="..." class="rounded-circle" style="height:28px;width:28px;">
                </small>
              <?php
                //$bookingTimeStacEnd = $row->bookingTimeStacEnd;
              }
              ?>
              <br />
              <a data-toggle="modal" data-target="#add-facility<?= $gap->roomId; ?>" class="add-facility-js badge badge-warning btn-sm update-record add-facility"></i>&nbsp;Tambah Fasilitas</a>
              <a style="color:white;" data-toggle="modal" data-target="#add-picture<?= $gap->roomId; ?>" class="badge badge-green btn-sm update-record"></i>&nbsp;Tambah Gambar</a>

            <td>
              <a style="font-weight:bold;">
                Rp.
                <?= number_format($gap->roomPricePerNight, 0, ".", ".") ?></small></a>
            </td>
            <td><?= $gap->total_guess; ?>&nbsp;orang</td>
            <td>
              <a href="<?= base_url(); ?>menu/editMenu/" class="badge badge-primary btn btn-sm"></i>&nbsp;Edit</a>
              <a href="<?= base_url(); ?>products/hapus_product/<?= $gap->roomId; ?>" class="badge badge-primary btn-sm update-record tombol-hapus-menu"></i>&nbsp;Delete</a>
            </td>

            </small>
            </td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>

    </table>


  </div>


</aside> <!-- col.// -->


</div> <!-- row.// -->

</div>


<?php $no = 0;
foreach ($getAllProducts as $gap) : $no++; ?>
  <form action="<?php echo site_url('products/add_facility'); ?>" method="post">
    <div class="modal fade bd-example-modal-lg" id="add-facility<?= $gap->roomId; ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Facility to <?= $gap->roomName; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">





            <div class="form-group row">


              <input type="hidden" name="rmId" value="<?= $gap->roomId; ?>" class="form-control">

              <label class="col-sm-2 col-form-label">Facility Name</label>
              <div class="col-sm-10">
                <input type="text" name="rmFacName" class="form-control" required>
              </div>
              <label class="col-sm-2 col-form-label">Facility Description</label>
              <div class="col-sm-10">
                <input type="text" name="rmFacDes" class="form-control" required>
              </div>
              <label class="col-sm-2 col-form-label">Facility Icon</label>
              <div class="col-sm-10">
                <input type="text" name="rmFacIcon" class="form-control">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="edit_id" required>
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary btn-sm">Update</button>
          </div>
        </div>
      </div>
    </div>
  </form>
<?php endforeach; ?>


<?php $no = 0;
foreach ($getAllProducts as $gap) : $no++; ?>
  <form action="<?php echo base_url('products/add_picture'); ?>" method="post" enctype="multipart/form-data">
    <div class="modal fade bd-example-modal-lg" id="add-picture<?= $gap->roomId; ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Picutre to <?= $gap->roomName; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-md-12">
              <div class="form-group">
                <input type="hidden" name="roomId" value="<?= $gap->roomId; ?>" class="form-control">
                <input type="hidden" name="roomName" value="<?= $gap->roomName; ?>" class="form-control">
                <label class="control-label">Upload File</label>
                <div class="preview-zone hidden">
                  <div class="box box-solid">
                    <div class="box-header with-border">
                      <div><b>Preview</b></div>
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-danger btn-xs remove-preview">
                          <i class="fa fa-times"></i> Reset This Form
                        </button>
                      </div>
                    </div>

                    <div class="box-body"></div>
                  </div>
                </div>
                <div class="dropzone-wrapper">
                  <div class="dropzone-desc">
                    <i class="glyphicon glyphicon-download-alt"></i>
                    <p>Choose an image file or drag it here.</p>
                  </div>
                  <input type="file" name="roomsPicture" class="dropzone">
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <input type="hidden" name="edit_id" required>
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary btn-sm">Tambah Gambar</button>
          </div>
        </div>
      </div>
    </div>
  </form>
<?php endforeach; ?>

<form action="<?php echo base_url('products/add_product'); ?>" method="post" enctype="multipart/form-data">
  <div class="modal fade bd-example-modal-lg" id="add-product" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-row">
              <div class="form-group">
                <label class="col-sm-12 col-form-label" style="font-weight:bold;">Room Name</label>
                <div class="col-sm-12">
                  <input type="text" name="roomName" class="form-control" required>
                </div>
                <label class="col-sm-12 col-form-label" style="font-weight:bold;">Room Description</label>
                <div class="col-sm-12">
                  <textarea name="roomDescription" id="froala-editor">Masukkan Deskripsi disini</textarea>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label" style="font-weight:bold;">Room Location</label>
                    <input style="margin-left:15px;" name="roomLocation" type="text" class="form-control" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label class="col-sm-12 col-form-label" style="font-weight:bold;">&nbsp;Harga/ Malam (Rp.)</label>
                    <input style="margin-left:18px;" type="number" id="tanpa-rupiah" name="roomPricePerNight" class="form-control" placeholder="diisi hanya angka" required>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-5">
                    <label class="col-sm-12 col-form-label" style="font-weight:bold;">Wifi Tersedia ?</label>

                    <select style="margin-left:18px;" name="roomWifiAva" class="form-control" id="exampleFormControlSelect1">
                      <option>Pilih</option>
                      <option value="1">Tersedia Wifi</option>
                      <option value="0">Tidak Tersedia Wifi</option>

                    </select>
                  </div>
                  <div class="form-group col-md-5">
                    <label class="col-sm-12 col-form-label" style="font-weight:bold;">&nbsp;Sarapan Tersedia ?</label>

                    <select style="margin-left:18px;" name="roomBrfAva" class="form-control" id="exampleFormControlSelect1">
                      <option>Pilih</option>
                      <option value="1">Tersedia Sarapan Gratis</option>
                      <option value="0">Tidak Tersedia Sarapan Gratis</option>

                    </select>
                  </div>
                </div>



                <label class="col-sm-12 col-form-label" style="font-weight:bold;">Upload Gambar</label>
                <div class="preview-zone hidden">
                  <div class="box box-solid">
                    <div class="box-header with-border">
                      <div><b>Preview</b></div>
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-danger btn-xs remove-preview">
                          <i class="fa fa-times"></i> Reset This Form
                        </button>
                      </div>
                    </div>

                    <div class="box-body"></div>
                  </div>
                </div>
                <div class="dropzone-wrapper">
                  <div class="dropzone-desc">
                    <i class="glyphicon glyphicon-download-alt"></i>
                    <p>Choose an image file or drag it here.</p>
                  </div>
                  <input type="file" name="roomHeadPicture" class="dropzone">
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <input type="hidden" name="edit_id" required>
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary btn-sm">Tambah Produk</button>
          </div>
        </div>
      </div>
    </div>
</form>



<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
<script>
  new FroalaEditor('textarea#froala-editor')
</script>

<script type="text/javascript">
  const flashData = $('.menu-berhasil-pop').data('flashdata');

  if (flashData) {
    Swal({
      title: '',
      text: 'Berhasil ' + flashData,
      type: 'success'
    });
  }

  // tombol-hapus
  $('.tombol-hapus-menu').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
      title: 'Apakah anda yakin',
      text: "Akan menghapus menu ini ?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus'
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    })

  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    //$('.bootstrap-select').selectpicker();

    //GET UPDATE
    $('.update-record-menu').on('click', function() {
      var id = $(this).data('id');
      var menu = $(this).data('menu');
      $(".strings").val('');
      $('#UpdateModalMenu').modal('show');
      $('[name="edit_id"]').val(id);
      $('[name="menu_edit"]').val(menu);

      return false;
    });



  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    //$('.bootstrap-select').selectpicker();

    //GET UPDATE
    $('.add-facility-js').on('click', function() {
      // var id = $(this).data('id');
      // var menu = $(this).data('menu');
      // $(".strings").val('');
      $('#add-facility-modal').modal('show');
      // $('[name="edit_id"]').val(id);
      // $('[name="menu_edit"]').val(menu);

      return false;
    });



  });
</script>
<style>
  .box {
    position: relative;
    background: #ffffff;
    width: 100%;
  }

  .box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative;
    border-bottom: 1px solid #f4f4f4;
    margin-bottom: 10px;
  }

  .box-tools {
    position: absolute;
    right: 10px;
    top: 5px;
  }

  .dropzone-wrapper {
    border: 2px dashed #91b0b3;
    color: #92b0b3;
    position: relative;
    height: 150px;
  }

  .dropzone-desc {
    position: absolute;
    margin: 0 auto;
    left: 0;
    right: 0;
    text-align: center;
    width: 40%;
    top: 50px;
    font-size: 16px;
  }

  .dropzone,
  .dropzone:focus {
    position: absolute;
    outline: none !important;
    width: 100%;
    height: 150px;
    cursor: pointer;
    opacity: 0;
  }

  .dropzone-wrapper:hover,
  .dropzone-wrapper.dragover {
    background: #ecf0f5;
  }

  .preview-zone {
    text-align: center;
  }

  .preview-zone .box {
    box-shadow: none;
    border-radius: 0;
    margin-bottom: 0;
  }
</style>
<script>
  /**
   *
   * app.js
   *
   */
  function readFile(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        var htmlPreview =
          '<img width="200" src="' + e.target.result + '" />' +
          '<p>' + input.files[0].name + '</p>';
        var wrapperZone = $(input).parent();
        var previewZone = $(input).parent().parent().find('.preview-zone');
        var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

        wrapperZone.removeClass('dragover');
        previewZone.removeClass('hidden');
        boxZone.empty();
        boxZone.append(htmlPreview);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  function reset(e) {
    e.wrap('<form>').closest('form').get(0).reset();
    e.unwrap();
  }
  $(".dropzone").change(function() {
    readFile(this);
  });
  $('.dropzone-wrapper').on('dragover', function(e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).addClass('dragover');
  });
  $('.dropzone-wrapper').on('dragleave', function(e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).removeClass('dragover');
  });
  $('.remove-preview').on('click', function() {
    var boxZone = $(this).parents('.preview-zone').find('.box-body');
    var previewZone = $(this).parents('.preview-zone');
    var dropzone = $(this).parents('.form-group').find('.dropzone');
    boxZone.empty();
    previewZone.addClass('hidden');
    reset(dropzone);
  });
</script>