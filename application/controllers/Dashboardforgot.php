<?php
defined('BASEPATH') OR exit("No direct access allowed");
 class Dashboardforgot extends CI_Controller{
	public function forgot(){
		$this->load->view('layouts/header.php');
		$this->load->view('layouts/sidenav.php');
		$this->load->view('maindashboard/forgot.php');
		$this->load->view('layouts/footer.php');

	}
 }
