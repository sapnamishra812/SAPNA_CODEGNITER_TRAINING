<?php 
defined("BASEPATH") OR exit("No  direct access allowed ");

class Home_model extends CI_Model{
 
	public function checkEmailAddress(){

	}
    
	/**Login */
	public function checkLogin($cond){ //parameter is condition is 
		$this->db->select("id,status,email,name"); /* call db ->go to select-,db is datasbase library  select is used for data fetching id status  email */
		$this->db->from('users'); //  from where i get id status email ->in  user table 
		$this->db->where($cond); ///wehere is condition 
		$query = $this->db->get(); //this is function. this is query and now run this
		//echo "<pre>";
		//print_r($query->result_array());
		//print_r($query->row());
		//exit;

		return $query->row(); //so data is come in $query so simly i return 

 	}
   /**Register :  user already exit */
   public function checkEmail($cond){
	$this->db->select("id"); 
	$this->db->from('users'); 
	$this->db->where($cond); 
	$query = $this->db->get();
	return $query->row();
   }
  
   /**Register user */
   public function insertData($data){
	$this->db->insert("users", $data);
	//$query = $this->db->gety(); when we insert we can't get any value 
	$last_id = $this->db->insert_id();
	return $last_id ;

   }
}
