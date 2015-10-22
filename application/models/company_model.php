<?php
/*
* File:			company_model.php
* Version:		-
* Last changed:	2015/08/20
* Purpose:		-
* Author:		Doris Chen
* Copyright:	(C) 2015
* Product:		SOC
*/

class Company_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getCompany() {
		$this->db->select('id, tw');
		$query = $this->db->get('company');
		$ary = array();
		foreach ($query->result() as $row) {
			$ary[$row->id] = $row->tw;
		}
		return $ary;
	}

	public function getCompanyAll() {
		$this->db->select('id, tw, code, mail');
		$query = $this->db->get('company');
		$ary_getCompanyAll = array();
		foreach ($query->result() as $row) {
			$ary_getCompanyAll[$row->id]['tw']= $row->tw;
			$ary_getCompanyAll[$row->id]['code']= $row->code;
			$ary_getCompanyAll[$row->id]['mail']= $row->mail;
		}
		return $ary_getCompanyAll;
	}

	public function getCompanyTw($id) {
		$this->db->select('tw');
		$this->db->where('id', $id);
		$query = $this->db->get('company');

		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->tw;
		}

		return '';
	}

	public function getCompanyMail($id) {
		$this->db->select('mail');
		$this->db->where('id', $id);
		$query = $this->db->get('company');

		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->mail;
		}

		return '';
	}

}