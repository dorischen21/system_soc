<?php
/*
* File:			news_model.php
* Version:		-
* Last changed:	2015/08/20
* Purpose:		-
* Author:		Doris Chen
* Copyright:	(C) 2015
* Product:		SOC
*/

class News_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getNews() {
		$this->load->model('type_model');
		$this->load->helper('text');

		$where = '';
		$str = '';

		if($this->session->userdata('role') == ROLE_USER) {
			$where = ' and d.company_id=' . $this->session->userdata('company_id');
		}

		$ary_type = $this->type_model->getTypeByCompanyNews($this->session->userdata('company_id'));

		foreach($ary_type as $key => $val) {
			if(strval($val['is_global']) == '1') {		// query is_global=1
				$str .= (strlen($str) == 0 ? '' : ' union')
						.'(SELECT type.id, type.tw, d.id as did, d.name, d.create_date, d_detail.text, type.is_global 
						FROM type 
						left join d ON type.id = d.type_id 
						left join d_detail ON d_detail.d_id = d.id 
						WHERE type.id = '. $key
						.' ORDER BY d.id DESC LIMIT 1) ';				
			} else {	// query is_global=0
				$str .= (strlen($str) == 0 ? '' : ' union')
						.'(SELECT type.id, type.tw, d.id as did, d.name, d.create_date, d_detail.text, type.is_global
						FROM type 
						left join d ON type.id = d.type_id '. $where 
						.' left join d_detail ON d_detail.d_id = d.id 
						WHERE type.id = '. $key
						.' ORDER BY d.id DESC LIMIT 1) ';				
			}
		}
		$query = $this->db->query($str);

		foreach ($query->result() as $row) {
			if(mb_strlen($row->name, "utf-8") > '16') {   //判斷字串字數
				$ary_news[$row->id]['name'] = ($row->name == '' ? '無最新資訊' : mb_substr($row->name,0,17,"utf-8") . '...');
			} else {
				$ary_news[$row->id]['name'] = ($row->name == '' ? '無最新資訊' : $row->name);
			}
			$ary_news[$row->id]['tw'] = $row->tw ;
			$ary_news[$row->id]['isGlobal'] = $row->is_global ;
			$ary_news[$row->id]['createDate'] = substr($row->create_date,0,10);
			$ary_news[$row->id]['did'] = $row->did ;
		}
		return $ary_news;
	}
}