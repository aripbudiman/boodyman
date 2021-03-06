<div class="box box-info">
  <div class="box-header">
    <h3 class="box-title">Form Approve Barang Keluar</h3>
  </div>
  <div class="box-body">
    <form action="<?php echo base_url() ?>Approve/inc_keluar" method="post">
      <div class="col-md-12">
        <div class="form-group">
          <label>Nomor Barang Keluar :</label>
          <input type="text" name="nomor_txt" id="nomor" class="form-control" placeholder="Nomor Barang Keluar" readonly>
        </div>
        <div class="form-group">
          <label>Kode Sales :</label>
          <input type="text" name="kdsales_txt" id="kodesales" class="form-control" placeholder="Kode Sales" readonly>
        </div>
        <div class="form-group">
          <label>Nama Petugas :</label>
          <input type="text" name="nama_sales_txt" id="namasales" class="form-control" placeholder="Nama Sales" readonly>
        </div>
        <div class="form-group">
          <label>Kode Barang :</label>
          <input type="text" name="kdbarang_txt" id="xkode" class="form-control" placeholder="Kode Barang" readonly>
        </div>
        <div class="form-group">
          <label>Nama Barang :</label>
          <input type="text" name="nama_txt" id="xnama" class="form-control" placeholder="Nama Barang" readonly>
        </div>
        <div class="form-group">
          <label>Jumlah :</label>
          <input onkeypress="return event.charCode >=48 && event.charCode <=57 || event.charCode ==8" type="number" name="jumlah_txt" id="jumlah" class="form-control" placeholder="Jumlah" readonly>
        </div>
      </div>
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i> Simpan</button>
        <button type="reset" id="reset" class="btn btn-default"><i class="fa fa-refresh fa-fw"></i></button>
      </div>
  </div>
  </form>
</div>