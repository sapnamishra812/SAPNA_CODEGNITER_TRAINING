<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Home_model');
		date_default_timezone_set("Asia/kolkata"); 
	}
	
	public function index()
	{  
		//print_r($this->session->userdata());exit;  // or check when i logout then what sesssion is show on login page 
		if(!empty($this->session->userdata('user_id'))){
			redirect("Maindashboard");
		}
		$this->load->view('home/login');
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
                   
				$this->load->view('home/login'); //if not validation  then go to login page  and also taking error message 
			}
			else{

				$email=$this->input->post('email_address');
				$password=$this->input->post('password');
				$getUser=$this->Home_model->checkLogin("email='".$email."'  and password='".md5($password)."'");
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
						//  $error = array(
						// 	            'error_message' => 'User is Inactive'
						//             );
						 $this->session->set_flashdata('error_message', 'User Is Inactive');
						 redirect('Home');
					}
				 }
				 else{
                    //  $error = array(
					//           	   'error_message' => 'Invalid user credentials'
					//              );
                    $this->session->set_flashdata('error_message', 'Invalide User Credentials');
					redirect('Home');
				 }
			}
		}
		else{
            redirect('Home');
		}
	}

	/** this function for logout  */
	public function logoutAction(){
		if($this->session->userdata()){
			//$this->session->unset_userdata();
			$this->session->sess_destroy();
			redirect("Home/index");
		}
	}

	/**this function is used for loading the registertation page  */
	public function register(){
		$this->load->view('home/register');
	}
	
	/**this function is used for registration of users  */

	public function registrationAction(){
	//print_r($_POST);exit;
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha' , array(
			'required' => '%s is required',
			'alpha' => 'Name only in alphabate'
		));
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[users.email]', array(
			'required' => 'email  is required',
			'valid_email' => 'enter valid email address',
			'is_unique' => '%s is already exit '
		));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[12]', array(
			 'required' => 'Password is required',
			 'min_length'=> 'password atleast 6 charaters',
			 'max_length' => 'maximum length is 12'
		));
		$this->form_validation->set_rules('confirm_password', 'confirm Password', 'trim|required|matches[password]');
		$registerBtn = $this->input->post('registerbtn');

		if(!empty($_POST)){
			  
                  if($this->form_validation->run()== FALSE)
				  {
                          $this->load->view('home/register');
				  }
				  else
				  {
                    $firstName = $this->input->post('first_name');
					$lastName = $this->input->post('last_name');
					$email = $this->input->post('email');
					$password = $this->input->post('password');
					$confirmPassword = $this->input->post('confirm_password');

					//$getUser=$this->Home_model->checkEmail("email='".$email."'");
					//print_r($this->db->last_query());exit; // for checking the data is  here or note, value in the qurey form 
					//print_r($getUser);exit;
					//if(empty($getUser))
					//{   // chack is user exist or not
						//echo "sssssss";exit;
						//if(md5($password)== md5($confirmPassword)){
							$data = array(
								'name'=> $firstName." ".$lastName,
								'email' =>$email,
								'password'=>md5($password),
								'status'=>'inactive',
								'created'=>date('Y-m-d H-i-s'), //error show call  to undefinde function Now()

							);
						  $saveUser = $this->Home_model->insertData($data);
				          //print_r($saveUser);exit; /** show o/p ->5  tihs is inlast insert id no. */
						// print_r($this->db->last_query());exit;/** this o/p ->INSERT INTO `users` (`name`, `email`, `password`, `status`) VALUES ('apnaa com', 'apna@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'inactive') */
						redirect('Home'); 
					//}
						// else{
						// 	$error =array(
						// 		'error_message'=>'Password and Confirm password does not match'
						// 	);
						// 	$this->load->view('home/register');
						// } /**/for sotcut matches[password]  put in confirm password */
					//}
					// else
					// {
					// 	$error = array( 
					// 		'error_message' => 'this user already register with this email'
					// 	);
					// 	$this->load->view('home/register' , $error);

					// } /**/is_unique */
				  }
		}//if(isset($registerBtn))
		else{
            $this->load->view('home/register');
		}

	}

}
