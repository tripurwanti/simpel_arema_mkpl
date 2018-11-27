<div class="page-content">
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<h3 class="page-title">
				Pelanggan Kolektif
			</h3>
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<i class="fa fa-group"></i>
					<a href="<?php echo base_url()?>kolektif">
						Detail Beranda
					</a>
				</li>
				<li>
					<a href="<?php echo base_url()?>kolektif">
						Pelanggan Kolektif
					</a>
				</li>
				<li>
					<a href="">
						Edit
					</a>
				</li>
			</ul>
		</div>
		<div class="col-xs-12">
			<?php echo $_SESSION['log'];
			$_SESSION['log']="";
			?>
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-pencil-square"></i>Uraian Pelanggan TR
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
					<div class="table-scrollable">
						<table class="table table-striped table-hover table-bordered display" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th class="text-center">Nama Pelanggan</th>
									<th class="text-center">Nama Pemohon</th>
									<th class="text-center">No Agenda</th>
									<th class="text-center">Alamat Pelanggan</th>
									<th class="text-center">Jumlah Calon</th>
									<th class="text-center">Total VA</th>
									<th class="text-center">Tanggal Bayar</th>
									<th class="text-center">Status Permohonan</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach($hasil as $listhasil):
									echo "<tr>";
									echo "<td>".$listhasil->NAMA_PEL."</td>";
									echo "<td>".$listhasil->NAMA_PEMOHON."</td>";
									echo "<td>".$listhasil->NO_AGENDA."</td>";
									echo "<td>".$listhasil->ALAMAT."</td>";
									echo "<td>".$listhasil->JML_CALON."</td>";
									echo "<td>".$listhasil->TOTAL_VA."</td>";
									echo "<td>".$listhasil->TGL_BAYAR."</td>";
									echo "<td>".$listhasil->STATUS_PERMOHONAN."</td>";
									echo "</tr>";
								endforeach;
								?>
							</tbody>
						</table>
					</div>		
				</div>
			</div>
			<!-- END EXAMPLE TABLE PORTLET-->

			<?php
			if($_SESSION['akses']=="rayon" OR $_SESSION['akses']=="admin")
			{
				?>
				<div class="portlet box blue-hoki">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-gift"></i>Upload Data Pelanggan
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
					<div class="portlet-body form">
						<div class="tabbable tabbable-custom">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_1_1" data-toggle="tab">
									Upload </a>
								</li>
								<li>
									<a href="#tab_1_2" data-toggle="tab">
									File Upload </a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1_1">
									<!-- BEGIN FORM-->
									<?php echo form_open_multipart('kolektif/uploaddata','class="form-horizontal"');?>
									<div class="form-body">
										<br>
										<?php
										foreach($hasil as $listhasil):
											echo "<input type='hidden' value='".$listhasil->NO."' name='no'>";
											echo "<input type='hidden' value='".$listhasil->NAMA_PEL."' name='nama_pel'>";
										endforeach;
										?>
										<div class="form-group">
											<label class="col-md-3 control-label">Jenis Data Upload</label>
											<div class="col-md-4">
												<select class="form-control" name="jdu" id="select">
													<option selected value="">--Pilih Jenis Data--</option>
													<option value="Gambar Hasil Survey" <?php if ($_SESSION['akses'] == "rayon") {
														echo "disabled";
													} ?>>1. Gambar Hasil Survey</option>
													<option value="Surat Permohonan Pelanggan">2. Surat Permohonan Pelanggan</option>
													<option value="Surat Pengantar dari Rayon">3. Surat Pengantar dari Rayon</option>
													<option value="Surat Pernyataan Pelanggan">4. Surat Pernyataan Pelanggan</option>
													<option value="Surat Persediaan Pelanggan Ketempatan Konstruksi PLN">5. Surat Persediaan Pelanggan Ketempatan Konstruksi PLN</option>
													<option value="Analisa Cost Benefit">6. Analisa Cost Benefit</option>
													<option value="Bukti Bayar">7. Bukti Bayar</option>
												</select>
											</div>
											<font color="#ef4423"><?php echo form_error('jenis_data'); ?></font>
										</div>
										<br>
										<div class="form-group">
											<label class="col-md-3 control-label">Data File</label>
											<div class="col-md-4">
												<input type="file" id="gb" name="gb">
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
								</div><!-- END FORM-->
								<div class="tab-pane" id="tab_1_2">
									<table class="table table-striped table-hover table-bordered display">
										<thead>
											<tr>
												<th class='text-center'>No</th>
												<th>Tanggal upload</th>
												<th>Jenis data upload</th>
												<th>File</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i=1;
											foreach($hasil as $listhasil):
												foreach($upload as $datahasil):
													echo "<tr>";
													echo "<td class='text-center'>".$i."</td>";
													echo "<td>".$datahasil->TGL_UPLOAD."</td>";
													echo "<td>".$datahasil->JENIS_DATA."</td>";
													echo "<td><a href='".base_url()."assets/data_upload/PelangganKOL/".$listhasil->NAMA_PEL."/".$datahasil->DATA_UPLOAD."'>".$datahasil->DATA_UPLOAD."</a></td>";
													echo "</tr>";
													$i++;
												endforeach;
											endforeach;	
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			}	
			else
			{
				?>
				<div class="portlet box blue-hoki">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-gift"></i>Data Upload Pelanggan
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
					<div class="portlet-body form">
						<div class="tabbable tabbable-custom">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_1_3" data-toggle="tab">
									File Upload  </a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1_3">
									<table class="table table-striped table-hover table-bordered display">
										<thead>
											<tr>
												<th class='text-center'>No</th>
												<th>Tanggal upload</th>
												<th>Jenis data upload</th>
												<th>File</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i=1;
											foreach($hasil as $listhasil):
												foreach($upload as $datahasil):
													echo "<tr>";
													echo "<td class='text-center'>".$i."</td>";
													echo "<td>".$datahasil->TGL_UPLOAD."</td>";
													echo "<td>".$datahasil->JENIS_DATA."</td>";
													echo "<td><a href='".base_url()."assets/data_upload/PelangganKOL/".$listhasil->NAMA_PEL."/".$datahasil->DATA_UPLOAD."'>".$datahasil->DATA_UPLOAD."</a></td>";
													echo "</tr>";
													$i++;
												endforeach;
											endforeach;	
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			}	
			?>


			<!-- EXAMPLE TABLE PORTLET-->
			<?php echo form_open('kolektif/dataupdate','class="form-horizontal"');?>
			<?php foreach($hasil as $listhasil):
			echo "<input type='hidden' value='".$listhasil->NO."' name='a'>";?>
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-pencil-square"></i> Edit Data Pelanggan
					</div>
					<div class="tools">
						<a href="javascript:;" class="expand">
						</a>
						<a href="javascript:;" class="reload">
						</a>
						<a href="javascript:;" class="fullscreen">
						</a>
					</div>
				</div>
				<div class="portlet-body form" style="display: none;">
					<div class="form-body">
						<table class="table table-striped table-hover table-bordered display" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th width="90%" class="text-center">
										Uraian Kolom
									</th>
									<th width="10%" class="text-center">
										Input
									</th>
								</tr>	
							</thead>
							<tbody>
								<tr>
									<td>Nama Pemohon</td>
									<td>
										<div class="input-group input-large">
											<span class="input-group-addon">
												<i class="fa fa-user"></i>
											</span>
											<input name="b" class="form-control" type="text" value="<?php echo $listhasil->NAMA_PEMOHON?>" <?php echo $array_status[0];?>>
										</div>

									</td>
								</tr>
								<tr>
									<td>No Agenda</td>
									<td>
										<div class="input-group input-large">
											<span class="input-group-addon">
												<i class="fa fa-pencil-square"></i>
											</span>
											<input name="c" class="form-control" type="text" value="<?php echo $listhasil->NO_AGENDA?>" <?php echo $array_status[1];?>>
										</div>
									</td>
								</tr>
								<tr>
									<td>Nama Pelanggan</td>
									<td>
										<div class="input-group input-large">
											<span class="input-group-addon">
												<i class="fa fa-user"></i>
											</span>
											<input name="d" class="form-control" type="text" value="<?php echo $listhasil->NAMA_PEL?>" <?php echo $array_status[2];?>>
										</div>
									</td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>
										<div class="input-group input-large">
											<span class="input-group-addon">
												<i class="fa fa-map-marker"></i>
											</span>
											<input name="e" class="form-control" type="text" value="<?php echo $listhasil->ALAMAT?>" <?php echo $array_status[3];?>>
										</div>
									</td>
								</tr>
								<tr>
									<td>Jml Calon Pelanggan</td>
									<td>
										<div class="input-group input-large">
											<span class="input-group-addon">
												<i class="fa fa-user"></i>
											</span>
											<input name="f" class="form-control" type="text" value="<?php echo $listhasil->JML_CALON?>" <?php echo $array_status[4];?>>
										</div>
									</td>
								</tr>
								<tr>
									<td>Total VA</td>
									<td>
										<div class="input-group input-large">
											<span class="input-group-addon">
												<i class="fa fa-dollar"></i>
											</span>
											<input name="g" class="form-control" type="text" value="<?php echo $listhasil->TOTAL_VA?>" <?php echo $array_status[5];?>>
										</div>
									</td>
								</tr>
								<tr>
									<td>Tanggal Bayar</td>
									<td>
										<div class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd" >
											<span class="input-group-btn">
												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
											<input name="h" class="form-control" type="text" value="<?php echo $listhasil->TGL_BAYAR?>" <?php echo $array_status[6];?>>
										</div>
									</td>
								</tr>
								<tr>
									<td>Status Permohonan</td>
									<td>
										<div class="input-group input-large">
											<span class="input-group-addon">
												<i class="fa fa-info-circle"></i>
											</span>
											<select class="form-control" name="i" id="select" <?php echo $array_status[7];?>>
												<option selected value="<?php echo $listhasil->STATUS_PERMOHONAN?>"><?php echo $listhasil->STATUS_PERMOHONAN?></option>
												<option value="CETAK PK">CETAK PK</option>
												<option value="PENANGGUHAN">PENANGGUHAN</option>
												<option value="BAYAR">BAYAR</option>
												<option value="PDL AWAL">PDL AWAL</option>
												<option value="RESTITUSI">RESTITUSI</option>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td>Tanggal PK</td>
									<td>
										<div class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd" >
											<div class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd" >
												<div class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd" >
													<span class="input-group-btn">
														<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
													</span>
													<input name="a1" class="form-control" type="text" value="<?php echo $listhasil->TGL_PK?>" <?php echo $array_status[8];?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>Nama Rayon</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-bolt"></i>
													</span>
													<select class="form-control" name="b1" id="select" <?php echo $array_status[9];?>>
														<?php if ($_SESSION['akses'] == 'rayon') {?>
														<option selected value="<?php echo $listhasil->ID_RYN ?>"> <?php echo $listhasil->NAMA_RYN; ?></option>
														<option value="51301" <?php if ($_SESSION['nama_rayon'] != "RYN LAWANG") {echo "disabled";}?>>RYN LAWANG</option>
														<option value="51302" <?php if ($_SESSION['nama_rayon'] != "RYN BULULAWANG") {echo "disabled";}?>>RYN BULULAWANG</option>
														<option value="51303" <?php if ($_SESSION['nama_rayon'] != "RYN BATU") {echo "disabled";}?>>RYN BATU</option>
														<option value="51304" <?php if ($_SESSION['nama_rayon'] != "RYN SINGOSARI") {echo "disabled";}?>>RYN SINGOSARI</option>
														<option value="51305" <?php if ($_SESSION['nama_rayon'] != "RYN KEPANJEN") {echo "disabled";}?>>RYN KEPANJEN</option>
														<option value="51306" <?php if ($_SESSION['nama_rayon'] != "RYN TUMPANG") {echo "disabled";}?>>RYN TUMPANG</option>
														<option value="51307" <?php if ($_SESSION['nama_rayon'] != "RYN GONDANGLEGI") {echo "disabled";}?>>RYN GONDANGLEGI</option>
														<option value="51308" <?php if ($_SESSION['nama_rayon'] != "RYN DAMPIT") {echo "disabled";}?>>RYN DAMPIT</option>
														<option value="51309" <?php if ($_SESSION['nama_rayon'] != "RYN NGANTANG") {echo "disabled";}?>>RYN NGANTANG</option>
														<option value="51310" <?php if ($_SESSION['nama_rayon'] != "RYN SUMBER PUCUNG") {echo "disabled";}?>>RYN SUMBER PUCUNG</option>
														<option value="51311" <?php if ($_SESSION['nama_rayon'] != "RYN DINOYO") {echo "disabled";}?>>RYN DINOYO</option>
														<option value="51312" <?php if ($_SESSION['nama_rayon'] != "RYN BLIMBING") {echo "disabled";}?>>RYN BLIMBING</option>
														<option value="51313" <?php if ($_SESSION['nama_rayon'] != "RYN MALANG KOTA") {echo "disabled";}?>>RYN MALANG KOTA</option>
														<option value="51314" <?php if ($_SESSION['nama_rayon'] != "RYN KEBON AGUNG") {echo "disabled";}?>>RYN KEBON AGUNG</option>
														<?php }else{ ?>
														<option selected value="<?php echo $listhasil->ID_RYN ?>"> <?php echo $listhasil->NAMA_RYN; ?></option>
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
														<?php } ?>
													</select>
												</div>
											</td>
										</tr>
										<tr>
											<td>Keterangan Perluasan</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-book"></i>
													</span>
													<select class="form-control" name="c1" id="select" <?php echo $array_status[10];?>>
														<option selected value="<?php echo $listhasil->KET_PERLUASAN?>"><?php echo $listhasil->KET_PERLUASAN?></option>
														<option value="TANPA PERLUASAN">TANPA PERLUASAN</option>
														<option value="PERLUASAN JTR">PERLUASAN JTR</option>
														<option value="PERLUASAN JTM">PERLUASAN JTM</option>
														<option value="PERLUASAN GTT">PERLUASAN GTT</option>
														<option value="PERLUASAN JTR & GTT">PERLUASAN JTR & GTT</option>
														<option value="PERLUASAN JTR & JTM">PERLUASAN JTR & JTM</option>
														<option value="PERLUASAN JTM & GTT">PERLUASAN JTM & GTT</option>
														<option value="PERLUASAN JTR,JTM & GTT">PERLUASAN JTR,JTM & GTT</option>
													</select>
												</div>
											</td>
										</tr>
										<tr>
											<td>Tgl Rayon Kirim Permohonan Pelanggan ke PP/AREA</td>
											<td>
												<div class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd" >
													<span class="input-group-btn">
														<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
													</span>
													<input name="d1" class="form-control" type="text" value="<?php echo $listhasil->TGL_RYNKIRIM?>" <?php echo $array_status[11];?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>Tanggal Nyala</td>
											<td>
												<div class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd" >
													<span class="input-group-btn">
														<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
													</span>
													<input name="m" class="form-control" type="text" value="<?php echo $listhasil->TGL_NYALA?>" 
													<?php echo $array_status[50];
													?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>Tanggal PDL</td>
											<td>
												<div class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd" >
													<span class="input-group-btn">
														<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
													</span>
													<input name="n" class="form-control" type="text" value="<?php echo $listhasil->TGL_PDL?>" 
													<?php echo $array_status[51];?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>HPL</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-clock-o"></i>
													</span>
													<?php
													date_default_timezone_set('Asia/Jakarta');
													$tgl5 = $listhasil->TGL_BAYAR;
													$tgl6 = $listhasil->TGL_PDL;
													$selisih3 = strtotime($tgl6) -  strtotime($tgl5);
													$hari2 = floor(abs($selisih3/(60*60*24)))." hari";
													echo '<input name="o" class="form-control" type="text" value="'.$hari2.'" readonly="yes">';
													?>
												</div>
											</td>
										</tr>
										<tr>
											<td>Jangka Waktu Permohonan s/d Kirim Hasil Survey ke PP</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-clock-o"></i>
													</span>
													<?php
													date_default_timezone_set('Asia/Jakarta');
													$tgl1 = $listhasil->TGL_BAYAR;
													$tgl2 = $listhasil->TGL_RYNKIRIM;
													$selisih = strtotime($tgl2) -  strtotime($tgl1);
													$hari = abs($selisih/(60*60*24))." hari";
													echo '<input name="a2" class="form-control" type="text" value="'.$hari.'" readonly="yes">';
													?>
												</div>
											</td>
										</tr>
										<tr>
											<td>A3CS(ms) 150mm2</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-gears"></i>
													</span>
													<input name="b2" class="form-control" type="text" value="<?php echo $listhasil->A3CS_150?>" <?php echo $array_status[13];?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>A3CS(ms) 240mm2</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-gears"></i>
													</span>
													<input name="c2" class="form-control" type="text" value="<?php echo $listhasil->A3CS240?>" <?php echo $array_status[14];?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>MVTIC 240mm2</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-gears"></i>
													</span>
													<input name="d2" class="form-control" type="text" value="<?php echo $listhasil->MVTIC240?>" <?php echo $array_status[15];?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>SKTM 240mm2</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-gears"></i>
													</span>
													<input name="e2" class="form-control" type="text" value="<?php echo $listhasil->SKTM240?>" <?php echo $array_status[16];?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>Cubicle</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-gears"></i>
													</span>
													<input name="f2" class="form-control" type="text" value="<?php echo $listhasil->CUBICLE?>" <?php echo $array_status[17];?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>Trafo 50 kVA</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-gears"></i>
													</span>
													<input name="g2" class="form-control" type="text" value="<?php echo $listhasil->TRAFO50?>" <?php echo $array_status[18];?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>Trafo 100 kVA</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-gears"></i>
													</span>
													<input name="h2" class="form-control" type="text" value="<?php echo $listhasil->TRAFO100?>" <?php echo $array_status[19];?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>Trafo 160 kVA</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-gears"></i>
													</span>
													<input name="i2" class="form-control" type="text" value="<?php echo $listhasil->TRAFO160?>" <?php echo $array_status[20];?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>Trafo 200 kVA</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-gears"></i>
													</span>
													<input name="j2" class="form-control" type="text" value="<?php echo $listhasil->TRAFO200?>" <?php echo $array_status[21];?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>Trafo 250 kVA</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-gears"></i>
													</span>
													<input name="k2" class="form-control" type="text" value="<?php echo $listhasil->TRAFO250?>" <?php echo $array_status[22];?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>LV PANEL</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-gears"></i>
													</span>
													<input name="l2" class="form-control" type="text" value="<?php echo $listhasil->LVPANEL?>" <?php echo $array_status[23];?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>NA2XSEYB 3X150 mm2 (m)</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-gears"></i>
													</span>
													<input name="m2" class="form-control" type="text" value="<?php echo $listhasil->NA2XSEYB?>" <?php echo $array_status[24];?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>NYFGbY 4X95, 4X70 (m)</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-gears"></i>
													</span>
													<input name="n2" class="form-control" type="text" value="<?php echo $listhasil->NYFGBY?>" <?php echo $array_status[25];?>></td>
												</div>

											</tr>
											<tr>
												<td>BUNDLED 70, 35, 25, 16 (ms)</td>
												<td>
													<div class="input-group input-large">
														<span class="input-group-addon">
															<i class="fa fa-gears"></i>
														</span>
														<input name="o2" class="form-control" type="text" value="<?php echo $listhasil->BUNDLED?>" <?php echo $array_status[26];?>>
													</div>
												</td>
											</tr>
											<tr>
												<td>Tgl Kirim NODIN ke PP dari REN(Hasil Survey)</td>
												<td>
													<div class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd" >
														<span class="input-group-btn">
															<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
														<input name="p2" class="form-control" type="text" value="<?php echo $listhasil->TGL_NODINPPDARIREN?>" <?php echo $array_status[27];?>>
													</div>
												</td>
											</tr>
											<tr>
												<td>Status Layak/Tidak Layak</td>
												<td>
													<div class="input-group input-large">
														<span class="input-group-addon">
															<i class="fa fa-gears"></i>
														</span>
														<select class="form-control" name="q2" id="select" <?php echo $array_status[28];?>>
															<option selected value="<?php echo $listhasil->STATUS_KELAYAKAN?>"><?php echo $listhasil->STATUS_KELAYAKAN?></option>
															<option value="LAYAK">LAYAK</option>
															<option value="TIDAK LAYAK">TIDAK LAYAK</option>
														</select>
													</div>
												</td>
											</tr>
											<tr>
												<td>Tgl Kirim NODIN(PK) ke KON dari REN</td>
												<td>
													<div class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd" >
														<span class="input-group-btn">
															<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
														<input name="r2" class="form-control" type="text" value="<?php echo $listhasil->TGL_NODINKEKON?>" <?php echo $array_status[29];
														?>>
													</div>
												</td>
											</tr>
											<tr>
												<td>Tgl Kirim NODIN(PK) ke Pengadaan dari REN</td>
												<td>
													<div class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd" >
														<span class="input-group-btn">
															<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
														<input name="s2" class="form-control" type="text" value="<?php echo $listhasil->TGL_NODINKEPENG?>" <?php echo $array_status[30];
														?>>
													</div>
												</td>
											</tr>
											<tr>
												<td>Jangka Waktu Bayar s/d NODIN (PK)</td>
												<td>
													<div class="input-group input-large">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input name="t2" class="form-control" type="text" value="<?php echo $listhasil->JANGKABAYAR_NODIN?>" readonly="yes">
													</div>
												</td>
											</tr>
											<tr>
												<td>Angka (KETERANGAN REN)</td>
												<td>
													<div class="input-group input-large">
														<span class="input-group-addon">
															<i class="fa fa-pencil-square"></i>
														</span>
														<input name="u2" class="form-control" type="text" value="<?php echo $listhasil->KET_ANGKA?>" <?php echo $array_status[32];?>>
													</div>
												</td>
											</tr>
											<tr>
												<td>Uraian (KETERANGAN REN)</td>
												<td>
													<div class="input-group input-large">
														<span class="input-group-addon">
															<i class="fa fa-pencil-square"></i>
														</span>
														<input name="v2" class="form-control" type="text" value="<?php echo $listhasil->KET_URAIAN?>" <?php echo $array_status[33];?>>
													</div>
												</td>
											</tr>
											<tr>
												<td>No. Nota Dinas(PK)</td>
												<td>
													<div class="input-group input-large">
														<span class="input-group-addon">
															<i class="fa fa-pencil-square"></i>
														</span>
														<input name="w2" class="form-control" type="text" value="<?php echo $listhasil->NO_NOTADINAS?>" <?php echo $array_status[34];
														?>>
													</div>
												</td>
											</tr>
											<tr>
												<td>Nomor WO (Work Order) Tiang </td>
												<td>
													<div class="input-group input-large">
														<span class="input-group-addon">
															<i class="fa fa-pencil-square"></i>
														</span>
														<input name="x2" class="form-control" type="text" value="<?php echo $listhasil->NO_WO_TIANG?>" <?php echo $array_status[35];?>>
													</div>
												</td>
											</tr>
											<tr>
												<td>Nama Pabrikan WO (Work Order) Tiang</td>
												<td>
													<div class="input-group input-large">
														<span class="input-group-addon">
															<i class="fa fa-pencil-square"></i>
														</span>
														<input name="y2" class="form-control" type="text" value="<?php echo $listhasil->NAMA_PABRIKAN_WO_TIANG?>" <?php echo $array_status[36];?>>
													</div>
												</td>
											</tr>
											<tr>
												<td>Tgl WO (Work Order) Tiang</td>
												<td>
													<div class="input-group input-large">
														<span class="input-group-addon">
															<i class="fa fa-pencil-square"></i>
														</span>
														<input name="z2" class="form-control" type="text" value="<?php echo $listhasil->TGL_WO_TIANG?>" <?php echo $array_status[37];?>>
													</div>
												</td>
											</tr>
											<tr>
												<td>Tgl Kirim Nota Dinas(PK) ke Vendor</td>
												<td>
													<div class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd" >
														<span class="input-group-btn">
															<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
														<input name="a3" class="form-control" type="text" value="<?php echo $listhasil->TGL_NOTDINKEVENDOR?>" <?php echo $array_status[38];?>>
													</div>
												</td>
											</tr>
											<tr>
												<td>Nama Vendor Pelaksana</td>
												<td>
													<div class="input-group input-large">
														<span class="input-group-addon">
															<i class="fa fa-pencil-square"></i>
														</span>
														<input name="b3" class="form-control" type="text" value="<?php echo $listhasil->NAMA_VENDORPELAK?>" <?php echo $array_status[39];
														?>>
													</div>
												</td>
											</tr>
											<tr>
												<td>Nomor SPK</td>
												<td>
													<div class="input-group input-large">
														<span class="input-group-addon">
															<i class="fa fa-pencil-square"></i>
														</span>
														<input name="c3" class="form-control" type="text" value="<?php echo $listhasil->NO_SPK?>" <?php echo $array_status[40];?>>
													</div>
												</td>
											</tr>
											<tr>
												<td>Tanggal Operasi Pelaksanaan Vendor</td>
												<td>
													<div class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd" >
														<span class="input-group-btn">
															<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
														<input name="d3" class="form-control" type="text" value="<?php echo $listhasil->TGL_OPERASI?>" <?php echo $array_status[41];?>>
													</div>
												</td>
											</tr>
											<tr>
												<td>A3CS</td>
												<td>
													<div class="input-group input-large">
														<span class="input-group-addon">
															<i class="fa fa-gears"></i>
														</span>
														<input name="e3" class="form-control" type="text" value="<?php echo $listhasil->KON_A3CS?>" <?php echo $array_status[42];?>>
													</div>
												</td>
											</tr>
											<tr>
												<td>Pin Isolator</td>
												<td>
													<div class="input-group input-large">
														<span class="input-group-addon">
															<i class="fa fa-gears"></i>
														</span>
														<input name="f3" class="form-control" type="text" value="<?php echo $listhasil->PIN_ISOLATOR?>" <?php echo $array_status[43];?>>
													</div>
												</td>
											</tr>
											<tr>
												<td>Hang Isolator</td>
												<td><div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-gears"></i>
													</span>
													<input name="g3" class="form-control" type="text" value="<?php echo $listhasil->HANG_ISOLATOR?>" <?php echo $array_status[44];?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>LA</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-gears"></i>
													</span>
													<input name="h3" class="form-control" type="text" value="<?php echo $listhasil->KON_LA?>" <?php echo $array_status[45];?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>Cubicle</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-gears"></i>
													</span>
													<input name="i3" class="form-control" type="text" value="<?php echo $listhasil->KON_CUBICLE?>" <?php echo $array_status[46];?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>Trafo</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-gears"></i>
													</span>
													<input name="j3" class="form-control" type="text" value="<?php echo $listhasil->KON_TRAFO?>" <?php echo $array_status[47];?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>LV PANEL</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-gears"></i>
													</span>
													<input name="k3" class="form-control" type="text" value="<?php echo $listhasil->KON_LVPANEL?>" <?php echo $array_status[48];?>>
												</div>
											</td>
										</tr>
										<tr>
											<td>BUNDLED 70, 35, 25, 16 (ms)</td>
											<td>
												<div class="input-group input-large">
													<span class="input-group-addon">
														<i class="fa fa-gears"></i>
													</span>
													<input name="l3" class="form-control" type="text" value="<?php echo $listhasil->KON_BUNDLED?>" <?php echo $array_status[49];?>>
												</div>
											</td>
										</tr>
										<tr>
										<td>Keterangan</td>
										<td>
											<div class="input-group input-large">
												<span class="input-group-addon">
													<i class="fa fa-pencil-square"></i>
												</span>
												<input name="p" class="form-control" type="text" value="<?php echo $listhasil->KETERANGAN?>" <?php echo $array_status[53];?>>
											</div>
										</td>
									</tr>			
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
					<?php
				endforeach;
				?>
				<div class="form-actions top">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-4 col-md-push-5">
								<button type="submit" class="btn green">Submit</button>
								<button type="reset" class="btn default">Cancel</button>
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close();?>
			</div>
		</div>

	</div>
