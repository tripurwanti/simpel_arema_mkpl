<?php
date_default_timezone_set('Asia/Jakarta');
$tanggal = date('d/m/Y');
$nama_file = "Simpel_Arema(KOL)_".$tanggal.".xls";    
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
		<td><font color='red' size="4"><b>MONITORING PELANGGAN KOLEKTIF</b></font></td>
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
					<tr>
						<th class="text-center" rowspan="2" id="no">No</th>
						<th class="text-center" rowspan="2">Nama Pemohon</th>
						<th class="text-center" rowspan="2">No Agenda</th>
						<th class="text-center" rowspan="2" id="nama">Nama Pelanggan</th>
						<th class="text-center" rowspan="2">Alamat Pelanggan</th>
						<th class="text-center" rowspan="2">Jumlah Calon PLG</th>
						<th class="text-center" rowspan="2">Total VA</th>
						<th class="text-center" rowspan="2">Tanggal Bayar</th>
						<th class="text-center" rowspan="2">Status Pemohon</th>
						<th class="text-center" rowspan="2">Tanggal PK</th>
						<th class="text-center" rowspan="2">Nama Rayon</th>
						<th class="text-center" rowspan="2">ID Rayon</th>

						<th class="text-center" rowspan="2">Ket Perluasan</th>
						<th class="text-center" rowspan="2">Tgl Rayon<br>Kirim Permohonan<br>PLG Ke PP/AREA</th>
						<th class="text-center" rowspan="2">Jangka Waktu<br>Permohonan s/d Kirim<br>Hasil SURVEY Ke PP</th>
						<th class="text-center" colspan="14">Kebutuhan MDU</th>
						<th class="text-center" rowspan="2">TGL KIRIM NODIN<br>KE PP DARI REN<br>(HASIL SURVEY)</th>
						<th class="text-center" rowspan="2">STATUS LAYAK / TIDAK LAYAK</th>
						<th class="text-center" rowspan="2">TGL KIRIM NODIN(PK)<br>KE KON DARI REN</th>
						<th class="text-center" rowspan="2">TGL KIRIM NODIN(PK)<br>KE PENGADAAN DARI REN</th>
						<th class="text-center" rowspan="2">JANGKA WAKTU BAYAR S/D NODIN(PK)</th>
						<th class="text-center" colspan="2">KETERANGAN(REN)</th>
						<th class="text-center" rowspan="2">NO. NOTA DINAS(PK)</th>
						<th class="text-center" rowspan="2">NO. WO TIANG</th>
						<th class="text-center" rowspan="2">NAMA_PABRIKAN_WO_TIANG</th>
						<th class="text-center" rowspan="2">TGL_WO_TIANG</th>
						<th class="text-center" rowspan="2">TGL KIRIM NOTA DINAS(PK) KE VENDOR</th>
						<th class="text-center" rowspan="2">NAMA VENDOR PELAKSANA</th>
						<th class="text-center" rowspan="2">NOMOR SPK</th>
						<th class="text-center" rowspan="2">TANGGAL OPERASI PELAKSANAAN VENDOR</th>
						<th class="text-center" colspan="8">KESEDIAAN  MDU</th>
						<th class="text-center" rowspan="2">TANGGAL NYALA</th>
						<th class="text-center" rowspan="2">TANGGAL PDL</th>
						<th class="text-center" rowspan="2">HPL</th>
						<th class="text-center" rowspan="2">KETERANGAN</th>
					</tr>
					<tr>
						<th class="text-center">A3CS(ms) 150 mm2</th>
						<th class="text-center">A3CS(ms) 240 mm2</th>
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
						<th class="text-center">A3CS</th>
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
					$c=11;
					foreach($hasil as $listhasil):
						echo "<tr>";
						echo "<td class='text-center'>".$i."</td>";
						
						echo "<td>".$listhasil->NAMA_PEMOHON."</td>";

						if ($listhasil->NO_AGENDA=="") {
							$temp2="";
						}
						else{
							
							$temp2 = $listhasil->NO_AGENDA."-";
						}
						
						echo "<td>".$temp2."</td>";
						
						echo "<td>".$listhasil->NAMA_PEL."</td>";
						echo "<td>".$listhasil->ALAMAT."</td>";
						echo "<td>".$listhasil->JML_CALON."</td>";
						echo "<td>".$listhasil->TOTAL_VA."</td>";
						echo "<td>".$listhasil->TGL_BAYAR."</td>";
						echo "<td>".$listhasil->STATUS_PERMOHONAN."</td>";
						echo "<td>".$listhasil->TGL_PK."</td>";
						echo "<td>".$listhasil->NAMA_RYN."</td>";
						echo "<td>".$listhasil->ID_RYN."</td>";

						echo "<td>".$listhasil->KET_PERLUASAN."</td>";
						echo "<td>".$listhasil->TGL_RYNKIRIM."</td>";

						echo '<td>=	IF(AND(H'.$c.'<>"";N'.$c.'<>"");""&ABS(DAYS360(H'.$c.';N'.$c.'))&" hari";
									IF(AND(H'.$c.'<>" ";N'.$c.'<>"");"BELUM ADA TGL BAYAR";
									IF(AND(H'.$c.'<>"";N'.$c.'<>" ");"BELUM ADA TGL RAYON KIRIM PERMOHONAN";"BELUM ADA TGL BAYAR DAN TGL RAYON KIRIM PERMOHONAN")))</td>';
						
						echo "<td>".$listhasil->A3CS_150."</td>";
						echo "<td>".$listhasil->A3CS240."</td>";
						echo "<td>".$listhasil->MVTIC240."</td>";
						echo "<td>".$listhasil->SKTM240."</td>";
						echo "<td>".$listhasil->CUBICLE."</td>";
						echo "<td>".$listhasil->TRAFO50."</td>";
						echo "<td>".$listhasil->TRAFO100."</td>";
						echo "<td>".$listhasil->TRAFO160."</td>";
						echo "<td>".$listhasil->TRAFO200."</td>";
						echo "<td>".$listhasil->TRAFO250."</td>";
						echo "<td>".$listhasil->LVPANEL."</td>";
						echo "<td>".$listhasil->NA2XSEYB."</td>";
						echo "<td>".$listhasil->NYFGBY."</td>";
						echo "<td>".$listhasil->BUNDLED."</td>";
						echo "<td>".$listhasil->TGL_NODINPPDARIREN."</td>";
						echo "<td>".$listhasil->STATUS_KELAYAKAN."</td>";
						echo "<td>".$listhasil->TGL_NODINKEKON."</td>";
						echo "<td>".$listhasil->TGL_NODINKEPENG."</td>";

						echo '<td>=	IF(AND(H'.$c.'<>"";AF'.$c.'<>"";AG'.$c.'<>" ");""&DAYS360(H'.$c.';AF'.$c.')&" hari";
									IF(AND(H'.$c.'<>"";AF'.$c.'<>" ";AG'.$c.'<>"");""&DAYS360(H'.$c.';AG'.$c.')&" hari";
									IF(OR(AND(H'.$c.'<>" ";AF'.$c.'<>"");(AND(H'.$c.'<>" ";AG'.$c.'<>"")));"BLM ADA TGL BAYAR";
									IF(AND(H'.$c.'<>"";AF'.$c.'<>" ";AG'.$c.'<>" ");"BELUM ADA TGL KIRIM NODIN";"BELUM ADA TGL BAYAR DAN TGL KIRIM NODIN"))))</td>';
						
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

						echo '<td>= IF(AND(H'.$c.'<>"";BB'.$c.'<>"");""&DAYS360(H'.$c.';BB'.$c.')&" hari";
									IF(AND(H'.$c.'="";BB'.$c.'<>"");"BELUM ADA TGL BAYAR";
									IF(AND(H'.$c.'<>"";BB'.$c.'="");"TGL PDL BELUM ADA";"BELUM ADA TANGGAL BAYAR DAN TGL PDL")))</td>';

						// echo "<td>".$listhasil->HPL."</td>";
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