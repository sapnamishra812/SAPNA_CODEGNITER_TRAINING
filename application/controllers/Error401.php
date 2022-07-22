<?php 
defined('BASEPATH') OR exit('No direct access allowed');
class Error401 extends CI_Controller{
 
	public function error_401(){
         $this->load->view('error401');
	}
}
