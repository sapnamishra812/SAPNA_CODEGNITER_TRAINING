

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
	$this->db->select("id");
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
}


