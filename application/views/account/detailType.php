		<script src='<?= base_url()?>assets/js/account.js'></script>
		
		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
		<div class='container'>
			<form id='form1'>
				<div class="row">
					<h1><?= $title ?></h1>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-2">
							<h4>Type代號</h4>
						</div>						
						<div class="col-md-3">
							<h4><?= $typeID == 0 ? '(系統自動產生)' : $typeID ?></h4>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-2">
							<h4>Type名稱</h4>
						</div>						
						<div class="col-md-3">
							<input name='txt_tw' type='text' id='txt_tw' class='form-control' value='<?= $typeID == 0 ? '' : $typeData[$typeID]['tw'] ?>' pattern="[^\^\`\~\!\@\#\$\%\^\&\*\(\)\_\+\-\=\[\]\\\;\'\,\.\/'\{\}\|\:\<\>\?]*" required/>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-2">
							<h4>Type設定</h4>
						</div>					
						<div class="checkbox">
							<div class="col-md-4">
								<input type="radio" name="txt_isGlobal" id='txt_isGlobal1' value='1' <?= $typeID == 0 ? '' : (($typeData[$typeID]['is_global']) ? "checked='checked'" : '') ?>>　不受公司別限制　
								<input type="radio" name="txt_isGlobal" id='txt_isGlobal2' value='0' <?= $typeID == 0 ? '' : (!($typeData[$typeID]['is_global']) ? "checked='checked'" : '') ?>>　受公司別限制
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<h1></h1>
						<button type="button" class='btn btn-primary' name="btn_saveType" id="btn_saveType">Save</button>
						<button type="button" class='btn btn-default' name="btn_cancelType" id="btn_cancelType">Cancel</button>
					</div>
				</div>
			</form>
		</div>