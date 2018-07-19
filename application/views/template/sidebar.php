<div class="page-sidebar navbar-collapse collapse">
	<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" id='sidebar-menu'>
		<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
		<li class="sidebar-toggler-wrapper">
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			<div class="sidebar-toggler" id="sidebar-toggler" style="margin-bottom: 15px;"></div>
			<!-- END SIDEBAR TOGGLER BUTTON -->
		</li>
		<li class="start <?php echo $side1; ?> ">
			<a href="<?php echo base_url()?>home">
				<i class="fa fa-home"></i>
				<span class="title">Beranda</span>
				<span class="selected"></span>
			</a>
		</li>
		<?php if($_SESSION['akses']=="admin"){ ?>
			<li class="<?php echo $side2; ?> ">
				<a href="<?php echo base_url()?>import">
					<i class="fa fa-upload"></i>
					<span class="title">Unggah Excel</span>
					<span class="selected"></span>
				</a>
			</li>
		<?php } ?>

		<li class="<?php echo $side3; ?> ">
			<a href="<?php echo base_url()?>pelanggan_TR">
				<i class="fa fa-group"></i>
				<span class="title">Detail Pelanggan</span>
				<span class="selected"></span>
			</a>
		</li>

		<li class="<?php echo $side4; ?>">
			<a href="<?php echo base_url()?>filter">
				<i class="fa fa-filter"></i>
				<span class="title">Filter</span>
				<span class="selected"></span>
			</a>
		</li>

		<li class="" id="notifbar">
			<a class="notification" id="notification-toggler">
				<i class="fa fa-bell"></i>
				<span class="title">Status Pelanggan</span>
				<span class="selected"></span>
			</a>
		</li>
		<div class="collapse multi-collapse" id="notif">
			<div class="list-group scrollnotif" style="width: 100%;margin:0" id="notif_isi">
			</div>
		</div>

		<li class="last" id='messagebar'>
			<a class="chat" id="chat-toggler">
				<i class="fa fa-comment"></i>
				<!--<span class="badge badge-danger" id="jmlpesan"></span>-->
				<span class="title">Obrolan</span>
				<span class="selected"></span>
			</a>
		</li>
		<div class="collapse multi-collapse" id="chats">
			<div id="scrolchat">
				<ul class="chats" id="isi"></ul>
			</div>
			<div class="chat-form" style="margin:0">
				<div class="input-cont">
					<input type="text" class="form-control" name="product[meta_title]" maxlength="350" autocomplete="off" id="pesan" type="text" onkeydown="if (event.keyCode == 13) document.getElementById('btn').click()" placeholder="max 350 karakter">
				</div>
				<div class="btn-cont">
					<span class="arrow">
					</span>
					<button class="btn blue icn-only" id="btn" onclick="insertData()">
						<span id="loader"><img width="16px" src="<?php echo base_url(); ?>/assets/img/ajax-loading.gif" />&nbsp;</span>
						<i class="fa fa-send icon-white"></i>
					</button>
				</div>
			</div>	
		</div>
	</ul>
	<!-- END SIDEBAR MENU -->
</div>