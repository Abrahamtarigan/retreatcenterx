<div class="row">
      <div class="col-lg-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Total Transaksi Berhasil</h5>
            <hr />
            <h3 class="card-title" style="font-weight:bold;">
            
              <?= $count_success_transactions;?>
             
            </h3>
            <small>Total dari Keseluruhan data</small>
          </div>
        </div>
      </div>
     
      <div class="col-lg-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Transaksi Berlangsung</h5>
            <hr />
            <h3 class="card-title" style="font-weight:bold;">
            
              <?= $count_success_transactions_on_going;?>
             
            </h3>
            <small>Total dari Keseluruhan data</small>
          </div>
        </div>
      </div>
      <div class="col-lg-3" >
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title">Menunggu Pembayaran</h5>
            <hr />
            <h3 class="card-title" style="font-weight:bold;">
            
              <?= $count_pending_transactions;?>
             
            </h3>
            <small>Total dari Keseluruhan data</small>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Konfirmasi Pembayaran</h5>
            <hr />
            <h3 class="card-title" style="font-weight:bold;">
            
            <?= $count_waiting_confirmation;?></h6>
             
            </h3>
            <small>Untuk dapat segera di check</small>
          </div>
        </div>
      </div>
      
      
    </div>
    <br/>
    <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <center>
          <div class="card-body">
            <h5 class="card-title">Total Pemasukan</h5>
            <hr />
            <h3 class="card-title" style="font-weight:bold;">
            
            <?='Rp. '.number_format($total_earnings, 0, ".", ".")?></h6>
             
            </h3>
            <small>Total dari Transaksi Berhasil</small>
          </div>
          </center>
          
        </div>
      </div>
    
      
    </div>
  </div>