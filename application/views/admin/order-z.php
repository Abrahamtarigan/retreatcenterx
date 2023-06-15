<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css">
        <title>Receipt example</title>
    </head>
    <style>
        * {
    font-size: 12px;
    font-family: 'Times New Roman';
}

td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.description,
th.description {
    width: 75px;
    max-width: 75px;
}

td.quantity,
th.quantity {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

td.price,
th.price {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 155px;
    max-width: 155px;
}

img {
    max-width: inherit;
    width: inherit;
}

@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
    </style>
    <body>
        <div class="ticket">
            <img src="./logo.png" alt="Logo">
            <p class="centered">RECEIPT EXAMPLE
                <br>Address line 1
                <br>Address line 2</p>
            <table>
                <thead>
                    <tr>
                        <th class="quantity">Q.</th>
                        <th class="description">Description</th>
                        <th class="price">$$</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="quantity">1.00</td>
                        <td class="description">ARDUINO UNO R3</td>
                        <td class="price">$25.00</td>
                    </tr>
                    <tr>
                        <td class="quantity">2.00</td>
                        <td class="description">JAVASCRIPT BOOK</td>
                        <td class="price">$10.00</td>
                    </tr>
                    <tr>
                        <td class="quantity">1.00</td>
                        <td class="description">STICKER PACK</td>
                        <td class="price">$10.00</td>
                    </tr>
                    <tr>
                        <td class="quantity"></td>
                        <td class="description">TOTAL</td>
                        <td class="price">$55.00</td>
                    </tr>
                </tbody>
            </table>
            <p class="centered">Thanks for your purchase!
                <br>parzibyte.me/blog</p>
        </div>
        <button id="btnPrint" class="hidden-print">Print</button>
        <script src="script.js"></script>
    </body>
</html>
<script>
    const $btnPrint = document.querySelector("#btnPrint");
$btnPrint.addEventListener("click", () => {
    window.print();
});
</script>

<style>
    <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

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
    transition: transform .5s .5s,top .5s,opacity .8s;
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
    transition: opacity .2s,top .5s;
}

.aui-flag .aui-message {
    box-shadow: 0 3px 6px rgba(0,0,0,0.2);
    margin-bottom: 20px;
    border-top-width: 1px;
    border-right-width: 1px;
    border-bottom-width: 1px;
    border-left-width: 1px;
    border-radius: 3px;
    width: 500px;
}

aui-message:first-child, .aui-message:first-child {
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
.aui-message.warning, .aui-message-warning {
    background: #fff;
    border-color: #EDC211;
    color: #333;
}
.aui-message.error, .aui-message-error {
    background: #fff;
    border-color: #d04437;
    color: #333;
}

.aui-message.success, .aui-message-success {
    background: #fff;
    border-color: #669900;
    color: #333;
}

.aui-message.success:before, .aui-message-success:before {
    background-color: #669900;
}
.aui-message.error:before, .aui-message-error:before {
    background-color: #d04437;
}

.aui-message.warning:before, .aui-message-warning:before {
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


.aui-message.closeable:hover .icon-close, .aui-message.closeable .icon-close:focus, .aui-message.closeable:not(.fadeout):not(.aui-will-close) .icon-close {
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

.aui-message.success:after, .aui-message-success:after {
    content: "\f05d";
    color: #fff;
}
.aui-message.warning:after, .aui-message-warning:after{
    content: "\f071";
    color: #fff;
}
.aui-message.error:after, .aui-message-error:after {
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
  
  <div class="page-breadcrumb __areasin">
                                
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                      
                                        <li class="breadcrumb-item active " aria-current="page"><a href="<?php echo site_url(''); ?>" class="breadcrumb-link"><?php echo $this->uri->segment(1); ?></a></li>
                                        <li class="breadcrumb-item active " aria-current="page"><a href="<?php echo site_url(''); ?>" class="breadcrumb-link"><?php echo $this->uri->segment(2); ?></a></li>
                                        <li class="breadcrumb-item active " aria-current="page"><a href="<?php echo site_url(''); ?>" class="breadcrumb-link"><?php echo $this->uri->segment(3); ?></a></li>
                                    </ol>
                                </nav>
                                <hr/>
                            </div>
</div>
<div class="container-fluid __areasin">

<div class="row">   
    
        <div class="col-lg-12">

        
             <article class="card-group-item">
            
                <div class="filter-content">
                
                </div>
            </article> 
        </div>
        <div class="col-lg-6">
           
            <table id="customers" >
           
           


    <div class="aui-message aui-message-success warning closeable shadowed __button_khas_all">Silahkan Cek Kembali Orderan anda<br><small>Untuk Merubah Silahkan kembali kehalaman sebelumnya</small><!-- .aui-message -->

</div>
<br/>
                <thead>
                    <?php $i = 1;?>
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
                    <?php $i++;?>
                    <?php endforeach; ?>
                   

                    
                   
                </tbody>
                
            </table>
            <hr/>
            <h2><a class="text-success" href="<?= base_url('adminresto/confirmation/'.$this->uri->segment(3)) ?>">Total Rp <?= number_format($this->cart->total(), 0, ',', '.') ?></h5></a></h2>
            <br/>
            
            
        </div>
        <div class="col-lg-6">
        Konfirmasi Pembayaran
        
        <hr>
        <article class="card-group-item">
            
            </article> 
        </div>
</div>
</div>
<!-- card-group-item.// -->
	