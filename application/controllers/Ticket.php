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
}