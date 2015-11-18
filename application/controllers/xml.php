<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class xml extends CI_Controller {

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
		$this->load->model('notice_model');
		$this->load->model('company_model');
	}

	public function downloadXml($id) {
		$this->load->helper('download');

		$ary_notice = $this->notice_model->editNotice($id);
		$docxml = new DOMDocument("1.0","UTF-8");
		$docxml->formatOutput=true;
		$rootnode = $docxml->createElement("event");
		$rootnode = $docxml->appendChild($rootnode);
		//發送單位
		$childnode = $docxml->createElement("Organization");
		$childnode = $rootnode->appendChild($childnode); 
		$bccs = $this->company_model->getCompanyTw($ary_notice[$id]['bccs']);
		$childnode->appendChild($docxml->createTextNode($bccs));
		//事件單號
		$childnode = $docxml->createElement("Event_ID");
		$childnode = $rootnode->appendChild($childnode); 
		$childnode->appendChild($docxml->createTextNode($ary_notice[$id]['number']));
		//機關名稱
		$childnode = $docxml->createElement("Customer_Name");
		$childnode = $rootnode->appendChild($childnode); 
		$company = $this->company_model->getCompanyTw($ary_notice[$id]['company_id']);
		$childnode->appendChild($docxml->createTextNode($company));
		//機關代碼
		$childnode = $docxml->createElement("Customer_ID");
		$childnode = $rootnode->appendChild($childnode); 
		$childnode->appendChild($docxml->createTextNode($ary_notice[$id]['customer_id']));
		//事件單主旨
		$childnode = $docxml->createElement("Subject");
		$childnode = $rootnode->appendChild($childnode); 
		$childnode->appendChild($docxml->createTextNode($ary_notice[$id]['subject']));
		//事件名稱
		$childnode = $docxml->createElement("Event_Name");
		$childnode = $rootnode->appendChild($childnode); 
		$childnode->appendChild($docxml->createTextNode($ary_notice[$id]['name']));
		//事件發生時間
		$childnode = $docxml->createElement("Start_Time");
		$childnode = $rootnode->appendChild($childnode); 
		$childnode->appendChild($docxml->createTextNode($ary_notice[$id]['create_date']));
		//事件結束時間
		$childnode = $docxml->createElement("End_Time");
		$childnode = $rootnode->appendChild($childnode); 
		$childnode->appendChild($docxml->createTextNode($ary_notice[$id]['end_date']));
		//來源IP
		$childnode = $docxml->createElement("Source_Address");
		$childnode = $rootnode->appendChild($childnode); 
		$childnode->appendChild($docxml->createTextNode($ary_notice[$id]['src_ip']));
		//目標IP
		$childnode = $docxml->createElement("Target_Address");
		$childnode = $rootnode->appendChild($childnode); 
		$childnode->appendChild($docxml->createTextNode($ary_notice[$id]['dst_ip']));
		//來源PORT
		$childnode = $docxml->createElement("Source_Port");
		$childnode = $rootnode->appendChild($childnode); 
		$childnode->appendChild($docxml->createTextNode($ary_notice[$id]['src_port']));
		//目標PORT
		$childnode = $docxml->createElement("Target_Port");
		$childnode = $rootnode->appendChild($childnode); 
		$childnode->appendChild($docxml->createTextNode($ary_notice[$id]['dst_port']));
		//事件描述		
		$childnode = $docxml->createElement("Events_Description");
		$childnode = $rootnode->appendChild($childnode); 
		$childnode->appendChild($docxml->createTextNode($ary_notice[$id]['description']));
		//處理說明
		$childnode = $docxml->createElement("Event_Message");
		$childnode = $rootnode->appendChild($childnode); 
		$childnode->appendChild($docxml->createTextNode($ary_notice[$id]['advise']));
		//影響等級
		$childnode = $docxml->createElement("Event_Severity");
		$childnode = $rootnode->appendChild($childnode); 
		$childnode->appendChild($docxml->createTextNode($ary_notice[$id]['level']));
		//關聯事件數
		$childnode = $docxml->createElement("Aggregated_Count");
		$childnode = $rootnode->appendChild($childnode); 
		$childnode->appendChild($docxml->createTextNode($ary_notice[$id]['count']));
		
		$data = $docxml->saveXML();

		force_download($ary_notice[$id]['number'].'.xml', $data);
	}		

}

/* End of file xml.php */
/* Location: ./application/controllers/xml.php */