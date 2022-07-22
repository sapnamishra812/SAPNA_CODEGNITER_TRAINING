<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Login_model');
	}
	
	public function login()
	{  
		//print_r($this->session->userdata());exit;  // or check when i logout then what sesssion is show on login page 
		if(!empty($this->session->userdata('user_id'))){
			redirect("Maindashboard");
		}
		$this->load->view('login');
	}
	/** this function used for login */
	public function loginAction(){
		//print_r($_POST);exit;
		//$email=$this->input->post('email_address'); 
		//$password = $this->input->post('password');
		//print_r($email);exit;
		$this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
        $loginBtn=$this->input->post('loginBtn');


		// if($this->form_validation->run() == FALSE){
		// 	//print_r('false');exit;
		// 	$this->load->view('login'); //go to login page 
		// } 
		// else{
		// 	print_r('true');exit;
		//    $this->load->view('formsusscefull'); // go to dashboad page 
		// }


		if(isset($loginBtn)){ // login btn clicked then go to 
			 
			if($this->form_validation->run()==FALSE){ //1st is being  validation 
                   
				$this->load->view('login'); //if not validation  then go to login page  and also taking error message 
			}
			else{

				$email=$this->input->post('email_address');
				$password=$this->input->post('password');
				$getUser=$this->Login_model->checkLogin("email='".$email."'  and password='".md5($password)."'");
               //for check query 
			  // print_r($this->db->last_query());exit;
				 if(!empty($getUser)){
					if($getUser->status=='active'){
						$_userdata = array(
												'user_id' => $getUser->id,
												'user_email' => $getUser->email,
												'user_name' => $getUser->name,
												'user_status' => $getUser->status,
											);
											$this->session->set_userdata($_userdata); //seessrion start 
											//print_r($this->session->userdata());exit; /*check session which data is stored -o/p->Array ( [__ci_last_regenerate] => 1658316124 [user_id] => 1 [user_email] => sapna123@gmail.com [user_name] => sapna mishra [user_status] => active )*/
											redirect("Maindashboard");
					}
					else{
						 $error = array(
							            'error_message' => 'User is Inactive'
						            );
						 $this->load->view('login', $error);
					}
				 }
				 else{
                     $error = array(
					          	   'error_message' => 'Invalid user credentials'
					             );
					$this->load->view('login', $error);
				 }
			}
		}
		else{
            $this->load->view('login');
		}
	}

	/** this function for logout  */
	public function logoutAction(){
		if($this->session->userdata()){
			//$this->session->unset_userdata();
			$this->session->sess_destroy();
			redirect("Login/login");
		}
	}

	/**this function is used for loading the registertation page  */
	public function register(){
		$this->load->view('register');
	}
	
	/**this function is used for registration of users  */

	// public function registrationAction(){
	// 	//print_r($_POST);
	// 	$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
	// 	$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
	// 	$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
	// 	$this->form_validation->set_rules('password', 'Password', 'trim|required');
	// 	$this->form_validation->set_rules('confirm_password', 'confirm Password', 'required');
	// 	$registerBtn = $this->input->post('registerbtn');

	// 	if(isset($registerBtn)){
    //               if($this->form_validation->run()== FALSE){
    //                       $this->load->view('Register/register');
	// 			  }
	// 			  else{
    //                 $firstName = $this->input->post('first_name');
	// 				$lastLame = $this->input->post('last_name');
	// 				$email = $this->input->post('email');
	// 				$password = $this->input->post('password');
	// 				$confirmPassword = $this->input->post('confirm_password');

	// 				$getUser=$this->Login_model->checkEmail("email='".$email."'");
	// 				print_r($this->db->last_query());exit; // for checking the data is  here or note, value in the qurey form 
	// 				//print_r($getUser);exit;
	// 				if(!empty($getUser)){   // chack is user exist or not 
	// 					$data = array(
    //                            'name'=> $firstName." ".$lastLame,
	// 						   'email' =>$email,

	// 					);
    //                      $saveUser = $this->Login_model->insertData($data);
	// 				}
	// 				else{
	// 					$error = array( 
	// 						'error_message' => 'this user already register with this email'
	// 					);
	// 					$this->load->view('Register/register' , $error);

	// 				} 
	// 			  }
	// 	}//if(isset($registerBtn))
	// 	else{
    //         $this->load->view('Register/register');
	// 	}

	// }

}
