		<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>		

		<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
		<script src='<?= base_url()?>assets/js/usercreate.js'></script>

		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
		<div class='container'>
			<form method='post' id='form1'>
				<div class="row">
					<div class="col-md-3">
						<h1><?= $title ?></h1>
						<h1></h1>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-2">
							<h4>公司</h4>
						</div>
						<div class="col-md-3">
							<?= form_dropdown('txt_userCompany',$comp,'',"class='form-control'")?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-2">
							<h4>帳號</h4>
						</div>
						<div class="col-md-3">
							<input name='txt_userAccount' type='text' id='txt_userAccount' class='form-control' placeholder="only 0-9, a-z" pattern="[0-9a-z]+" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-2">
							<h4>密碼</h4>
						</div>
						<div class="col-md-3">
							<input name='txt_userPassword' type='password' id='txt_userPassword' class='form-control' placeholder="only 0-9, a-z" pattern="[0-9a-z]+" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-2">
							<h4>E-mail</h4>
						</div>
						<div class="col-md-3">
							<input name='txt_userEmail' type='email' id='txt_userEmail' class='form-control' required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-2">
							<h4>登入期限</h4>
						</div>
						<div class='col-md-3'>
							<div class="form-group">
								<div class='input-group date' id='div_userdate'>
									<input type='text' class="form-control" id="txt_userdate" name="txt_userdate" required/>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-2">
							<h4>權限</h4>
						</div>
						<div class="checkbox">
							<div class="col-md-4">
								<input type="radio" name="txt_role" id='txt_role1' value="<?= ROLE_USER ?>" checked> 使用者　
								<input type="radio" name="txt_role" id='txt_role2' value="<?= ROLE_SERVICE ?>"> 技服人員　
								<input type="radio" name="txt_role" id='txt_role3' value="<?= ROLE_ADMIN ?>"> 管理員　
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<button type="button" class='btn btn-primary' name="btn_saveUser" id="btn_saveUser">Save</button>
							<button type="button" class='btn btn-default' name="btn_cancelUser" id="btn_cancelUser">Cancel</button>
						</div>
					</div>
				</div>
			</form>
		</div>
