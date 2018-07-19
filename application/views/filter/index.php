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
							<a href="<?php base_url()?>filter">
								Filter
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
					<?php echo form_open_multipart('filter/datafilter','class="form-horizontal"');?>
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
		</div>
	</div>
</div>