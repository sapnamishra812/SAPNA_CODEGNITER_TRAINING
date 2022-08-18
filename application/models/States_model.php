<?php 
defined('BASEPATH') OR exit('No direct access allowed!');

class States_model extends CI_Model{

	public function __construct(){

	}

	/**Login */
	public function getAllStates($cond){
		$this->db->select("*");
		$this->db->from('states');
		$this->db->where($cond);
		$query = $this->db->get();
		//print_r($this->db->last_query());exit;
		return $query->result_array();//for multiple records
	}

	public function checkState($cond){
		$this->db->select("*");
		$this->db->from('states');
		$this->db->where($cond);
		$query = $this->db->get();
		return $query->row();

	}
	
	//add state 
	public function addState($data){
		$this->db->insert('states', $data);
		 $last_id=$this->db->insert_id();
		 return $last_id;
	}
?>
 