<div class="box box-info">
  <div class="box-header">
    <h3 class="box-title">Laporan Barang Keluar <i>Per</i> Tahun</h3>
  </div>
  <div class="box-body">
  <form target="_blank" action="<?php echo base_url() ?>report_keluar" method="post">
    <div class="form-group">
      <label>Tahun :</label>
      <select class="form-control" name="tahun" id="thn">
        <option>Pilih</option>
      </select>
    </div>
    <input type="hidden" name="action" value="tahun">
    <button type="submit" class="btn btn-primary"><i class="fa fa-print fa-fw"></i> Cetak</button>
    <button type="reset" id="reset" class="btn btn-default"><i class="fa fa-refresh fa-fw"></i></button>
  </div>
  </form>
</div>

<script type="text/javascript">
  var start = 2017;
  var end = new Date().getFullYear();
  var options = "";
  options += "<option>"+ "Pilih" +"</option>";
  for(var year = start ; year <=end; year++){
    options += "<option>"+ year +"</option>";
  }
  document.getElementById("thn").innerHTML = options;
</script>