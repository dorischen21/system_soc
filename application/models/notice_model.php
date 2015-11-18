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

class Notice_model extends CI_Model {
	public function __construct() {
		$this->load->database();
		$this->load->model('log_model');
	}

	public function createNotice() {
		//事件單號		資安-G01-預警-yymmddxxx   19碼
		$serialNumber = '';
		$dbNumber = '';
		$number = '';

		$ary = array(
			'id' => $this->input->post('txt_company')
		);
		$query = $this->db->get_where('company',$ary);
		foreach ($query->result() as $row) {
			$dbCode = $row->code;  //G
			$dbId = str_pad($row->id,2,'0',STR_PAD_LEFT);  //01
		}
		//取流水號
		$dbNumber = 'DS-' . $dbCode . $dbId . '-WA-' . date("ymd");
		$this->db->select('number');
		$this->db->like('number', $dbNumber);
		$this->db->order_by("number", "desc");
		$query = $this->db->get('notice','1');
		$row = $query->row(); 
		$count = $query->num_rows();
		if($query->num_rows() > 0) {
			$serialNumber = str_pad(((int)(substr($row->number, -3)) + 1),3,'0',STR_PAD_LEFT);
		} else {
			$serialNumber = '001';
		}
		$number = $dbNumber . $serialNumber;

		// insert notice
		$ary_createNotice = array(
			'company_id'	=> $this->input->post('txt_company'),
			'projectname'	=> $this->input->post('txt_projectName'),
			'type'			=> $this->input->post('txt_noticeType'),
			'name'			=> $this->input->post('txt_noticeName'),
			'create_date'	=> $this->input->post('txt_date'),
			'src_ip'		=> $this->input->post('txt_srcIp'),
			'src_ip2'		=> $this->input->post('txt_srcIp2'),
			'src_port'		=> $this->input->post('txt_srcPort'),
			'dst_ip'		=> $this->input->post('txt_dstIp'),
			'dst_port'		=> $this->input->post('txt_dstPort'),
			'level'			=> $this->input->post('txt_level'),
			'count'			=> $this->input->post('txt_count'),
			'description'	=> $this->input->post('txt_description'),
			'advise'		=> $this->input->post('txt_advise'),
			'note'			=> $this->input->post('txt_note'),
			'm_service_id'	=> $this->input->post('txt_MService'),
			'email'			=> $this->input->post('txt_email'),
			'number'		=> $number,
			'customer_id'	=> $this->input->post('txt_customerId'),
			'bccs'			=> $this->input->post('txt_bccs'),
			'subject'		=> $this->input->post('txt_subject'),
			'end_date'		=> $this->input->post('txt_endDate')
		);
		$this->db->set($ary_createNotice);
		$this->db->insert('notice');

		$this->log_model->writeLog('c');
		echo '1';
	}

	public function editNotice($id) {
		$this->load->model('company_model');
		$this->db->select('id, company_id, type, name, create_date, src_ip, src_ip2, src_port, dst_ip, dst_port, level, count, description, advise, note, m_service_id, number, email, projectname, customer_id, bccs, subject, end_date');
		$this->db->where('id', $id); 
		$query = $this->db->get('notice');
		$ary = array();

		$mapping_com = $this->company_model->getCompany();
		foreach ($query->result() as $row) {
			$ary[$row->id]['companyname']	= $mapping_com[$row->company_id];
			$ary[$row->id]['company_id']	= $row->company_id;
			$ary[$row->id]['number']		= $row->number;
			$ary[$row->id]['type']			= $row->type;
			$ary[$row->id]['name']			= $row->name;
			$ary[$row->id]['create_date']	= $row->create_date;
			$ary[$row->id]['src_ip']		= $row->src_ip;
			$ary[$row->id]['src_ip2']		= $row->src_ip2;
			$ary[$row->id]['src_port']		= $row->src_port;
			$ary[$row->id]['dst_ip']		= $row->dst_ip;
			$ary[$row->id]['dst_port']		= $row->dst_port;
			$ary[$row->id]['level']			= $row->level;
			$ary[$row->id]['count']			= $row->count;
			$ary[$row->id]['description']	= $row->description;
			$ary[$row->id]['advise']		= $row->advise;
			$ary[$row->id]['note']			= $row->note;
			$ary[$row->id]['m_service_id']	= $row->m_service_id;
			$ary[$row->id]['email']			= $row->email;
			$ary[$row->id]['projectname']	= $row->projectname;
			$ary[$row->id]['customer_id']	= $row->customer_id;
			$ary[$row->id]['bccs']			= $mapping_com[$row->bccs];
			$ary[$row->id]['subject']		= $row->subject;
			$ary[$row->id]['end_date']		= $row->end_date;
		}
		return $ary;
	}

	public function updateNotice($id) {
		if($this->session->userdata('role') == ROLE_ADMIN){
			$ary_updateNotice = array(
				'projectname'	=> $this->input->post('txt_projectName'),
				'type'			=> $this->input->post('txt_noticeType'),
				'name'			=> $this->input->post('txt_noticeName'),
				'create_date'	=> $this->input->post('txt_date'),
				'src_ip'		=> $this->input->post('txt_srcIp'),
				'src_ip2'		=> $this->input->post('txt_srcIp2'),
				'src_port'		=> $this->input->post('txt_srcPort'),
				'dst_ip'		=> $this->input->post('txt_dstIp'),
				'dst_port'		=> $this->input->post('txt_dstPort'),
				'level'			=> $this->input->post('txt_level'),
				'count'			=> $this->input->post('txt_count'),
				'description'	=> $this->input->post('txt_description'),
				'advise'		=> $this->input->post('txt_advise'),
				'note'			=> $this->input->post('txt_note'),
				'm_service_id'	=> $this->input->post('txt_MService'),
				'email'			=> $this->input->post('txt_email'),
				'subject'		=> $this->input->post('txt_subject'),
				'end_date'		=> $this->input->post('txt_endDate')
			);
		} else {
			$ary_updateNotice = array(
				'description' => $this->input->post('txt_description'),
				'advise' => $this->input->post('txt_advise'),
				'note' => $this->input->post('txt_note')
			);
		}
		$this->db->where('id', $id);
		$this->db->update('notice', $ary_updateNotice);

		$this->log_model->writeLog('u');
		echo '1';
	}
}