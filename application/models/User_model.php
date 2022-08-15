

<?php 
defined("BASEPATH") OR exit("No  direct access allowed ");

class User_model extends CI_Model{
 
	// public function checkUserUpdate(){
	// }

	/**Login  after set UserProfile*/
   public  function getUserProfile($cond){
     $this->db->select("id, name, email, address, user_img, gender, address,");
	 $this->db->from('users');
	 $this->db->where($cond);
	 $query = $this->db->get();
	 return $query->row();
  }

  /** update user profile   (using email check) */

  public function checkProfileEmail($cond){ //for update 2 parametr pass as argment 
	$this->db->select("id ,email, user_img, status");
	$this->db->from('users');
	$this->db->where($cond);
	$query = $this->db->get();
	return $query->row();
  }
    public function updateUser( $data,$cond){
       $this->db->where($cond);
	   $this->db->update("users", $data);
	   if($this->db->affected_rows()>0){
		  //echo 'true';
		  return 'true';
	   }
	   else{
		    //echo 'some error';
			return 'some Error!!';
	   }

    }

	/**check change password 
	 *to check  data is present or not in session. this is same as checkProfileEmail() this function  f
	 * if some function work same then used globle function name  which is used every controllers 
	 * to get data infomation from session in the model part 
	 */
	 public function checkChangePassword($cond) {
       $this->db->select("id");
	   $this->db->from("users");
	   $this->db->where("$cond");
	   $query = $this->db->get();
	   return $query->row();
	 }

	 /**for change password which update in db also 
	  * this function also used as global bcoz  updateUser() is also same working
	  */
	 public function updateCurrentPassword($data , $cond) {

		$this->db->where($cond);
		$this->db->update("users", $data);
		if($this->db->affected_rows()>0){
		   //echo 'true';
		   return 'true';
		}
		else{
			 //echo 'some error';
			 return 'some Error!!';
		}
          
	 }

	 /** chec Image uplaode  */ 
	//  public function checkImageUpdate($cond){
    //     $this->load->where
  
	//  }
 /** for change passowd check this model maybe */
	public  function getUserData($cond){
		$this->db->select("users.*,cities.city_name,states.state_name");
		$this->db->from('users');
		$this->db->join('cities','users.city_id=cities.id','left');
		$this->db->join('states','users.state_id=states.id','left');
		$this->db->where($cond);
		$this->db->order_by("users.id", 'desc');
		$query = $this->db->get();
		//print_r($query);exit;
	//	print_r($this->db->last_query()); exit; //SELECT `users`.*, `cities`.`city_name`, `states`.`state_name` FROM `users` LEFT JOIN `cities` ON `users`.`city_id`=`cities`.`id` LEFT JOIN `states` ON `users`.`state_id`=`states`.`id`
		return $query->result_array();
	 }

	 /** user this model to check the status  */
	public function updateStatus($data, $cond=''){
            if(!empty($cond)){
				$this->db->where($cond);
			}
			$this->db->update("users", $data);
			if($this->db->affected_rows()>0){
				return 'true';
			}
			else{
				return 'false';
			}
			//$this->db->last_query();exit;

	    }
   /**Add new User by admine  */
	public function	insertData($data){
		$this->db->insert("users", $data);
		$last_id =$this->db->insert_id();
		return $last_id;
	}
	
    /**Fetch  state */
	public function getStatesData($cond){
        $this->db->select("id,status,state_name");
		$this->db->from('states');
		$this->db->where($cond);
		$query = $this->db->get();
		return $query->result_array();
	}
    /**fetch citites */
	public function getCitiesData($cond){
		$this->db->select("id,status,city_name");
		$this->db->from('cities');
		$this->db->where($cond);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**view page */
	public function getUserView($cond){
		//print_r($this->db->last_query($cond));exit;
		$this->db->select("users.*,cities.city_name,states.state_name");
		$this->db->from('users');
		$this->db->join('cities','users.city_id=cities.id','left');
		$this->db->join('states','users.state_id=states.id','left');
		$this->db->where($cond);
		$query = $this->db->get();
		return $query->row();

	}

	/**Delete ser */

	public function updatDeleteuser($data, $cond=''){
		if(!empty($cond)){
			$this->db->where($cond);
		}
		$this->db->update("users", $data);
		if($this->db->affected_rows()>0){
			return 'true';
		}
		else{
			return 'false';
		}
	}
	public function editPage($cond){
		$this->db->select("users.*,cities.city_name,states.state_name");
		$this->db->from('users');
		$this->db->join('cities','users.city_id=cities.id','left');
		$this->db->join('states','users.state_id=states.id','left');
		$this->db->where($cond);
		$query = $this->db->get();
		return $query->row();
	}

	//edit page updateEditPage
	public function updateEditPage($cond){
		

	}
}


