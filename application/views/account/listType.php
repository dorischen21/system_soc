
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
						<button type="button" class='btn btn-primary' name="btn_createType" id="btn_createType">Create</button>
					</div>
				</div>
				<table class="table table-bordered">
					<tr>
						<td class="success">Type代號</td>
						<td class="success">Type名稱</td>
						<td class="success">Type設定<br/>(1-不受公司別限制　0-受公司別限制)</td>
						<td class="success">操作</td>
					</tr>
<?php if (count($typedata) > 0): ?>
<?php foreach ($typedata as $key => $item): ?>
					<tr>
						<td class="active col-md-1"><?= $key ?></td>
						<td class="active col-md-2"><?= $item['tw'] ?></td>
						<td class="active col-md-2"><?= $item['is_global'] ?></td>
						<td class="active col-md-1"><a title='編輯' href="<?= base_url()?>account/detailType/<?= $key ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
						</td>
					</tr>
<?php endforeach; ?>
<?php endif; ?>
				</table>
			</form>
		</div>
