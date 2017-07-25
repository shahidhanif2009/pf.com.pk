<?php

Class User_Login extends CI_Model{
	

	//use insert fuc to data insert in db
	public function insert($data)
	{

		//check wether username etc exists or not
				$check = "user_name =" . "'" . $data['user_name'] . "'";
				$this->db->select('*');
				$this->db->from('user_login');
				$this->db->where($check);
				$this->db->limit(1);
				//check if it has only one 
				$query = $this->db->get();



	if($query->num_rows() == 0)
	{
		$this->db->insert('user_login', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
			}
	}
	else 
		return false;//already exists


	}



	public function login($data) {

			$condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
			$this->db->select('*');
			$this->db->from('user_login');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

		if ($query->num_rows() == 1) {

			///if one and only one row exists
		return true;
		}

		 else
			return false;
		
			}


public function read_user_info($username) {

			$check = "user_name =" . "'" . $username . "'";
			$this->db->select('*');
			$this->db->from('user_login');
			$this->db->where($check);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
			return $query->result();
			} 

			else
					return false;
			}

}






?>