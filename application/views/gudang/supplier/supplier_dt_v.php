<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-hdd-o fa-fw"></i>
    <h3 class="box-title">Data Supplier</h3>
  </div>
  <div class="box-body">
    <div class="mailbox-messages table-responsive">
      <table class="table table-bordered table-striped" id="sup">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th>Kode Supplier</th>
                <th>Nama Supplier</th>
                <th>No. Telp</th>
                <th>Alamat</th>
                <th class="text-center">Option</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $no = 0;
            foreach($supplier->result() as $r1){
                $no++;
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $r1->kd_supplier ?></td>
                <td><?php echo $r1->nama_supplier ?></td>
                <td><?php echo $r1->no_telp ?></td>
                <td><?php echo $r1->alamat ?></td>
                <td class="text-center" width="12%">
                    <a onclick="edit('<?php echo $r1->kd_supplier ?>','<?php echo $r1->nama_supplier ?>','<?php echo $r1->no_telp ?>','<?php echo $r1->alamat ?>')" class="btn btn-default btn-xs xtooltip" title="Edit"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo base_url() ?>Gudang/hapus_supplier/<?php echo $r1->kd_supplier ?> " onclick="return confirm('Anda Yakin Ingin Menghapusnya ?')" class="btn btn-default btn-xs xtooltip" title="Hapus"><i class="fa fa-trash"></i></a>
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
    $("#sup").dataTable({
      "iDisplayLength": 10,
      "processing": true,
          "serverSide": true,
    });
        
    $('.xtooltip').tooltip(); 
  });

function edit(kd,nm,telp,alamat){
  $("#kd").val(kd);
  $("#nm").val(nm);
  $('#telp').val(telp);
  $('#alamat').val(alamat);
  $('#act').val('edit');
}
</script>