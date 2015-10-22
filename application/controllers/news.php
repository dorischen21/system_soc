<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

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

	public function showNewsList() {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('news_model');
		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		$data['title'] = '最新消息';
		$data['account'] = $this->session->userdata('account');
		$data['headerType'] = $this->headerType;

		$data['company_id'] = $this->session->userdata('company_id');
		$data['ary_news'] = $this->news_model->getNews();

		$this->load->view('template/header', $data);
		$this->load->view('news/showNewsList');
		$this->load->view('template/footer');
	}

}

/* End of file news.php */
/* Location: ./application/controllers/news.php */