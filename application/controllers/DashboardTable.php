<?php
defined('BASEPATH') OR exit("No direct access allowed");
 class DashboardTable extends CI_Controller{
	public function table(){
		$this->load->view('layouts/header.php');
		$this->load->view('layouts/sidenav.php');
		$this->load->view('maindashboard/table.php');
		$this->load->view('layouts/footer.php');

	}
 }
