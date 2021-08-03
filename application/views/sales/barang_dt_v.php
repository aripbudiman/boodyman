<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-hdd-o fa-fw"></i>
    <h3 class="box-title">View Data Barang</h3>
  </div>
  <div class="box-body">
    <div class="mailbox-messages table-responsive">
      <table class="table table-bordered table-striped" id="brgview">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Warna</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $no = 0;
            foreach($barang->result() as $r1){
                $no++;
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $r1->kd_barang ?></td>
                <td><?php echo $r1->nama_barang ?></td>
                <td><?php echo $r1->warna ?></td>
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
  <!-- /.box-body -->
</div>

<script type="text/javascript">
  $(function () {
    $("#brgview").dataTable({
      "iDisplayLength": 10,
      "processing": true,
          "serverSide": true,
    });
        
    $('.xtooltip').tooltip(); 
  });
</script>