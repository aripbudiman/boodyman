<?php
$sales = $this->db->query("SELECT * FROM tb_sales ORDER BY kd_sales DESC LIMIT 1");
foreach ($sales->result() as $i) {
  $datakode = $i->kd_sales;
}
if (!empty($datakode)) {
  //$nilaikode = substr($datakode[0], 1);
  $kode = (int) $datakode;
  $kode = $kode + 1;
  $hasilkode = str_pad($kode, 7, "0", STR_PAD_LEFT);
} else {
  $hasilkode = "0000001";
}

//var_dump($hasilkode)
?>

<div class="box box-info">
  <div class="box-header">
    <h3 class="box-title">Form Petugas</h3>
  </div>
  <div class="box-body">
    <form action="<?php echo base_url() ?>Gudang/inc_sales" method="post">
      <div class="form-group">
        <label>Kode Petugas :</label>
        <input type="text" name="kd_txt" id="kd" value="<?php echo $hasilkode ?>" class="form-control" placeholder="Kode Sales" readonly>
      </div>
      <div class="form-group">
        <label>Nama Petugas :</label>
        <input type="text" name="nm_txt" id="nm" class="form-control" placeholder="Nama Sales">
      </div>
      <div class="form-group">
        <label>No Telp :</label>
        <input type="text" onkeypress="return event.charCode >=48 && event.charCode <=57" name="telp_txt" id="telp" class="form-control" placeholder="No Telp Sales">
      </div>
      <div class="form-group">
        <label>E-mail :</label>
        <input type="mail" name="email_txt" id="email" class="form-control" placeholder="Email">
      </div>
      <input type="hidden" name="act" id="act">
      <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i> Simpan</button>
      <button type="reset" id="reset" class="btn btn-default"><i class="fa fa-refresh fa-fw"></i></button>
  </div>
  </form>
</div>