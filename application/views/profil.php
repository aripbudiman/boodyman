<?php
$usr = $this->session->userdata('username');
$profil = $this->db->query("SELECT * FROM users WHERE username='$usr' ");
foreach ($profil->result() as $r1) {
  $nama = $r1->nama;
  $foto = $r1->foto;
  $level = $r1->level;
}
$sales = $this->db->query("SELECT * FROM tb_sales WHERE email='$usr' ");
foreach ($sales->result() as $s) {
  $nama = $s->nama_sales;
  $level = 'Sales';
  $foto = $s->foto;
}
?>
<div class="row">
  <div class="col-md-7 col-md-offset-2">
    <div class="box box-solid">
      <div class="box-body">
        <div class="row">
          <div class="col-sm-6">
            <div class="callout callout-warning">
              <p>Ubah Password anda dengan benar, untuk menjaga keamanan data anda!</p>
            </div>
            <?php echo $this->session->flashdata('msg'); ?>
          </div>
        </div>
        <div class="row">
          <form class="form-horizontal" action="<?php echo base_url() ?>Profil/change" method="post" enctype="multipart/form-data">
            <div class="col-md-4">
              <div class="form-group">
                <div id="reg_imgreplace" class="text-center col-sm-12">
                  <?php
                  if ($foto) {
                    $img = $foto;
                  } else {
                    $img = 'thumb_def_user_picture.jpg';
                  }
                  ?>
                  <img src="<?php echo base_url('asset/dist/img/' . $img) ?>" alt="..." class="img-usr img-thumbnail">
                </div>
              </div>
              <input type="hidden" name="akses" value="<?php echo $level ?>">
              <div class="form-group">
                <div id="inputfile" class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-btn input-group-btn-sm">
                      <input type="file" name="file_upload" class="form-control btn btn-default">

                    </span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div id="inputfile" class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-btn input-group-btn-sm">
                      <button type="submit" class="btn btn-primary btn-block "><i class="fas fa-sync-alt"></i> Ganti Foto</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </form>

          <form class="form-horizontal" id="reg_form" action="<?php echo base_url() ?>Profil/ganti_password" method="post">
            <div class="col-md-12">
              <div class="form-group">
                <div class="col-sm-11">
                  Username :
                  <input name="reg_usr" value="<?php echo $usr ?>" type="text" class="form-control" readonly>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-11">
                  Nama Lengkap :
                  <input type="text" value="<?php echo $nama ?>" class="form-control" name="reg_name" readonly>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-11" data-toggle="tooltip">
                  AKSES LEVEL :
                  <input name="reg_akses" type="text" class="form-control" value="<?php echo $level ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-11" data-toggle="tooltip">
                  Password :
                  <input name="pw1" type="password" class="form-control" placeholder="Password" autofocus>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-11" data-toggle="tooltip">
                  Ulangi Password :
                  <input name="pw2" type="password" class="form-control" placeholder="Ulangi Password">
                </div>
              </div>
            </div>
            <input name="reg_hdnimg" id="reg_hdnimg" type="hidden" />

        </div>
      </div>
      <div class="box-footer bg-aqua">
        <div class="pull-right">
          <a href="<?php echo base_url() ?>Dashboard" class="btn btn-md btn-default btn-flat">Batal</a>
          <button data-loading-text="<i class='fa fa-refresh fa-spin'></i> Memproses..." class="btn btn-md btn-danger btn-flat" type="submit">Ubah Password</button>
        </div>
        <a class="btn btn-flat bg-aqua"><i class="fa fa-question-circle"></i> bantuan</a>
      </div>
      </form>
      <table bordercolor="#FFFFFF" border="1" width="100%">
        <tr>
          <td></td>
        </tr>
      </table>

    </div>
  </div>
</div>