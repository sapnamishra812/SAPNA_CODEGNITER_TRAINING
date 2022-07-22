<?php 
defined('BASEPATH') OR exit('No direct scripts access allowed');

class Error404 extends CI_Controller{
	 public function error_404(){
		$this->load->view('error404');
	 }
}
