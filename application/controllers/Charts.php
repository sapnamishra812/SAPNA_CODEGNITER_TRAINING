<?php
 defined('BASEPATH') OR exit('No direct script allowed');

 class Charts extends CI_Controller {

	public  function chart(){
		$this->load->view('charts');
	}
 }
