$(function(){
	// run at page load
	var baseurl = $('#baseUrl').val();

	$("#btn_createUser").bind("click",function(){
		window.location = baseurl + 'account/detailUser';
	});	
	
});