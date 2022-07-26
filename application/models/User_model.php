

<?php 
defined("BASEPATH") OR exit("No  direct access allowed ");

class USer_model extends CI_Model{
 
	// public function checkUserUpdate(){
	// }
   public  function getUserProfile($cond){
     $this->db->select("id, name, email, address, user_image");
	 $this->db->from('users');
	 $this->db->where($cond);
	 $query = $this->db->get();
	 return $query->row();
  }
}


