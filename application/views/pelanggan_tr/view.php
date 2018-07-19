<div class="page-content">
	<div class="row">
		<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Pelanggan TR
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="icon-briefcase"></i>
							<a href="<?php echo base_url()?>pelanggan_TR">
								Pelanggan TR
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
	    						<th class="text-center">IDPEL</th>
	    						<th class="text-center">No Agenda</th>
	    						<th class="text-center">Alamat Pelanggan</th>
	    						<th class="text-center">Tarif Lama</th>
	    						<th class="text-center">Daya Lama<br>(VA)</th>
	    						<th class="text-center">Tarif Baru</th>
	    						<th class="text-center">Daya Baru<br>(VA)</th>
	    						<th class="text-center">Jenis Transaksi</th>
	    						<th class="text-center">Tanggal Bayar</th>
	    						<th class="text-center">Status Pemohon</th>
							</tr>
							</thead>
							<tbody>
							<?php
								foreach($hasil as $listhasil):
								echo "<tr>";
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
								echo "</tr>";
								endforeach;
							?>
							</tbody>
							</table>
						</div>		
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
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
										File Upload </a>
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
												echo "<td><a href='".base_url()."assets/data_upload/PelangganTR/".$listhasil->NAMA_PEL."/".$datahasil->DATA_UPLOAD."'>".$datahasil->DATA_UPLOAD."</a></td>";
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
	  </div>
	</div>
	
</div>
