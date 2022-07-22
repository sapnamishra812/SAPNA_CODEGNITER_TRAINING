<?php 
defined('BASEPATH') OR exit('No direct access is allowed');

class Dashboardsidenav extends CI_Controller{
  
	public function sidenav_leftside() {
		$this->load->view('layouts/header.php');
		$this->load->view('layouts/sidenav.php');
		$this->load->view('maindashboard/layoutsidenav.php');
		$this->load->view('layouts/footer.php');
	}

} 
