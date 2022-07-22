<?php
defined('BASEPATH') OR exit('No direct script  access allowed');
 
class Error500 extends CI_Controller{

	public function error_500(){
		$this->load->view('error500');
	}
}
