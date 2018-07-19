<?php  ?>
<?php
date_default_timezone_set('Asia/Jakarta');
$tanggal = date('d/m/Y');
$nama_file = "Simpel_Arema(HPL)_".$tanggal.".xls";    
header("Pragma: public");   
header("Expires: 0");   
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");     
header("Content-Type: application/force-download");     
header("Content-Type: application/octet-stream");   
header("Content-Type: application/download");   
header("Content-Disposition: attachment;filename=".$nama_file."");  
header("Content-Transfer-Encoding: binary ");
?>
<table>
	<tr>
		<td align="center"><img src="<?php echo base_url()?>assets/img/nyoh.jpg"></td>
	</tr>
	<tr>
		<td align="center"></td>
	</tr>
	<tr>
		<td align="center"></td>
	</tr>
	<tr>
		<td><font color='red' size="4"><b>TABEL HPL</b></font></td>
	</tr>
	<tr>
		<td>
			<table cellpadding="8" style="border-collapse:collapse;" border="1">
				<thead>
					<tr>
						<th class="text-center" rowspan="2">Nama Rayon</th>
						<th class="text-center" colspan="2">Pelanggan TR</th>
						<th class="text-center" rowspan="2">HPL TR</th>
						<th class="text-center" colspan="2">Pelanggan TM</th>
						<th class="text-center" rowspan="2">HPL TM</th>
						<th class="text-center" colspan="2">Pelanggan Kolektif</th>
						<th class="text-center" rowspan="2">HPL KOLEKTIF</th>
					</tr>
					<tr>
						<th class="text-center">Total HPL</th>
						<th class="text-center">Jumlah Pelanggan</th>
						<th class="text-center">Total HPL</th>
						<th class="text-center">Jumlah Pelanggan</th>
						<th class="text-center">Total HPL</th>
						<th class="text-center">Jumlah Pelanggan</th>
					</tr>
				</thead>
				<tbody>
					<?php for ($i=0; $i < 14 ; $i++)  { ?>
						<tr>
							<td><?php echo $nama_rayon[$i]; ?></td>
							<td><?php echo $total_HPL_TR[$i]; ?></td>
							<td><?php echo $jumlah_data_pelanggan_bayar_TR[$i]; ?></td>
							<td><?php echo $HPL_TR[$i]; ?></td>
							<td><?php echo $total_HPL_TM[$i]; ?></td>
							<td><?php echo $jumlah_data_pelanggan_bayar_TM[$i]; ?></td>
							<td><?php echo $HPL_TM[$i]; ?></td>
							<td><?php echo $total_HPL_KOLEKTIF[$i]; ?></td>
							<td><?php echo $jumlah_data_pelanggan_bayar_KOLEKTIF[$i]; ?></td>
							<td><?php echo $HPL_KOLEKTIF[$i]; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</td>
	</tr>
</table>