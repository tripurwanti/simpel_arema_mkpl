<?php
date_default_timezone_set('Asia/Jakarta');
$tanggal = date('d/m/Y');
$nama_file = "Simpel_Arema(TM)_".$tanggal.".xls";    
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
		<td><font color='red' size="4"><b>MONITORING PELANGGAN TM</b></font></td>
	</tr>
	<tr>
		<td>
			<table cellpadding="8" style="border-collapse:collapse;" border="1">
				<thead>
					<tr bgcolor="#eb9a14">
						<th class="text-center" rowspan="2" id="no">No</th>
						<th class="text-center" rowspan="2">IDPEL</th>
						<th class="text-center" rowspan="2">No Agenda</th>
						<th class="text-center" rowspan="2" id="nama">Nama Pelanggan</th>
						<th class="text-center" rowspan="2">Alamat Pelanggan</th>
						<th class="text-center" rowspan="2">Tarif Lama</th>
						<th class="text-center" rowspan="2">Daya Lama<br>(VA)</th>
						<th class="text-center" rowspan="2">Tarif Baru</th>
						<th class="text-center" rowspan="2">Daya Baru<br>(VA)</th>
						<th class="text-center" rowspan="2">Jenis Transaksi</th>
						<th class="text-center" rowspan="2">Tanggal Bayar</th>
						<th class="text-center" rowspan="2">Status Pemohon</th>
						<th class="text-center" rowspan="2">Tanggal PK</th>
						<th class="text-center" rowspan="2">Nama Rayon</th>
						<th class="text-center" rowspan="2">ID Rayon</th>
						<th class="text-center" rowspan="2">Ket Perluasan</th>
						<th class="text-center" rowspan="2">Tgl Rayon<br>Kirim Permohonan<br>PLG Ke PP/AREA</th>
						<th class="text-center" rowspan="2">Jangka Waktu<br>Permohonan s/d Kirim<br>Hasil SURVEY Ke PP</th>
						<th class="text-center" rowspan="2">TGL KIRIM NODIN KE PP<br>DARI REN (HASIL SURVEY)</th>
						<th class="text-center" rowspan="2">STATUS LAYAK /<br>TIDAK LAYAK</th>
						<th class="text-center" rowspan="2">TGL KIRIM NODIN(PK)<br>KE KON DARI REN</th>
						<th class="text-center" rowspan="2">JANGKA WAKTU BAYAR<br>S/D NODIN (PK)</th>
						<th class="text-center" colspan="2">Keterangan (REN)</th>
						<th class="text-center" rowspan="2">NO. NOTA DINAS (PK)</th>
						<th class="text-center" rowspan="2">NO. WO TIANG</th>
						<th class="text-center" rowspan="2">NAMA_PABRIKAN_WO_TIANG</th>
						<th class="text-center" rowspan="2">TGL_WO_TIANG</th>

						<th class="text-center" rowspan="2">TGL KIRIM NOTA<br>DINAS(PK) KE VENDOR</th>
						<th class="text-center" rowspan="2">NAMA VENDOR PELAKSANA</th>
						<th class="text-center" rowspan="2">NOMOR SPK</th>
						<th class="text-center" rowspan="2">TANGGAL OPERASI<br>PELAKSANAAN VENDOR</th>
						<th class="text-center" colspan="8">Kebutuhan MDU</th>
						<th class="text-center" rowspan="2">TANGGAL NYALA</th>
						<th class="text-center" rowspan="2">TANGGAL PDL</th>
						<th class="text-center" rowspan="2">HPL</th>
						<th class="text-center" rowspan="2">KETERANGAN</th>
					</tr>
					<tr bgcolor="#eb9a14">
						<th class="text-center">Angka</th>
						<th class="text-center">Uraian</th>
						<th class="text-center">A3CS</th>
						<th class="text-center">PIN ISOLATOR</th>
						<th class="text-center">HANG ISOLATOR</th>
						<th class="text-center">CUBICLE</th>
						<th class="text-center">TRAFO</th>
						<th class="text-center">LV PANEL</th>
						<th class="text-center">SKTM (ms)</th>
						<th class="text-center">BUNDLED   70, 35, 25, 16(ms)</th>
					</tr>
				</thead>
			</thead>
			<tbody>
				<?php
				$i=1;
				foreach($hasil as $listhasil):
					echo "<tr>";
					echo "<td class='text-center'>".$i."</td>";
					
					if ($listhasil->IDPEL=="") {
						$temp1="";
					}
					else{

						$temp1 = $listhasil->IDPEL."-";
					}

					echo "<td>".$temp1."</td>";

					if ($listhasil->NO_AGENDA=="") {
						$temp2="";
					}
					else{

						$temp2 = $listhasil->NO_AGENDA."-";
					}

					echo "<td>".$temp2."</td>";
					
					echo "<td>".$listhasil->NAMA_PEL."</td>";
					
					echo "<td>".$listhasil->ALAMAT_PEL."</td>";
					echo "<td>".$listhasil->TARIF_LAMA."</td>";
					echo "<td>".$listhasil->DAYA_LAMA."</td>";
					echo "<td>".$listhasil->TARIF_BARU."</td>";
					echo "<td>".$listhasil->DAYA_BARU."</td>";
					echo "<td>".$listhasil->JNS_TRANSAKSI."</td>";
					echo "<td>".$listhasil->TGL_BAYAR."</td>";
					echo "<td>".$listhasil->STATUS_PERMOHONAN."</td>";
					echo "<td>".$listhasil->TGL_PK."</td>";
					echo "<td>".$listhasil->NAMA_RYN."</td>";
					echo "<td>".$listhasil->ID_RYN."</td>";
					echo "<td>".$listhasil->KET_PERLUASAN."</td>";
					echo "<td>".$listhasil->TGL_RYNKIRIM."</td>";
					echo "<td>".$listhasil->JANGKA_SURVEYPP."</td>";
					
					echo "<td>".$listhasil->TGL_NODINPPDARIREN."</td>";
					echo "<td>".$listhasil->STATUS_KELAYAKAN."</td>";
					echo "<td>".$listhasil->TGL_NODINKEKON."</td>";
					echo "<td>".$listhasil->JANGKA_BAYAR."</td>";
					echo "<td>".$listhasil->KET_ANGKA."</td>";
					echo "<td>".$listhasil->KET_URAIAN."</td>";
					echo "<td>".$listhasil->NO_NOTADINAS."</td>";
					echo "<td>".$listhasil->NO_WO_TIANG."</td>";
					echo "<td>".$listhasil->NAMA_PABRIKAN_WO_TIANG."</td>";
					echo "<td>".$listhasil->TGL_WO_TIANG."</td>";

					echo "<td>".$listhasil->TGL_NODINKEVENDOR."</td>";
					echo "<td>".$listhasil->NAMA_VENDORPELAK."</td>";
					echo "<td>".$listhasil->NO_SPK."</td>";
					echo "<td>".$listhasil->TGL_OPERASI."</td>";
					echo "<td>".$listhasil->KON_A3CS."</td>";
					echo "<td>".$listhasil->PIN_ISOLATOR."</td>";
					echo "<td>".$listhasil->HANG_ISOLATOR."</td>";
					echo "<td>".$listhasil->KON_CUBICLE."</td>";
					echo "<td>".$listhasil->KON_TRAFO."</td>";
					echo "<td>".$listhasil->KON_LVPANEL."</td>";
					echo "<td>".$listhasil->KON_SKTM."</td>";
					echo "<td>".$listhasil->BUNDLED."</td>";
					
					echo "<td>".$listhasil->TGL_NYALA."</td>";
					echo "<td>".$listhasil->TGL_PDL."</td>";
					echo "<td>".$listhasil->HPL."</td>";
					echo "<td>".$listhasil->KETERANGAN."</td>";
					
					echo "</tr>";
					$i++;
				endforeach;
				?>
			</tbody>
		</table>

	</td>
</tr>
</table>