<style>
	td{font-size: 11px;}
</style>
<div class="page-content">
	<div class="row">
		<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Filter Pelanggan
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-filter"></i>
							<a href="<?php base_url()?>c_filter">
								filter
							</a>
						</li>
					</ul>
		</div>
   		<div class="col-xs-12">
	     <?php echo $_SESSION['log'];
			$_SESSION['log']="";
		 ?>
		 
		 <div class="portlet box blue-hoki">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i>Filter Box
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
						<a href="javascript:;" class="reload">
						</a>
						<a href="javascript:;" class="remove">
						</a>
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<?php echo form_open_multipart('c_filter/datafilter','class="form-horizontal"');?>
							<div class="form-body">
							<br>
								<div class="form-group">
									<label class="col-md-3 control-label">Jenis Monitoring</label>
									<div class="col-md-4">
										<select class="form-control" name="jenis_monitoring" id="select">
											<option selected value="">--JENIS MONITORING--</option>
											<option value="pelTR">Pelanggan TR</option>
											<option value="kolektif">Pelanggan Kolektif</option>
											<option value="pelTM">Pelanggan TM</option>
										</select>
									</div>
									<font color="#ef4423"><?php echo form_error('jenis_monitoring'); ?></font>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Nama Rayon</label>
									<div class="col-md-4">
										<select class="form-control" name="rayon" id="select">
											<option selected value="">--NAMA RAYON--</option>
											<option value="51301">RYN LAWANG</option>
											<option value="51302">RYN BULULAWANG</option>
											<option value="51303">RYN BATU</option>
											<option value="51304">RYN SINGOSARI</option>
											<option value="51305">RYN KEPANJEN</option>
											<option value="51306">RYN TUMPANG</option>
											<option value="51307">RYN GONDANGLEGI</option>
											<option value="51308">RYN DAMPIT</option>
											<option value="51309">RYN NGANTANG</option>
											<option value="51310">RYN SUMBER PUCUNG</option>
											<option value="51311">RYN DINOYO</option>
											<option value="51312">RYN BLIMBING</option>
											<option value="51313">RYN MALANG KOTA</option>
											<option value="51314">RYN KEBON AGUNG</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Status Permohonan</label>
									<div class="col-md-4">
										<select class="form-control" name="status" id="select">
											<option selected value="">--STATUS PERMOHONAN--</option>
											<option value="BAYAR">BAYAR</option>
											<option value="CETAK PK">CETAK PK</option>
											<option value="PENANGGUHAN">PENANGGUHAN</option>
											<option value="PDL AWAL">PDL AWAL</option>
											<option value="RESTITUSI">RESTITUSI</option>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label">Keterangan</label>
									<div class="col-md-4">
										<select class="form-control" name="ket" id="select">
											<option selected value="">--KETERANGAN--</option>
											<option value="NYALA">NYALA</option>
											<option value="BELUM NYALA">BELUM NYALA</option>
											<option value="USULAN">USULAN PK KE KON</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-actions top">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn green">Submit</button>
										<button type="reset" class="btn default">Cancel</button>
									</div>
								</div>
							</div>
						<?php echo form_close();?>
					<!-- END FORM-->
				</div>
			</div>
		 
		 	     <div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Filter Pelanggan TR
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="fullscreen">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<button class="btn green" data-toggle='modal' data-target='#inaddModal' >
												Tambah <i class="fa fa-plus"></i>
											</button>
										</div>
									</div>
									<div class="col-md-6">
										<div class="btn-group pull-right">
												<?php echo form_open_multipart('c_filter/exporttoexcel');?>
													<input type="hidden" name="jenis_monitoring" value="<?php echo $jenis ?>">
													<input type="hidden" name="rayon" value="<?php echo $rayon ?>">
													<input type="hidden" name="status" value="<?php echo $status ?>">
													<input type="hidden" name="ket" value="<?php echo $ket ?>">
													<button type="submit" class="btn blue">Export to Excel</button>
												<?php echo form_close();?>
										</div>
									</div>
								</div>
							</div>			
							<table class="table table-striped table-hover table-bordered display" id="datatablehori" cellspacing="0" width="100%">
							<thead>
							<tr>
								<th class="text-center" rowspan="2" id="no">No</th>
	    						<th class="text-center" rowspan="2" id="nama">Nama Pelanggan</th>
	    						<th class="text-center" rowspan="2">IDPEL</th>
	    						<th class="text-center" rowspan="2">No Agenda</th>
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
	    						<th class="text-center" rowspan="2">Ket Perluasan</th>
	    						<th class="text-center" rowspan="2">Tgl Rayon<br>Kirim Permohonan<br>PLG Ke PP/AREA</th>
	    						<th class="text-center" rowspan="2">Jangka Waktu<br>Permohonan s/d Kirim<br>Hasil SURVEY Ke PP</th>
	    						<th class="text-center" colspan="14">Kebutuhan MDU</th>
	    						<th class="text-center" rowspan="2">TGL KIRIM NODIN (PK)<br>KE KON DARI REN</th>
	    						<th class="text-center" rowspan="2">TGL KIRIM NODIN (PK)<br>KE PENGADAAN DARI REN</th>
	    						<th class="text-center" rowspan="2">JANGKA WAKTU BAYAR S/D<br>NODIN (PK) KE KON</th>
	    						<th class="text-center" colspan="2">KETERANGAN (REN)</th>
	    						<th class="text-center" rowspan="2">NO. NOTA<br>DINAS (PK)</th>
	    						<th class="text-center" rowspan="2">NO. WO <br>(WORK ORDER) TIANG</th>
								<th class="text-center" rowspan="2">NAMA PABRIKAN WO <br>(WORK ORDER) TIANG</th>
								<th class="text-center" rowspan="2">TGL WO (WORK ORDER)</th>
	    						<th class="text-center" rowspan="2">TGL KIRIM NOTA DINAS (PK) KE VENDOR</th>
	    						<th class="text-center" rowspan="2">NAMA VENDOR PELAKSANA</th>
	    						<th class="text-center" rowspan="2">NOMOR SPK</th>
	    						<th class="text-center" rowspan="2">TANGGAL OPERASI PELAKSANAAN VENDOR</th>
	    						<th class="text-center" rowspan="2">PROGRESS</th>
	    						<th class="text-center" colspan="8">KESEDIAAN  MDU</th>
	    						<th class="text-center" rowspan="2">TGL NYALA</th>
	    						<th class="text-center" rowspan="2">TGL PDL</th>
	    						<th class="text-center" rowspan="2">HPL</th>
	    						<th class="text-center" rowspan="2">KETERANGAN</th>
								<th class="text-center" rowspan="2">Gambar<br>Hasil Survey</th>
								<th class="text-center" rowspan="2">Surat Permohonan<br>Pelanggan</th>
								<th class="text-center" rowspan="2">Surat Pengantar<br>dari Rayon</th>
								<th class="text-center" rowspan="2">Surat Pernyataan<br>Pelanggan</th>
								<th class="text-center" rowspan="2">Surat Persediaan<br>Pelanggan Ketempatan<br>Konstruksi PLN</th>
								<th class="text-center" rowspan="2">Analisa<br>Cost Benefit</th>
								<th class="text-center" rowspan="2">Bukti<br>Bayar</th>
	    						<?php 
								if($_SESSION['akses']!="view")
								{
								?>
								<th class="text-center" rowspan="2">
									 Edit
								</th>
								<th class="text-center" rowspan="2">
									 Delete
								</th>
								<?php 
								}
								else
								{
								 echo "<th class='text-center' rowspan='2'>File</th>";
								}
								?>
							</tr>
							<tr>
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
								foreach($hasil as $listhasil):
								echo "<tr>";
									echo "<td class='text-center'>".$i."</td>";
									echo "<td>".$listhasil->NAMA_PEL."</td>";
									echo "<td>".$listhasil->IDPEL."</td>";
									echo "<td>".$listhasil->NO_AGENDA."</td>";
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
									echo "<td>".$listhasil->KET_PERLUASAN."</td>";
									echo "<td>".$listhasil->TGL_RYNKIRIM."</td>";
									echo "<td>".$listhasil->JANGKA_SURVEYPP."</td>";
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
									echo "<td>".$listhasil->JANGKABAYAR_NODINKEKON."</td>";
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
									echo "<td>".$listhasil->HPL."</td>";
									echo "<td>".$listhasil->KETERANGAN."</td>";
									if($listhasil->GMBR=="" OR $listhasil->GMBR=="0")
									{
										echo "<td class='text-center'><img style='height : 15px; width: 15px;' src='".base_url()."assets/img/silang.png' alt='User Image' /></td>";
									}
									else
									{
										echo "<td class='text-center'><img style='height : 29px; width: 29px;' src='".base_url()."assets/img/cek.png' alt='list' /></td>";
									}
									
									if($listhasil->SPP=="" OR $listhasil->SPP=="0")
									{
										echo "<td class='text-center'><img style='height : 15px; width: 15px;' src='".base_url()."assets/img/silang.png' alt='User Image' /></td>";
									}
									else
									{
										echo "<td class='text-center'><img style='height : 29px; width: 29px;' src='".base_url()."assets/img/cek.png' alt='list' /></td>";
									}
									
									if($listhasil->SPDR=="" OR $listhasil->SPDR=="0")
									{
										echo "<td class='text-center'><img style='height : 15px; width: 15px;' src='".base_url()."assets/img/silang.png' alt='User Image' /></td>";
									}
									else
									{
										echo "<td class='text-center'><img style='height : 29px; width: 29px;' src='".base_url()."assets/img/cek.png' alt='list' /></td>";
									}
									
									if($listhasil->SPPEL=="" OR $listhasil->SPPEL=="0")
									{
										echo "<td class='text-center'><img style='height : 15px; width: 15px;' src='".base_url()."assets/img/silang.png' alt='User Image' /></td>";
									}
									else
									{
										echo "<td class='text-center'><img style='height : 29px; width: 29px;' src='".base_url()."assets/img/cek.png' alt='list' /></td>";
									}
									
									if($listhasil->SPPKKPLN=="" OR $listhasil->SPPKKPLN=="0")
									{
										echo "<td class='text-center'><img style='height : 15px; width: 15px;' src='".base_url()."assets/img/silang.png' alt='User Image' /></td>";
									}
									else
									{
										echo "<td class='text-center'><img style='height : 29px; width: 29px;' src='".base_url()."assets/img/cek.png' alt='list' /></td>";
									}
									
									if($listhasil->ANB=="" OR $listhasil->ANB=="0")
									{
										echo "<td class='text-center'><img style='height : 15px; width: 15px;' src='".base_url()."assets/img/silang.png' alt='User Image' /></td>";
									}
									else
									{
										echo "<td class='text-center'><img style='height : 29px; width: 29px;' src='".base_url()."assets/img/cek.png' alt='list' /></td>";
									}
									
									if($listhasil->BB=="" OR $listhasil->BB=="0")
									{
										echo "<td class='text-center'><img style='height : 15px; width: 15px;' src='".base_url()."assets/img/silang.png' alt='User Image' /></td>";
									}
									else
									{
										echo "<td class='text-center'><img style='height : 29px; width: 29px;' src='".base_url()."assets/img/cek.png' alt='list' /></td>";
									}
									
									
							?>
							
							<?php 
							if($_SESSION['akses']!="view")
							{
								if($listhasil->NAMA_RYN==$_SESSION['rayon'] OR $_SESSION['rayon']=="Area") 
								{
							?>
							
								<td>
									<a title="Ubah Data Member" href="<?php echo base_url()?>pelanggan_TR/editdata/<?php echo $listhasil->NO?>">
									<button class="btn btn-sm blue filter-submit margin-bottom"><i class="fa fa-edit"></i> Edit</button> </a>
								</td>
								<td>
									<a title="Hapus Member"  href="<?php echo base_url()?>pelanggan_TR/hapusdata/<?php echo $listhasil->NO?>" onclick="return confirm('Anda Yakin Akan Menghapus DATA ?')">
									<button class="btn btn-sm red filter-cancel"><i class="fa fa-trash"></i> &nbsp;Hapus</button> </a>
								</td>
								<?php
								}
								else
								{
								 ?>
								
								<td>
									<button class="btn btn-sm blue filter-submit margin-bottom">&nbsp;&nbsp;&nbsp;<i class="fa fa-ban"></i>&nbsp;&nbsp;&nbsp;&nbsp;</button>
								</td>
								<td>
									<button class="btn btn-sm red filter-cancel">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-ban"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
								</td>
							<?php
								}
							}
							else
							{
							?>
								<td>
									<a title="Ubah Data Member" href="<?php echo base_url()?>pelanggan_TR/viewdata/<?php echo $listhasil->NO?>">
									<button class="btn btn-sm blue filter-submit margin-bottom"><i class="fa fa-edit"></i> File</button> </a>
								</td>
							<?php
							}
							echo "</tr>";
							$i++;
							endforeach;
							?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->

	     <div class="portlet box green" id="tambah">
			
			</div>
			<!-- END EXAMPLE TABLE PORTLET-->
	     
	  </div>
	</div>
	
</div>

<?php
	if($_SESSION['akses']=="PP Area" OR $_SESSION['akses']=="admin" OR $_SESSION['akses']=="rayon")
	{
	?>
		<!-- static -->
	<div id="inaddModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" data-width="950">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title">Tambah Data Pelanggan</h4>
		</div>
		<div class="modal-body">
		<form method="POST" action="<?php echo base_url()?>pelanggan_TR/saveaddlokasi" class="form-horizontal" role="form">
				<table class="table table-striped table-hover display" width="100%">
					<tr>
								<td>NO</td>
								<td><input name="a" class="form-control input-large" type="text" disabled></td>
								<td>IDPEL</td>
								<td><input name="b" class="form-control input-large" type="text"></td>
							</tr>
							<tr>
								<td>No Agenda</td>
								<td><input name="c" class="form-control input-large" type="text"></td>
								<td>Nama Pelanggan</td>
								<td><input name="d" class="form-control input-large" type="text"></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><input name="e" class="form-control input-large" type="text"></td>
								<td>Tarif Lama</td>
								<td><input name="f" class="form-control input-large" type="text"></td>
							</tr>
							<tr>
								<td>Daya Lama</td>
								<td><input name="g" class="form-control input-large" type="text"></td>
								<td>Tarif Baru</td>
								<td><input name="h" class="form-control input-large" type="text"></td>
							</tr>
							<tr>
								<td>Daya Baru</td>
								<td><input name="i" class="form-control input-large" type="text"></td>
								<td>Jenis Transaksi</td>
								<td>
								<select class="form-control" name="j" id="select">
									<option selected value=""></option>
									<option value="PASANG BARU">PASANG BARU</option>
									<option value="PERUBAHAN DAYA">PERUBAHAN DAYA</option>
									<option value="KOLEKTIF">KOLEKTIF</option>
								</select>
								</td>
							</tr>
							<tr>
								<td>Tanggal Bayar</td>
								<td><input name="k" class="form-control input-large date-picker" data-date-format="yyyy-mm-dd" type="text"></td>
								<td>Status Permohonan</td>
								<td>
								<select class="form-control" name="l" id="select">
									<option selected value=""></option>
									<option value="CETAK PK">CETAK PK</option>
									<option value="PENANGGUHAN">PENANGGUHAN</option>
									<option value="BAYAR">BAYAR</option>
									<option value="PDL AWAL">PDL AWAL</option>
									<option value="RESTITUSI">RESTITUSI</option>
								</select>
								</td>
							</tr>
							<tr>
								<td>Nama Rayon</td>
								<td>
								<div class="input-group input-large">
									<span class="input-group-addon">
										<i class="fa fa-bolt"></i>
									</span>
									<select class="form-control" name="m" id="select">
									<option selected value="KOSONG">--Nama Rayon--</option>
									<option value="51301">RYN LAWANG</option>
									<option value="51302">RYN BULULAWANG</option>
									<option value="51303">RYN BATU</option>
									<option value="51304">RYN SINGOSARI</option>
									<option value="51305">RYN KEPANJEN</option>
									<option value="51306">RYN TUMPANG</option>
									<option value="51307">RYN GONDANGLEGI</option>
									<option value="51308">RYN DAMPIT</option>
									<option value="51309">RYN NGANTANG</option>
									<option value="51310">RYN SUMBER PUCUNG</option>
									<option value="51311">RYN DINOYO</option>
									<option value="51312">RYN BLIMBING</option>
									<option value="51313">RYN MALANG KOTA</option>
									<option value="51314">RYN KEBON AGUNG</option>
									</select>
								</div>
								</td>
							</tr>
							<tr>
							<td colspan="4"><font color="red">* Nama Pelanggan Harus Diisi</font></td>
							</tr>
				</table>
		</div>
		<div class="modal-footer">
			<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
			<button class="btn blue">Tambah</button>
			</form>
		</div>
	</div>
	<?php
	}
	?>