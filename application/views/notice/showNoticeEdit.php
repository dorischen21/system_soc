		<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>		
		<link href='<?= base_url()?>assets/css/print.css' rel='stylesheet' type='text/css'/>		

		<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
		<script src='<?= base_url()?>assets/js/notice.js'></script>
		<script src='<?= base_url()?>assets/js/noticecreate.js'></script>

		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
		<input type='hidden' id='hid_notice_id' value='<?= $notice_id ?>'>
		<input type='hidden' id='hid_isEditable' value='<?= $isEditable ?>'>
		<input type='hidden' id='ROLE_ADMIN' value='<?= ROLE_ADMIN ?>'>
		<input type='hidden' id='ROLE_SERVICE' value='<?= ROLE_SERVICE ?>'>

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
							<h5><?= $ary_editnotice[$notice_id]['companyname'] ?></h5>
						</div>
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>機關代號</h5>
						</div>
						<div class="col-md-5">
							<h5><?= $ary_editnotice[$notice_id]['customer_id'] ?></h5>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>發送單位</h5>
						</div>
						<div class="col-md-5">
							<h5><?= $ary_editnotice[$notice_id]['bccs'] ?></h5>
						</div>
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>事件單號</h5>
						</div>
						<div class="col-md-5">
							<h5><?= $ary_editnotice[$notice_id]['number'] ?></h5>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>專案名稱</h5>
						</div>
						<div class="col-md-5">
							<input name='txt_projectName' type='text' id='txt_projectName' class='form-control' value='<?= $ary_editnotice[$notice_id]['projectname'] ?>' required <?= ((strval($isEditable) == '1') && ($this->session->userdata('role') == ROLE_ADMIN)) ? '' : 'readonly' ?> pattern="[^\^\`\~\!\@\#\$\%\^\&\*\(\)\_\+\-\=\[\]\\\;\'\,\.\/'\{\}\|\:\<\>\?]{1,255}" required>
						</div>
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>技服人員</h5>
						</div>
						<div class="col-md-5">
							<?= form_dropdown('txt_MService',$mservice, $ary_editnotice[$notice_id]['m_service_id'],"class='form-control'") ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>事件主旨</h5>
						</div>
						<div class="col-md-5">
							<input name='txt_subject' type='text' id='txt_subject' class='form-control' value='<?= $ary_editnotice[$notice_id]['subject'] ?>' required <?= ((strval($isEditable) == '1') && ($this->session->userdata('role') == ROLE_ADMIN)) ? '' : 'readonly' ?> pattern="[^\^\`\~\!\@\#\$\%\^\&\*\(\)\_\+\-\=\[\]\\\;\'\,\.\/'\{\}\|\:\<\>\?]{1,255}" required>
						</div>
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>接收人員</h5>
						</div>
						<div class="col-md-5">
							<input name='txt_email' type='email' id='txt_email' class='form-control' placeholder="aaa@gamil.com(被通知者mail)" value='<?= $ary_editnotice[$notice_id]['email'] ?>' required <?= ((strval($isEditable) == '1') && ($this->session->userdata('role') == ROLE_ADMIN)) ? '' : 'readonly' ?>>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>事件名稱</h5>
						</div>
						<div class="col-md-5">
							<input name='txt_noticeName' type='text' id='txt_noticeName' class='form-control' value='<?= $ary_editnotice[$notice_id]['name'] ?>' required <?= ((strval($isEditable) == '1') && ($this->session->userdata('role') == ROLE_ADMIN)) ? '' : 'readonly' ?> pattern="[^\^\`\~\!\@\#\$\%\^\&\*\(\)\_\+\-\=\[\]\\\;\'\,\.\/'\{\}\|\:\<\>\?]{1,255}" required>
						</div>
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>發生次數</h5>
						</div>
						<div class="col-md-5">
							<input name='txt_count' type='text' id='txt_count' class='form-control' value='<?= $ary_editnotice[$notice_id]['count'] ?>' required <?= ((strval($isEditable) == '1') && ($this->session->userdata('role') == ROLE_ADMIN)) ? '' : 'readonly' ?> pattern="[^\^\`\~\!\@\#\$\%\^\&\*\(\)\_\+\-\=\[\]\\\;\'\,\.\/'\{\}\|\:\<\>\?]{1,40}" required>
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
									<input type='text' class="form-control" id="txt_date" name="txt_date" value='<?= $ary_editnotice[$notice_id]['create_date'] ?>' required <?= ((strval($isEditable) == '1') && ($this->session->userdata('role') == ROLE_ADMIN)) ? '' : 'readonly' ?>/>
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
								<div class='input-group date' id='div_date'>
									<input type='text' class="form-control" id="txt_endDate" name="txt_endDate" value='<?= $ary_editnotice[$notice_id]['end_date'] ?>' required <?= ((strval($isEditable) == '1') && ($this->session->userdata('role') == ROLE_ADMIN)) ? '' : 'readonly' ?>/>
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
							<input name='txt_noticeType' type='text' id='txt_noticeType' class='form-control' value='<?= $ary_editnotice[$notice_id]['type'] ?>' <?= ((strval($isEditable) == '1') && ($this->session->userdata('role') == ROLE_ADMIN)) ? '' : 'readonly' ?> required>
						</div>
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>嚴重等級</h5>
						</div>
						<div class="col-md-5">
							<?= form_dropdown('txt_level',$level, $ary_editnotice[$notice_id]['level'],"class='form-control'") ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>來源主機</h5>
						</div>
						<div class="col-md-5">
							<input name='txt_srcIp' type='text' id='txt_srcIp' class='form-control' value='<?= $ary_editnotice[$notice_id]['src_ip'] ?>' required <?= ((strval($isEditable) == '1') && ($this->session->userdata('role') == ROLE_ADMIN)) ? '' : 'readonly' ?> pattern="[^\^\`\~\!\@\#\$\%\^\&\*\(\)\_\+\-\=\[\]\\\;\'\/'\{\}\|\:\<\>\?]{1,40}" required>
						</div>
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>來源PORT</h5>
						</div>
						<div class="col-md-5">
							<input name='txt_srcPort' type='text' id='txt_srcPort' class='form-control' value='<?= $ary_editnotice[$notice_id]['src_port'] ?>'required <?= ((strval($isEditable) == '1') && ($this->session->userdata('role') == ROLE_ADMIN)) ? '' : 'readonly' ?> pattern="[^\^\`\~\!\@\#\$\%\^\&\*\(\)\_\+\=\[\]\\\;\'\.\/'\{\}\|\:\<\>\?]{1,40}" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>目標主機</h5>
						</div>
						<div class="col-md-5">
							<input name='txt_dstIp' type='text' id='txt_dstIp' class='form-control' value='<?= $ary_editnotice[$notice_id]['dst_port'] ?>' required <?= ((strval($isEditable) == '1') && ($this->session->userdata('role') == ROLE_ADMIN)) ? '' : 'readonly' ?> pattern="[^\^\`\~\!\@\#\$\%\^\&\*\(\)\_\+\=\[\]\\\;\'\.\/'\{\}\|\:\<\>\?]{1,40}" required>
						</div>
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>目標PORT</h5>
						</div>
						<div class="col-md-5">
							<input name='txt_dstPort' type='text' id='txt_dstPort' class='form-control' value='<?= $ary_editnotice[$notice_id]['dst_port'] ?>' required <?= ((strval($isEditable) == '1') && ($this->session->userdata('role') == ROLE_ADMIN)) ? '' : 'readonly' ?> pattern="[^\^\`\~\!\@\#\$\%\^\&\*\(\)\_\+\=\[\]\\\;\'\.\/'\{\}\|\:\<\>\?]{1,40}" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5 rows="3">事件描述</h5>
						</div>
						<div class="col-md-5">
							<textarea rows="3" name='txt_description' type='text' id='txt_description' class='form-control' maxlength='255' required <?= ((strval($isEditable) == '1') && (($this->session->userdata('role') == ROLE_ADMIN) or ($this->session->userdata('role') == ROLE_SERVICE))) ? '' : 'readonly' ?>><?= $ary_editnotice[$notice_id]['description'] ?></textarea>
						</div>
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5>建議措施</h5>
						</div>
						<div class="col-md-5">
							<textarea rows="3" name='txt_advise' type='text' id='txt_advise' class='form-control' maxlength='255' required  <?= ((strval($isEditable) == '1') && (($this->session->userdata('role') == ROLE_ADMIN) or ($this->session->userdata('role') == ROLE_SERVICE))) ? '' : 'readonly' ?>><?= $ary_editnotice[$notice_id]['advise'] ?></textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
							<h5 rows="3">採取措施</h5>
						</div>
						<div class="col-md-5">
							<textarea rows="3" name='txt_note' type='text' id='txt_note' class='form-control' maxlength='255' ><?= $ary_editnotice[$notice_id]['note'] ?></textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<div id="with_or_without_print">
<?php if(($isEditable == '1') && ($this->session->userdata('role') != ROLE_USER)): ?>
								<button type="button" class='btn btn-primary' name="btn_saveEditNotice" id="btn_saveEditNotice">Save</button>
<?php endif; ?>				
								<button type="button" class='btn btn-default' name="btn_cancelEditNotice" id="btn_cancelEditNotice">Cancel</button>
								<button type="button" class='btn btn-default' onclick="window.print()">Print</button>
							</div>
							<div id="with_print">本文件係屬漢昕資訊管理中心所有，非經同意不得將全部或部分內容揭露於第三人</div>
						</div>
					</div>
				</div>
			</form>
		</div>