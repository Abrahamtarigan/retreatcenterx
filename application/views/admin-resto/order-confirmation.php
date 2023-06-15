<style>
    <style>#customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }

    #aui-flag-container {
        position: fixed;
        top: 60px;
        right: 50%;
        z-index: 4000;
    }

    .aui-flag-stack {
        position: relative;
    }

    #aui-flag-container>.aui-flag-stack>div.aui-flag-stack-top-item[aria-hidden="false"] {
        display: block;
        transition: transform .5s .5s, top .5s, opacity .8s;
    }

    .aui-flag[aria-hidden="false"] {
        opacity: 1;
        top: 0;
        left: 0;
    }

    .aui-flag {
        left: 0;
        max-height: 300px;
        opacity: 0;
        position: relative;
        top: -10px;
        transition: opacity .2s, top .5s;
    }

    .aui-flag .aui-message {
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
        margin-bottom: 20px;
        border-top-width: 1px;
        border-right-width: 1px;
        border-bottom-width: 1px;
        border-left-width: 1px;
        border-radius: 3px;
        width: 500px;
    }

    aui-message:first-child,
    .aui-message:first-child {
        margin-top: 0;
    }

    .aui-message {
        background: #fff;
        border: 1px solid #3572b0;
        border-radius: 3px;
        color: #333;
        line-height: 20px;
        margin: 20px 0 0 0;
        overflow-wrap: break-word;
        padding-bottom: 20px;
        padding-left: 60px;
        padding-right: 40px;
        padding-top: 20px;
        position: relative;
        word-wrap: break-word;
        word-break: break-word;
    }

    .aui-message.warning,
    .aui-message-warning {
        background: #fff;
        border-color: #EDC211;
        color: #333;
    }

    .aui-message.error,
    .aui-message-error {
        background: #fff;
        border-color: #d04437;
        color: #333;
    }

    .aui-message.success,
    .aui-message-success {
        background: #fff;
        border-color: #669900;
        color: #333;
    }

    .aui-message.success:before,
    .aui-message-success:before {
        background-color: #669900;
    }

    .aui-message.error:before,
    .aui-message-error:before {
        background-color: #d04437;
    }

    .aui-message.warning:before,
    .aui-message-warning:before {
        background-color: #EDC211;
    }

    .aui-message:before {
        background-color: #3572b0;
    }

    .aui-message:before {
        background-color: #3572b0;
        bottom: 0;
        content: '';
        left: 0;
        position: absolute;
        top: 0;
        width: 40px;
    }

    .aui-message p.title {
        font-weight: bold;
    }

    .aui-message p.title strong {
        font-weight: inherit;
    }


    .aui-message.closeable:hover .icon-close,
    .aui-message.closeable .icon-close:focus,
    .aui-message.closeable:not(.fadeout):not(.aui-will-close) .icon-close {
        opacity: 1;
    }

    .aui-message.closeable .icon-close {
        top: 10px;
    }

    .aui-message.closeable .icon-close {
        cursor: pointer;
        left: auto;
        opacity: 0;
        position: absolute;
        right: 20px;
        top: 20px;
    }

    .aui-message .aui-icon.icon-close {
        background-image: none;
        color: #707070;
        text-indent: inherit;
    }

    .aui-message .aui-icon {
        background-position: center;
    }

    .aui-icon {
        background-repeat: no-repeat;
        border: none;
        display: inline-block;
        height: 16px;
        margin: 0;
        padding: 0;
        text-align: left;
        /*text-indent: -999em;*/
        vertical-align: text-bottom;
        width: 16px;
    }

    .aui-message.success:after,
    .aui-message-success:after {
        content: "\f05d";
        color: #fff;
    }

    .aui-message.warning:after,
    .aui-message-warning:after {
        content: "\f071";
        color: #fff;
    }

    .aui-message.error:after,
    .aui-message-error:after {
        content: "\f06a";
        color: #fff;
    }

    .aui-message:after {
        content: "\f05a";
        color: #fff;
    }

    .aui-message:after {
        color: #fff;
        font-family: 'FontAwesome';
        font-size: 18px;
        -webkit-font-smoothing: antialiased;
        font-style: normal;
        font-weight: normal;
        left: 12px;
        line-height: 1;
        margin-top: -8px;
        position: absolute;
        speak: none;
        top: 50%;
    }
</style>

<div class="container-fluid">

    <div class="container-fluid">
        <br>

        <div class="row">

            <div class="col-lg-12">


                <article class="card-group-item">

                    <div class="filter-content">

                    </div>
                </article>
            </div>
            <div class="col-lg-6">

                <table id="menadata" class="">




                    <div class="aui-message aui-message-success warning closeable shadowed "><b>Silahkan Cek Kembali Orderan anda</b> <br><small>Untuk Merubah Silahkan kembali kehalaman sebelumnya</small><!-- .aui-message -->


                    </div>
                    <br />
                    <thead>
                        <?php $i = 1; ?>
                        <tr>
                            <th class="description">#</th>
                            <th class="description">Produk</th>
                            <th class="quantity">Price/Items</th>
                            <th class="quantity">qty</th>
                            <th class="price">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach ($this->cart->contents() as $items) : ?>
                                <td class="description"><?= $i; ?></td>
                                <td class="description"><?= $items['name'] ?></td>
                                <td class="description">Rp.<?= $items['price'] ?></td>
                                <td class="quantity">x<?= $items['qty'] ?></td>

                                <td class="price">Rp.<?= number_format($items['subtotal'], 0, ',', '.') ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>




                    </tbody>

                </table>
                <hr />
                <h2><a class="badge badge-dark text-warning" href="<?= base_url('adminresto/confirmation/' . $this->uri->segment(3)) ?>" style="width:100%;">Total Rp <?= number_format($this->cart->total(), 0, ',', '.') ?></h5></a></h2>
                <br />


            </div>
            <div class="col-lg-6">

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">



                        </div>
                    </div>
                </div>

                <div class="modal-content " style="border-radius:10px;">
                    <div class="form-group col-md-12">
                        <label for="recipient-name" class="col-form-label modal-title" id="exampleModalLabel">
                            <h5><b>Data order<small></small> </b> </h5>
                            <small style="font-color:grey">Tambahkan keterangan dari order<b></b> </small>
                        </label>


                        <div class="modal-body" style="margin-top:-20px;">
                            <form id="addOrderResto">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="recipient-name" class="col-form-label"><b>Customer</b></label>
                                        <input type="text" name="nama_customer" id="nama_customer" class="form-control  form-kecil form-sm border-form" id="inputTitle" placeholder="cth. Ludwig Tarigan" oninput="generateSlug()" style="border-radius:8px;height:40%;" value="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="recipient-name" class="col-form-label"><b>Order id</b></label>
                                        <input class="form-control form-sm" type="text" name="order_id" id="inputSlug" placeholder="Slug URL" readonly style="border-radius:8px;height:40%;" value="<?= $this->uri->segment(3); ?>" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="recipient-name" class="col-form-label"><b>Total Tagihan</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text btn btn-warning text-black" style="border-radius:8px 0px 0px 8px;height:92%"><b>Rp.</b></span>
                                            </div>
                                            <input type="text" class="form-control" id="total" name="total" value="<?= $this->cart->total() ?>" style="border-radius:0px 8px 8px 0px;height:40%;">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="recipient-name" class="col-form-label"><b>Nomor whatsapp</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text btn btn-warning text-black" style="border-radius:8px 0px 0px 8px;height:92%"><b><i class="fa-brands fa-whatsapp fa-xl"></i></b></span>
                                            </div>
                                            <input type="text" class="form-control" id="no_wa" name="no_wa" style="border-radius:0px 8px 8px 0px;height:40%;" placeholder="cth. 081112121313">
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


                                <!-- <div class="form-group">
                                        <label for="bayar">Jumlah Dibayarkan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" class="form-control" id="bayar" name="bayar" value="0">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-warning" onclick="hitung()" style="width: 100%">
                                        <h2>Cek Kembalian</h2>
                                    </button>
                                    <div class="form-group">
                                        <label for="kembalian">Kembalian</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" class="form-control" id="kembalian" name="kembalian" value="0" readonly>

                                        </div>
                                    </div>
 -->
                                <small><u>Posisi berada di <b>Meja&nbsp;<?= $this->uri->segment(4); ?></b> </u> </small><br>
                                <small>Setelah tombol simpan ditekan maka <b>Meja&nbsp;<?= $this->uri->segment(4); ?></b> akan langsung terkunci di nomor order <b>#<?= $this->uri->segment(3); ?></b> </small>
                                <div class="modal-footer">

                                    <label id="pesan"></label>

                                    <button type="submit" id="addOrder" class="btn btn-light circular btn-sm " style="width: 200px;background-color: #D3D3D3;border-radius:9px;float:right;"><b>Simpan Data</b></button>


                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


            <script>
                function hitung() {

                    var total = document.getElementById("total").value;
                    document.getElementById("total").value = formatRupiah(total);
                    var bayar = document.getElementById("bayar").value;
                    var kembalian = parseInt(hapusRupiah(bayar)) - total;
                    document.getElementById("kembalian").value = formatRupiah(kembalian);
                }

                function formatRupiah(angka) {
                    var reverse = angka.toString().split('').reverse().join('');
                    var ribuan = reverse.match(/\d{1,3}/g);
                    var hasil = ribuan.join('.').split('').reverse().join('');
                    return hasil;
                }

                function hapusRupiah(angka) {
                    return angka.replace(/[^0-9]/g, '');
                }
            </script>


        </div>
        <?php include 'order-js.php'; ?>
    </div>
    </body>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>CKEditor 5 – CKBox sample</title>
        <style>
            #container {
                width: 1000px;
                margin: 20px auto;
            }

            .ck-editor__editable[role="textbox"] {
                /* editing area */
                min-height: 200px;
            }

            .ck-content .image {
                /* block images */
                max-width: 80%;
                margin: 20px auto;
            }
        </style>
    </head>

    <body>


        <!-- <div id="container">
            <div id="editor"></div>
        </div> -->



    </body>

    </html>