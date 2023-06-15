<!-- ========== FOOTER ========== -->
<br />

<!-- ========== End FOOTER ========== -->

<!-- Page Preloader -->
<!-- <div id="jsPreloader" class="page-preloader">
            <div class="page-preloader__content-centered">
                <div class="spinner-grow text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div> -->
<!-- End Page Preloader -->

<!-- Go to Top -->

<!-- End Go to Top -->

<!-- JS Global Compulsory -->
<script src="<?= base_url('assets/'); ?>vendor/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script src="<?= base_url('assets/'); ?>vendor/hs-megamenu/src/hs.megamenu.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/flatpickr/dist/flatpickr.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/slick-carousel/slick/slick.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/gmaps/gmaps.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/custombox/dist/custombox.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/custombox/dist/custombox.legacy.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/custombox/dist/custombox.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/custombox/dist/custombox.legacy.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/chartist/dist/chartist.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/chartist-js-tooltip/chartist-plugin-tooltip.js"></script>

<!-- JS MyTravel -->
<script src="<?= base_url('assets/'); ?>js/hs.core.js"></script>
<script src="<?= base_url('assets/'); ?>js/components/hs.header.js"></script>
<script src="<?= base_url('assets/'); ?>js/components/hs.unfold.js"></script>
<script src="<?= base_url('assets/'); ?>js/components/hs.validation.js"></script>
<script src="<?= base_url('assets/'); ?>js/components/hs.show-animation.js"></script>
<script src="<?= base_url('assets/'); ?>js/components/hs.range-datepicker.js"></script>
<script src="<?= base_url('assets/'); ?>js/components/hs.selectpicker.js"></script>
<script src="<?= base_url('assets/'); ?>js/components/hs.range-slider.js"></script>
<script src="<?= base_url('assets/'); ?>js/components/hs.go-to.js"></script>
<script src="<?= base_url('assets/'); ?>js/components/hs.slick-carousel.js"></script>
<script src="<?= base_url('assets/'); ?>js/components/hs.quantity-counter.js"></script>
<script src="<?= base_url('assets/'); ?>js/components/hs.g-map.js"></script>
<script src="<?= base_url('assets/'); ?>js/components/hs.modal-window.js"></script>
<script src="<?= base_url('assets/'); ?>js/components/hs.malihu-scrollbar.js"></script>
<script src="<?= base_url('assets/'); ?>js/components/hs.modal-window.js"></script>
<script src="<?= base_url('assets/'); ?>js/components/hs.chartist-area-chart.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

<!--menadatadatatables-->
<!-- JavaScript Bundle with Popper -->

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#menadata').DataTable();
  });
</script>

<!-- JS Plugins Init. -->
<script>
  $(document).on('ready', function() {
    // initialization of chartist area charts
    $.HSCore.components.HSChartistAreaChart.init('.js-area-chart');
  });
</script>

<script>
  $(window).on('load', function() {
    // initialization of HSMegaMenu component
    $('.js-mega-menu').HSMegaMenu({
      event: 'hover',
      pageContainer: $('.container'),
      breakpoint: 1199.98,
      hideTimeOut: 0
    });

    // Page preloader
    setTimeout(function() {
      $('#jsPreloader').fadeOut(500)
    }, 800);
  });

  $(document).on('ready', function() {
    // initialization of header
    $.HSCore.components.HSHeader.init($('#header'));

    // initialization of google map
    function initMap() {
      $.HSCore.components.HSGMap.init('.js-g-map');
    }

    // initialization of unfold component
    $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

    // initialization of autonomous popups
    $.HSCore.components.HSModalWindow.init('[data-modal-target]', '.js-modal-window', {
      autonomous: true
    });

    // initialization of show animations
    $.HSCore.components.HSShowAnimation.init('.js-animation-link');

    // initialization of datepicker
    $.HSCore.components.HSRangeDatepicker.init('.js-range-datepicker');

    // initialization of forms
    $.HSCore.components.HSRangeSlider.init('.js-range-slider');

    // initialization of select
    $.HSCore.components.HSSelectPicker.init('.js-select');

    // initialization of malihu scrollbar
    $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

    // initialization of quantity counter
    $.HSCore.components.HSQantityCounter.init('.js-quantity');

    // initialization of slick carousel
    $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

    // initialization of go to
    $.HSCore.components.HSGoTo.init('.js-go-to');
  });
</script>

<script>
  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });



  $('.form-check-input-menu').on('click', function() {
    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({
      url: "<?= base_url('roles/changeaccess'); ?>",
      type: 'post',
      data: {
        menuId: menuId,
        roleId: roleId
      },
      success: function() {
        document.location.href = "<?= base_url('roles/roleaccess/'); ?>" + roleId;
      }
    });

  });
</script>

<script>
  $(document).ready(function() {

    // binding the check all box to onClick event
    $(".chk_all").click(function() {

      var checkAll = $(".chk_all").prop('checked');
      if (checkAll) {
        $(".checkboxes").prop("checked", true);
      } else {
        $(".checkboxes").prop("checked", false);
      }

    });

    // if all checkboxes are selected, then checked the main checkbox class and vise versa
    $(".checkboxes").click(function() {

      if ($(".checkboxes").length == $(".subscheked:checked").length) {
        $(".chk_all").attr("checked", "checked");
      } else {
        $(".chk_all").removeAttr("checked");
      }

    });

  });
</script>
<script>
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2({
      tags: true
    });
  });
</script>
<!--untuk tidak bisa memilih hari kemarin -->
<script>
  $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;

    // or instead:
    // var maxDate = dtToday.toISOString().substr(0, 10);

    alert(maxDate);
    $('#txtDate').attr('min', maxDate);
});
</script>




</body>

</html>