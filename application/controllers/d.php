<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class D extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/d
	 *	- or -  
	 * 		http://example.com/index.php/d/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/d/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('type_model');

		$this->mapping_type = $this->getDType();
		$this->headerType = $this->type_model->getTypeByCompany($this->session->userdata('company_id'));
	}

	private function getDType() {
		$this->db->select('id, tw');
		$query = $this->db->get('type');
		$ary = array();
		foreach ($query->result() as $row) {
			$ary[$row->id] = $row->tw;
		}
		return $ary;
	}	

	public function dList($type) {
		$this->load->helper('url');
		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}

		$data['account'] = $this->session->userdata('account');
		$data['role'] = $this->session->userdata('role');
		$data['type'] = $type;
		$data['title'] = $this->mapping_type[$type];
		$data['headerType'] = $this->headerType;

		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('d/dList');
		$this->load->view('template/footer');
	}

	public function apiGetDocs($type) {
		//取type is_global 
		$this->db->select('is_global');
		$this->db->where('id', $type); 		
		$query = $this->db->get('type');
		$row = $query->row(); 		
		$is_global = $row->is_global;

		$this->db->select('id, company_id, name, create_date, type_id,  (select sum(size) from attachment where id=d_id) as size');
		if(($is_global =='0') && ($this->session->userdata('role') == ROLE_USER)) {
			$ary_where = array('type_id' => $type, 'company_id' =>$this->session->userdata('company_id'));
		} else {
			$ary_where = array('type_id' => $type);
		}
		$this->db->where($ary_where); 
		$query = $this->db->get('d');
		$ary_ret = $query->result_array();

		echo json_encode($ary_ret);
	}

	public function dRemove($d_id) {
		$this->db->delete('d', array('id' => $d_id));
		$this->db->delete('attachment', array('d_id' => $d_id));
		$this->db->delete('d_detail', array('d_id' => $d_id));
		$this->load->helper('url');
		redirect('d/dList', 'refresh');
	}

	public function showDDetailCreate($type) {
		$this->load->helper('url');
		$this->load->model('company_model');

		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		if($this->session->userdata('role') != ROLE_ADMIN) return;
		
		$data['title'] = $this->mapping_type[$type];
		$data['type'] = $type;
		$data['account'] = $this->session->userdata('account');
		$data['comp'] = $this->company_model->getCompany();
		$data['headerType'] = $this->headerType;
		$data['typeDate'] = $this->type_model->getTypeTw($type);	

		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('d/showDDetailCreate', $data);
		$this->load->view('template/footer');
	}

	public function doCreateD($type) {
		$this->load->model('d_model');
		$this->d_model->createD($type);
		//send mail
		$this->doCreateD_sendMail($type);
	}	

	public function doCreateD_sendMail($type) { 
		$this->load->library('email');
		$this->load->model('setting_model');
		$this->load->model('company_model');

		// init mail setting
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		// init mail setting end

		$is_global = $this->type_model->getTypeTw($type);
		if(strval($is_global[$type]['is_global']) == '1') {
			$mail_list = explode("\n", $this->setting_model->getMail());
			$titlet = '資安威脅預警';
		} else {
			$mail_list = $this->company_model->getCompanyMail($this->input->post('txt_company'));
			$titlet = '交付報告書';
		}

		$title = $titlet . ' - ' . $is_global[$type]['tw'];
		$msg = '文件標題：' . $is_global[$type]['tw'] . "<br>" . '文件內容：' . $this->input->post('hid_content') . "<br><br>" . "詳細內容請至ＳＯＣ網站下載，謝謝！";

		$this->email->from('soc@bccs.com.tw', 'SOC 監控中心');
		$this->email->to($mail_list); 
		$this->email->subject($title);
		$this->email->message($msg); 
		$this->email->send();
	}

	public function showDDetailEdit($d_id, $type, $isEditable) {
		if(strval($isEditable) =='1' && $this->session->userdata('role') != ROLE_ADMIN) return;

		$this->load->helper('url');
		$this->load->model('company_model');

		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		$data['account'] = $this->session->userdata('account');
		$data['headerType'] = $this->headerType;
		$data['title'] = $this->mapping_type[$type];
		$data['isEditable'] = $isEditable;
		$data['type'] = $type;	
		$data['d_id'] = $d_id;	

		$this->db->select('company_id, name');
		$this->db->where('id', $d_id); 
		$query = $this->db->get('d');
		$row = $query->row(); 
		$ary_companytw = $this->company_model->getCompany();
		$data['companyname'] = $ary_companytw[$row->company_id];
		$data['filename'] = $row->name;

		$this->db->select('text');
		$this->db->where('d_id', $d_id); 
		$query = $this->db->get('d_detail');
		$row = $query->row(); 
		$data['filetext'] =  $row->text;

		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('d/showDDetailEdit', $data);
		$this->load->view('template/footer');
	}

	public function updateD($d_id, $type) {
		$this->load->model('log_model');
		
		$ary_edit = array(
			'text' => $this->input->post('hid_content'),
		);
		$this->db->where('d_id', $d_id);
		$this->db->update('d_detail', $ary_edit);

		$this->log_model->writeLog('u');		
		echo '1';
	}	

	public function downloadD($d_id) {
		$this->load->library('zip');
		$this->load->helper('url');
		$this->load->helper('download');

		$this->db->select('path');
		$this->db->where('d_id', $d_id); 
		$query = $this->db->get('attachment');

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$path = 'server/php/files/' . $row->path;

				$this->zip->read_file($path);
			}
			$this->zip->download('download.zip');
		} else  {
			die('no file');
		}

	}
}

/* End of file d.php */
/* Location: ./application/controllers/d.php */