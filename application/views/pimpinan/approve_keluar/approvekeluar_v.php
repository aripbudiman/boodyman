<link href="<?php echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>asset/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.js"></script>

<?php echo $this->session->flashdata('msg');?>
<div class="row">
	<div id="approvekeluar_dtsementara" class="col-md-8"><?php $this->load->view('pimpinan/approve_keluar/approvekeluar') ?></div>
	<div id="approvekeluar_fm" class="col-md-4"><?php $this->load->view('pimpinan/approve_keluar/approvekeluar_fm_v') ?></div>
</div>

<div class="row">
    <div id="approvekeluar_dt" class="col-md-12"><?php $this->load->view('pimpinan/approve_keluar/approvekeluar_dt_v') ?></div>
</div>

<script type="text/javascript">
//Active Menu Sidebars
$(document).ready(function() { 
    $('#approve').addClass('active');
    $('#apkeluar').addClass('active');
});
</script>