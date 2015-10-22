<?php
/*
* File:			log_model.php
* Version:		-
* Last changed:	2015/10/06
* Purpose:		-
* Author:		Doris Chen
* Copyright:	(C) 2015
* Product:		SOC
*/

class Log_model extends CI_Model {
	public function __construct() {
	}

	public function writeLog($type) {
		$this->load->helper('url');

		$str_filePath = 'log/';
		$str_fileName = 'log_'.date('Ym').'.log';

		$file = fopen($str_filePath.$str_fileName, 'a');
		if ($type == 'l'){
			$this->load->library('session');

			$str = date('Y-m-d H:i:s') 
					. ' ' . $this->session->userdata('account') 
					. ' ' . $this->session->userdata('ip_address')
					. ' ' . $type . "\n";
		} else {
			$str = date('Y-m-d H:i:s') 
					. ' ' . $this->session->userdata('account')
					. ' ' . uri_string()
					. ' ' . $type . "\n";
		}
		fwrite($file,$str);
		fclose($file);
	}
}