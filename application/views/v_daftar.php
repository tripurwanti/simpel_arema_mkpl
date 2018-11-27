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
<title>Simpel Arema | Login Form</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="<?php echo base_url()?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url()?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url()?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url()?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo base_url()?>assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url()?>assets/admin/pages/css/login3.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo base_url()?>assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url()?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url()?>assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url()?>assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo base_url()?>assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="<?php echo base_url()?>assets/img/favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="<?php echo base_url()?>">
	<img src="<?php echo base_url()?>assets/img/logo-login.PNG" alt="" height="100" width="600"/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN REGISTRATION FORM -->
	<?php echo form_open_multipart('c_admin/regis_admin','class="register-form" style="display:inline"'); ?>
		<h3>Daftar</h3>
		<?php echo $log; 
		 $_SESSION['log']="";?>
		<p>
			 Masukkan data pribadi Anda di bawah ini:
		</p>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Nama Lengkap</label>
			<div class="input-icon">
				<i class="fa fa-font"></i>
				<input class="form-control placeholder-no-fix" type="text" placeholder="Nama Lengkap" name="fullname"/>
			</div>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"/>
			</div>
		</div>
		 <div class="form-group" >
            <label class="control-label visible-ie8 visible-ie9">Foto</label>
                <div class="input-icon">
				<i class="fa fa-image"></i>
                    <input type="file" class="form-control" name="foto" />
                </div>
         </div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Hak Akses</label>
			<select name="akses" id="select2_sample4" class="select2 form-control">
				<option value=""></option>
				<!-- <option hidden value="admin" hidden>Admin</option> -->
				<option value="view">View Only</option>
				<!-- <option value="PP Area" hidden>PP Area</option> -->
				<option value="Perencanaan">Bag. Perencanaan</option>
				<option value="Konstruksi">Bag. Konstruksi</option>
				<option value="RYN LAWANG">Ry. Lawang</option>
				<option value="RYN BULULAWANG">Ry. Bululawang</option>
				<option value="RYN BATU">Ry. Batu</option>
				<option value="RYN SINGOSARI">Ry. Singosari</option>
				<option value="RYN KEPANJEN">Ry. Kepanjen</option>
				<option value="RYN TUMPANG">Ry. Tumpang</option>
				<option value="RYN GONDANGLEGI">Ry. Gondanglegi</option>
				<option value="RYN DAMPIT">Ry. Dampit</option>
				<option value="RYN NGANTANG">Ry. Ngantang</option>
				<option value="RYN SUMBER PUCUNG">Ry. Sumber Pucung</option>
				<option value="RYN DINOYO">Ry. Dinoyo</option>
				<option value="RYN BLIMBING">Ry. Blimbing</option>
				<option value="RYN MALANG KOTA">Ry. Malang Kota</option>
				<option value="RYN KEBON AGUNG">Ry. Kebon Agung</option>
			</select>
		</div>
		<p>
			 Masukkan rincian akun Anda di bawah ini:
		</p>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"/>
			</div>
			<font color="red"><?php echo form_error('password'); ?></font>
			<tr>
			<td colspan="4"><font color="red">* Password harus lebih dari 4 karakter.</font></td>
			</tr>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Ulang Password</label>
			<div class="controls">
				<div class="input-icon">
					<i class="fa fa-check"></i>
					<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Ulang Password" name="rpassword"/>
				</div>
			</div>
		</div>
		
		<div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Captcha</label>
			<div class="controls">
					<table>
					<tr>
					<td><?php echo $captcha ?></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="input-icon"><i class="fa fa-qrcode"></i><input type="text"  class="form-control placeholder-no-fix" autocomplete="off" name="captcha" placeholder="Masukan Validasi"></td>
					</tr>
					</table>
			</div>
            <font color="#ef4423"><?php echo form_error('captcha');?></font>
        </div>
		<div class="form-actions">
		<a href="<?php echo base_url()?>c_admin/show_all_admin">
			<button id="register-back-btn" type="button" class="btn">
			<i class="m-icon-swapleft"></i> Kembali </button></a>
			<button type="submit" id="register-submit-btn" class="btn green-haze pull-right">
			Sign Up <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	<?php echo form_close(); ?>
	<!-- END REGISTRATION FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 2015 &copy; PLN Arema-REN
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url()?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url()?>assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo base_url()?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url()?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url()?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/pages/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
  Metronic.init(); // init metronic core components
  Layout.init(); // init current layout
  Login.init();
  Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>