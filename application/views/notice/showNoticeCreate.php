		<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>		

		<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
		<script src='<?= base_url()?>assets/js/noticecreate.js'></script>

		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>

		<div class='container'>
			<form method='post' id='form1'>
				<div class="row">
					<h1><?= $title ?></h1>
					<h1></h1>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>機關名稱</h5>
						</div>
						<div class="col-md-5">
							<?= form_dropdown('txt_company',$comp,'',"class='form-control'")?>
						</div>
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>機關代號</h5>
						</div>
						<div class="col-md-5">
							<input name='txt_customerId' type='text' id='txt_customerId' class='form-control' pattern="[0-9A-Z]+" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>發送單位</h5>
						</div>
						<div class="col-md-5">
							<?= form_dropdown('txt_bccs',$comp,'',"class='form-control'")?>
						</div>
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>事件單號</h5>	<!--資安－G01預警yymmddxxx   17碼-->
						</div>
						<div class="col-md-5">
							<h5>系統自動產生</h5>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>專案名稱</h5>
						</div>
						<div class="col-md-5">
							<input name='txt_projectName' type='text' id='txt_projectName' class='form-control' pattern="[^\^\`\~\!\@\#\$\%\^\&\*\(\)\_\+\-\=\[\]\\\;\'\,\.\/'\{\}\|\:\<\>\?]{1,255}" required>
						</div>
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>技服人員</h5>
						</div>
						<div class="col-md-5">
							<?= form_dropdown('txt_MService',$mservice,'',"class='form-control'")?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>事件主旨</h5>
						</div>
						<div class="col-md-5">
							<input name='txt_subject' type='text' id='txt_subject' class='form-control' pattern="[^\^\`\~\!\@\#\$\%\^\&\*\(\)\_\+\-\=\[\]\\\;\'\,\.\/'\{\}\|\:\<\>\?]{1,255}" required>
						</div>
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>接收人員</h5>
						</div>
						<div class="col-md-5">
							<input name='txt_email' type='email' id='txt_email' class='form-control' placeholder="aaa@gamil.com(被通知者mail)" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>事件名稱</h5>
						</div>
						<div class="col-md-5">
							<input name='txt_noticeName' type='text' id='txt_noticeName' class='form-control' pattern="[^\^\`\~\!\@\#\$\%\^\&\*\(\)\_\+\-\=\[\]\\\;\'\,\.\/'\{\}\|\:\<\>\?]{1,255}" required>
						</div>
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>發生次數</h5>
						</div>
						<div class="col-md-5">
							<input name='txt_count' type='text' id='txt_count' class='form-control' pattern="[^\^\`\~\!\@\#\$\%\^\&\*\(\)\_\+\-\=\[\]\\\;\'\,\.\/'\{\}\|\:\<\>\?]{1,40}" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>發生時間</h5>
						</div>
						<div class='col-md-5'>
							<div class="form-group">
								<div class='input-group date' id='div_date'>
									<input type='text' class="form-control" id="txt_date" name="txt_date" required/>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>結束時間</h5>
						</div>
						<div class='col-md-5'>
							<div class="form-group">
								<div class='input-group date' id='div_endDate'>
									<input type='text' class="form-control" id="txt_endDate" name="txt_endDate" required/>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>事件類型</h5>
						</div>
						<div class="col-md-5">
							<input name='txt_noticeType' type='text' id='txt_noticeType' class='form-control' value='預警通知'>
						</div>
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>嚴重等級</h5>
						</div>
						<div class="col-md-5">
							<?= form_dropdown('txt_level',$level,'',"class='form-control'")?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>目標主機</h5>
						</div>
						<div class="col-md-5">
							<input name='txt_dstIp' type='text' id='txt_dstIp' class='form-control' pattern="[0-9.,、-]{1,40}" required>
						</div>
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>目標PORT</h5>
						</div>
						<div class="col-md-5">
							<input name='txt_dstPort' type='text' id='txt_dstPort' class='form-control' pattern="[0-9.,、-]{1,40}" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>來源主機</h5>
						</div>
						<div class="col-md-5">
							<input name='txt_srcIp' type='text' id='txt_srcIp' class='form-control' pattern="[0-9.,、-]{1,40}" required>
						</div>
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>來源PORT</h5>
						</div>
						<div class="col-md-5">
							<input name='txt_srcPort' type='text' id='txt_srcPort' class='form-control' pattern="[0-9.,、-]{1,40}" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>來源主機2</h5>
						</div>
						<div class="col-md-5">
							<textarea rows="3" name='txt_srcIp2' type='text' id='txt_srcIp2' class='form-control' maxlength='255'></textarea>
						</div>
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5 rows="3">事件描述</h5>
						</div>
						<div class="col-md-5">
							<textarea rows="3" name='txt_description' type='text' id='txt_description' class='form-control' maxlength='255' required></textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>建議措施</h5>
						</div>
						<div class="col-md-5">
							<textarea rows="3" name='txt_advise' type='text' id='txt_advise' class='form-control' maxlength='255' required></textarea>
						</div>
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5 rows="3">採取措施</h5>
						</div>
						<div class="col-md-5">
							<textarea rows="3" name='txt_note' type='text' id='txt_note' class='form-control' maxlength='255'></textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<button type="button" class='btn btn-primary' name="btn_saveCreateNotice" id="btn_saveCreateNotice">Save</button>
							<button type="button" class='btn btn-default' name="btn_cancelCreateNotice" id="btn_cancelCreateNotice">Cancel</button>
						</div>
					</div>
				</div>
			</form>
		</div>
