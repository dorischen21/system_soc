<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('company_model');		
		$this->load->model('type_model');
		$this->load->model('log_model');

		$this->headerType = $this->type_model->getTypeByCompany($this->session->userdata('company_id'));
	}

	private function getRole() {
		$user_role = '';
		$this->db->select('role');
		$ary_where = array('company_id' => $this->input->post('txt_loginCompany'), 'account' => $this->input->post('txt_loginAccount'));
		$this->db->where($ary_where); 		
		$query = $this->db->get('user');		
		if ($query->num_rows() > 0)
		{
			$row = $query->row(); 
			$user_role = $row->role;
		}
		return $user_role;
	}

	public function doLogout() {
		$this->load->helper('url');
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}
	
	public function index() {   //login
		$this->load->helper('form');
		$this->load->helper('url');
		$data['comp'] = $this->company_model->getCompany();
		$this->load->view('account/login',$data);
	}

	public function doLogin() {
		$is_expired = true;

		$ary = array(
			'company_id' => $this->input->post('txt_loginCompany'),
			'account' => $this->input->post('txt_loginAccount'),
			'password' => $this->input->post('txt_loginPassword')
		);
		$query = $this->db->get_where('user',$ary);
		$count = $query->num_rows();

		// check if is_expired
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$date_db = $row->date;
			}
			$dt_now = new DateTime("now");
			$dt_db = new DateTime($date_db.' 23:59:59');
			if($dt_now <= $dt_db) {
				$is_expired = false;
			}
		}

		if($count == 0 || $is_expired) {	// disallow login
			if($count == 0)	{
				echo '0';
			} else {
				echo '2';
			}
		} else {	// allow
			$newdata = array(
				'company_id'	=> $this->input->post('txt_loginCompany'),
				'company_name'	=> $this->company_model->getCompanyTw($this->input->post('txt_loginCompany')),
				'account'		=> $this->input->post('txt_loginAccount'),
				'role'			=> $this->getRole()
			);
			$this->session->set_userdata($newdata);

			$this->log_model->writeLog('l');	
			echo '1'; 
		}


	}

	public function changePassword() {
		$this->load->helper('url');
		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		$data['title'] = 'Change Password';
		$data['account'] = $this->session->userdata('account');
		$data['headerType'] = $this->headerType;

		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('account/changePassword');
		$this->load->view('template/footer');
	}

	public function doChangePassword() {
		$data = array(
			'password' => $this->input->post('txt_confirmNewPassword')
		);
		$ary_where = array('company_id' => $this->session->userdata('company_id'), 'account' => $this->session->userdata('account'));
		$this->db->where($ary_where);
		$this->db->update('user', $data);

		$this->log_model->writeLog('u');		
		echo '1';
	}

	public function listUser() {
		$this->load->helper('url');
		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		if($this->session->userdata('role') != ROLE_ADMIN) return;

		$data['title'] = '使用者管理';
		$data['account'] = $this->session->userdata('account');
		$data['headerType'] = $this->headerType;

		//user table
		$this->db->select('user.id, company_id, account, email, date, role, company.tw as tw');
		$this->db->join('company', 'user.company_id=company.id');
		$query = $this->db->get('user');
		$ary = array();
		foreach ($query->result() as $row) {
			$ary[$row->id]['company_id'] = $row->company_id;
			$ary[$row->id]['company']	 = $row->tw;
			$ary[$row->id]['account']	 = $row->account;
			$ary[$row->id]['email']		 = $row->email;
			$ary[$row->id]['date']		 = $row->date;
			$ary[$row->id]['role']		 = $this->roleId2Tw($row->role);
		}
		$data['userdata'] = $ary;

		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('account/listUser');
		$this->load->view('template/footer');
	}

	public function deleteUser($user_id) {
		$this->db->delete('user', array('id' => $user_id));
		$this->load->helper('url');
		redirect('account/listUser', 'refresh');

		$this->log_model->writeLog('d');
	}

	private function roleId2Tw($roleid) {
		switch ($roleid) {
			case ROLE_USER :
				$roletw = 'User';
				break;
			case ROLE_SERVICE :
				$roletw = 'Service';
				break;
			case ROLE_ADMIN :
				$roletw = 'Admin';
				break;
		}
		return $roletw;
	}

	public function detailUser() {
		$this->load->helper('url');
		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		if($this->session->userdata('role') != ROLE_ADMIN) return;

		$data['title'] = '使用者設定';
		$data['account'] = $this->session->userdata('account');
		$data['headerType'] = $this->headerType;
		$data['comp'] = $this->company_model->getCompany();

		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('account/detailUser', $data);
		$this->load->view('template/footer');
	}

	public function doDetailUser() {
		$ary = array(
			'company_id' => $this->input->post('company'),
			'account' => $this->input->post('account')
		);
		$this->db->from('user');
		$this->db->where($ary);
		$count = $this->db->count_all_results();
		if ($count == 0) {
			$ary_create = array(
			 	'company_id' => $this->input->post('txt_userCompany'),
			 	'account' => $this->input->post('txt_userAccount'),
			 	'password' => $this->input->post('txt_userPassword'),
				'email' => $this->input->post('txt_userEmail'),
			 	'date' => $this->input->post('txt_userdate'),
			 	'role' => $this->input->post('txt_role')
			);
			$this->db->set($ary_create);
			$this->db->insert('user');

			$this->log_model->writeLog('c');
		} else {
			//帳號重覆
			echo '0';
		}
	}

	public function createMail() {
		$this->load->helper('url');
		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		if($this->session->userdata('role') != ROLE_ADMIN) return;

		$data['title'] = '最新消息mail發送設定';
		$data['maildata'] =  $this->getMail();
		$data['account'] = $this->session->userdata('account');
		$data['headerType'] = $this->headerType;

		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('account/createMail', $data);
		$this->load->view('template/footer');
	}

	public function doCreateMail() {
		$this->load->model('setting_model');
		$this->setting_model->setMail();

		$this->log_model->writeLog('c');
		echo '1';
	}

	private function getMail() {
		$this->load->model('setting_model');
		return $this->setting_model->getMail();
	}

	public function listCompany() {
		$this->load->helper('url');
		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		if($this->session->userdata('role') != ROLE_ADMIN) return;

		$data['title'] = '公司管理';
		$data['account'] = $this->session->userdata('account');
		$data['companydata'] = $this->company_model->getCompanyAll();
		$data['headerType'] = $this->headerType;

		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('account/listCompany');
		$this->load->view('template/footer');
	}

	public function detailCompany($company_id = 0) {	//沒有傳資料時用　=0 表示
		$this->load->helper('url');
		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		if($this->session->userdata('role') != ROLE_ADMIN) return;

		$data['title'] = '公司名稱設定';
		$data['account'] = $this->session->userdata('account');
		$data['headerType'] = $this->headerType;
		$data['companyCode'] = $this->getcode();

		$ary_companyData = array();

		if($company_id == 0) {
			//create
		} else {
			//edit
			$ary_companyData =  $this->company_model->getCompanyAll();
		}
		$data['companyData'] = $ary_companyData;
		$data['companyid'] = $company_id;
		$data['type'] = $this->type_model->getTypeToCompany();
		$data['ary_checked'] = $this->type_model->conf_getTypeByCompany($company_id);
		
		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('account/detailCompany', $data);
		$this->load->view('template/footer');
	}

	public function getcode() {
		$ary_code = array(
			'G' => '政府',
			'E' => '企業'
		);
		return $ary_code;
	}	

	public function doDetailCompany() {
		if($this->input->post('company_id') == '0') {
			$this->db->set('tw', $this->input->post('txt_company')); 
			$this->db->set('code', $this->input->post('txt_code')); 
			$this->db->set('mail', $this->input->post('txt_companymail')); 
			$this->db->insert('company');
			// get new id
			$new_id = $this->db->insert_id();

			$this->type_model->createCompanyType($new_id,$this->input->post('type'));

			$this->log_model->writeLog('c');
		} else {
			$this->db->set('tw', $this->input->post('txt_company')); 
			$this->db->set('code', $this->input->post('txt_code')); 
			$this->db->set('mail', $this->input->post('txt_companymail')); 
			$this->db->where('id', $this->input->post('company_id'));
			$this->db->update('company'); 

			$this->type_model->createCompanyType($this->input->post('company_id'),$this->input->post('type'));

			$this->log_model->writeLog('u');
		}
		echo '1';
	}

	public function listType() {
		$this->load->helper('url');
		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		if($this->session->userdata('role') != ROLE_ADMIN) return;
		
		$data['title'] = 'Type管理';
		$data['account'] = $this->session->userdata('account');
		$data['typedata'] = $this->type_model->getType();
		$data['headerType'] = $this->headerType;

		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('account/listType');
		$this->load->view('template/footer');
	}

	public function detailType($typeID = 0) {	//沒有傳資料時用　=0 表示
		// init start
		$this->load->helper('url');
		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		if($this->session->userdata('role') != ROLE_ADMIN) return;		
		// init end

		$data['title'] = 'Type名稱設定';
		$data['account'] = $this->session->userdata('account');
		$data['headerType'] = $this->headerType;

		$ary_typeDate = array();

		if($typeID == 0) {
			//create
		} else {
			//edit
			$ary_typeDate = $this->type_model->getTypeTw($typeID);
		}
		
		$data['typeID'] = $typeID;
		$data['typeData'] = $ary_typeDate;

		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('account/detailType', $data);
		$this->load->view('template/footer');
	}

	public function doDetailType() {
		if($this->input->post('type_id') == '0') {
			$this->db->set('tw', $this->input->post('txt_tw')); 
			$this->db->set('is_global', $this->input->post('txt_isGlobal')); 
			$this->db->insert('type'); 

			$this->log_model->writeLog('c');
		} else {
			$this->db->set('tw', $this->input->post('txt_tw')); 
			$this->db->set('is_global', $this->input->post('txt_isGlobal')); 
			$this->db->where('id', $this->input->post('type_id'));
			$this->db->update('type'); 

			$this->log_model->writeLog('u');		
		}
		echo '1';
	}	

	public function listservice() {
		$this->load->helper('url');
		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		if($this->session->userdata('role') != ROLE_ADMIN) return;
		
		$data['title'] = '技服人員管理';
		$data['account'] = $this->session->userdata('account');
		$data['headerType'] = $this->headerType;

		//user table
		$this->db->select('id, name, email');
		$query = $this->db->get('m_service');
		$ary = array();
		foreach ($query->result() as $row) {
			$ary[$row->id]['id']	 = $row->id;
			$ary[$row->id]['name']	 = $row->name;
			$ary[$row->id]['email']	 = $row->email;
		}
		$data['servicedata'] = $ary;

		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('account/listservice');
		$this->load->view('template/footer');
	}

	public function deleteService($service_id) {
		$this->db->delete('m_service', array('id' => $service_id));

		$this->log_model->writeLog('d');

		$this->load->helper('url');
		redirect('account/listService', 'refresh');
	}
	
	public function detailService() {
		$this->load->helper('url');
		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		if($this->session->userdata('role') != ROLE_ADMIN) return;

		$data['title'] = '技服人員設定';
		$data['account'] = $this->session->userdata('account');
		$data['headerType'] = $this->headerType;

		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('account/detailservice', $data);
		$this->load->view('template/footer');
	}

	public function doDetailService() {
		$ary_create = array(
		 	'name' => $this->input->post('txt_servicename'),
			'email' => $this->input->post('txt_servicemail'),
		);
		$this->db->set($ary_create);
		$this->db->insert('m_service');

		$this->log_model->writeLog('c');
		echo '1';
	}

}

/* End of file account.php */
/* Location: ./application/controllers/account.php */