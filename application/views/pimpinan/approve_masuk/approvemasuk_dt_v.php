<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-hdd-o fa-fw"></i>
    <h3 class="box-title">Detail Transaksi Pemasukan Barang</h3>
  </div>
  <div class="box-body">
    <div class="mailbox-messages table-responsive">
      <table class="table table-bordered table-striped" id="xyzkeluar">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th>Tanggal</th>
                <th>No.Barang Masuk</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $no = 0;
            foreach($approve->result() as $r1){
                $no++;
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo date('d-m-Y',strtotime($r1->tgl_masuk)) ?></td>
                <td><?php echo $r1->no_barangmasuk ?></td>
                <td><?php echo $r1->kd_barang ?></td>
                <td><?php echo $r1->nama_barang ?></td>
                <td><?php echo $r1->jumlah ?></td>
                <td><?php echo $r1->harga ?></td>
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
    $("#xyzkeluar").dataTable({
      "iDisplayLength": 10,
      "processing": true,
          "serverSide": true,
    });
        
    $('.xtooltip').tooltip(); 
  });
</script>