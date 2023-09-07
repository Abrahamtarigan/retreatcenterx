<style>
    .__keatas {
        margin: -25px;
        margin-left: 2px;
        margin-bottom: 10px;
    }
</style>

<div class="menu-berhasil-pop" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php if ($this->session->flashdata('message')) : ?>

<?php endif; ?>
<div class="col-sm-12">

    <div class="container">
        <div class="container ">
            <br>
            <!-- <?php include 'breadcumb.php'; ?> -->
            <div class="dashboard-wrapper">
                <div class="container-fluid">

                    <div class="row">

                        <?php include 'aside.php'; ?>

                        <div class="col-sm-8">




                            <div class=" text-left __keatas" id="">
                                <div class="p-4">

                                    <h2 class="card-title mb-3 text-black"><?= $room['roomName']; ?></h2>

                                    <small>
                                        <p class="text-black __keatas"><i class="icon flaticon-placeholder mr- font-size-18"></i>&nbsp;<?= $room['roomLocation'] ?></p>
                                    </small>
                                    <div class="__type">
                                        <span class="font-weight-normal font-size-14 text-white _button_khas">
                                            <?php
                                            if ($room['roomBrfAva'] == 1) {
                                                echo "Gratis Sarapan Pagi";
                                            } else {
                                                echo "Tidak Termasuk Sarapan Pagi";
                                            }
                                            ?>
                                        </span>
                                        <span class="font-weight-normal font-size-14 text-white button">

                                            <?php
                                            if ($room['roomWifiAva'] == 1) {
                                                echo "Free Wi-fi";
                                            } else {
                                                echo "Wi-fi Belum tersedia diarea ini";
                                            }
                                            ?></span>

                                    </div>

                                    <p><small class="text-dark"><?= $room['roomDescription'] ?></small>
                                        <br>

                                    </p>

                                </div>
                            </div>


                            <div class="modal-content " style="border-radius:10px;">
                                <br>

                                <div class="container">
                                    <h3 class="card-title mb-2 text-black">Order Fasilitas </h3>
                                    <hr>
                                    <form action="<?= base_url('auth/cart'); ?>" method="POST" enctype="multipart/form-data">

                                        <div class="form-row">

                                            <?php $no = 0;
                                            foreach ($getExtender as $ge) : $no++; ?>
                                                <div class="form-group col-md-4">
                                                    <input hidden type='text' name='bookingUserId' value='<?= $user['userId']; ?>'>

                                                    <a class="card-title" style="font-weight:200"><?= $ge->roomExtenderFacility; ?><br /><?= number_format($ge->roomExtenderFacilityPrice, 0, ".", "."); ?>&nbsp;/ unit x&nbsp;1 hari</a>
                                                    <input hidden type="number" class="form-control form-control-sm" name="id[]" value="<?= $ge->id; ?>">
                                                    <input hidden type="text" class="form-control form-control-sm" name="price[]" value="<?= $ge->roomExtenderFacilityPrice; ?>">
                                                    <input type="number" class="form-control form-control-sm" name="quantity[]" type="number">



                                                </div>
                                            <?php endforeach; ?>
                                        </div>

                                        <div class="modal-footer">

                                            <button type="submit" class="btn btn-warning button button-warning text-white btn-sm rounded " style=" background: linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);">Masukkan Kedalam Keranjang</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for Image Preview -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <!-- Image will be displayed here -->
                    <img src="" id="previewImage" style="max-width: 100%; height: auto;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Script to show the clicked image in the modal
        $(document).ready(function() {
            $('.card-body').on('click', function() {
                var imageSource = $(this).find('img').attr('src');
                $('#previewImage').attr('src', imageSource);
            });
        });
    </script>