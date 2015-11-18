$(function () {
	var baseurl = $('#baseUrl').val();

	$('#div_date').datetimepicker({
		format: 'YYYY-MM-DD HH:mm:ss',
		keepInvalid: true
	});

	// Don't allow direct editing
	$('#txt_date').on('keypress', function(e) {
		e.preventDefault();
	});	

	$("#btn_saveCreateNotice").bind("click",function(){
		if(!$('form')[0].checkValidity()) return;   //檢查form的資料，save時使用

		$.ajax({
			type:'post',
			url: baseurl + 'notice/doCreateNotice',
			data:$('#form1').serialize(),
			statusCode:{
				200:function(data){
					alert('操作成功!!'); 
					window.location = baseurl + 'notice/noticeList';
				}
			},
			error:function(){	
				alert('error');			
			}
		});
	});

	$("#btn_cancelCreateNotice").bind("click",function(){
		window.location = baseurl + 'notice/noticeList';
	});
});
