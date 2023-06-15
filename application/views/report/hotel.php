<div class="menu-berhasil-pop" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<?php if ($this->session->flashdata('message')) : ?>

<?php endif; ?>

<aside class="col-sm-9">

  <div class="container">
    <h3><?= $title;?>
      
    </h3>

    <small>Silahkan gunakan halaman ini melihat dan mencetak report berdasarkan tanggal, bulan, dan Tahun</small>
    <hr />
   
<head>
	<title>PDF</title>
   
</head>
<body>
<form method="get" action="">
   <span>Cari berdasarkan</span>
   <select id ="xfil" name="xfil" onchange = "Div()">
   <option value="">Pilih</option>
            <option value="1">Per Tanggal</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
   </select>
   <div  id="tanggal" style="display: none">
            <label>Tanggal</label><br>
            <input class="form-control" type="date" name="tanggal" class="input-tanggal" />
            <br /><br />
        </div>
   <div  id="bulan" style="display: none">
            <label>Bulan</label><br>
            <select class="form-control" name="bulan">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <br /><br />
        </div>
   <div id="tahun" style="display: none">
   <label>Tahun</label><br>
            <select class="form-control" name="tahun">
                <option value="">Pilih</option>
                <?php
                foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                    echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                }
                ?>
            </select>
            <br /><br />
   </div>
   <button class="btn btn-outline-secondary badge badge-primary" type="submit">Tampilkan</button>
   
        <a href="<?= base_url('report_h/'); ?>">Reset Filter</a>
            </form>
    <hr />
    
    <b><?php echo $ket; ?></b><br />
    <a class="btn btn-outline-secondary-btn-lg badge badge-danger" href="<?php echo $url_cetak; ?>">CETAK PDF</a><br /><br />

    <table id="example" class="table table-striped" >
    <thead>
        <tr>
        <th>No.</th>
            <th>Room Name</th>
            <th>Booking Id</th>
            <th>Status Transaksi</th>
            <th>Tanggal Booking</th>
            <th>Nominal</th>
           
            
        
            
        </tr>
    </thead>
    
    <tbody>
    <?php
    if( ! empty($transaksi)){
    	$no = 1;
    	foreach($transaksi as $data){
            $tgl = date('d-m-Y', strtotime($data->bookingStDt));
            
    		echo "<tr>";
            echo "<th>$no</th>";
            echo "<td>".$data->roomName."</td>";
            echo "<td>".$data->bookingId_text."</td>";
            
            echo "<td>".$data->status_booking_name."</td>";
            
    		echo "<td>".$tgl."</td>";
            echo "<td>".$data->bookingTotalPay."</td>";
                       
            
    		
    		echo "</tr>";
    		$no++;
    	}
    }
    ?>

    </tbody>
    
   
    
</table>
<span style="">Total Pemasukan&nbsp;<?php echo $ket; ?></span><hr/>
<span style="font-weight:bold;" id="val"></span>

        
        <script>
            
            var table = document.getElementById("example"), sumVal = 0;
            
            for(var i = 1; i < table.rows.length; i++)
            {
                sumVal = sumVal + parseInt(table.rows[i].cells[5].innerHTML);
            }
            
            document.getElementById("val").innerHTML = "Rp. " + sumVal.toLocaleString();
            console.log(sumVal);
           
        </script>
        

</body>


   <script>
      function Div() {
         
         if(xfil.value == 1){
            tanggal.style.display = 'block';
            bulan.style.display = 'none';
            tahun.style.display = 'none';
         }else if (xfil.value == 2){
            bulan.style.display = 'block';
            tahun.style.display = 'block';
            tanggal.style.display = 'none';
         }else if(xfil.value == 3){
            tahun.style.display = 'block';
            bulan.style.display = 'none';
            tanggal.style.display = 'none';
         }
         
      }
   </script>
   <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> 
   <!-- <script src="<?= base_url('assets/'); ?>jquery.tableTotal.js"></script>
    <script>
    $('#example').tableTotal();
    
</script> -->

   </html>
   <script>
    $(document).ready(function() {
    $('#example').DataTable( {
       
} );
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script> 
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> 
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script> 
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script> 
