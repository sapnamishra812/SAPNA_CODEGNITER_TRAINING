<?php 
defined('BASEPATH') OR exit('No direct script  access allowed');

class Dashboard extends CI_Controller{
	public function dashboard_form(){
		$this->load->view('dashboard');
	}
}
