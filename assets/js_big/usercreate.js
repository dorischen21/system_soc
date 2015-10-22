$(function(){
	// run at page load
	var baseurl = $('#baseUrl').val();

	$('#div_userdate').datetimepicker({
		format: 'YYYY-MM-DD',
		keepInvalid: true
	});

	// Don't allow direct editing
	$('#txt_userdate').on('keypress', function(e) {
		e.preventDefault();
	});	

	$("#btn_saveUser").bind("click",function(){
		if(!$('form')[0].checkValidity()) return;
		$.ajax({
			type:'post',
			url: baseurl + 'account/doDetailUser',
			data:$('#form1').serialize(),
			statusCode:{
				200:function(data){
					if(data == '0'){
						alert('帳號重覆!');
					} else {	
						alert('已新增完成!!'); 
						window.location = baseurl + 'account/listUser';
					}
				}
			},
			error:function(){	
				alert('error');			
			}
		});
	});

	$("#btn_cancelUser").bind("click",function(){
		window.location = baseurl + 'account/listUser';
	});	

});