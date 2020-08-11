<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	/**
	 * Students Page for this controller.
	 */

	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');//user model
		$this->load->model('Students_model');// students model
		$this->load->helper('url');
	}

	public function update($id){
		$data['student'] = $this->Students_model->getStudentById($id);
		$data['branches'] = $this->User_model->get_branches();
		$data['title'] = 'Edit Student';
		$this->load->view('header',$data);
		$this->load->view('student_edit',$data);
		$this->load->view('footer');
	}

	public function add(){
		$data['branches'] = $this->User_model->get_branches();
		$data['title'] = 'Add Student';
		$this->load->view('header',$data);
		$this->load->view('student_add',$data);
		$this->load->view('footer');

	}

	public function view($id){
		$data['student'] = $this->Students_model->getStudentById($id);
		$data['title'] = 'View Student';
		$this->load->view('header',$data);
		$this->load->view('student_view',$data);
		$this->load->view('footer');
	}

	public function insertStudent() {
		$data = $this->input->post();
		$email = $this->Students_model->emailcheck($data['email']);
		if($email){
			$data['branches'] = $this->User_model->get_branches();
			$data['error'] = 'email already exists';
			$this->load->view('student_add',$data);
		}
		else {
			$insert = $this->Students_model->insertStudent($data);
			redirect('home');
		}
		
	}

	public function editStudent(){
		$data = $this->input->post();
		$insert = $this->Students_model->editStudent($data);
		redirect('home');
		exit();
	}
}
