<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=LAPORAN BARANG MASUK.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<?php
	$jml = $dtbarang->num_rows();
	if($jml>0){
?>

<table>
<tr>
	<td colspan='7' align="center"><?php echo $judul; ?></td>
</tr>
</table>

<!--isi-->
<table>
	<thead>
	    <tr>
	        <th width="5%">#</th>
	        <th>Tanggal</th>
	        <th>No.Barang Masuk</th>
	        <th>Kode Barang</th>
	        <th>Nama Barang</th>
	        <th>Jumlah</th>
	        <th>Harga</th>
	    </tr>
	</thead>
	<tbody>
	<?php
	    $no = 0;
	    foreach($dtbarang->result() as $r1){
	        $no++;
	        $nobarang = $r1->no_barangmasuk;
	?>
	    <tr>
	        <td><?php echo $no; ?></td>
	        <td><?php echo date('d-m-Y',strtotime($r1->tgl_masuk)) ?></td>
	        <td><?php echo "'".$nobarang ?></td>
	        <td><?php echo $r1->kd_barang ?></td>
	        <td><?php echo $r1->nama_barang ?></td>
	        <td><?php echo $r1->jumlah ?></td>
	        <td><?php echo $r1->harga ?></td>
	    </tr>
	<?php
	    }
	?>
	</tbody>
</table>
<?php
	}else{
		echo "No Data Found";
	}
?>