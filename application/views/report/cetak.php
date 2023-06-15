<html>
<head>
	<title>Cetak PDF</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <b><?php echo $ket; ?></b><br /><br />
    
	<table id="example" class="table table-striped" >
    <thead>
        <tr>
        <th>No.</th>
            <th>Room Name</th>
            <th>Booking Id</th>
            <th>Status Transaksi</th>
            <th>Tanggal Booking</th>
            <th>Nominal</th>
            <th>Pengubah Harga</th>
            <th>Keterangan</th>
           
            
        
            
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
            echo "<td>".$data->userEditPriceId."</td>";
            echo "<td>".$data->userEditKeterangan."</td>";          
            
    		
    		echo "</tr>";
    		$no++;
    	}
    }
    ?>

    </tbody>
    
   
    
</table>
<hr/>
<span style="padding-left:500px;">Total Pemasukan&nbsp;<?php echo $ket; ?></span>&nbsp;<span style="font-weight:bold;font-size:18px;float:right" id="val"></span><hr/>


        
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>