<div class="page-sidebar navbar-collapse collapse">
	<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" id='sidebar-menu'>
		<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
		<li class="sidebar-toggler-wrapper">
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			<div class="sidebar-toggler" id="sidebar-toggler" style="margin-bottom: 15px;"></div>
			<!-- END SIDEBAR TOGGLER BUTTON -->
		</li>
		<li class="start <?php echo $side1; ?> ">
			<a href="<?php echo base_url()?>c_admin">
				<i class="fa fa-home"></i>
				<span class="title">Beranda</span>
				<span class="selected"></span>
			</a>
		</li>
		<?php if($_SESSION['akses']=="admin"){ ?>
		<li class="<?php echo $side2; ?> ">
			<a href="<?php echo base_url()?>c_import">
				<i class="fa fa-upload"></i>
				<span class="title">Unggah Excel</span>
				<span class="selected"></span>
			</a>
		</li>
		<?php } ?>
		<li class="<?php echo $side3; ?> ">
			<a href="<?php echo base_url()?>pelanggan_TR">
				<i class="fa fa-group"></i>
				<span class="title">Pelanggan TR</span>
				<span class="selected"></span>
			</a>
		</li>
		<li class="<?php echo $side4; ?> ">
			<a href="<?php echo base_url()?>pelanggan_TM">
				<i class="fa fa-group"></i>
				<span class="title">Pelanggan TM</span>
				<span class="selected"></span>
			</a>
		</li>
		<li class="<?php echo $side5; ?> ">
			<a href="<?php echo base_url()?>kolektif">
				<i class="fa fa-group"></i>
				<span class="title">Pelanggan Kolektif</span>
				<span class="selected"></span>
			</a>
		</li>

		<li class="<?php echo $side6; ?>">
			<a href="<?php echo base_url()?>c_filter">
				<i class="fa fa-filter"></i>
				<span class="title">Filter</span>
				<span class="selected"></span>
			</a>
		</li>
	</ul>
	<!-- END SIDEBAR MENU -->
</div>