<?php
  $count_barang = $this->db->query("SELECT * FROM tb_barang ORDER BY kd_barang DESC LIMIT 1");
 foreach($count_barang->result() as $i){
  $datakode = $i->kd_barang;
 }
  if (!empty($datakode)) {
      //$nilaikode = substr($datakode[0], 1);
      $kode = (int) $datakode;
      $kode = $kode + 1;
      $hasilkode = str_pad($kode, 7, "0", STR_PAD_LEFT);
  }else {
      $hasilkode = "0000001";
  }

  //var_dump($hasilkode)
?>
<div class="box box-info">
  <div class="box-header">
    <h3 class="box-title">Form Barang</h3>
  </div>
  <div class="box-body">
  <form action="<?php echo base_url() ?>Gudang/inc_barang" method="post">
    <div class="form-group">
      <label>Kode Barang :</label>
      <input type="text" name="kd_txt" value="<?php echo $hasilkode ?>" id="kd" class="form-control" placeholder="Kode Barang" readonly>
    </div>
    <div class="form-group">
      <label>Nama Barang :</label>
      <input type="text" name="nm_txt" id="nm" class="form-control" placeholder="Nama Barang" autofocus>
    </div>
    <div class="form-group">
      <label>Merk Barang :</label>
      <input type="text" name="merk_txt" id="warna" class="form-control" placeholder="Merk Barang">
    </div>
    <div class="form-group">
      <label>Harga Barang :</label>
      <input onkeypress="return event.charCode >=48 && event.charCode <=57" type="number" name="harga_txt" id="harga" class="form-control" placeholder="Harga Barang">
    </div>
    <input type="hidden" name="act" id="act">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i> Simpan</button>
    <button type="reset" id="reset" class="btn btn-default"><i class="fa fa-refresh fa-fw"></i></button>
  </div>
  </form>
</div>