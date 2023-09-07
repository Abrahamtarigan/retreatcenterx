<style>
       body {
              font-family: Arial, sans-serif;
              font-size: 10pt;
       }

       .header {
              text-align: center;
              margin-bottom: 10px;
       }

       .header h2,
       .header p {
              margin: 0;
       }

       .table {
              width: 100%;
              border-collapse: collapse;
       }

       .table th,
       .table td {
              padding: 5px;
              border: 1px solid #000;
       }

       .total {
              margin-top: 10px;
              text-align: right;
       }

       /* Menghindari pemisahan elemen pada halaman cetak */
       .avoid-page-break {
              page-break-inside: avoid;
       }
</style>


<body>
       <div class="header">
              <h2>Restoran ABC</h2>
              <p>Alamat Restoran, Kota</p>
              <p>Telp: 1234567890</p>
       </div>
       <table class="table avoid-page-break">
              <thead>
                     <tr>
                            <th>Items</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                     </tr>
              </thead>
              <tbody>
                     <tr>
                            <td>Nama Item 1</td>
                            <td>2</td>
                            <td>Rp20,000</td>
                     </tr>
                     <tr>
                            <td>Nama Item 2</td>
                            <td>1</td>
                            <td>Rp15,000</td>
                     </tr>
                     <tr>
                            <td>Nama Item 1</td>
                            <td>2</td>
                            <td>Rp20,000</td>
                     </tr>
                     <tr>
                            <td>Nama Item 2</td>
                            <td>1</td>
                            <td>Rp15,000</td>
                     </tr>


                     <!-- Tambahkan item lainnya sesuai kebutuhan -->
              </tbody>
       </table>
       <div class="total avoid-page-break">
              <p>Subtotal: Rp35,000</p>
              <h4>Total: Rp35,000</h4>
       </div>
</body>

</html>