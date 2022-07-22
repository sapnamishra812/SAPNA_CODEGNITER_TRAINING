<?php 
defined('BASEPATH') OR exit('No direct access allowed');
class Setting extends CI_Controller{
	public function newForm(){
		 $this->load->view('layouts/header');
		 $this->load->view('layouts/sidenav');
		 $this->load->view('maindashboard/settingForm');
		 $this->load->view('layouts/footer');
	}

}
