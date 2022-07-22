<?php 
defined('BASEPATH') OR exit('No direct access is allowed');

class Maindashboard extends CI_Controller{
  
	public function index() {
		//cechk seession value what is stored here 
		//print_r($this->session->userdata);exit; 
		//for php check
    //  print_r($_SESSION);exit;
		$this->load->view('layouts/header.php');
		$this->load->view('layouts/sidenav.php');
		$this->load->view('maindashboard/dashboard.php');
		$this->load->view('layouts/footer.php');
	}

} 
