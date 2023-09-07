<div class="container-fluid">
    <div class="container">
        <br>
        <div class="row">

            <div class="col-lg-3">





                <article class="card-group-item">

                    <div class="modal-content " style="border-radius:10px;">
                        <div class="form-group col-md-12 ">
                            <br>
                            <a class="text-dark" href="" style="font-weight: bold; font-size: 16px;float:left">Cek ketersedian</a><br>
                            <hr>
                            <!-- Datepicker Check-in -->
                            <form action="" method="POST" enctype='multipart/form-data'>
                                <div class="form-group">
                                    <label for="check-in"><small><b>Masuk/ Check in</b></small></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-sm">
                                                <i class="far fa-calendar-alt text-black"></i>
                                            </span>
                                        </div>
                                        <input name="bookingStDt" class="form-control form-control-sm" type="date" id="datepicker" placeholder="Pilih tanggal" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>">

                                    </div>
                                </div>
                                <?php
                                $tomorrow = date("Y-m-d", strtotime("+1 day"));

                                ?>
                                <!-- Datepicker Check-out -->
                                <div class="form-group">
                                    <label for="check-out"><small><b>Keluar/ Check out</b></small></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-sm">
                                                <i class="far fa-calendar-alt text-black"></i>
                                            </span>
                                        </div>
                                        <input name="bookingEdDt" class="form-control form-control-sm" type="date" id="datepicker" placeholder="Pilih tanggal" value="<?php echo $tomorrow; ?>" min="<?php echo $tomorrow; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="guests"><small><b>Tamu/ Guess</b></small></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" style="background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);" class="btn btn-primary btn-sm form-control-sm" id="decreaseBtn">-</button>
                                        </div>
                                        <input name="total_guess" class="form-control text-center form-control-sm" type="number" id="guestsInput" value="1" min="1">
                                        <div class="input-group-append">
                                            <button type="button" style="background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);" class="btn btn-primary btn-sm form-control-sm" id="increaseBtn">+</button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm" style="width:100%; border-radius:8px;background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);float:left;">Cek tersedia</button>
                                </div>
                            </form>
                        </div>


                    </div>
                    <br>
                    <div class="modal-content" style="border-radius:10px;">
                        <div class="form-group col-md-12 ">
                            <br>
                            <b style="float:left;"><span class="logo"><i class="fa-solid fa-headset"></i></span>&nbsp;&nbsp;&nbsp;Hubungi cepat :</b>
                            <br>
                            <hr>
                            <li><small>Whatsapp : <b>+62 813 890 900</b></small></li>
                            <li><small>Email : <b>infopromo@retreatcenter.id</b></small></li>


                        </div>
                    </div>

                </article>
            </div>
            <div class="col-lg-9">
                <article class="card-group-item">
                    <div class="col-lg-12">

                        <div class="container">
                            <img style="width:100%; border-radius:8px;" src="<?= base_url('upload/slide/slide1.png'); ?>" alt="Gambar Hotel XYZ">
                        </div>

                    </div>

                    <br>
                    <div class="media">

                        <div class="media-body">
                            <br>
                            <h5 class="mt-0 text-center"><i class="fa-solid fa-microphone"></i>&nbsp;<b>Mengapa harus Staycation di Retreat Center</b></h5>
                            <p class="text-center"><small>Dengan pengalaman maksimal kami dalam melayani tamu dengan harga yang rendah, kami menawarkan beberapa layanan</small></p>
                            <div class="row">
                                <div class="col-sm-4">

                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            <span class="logo"><i class="fa-solid fa-igloo fa-2xl"></i></span>&nbsp;
                                            <br> <br> <b>Villa</b>

                                        </h5>

                                    </div>

                                </div>
                                <div class="col-sm-4">

                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            <span class="logo"><i class="fa-solid fa-utensils fa-2xl"></i></span>&nbsp;
                                            <br> <br> <b>Restorant</b>

                                        </h5>

                                    </div>

                                </div>
                                <div class="col-sm-4">

                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            <span class="logo"><i class="fa-solid fa-ticket-simple fa-2xl"></i></span>&nbsp;
                                            <br> <br> <b>Tickets</b>

                                        </h5>

                                    </div>

                                </div>
                                <div class="col-sm-4">

                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            <span class="logo"><i class="fa-solid fa-person-swimming fa-2xl"></i></span>&nbsp;
                                            <br> <br> <b>Kolam renang</b>

                                        </h5>

                                    </div>

                                </div>
                                <div class="col-sm-4">

                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            <span class="logo"><i class="fa-solid fa-person-running fa-2xl"></i></span>&nbsp;
                                            <br> <br><b>Jogging track</b>

                                        </h5>

                                    </div>

                                </div>
                                <div class="col-sm-4">

                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            <span class="logo"><i class="fa-solid fa-panorama fa-2xl"></i></span>&nbsp;
                                            <br> <br> <b>Panorama</b>

                                        </h5>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
            </div>
        </div>
        </article>
    </div>
</div>
</div>
<script>
    $(function() {
        $("#datepicker").datepicker({
            dateFormat: "dd/mm/yy",
            minDate: 0,
            showButtonPanel: true,
            beforeShow: function(input) {
                $(input).attr("autocomplete", "off");
            }
        });
    });
</script>
<script>
    // Mendapatkan elemen tombol dan input field jumlah tamu
    var decreaseBtn = document.getElementById('decreaseBtn');
    var increaseBtn = document.getElementById('increaseBtn');
    var guestsInput = document.getElementById('guestsInput');

    // Menambahkan event listener untuk tombol tambah
    increaseBtn.addEventListener('click', function() {
        guestsInput.value = parseInt(guestsInput.value) + 1;
    });

    // Menambahkan event listener untuk tombol kurang
    decreaseBtn.addEventListener('click', function() {
        if (parseInt(guestsInput.value) > 1) {
            guestsInput.value = parseInt(guestsInput.value) - 1;
        }
    });
</script>