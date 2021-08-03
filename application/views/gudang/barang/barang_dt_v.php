<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-hdd-o fa-fw"></i>
    <h3 class="box-title">Data Barang</h3>
  </div>
  <div class="box-body">
    <div class="mailbox-messages table-responsive">
      <table class="table table-bordered table-striped" id="brg">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th class="text-center">Option</th>
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
                <td><?php echo $r1->merk ?></td>
                <td><?php echo $r1->harga ?></td>
                <td><?php echo $r1->stok ?></td>
                <td class="text-center" width="12%">
                    <a href="javascript:;" class="btn btn-default btn-xs xtooltip" title="Edit"><i class="fa fa-edit" onclick="edit('<?php echo $r1->kd_barang ?>','<?php echo $r1->nama_barang ?>','<?php echo $r1->merk ?>','<?php echo $r1->harga ?>','<?php echo $r1->stok ?>')"></i></a>
                    <a href="<?php echo base_url() ?>Gudang/hapus_barang/<?php echo $r1->kd_barang ?> " onclick="return confirm('Anda Yakin Ingin Menghapusnya ?')" class="btn btn-default btn-xs xtooltip" title="Hapus"><i class="fa fa-trash"></i></a>
                </td>
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
    $("#brg").dataTable({
      "iDisplayLength": 10,
      "processing": true,
          "serverSide": true,
    });
        
    $('.xtooltip').tooltip(); 
  });

function edit(kd,nm,warna,harga,stok){
  $("#kd").val(kd);
  $("#nm").val(nm);
  $('#warna').val(warna);
  $('#harga').val(harga);
  $('#stok').val(stok);
  $('#act').val('edit');
}
</script>