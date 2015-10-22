
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
						<button type="button" class='btn btn-primary' name="btn_createservice" id="btn_createservice">Create</button>
					</div>
				</div>
				<table class="table table-bordered">
					<tr>
						<td class="success">姓名</td>
						<td class="success">E-mail</td>
						<td class="success">操作</td>
					</tr>
<?php if (count($servicedata) > 0): ?>
<?php foreach ($servicedata as $key => $item): ?>
					<tr>
						<td class="active"><?= $item['name'] ?></td>
						<td class="active"><?= $item['email'] ?></td>
						<td class="active col-md-2">
							<a title='刪除' href="<?= base_url()?>account/deleteservice/<?= $key ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
						</td>
					</tr>
<?php endforeach; ?>
<?php endif; ?>
				</table>
			</form>
		</div>
