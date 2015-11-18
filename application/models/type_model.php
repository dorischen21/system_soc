<?php
/*
* File:			type_model.php
* Version:		-
* Last changed:	2015/08/26
* Purpose:		-
* Author:		Doris Chen
* Copyright:	(C) 2015
* Product:		SOC
*/

class Type_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getTypeByCompany($company_id) {
		$this->db->select('company_id, type_id, type.tw, type.is_global');
		$this->db->join('type', 'type_id=id');
		$this->db->where('company_id', $company_id);
		$query = $this->db->get('company_type');
		$ary = array();
		foreach ($query->result() as $row) {
			$ary[$row->is_global][$row->type_id]['type']	= $row->type_id;
			$ary[$row->is_global][$row->type_id]['tw']		= $row->tw;
		}
		return $ary;
	}

	public function getTypeByCompanyNews($company_id) {
		$this->db->select('company_id, type_id, type.tw, type.is_global');
		$this->db->join('type', 'type_id=id');
		$this->db->where('company_id', $company_id);
		$query = $this->db->get('company_type');
		$ary = array();
		foreach ($query->result() as $row) {
			$ary[$row->type_id]['tw']			= $row->tw;
			$ary[$row->type_id]['is_global']	= $row->is_global;
		}
		return $ary;
	}

	public function getType() {
		$this->db->select('id, tw, is_global');
		$query = $this->db->get('type');
		$ary = array();
		foreach ($query->result() as $row) {
			$ary[$row->id]['tw'] = $row->tw;
			$ary[$row->id]['is_global'] = $row->is_global;
		}
		return $ary;
	}

	public function getTypeTw($id) {
		$this->db->select('id, tw, is_global');
		$this->db->where('id', $id);
		$query = $this->db->get('type');
		$ary = array();
		foreach ($query->result() as $row) {
			$ary[$row->id]['tw'] = $row->tw;
			$ary[$row->id]['is_global'] = $row->is_global;
		}
		return $ary;
	}

	public function getTypeToCompany() {
		$this->db->select('id, tw');
		$query = $this->db->get('type');
		$ary = array();
		foreach ($query->result() as $row) {
			$ary[$row->id] = $row->tw;
		}
		return $ary;
	}

	public function createCompanyType($companyid,$type) {
		//delete old data
		$this->db->where('company_id', $companyid);
		$this->db->delete('company_type');
		// insert company_type
		foreach ($type as $key) {
			$this->db->set('company_id', $companyid);
			$this->db->set('type_id', $key);
			$this->db->insert('company_type');
		}
	}

	public function conf_getTypeByCompany($company_id) {
		$this->db->select('company_id, type_id');
		$this->db->where('company_id', $company_id);
		$query = $this->db->get('company_type');
		$ary = array();
		foreach ($query->result() as $row) {
			$ary[] = $row->type_id;
		}
		return $ary;
	}
}
?>