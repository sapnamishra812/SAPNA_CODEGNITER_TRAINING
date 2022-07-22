<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('Login_model');
	}
	// public function register_form()
	// {
	// 	$this->load->view('register/register');
	// }
    
	
}
