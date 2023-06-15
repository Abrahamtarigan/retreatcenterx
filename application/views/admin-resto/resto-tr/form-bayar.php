<div class="modal-content " style="border-radius:10px;">
       <div class="form-group col-md-12 ">
              <label for="recipient-name" class="col-form-label modal-title" id="exampleModalLabel">
                     <h5><b>Pembayaran</b> </h5>
                     <small style="font-color:grey">Data form ini akan langsung tersimpang kedalam database<b></b> </small>
              </label>


              <div class="modal-body" style="margin-top:-20px;">
                     <form id="validasi_transaksi">
                            <div class="form-row">
                                   <div class="form-group col-md-6">
                                          <label for="recipient-name" class="col-form-label"><b>Order id</b></label>
                                          <div class="input-group">
                                                 <div class="input-group-prepend">
                                                        <span class="input-group-text btn btn-warning text-black" style="border-radius:8px 0px 0px 8px;height:92%"><b><i class="fa-solid fa-lightbulb fa-lg"></i>&nbsp;</b></span>
                                                 </div>
                                                 <input type="text" class="form-control" name="bookingId" value="<?= $this->uri->segment(3); ?>" style="border-radius:0px 8px 8px 0px;height:40%;">
                                          </div>
                                   </div>
                                   <?php foreach ($sum_total as $s) : ?>
                                          <div class="form-group col-md-6">
                                                 <label for="recipient-name" class="col-form-label"><b>Total Tagihan</b></label>
                                                 <div class="input-group">
                                                        <div class="input-group-prepend">
                                                               <span class="input-group-text btn btn-warning text-black" style="border-radius:8px 0px 0px 8px;height:92%"><b>Rp.</b></span>
                                                        </div>
                                                        <?php $rupiah = number_format($s->price_total, 0, ',', '.'); ?>
                                                        <input type="text" class="form-control" id="total" name="total" value="<?= $rupiah; ?>" style="border-radius:0px 8px 8px 0px;height:40%;" readonly>
                                                 </div>
                                          </div>
                                   <?php endforeach; ?>

                            </div>
                            <div class="form-row">

                                   <div class="form-group col-md-6">
                                          <label for="recipient-name" class="col-form-label"><b>Nominal dibayarkan</b></label>
                                          <div class="input-group">
                                                 <div class="input-group-prepend">
                                                        <span class="input-group-text text-white btn btn-primary text-black" style="border-radius:8px 0px 0px 8px;height:92%"><b>Rp.</b></span>
                                                 </div>
                                                 <input type="text" class="form-control" id="bayar" name="bayar" style="border-radius:0px 8px 8px 0px;height:40%;">
                                          </div>


                                   </div>
                                   <div class="form-group col-md-6">
                                          <br><br>
                                          <div class="input-group" style="margin:11px;">
                                                 <button type="button" onclick="hitung()" class="btn btn-primary circular btn-sm " style="width: 100%;height:100%;border-radius:9px;float:right;"><b>Hitung Kembalian</b></button>
                                          </div>

                                   </div>
                                   <div class="form-group col-md-12 ">
                                          <label for="recipient-name" class="col-form-label"><b>Kembalian</b></label>
                                          <div class="input-group">
                                                 <div class="input-group-prepend">
                                                        <span class="input-group-text text-white btn btn-success text-black" style="border-radius:8px 0px 0px 8px;height:92%"><b>Rp.</b></span>
                                                 </div>
                                                 <input type="text" class="form-control" id="kembalian" name="kembalian" value="0" readonly style="border-radius:0px 8px 8px 0px;height:40%;">

                                          </div>
                                   </div>

                                   <div class="form-group col-md-6">
                                          <label for="recipient-name" class="col-form-label"><b>Tanggal order</b></label>
                                          <div class="input-group">
                                                 <div class="input-group-prepend">
                                                        <?php
                                                        $tanggal = date("d F Y");
                                                        ?>
                                                        <span class="input-group-text btn btn-warning text-black" style="border-radius:8px 0px 0px 8px;height:92%"><b><i class="fa-regular fa-calendar fa-xl"></i></b></span>
                                                 </div>
                                                 <input type="text" class="form-control" id="tanggal" name="tanggal" style="border-radius:0px 8px 8px 0px;height:40%;" value="<?= $tanggal; ?>" placeholder="cth. 081112121313" readonly>
                                          </div>
                                   </div>
                                   <!-- no meja -->
                                   <input type="text" name="no_meja" value="<?= $this->uri->segment(4); ?>" hidden>
                                   <!-- no meja -->

                                   <div class="form-group col-md-6">
                                          <label for="recipient-name" class="col-form-label"><b>Verified admin</b></label>
                                          <div class="input-group">
                                                 <div class="input-group-prepend">
                                                        <span class="input-group-text btn btn-warning text-black" style="border-radius:8px 0px 0px 8px;height:92%"><b><i class="fa-regular fa-calendar fa-xl"></i></b></span>
                                                 </div>
                                                 <input type="text" class="form-control" id="nama_admin" name="nama_admin" style="border-radius:0px 8px 8px 0px;height:40%;" value="<?= $user['userNama']; ?>" placeholder="cth. admin resto" readonly>
                                          </div>
                                   </div>
                            </div>





                            <small>Setelah tombol <b>Selesaikan Transaksi</b> ditekan maka <b>No.Tagihan/Order id&nbsp;#<?= $this->uri->segment(3); ?></b> akan langsung menampilkan pop up print </small>
                            <div class="modal-footer">

                                   <label id="pesan"></label>

                                   <button type="submit" id="validasiOrder" class="btn btn-light circular btn-sm " style="width: 200px;background-color: #D3D3D3;border-radius:9px;float:right;"><b>Simpan Data</b></button>


                            </div>
                     </form>

              </div>

       </div>

</div>
</div>
<?php include 'resto-tr.php'; ?>