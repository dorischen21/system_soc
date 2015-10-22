<!DOCTYPE html>
<html xmlns='http://www.w4.org/1999/xhtml'>
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<title>
			Login
		</title>
		<link href='<?= base_url()?>assets/css/login.css' rel='stylesheet' type='text/css'/>

		<script src='https://code.jquery.com/jquery-1.11.3.min.js'></script>
		<script src='<?= base_url()?>assets/js/account.js'></script>
	</head>

	<body class="page-login">		
		<form id='form1' class="login-form">
			<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
			<div class="form-upper">
				<div class="title">Security Operation Center</div>
				<?= form_dropdown('txt_loginCompany',$comp,'',"class='select'")?>
				<input type="text" name="txt_loginAccount" id="txt_loginAccount" placeholder="Account"/>
				<input type="password" name="txt_loginPassword" id="txt_loginPassword" placeholder="Password"/>
			</div>
			<div class="form-lower">
				<button type="button" name="btn_login" id="btn_login" class="webs-ext-btn webs-ext-btn-green btn"><span>Login</span></button>
			</div>
			<div class="form-footer">
				<div class="logo"></div>
			</div>
		</form>
	</body>
</html>