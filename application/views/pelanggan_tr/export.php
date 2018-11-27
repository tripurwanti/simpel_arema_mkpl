<?php
date_default_timezone_set('Asia/Jakarta');
$tanggal = date('d/m/Y');
$nama_file = "Simpel_Arema(TR)_".$tanggal.".xls";    
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
		<td align="center"></td>
	</tr>
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
		<td align="center"></td>
	</tr>
	<tr>
		<td><font color='red' size="4"><b>MONITORING PELANGGAN TR</b></font></td>
	</tr>
	<tr>
		<td align="center"></td>
	</tr>
	<tr>
		<td align="center"></td>
	</tr>
	<tr>
		<td>
			<table cellpadding="8" style="border-collapse:collapse;" border="1">
				<thead>
					<tr bgcolor="#fc6103">
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
						<th class="text-center" colspan="14">Kebutuhan MDU</th>
						<th class="text-center" rowspan="2">TGL KIRIM NODIN (PK)<br>KE KON DARI REN</th>
						<th class="text-center" rowspan="2">TGL KIRIM NODIN (PK)<br>KE PENGADAAN DARI REN</th>
						<th class="text-center" rowspan="2">JANGKA WAKTU BAYAR S/D<br>NODIN (PK) KE KON</th>
						<th class="text-center" colspan="2">KETERANGAN (REN)</th>
						<th class="text-center" rowspan="2">NO. NOTA<br>DINAS (PK)</th>
						<th class="text-center" rowspan="2">NO. WO TIANG</th>
						<th class="text-center" rowspan="2">NAMA_PABRIKAN_WO_TIANG</th>
						<th class="text-center" rowspan="2">TGL_WO_TIANG</th>
						<th class="text-center" rowspan="2">TGL KIRIM NOTA DINAS (PK) KE VENDOR</th>
						<th class="text-center" rowspan="2">NAMA VENDOR PELAKSANA</th>
						<th class="text-center" rowspan="2">NOMOR SPK</th>
						<th class="text-center" rowspan="2">TANGGAL OPERASI PELAKSANAAN VENDOR</th>
						<th class="text-center" rowspan="2">PROGRESS</th>
						<th class="text-center" colspan="8">KESEDIAAN  MDU</th>
						<th class="text-center" rowspan="2">TGL NYALA</th>
						<th class="text-center" rowspan="2">TGL PDL</th>
						<th class="text-center" rowspan="2">&nbsp;&nbsp;HPL&nbsp;&nbsp;</th>
						<th class="text-center" rowspan="2">KETERANGAN</th>
					</tr>
					<tr bgcolor="#fc6103">
						<th class="text-center">A3CS (ms) 150 mm2</th>
						<th class="text-center">A3CS (ms) 240 mm2</th>
						<th class="text-center">MVTIC 240 mm2</th>
						<th class="text-center">SKTM 240 mm2</th>
						<th class="text-center">CUBICLE</th>
						<th class="text-center">TRAFO 50 kVA</th>
						<th class="text-center">TRAFO 100 kVA</th>
						<th class="text-center">TRAFO 160 kVA</th>
						<th class="text-center">TRAFO 200 kVA</th>
						<th class="text-center">TRAFO 250 kVA</th>
						<th class="text-center">LV PANEL</th>
						<th class="text-center">NA2XSEYB 3X150 mm2 (m)</th>
						<th class="text-center">NYFGbY 4X95, 4X70 (m)</th>
						<th class="text-center">BUNDLED 70, 35, 25, 16 (ms)</th>
						<th class="text-center">Angka</th>
						<th class="text-center">Uraian</th>
						<th class="text-center">A3CS 3x150 mm2</th>
						<th class="text-center">PIN ISOLATOR</th>
						<th class="text-center">HANG ISOLATOR</th>
						<th class="text-center">LA</th>
						<th class="text-center">CUBICLE</th>
						<th class="text-center">TRAFO</th>
						<th class="text-center">LV PANEL</th>
						<th class="text-center">BUNDLED   70, 35, 25, 16(ms)</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i=1;
					$c=12;
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

						echo '<td>=	IF(AND(K'.$c.'<>"";Q'.$c.'<>"");""&ABS(DAYS360(K'.$c.';Q'.$c.'))&" hari";
									IF(AND(K'.$c.'<>" ";Q'.$c.'<>"");"BLM ADA TGL BAYAR";
									IF(AND(K'.$c.'<>"";Q'.$c.'<>" ");"BLM ADA TGL RAYON KIRIM GAMBAR";" BLM ADA TGL BAYAR DAN TGL RAYON KIRIM GAMBAR")))</td>';

						echo "<td>".$listhasil->A3CS."</td>";
						echo "<td>".$listhasil->MVTIC."</td>";
						echo "<td>".$listhasil->PIN_ISO."</td>";
						echo "<td>".$listhasil->HANG_ISO."</td>";
						echo "<td>".$listhasil->CUBICLE."</td>";
						echo "<td>".$listhasil->TRAVO_50."</td>";
						echo "<td>".$listhasil->TRAFO_100."</td>";
						echo "<td>".$listhasil->TRAFO_160."</td>";
						echo "<td>".$listhasil->TRAFO_200."</td>";
						echo "<td>".$listhasil->TRAFO_250."</td>";
						echo "<td>".$listhasil->LV_PANEL."</td>";
						echo "<td>".$listhasil->NA2XSEYB."</td>";
						echo "<td>".$listhasil->NYFGBY."</td>";
						echo "<td>".$listhasil->BUNDLED."</td>";
						echo "<td>".$listhasil->TGL_NODINKEKON."</td>";
						echo "<td>".$listhasil->TGL_NODINKEPENG."</td>";

						echo '<td>=	IF(AND(K'.$c.'<>"";AG'.$c.'<>"";AH'.$c.'<>" ");""&DAYS360(K'.$c.';AG'.$c.')&" hari";
									IF(AND(K'.$c.'<>"";AG'.$c.'<>" ";AH'.$c.'<>"");""&DAYS360(K'.$c.';AH'.$c.')&" hari";
									IF(OR(AND(K'.$c.'<>" ";AG'.$c.'<>"");(AND(K'.$c.'<>" ";AH'.$c.'<>"")));"BLM ADA TGL BAYAR";
									IF(AND(K'.$c.'<>"";AG'.$c.'<>" ";AH'.$c.'<>" ");"BLM ADA TGL KIRIM NODIN";"BLM ADA TGL BAYAR DAN TGL KIRIM NODIN "))))</td>';
						
						echo "<td>".$listhasil->KET_ANGKA."</td>";
						echo "<td>".$listhasil->KET_URAIAN."</td>";
						echo "<td>".$listhasil->NO_NOTADINAS."</td>";
						echo "<td>".$listhasil->NO_WO_TIANG."</td>";
						echo "<td>".$listhasil->NAMA_PABRIKAN_WO_TIANG."</td>";
						echo "<td>".$listhasil->TGL_WO_TIANG."</td>";
						echo "<td>".$listhasil->TGL_NOTDINKEVENDOR."</td>";
						echo "<td>".$listhasil->NAMA_VENDORPELAK."</td>";
						echo "<td>".$listhasil->NO_SPK."</td>";
						echo "<td>".$listhasil->TGL_OPERASI."</td>";
						echo "<td>".$listhasil->PROGRESS."</td>";
						echo "<td>".$listhasil->KON_A3CS."</td>";
						echo "<td>".$listhasil->PIN_ISOLATOR."</td>";
						echo "<td>".$listhasil->HANG_ISOLATOR."</td>";
						echo "<td>".$listhasil->KON_LA."</td>";
						echo "<td>".$listhasil->KON_CUBICLE."</td>";
						echo "<td>".$listhasil->KON_TRAFO."</td>";
						echo "<td>".$listhasil->KON_LVPANEL."</td>";
						echo "<td>".$listhasil->KON_BUNDLED."</td>";
						echo "<td>".$listhasil->TGL_NYALA."</td>";
						echo "<td>".$listhasil->TGL_PDL."</td>";

						echo '<td>=	IF(AND(K'.$c.'<>"";BD'.$c.'<>"");""&DAYS360(K'.$c.';BD'.$c.')&" hari";
									IF(AND(K'.$c.'<>" ";BD'.$c.'<>"");"BLM ADA TGL BAYAR";
									IF(AND(K'.$c.'<>"";BD'.$c.'<>" ");"BLM ADA TGL PDL";"BLM ADA TGL BAYAR DAN TGL PDL")))</td>';
						
						echo "<td>".$listhasil->KETERANGAN."</td>";
						echo "</tr>";
						$i++;
						$c++;
					endforeach;	
					?>
				</tbody>
			</table>

		</td>
	</tr>
</table>