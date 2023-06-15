<div class="tab-content" id="tf-refresh">
  <div class="tab-pane active" id="settings" role="tabpanel" aria-labelledby="settings-tab">
  <br/>
    <?php include 'transaksi-berjalan.php'; ?>
    <br>
  </div>
  
</div>
<!-- Modal Pembayaran -->

   <?php $no = 0;
   foreach ($getBookingUserResto as $gb) {
       ++$no; ?>
<form action="<?php echo base_url('guess/validate'); ?>" method="POST"  enctype="multipart/form-data">
  <div class="modal fade bd-example-modal-lg" id="validasi-pembayaran<?php echo $gb->id; ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Validasi Pembayaran&nbsp;<?php echo $gb->bookingId_text; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <center>
            <div class="clockdiv alert alert-danger btn-sm" data-date="<?php echo $gb->bookingTimeStacEnd; ?>">
            <span style="font-weight: bold;">
            Masa Pembayaran akan habis pada :<br/>
            <?php echo $formatted_end_period_payment; ?> </span>
           
          
        </div>
            <p class="lead">Lakukan Pembayaran ke Nomor Rekening dibawah </p>
                <h1 class="display-6">119 2002 141</h1>
            <p class="lead">Bank BNI/ a.n Retreat Centre Sukamakmur</p>
            </center>
            <hr/>
            <div class="form-group row">
            
              <!-- <input type="text" name="rmId" value="<?php echo $user['userNama']; ?>" class="form-control"> -->
             
              <input type="hidden" name="bookingId" value="<?php echo $gb->bookingId; ?>" class="form-control">
             
              
            <label class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-12">
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
         <p>Upload Bukti Pembayaran disini</p>
            </div>
              <input type="file" name="payment_prove_image" class="dropzone">
          </div>
    
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
<?php } ?>
<!-- lihat nota moda -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' /><script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
<script>  new FroalaEditor('textarea#froala-editor')</script>

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
}</style>
<script>
      /**
     *
     * app.js
     *
     */
    function readFile(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function (e) {
    var htmlPreview = 
    '<img width="200" src="' + e.target.result + '" />'+
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
    $(".dropzone").change(function(){
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

<script>
$(document).ready(function(){  
        setInterval(function(){   
          $('#tf-refresh').load('responTf');
        }, 1000);
    });
</script>