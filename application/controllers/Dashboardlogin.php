<?php
defined('BASEPATH') OR exit("No direct access allowed");
 class Dashboardlogin extends CI_Controller{
	public function login(){
		$this->load->view('layouts/header.php');
		$this->load->view('layouts/sidenav.php');
		$this->load->view('maindashboard/login.php');
		$this->load->view('layouts/footer.php');

	}
 }
