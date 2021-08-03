
<div class="box box-info">
  <div class="box-header">
    <h3 class="box-title">Form Pengguna</h3>
  </div>
  <div class="box-body">
  <form action="<?php echo base_url() ?>Gudang/inc_pengguna" method="post">
    <div class="form-group">
      <label>Username :</label>
      <input type="text" name="usr_txt" id="usr" class="form-control" placeholder="Username" autofocus>
    </div>
    <div class="form-group">
      <label>Nama :</label>
      <input type="text" name="nm_txt" id="nm" class="form-control" placeholder="Nama">
    </div>
    <div class="form-group">
      <label>Password :</label>
      <input type="password" name="pw_txt" class="form-control" placeholder="Password">
    </div>
    <div class="form-group">
      <label>Status :</label>
      <select class="form-control" name="status" id="stts_" required>
        <option value="">Pilih</option>
        <option value="Gudang">Gudang</option>
        <option value="Pimpinan">Pimpinan</option>
      </select>
    </div>
    <input type="hidden" name="act" id="act">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i> Simpan</button>
    <button type="reset" id="reset" class="btn btn-default"><i class="fa fa-refresh fa-fw"></i></button>
  </div>
  </form>
</div>