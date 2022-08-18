<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class States extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('States_model');
	}

   public function  index(){
		//query fire
		$getAllState=$this->States_model->getAllStates("states.is_delete='0'");
		// echo "<pre>";
		// print_r($getAllState);exit;
		$stateArray =array(
			'stateData'=>$getAllState,
			'heading'=>'States',
			'sub_heading'=>'State wise list here !',
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidenav');
		$this->load->view('state/state_list',$stateArray);
		$this->load->vieW('layouts/footer');
	}
 
	/** take this from ajax function through path  */
	public function addStatesAction(){
      //print_r($_POST);exit;
	  $this->form_validation->set_rules('statename', 'State Name', 'trim|required|alpha', array(
		 'required' =>'Please enter %s',

	  ));

	  if($this->form_validation->run()==FALSE){
           echo "0";exit;
	   }
	  else{
		//echo "1";exit;
		$getStates = $this->States_model->checkState("state_name = '".$this->input->post('statename')."'");
		//print_r($getStates);exit;
		//
		if(!empty($getStates)){
			echo "1";exit;

		}
		else{
               $data = array('state_name'=>$this->input->post('statename'), 'created'=>date('Y-m-d H::i:s'));
		      $add = $this->State_model->addState($data);
			}
	   }


	}

}
?>
