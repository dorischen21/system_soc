<!DOCTYPE html>
<html xmlns='http://www.w4.org/1999/xhtml'>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
			<?= $title ?>
		</title>
		<link href='<?= base_url()?>assets/css/bootstrap.css' rel='stylesheet' type='text/css'/>
		<link href='<?= base_url()?>assets/css/bootstrap-nav-color.css' rel='stylesheet' type='text/css'/>
		<link href='<?= base_url()?>assets/css/validation.css' rel='stylesheet' type='text/css'/>		
		<link href='<?= base_url()?>assets/css/sticky-footer.css' rel='stylesheet' type='text/css'/>		
		<link href='<?= base_url()?>assets/css/header.css' rel='stylesheet' type='text/css'/>		
		<script src='https://code.jquery.com/jquery-1.11.3.min.js'></script>
		<script src='<?= base_url()?>assets/js/moment.js'></script>
		<script src='<?= base_url()?>assets/js/bootstrap.js'></script>

	</head>
	<body>

<nav class="navbar navbar-default">
	<div class="container-fluid">
	<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand headerlogo" href="<?= base_url()?>news/showNewsList">SOC</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<h4 style="margin-top: 0px;"><p class="navbar-text"><?= $this->session->userdata('company_name') ?></p></h4>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> 主選單<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?= base_url()?>news/showNewsList">最新資訊</a></li>
						<li role="separator" class="divider"></li>
						<li class='disabled'><a href="#">資安威脅預警</a></li>
<?php foreach ($headerType[1] as $item): ?>
						<li><a href="<?= base_url()?>d/dList/<?= $item['type'] ?>">　<?= $item['tw'] ?></a></li>
<?php endforeach; ?>						
						<li class='disabled'><a href="#">交付報告書</a></li>
<?php foreach ($headerType[0] as $item): ?>
						<li><a href="<?= base_url()?>d/dList/<?= $item['type'] ?>">　<?= $item['tw'] ?></a></li>
<?php endforeach; ?>
						<li role="separator" class="divider"></li>
						<li><a href="<?= base_url()?>notice/noticeList">資安警訊通報</a></li>
					</ul>
				</li>
<?php if ($this->session->userdata('role') == ROLE_ADMIN): ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> 設定<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?= base_url()?>account/listUser">使用者管理</a></li>
						<li><a href="<?= base_url()?>account/listCompany">公司管理</a></li>
						<li><a href="<?= base_url()?>account/listService">技服人員管理</a></li>
						<li><a href="<?= base_url()?>account/listType">Type管理</a></li>
						<li><a href="<?= base_url()?>account/createMail">最新消息mail資料設定</a></li>
					</ul>
				</li>
<?php endif; ?>	
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?= $account ?><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?= base_url()?>account/changePassword">變更密碼</a></li>
						<li><a href="<?= base_url()?>account/doLogout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>登出</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
