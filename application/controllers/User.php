<?php 
defined('BASEPATH') OR exit('No direct access allowed');
class User extends CI_Controller{
    
	public function __construct(){
		parent:: __construct();
		$this->load->model('User_model');
		//for Upload image or files ser this extension itis predefind librar
		//$this->load->library('upload', $config);
	}
	 
	public function profileSetting(){
		//print_r($_SESSION);exit;
		$getUserData = $this->User_model->getUserProfile("id = '".$this->session->userdata('user_id')."'");
		
	   //print_r($getUserData);exit; 
		$data = array(
			'userData'=>$getUserData,
		); /**this use used to take data  from database and show in this form. */
		 $this->load->view('layouts/header');
		 $this->load->view('layouts/sidenav');
		 $this->load->view('users/user', $data);
		 $this->load->view('layouts/footer');
		 
	}
  
	public function profileSettingAction(){
         
      //print_r($_POST);
	   // print_r($_POST); echo "<br>";
	   //print_r($_FILES); exit;
      $this->form_validation->set_rules('fname', 'First Name', 'required|trim|alpha', array(
           'required'=> 'please enter %s',
		   'alpha' => 'only alphabates is allowed'
	  ));
	  $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha', array(
		'required'=> 'please enter %s',
		'alpha' => 'only alphabates is allowed'));
	  $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email',
			array(
				'required'   => 'You have not provided %s',
				//'is_unique'  => 'This %s alread exist'
				)
	     );
	   $this->form_validation->set_rules('user_img', 'Empty image', 'required');	 
	  

	  $updateBtn = $this->input->post('profilebtn');
    
	  if(isset($updateBtn)) {
		if($this->form_validation->run() == FALSE) {      
			/* $this->load->view('layouts/header');
			// $this->load->view('layouts/sidenav');
			// $this->load->view('Users/user');
			// $this->load->view('layouts/footer');   when we used this bt at time  value is not come means profileSetting fnction again repeate*/
	       $this->profileSetting(); //we without change this file fnction got to onther fnction and work
		  // redirect('Users/profileSetting') ;//1$3 same. this time it's move the onther fnction and then it work 

		} /*if($this->form_validation->run() == FALSE) */
		else {
		   $email = $this->input->post('email');

		   //check for dublicate error if no  error occre then goto  contine else go to profileSeeting page  
		  $getUser = $this->User_model->checkProfileEmail("email = '".$email. "' and id != '".$this->session->userdata('user_id')."'"); 
		   
		    if(empty($getUser)){
			 //for error handling image
			     $image_name = '';
				if($_FILES['user_img']['error']==0) {
					$config = array(

						'upload_path' => './assets/uploads/users/',
						'allowed_types' => "gif|jpg|png|jpeg",
						//'overwrite' =>TRUE,
						'max_size' =>"2000" ,//in kb
						'max_height' => "1500", 
						 'max_width' => '1500'
					);
					$this->load->library('upload', $config);
                    
					if(!$this->upload->do_upload('user_img')){
						$error = array('error' => $this->upload->display_errors());
                          $this->session->set_flashdata('image_error', $error);
						  $this->profileSetting();
						//return $this->load->view('users/user', $error);


					}
					else {
                        $imageDetailArray = $this->upload->data();
						//print_r($imageDetailArray);exit;
						$image_name = $imageDetailArray['file_name'];
					}
				}/**if($_FILES['user_img']['error']==0) */
				//for update all value which is in the form becase alll vale we want to get as it is only update
				$dataArray=array(
				               'name' => $this->input->post('fname')." ".$this->input->post('lname'),
							   'email'=> $this->input->post('email'),
							   'address' => $this->input->post('address'),
							   'user_img' =>$image_name,
							   'modified' => date('Y-m-d H:i:s')
				); 
				$update = $this->User_model->updateUser($dataArray, " id='".$this->session->userdata('user_id')."'"); 
                $this->session->set_flashdata('success_message', ' User is update successflly');
				$this->profileSetting();
		    } //if(empty($getUSer))
			else { 
			$this->session->set_flashdata('error_message', 'Email address is already exit');
				//$this->session->flash
				$this->profileSetting();
			}
		}
	  }/*if(isset($updateBtn))*/
	  else {
         redirect('User/profileSetting');
	  }


	}


	/** Change password for user  */

	public function changePassword() {
       $this->load->view('layouts/header');
	   $this->load->view('layouts/sidenav');
	   $this->load->view('users/change_password');
	   $this->load->view('layouts/footer');
	}

	/**for change password to click form of changePasswordAction */
	public function changePasswordAction() {
            //apply validation  in theform 
			$this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
			$this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');

			$changePasswordBtn = $this->input->post('change_passwordbtn');

			if(isset($changePasswordBtn)) {

				if($this->form_validation->run() == FALSE){
					$this->changePassword();
			
				}/**if($this->form_validtion->run() == FALSE) check for validation */
				else{

					$current_password=$this->input->post('current_password');
					$new_password = $this->input->post('new_password');
					$confirm_password = $this->input->post('confirm_password');

					$getUser = $this->User_model->checkChangePassword("password = '".md5($current_password)."' and id= '".$this->session->userdata('user_id')."'");
			    
					/**getuserdata is check data is come from model or not  */
					if(!empty($getUser)){

						if(md5($new_password) == md5($confirm_password)){

							$dataArray = array(
								'password'=>md5($confirm_password),
								'modified'=>date('y-m-d H-i-s')
							);
                            
							//for query
							$update = $this->User_model->updateCurrentPassword($dataArray , "id = '".$this->session->userdata('user_id')."'");
							//$this->session->set_flashdata('success_message', 'Password update successfully');
							//redirect("User/changePassword");
							if($update == 'true'){ //if password is update then only destroyed 
								$this->session->unset_userdata($data);
								$this->session->sess_destroy();
								redirect("Home/index");
							}
							else{
								$this->session->set_flashdata('error_message', 'Something is wrong .Please try after some time !');
								redirect("User/changePassword");
							}
							

						}else{ //password is not match thenshow error again 

							$this->session->set_flashdata('error_message', "New password and confirm password does not matched");
							$this->changePassword();
 
						}

					}/**if(!empty($getUser)) check for user password is match with that id or not  /user availabe in db*/
					else{
                            $this->session->set_flashdata('error_message', "Current Password Is Incorrect");
							$this->changePassword();  //call the function 
					}
				}
                    
			} /**if(isset($changePasswordBtn)) check for user click btn or not */
			else{
                redirect("User/changePassword");
			}
	}
}
