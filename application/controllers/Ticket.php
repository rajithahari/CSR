<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {
	public function __construct()
	{
		 parent::__construct();
		 $this->load->library('session');
		 $this->load->database();		
		 $this->load->model('ticket_model');
	}

	public function create()
	{
		if(@$this->session->userdata['user']['user_id']){
			$this->load->view('includes/header');
			$this->load->view('create-ticket');
			$this->load->view('includes/footer');
		}else{
			redirect('/user/login');
		}		
	}

	public function edit()
	{
		if(@$this->session->userdata['user']['user_id']){
			$this->load->view('includes/header');
			$this->load->view('edit-ticket');
			$this->load->view('includes/footer');
		}else{
			redirect('/user/login');
		}		
	}

	public function add(){
		if(@$this->session->userdata['user']['user_id']){
			$postdata = file_get_contents("php://input");
	      	$request = json_decode($postdata);
	      	$result = $this->ticket_model->add($request);
	      	
	      	if($result)
			{
				echo $result = '{"status" : '.$result.'}';
			}else{
			 	echo $result = '{"status" : false}';
			}
		}else{
			redirect('/user/login');
		}

	}

	public function update(){
		if(@$this->session->userdata['user']['user_id']){
			$postdata = file_get_contents("php://input");
	      	$request = json_decode($postdata);
	      	$result = $this->ticket_model->update($request);
	      	
	      	if($result)
			{
				echo $result = '{"status" : '.$result.'}';
			}else{
			 	echo $result = '{"status" : false}';
			}
		}else{
			redirect('/user/login');
		}

	}

	public function escalate(){
		if(@$this->session->userdata['user']['user_id']){
			$postdata = file_get_contents("php://input");
	      	$request = json_decode($postdata);
	      	$result = $this->ticket_model->escalate($request);
	      	
	      	if($result)
			{
				echo $result = '{"status" : '.$result.'}';
			}else{
			 	echo $result = '{"status" : false}';
			}
		}else{
			redirect('/user/login');
		}

	}

	public function view(){
		if(@$this->session->userdata['user']['user_id']){
			$this->load->view('includes/header');
			$this->load->view('view-ticket');
			$this->load->view('includes/footer');
		}else{
			redirect('/user/login');
		}	
	}

	public function getTicket(){
		if(@$this->session->userdata['user']['user_id']){
			$postdata = file_get_contents("php://input");
	      	$request = json_decode($postdata);
	      	$result = $this->ticket_model->getTicket($request);
	      	
	      	if($result)
			{
				echo $result = '{"ticket" : '.json_encode($result).'}';
			}else{
			 	echo $result = '{"ticket" : false}';
			}
		}else{
			redirect('/user/login');
		}
	}

	public function back(){
		redirect('/user/dashboard');
	}

	public function getList(){
		if(@$this->session->userdata['user']['user_id']){

			$postdata = file_get_contents("php://input");
	      	$request = json_decode($postdata);
	      	if($request){
	      		$result = $this->ticket_model->getTickets($request);
	      	}else{
	      		$result = $this->ticket_model->getTickets(null);
	      	}
			
	      	
	      	if($result)
			{
				echo $result = '{"tickets" : '.json_encode($result).'}';
			}else{
			 	echo $result = '{"ticket" : false}';
			}
		}else{
			redirect('/user/login');
		}
	}

	public function delete(){
		if(@$this->session->userdata['user']['user_id']){

			$postdata = file_get_contents("php://input");
	      	$request = json_decode($postdata);
	      	if($request){
	      		$result = $this->ticket_model->delete($request);
	      	}
			
	      	
	      	if($result)
			{
				echo $result = '{"status" : true}';
			}else{
			 	echo $result = '{"status" : false}';
			}
		}else{
			echo $result = '{"status" : false}';
		}
	}
}