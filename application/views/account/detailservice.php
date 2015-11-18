		<script src='<?= base_url()?>assets/js/account.js'></script>

		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
		<div class='container'>
			<form method='post' id='form1'>
				<div class="row">
					<div class="col-md-3" style="padding-bottom: 30px;">
						<h1><?= $title ?></h1>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1">
							<h4>姓名</h4>
						</div>
						<div class="col-md-3">
							<input name='txt_servicename' type='text' id='txt_servicename' class='form-control' pattern="[^\^\`\~\!\@\#\$\%\^\&\*\(\)\_\+\-\=\[\]\\\;\'\,\.\/'\{\}\|\:\<\>\?]*" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1">
							<h4>E-mail</h4>
						</div>
						<div class="col-md-3">
							<input name='txt_servicemail' type='email' id='txt_servicemail' class='form-control' required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<button type="button" class='btn btn-primary' name="btn_saveService" id="btn_saveService">Save</button>
							<button type="button" class='btn btn-default' name="btn_cancelService" id="btn_cancelService">Cancel</button>
						</div>
					</div>
				</div>
			</form>
		</div>
