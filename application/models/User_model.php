

<?php 
defined("BASEPATH") OR exit("No  direct access allowed ");

class User_model extends CI_Model{
 
	// public function checkUserUpdate(){
	// }

	/**Login */
   public  function getUserProfile($cond){
     $this->db->select("id, name, email, address, user_img");
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
	public  function getUserData(){
		$this->db->select("*");
		$this->db->from('users');
		$query = $this->db->get();
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
	    }
   /**Add new User by admine  */
	public function	insertData($data){
		$this->db->insert("users", $data);
		$last_id =$this->db->insert_id();
		return $last_id;
	}
	
    /**Fetch  state */
	public function getStatesData($cond){
        $this->db->select("status, state_name");
		$this->db->from('states');
		$this->db->where($cond);
		$query = $this->db->get();
		return $query->result_array();
	}
    /**fetch citites */
	public function getCitiesData($cond){
		$this->db->select("status, city_name");
		$this->db->from('cities');
		$this->db->where($cond);
		$query = $this->db->get();
		return $query->result_array();
	}
}


