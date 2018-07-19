<div class="page-content">
	<div class="row">
		<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Unggah Excel
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-upload"></i>
							<a href="<?php base_url()?>import">
								Unggah Excel
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
						<i class="fa fa-gift"></i>Unggah File Excel
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
					<?php echo form_open_multipart('import/do_upload','class="form-horizontal"');?>
							<div class="form-body">
							<br>
								<div class="form-group">
									<label class="col-md-3 control-label">Jenis Monitoring</label>
									<div class="col-md-4">
										<select class="form-control input-large" name="jenis_monitoring" id="select">
											<option selected value="">--Pilih Jenis Monitoring--</option>
											<option value="pelTR">Pelanggan TR</option>
											<option value="kolektif">Pelanggan Kolektif</option>
											<option value="pelTM">Pelanggan TM</option>
										</select>
									</div>
									<font color="#ef4423"><?php echo form_error('jenis_monitoring'); ?></font>
								</div>
								<br>
								<div class="form-group">
									<label class="col-md-3 control-label">File Excel</label>
									<div class="col-md-4">
										<input type="file" id="exampleInputFile" name="xlsimport">
				                    	<span class="help-block">
											format file excel (.xls)
										</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label"></label>
									<div class="col-md-4">
										<input type="checkbox" name="drop" value="1" /> <u>Kosongkan data terlebih dahulu.</u>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label"></label>
									<div class="col-md-4">
										<a href="<?php base_url()?>assets/download/Template MONITORING PB PD AREA MALANG.xls">Download Template Ms Excel</a>
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