<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">



    </div>
  </div>
</div>
<button type="button" class="btn btn-primary aui-message aui-message-success  shadowed __button_khas_all text-white" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Lakukan Pembayaran</button>

<div class="modal fade alert alert-success" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">POS HITUNG</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="total">Total</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp</span>
              </div>
              <input type="text" class="form-control" id="total" name="total" value="<?= $this->cart->total() ?>">
            </div>
          </div>

          <div class="form-group">
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


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="<?= base_url('adminresto/bill/' . $this->uri->segment(3)); ?>" type="button" class="btn btn-success">Cetak Receipt</a>
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