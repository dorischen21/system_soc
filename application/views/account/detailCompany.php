		<script src='<?= base_url()?>assets/js/account.js'></script>
		
		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
		<div class='container'>
			<form id='form1'>
				<input type='hidden' id='company_id' name='company_id' value='<?= $companyid ?>'>
				<div class="row">
					<h1><?= $title ?></h1>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-2">
							<h4>公司代號</h4>
						</div>
						<div class="col-md-3">
							<h4><?= $companyid == 0 ? '(系統自動產生)' : $companyid?></h4>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-2">
							<h4>歸屬單位</h4>
						</div>
						<div class="col-md-3">
							<?= form_dropdown('txt_code',$companyCode,'',"class='form-control'")?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-2">
							<h4>公司名稱</h4>
						</div>
						<div class="col-md-3">
							<input name='txt_company' type='text' id='txt_company' class='form-control' value='<?= $companyid == 0 ? '' : $companyData[$companyid]['tw'] ?>' pattern="[^\^\`\~\!\@\#\$\%\^\&\*\(\)\_\+\-\=\[\]\\\;\'\,\.\/'\{\}\|\:\<\>\?]*" required/>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-2">
							<h4>發送mail</h4>
						</div>
						<div class="col-md-3">
							<input name='txt_companymail' type='email' id='txt_companymail' class='form-control' value='<?= $companyid == 0 ? '' : $companyData[$companyid]['mail'] ?>'/>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-2">
							<h4>Type設定</h4>
						</div>
						<div class="checkbox">
							<div class="col-md-10">
<?php if (count($type) > 0): ?>
<?php foreach ($type as $key => $item): ?>
<?php $str = (in_array($key, $ary_checked) ? "checked='checked'" : ''); ?>
							<div class="col-md-5">
								<label class="checkbox-inline">
									<input type="checkbox" name="type[]" value=<?= $key ?> <?= $str ?>> <?= $item ?>　　
								</label>
							</div>
<?php endforeach; ?>
<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<h1></h1>
						<button type="button" class='btn btn-primary' name="btn_saveCompany" id="btn_saveCompany">Save</button>
						<button type="button" class='btn btn-default' name="btn_cancelCompany" id="btn_cancelCompany">Cancel</button>
					</div>
				</div>
			</form>
		</div>