<div class="row">

	<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="info-box bg-aqua">
			<span class="info-box-icon"><i class="fas fa-box-open"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">BARANG</span>
				<span class="info-box-number"><?php echo $barang ?></span>
				<!-- The progress section is optional -->
				<div class="progress">
					<div class="progress-bar" style="width: 100%"></div>
				</div>
				<span class="progress-description">
					Jumlah Jenis Barang : <b><?php echo $barang ?></b>
				</span>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="info-box bg-green">
			<span class="info-box-icon"><i class="fas fa-truck-loading"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">SUPPLIER</span>
				<span class="info-box-number"><?php echo $supplier ?></span>
				<!-- The progress section is optional -->
				<div class="progress">
					<div class="progress-bar" style="width: 100%"></div>
				</div>
				<span class="progress-description">
					Jumlah Supplier : <b><?php echo $supplier ?></b>
				</span>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="info-box bg-yellow">
			<span class="info-box-icon"><i class="fas fa-users"></i></i></span>
			<div class="info-box-content">
				<span class="info-box-text">PETUGAS</span>
				<span class="info-box-number"><?php echo $sales ?></span>
				<!-- The progress section is optional -->
				<div class="progress">
					<div class="progress-bar" style="width: 100%"></div>
				</div>
				<span class="progress-description">
					Jumlah Petugas : <b><?php echo $sales ?></b>
				</span>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#beranda').addClass('active');
	});
</script>