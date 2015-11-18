		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?= base_url()?>assets/css/summernote.css" rel="stylesheet">
		
		<script src="<?= base_url()?>assets/js/summernote.min.js"></script>
		<script src='<?= base_url()?>assets/js/dDetail.js'></script>

		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>

		<div class='container'>
			<form method='post' id='form1'>
				<input type='hidden' id='hid_type' name='hid_type' value='<?= $type ?>'>
				<input type='hidden' id='hid_content' name='hid_content' value=''>
				<!-- upload data-->
				<input type='hidden' id='hid_fileSize1' name='hid_fileSize1' value=''>
				<input type='hidden' id='hid_fileSize2' name='hid_fileSize2' value=''>
				<input type='hidden' id='hid_filePath1' name='hid_filePath1' value=''>
				<input type='hidden' id='hid_filePath2' name='hid_filePath2' value=''>

				<div class="row">
					<h1><?= $title ?></h1>
					<h1></h1>					
				</div>

				<div class="form-group" <?= ($typeDate[$type]['is_global'] == '1') ? "style='display:none;'" : '' ?> >
					<div class="row">
						<div class="col-md-2">
							<h4>隸屬公司</h4>
						</div>
						<div class="col-md-3">
							<?= form_dropdown('txt_company',$comp,'',"class='form-control'")?>
						</div>
					</div>
				</div>	
				<div class="form-group">
					<div class="row">
						<div class="col-md-2">
							<h4>文件標題</h4>
						</div>
						<div class="col-md-5">
							<input name='txt_documentTitle' type='text' id='txt_documentTitle' class='form-control' pattern="[^\^\`\~\!\@\#\$\%\^\&\*\(\)\+\-\=\[\]\\\;\'\,\.\/'\{\}\|\:\<\>\?]*" required>
						</div>
					</div>
				</div>				
				<div class="form-group">
					<div class="row">
						<div class="col-md-2">
							<h4>檔案上傳</h4>
						</div>
						<div class="col-md-5">
							<h5>
								<input class='form-control' type='text' name='txt_fileUpload1' readonly>
								<input id="txt_fileUpload1" type="file" name="files[]" data-url="<?= base_url()?>server/php/" multiple>
							</h5>								
						</div>
						<div class="col-md-5">
							<h5>
								<input class='form-control' type='text' name='txt_fileUpload2' readonly>
								<input id="txt_fileUpload2" type="file" name="files[]" data-url="<?= base_url()?>server/php/" multiple>
							</h5>								
						</div>
					</div>
				</div>
				<div id="summernote" class='summernote'></div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<button type="button" class='btn btn-primary' name="btn_saveCreateFile" id="btn_saveCreateFile">Save</button>
							<button type="button" class='btn btn-default' name="btn_cancelCreateFile" id="btn_cancelCreateFile">Cancel</button>
						</div>
					</div>
				</div>
			</form>
		</div>

<script src="<?= base_url()?>assets/js/vendor/jquery.ui.widget.js"></script>
<script src="<?= base_url()?>assets/js/jquery.iframe-transport.js"></script>
<script src="<?= base_url()?>assets/js/jquery.fileupload.js"></script>
<script type="text/javascript">
$(function () {
	$('#txt_fileUpload1').fileupload({
		dataType: 'json',
		done: function (e, data) {
			$.each(data.result.files, function (index, file) {
				$('input[name=txt_fileUpload1]').val(file.name);
				$('#hid_fileSize1').val(file.size);
				$('#hid_filePath1').val(file.name);
			});
		}
	});
	$('#txt_fileUpload2').fileupload({
		dataType: 'json',
		done: function (e, data) {
			$.each(data.result.files, function (index, file) {
				$('input[name=txt_fileUpload2]').val(file.name);
				$('#hid_fileSize2').val(file.size);
				$('#hid_filePath2').val(file.name);
			});
		}
	});
});
</script>