
		<script src='<?= base_url()?>assets/js/account.js'></script>

		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
		<div class='container'>
			<form id='form1'>
				<div class="row">
					<h1><?= $title ?></h1>
				</div>
				<div class="form-group">
					<div class="row">
						<h1></h1>
						<button type="button" class='btn btn-primary' name="btn_createCompany" id="btn_createCompany">Create</button>
					</div>
				</div>
				<table class="table table-bordered">
					<tr>
						<td class="success">序號</td>
						<td class="success">歸屬單位(G：政府　E：企業)</td>
						<td class="success">公司名稱</td>
						<td class="success">操作</td>
					</tr>
<?php if (count($companydata) > 0): ?>
<?php foreach ($companydata as $key => $item): ?>
					<tr>
						<td class="active col-md-1"><?= $key ?></td>
						<td class="active col-md-2"><?= $item['code'] ?></td>
						<td class="active col-md-2"><?= $item['tw'] ?></td>
						<td class="active col-md-2"><a title='編輯' href="<?= base_url()?>account/detailCompany/<?= $key ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
					</tr>
<?php endforeach; ?>
<?php endif; ?>
				</table>
			</form>
		</div>
