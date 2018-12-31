<?php 

	/**
	 * Handling User data
	 */
	class User extends CI_Model
	{
		
		function __construct()
		{
			$this->load->database();
		}

		public function register($pwd)
		{
			//Preparing data for the user
			$data = array(
				'fname' => $this->input->post('fname'), 
				'lname' => $this->input->post('lname'), 
				'reg_no' => $this->input->post('regno'), 
				'username' => $this->input->post('uid'), 
				'email' => $this->input->post('email'), 
				'password' => $pwd
			);

			//Adding the user
			return $this->db->insert('users', $data);
		}

		public function update($regno, $image)
		{
			$data = array(
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'email' => $this->input->post('email'),
				'profilepic' => $image,
				'residence' => $this->input->post('residence'),
				'contact' => $this->input->post('contact'),
				'username' => $this->input->post('uid')
			);

			$this->db->where('reg_no', $regno);
			return $this->db->update('users', $data);
		}

		public function username_exists($value)
		{
			$query = $this->db->query("SELECT * FROM users WHERE username = '$value'");

			if ($query->num_rows() > 0) return false;
			else return true;
			
		}

		public function reg_no_exists($value)
		{
			$query = $this->db->query("SELECT * FROM users WHERE reg_no = '$value'");

			if ($query->num_rows() > 0) return false;
			else return true;
			
		}

		public function email_exists($value)
		{
			$query = $this->db->query("SELECT * FROM users WHERE email = '$value'");

			if ($query->num_rows() > 0) return false;
			else return true;
			
		}

		public function login($username, $password)
		{
			$sql = "SELECT id, username, CONCAT(fname, ' ', lname) AS 'name', reg_no, profilepic AS image FROM users WHERE username = '$username' AND password = '$password'";
			$query = $this->db->query($sql);

			return $query->row();
		}
	}