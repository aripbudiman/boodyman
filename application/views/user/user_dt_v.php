<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-hdd-o fa-fw"></i>
    <h3 class="box-title">Data Pengguna</h3>
  </div>
  <div class="box-body">
    <div class="mailbox-messages table-responsive">
      <table class="table table-bordered table-striped" id="brg">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Status</th>
                <th class="text-center">Option</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $no = 0;
            foreach($pengguna->result() as $r1){
                $no++;
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $r1->username ?></td>
                <td><?php echo $r1->nama ?></td>
                <td><?php echo $r1->level ?></td>
                <td class="text-center" width="12%">
                    <a href="javascript:;" class="btn btn-default btn-xs xtooltip" title="Edit"><i class="fa fa-edit" onclick="edit('<?php echo $r1->username ?>','<?php echo $r1->nama ?>','<?php echo $r1->level ?>')"></i></a>
                    <a href="<?php echo base_url() ?>Gudang/hapus_pengguna/<?php echo $r1->username ?> " onclick="return confirm('Anda Yakin Ingin Menghapusnya ?')" class="btn btn-default btn-xs xtooltip" title="Hapus"><i class="fa fa-trash"></i></a>
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

function edit(kd,nm,stts){
  $('#usr').val(kd);
  $('#nm').val(nm);
  $('#stts_').val(stts);
  $('#act').val('edit');
}
</script>