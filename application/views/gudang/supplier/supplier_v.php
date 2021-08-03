<link href="<?php echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>asset/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.js"></script>
<div id="respon1"></div>
<?php echo $this->session->flashdata('msg');?>
<div class="row">
    <div id="supplier_dt" class="col-md-8"><?php $this->load->view('gudang/supplier/supplier_dt_v') ?></div>
    <div id="supplier_fm" class="col-md-4"><?php $this->load->view('gudang/supplier/supplier_fm_v') ?></div>
</div>

<script type="text/javascript">
//Active Menu Sidebars
$(document).ready(function() { 
    $('#master').addClass('active');
    $('#supplier').addClass('active');
});
</script>