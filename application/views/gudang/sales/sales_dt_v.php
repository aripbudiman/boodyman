<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-hdd-o fa-fw"></i>
    <h3 class="box-title">Data Sales</h3>
  </div>
  <div class="box-body">
    <div class="mailbox-messages table-responsive">
      <table class="table table-bordered table-striped" id="saless">
        <thead>
          <tr>
            <th width="5%">#</th>
            <th>Kode Petugas</th>
            <th>Nama Petugas</th>
            <th>No_Telp</th>
            <th>Email</th>
            <th class="text-center">Option</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 0;
          foreach ($sales->result() as $r1) {
            $no++;
          ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $r1->kd_sales ?></td>
              <td><?php echo $r1->nama_sales ?></td>
              <td><?php echo $r1->no_telp ?></td>
              <td><?php echo $r1->email ?></td>
              <td class="text-center" width="12%">
                <a href="javascript:;" class="btn btn-default btn-xs xtooltip" title="Edit"><i class="fa fa-edit" onclick="edit('<?php echo $r1->kd_sales ?>','<?php echo $r1->nama_sales ?>','<?php echo $r1->no_telp ?>','<?php echo $r1->email ?>')"></i></a>
                <a href="<?php echo base_url() ?>Gudang/hapus_sales/<?php echo $r1->kd_sales ?> " onclick="return confirm('Anda Yakin Ingin Menghapusnya ?')" class="btn btn-default btn-xs xtooltip" title="Hapus"><i class="fa fa-trash"></i></a>
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
  $(function() {
    $("#saless").dataTable({
      "iDisplayLength": 10,
      "processing": true,
      "serverSide": true,
    });

    $('.xtooltip').tooltip();
  });

  function edit(kd, nm, telp, email) {
    $("#kd").val(kd);
    $("#nm").val(nm);
    $('#telp').val(telp);
    $('#email').val(email);
    $('#act').val('edit');
  }
</script>