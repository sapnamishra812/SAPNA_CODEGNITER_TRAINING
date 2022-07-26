<?php 
defined('BASEPATH') OR exit('No direct access allowed');
class User extends CI_Controller{
    
	public function __construct(){
		parent:: __construct();
		$this->load->model('User_model');
	}
	 
	public function profile_setting(){
		//print_r($_SESSION);exit;
		$getUserData = $this->User_model->getUserProfile("id = '".$this->session->userdata('user_id')."'");
		
		//print_r($getUserData);exit; 
		$data = array(
			'$userData'=>$getUserData,
		); /**this use used to take data  from database and show in this form. */
		 $this->load->view('layouts/header');
		 $this->load->view('layouts/sidenav');
		 $this->load->view('users/user', $data);
		 $this->load->view('layouts/footer');
		 
	}
  
	public function profileSettingAction(){
         
      //print_r($_POST);
	  print_r($_POST);
	  print_r($_FILES);
      $this->form_validation->set_rules('first name ', 'First Name', 'required|trim|alpha');
	  $this->form_validation->set_rules('last name', 'Last Name', 'trim|required|alpha');
	  $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email' );
	 
	  

	  $profileBtn = $this->input->post('profilebtn');
    
	  if(isset($profileBtn))
	  {
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('Users/user');
		}
		else
		{
           $firstname= $this->input->post('fname');
		   $lastname = $this->input->post('lname');
		   $email = $this->input->post('email');
		   $image = $this->input->post('img');
		   $address = $this->input->post('address');

		 //  $userData = $this->User_model->checkUserUpdate("email = '".$email. "' and id != '".$."'"); 
		   if(isset($userData)){
                echo "update successfull";
		   }else{
			$error = array(
			         'error_message' => 'User is not register'
			     );
		   }
		}
	  }//
	  else
	  {
         redirect('User');
	  }


	}
}
