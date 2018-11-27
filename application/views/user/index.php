<div class="page-content">
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<h3 class="page-title">
				User
			</h3>
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<i class="fa fa-user"></i>
					<a href="<?php echo site_url('c_admin/show_all_admin')?>">
						User
					</a>
				</li>
			</ul>
		</div>
		<div class="col-xs-12">
			<?php echo $_SESSION['log'];
			$_SESSION['log']="";
			?>
			<div class="portlet box green"><!--start box-->
				<div class="portlet-title">
					<div class="caption"><i class="fa fa-align-justify"></i>Data User <small>(Belum Aktif)</small></div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
						<a href="javascript:;" class="reload">
						</a>
						<a href="javascript:;" class="fullscreen">
						</a>
					</div>
				</div>
				<div class="portlet-body" >
					<table class="table table-striped table-hover table-bordered display" id="datatablehori" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th rowspan="2">ID</th>
								<th rowspan="2">NAMA</th>
								<th rowspan="2">EMAIL</th>
								<th rowspan="2">AKSES</th>
								<th rowspan="2">RAYON</th>
								<th rowspan="2">USERNAME</th>
								<th rowspan="2">PASSWORD</th>
								<th rowspan="2">GAMBAR</th>
								<th colspan="2" align="center">Approval</th>
							</tr>
							<tr>
								<th>Setuju</th>
								<th>Tidak Setuju</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($hasil_unapprove as $listhasil):
								echo "<tr>";
								echo "<td class='text-center'>".$listhasil->ID."</td>";
								echo "<td>".$listhasil->NAMA."</td>";
								echo "<td>".$listhasil->EMAIL."</td>";
								echo "<td>".$listhasil->AKSES."</td>";
								echo "<td>".$listhasil->NAMA_RAYON."</td>";
								echo "<td>".$listhasil->USERNAME."</td>";
								echo "<td>".$listhasil->PASSWORD."</td>";
								if($listhasil->FOTO==""){
									echo "<td class='text-center'><img width='30' height='40' src='".base_url()."assets/img/dp/no-img.jpg'</td>";
								}else{
									echo "<td class='text-center'><img width='30' height='40' src='".base_url()."assets/img/dp/".$listhasil->FOTO."'</td>";
								}?>
								<?php if($listhasil->AKSES!="admin" OR $_SESSION['id']==$listhasil->ID){?>
									<td>
										<a title="Ubah Data Member" href="<?php echo site_url('c_admin/user_approve/'.$listhasil->ID)?>" onclick="return confirm('Anda Yakin  Menyetujui User ini?')"><button class="btn btn-sm blue filter-submit margin-bottom"><i class="fa fa-check-circle"></i> Setuju</button></a>
									</td>
									<td>
										<a title="Hapus Member"  href="<?php echo site_url('c_admin/user_unapprove/'.$listhasil->ID)?>" onclick="return confirm('Anda Yakin Tidak Menyetujui User ini?')"><button class="btn btn-sm red filter-cancel"><i class="
											fa fa-times-circle"></i>&nbsp;Tidak Setuju</button></a>
										</td>
									<?php }else{?>

										<td>
											<button class="btn btn-sm blue filter-submit margin-bottom">&nbsp;&nbsp;&nbsp;<i class="fa fa-ban"></i>&nbsp;&nbsp;&nbsp;&nbsp;</button>
										</td>
										<td>
											<button class="btn btn-sm red filter-cancel">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-ban"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
										</td>
										<?php
									}
									echo "</tr>";
								endforeach;?>
							</tbody>
						</table>
					</div><!-- /.box-body -->
				</div><!-- /.box -->

				<div class="portlet box purple-wisteria"><!--start box-->
					<div class="portlet-title">
						<div class="caption"><i class="fa fa-align-justify"></i>Data User <small>(Sudah Aktif)</small></div>
						<div class="actions">
							<a href="<?php echo site_url('c_admin/show_regis_admin')?>" class="btn btn-sm btn-default easy-pie-chart-reload"><i class="fa fa-plus"></i> Tambah </a>
						</div>
					</div>
					<div class="portlet-body">
						<table class="table table-striped table-hover table-bordered display" id="datatablehori" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>ID</th>
									<th>NAMA</th>
									<th>EMAIL</th>
									<th>AKSES</th>
									<th>RAYON</th>
									<th>USERNAME</th>
									<th>PASSWORD</th>
									<th>GAMBAR</th>
									<th>EDIT</th>
									<th>HAPUS</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach($hasil as $listhasil):
									echo "<tr>";
									echo "<td class='text-center'>".$listhasil->ID."</td>";
									echo "<td>".$listhasil->NAMA."</td>";
									echo "<td>".$listhasil->EMAIL."</td>";
									echo "<td>".$listhasil->AKSES."</td>";
									echo "<td>".$listhasil->NAMA_RAYON."</td>";
									echo "<td>".$listhasil->USERNAME."</td>";
									echo "<td>".$listhasil->PASSWORD."</td>";
									if($listhasil->FOTO==""){
										echo "<td class='text-center'><img width='30' height='40' src='".base_url()."assets/img/dp/no-img.jpg'</td>";
									}else{
										echo "<td class='text-center'><img width='30' height='40' src='".base_url()."assets/img/dp/".$listhasil->FOTO."'</td>";
									}?>
									<?php if($listhasil->AKSES!="admin" OR $_SESSION['id']==$listhasil->ID){?>
										<td>
											<a title="Ubah Data Member" href="<?php echo site_url('c_admin/show_edit_admin/'.$listhasil->ID)?>"><button class="btn btn-sm blue filter-submit margin-bottom"><i class="fa fa-edit"></i> Edit</button> </a>
										</td>
										<td>
											<a title="Hapus Member"  href="<?php echo site_url('c_admin/delete_admin/'.$listhasil->ID)?>" onclick="return confirm('Anda Yakin Akan Menghapus DATA ?')"><button class="btn btn-sm red filter-cancel"><i class="fa fa-trash"></i> &nbsp;Hapus</button> </a>
										</td>
									<?php }else{?>

										<td>
											<button class="btn btn-sm blue filter-submit margin-bottom">&nbsp;&nbsp;&nbsp;<i class="fa fa-ban"></i>&nbsp;&nbsp;&nbsp;&nbsp;</button>
										</td>
										<td>
											<button class="btn btn-sm red filter-cancel">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-ban"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
										</td>
										<?php
									}
									echo "</tr>";
								endforeach;?>
							</tbody>
						</table>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div>
		</div>	
	</div>