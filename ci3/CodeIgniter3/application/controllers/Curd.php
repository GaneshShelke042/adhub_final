<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller 
{
	public $Curd_model;
	public function __construct()
	{
	/*call CodeIgniter's default Constructor*/
	parent::__construct();
	/*load database libray manually*/
	$this->load->database();
	
	/*load Model*/
	$this->load->model('Curd_model');
	} 
	public function savedata()
	{
		/*load registration view form*/
		$this->load->view('insert');
		/*Check submit button */
		if($this->input->post('save'))
		{
		    $data['first_name']=$this->input->post('first_name');
			$data['last_name']=$this->input->post('last_name');
			$data['email']=$this->input->post('email');
			$response=$this->Curd_model->saverecords($data);
			if($response==true){
			        echo "Records Saved Successfully";
			}
			else{
					echo "Insert error !";
			}
		}
	}
	
}
?>
