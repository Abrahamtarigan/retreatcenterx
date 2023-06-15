<style>
    /* ==========================================
    FOR DEMO PURPOSE
  ========================================== */


    .text-small {
        font-size: 0.9rem;
    }

    a {
        color: inherit;
        text-decoration: none;
        transition: all 0.3s;
    }

    a:hover,
    a:focus {
        text-decoration: none;
    }





    footer {
        background: linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);
    }


    /* ==========================================
    CUSTOM UTILS CLASSES
  ========================================== */
    body,
    html {
        height: 100%;
    }
</style>
<div class="d-flex flex-column h-100">

    <!-- FOR DEMO PURPOSE -->
    <section class="hero text-white py-5 flex-grow-1">

        <div class="container py-12">

            <div class="row">
                <div class="col-lg-12">

                    <!-- <div class="jumbotron">
                        <h1 class="display-4 text-dark">Selamat datang di situs kami!</h1>
                        <p class="lead">Ini adalah situs web kami yang menampilkan berbagai informasi dan layanan yang berguna untuk Anda.</p>
                        <hr class="my-4">
                        <p>Terima kasih telah mengunjungi situs kami. Jika Anda memiliki pertanyaan atau masukan, jangan ragu untuk menghubungi kami.</p>
                        <a class="btn btn-primary btn-lg" href="#" role="button">Pelajari lebih lanjut</a>
                    </div> -->

                </div>
            </div>
        </div>
    </section>


    <!-- FOOTER -->
    <footer class="w-100 py-4 flex-shrink-0">
        <div class="container py-4">
            <div class="row gy-4 gx-5">
                <div class="col-lg-4 col-md-6">
                    <h5 class="h1 text-white  __comfortaa_font">Retreat Center</h5>
                    <p class="small text-muted">Deliserdang, Sumatra Utara, Indonesia</p>
                    <p class="small text-muted mb-0">&copy; Copyrights. All rights reserved <br><a class="text-primary" href="#">Developed by Abraham Tarigan</a></p>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="text-white mb-3 __area">Quick links</h5>
                    <ul class="list-unstyled text-muted __area">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Get started</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="text-white mb-3 __area">Quick links</h5>
                    <ul class="list-unstyled text-muted __area">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Get started</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-white mb-3 __area">Newsletter</h5>
                    <p class="small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                    <form action="#">
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-primary" id="button-addon2" type="button"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </footer>
</div>
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
<!--untuk tidak bisa memilih hari kemarin -->

<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true,
            orientation: 'bottom'
        });
    });
</script>
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>






</body>

</html>