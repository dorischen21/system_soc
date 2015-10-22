		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/dList.js'></script>

		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
		<input type='hidden' id='hid_type' value='<?= $type ?>'>		
		<input type='hidden' id='hid_role' value='<?= $role ?>'>
		<input type='hidden' id='ROLE_ADMIN' value='<?= ROLE_ADMIN ?>'>
		<input type='hidden' id='ROLE_SERVICE' value='<?= ROLE_SERVICE ?>'>
		<input type='hidden' id='ROLE_USER' value='<?= ROLE_USER ?>'>

		<div class='container'>
			<div class="row">
				<h1><?= $title ?></h1>
				<h1></h1>
<?php if ($this->session->userdata('role') == ROLE_ADMIN): ?>
				<button type="button" class='btn btn-primary' name="btn_createFile" id="btn_createFile">Create</button>
<?php endif; ?>
				<h1></h1>
				<table id='tblmain'>
				</table>
			</div>
		</div>

<script src='<?= base_url()?>assets/js/bootstrap-table.min.js'></script>
<script type="text/javascript">
$(function () {
	$("#btn_createFile").bind("click",function(){
		window.location = '<?= base_url()?>d/showDDetailCreate/<?= $type ?>';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>d/apiGetDocs/<?= $type ?>',
		sortName:"id",
		sortOrder:"desc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination:"true",
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
			field:'id' ,
			title:'序號',
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"5%",
			class:"text-nowrap"
		},{
			field:'name' ,
			title: '文件標題',
			halign:"center" ,
			align:"left" ,
			width:"20%",
			class:"text-nowrap"
		},{
			field:'create_date' ,
			title: '建立時間',
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"5%",
			class:"text-nowrap"
		},{
			field:'size' ,
			title: '檔案大小',
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"5%",
			class:"text-nowrap"
		},{
			field:'company_id' ,
			title: '公司',
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'' ,
			title: '操作',
			halign:"center" ,
			align:"center",
			events: operateEvents,
			formatter: operateFormatter,
			width:"10%",
			class:"text-nowrap"
		}]
	});
})
</script>
