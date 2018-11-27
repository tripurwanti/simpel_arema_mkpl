<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="<?php echo base_url()?>">
			<img src="<?php echo base_url()?>assets/img/logo-header.png" alt="logo" class="img-responsive">
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<?php 
                      if($_SESSION['foto']=="")
                      {
					  	echo "<img style='height : 29px; width: 29px;' alt='' src='".base_url()."assets/img/dp/no-img.jpg' class='img-circle' alt='User Image' />";
					  }
					  else
					  {
					  	echo "<img style='height : 29px; width: 29px;' alt='' src='".base_url()."assets/img/dp/".$_SESSION['foto']."' class='img-circle' alt='User Image' />";
					  }
                    ?>
					<span class="username username-hide-on-mobile"> <?php echo $_SESSION['nama'] ?> </span>
					<?php if ($_SESSION['akses']=="admin") { ?>
					<span class="username username-hide-on-mobile" id='count'></span>
					<?php } ?>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="<?php echo base_url()?>c_admin/show_edit_pass">
							<i class="icon-user"></i> My Profile </a>
						</li>
						<?php 
							if($_SESSION['akses']=="admin")
							{
						?>
						<li>
							<a href="<?php echo base_url()?>c_admin/show_all_admin">
							<i class="icon-users"></i> Daftar User</a> 
						</li>
						<?php 
							}
						?>
						<li class="divider">
						</li>
						<li>
							<a href="<?php echo base_url()?>c_admin/show_lockscreen">
							<i class="icon-lock"></i> Lock Screen </a>
						</li>
						<li>
							<a href="<?php echo base_url()?>c_admin/logout">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->