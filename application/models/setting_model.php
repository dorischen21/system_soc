<?php
/*
* File:			setting_model.php
* Version:		-
* Last changed:	2015/10/01
* Purpose:		-
* Author:		Doris Chen
* Copyright:	(C) 2015
* Product:		SOC
*/

class Setting_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function setMail() {
		$this->db->select('id, mail');
		$query = $this->db->get('mail');
		if ($query->num_rows() > 0) {
			$this->db->set('mail', $this->input->post('txt_mail')); 
			$this->db->where('id', '1');
			$this->db->update('mail'); 
		} else {
			$data = array(
				'id' => '1',
				'mail' => $this->input->post('mail')
			);
			$this->db->insert('mail', $data); 
		}
	}

	public function getMail() {
		$this->db->select('id, mail');
		$query = $this->db->get('mail');
		$ary = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
			    $ary[$row->id] = $row->mail;
			}
			return $ary[1];
		} else {
			return '';
		}
	}

}