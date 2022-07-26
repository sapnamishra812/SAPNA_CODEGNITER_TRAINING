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
	 
	  

	  $updateBtn = $this->input->post('profilebtn');
    
	  if(isset($updateBtn)) {
		if($this->form_validation->run() == FALSE)
		{      
			/* $this->load->view('layouts/header');
			// $this->load->view('layouts/sidenav');
			// $this->load->view('Users/user');
			// $this->load->view('layouts/footer');   when we used this bt at time  value is not come means profileSetting fnction again repeate*/
	       $this->profileSetting(); //we without change this file fnction got to onther fnction and work
		  // redirect('Users/profileSetting') ;//1$3 same. this time it's move the onther fnction and then it work 

		}
		else
		{
		   $email = $this->input->post('email');

		   //check for dublicate error if no  error occre then goto  contine else go to profileSeeting page  
		  $getUser = $this->User_model->checkProfileEmail("email = '".$email. "' and id != '".$this->session->userdata('user_id')."'"); 
		   
		  if(empty($getUser)){
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
                     //for error handling image
					 $image_name = '';
					if(!$this->upload->do_upload('user_img')){
						$error = array('error' => $this->upload->display_errors());
						$this->load->view('users/user', $error);
					}else{
                        $imageDetailArray = $this->upload->data();
						//print_r($imageDetailArray);exit;
						$image_name = $imageDetailArray['file_name'];
					}
				}
				//for update all value which is in the form becase alll vale we want to get as it is only update
				$dataArray=array(
				               'name' => $this->input->post('fname'),
							   'email'=> $this->input->post('email'),
							   'address' => $this->input->post('address'),
							   'user_img' =>$image_name,
							   'modified' => date('Y-m-d H:i:s')
				); 
				$update = $this->User_model->updateUser($dataArray, " id='".$this->session->userdata('user_id')."'"); 
                $this->session->set_flashdata('success_message', ' is update successflly');
				$this->profileSetting();
		    }
			else{
				//$this->session->flash
				$this->profileSetting();
			}
		}
	  }//
	  else
	  {
         redirect('User/profileSetting');
	  }


	}
}
