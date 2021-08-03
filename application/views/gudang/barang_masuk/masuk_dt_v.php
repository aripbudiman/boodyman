<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-hdd-o fa-fw"></i>
    <h3 class="box-title">Data Transaksi Barang Masuk</h3>
  </div>
  <div class="box-body">
    <div class="mailbox-messages table-responsive">
      <table class="table table-bordered table-striped" id="tb_barngmasuk">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th>No. Barang Masuk</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Tgl Masuk</th>
                <th>Jumlah</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $no = 0;
            foreach($masuk->result() as $r1){
                $no++;
              $status = "<span style='font-size:10;' class='label label-success'>Telah Disetujui</span>";
                    if($r1->approve=='0')$status = "<span style='font-size:10;' class='label label-danger'>Belum Disetujui</span>";
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $r1->no_barangmasuk ?></td>
                <td><?php echo $r1->kd_barang ?></td>
                <td><?php echo $r1->nama_barang ?></td>
                <td><?php echo date('d-m-Y',strtotime($r1->tgl_masuk)); ?></td>
                <td><?php echo $r1->jumlah ?></td>
                <td><?php echo $status ?></td>
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
    $("#tb_barngmasuk").dataTable({
      "iDisplayLength": 10,
      "processing": true,
          "serverSide": true,
    });
        
    $('.xtooltip').tooltip(); 
  });
</script>