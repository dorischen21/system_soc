		<script src='<?= base_url()?>assets/js/account.js'></script>
		
		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
		<div class='container'>
			<form id='form1'>
				<div class="row">
					<h1>Change Password</h1>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<h1></h1>
							<input name='txt_newPassword' type='password' id='txt_newPassword' class='form-control' placeholder='New Password' required/>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<input name='txt_confirmNewPassword' type='password' id='txt_confirmNewPassword' class='form-control' placeholder='Confirm New Password' required/>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<h1></h1>
						<button type="button" class='btn btn-primary' name="btn_changePassword" id="btn_changePassword">Change Password</button>
						<button type="button" class='btn btn-default gohome' name="btn_cancel">Cancel</button>
					</div>
				</div>
			</form>
		</div>