<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function get_branches(){
		return $this->db->get('branches')->result();
	}

	public function login($lg=array()){
		$uname=$lg['username'];
		$pword=$lg['password'];

		$where="username='$uname' and password='$pword'";
		$this->db->where($where);
		if($this->db->count_all_results('users')==1){
			return true;
		}else{
			return false;
		}

	}
}

?>
