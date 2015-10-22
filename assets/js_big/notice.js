$(function(){
	// run at page load
	var baseurl = $('#baseUrl').val();
	var hid_notice_id = $('#hid_notice_id').val();

	$("#btn_saveEditNotice").bind("click",function(){
		if(!$('form')[0].checkValidity()) return;		
		$.ajax({
			type:'post',
			url: baseurl + 'notice/updateNotice/' + hid_notice_id,
			data:$('#form1').serialize(),
			statusCode:{
				200:function(data){
					alert('修改完成!!'); 
					window.location = baseurl + 'notice/noticeList';
				}
			},
			error:function(){	
				alert('error');			
			}
		});
	});

	$("#btn_cancelEditNotice").bind("click",function(){
		window.location = baseurl + 'notice/noticeList';
	});	

});	

function operateFormatter(value, row, index) {
	if($('#hid_role').val() == $('#ROLE_ADMIN').val()) {
		return [
			'<a class="mview ml10" href="javascript:void(0)" title="View">',
				'<i class="glyphicon glyphicon-list-alt"></i>',
			'</a>','　',
			'<a class="mdownload ml10" href="javascript:void(0)" title="Download Xml">',
				'<i class="glyphicon glyphicon-export"></i>',
			'</a>','　',
			'<a class="medit ml10" href="javascript:void(0)" title="Edit">',
				'<i class="glyphicon glyphicon-edit"></i>',
			'</a>','　',
			'<a class="mremove ml10" href="javascript:void(0)" title="Remove">',
				'<i class="glyphicon glyphicon-trash"></i>',
			'</a>'
		].join('');
	} else if($('#hid_role').val() == $('#ROLE_SERVICE').val()) {
		return [
			'<a class="mview ml10" href="javascript:void(0)" title="View">',
				'<i class="glyphicon glyphicon-list-alt"></i>',
			'</a>','　',
			'<a class="medit ml10" href="javascript:void(0)" title="Edit">',
				'<i class="glyphicon glyphicon-edit"></i>',
			'</a>','　',
		].join('');
	} else {
		return [
			'<a class="mview ml10" href="javascript:void(0)" title="View">',
				'<i class="glyphicon glyphicon-list-alt"></i>',
			'</a>','　',
		].join('');   	
	}
}

window.operateEvents = {
	'click .mview': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'notice/showNoticeEdit/' + row.id + '/0' ;
	},
	'click .mdownload': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'xml/downloadXml/' + row.id;
	},
	'click .medit': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'notice/showNoticeEdit/' + row.id + '/1' ;
	},
	'click .mremove': function (e, value, row, index) {
		$.ajax({
			type: "POST",
			url: $('#baseUrl').val() + 'notice/noticeRemove/' + row.id,
			data: { id: row.id },
			statusCode: {
				200: function() {
					alert("成功刪除");
					location.reload();
				}
			},
			error: function() {
				alert('刪除失敗');
			}
		});
	}
};
