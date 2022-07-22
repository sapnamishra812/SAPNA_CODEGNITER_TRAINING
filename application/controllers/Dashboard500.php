<?php 
defined('BASEPATH') OR exit('No directive access is allowed');

 class Dashboard500 extends CI_Controller{

	public function error500() {
		$this->load->view('layouts/header.php');
		$this->load->view('layouts/sidenav.php');
         $this->load->view('maindashboard/error500');
		 $this->load->view('layouts/footer.php');
	}
 }
