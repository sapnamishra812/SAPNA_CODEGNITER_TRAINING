<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpassword extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		
	}
	
	public function forgot()
	{
		$this->load->view('forgotPassword');
	}
	
}
