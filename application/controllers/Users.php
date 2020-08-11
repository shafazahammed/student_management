<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 * User Page for this controller.
	 */

	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper('url');
	}

	public function logout(){
		$this->session->set_userdata('isloggedin', false);
		$this->session->set_userdata('loguserid');
		$this->session->sess_destroy();
		redirect('login');
	}

	public function login(){
		$data=array();
		if ($this->input->post('login')) {
			$this->form_validation->set_rules('username', 'User name', 'required');
			$this->form_validation->set_rules('password','Password', 'required');
			$login_data=array(
				'username'=>$this->input->post('username'), 
				'password'=>md5($this->input->post('password'))
			);
			if ($this->form_validation->run()==true) {
				$log=$this->User_model->login($login_data);
				echo $log;
				if($log){
					$this->session->set_userdata('isloggedin', true);
					redirect('home');

				}else{
					$data['error_msg']='invalid username or password';
				}
			}
		}
		$this->load->view('login', $data);
	}
	
}
