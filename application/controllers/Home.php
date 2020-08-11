<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */

	public function __construct(){
		parent::__construct();
		$this->load->model('Students_model');
		$this->load->model('User_model');
		$this->load->helper('url');
		$this->load->library('session');;

	}

	public function index()
	{
		if ($this->session->userdata('isloggedin')) {

			if($this->input->post('apply')&&$this->input->post('filter')!=""){
				$filter = $this->input->post('filter');
				$data['students']=$this->Students_model->filtered_students($filter);
			}
			else {
				$data['students']=$this->Students_model->fetch_students();
			}
			$data['branches'] = $this->User_model->get_branches();
			$data['title']= 'Home';

			$this->load->view('header',$data);
			$this->load->view('home',$data);
			$this->load->view('footer');
		}
		else{
			$data['title']= 'Login';

			$this->load->view('header',$data);
			$this->load->view('login');
			$this->load->view('footer');
		}
	}

}
