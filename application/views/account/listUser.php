
		<script src='<?= base_url()?>assets/js/user.js'></script>

		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
		<div class='container'>
			<form id='form1'>
				<div class="row">
					<h1><?= $title ?></h1>
				</div>
				<div class="form-group">
					<div class="row">
						<h1></h1>
						<button type="button" class='btn btn-primary' name="btn_createUser" id="btn_createUser">Create</button>
					</div>
				</div>
				<table class="table table-bordered">
					<tr>
						<td class="success">公司代號</td>
						<td class="success">公司名稱</td>
						<td class="success">帳號</td>
						<td class="success">E-mail</td>
						<td class="success">登入期限</td>
						<td class="success">權限</td>
						<td class="success">操作</td>
					</tr>
<?php if (count($userdata) > 0): ?>
<?php foreach ($userdata as $key => $item): ?>
					<tr>
						<td class="active col-md-1"><?= $item['company_id'] ?></td>
						<td class="active"><?= $item['company'] ?></td>
						<td class="active"><?= $item['account'] ?></td>
						<td class="active"><?= $item['email'] ?></td>
						<td class="active"><?= $item['date'] ?></td>
						<td class="active"><?= $item['role'] ?></td>
						<td class="active col-md-2">
							<a title='刪除' href="<?= base_url()?>account/deleteUser/<?= $key ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
						</td>
					</tr>
<?php endforeach; ?>
<?php endif; ?>
				</table>
			</form>
		</div>
