<link href="<?php echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>asset/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.js"></script>
<div id="respon1"></div>
<?php echo $this->session->flashdata('msg');?>
<div class="row">
    <div id="lap_hari" class="col-md-4"><?php $this->load->view('pimpinan/lap-keluar/keluar_hari') ?></div>
    <div id="lap_bulan" class="col-md-4"><?php $this->load->view('pimpinan/lap-keluar/keluar_bln') ?></div>
    <div id="lap_thn" class="col-md-4"><?php $this->load->view('pimpinan/lap-keluar/keluar_thn') ?></div>
</div>

<script type="text/javascript">
//Active Menu Sidebars
$(document).ready(function() { 
    $('#lap').addClass('active');
    $('#lapkeluar').addClass('active');
});
</script>