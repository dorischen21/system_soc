function operateFormatter(value, row, index) {
	if($('#hid_role').val() == $('#ROLE_ADMIN').val()) {
		return [
			'<a class="mview ml10" href="javascript:void(0)" title="View">',
				'<i class="glyphicon glyphicon-list-alt"></i>',
			'</a>','　',
			'<a class="mdownload ml10" href="javascript:void(0)" title="Download">',
				'<i class="glyphicon glyphicon-download"></i>',
			'</a>','　',
			'<a class="medit ml10" href="javascript:void(0)" title="Edit">',
				'<i class="glyphicon glyphicon-edit"></i>',
			'</a>','　',
			'<a class="mremove ml10" href="javascript:void(0)" title="Remove">',
				'<i class="glyphicon glyphicon-trash"></i>',
			'</a>'
		].join('');
	} else {
		return [
			'<a class="mview ml10" href="javascript:void(0)" title="View">',
				'<i class="glyphicon glyphicon-list-alt"></i>',
			'</a>','　',
			'<a class="mdownload ml10" href="javascript:void(0)" title="Download">',
				'<i class="glyphicon glyphicon-download"></i>',
			'</a>','　'
		].join('');   	
	}
}

window.operateEvents = {
	'click .mview': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'd/showDDetailEdit/' + row.id + '/' + $('#hid_type').val() + '/0' ;
	},
	'click .mdownload': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'd/downloadD/' + row.id;
	},
	'click .medit': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'd/showDDetailEdit/' + row.id + '/' + $('#hid_type').val() + '/1' ;
	},
	'click .mremove': function (e, value, row, index) {
		$.ajax({
			type: "POST",
			url: $('#baseUrl').val() + 'd/dRemove/' + row.id,
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
