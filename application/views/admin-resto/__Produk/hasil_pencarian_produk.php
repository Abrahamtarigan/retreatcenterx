<br>
<div class="container-fluid">
  <div class="row">
    <?php require_once 'nav-master-resto.php'; ?>

    <div class="col-lg-9">





      <article class="card-group-item">

        <div class="filter-content">




          <?php require_once '_pencarian/_cari_menu.php'; ?>

          <?php $n = 1; ?>
          <?php include 'table_menu.php'; ?>
        </div>
    </div>






    </article> <!-- card-group-item.// -->
  </div>
</div>

<?php include 'modal_.php'; ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script>
  $(document).ready(function() {
    $('form').submit(function() {
      var submitBtn = $(this).find('button[type="submit"]');
      submitBtn.attr('disabled', 'disabled').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
      setTimeout(function() {
        // submitBtn.removeAttr('disabled').html('Search...');
      }, 2000);
    });
  });
</script>
<script>
  function generateSlug() {
    var title = document.getElementById('inputTitle').value;
    var slug = slugify(title);
    document.getElementById('inputSlug').value = slug;
  }

  function slugify(text) {
    return text.toString().toLowerCase()
      .replace(/\s+/g, '-') // Ganti spasi dengan tanda "-"
      .replace(/[^\w\-]+/g, '') // Hapus karakter non-alphanumerik kecuali "-"
      .replace(/\-\-+/g, '-') // Ganti multiple "-" dengan satu "-"
      .replace(/^-+/, '') // Hapus "-" di awal string
      .replace(/-+$/, ''); // Hapus "-" di akhir string
  }
</script>