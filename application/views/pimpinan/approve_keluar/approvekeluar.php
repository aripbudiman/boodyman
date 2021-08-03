<div class="box box-info">
  <div class="box-header">
    <h3 class="box-title">Tanggal Transaksi</h3>
  </div>
  <div class="box-body">
    <form id="form-cari" method="post">
        <div class="col-sm-10">
            <input type="date" class="form-control" name="tgl_transaksi" required>
        </div>
        <div class="col-sm-1">
            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Cari</button>
        </div>
    </form>
  </div>
</div>

<!--Data-->
<div id="respon1">
</div>
<div id="xyz">
  <?php $this->load->view('pimpinan/approve_keluar/datasementara'); ?>
</div>

<script type="text/javascript">
//Submit
$('#form-cari').submit(function (event) {
    dataString = $("#form-cari").serialize();
    $.ajax({
        type:"POST",
        url:"<?php echo base_url(); ?>Approve/cari_keluar",
        data:dataString,
        beforeSend:function(){
            $("#respon1").html('<img src="<?=base_url();?>ajax-loader.gif"/><span>harap tunggu...</span>');
        },
        success:function(x){
            $("#respon1").html(x);
            $('#reset').click();
            $('#xyz').hide();
            return false;
        },
    });
    event.preventDefault();
});
</script>