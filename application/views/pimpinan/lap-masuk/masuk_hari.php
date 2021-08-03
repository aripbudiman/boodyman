<div class="box box-info">
  <div class="box-header">
    <h3 class="box-title">Laporan Barang Masuk <i>Per</i> Hari</h3>
  </div>
  <div class="box-body">
  <form target="_blank" action="<?php echo base_url() ?>report" method="post">
    <div class="form-group">
      <label>Tanggal :</label>
      <input type="date" name="hari_txt" class="form-control" required>
      <input type="hidden" name="action" value="hari">
    </div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-print fa-fw"></i> Cetak</button>
    <button type="reset" id="reset" class="btn btn-default"><i class="fa fa-refresh fa-fw"></i></button>
  </div>
  </form>
</div>