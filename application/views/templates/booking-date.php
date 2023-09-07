<div class="container-fluid">
    <div class="container">
        <br>
        <div class="row">
            <div class="col-lg-3">


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
                                    <input name="bookingStDt" class="form-control form-control-sm" type="date" id="datepicker" placeholder="Pilih tanggal" value="<?= $this->input->post('bookingStDt') ?>" min="<?php echo date('Y-m-d'); ?>">

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
                                    <input name="bookingEdDt" class="form-control form-control-sm" type="date" id="datepicker" placeholder="Pilih tanggal" value="<?= $this->input->post('bookingEdDt') ?>" min="<?php echo $tomorrow; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="guests"><small><b>Tamu/ Guess</b></small></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" style="background:linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);" class="btn btn-primary btn-sm form-control-sm" id="decreaseBtn">-</button>
                                    </div>
                                    <input name="total_guess" class="form-control text-center form-control-sm" type="number" id="guestsInput" value="<?= $this->input->post('total_guess') ?>" min="1">
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




                <article class="card-group-item">

                    <div class="rounded" style="background: linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);">


                        <div class="border-1">


                        </div>
                    </div>
            </div>
            <!--Banner v2-->
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