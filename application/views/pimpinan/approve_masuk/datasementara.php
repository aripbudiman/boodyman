<div id="hasil_cari" class="box box-info">
  <div class="box-header">
    <i class="fa fa-hdd-o fa-fw"></i>
    <h3 class="box-title">Data Transaksi Pemasukan Barang</h3>
  </div>
  <div class="box-body">
    <div class="mailbox-messages table-responsive">
      <table class="table table-bordered table-striped" id="sementara">
        <thead>
            <tr>
                <th>No. Masuk</th>
                <th>Kode Barang</th>
                <th>Kode Supplier</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($hasil_cari->result() as $r1){        
        ?>
            <tr onclick="appr('<?php echo $r1->no_barangmasuk ?>','<?php echo $r1->kd_supplier ?>','<?php echo $r1->nama_supplier ?>','<?php echo $r1->kd_barang ?>','<?php echo $r1->nama_barang ?>','<?php echo $r1->jumlah ?>')">
                <td><?php echo $r1->no_barangmasuk ?></td>
                <td><?php echo $r1->kd_barang ?></td>
                <td><?php echo $r1->kd_supplier ?></td>
            </tr>
        <?php
            }
        ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- /.box-body -->
</div>

<script type="text/javascript">
  $(function () {
    $('#sementara').css('cursor','pointer');
    $("#sementara").dataTable({
      "iDisplayLength": 10,
      "processing": true,
          "serverSide": true,
    });
        
    $('.xtooltip').tooltip(); 
  });

  function appr(no,kdsales,nmsales,kdbarang,nmbarang,jumlah){
    $("#nomor").val(no);
    $("#kodesales").val(kdsales);
    $('#namasales').val(nmsales);
    $('#xkode').val(kdbarang);
    $('#xnama').val(nmbarang);
    $('#jumlah').val(jumlah);
  }
</script>