<?php
  $count_supplier = $this->db->query("SELECT * FROM tb_supplier ORDER BY kd_supplier DESC LIMIT 1");
 foreach($count_supplier->result() as $i){
  $datakode = $i->kd_supplier;
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
    <h3 class="box-title">Form Supplier</h3>
  </div>
  <div class="box-body">
  <form action="<?php echo base_url() ?>Gudang/inc_supplier" method="post">
    <div class="form-group">
      <label>Kode Supplier :</label>
      <input type="text" name="kd_txt" id="kd" class="form-control" value="<?php echo $hasilkode ?>" placeholder="Kode Supplier" readonly>
    </div>
    <div class="form-group">
      <label>Nama Supplier :</label>
      <input type="text" name="nm_txt" id="nm" class="form-control" placeholder="Nama Supplier">
    </div>
    <div class="form-group">
      <label>No. Telp :</label>
      <input type="text" name="telp_txt" id="telp" class="form-control" placeholder="Nomor Telp">
    </div>
    <div class="form-group">
      <label>Alamat :</label>
      <textarea name="alamat_txt" id="alamat" class="form-control"></textarea>
    </div>
    <input type="hidden" name="act" id="act">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i> Simpan</button>
    <button type="reset" id="reset" class="btn btn-default"><i class="fa fa-refresh fa-fw"></i></button>
  </div>
  </form>
</div>