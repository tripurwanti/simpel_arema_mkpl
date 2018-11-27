<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.1
Version: 3.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
	<title>Simpel Arema | <?php echo $title;?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<script src="<?php echo base_url()?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="<?php echo base_url()?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url()?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url()?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url()?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url()?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/global/plugins/select2/select2.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/global/plugins/datatables/css/dataTables.tableTools.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/global/plugins/datatables/css/editor.bootstrap.css"/>

	<link href="<?php echo base_url()?>assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url()?>assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url()?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url()?>assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url()?>assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL STYLES -->
	<!-- BEGIN PLUGINS USED BY X-EDITABLE -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/global/plugins/bootstrap-datepicker/css/datepicker.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
	<!-- END PLUGINS USED BY X-EDITABLE -->
	<!-- BEGIN THEME STYLES -->
	<link href="<?php echo base_url()?>assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url()?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url()?>assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
	<link id="style_color" href="<?php echo base_url()?>assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url()?>assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<!-- END MANUAL STYLES -->
	<style>
	#tambah{
		visibility: hidden;
	}
	
	th,td { white-space: nowrap; height: 10px;}
	div.dataTables_wrapper {
		margin: 0 auto;
	}

	tfoot input {
		width: 100%;
		padding: 3px;
		box-sizing: border-box;
	}

	table.dataTable tbody tr.selected {
		background-color: #ffcf2b;
		color: #d83d41;
	}

	table.dataTable thead th.ren{
		background-color: #bde1ea;
	}
	table.dataTable thead th.text-center{
		vertical-align: middle;
	}
</style>
<link rel="shortcut icon" href="<?php echo base_url()?>assets/img/favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content ">
	<!-- BEGIN HEADER -->
	<?php echo $_header;?>
	<!-- END HEADER -->
	<div class="clearfix"></div>
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar-wrapper">
			<?php echo $_sidebar;?>
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<?php echo $_content;?>
		</div>
		<!-- END CONTENT -->

	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div style="position: relative; bottom: 0; background-color:  #283032; width: 100%;" class="page-footer">
		<div class="page-footer-inner " align="right">
			Monitoring Pelanggan © 2018 - Updated By
			<b id="popoverData" data-toggle="popover" title="Autor" data-content="Fitrah N, Fajar DR" data-trigger="hover"><font color="#1CAF9A">FILKOM UB</font></b>
		</div>
		<div class="scroll-to-top">
			<i class="icon-arrow-up"></i>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url()?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url()?>assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo base_url()?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url()?>assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url()?>assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/global/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/global/plugins/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/global/plugins/datatables/dataTables.fixedColumns.js"></script>
<script src="<?php echo base_url()?>assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PLUGINS USED BY X-EDITABLE -->
<script type="text/javascript" src="<?php echo base_url()?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/global/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.zh-CN.js"></script>
<!-- END X-EDITABLE PLUGIN -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url()?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/pages/scripts/form-editable.js"></script>
<script src="<?php echo base_url()?>assets/admin/pages/scripts/components-pickers.js"></script>
<!--end of sidebar js-->
<script>
	jQuery(document).ready(function() {       
   	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init(); // init demo features
	ComponentsPickers.init();
});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover({
			placement : 'top'
		});
	});
	$('#popoverData').popover();
	$('#popoverOption').popover({ trigger: "hover" });
</script>

<script>
	function cek_datatables(jenis_data, data){
		if (jenis_data === "TR") {
			var NAMA_RYN = data[13];
			var STATUS_PERMOHONAN = data[11];
			var TGL_NYALA = data[53];
			var TGL_NODINKEKON = data[31];
		}else if (jenis_data === "TM") {
			var NAMA_RYN = data[13];
			var STATUS_PERMOHONAN = data[11];
			var TGL_NYALA = data[39];
			var TGL_NODINKEKON = data[19];
		}else if (jenis_data === "KOLEKTIF"){
			var NAMA_RYN = data[10];
			var STATUS_PERMOHONAN = data[8];
			var TGL_NYALA = data[51];
			var TGL_NODINKEKON = data[30];
		}
		if (($('#select_rayon').val() !== "") && ($('#select_status').val() !== "") && ($('#select_keterangan').val() !== "")) {
			if ($('#select_keterangan').val() === "NYALA") {
				if (($('#select_rayon').val() === NAMA_RYN) && ($('#select_status').val() === STATUS_PERMOHONAN) && (TGL_NYALA !== "")) {
					return true;
				}else{
					return false;
				}
			}else if ($('#select_keterangan').val() === "BELUM NYALA") {
				if (($('#select_rayon').val() === NAMA_RYN) && ($('#select_status').val() === STATUS_PERMOHONAN) && (TGL_NYALA === "")) {
					return true;
				}else{
					return false;
				}
			}else if ($('#select_keterangan').val() === "USULAN") {
				if (($('#select_rayon').val() === NAMA_RYN) && ($('#select_status').val() === STATUS_PERMOHONAN) && (TGL_NODINKEKON !== "") && (TGL_NYALA !== "")) {
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else if (($('#select_rayon').val() !== "") && ($('#select_status').val() !== "") && !($('#select_keterangan').val() !== "")) {
			if (($('#select_rayon').val() === NAMA_RYN) && ($('#select_status').val() === STATUS_PERMOHONAN)) {
				return true;
			}else{
				return false;
			}
		}else if (($('#select_rayon').val() !== "") && !($('#select_status').val() !== "") && ($('#select_keterangan').val() !== "")) {
			if ($('#select_keterangan').val() === "NYALA") {
				if (($('#select_rayon').val() === NAMA_RYN) && (TGL_NYALA !== "")) {
					return true;
				}else{
					return false;
				}
			}else if ($('#select_keterangan').val() === "BELUM NYALA") {
				if (($('#select_rayon').val() === NAMA_RYN) && (TGL_NYALA === "")) {
					return true;
				}else{
					return false;
				}
			}else if ($('#select_keterangan').val() === "USULAN") {
				if (($('#select_rayon').val() === NAMA_RYN) && (TGL_NODINKEKON !== "") && (TGL_NYALA !== "")) {
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else if (!($('#select_rayon').val() !== "") && ($('#select_status').val() !== "") && ($('#select_keterangan').val() !== "")) {
			if ($('#select_keterangan').val() === "NYALA") {
				if (($('#select_status').val() === STATUS_PERMOHONAN) && (TGL_NYALA !== "")) {
					return true;
				}else{
					return false;
				}
			}else if ($('#select_keterangan').val() === "BELUM NYALA") {
				if (($('#select_status').val() === STATUS_PERMOHONAN) && (TGL_NYALA === "")) {
					return true;
				}else{
					return false;
				}
			}else if ($('#select_keterangan').val() === "USULAN") {
				if (($('#select_status').val() === STATUS_PERMOHONAN) && (TGL_NODINKEKON !== "") && (TGL_NYALA !== "")) {
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else if (($('#select_rayon').val() !== "") && !($('#select_status').val() !== "") && !($('#select_keterangan').val() !== "")) {
			if (($('#select_rayon').val() === NAMA_RYN)) {
				return true;
			}else{
				return false;
			}
		}else if (!($('#select_rayon').val() !== "") && ($('#select_status').val() !== "") && !($('#select_keterangan').val() !== "")) {
			if (($('#select_status').val() === STATUS_PERMOHONAN)) {
				return true;
			}else{
				return false;
			}
		}else if (!($('#select_rayon').val() !== "") && !($('#select_status').val() !== "") && ($('#select_keterangan').val() !== "")) {
			if ($('#select_keterangan').val() === "NYALA") {
				if ((TGL_NYALA !== "")) {
					return true;
				}else{
					return false;
				}
			}else if ($('#select_keterangan').val() === "BELUM NYALA") {
				if ((TGL_NYALA === "")) {
					return true;
				}else{
					return false;
				}
			}else if ($('#select_keterangan').val() === "USULAN") {
				if ((TGL_NODINKEKON !== "") && (TGL_NYALA !== "")) {
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return true;
		}
	}
	$.fn.dataTable.ext.search.push(
		function(settings, data, dataIndex) {
			if ($('#selector').val() === "ongoing") {
				var api = new $.fn.dataTable.Api(settings);
				return api.row(dataIndex).nodes().to$().hasClass("ongoing");
			}else if ($('#selector').val() === "done") {
				var api = new $.fn.dataTable.Api(settings);
				return api.row(dataIndex).nodes().to$().hasClass("done");
			}else{
				return true;
			}
		});

	$.fn.dataTable.ext.search.push(
		function(settings, data, dataIndex) {
			if ($('#type_rayon').val() === "pelanggan_TR") {
				return cek_datatables("TR", data);
			}else if ($('#type_rayon').val() === "pelanggan_TM") {
				return cek_datatables("TM", data);
			}else if ($('#type_rayon').val() === "pelanggan_KOLEKTIF") {
				return cek_datatables("KOLEKTIF", data);
			} else {
				return true;
			}
		});

	$(document).ready(function(){
		var table = $('#datatablehori').DataTable( {
			"scrollY": "300px",
			"scrollX": true,
			"scrollCollapse": true,
			"order": [[ 0, "desc" ]],
			"pagingType": "full_numbers"
		});

		$('#datatablehori tbody').on( 'click', 'tr', function () {
			$(this).toggleClass('selected');
		} );

		new $.fn.dataTable.FixedColumns( table, {
			"leftColumns": 2
		} );

		$('#datatableuser').DataTable( {
			"scrollX": true,
			"pagingType": "full_numbers"
		});

		$('#selector').on('change', function(){
			table.draw();
		});

		$('#select_rayon').on('change', function(){
			if ($('#type_rayon').val() === "pelanggan_TR") {
				table.draw();
			}else if ($('#type_rayon').val() === "pelanggan_TM") {
				table.draw();
			}else if ($('#type_rayon').val() === "pelanggan_KOLEKTIF") {
				table.draw();
			}
		});

		$('#select_status').on('change', function(){
			if ($('#type_rayon').val() === "pelanggan_TR") {
				table.draw();	
			}else if ($('#type_rayon').val() === "pelanggan_TM") {
				table.draw();
			}else if ($('#type_rayon').val() === "pelanggan_KOLEKTIF") {
				table.draw();
			}
		});

		$('#select_keterangan').on('change', function(){
			table.draw();
		});

	});
	

</script>
</body>
<!-- END BODY -->
</html>