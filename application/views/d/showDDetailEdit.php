		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?= base_url()?>assets/css/summernote.css" rel="stylesheet">
		
		<script src="<?= base_url()?>assets/js/summernote.min.js"></script>
		<script src='<?= base_url()?>assets/js/dDetail.js'></script>

		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>

		<div class='container'>
			<form method='post' id='form1'>
				<input type='hidden' id='hid_type' value='<?= $type ?>'>
				<input type='hidden' id='hid_d_id' value='<?= $d_id ?>'>
				<input type='hidden' id='hid_isEditable' value='<?= $isEditable ?>'>
				<input type='hidden' id='hid_content' name='hid_content' value=''>

				<input type='hidden' id='ROLE_ADMIN' value='<?= ROLE_ADMIN ?>'>
				<input type='hidden' id='ROLE_USER' value='<?= ROLE_USER ?>'>

				
				<div class="row">
					<h1><?= $title ?></h1>
					<h1></h1>					
				</div>

<!-- user 不顯示公司 -->
<?php if($this->session->userdata('role') != ROLE_USER): ?>
				<div class="form-group">
					<div class="row">
						<p><span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>　<?= $companyname ?></p>
					</div>
				</div>
<?php endif; ?>		

				<div class="form-group">
					<div class="row">
						<p><span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>　<?= $filename ?>　<button type="button" class='btn btn-warning' name="btn_download" id="btn_download">Download</button></p>
					</div>
				</div>	

<!-- admin + editable 可修改 summernote -->
<?php if(($isEditable == '1') && ($this->session->userdata('role') == ROLE_ADMIN)): ?>
				<div id="summernote" class='summernote'><?= $filetext ?></div>
<?php else: ?>
				<div class="row panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-align-left" aria-hidden="true">　內文</span></h3>
					</div>
					<div class="panel-body">
						<?= $filetext ?>
					</div>
				</div>
<?php endif; ?>			

				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
<?php if(($isEditable == '1') && ($this->session->userdata('role') == ROLE_ADMIN)): ?>
							<button type="button" class='btn btn-primary' name="btn_saveEditFile" id="btn_saveEditFile">Save</button>
<?php endif; ?>			
							<button type="button" class='btn btn-default' name="btn_cancelEditFile" id="btn_cancelEditFile">Cancel</button>
						</div>
					</div>
				</div>

			</form>
		</div>
