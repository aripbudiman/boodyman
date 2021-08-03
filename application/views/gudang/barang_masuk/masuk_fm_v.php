<div class="box box-info">
  <div class="box-header">
    <h3 class="box-title">Form Transaksi Barang Masuk</h3>
  </div>
  <div class="box-body">
    <form action="<?php echo base_url() ?>Transaksi/inc_barangmasuk" method="post">
      <div class="col-md-6">
        <div class="form-group">
          <label>Nomor Barang Masuk :</label>
          <input type="text" value="<?php echo $kode ?>" name="nomor_txt" id="nomor" class="form-control" placeholder="Nomor Barang Masuk" readonly>
        </div>
        <div class="form-group">
          <label>Tgl Barang Masuk :</label>
          <input type="date" name="tgl_txt" id="tgl" class="form-control" placeholder="Tgl Barang Masuk">
        </div>
        <div class="form-group">
          <label>Kode Barang :</label>
          <div class="input-group">
            <input type="text" name="kdbarang_txt" id="xkode" class="form-control" placeholder="Kode Barang" autofocus onkeypress="return event.charCode == 8">
            <div class="input-group-btn">
              <button data-toggle="modal" data-target="#modal_barang" type="button" class="btn btn-primary"><i class="fa fa-folder"></i></button>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Nama Barang :</label>
          <input type="text" name="nama_txt" id="xnama" class="form-control" placeholder="Nama Barang" readonly>
        </div>
        <div class="form-group">
          <label>Harga :</label>
          <input type="text" name="harga_txt" id="xharga" class="form-control" placeholder="Harga Barang" readonly>
        </div>

      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Stok :</label>
          <input type="text" name="stok_txt" id="xstok" class="form-control" placeholder="Stok Barang" readonly>
        </div>
        <div class="form-group">
          <label>Jumlah :</label>
          <input onkeypress="return event.charCode >=48 && event.charCode <=57 || event.charCode ==8" type="number" name="jumlah_txt" id="jumlah" class="form-control" placeholder="Jumlah">
        </div>
        <div class="form-group">
          <label>Kode Supplier :</label>
          <div class="input-group">
            <input type="text" name="kdpelanggan_txt" id="xkodepel" class="form-control" placeholder="Kode Pelanggan" autofocus onkeypress="return event.charCode == 8">
            <div class="input-group-btn">
              <button data-toggle="modal" data-target="#modal_supplier" type="button" class="btn btn-primary"><i class="fa fa-folder"></i></button>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Nama Supplier :</label>
          <input type="text" name="nama_pelanggan_txt" id="namapelanggan" class="form-control" placeholder="Nama Pelanggan" readonly>
        </div>
      </div>
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i> Simpan</button>
        <button type="reset" id="reset" class="btn btn-default"><i class="fa fa-refresh fa-fw"></i></button>
      </div>
  </div>
  </form>
</div>

<!--modal Barang-->
<div class="modal fade" id="modal_barang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-hdd-o fa-fw"></i>Browse Data Barang</h4>
      </div>
      <div class="modal-body">
        <div class="mailbox-messages table-responsive">
          <table class="table table-bordered" id="xbrg">
            <thead>
              <tr>
                <th width="5%">#</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>Harga</th>
                <th>Stok</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              foreach ($barang->result() as $r1) {
                $no++;
              ?>
                <tr onclick="pilih('<?php echo $r1->kd_barang ?>','<?php echo $r1->nama_barang ?>','<?php echo $r1->harga ?>','<?php echo $r1->stok ?>')" data-dismiss="modal">
                  <td><?php echo $no; ?></td>
                  <td><?php echo $r1->kd_barang ?></td>
                  <td><?php echo $r1->nama_barang ?></td>
                  <td><?php echo $r1->merk ?></td>
                  <td><?php echo $r1->harga ?></td>
                  <td><?php echo $r1->stok ?></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default btn-sm" type="button" data-dismiss="modal"><i class="fa fa-close fa-fw"></i> Close</button>
      </div>
    </div>
  </div>
</div>

<!--modal Supplier-->
<div class="modal fade" id="modal_supplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-hdd-o fa-fw"></i>Browse Data Supplier</h4>
      </div>
      <div class="modal-body">
        <div class="mailbox-messages table-responsive">
          <table class="table table-bordered" id="xsup">
            <thead>
              <tr>
                <th width="5%">#</th>
                <th>Kode Supplier</th>
                <th>Nama Supplier</th>
                <th>No. Telp</th>
                <th>Alamat</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              foreach ($supplier->result() as $r1) {
                $no++;
              ?>
                <tr onclick="supli('<?php echo $r1->kd_supplier ?>','<?php echo $r1->nama_supplier ?>')" data-dismiss="modal">
                  <td><?php echo $no; ?></td>
                  <td><?php echo $r1->kd_supplier ?></td>
                  <td><?php echo $r1->nama_supplier ?></td>
                  <td><?php echo $r1->no_telp ?></td>
                  <td><?php echo $r1->alamat ?></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default btn-sm" type="button" data-dismiss="modal"><i class="fa fa-close fa-fw"></i> Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(function() {
    $('#xbrg').css('cursor', 'pointer');
    $("#xbrg").dataTable({
      "iDisplayLength": 10,
      "processing": true,
      "serverSide": true,
    });

    $('.xtooltip').tooltip();
  });

  function pilih(kd, nm, harga, stok) {
    $("#xkode").val(kd);
    $("#xnama").val(nm);
    $('#xharga').val(harga);
    $('#xstok').val(stok);
  }

  $(function() {
    $('#xsup').css('cursor', 'pointer');
    $("#xsup").dataTable({
      "iDisplayLength": 10,
      "processing": true,
      "serverSide": true,
    });

    $('.xtooltip').tooltip();
  });

  function supli(kd, nm) {
    $("#xkodepel").val(kd);
    $("#namapelanggan").val(nm);
  }
</script>