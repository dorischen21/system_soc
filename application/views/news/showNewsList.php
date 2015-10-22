		
		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
		<div class='container'>
			<form id='form1'>
				<div class="row">
					<h1>資安威脅預警</h1>
				</div>
				<div class="form-group">
<?php if (count($ary_news) > 0): ?>
<?php foreach ($ary_news as $key => $item): ?>
<?php if(strval($item['isGlobal']) == '1'): ?>
					<div class="col-md-5">
						<div class="row panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">
									<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
									<a href='<?= base_url()?>d/dList/<?= $key ?>'><?= $item['tw'] ?></a>
								</h3>
							</div>
							<div class="panel-body">
								<div class='row'>
								<span class="col-md-9">
<?php if(strlen($item['did']) == 0): ?>									
									<?= $item['name'] ?>
<?php else: ?>							
									<a href='<?= base_url()?>d/showDDetailEdit/<?= $item['did'] ?>/<?= $key ?>/0'><?= $item['name'] ?>
									</a>
<?php endif; ?>		
								</span>
								<span class="col-md-3 text-right"><small><?= $item['createDate'] ?></small></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-1">
					</div>
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
				</div>
				<div class="col-md-12">
					<div class="row" >
						<h1>交付報告書</h1>
					</div>
				</div>
				<div class="form-group">
<?php if (count($ary_news) > 0): ?>
<?php foreach ($ary_news as $key => $item): ?>
<?php if(strval($item['isGlobal']) == '0'): ?>
					<div class="col-md-5">
						<div class="row panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">
									<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
									<a href='<?= base_url()?>d/dList/<?= $key ?>'><?= $item['tw'] ?></a>
								</h3>
							</div>
							<div class="panel-body">
								<div class='row'>
								<span class="col-md-9">
<?php if(strlen($item['did']) == 0): ?>									
									<?= $item['name'] ?>
<?php else: ?>							
									<a href='<?= base_url()?>d/showDDetailEdit/<?= $item['did'] ?>/<?= $key ?>/0'><?= $item['name'] ?>
									</a>
<?php endif; ?>		
								</span>
								<span class="col-md-3 text-right"><small><?= $item['createDate'] ?></small></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-1">
					</div>
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
				</div>
			</form>
		</div>