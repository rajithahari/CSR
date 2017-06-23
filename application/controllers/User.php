<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		 parent::__construct();
		 $this->load->library('session');
		 $this->load->database();		
		 $this->load->model('user_model');
	}

	public function index()
	{
		if(@$this->session->userdata['user']['user_id']){
			redirect('/user/dashboard', 'refresh');
		}
		$this->load->view('includes/header');
		$this->load->view('login');
		$this->load->view('includes/footer');
	}

	public function login(){
		$postdata = file_get_contents("php://input");
      	$request = json_decode($postdata);
      	$result = $this->user_model->getUser($request);
      	if(@$this->session->userdata['user']['user_id']){
			redirect('/user/dashboard', 'refresh');
		}
      	if($result)
		{
			// Set Session
			$this->session->set_userdata('user',array(
                            'user_id'       => $result->id,
                            'username'      => $result->username
                        ));


		 	echo $result = '{"status" : true}';
		}else{
		 	echo $result = '{"status" : false}';
		}
	}

	public function dashboard(){
		if(@$this->session->userdata['user']['user_id']){
			$this->load->view('includes/header');
			$this->load->view('dashboard');
			$this->load->view('includes/footer');
		}else{
			redirect(base_url());
		}
	}

	public function logout(){
		$array_items = array('username' => '', 'user_id' => '');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
