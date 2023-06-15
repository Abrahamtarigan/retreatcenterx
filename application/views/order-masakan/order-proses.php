<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet"> 
<style>
    .__area {
  font-family: 'Cairo', sans-serif;
  color: #7c7671;
  margin-top: 10px
}
.__bayar {
    font-family: 'Cairo', sans-serif;
    color: black;
}
.__bayar_proses {
    font-family: 'Cairo', sans-serif;
    color: black;
    font-weight:bold;
}

.__card {
  max-width: 350px;
  margin: auto;
  cursor: pointer;
  position: relative;
  display: inline-block;
  color: unset;
}
.__card:hover {
  color: unset;
  text-decoration: none;
}
.__img {
  border-radius: 10px;
}

.__favorit {
  background-color: #fff;
  border-radius: 8px;
  color: #fc9d52;
  position: absolute;
  right: 15px;
  top: 8px;
  padding: 3px 4px; 
  font-size: 22px;
  line-height: 100%;
  box-shadow: 0 0 5px rgba(0,0,0,0.3);
  z-index: 1;
  border: 0;
}
.__favorit:hover {
  background-color: #fc9d52;
  color: #fff;
  text-decoration: none;
}
.__card_detail {
  box-shadow: 0 4px 15px rgba(175,77,0,0.13);
  padding: 13px;
  border-radius: 8px;
  margin: -30px 10px 0;
  position: relative;
  z-index: 2;
  background-color: #fff; 
}
.__card_detail h4 {
  color: #474340;
  line-height: 100%;
  font-weight: bold;
}
.__card_detail p {
  font-size: 13px;
  font-weight: bold;
  margin-bottom: 0.4rem;
}
.__type span {
  background-color: #feefe3;
  padding: 5px 10px 7px;
  border-radius: 5px;
  display: inline-block;
  margin-right: 10px;
  font-size: 12px;
  color: #fc9d52;
  font-weight: bold;
  line-height: 100%;
}
.__detail {
  margin-top: 5px;
}
.__detail i {
  font-size: 21px;
  display: inline-block;
  vertical-align: middle;
}
.__detail i:nth-child(3) {
  margin-left: 15px;
}
.__detail span {
  font-size: 16px;
  display: inline-block;
  vertical-align: middle;
  margin-left: 2px;
}
</style>

    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
   
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
       
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
       
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background: linear-gradient(109.6deg, rgb(20, 30, 48) 11.2%, rgb(36, 59, 85) 91.1%);">
                        <div class="page-header "><br/>
                            <h2 class="text-warning __bayar" style="font-weight:bold;">Transaksi</h2>
                            <div class="page-breadcrumb">
                                
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item text-warning"><a href="<?php echo site_url(''); ?>" class="breadcrumb-link text-warning __area">Dashboard</a></li>
                                        <li class="breadcrumb-item active text-warning" aria-current="page"><?php echo $this->uri->segment(1); ?></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                
                <br/>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                   <div class="col">
                        <div class="card">
                            <div class="card-header p-4">
                                 <a class="pt-2 d-inline-block" href="<?php echo site_url(''); ?>"><?php echo $title; ?></a><br><?php echo $user['userNama']; ?>

                               
                                <div class="float-right"> <h3 class="mb-0 __bayar">Invoice #<?php echo $bookRestoId; ?></h3>
                                Tanggal: <?php echo date('d M, Y'); ?></div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-sm">
                                    <table class="table table-striped __bayar_proses">
                                        <thead>
                                            <tr><th class="center">order id</th>
                                                <th class="center">#</th>
                                                <th>Item</th>
                                                <th class="right ">Unit Cost</th>
                                                <th class="center">Qty</th>
                                                <th class="right">Total</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($masakan as $key => $value) { ?>
                                                <tr>
                                                    <td>#<?php echo $bookRestoId; ?></td>
                                                    <td><?php echo $key + 1; ?></td>
                                                    <td><?php echo $value; ?></td>
                                                    <td><?php echo $harga[$key]; ?></td>
                                                    <td><?php echo $qty[$key]; ?></td>
                                                    <td><?php echo $harga[$key] * $qty[$key]; ?></td>
                                                </tr>
                                            <?php $total[] = $harga[$key] * $qty[$key]; ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-4 mt-4 ml-auto">
                                        <table class="table table-clear">
                                            <tbody>
                                                <tr>
                                                    <td class="left">
                                                        <strong class="text-dark">No Meja</strong>
                                                    </td>
                                                    <td class="right">
                                                        <strong class="text-dark"><?php echo $no_meja; ?></strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="left">
                                                        <strong class="text-dark">Total</strong>
                                                    </td>
                                                    <td class="right">
                                                        <strong class="text-dark">Rp <?php echo array_sum($total); ?></strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><a href="" class="btn btn-primary btn-block simpan">Simpan</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-white">
                                <p class="mb-0"><?php echo $alamat; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <br/>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
       <!-- jquery 3.3.1 -->
<script src="<?php echo base_url(); ?>assets/concept-master/assets/vendor/jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script>
        $('.simpan').attr('href', `<?php echo site_url('transaksi/add'); ?>${window.location.search}`)
    </script>
</body>
 
</html>