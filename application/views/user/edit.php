<div class="page-content">
	<div class="row">
		<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					User Edit
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="icon-briefcase"></i>
							<a href="<?php echo base_url()?>user">
								user
							</a>
						</li>
					</ul>
				</div>
      <div class="col-xs-12">
	     <?php echo $_SESSION['log'];
			$_SESSION['log']="";
		 ?>
	     		<div class="portlet box blue-steel">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-pencil-square"></i> Edit User
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
						<?php echo form_open('user/dataupdate','class="form-horizontal"');?>
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
							<?php
								foreach($hasil as $listhasil):
							?>
							<tr>
								<td>ID</td>
								<td>
								<div class="input-group input-large">
									<span class="input-group-addon">
										<i class="fa fa-lock"></i>
									</span>
									<input name="id" class="form-control" type="text" value="<?php echo $listhasil->ID?>" readonly="yes">
								</div>
								</td>
							</tr>
							<tr>
								<td>NAMA</td>
								<td>
								<div class="input-group input-large">
									<span class="input-group-addon">
										<i class="fa fa-pencil-square"></i>
									</span>
									<input name="nama" class="form-control" type="text" value="<?php echo $listhasil->NAMA?>">
								</div>

								</td>
							</tr>
							<tr>
								<td>EMAIL</td>
								<td>
								<div class="input-group input-large">
									<span class="input-group-addon">
										<i class="fa fa-pencil-square"></i>
									</span>
									<input name="email" class="form-control" type="text" value="<?php echo $listhasil->EMAIL?>">
								</div>
								</td>
							</tr>
							<tr>
								<td>AKSES</td>
								<td>
								<div class="input-group input-large">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<input class="form-control" type="text" value="<?php echo $listhasil->AKSES?>" disabled>
								</div>
								</td>
							</tr>
							<tr>
								<td>RAYON</td>
								<td>
								<div class="input-group input-large">
									<span class="input-group-addon">
										<i class="fa fa-map-marker"></i>
									</span>
									<input class="form-control" type="text" value="<?php echo $listhasil->NAMA_RAYON?>" disabled>
								</div>
								</td>
							</tr>
							<tr>
								<td>USERNAME</td>
								<td>
								<div class="input-group input-large">
									<span class="input-group-addon">
										<i class="fa fa-dollar"></i>
									</span>
									<input name="username" class="form-control" type="text" value="<?php echo $listhasil->USERNAME?>">
								</div>
								</td>
							</tr>
							<tr>
								<td>NEW PASSWORD</td>
								<td>
								<div class="input-group input-large">
									<span class="input-group-addon">
										<i class="fa fa-lightbulb-o"></i>
									</span>
									<input name="password" class="form-control" type="text" >
								</div>
								</td>
							</tr>
							<?php
								endforeach;
							?>
							</tbody>
							</table>
							</div>
							<div class="form-actions top">
								<div class="row">
									<div class="col-md-12">
										<div class="pull-right">
											<button type="submit" class="btn green">Submit</button>
											<button type="reset" class="btn default">Cancel</button>
										</div>
									</div>
								</div>
							</div>
							<?php echo form_close();?>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
	  </div>
	</div>
	
</div>
