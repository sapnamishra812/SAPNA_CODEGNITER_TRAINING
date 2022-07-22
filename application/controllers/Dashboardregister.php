<?php
defined('BASEPATH') OR exit("No direct access allowed");
 class Dashboardregister extends CI_Controller{
	public function register(){
		$this->load->view('layouts/header.php');
		$this->load->view('layouts/sidenav.php');
		$this->load->view('maindashboard/register.php');
		$this->load->view('layouts/footer.php');

	}
 }
