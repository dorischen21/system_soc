<?php
/*
* File:			user_model.php
* Version:		-
* Last changed:	2015/11/06
* Purpose:		-
* Author:		Doris Chen
* Copyright:	(C) 2015
* Product:		SOC
*/

class User_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getCompanyIdByUser($account) {
		$this->db->select('company_id');
		$this->db->where('account', $account); 
		$query = $this->db->get('user');
		if ($query->num_rows() > 0) {
			$row = $query->row(); 
			return $row->company_id;
		} else {
			return 0;
		}
	}	
}