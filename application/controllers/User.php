<?php 
defined('BASEPATH') OR exit('No direct access allowed');
class User extends CI_Controller{
    
	public function __construct(){
		parent:: __construct();
		$this->load->model('User_model');
		//for Upload image or files ser this extension itis predefind librar
		//$this->load->library('upload', $config);
	}
	public function index(){
		$getAllUserData = $this->User_model->getUserData("users.is_delete='0' and users.id!='".$this->session->userdata('user_id')."'");
		//print_r($getUserData);exit;
		$data = array(
             "heading"=>"users",
			 "sub_heading"=>"user list",
			 "userData"=>$getAllUserData 
		);
		$this->load->view('layouts/header');
		 $this->load->view('layouts/sidenav');
		 $this->load->view('users/user_list', $data);
		 $this->load->view('layouts/footer');
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
	   //$this->form_validation->set_rules('user_img', 'Empty image', 'required');	 
	  

	  $updateBtn = $this->input->post('profilebtn');
	  $getUserImage = $this->User_model->checkProfileEmail("id ='".$this->session->userdata('user_id')."'"); 
	  $image_name = $getUserImage->user_img;	// alway put db image it may be defaultor other image 	
	  if(isset($updateBtn)) { 
		//print_r($_POST);exit;
		if($this->form_validation->run() == FALSE) {  
			//print_r("hii");exit;    
			/* $this->load->view('layouts/header');
			// $this->load->view('layouts/sidenav');
			// $this->load->view('Users/user');
			// $this->load->view('layouts/footer');   when we used this bt at time  value is not come means profileSetting fnction again repeate*/
	       $this->profileSetting(); //we without change this file fnction got to onther fnction and work
		  // redirect('Users/profileSetting') ;//1$3 same. this time it's move the onther fnction and then it work 
          
		} /*if($this->form_validation->run() == FALSE) */
		else {
			//print_r("hello");exit;
		   $email = $this->input->post('email');

		   //check for dublicate error if no  error occre then goto  contine else go to profileSeeting page  
		  $getUser = $this->User_model->checkProfileEmail("email = '".$email. "' and id != '".$this->session->userdata('user_id')."'"); 
		  // print_r($getUser);exit;
		    if(empty($getUser)){
			 //for error handling image
			   
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
					//	$error = array('error' => $this->upload->display_errors());
                          $this->session->set_flashdata('image_error',$this->upload->display_errors());
						return  $this->profileSetting();
						//return $this->load->view('users/user', $error);


					}
					else {
                        $imageDetailArray = $this->upload->data();
						//print_r($imageDetailArray);exit;
						$image_name = $imageDetailArray['file_name'];

						/**used unlink Old image */
						
						if($getUserImage->user_img!="default.png"){
							unlink("./assets/uploads/users/".$getUserImage->user_img);
						}
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
				$update = $this->User_model->updateUser($dataArray, "id='".$this->session->userdata('user_id')."'"); 
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

	


	/** update Status function  */
	 public function updateStatus(){
		//print_r($_POST);exit;
		$user_id = $this->input->post('user_id');
		//print_r($_POST);exit;
		$getUser = $this->User_model->checkProfileEmail("id= '".$user_id."'");
		//print_r($getUser);exit;
		$status = ($getUser->status=='active') ? 'inactive':'active';
		$data = array('status'=>$status);
		$cond = "id='".$user_id."'";
		$update = $this->User_model->updateStatus($data, $cond);
	
		if($status=='active'){
              $newClass= 'btn-success';
			  $oldClass= 'btn-danger';
		}else{
			$newClass= 'btn-danger';
			$oldClass= 'btn-success';
		}
		     
		if($update=='true'){
			$dataArray = array('newClass'=>$newClass, 'oldClass'=>$oldClass, 'status'=>ucfirst($status), 'success'=>'1');
           
		}else{
			$dataArray = array('success'=>'0');
		}
         
		echo json_encode($dataArray);exit;
	 }


	 /**Add addUserList fnctionality on list page ,
	 * Add User ->new user form add/insert by admine */
	/**Add User */
	public function addUser(){
		$getStates = $this->User_model->getStatesData("status='active'");
		//print_r($getStates);exit; //=> o/p array();
		$getCities = $this->User_model->getCitiesData("status='active'");
		//print_r($getCities);exit;
		$getUserData = $this->User_model->getUserProfile("id = '".$this->session->userdata('user_id')."'");
		//print_r($getUserData);exit; object value
		
		$data=array(
			"heading"=>"Add Users",
			"sub_heading"=>"Add User Here!",
			"states"=>$getStates,
			"cities"=>$getCities ,
			'userData'=>$getUserData,

		);
		//print_r($data);exit;
		//print_r($data);exit;
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidenav');
		$this->load->view('users/add_user_list',$data);
		$this->load->view('layouts/footer');
	}

	/**AddNew User record by addmin and check all functionality here  */
      public function addUserAction(){
		//print_r($_POST);exit;
         $first_name = $this->input->post('first_name');
		 $last_name = $this->input->post('last_name');
		 $address = $this->input->post('address');
		 $email = $this->input->post('email');
		 $gender = $this->input->post('gender');
		 $state_id = $this->input->post('state');
		 $city_id = $this->input->post('city');
		 $hobbies = $this->input->post('hobbies');
		 $zip = $this->input->post('zip');
		 $addUserBtn = $this->input->post('add_userbtn');

		 //apply validation 
		 $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha', array(
			'required'=> 'Please enter %s',
		     'alpha'=>'only letter allow',
		 ));
		 $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha', array(
			'required'=> 'Please enter %s',
			'alpha'=>'only letters allow',
		 ));
		 $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[users.email]', array(
			'required'=> 'Please enter %s',
			'is_unique'=> 'This %s is already exist.',
			'valid_email'=> 'please enter valid %s',
		 ));
      
		 //$this->form_validation->set_rules('address', 'Address', 'trim');
		   //$this->form_validation->set_rules('city', 'City', 'required');
		  // $this->form_validation->set_rules('state', 'State', 'required');
		   $this->form_validation->set_rules('gender', 'Gender', 'required');
		   //$this->form_validation->set_rules('hobbies', 'Hobbies', 'required');
		  $this->form_validation->set_rules('zip', 'Zip', 'trim|min_length[4]|max_length[6]|numeric');
          //print_r($addUserBtn);exit;
		   if(isset($addUserBtn)){
                  if($this->form_validation->run() == FALSE){
                           $this->addUser();
				  }
				  else{
					
					$image_name='default.png';
					if($_FILES['user_profile']['error']==0) {
						$config = array(
	
							'upload_path' => './assets/uploads/users/',
							'allowed_types' => "gif|jpg|png|jpeg",
							'max_size' =>"2000" ,
							'max_height' => "1500", 
							 'max_width' => '1500'
						);
						$this->load->library('upload', $config);
						
						if(!$this->upload->do_upload('user_profile')){
						
							  $this->session->set_flashdata('file_error',$this->upload->display_errors());
							return  $this->addUser();
						
						}
						else {
							$imageDetailArray = $this->upload->data();
							$image_name = $imageDetailArray['file_name'];
						}
					}
					$newHobbies;
					if(!empty($hobbies)){
						$newHobbies = implode(",",$hobbies);
					}
					$dataArray=array(
						'name' => $first_name.' '.$last_name,
						'email'=> $email,
						'address' => $address,
						'user_img' =>$image_name,
						'gender'=> $gender,
						'hobbies'=>$newHobbies,
						'state_id'=> $state_id,
						'city_id'=> $city_id,
						'zip'=>$zip,
						'status'=>'active',
						'created' => date('Y-m-d H:i:s')
		            ); 
                    //print_r($dataArray);exit;
					$addNewRecord = $this->User_model->insertData($dataArray, " id='".$this->session->userdata('user_id')."'"); 
					//print_r($addNewRecord);exit;
					
					$this->session->set_flashdata('sccess_msg', 'New User Added Successflly');
					redirect("User/index");

				  }
		   }
		   else{
			 redirect('User/addUser');
		   }
		   
	  }

	  /** to load view page  */
	  public function view($id){
		//print_r($_POST);exit;
		 $id= base64_decode($id);
		$getData = $this->User_model->getUserView("users.id='".$id."'");
		//print_r($getData);exit;
		$data=array(
			'userData'=>$getData,
			'heading'=>'View User',
			'sub_heading'=>"Show view user",
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidenav');
		$this->load->view('users/user_view',$data);
		$this->load->view('layouts/footer');
	  }

	  /**delete Fnction btn */
	  public function deleteUser(){
		//print_r($_POST);exit;
         $userIdDelete = $this->input->post('user_id');
		 $data=array('is_delete'=>1);
		$userUpdate=$this->User_model->updatDeleteuser($data,"id='".$userIdDelete."'");
	 //  print_r($userUpdate);exit;
	 $this->session->set_flashdata('sccess_msg', "Delete successfully!!!");
	      if($userUpdate=='true'){
			echo 1;exit;
		  }
		  else{
			 echo 0;exit;
		  }
	   }


	   /**Edit ser */
	   public function edit($id){
		$id1 = base64_decode($id);
		//print_r($id1);exit;
		$editData = $this->User_model->editPage("users.id= '".$id1."'");
       // print_r($editData);exit;
		$getEditState = $this->User_model->getStatesData("status='active'");
		$getEditCity = $this->User_model->getCitiesData("status='active'");
		//print_r($getEditState);exit;
		$arrayData = array(
			'userData'=>$editData ,
			'heading'=> 'Edit Page',
			'sub_heading'=> 'Edit User Page!!',
			'states'=>$getEditState,
			'cities'=>$getEditCity,
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidenav');
		$this->load->view('users/editPage',	$arrayData);
		$this->load->view('layouts/footer');
	   }


	   /*** edit page action */
	public function editUserAction($id){
		 $id = base64_decode($id);
	 	$this->form_validation->set_rules('first_name', 'First Name', 'required|trim|alpha', array(
			'required'=> 'please enter %s',
			'alpha' => 'only alphabates is allowed'
	     ));
	    $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha', array(
		 'required'=> 'please enter %s',
		 'alpha' => 'only alphabates is allowed'));
	     $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email',
			 array(
				 'required'   => 'You have not provided %s',
				 //'is_unique'  => 'This %s alread exist'
				 ));
		  $this->form_validation->set_rules('gender', 'Gender', 'required');
		  $this->form_validation->set_rules('address', 'Address', 'required');
		  $this->form_validation->set_rules('zip', 'Zip', 'trim|min_length[4]|max_length[6]|numeric');
         // $Edit_userbtn=$this->input->post('edit_userbtn');

		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$email = $this->input->post('email');
		$address = $this->input->post('address');
		$zip = $this->input->post('zip');
		$gender = $this->input->post('gender');
		$state = $this->input->post('state');
		$city = $this->input->post('city');
		$hobbies = $this->input->post('hobbies');
		

		$editBtn = $this->input->post('edit_userbtn');
		$getUserImage = $this->User_model->editPage("users.id='".$id."'"); 
		$image_name = $getUserImage->user_img;	// alway put db image it may be defaultor other image 
		if(isset($editBtn)) { 
		  if($this->form_validation->run() == FALSE) { 
			    $this->edit(base64_encode($id)); 
		  } /*if($this->form_validation->run() == FALSE) */
		  else {
            $getUser = $this->User_model->editPage("email = '".$email. "' and users.id='".$id."'");  
			
			  if(!empty($getUser)){
				  if($_FILES['user_profile']['error']==0) {
					  $config = array(
						  'upload_path' => './assets/uploads/users/',
						  'allowed_types' => "gif|jpg|png|jpeg",
						  'max_size' =>"2000" ,//in kb
						  'max_height' => "1500", 
						   'max_width' => '1500'
					  );
					  $this->load->library('upload', $config);
					  
					  if(!$this->upload->do_upload('user_profile')){
						//print_r('img');exit;
					  
						$this->session->set_flashdata('file_error',$this->upload->display_errors());
						  return  $this->edit(base64_encode($id));
						  //return $this->load->view('users/user', $error);
  
  
					  }
					  else {
						  $imageDetailArray = $this->upload->data();
						  $image_name = $imageDetailArray['file_name'];
						  /**used unlink Old image */
						  if($getUserImage->user_img!="default.png"){
							  unlink("./assets/uploads/users/".$getUserImage->user_img);
						  }
					  }
				  }/**if($_FILES['user_img']['error']==0) */
				  $newHobbies;
				  if(!empty($hobbies)){
					  $newHobbies = implode(",",$hobbies);
				  }
				   $dataArray=array(
								'name' => $first_name.' '.$last_name,
								'email'=> $email,
								'address' => $address,
								'gender'=> $gender,
								'hobbies'=>$newHobbies,
								'state_id'=> $state,
								'city_id'=> $city,
								'zip'=>$zip,
								 'user_img' =>$image_name,
								 'modified' => date('Y-m-d H:i:s')
				  ); 
				 //print_r( $dataArray);exit;
				  $update = $this->User_model->updateEditPage($dataArray, "users.id='".$id."'"); 
				  //print_r($update);exit;
				  $this->session->set_flashdata('sccess_msg', ' User is edit successflly');
				 redirect('User/index');
			  } //if(empty($getUSer))
			  else { 
				//print_r('exit');exit;
			 $this->session->set_flashdata('error_message', 'Email address is already exit');
				  $this->edit(base64_encode($id));
			  }
		  }
		}/*if(isset($updateBtn))*/
		else {
			//print_r('last');exit;
		   redirect('User/edit/'.base64_encode($id));
		}

	}
}
