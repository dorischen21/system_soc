$(function(){
	// run at page load
	var baseurl = $('#baseUrl').val();

	$("#btn_login").bind("click",function(){
		$.ajax({
			type:'post',
			url: baseurl + 'account/doLogin',
			data:$('#form1').serialize(),
			statusCode:{
				200:function(data){
					if(data == '0' || data == '2'){
						if(data == '0') {
							alert('帳密錯誤');
						} else {
							alert('登入期限已過期 !');
						}
					} else {
						window.location = baseurl + 'news/showNewsList';
					}
				}
			},
			error:function(){	
				alert('error');			
			}
		});
	});
	//在欄位按enter鍵執行button
	$('#txt_loginPassword').keypress(function (e) {
		if (e.which == 13) {
			$("#btn_login").click();
			return false;
		}
	});

	$("#btn_changePassword").bind("click",function(){
		if(!$('form')[0].checkValidity()) return;
		if($("#txt_newPassword").val() != $("#txt_confirmNewPassword").val()){
			alert('兩次密碼不符!!');
			return;
		}
		$.ajax({
			type:'post',
			url: baseurl + 'account/doChangePassword',
			data:$('#form1').serialize(),
			statusCode:{
				200:function(data){
					alert('密碼已變更完成!!'); 
					window.location = baseurl + 'news/showNewsList';
				}
			},
			error:function(){	
				alert('error');			
			}
		});
	});

	$("#btn_saveMail").bind("click",function(){
		if(!$('form')[0].checkValidity()) return;
		$.ajax({
			type:'post',
			url: baseurl + 'account/doCreateMail',
			data:$('#form1').serialize(),
			statusCode:{
				200:function(data){
					alert('已修改完成!!'); 
				}
			},
			error:function(){	
				alert('error');			
			}
		});
	});

	$("#btn_createCompany").bind("click",function(){
		window.location = baseurl + 'account/detailCompany';
	});


	$("#btn_saveCompany").bind("click",function(){
		if(!$('form')[0].checkValidity()) return;
		$.ajax({
			type:'post',
			url: baseurl + 'account/doDetailCompany',
			data:$('#form1').serialize(),
			statusCode:{
				200:function(data){
					alert('操作成功!!'); 
					window.location = baseurl + 'account/listCompany';
				}
			},
			error:function(){	
				alert('error');			
			}
		});
	});

	$("#btn_cancelCompany").bind("click",function(){
		window.location = baseurl + 'account/listCompany';
	});	


	$("#btn_createType").bind("click",function(){
		window.location = baseurl + 'account/detailType';
	});


	$("#btn_saveType").bind("click",function(){
		if(!$('form')[0].checkValidity()) return;
		$.ajax({
			type:'post',
			url: baseurl + 'account/doDetailType',
			data:$('#form1').serialize(),
			statusCode:{
				200:function(data){
					alert('操作成功!!'); 
					window.location = baseurl + 'account/listType';
				}
			},
			error:function(){	
				alert('error');			
			}
		});
	});

	$("#btn_cancelType").bind("click",function(){
		window.location = baseurl + 'account/listType';
	});		

	$(".gohome").bind("click",function(){
		window.location = baseurl + 'news/showNewsList';
	});


	$("#btn_createservice").bind("click",function(){
		window.location = baseurl + 'account/detailService';
	});


	$("#btn_saveService").bind("click",function(){
		if(!$('form')[0].checkValidity()) return;
		$.ajax({
			type:'post',
			url: baseurl + 'account/doDetailService',
			data:$('#form1').serialize(),
			statusCode:{
				200:function(data){
					alert('操作成功!!'); 
					window.location = baseurl + 'account/listService';
				}
			},
			error:function(){	
				alert('error');			
			}
		});
	});

	$("#btn_cancelService").bind("click",function(){
		window.location = baseurl + 'account/listService';
	});	
});