<?php
/*
* File:			d_model.php
* Version:		-
* Last changed:	2015/08/20
* Purpose:		-
* Author:		Doris Chen
* Copyright:	(C) 2015
* Product:		SOC
*/
class D_model extends CI_Model {
	public function __construct() {
		$this->load->database();
		$this->load->model('log_model');
	}

	public function createD($type) {
		// insert d
		$this->db->set('name', $this->input->post('txt_documentTitle'));
		$this->db->set('company_id', $this->input->post('txt_company'));
		$this->db->set('create_date', 'now()', FALSE);
		$this->db->set('type_id',  $type);
		$this->db->insert('d');	

		// get new id
		$new_id = $this->db->insert_id();

		// insert attachment
		$ary_create = array(
			'd_id' => $new_id,
			'path' => $this->input->post('hid_filePath1'),
			'size' => $this->input->post('hid_fileSize1'),
		);
		$this->db->set($ary_create);
		$this->db->insert('attachment');	
		if($this->input->post('hid_filePath2') != '') {
			$ary_create1 = array(
				'd_id' => $new_id,
				'path' => $this->input->post('hid_filePath2'),
				'size' => $this->input->post('hid_fileSize2'),
			);
			$this->db->set($ary_create1);
			$this->db->insert('attachment');	
		}
		// insert d_detail
		$ary_create = array(
			'd_id' => $new_id,
			'text' => $this->input->post('hid_content'),
		);
		$this->db->set($ary_create);
		$this->db->insert('d_detail');

		$this->log_model->writeLog('c');
		echo '1';
	}
}