<?php
	class User_model extends CI_Model{
		public function register($password){
			// User data array
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $password,
                
			);

			$this->load->database();
			return $this->db->insert('users', $data);
		}
	}