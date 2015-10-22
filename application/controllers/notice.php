<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notice extends CI_Controller {

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

		$this->headerType = $this->type_model->getTypeByCompany($this->session->userdata('company_id'));				
	}

	public function getMServiceName() {
		$this->db->select('id, name');
		$query = $this->db->get('m_service');
		$ary = array();
		foreach ($query->result() as $row) {
			$ary[$row->id] = $row->name;
		}
		return $ary;
	}		

	public function getlevel() {
		$ary_level = array(
			'1' => '紅色 / 緊急(Urgent) 應立即處理',
			'2' => '橘色 / 高度(High) 儘速處理',
			'3' => '黃色 / 中度(Medium) 建議處理',
			'4' => '綠色 / 低(Low) 建議處理'
		);
		return $ary_level;
	}		

	public function noticeList() {
		$this->load->helper('url');
		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		
		$data['account'] = $this->session->userdata('account');
		$data['role'] = $this->session->userdata('role');
		$data['company_id'] = $this->session->userdata('company_id');
		$data['headerType'] = $this->headerType;
		$data['title'] = '資安警訊通報';

		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('notice/noticeList');
		$this->load->view('template/footer');
	}

	public function apiGetDocs() {
		$this->db->select('notice.id, company_id, projectname, name, create_date, number, company.tw as tw');
		$this->db->join('company', 'notice.company_id=company.id');
		//user才判斷公司別
		if($this->session->userdata('role') == ROLE_USER) {
			$this->db->where('company_id',$this->session->userdata('company_id'));
		}
		$query = $this->db->get('notice');
		$ary_ret = $query->result_array();

		echo json_encode($ary_ret);
	}

	public function noticeRemove($id) {
		$this->db->delete('notice', array('id' => $id));
		$this->load->helper('url');
		redirect('notice/noList', 'refresh');
	}	

	public function showNoticeCreate() {
		$this->load->helper('url');
		$this->load->model('company_model');		
		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		if($this->session->userdata('role') != ROLE_ADMIN) return;

		$data['account'] = $this->session->userdata('account');
		$data['headerType'] = $this->headerType;
		$data['mservice'] = $this->getMServiceName();
		$data['level'] = $this->getlevel();
		$data['comp'] = $this->company_model->getCompany();
		$data['title'] = '資安警訊通報';

		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('notice/showNoticeCreate');
		$this->load->view('template/footer');	
	}	

	public function doCreateNotice() {
		$this->load->model('notice_model');
		$this->notice_model->createNotice();
		if($this->session->userdata('role') == ROLE_ADMIN) { //admin
			$this->sendService();	
		}
	}	

	public function sendService() {
		$this->load->model('company_model');		
		// MServiceEmail
		$query = $this->db->get_where('m_service', array('id' => $this->input->post('txt_MService')));
		$row = $query->row(); 
		$MServiceEmail = $row->email;
		//取事件單號
		$this->db->select_max('number');
		$query = $this->db->get('notice');
		$row = $query->row(); 		
		$number = $row->number;		

		$this->load->library('email');

		$title = 'SOC監控服務 - ' . $this->company_model->getCompanyTw($this->input->post('txt_company'));
		$msg = '事件單號：' . $number . "\n"
				. '專案名稱：' . $this->input->post('txt_projectName') . "\n"
				. '事件名稱：' . $this->input->post('txt_noticeName');

		$this->email->from('socadmin@bccs.com.tw', 'Soc 監控中心 - 管理者');
		$this->email->to($MServiceEmail); 
		$this->email->subject($title);
		$this->email->message($msg); 
		$this->email->send();
	}	

	public function showNoticeEdit($id, $isEditable) {
		if(strval($isEditable) =='1' && $this->session->userdata('role') == ROLE_USER) return;

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('notice_model');				

		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		$data['account'] = $this->session->userdata('account');
		$data['headerType'] = $this->headerType;
		$data['title'] = '資安警訊通報';
		$data['mservice'] = $this->getMServiceName();
		$data['level'] = $this->getlevel();
		$data['isEditable'] = $isEditable;

		$data['ary_editnotice'] = $this->notice_model->editNotice($id);
		$data['notice_id'] = $id;

		$this->load->view('template/header', $data);
		$this->load->view('notice/showNoticeEdit', $data);
		$this->load->view('template/footer');
	}	

	public function updateNotice($id) {
		$this->load->model('notice_model');
		$this->notice_model->updateNotice($id);
		if($this->session->userdata('role') == ROLE_SERVICE) { //service
			$this->sendUser();	
		}	
	}	

	public function sendUser() { 
		$this->load->library('email');

		$title = $this->input->post('txt_noticeType') . ' - ' . $this->input->post('txt_projectName');
		$msg = '發現時間：' . $this->input->post('txt_date') . "\n" . '事件描述：' . "\n" . $this->input->post('txt_advise') . "\n" . "詳細內容請至ＳＯＣ網站下載，謝謝！";

		$this->email->from('soc@bccs.com.tw', 'SOC 監控中心');
		$this->email->to($this->input->post('txt_email')); 
		$this->email->subject($title);
		$this->email->message($msg); 
		$this->email->send();
	}

}

/* End of file notice.php */
/* Location: ./application/controllers/notice.php */