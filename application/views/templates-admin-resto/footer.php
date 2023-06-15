<br>

</div>

<!-- JS Global Compulsory -->
<script src="<?= base_url('assets/'); ?>vendor/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/bootstrap.min.js"></script>

<!-- JS Implementing Plugins -->
<!-- JS Datatable -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/components/hs.datatables.js"></script>
<!-- -->
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
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>


<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
<!-- summer note-->


<script src="<?php echo base_url('assets/froala/js/froala_editor.min.js'); ?>"></script>


<script src="<?= base_url('vendor/tinymce/'); ?>tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '#mytextarea'
  });
</script>
<script>
  $(function() {
    $('#myEditor').froalaEditor({
      // Opsi konfigurasi Froala Editor lainnya
    });
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
  $(document).on('ready', function() {
    // initialization of datatables
    $.HSCore.components.HSDatatables.init('.js-datatable');
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
<!--untuk tidak bisa memilih hari kemarin -->


<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
  $(document).on('ready', function() {
    // initialization of text editors
    $.HSCore.components.HSSummernoteEditor.init('.js-summernote-editor');
  });
</script>
<script>
  $(document).ready(function() {
    $('.selectpicker').selectpicker('refresh');
  });
</script>

<script>
  $(document).ready(function() {
    var table = $('#menadata').DataTable({
      lengthMenu: [
        [5],
        [5]
      ], // Set the available row limits to [5]
      pageLength: 5, // Set the default number of rows to display to 5

      language: {
        emptyTable: "Tidak terdapat data di Tabel",
        info: '<small>Menampilkan _START_ sampai _END_ dari _TOTAL_  data</small>',
        lengthMenu: ''

      },
      searching: false,




    });



  });
</script>
<script src="https://cdn.ckbox.io/CKBox/1.5.0/ckbox.js"></script>
<!--
        The "super-build" of CKEditor 5 served via CDN contains a large set of plugins and multiple editor types.
        See https://ckeditor.com/docs/ckeditor5/latest/installation/getting-started/quick-start.html#running-a-full-featured-editor-from-cdn
    -->
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/ckeditor.js"></script>
<script>
  // This sample still does not showcase all CKEditor 5 features (!)
  // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
  CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
    // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
    toolbar: {
      items: [
        'ckbox', 'uploadImage', '|',
        'exportPDF', 'exportWord', '|',
        'findAndReplace', 'selectAll', '|',
        'heading', '|',
        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
        'bulletedList', 'numberedList', 'todoList', '|',
        'outdent', 'indent', '|',
        'undo', 'redo',
        '-',
        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
        'alignment', '|',
        'link', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
        'textPartLanguage', '|',
        'sourceEditing'
      ],
      shouldNotGroupWhenFull: true
    },
    list: {
      properties: {
        styles: true,
        startIndex: true,
        reversed: true
      }
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
    heading: {
      options: [{
          model: 'paragraph',
          title: 'Paragraph',
          class: 'ck-heading_paragraph'
        },
        {
          model: 'heading1',
          view: 'h1',
          title: 'Heading 1',
          class: 'ck-heading_heading1'
        },
        {
          model: 'heading2',
          view: 'h2',
          title: 'Heading 2',
          class: 'ck-heading_heading2'
        },
        {
          model: 'heading3',
          view: 'h3',
          title: 'Heading 3',
          class: 'ck-heading_heading3'
        },
        {
          model: 'heading4',
          view: 'h4',
          title: 'Heading 4',
          class: 'ck-heading_heading4'
        },
        {
          model: 'heading5',
          view: 'h5',
          title: 'Heading 5',
          class: 'ck-heading_heading5'
        },
        {
          model: 'heading6',
          view: 'h6',
          title: 'Heading 6',
          class: 'ck-heading_heading6'
        }
      ]
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
    placeholder: 'Silahkan diisi...',
    ckbox: {
      // The development token endpoint is a special endpoint to help you in getting started with
      // CKEditor Cloud Services.
      // Please note the development token endpoint returns tokens with the CKBox administrator role.
      // It offers unrestricted, full access to the service and will expire 30 days after being used for the first time.
      // -------------------------------------------------------------
      // !!! You should not use it on production !!!
      // -------------------------------------------------------------
      // Read more: https://ckeditor.com/docs/ckbox/latest/guides/configuration/authentication.html#token-endpoint

      // You need to provide your own token endpoint here
      tokenUrl: 'https://98021.cke-cs.com/token/dev/Ayny5BDz8af8VEq8eJwj1U9KqkzH9GQywe2w?limit=10'
    },
    // The "super-build" contains more premium features that require additional configuration, disable them below.
    // Do not turn them on unless you red the documentation and know how to configure them and setup the editor.
    removePlugins: [
      // These two are commercial, but you can try them out without registering to a trial.
      // 'ExportPdf',
      // 'ExportWord',
      'EasyImage',
      'RealTimeCollaborativeComments',
      'RealTimeCollaborativeTrackChanges',
      'RealTimeCollaborativeRevisionHistory',
      'PresenceList',
      'Comments',
      'TrackChanges',
      'TrackChangesData',
      'RevisionHistory',
      'Pagination',
      'FormatPainter',
      'SlashCommand',
      'TableOfContents',
      'Template',
      'DocumentOutline',
      'WProofreader',
      // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
      // from a local file system (file://) - load this site via HTTP server if you enable MathType
      'MathType'
    ]
  });
</script>






</body>


</html>