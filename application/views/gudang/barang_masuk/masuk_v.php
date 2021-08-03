<link href="<?php echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>asset/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.js"></script>
<div id="respon1"></div>
<?php echo $this->session->flashdata('msg');?>
<div class="row">
	<div id="masuk_fm" class="col-md-12"><?php $this->load->view('gudang/barang_masuk/masuk_fm_v') ?></div>
    <div id="masuk_dt" class="col-md-12"><?php $this->load->view('gudang/barang_masuk/masuk_dt_v') ?></div>
</div>

<script type="text/javascript">
//Active Menu Sidebars
$(document).ready(function() { 
    $('#transaksi').addClass('active');
    $('#masuk').addClass('active');
});
</script>