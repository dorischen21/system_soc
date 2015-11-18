$(function(){
	// run at page load
	var baseurl = $('#baseUrl').val();
	var hid_type = $('#hid_type').val();
	var hid_d_id = $('#hid_d_id').val();

	$('#summernote').summernote({
		toolbar: [
		['style', ['bold', 'italic', 'underline', 'clear']],
		['fontsize', ['fontsize']],
		['color', ['color']],
		['para', ['ul', 'ol', 'paragraph']],
		['height', ['height']],
		],
		height: 300,                 // set editor height
		minHeight: null,             // set minimum height of editor
		maxHeight: null,             // set maximum height of editor
		focus: true                 // set focus to editable area after initializing summernote
	});	

	$("#btn_saveCreateFile").bind("click",function(){
		if(!$('form')[0].checkValidity()) return;   //檢查form的資料，save時使用

		$('#hid_content').val($('.summernote').code());
		$.ajax({
			type:'post',
			url: baseurl + 'd/doCreateD/' + hid_type,
			data:$('#form1').serialize(),
			statusCode:{
				200:function(data){
					alert('操作成功!!'); 
					window.location = baseurl + 'd/dList/' + hid_type;
				}
			},
				error:function(){	
				alert('error');			
			}
		});
	});

	$("#btn_cancelCreateFile").bind("click",function(){
		window.location = baseurl + 'd/dList/' + hid_type;
	});	
	

	$("#btn_saveEditFile").bind("click",function(){
		if(!$('form')[0].checkValidity()) return;   //檢查form的資料，save時使用

		$('#hid_content').val($('.summernote').code());
		$.ajax({
			type:'post',
			url: baseurl + 'd/updateD/' + hid_d_id + '/' + hid_type,
			data:$('#form1').serialize(),
			statusCode:{
				200:function(data){
					alert('操作成功!!'); 
					window.location = baseurl + 'd/dList/' + hid_type;
				}
			},
				error:function(){	
				alert('error');			
			}
		});
	});

	$("#btn_cancelEditFile").bind("click",function(){
		window.location = baseurl + 'd/dList/' + hid_type;
	});	


	$("#btn_download").bind("click",function(){
		window.location = baseurl + 'd/downloadD/' + hid_d_id;
	});			

});	