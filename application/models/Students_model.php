<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students_model extends CI_Model {

	// fetch students data from datatbase 
	public function fetch_students(){
		return $this->db->select('*')
		->from('students')
		->join('branches','branches.id = students.branch_id')
		->get()->result();
	}

	// get filtered students 
	public function filtered_students($filter){
		return $this->db->select('*')
		->from('students')
		->where('branch_id',$filter)
		->join('branches','branches.id = students.branch_id')
		->get()->result();
	}

	// check email is used or not 
	public function emailcheck($email){
		$query = $this->db->where('email', $email)->count_all_results('students');
		if($query > 0){
			return true;
		}
		else {
			return false;
		}

	}

	// insert student in database
	public function insertStudent($student){
		return $this->db->insert('students', $student);
	}

	// get student by id 
	public function getStudentById($id){
		$query = $this->db->select('*')->from('students')->where('students.st_id',$id)->join('branches','branches.id = students.branch_id')->get();
		return $query->row();
	}

	// edit/update student values 
	public function editStudent($student){
		return $this->db->where('st_id',$student['st_id'])->update('students', $student);
	}
}

?>
