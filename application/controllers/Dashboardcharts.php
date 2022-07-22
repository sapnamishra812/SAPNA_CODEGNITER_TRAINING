<?php 
defined('BASEPATH') OR exit('No direct access is allowed');

class Dashboardcharts extends CI_Controller{
  
	public function charts() {
		$this->load->view('layouts/header.php');
		$this->load->view('layouts/sidenav.php');
		$this->load->view('maindashboard/charts.php');
		$this->load->view('layouts/footer.php');
	}

} 
