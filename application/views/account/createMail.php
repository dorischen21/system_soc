		<script src='<?= base_url()?>assets/js/account.js'></script>

		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
		<div class='container'>
			<form method='post' id='form1'>
				<div class="row">
					<div class="col-md-4">
						<h3>最新消息mail發送設定</h3>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-3">			
							<textarea name='txt_mail' type='text' id='txt_mail' class='form-control' placeholder="一行一個郵件信箱" required><?= $maildata?></textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<button type="button" class='btn btn-primary' name="btn_saveMail" id="btn_saveMail">Save</button>
							<button type="button" class='btn btn-default gohome' name="btn_cancel">Cancel</button>
						</div>
					</div>
				</div>
			</form>
		</div>
