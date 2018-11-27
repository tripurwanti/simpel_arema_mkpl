<div class="page-content">
	<!-- BEGIN PROFILE CONTENT -->
	<div class="profile-content">
		<?php echo $_SESSION['log'];
		$_SESSION['log']="";
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet light">
					<div class="portlet-title tabbable-line">
						<div class="caption caption-md">
							<i class="icon-globe theme-font hide"></i>
							<span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
						</div>
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1_2" data-toggle="tab">Ubah Password</a>
							</li>
							<li>
								<a href="#tab_1_1" data-toggle="tab">Change Avatar</a>
							</li>
						</ul>
					</div>
					<div class="portlet-body">
						<div class="tab-content">
							<!-- CHANGE AVATAR TAB -->
							<div class="tab-pane" id="tab_1_1">
								<?php echo form_open_multipart('c_admin/edit_foto', 'role="form"'); ?>
									<div class="form-group">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
												<img src="<?php echo base_url()?>assets/img/no+image.gif" alt=""/>
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
											</div>
											<div>
												<span class="btn default btn-file" >
													<span class="fileinput-new" >
													Select image </span>
													<span class="fileinput-exists">
													Change </span>
													<input type="file" name="foto_profil">
												</span>
												<a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">
												Remove </a>
											</div>
										</div>
										<div class="clearfix margin-top-10">
											<span class="label label-danger">NOTE! </span>
											<span>Gambar thumbnail didukung hanya dalam browser terbaru Firefox , Chrome , Opera , Safari dan Internet Explorer 10 </span>
										</div>
									</div>
									<div class="margin-top-10">
										<button class="btn green-haze">
										Submit </button>
										<button class="btn default">
										Cancel </button>
									</div>
								<?php echo form_close(); ?>
							</div>
							<!-- END CHANGE AVATAR TAB -->
							<!-- CHANGE PASSWORD TAB -->
							<div class="tab-pane active" id="tab_1_2">
								<?php echo form_open('c_admin/edit_pass','class="login-form"'); ?>
								<div class="form-group">
									<label class="control-label">Password Sekarang</label>
									<input type="password" name="curpass" class="form-control"/>
								</div>
								<div class="form-group">
									<label class="control-label">Password Baru</label>
									<input type="password" name="newpass" class="form-control"/>
								</div>
								<div class="form-group">
									<label class="control-label">Ketik Ulang Password Baru</label>
									<input type="password" name="repass" class="form-control"/>
								</div>
								<div class="margin-top-10">
									<button type="submit" class="btn green-haze">
									Simpan </button>
									<button type="reset" class="btn default">
									Batal </button>
								</div>
								<?php echo form_close(); ?>
							</div>
							<!-- END CHANGE PASSWORD TAB -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END PROFILE CONTENT -->
</div>