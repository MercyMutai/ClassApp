<?php 

	/**
	 * Post model
	 */
	class Post extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();
		}

		public function get_posts($slug=FALSE)
		{
			if(!$slug){
				$this->db->order_by('id', 'DESC');
				$query = $this->db->get('posts');
				return $query->result();
			}
			$query = $this->db->get_where('posts', array('slug' => $slug));
			return $query->row();
		}

		public function add_post($slug)
		{
			$data = array(
				'slug' => $slug,
				'user_id' => $this->session->userdata('id'),
				'title' => $this->input->post('title'), 
				'body' => $this->input->post('body')
			);

			return $this->db->insert('posts', $data);
		}

		public function delete($slug)
		{
			$this->db->where('slug', $slug);
			return $this->db->delete('posts');
		}

		public function edit_post($slug)
		{
			$letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890_';
			$new_slug = substr(str_shuffle($letters), 0, 5);

			$data = array(
				'slug' => $new_slug,
				'user_id' => $this->session->userdata('id'),
				'title' => $this->input->post('title'), 
				'body' => $this->input->post('body')
			);
			$this->db->where('slug', $slug);
			return $this->db->update('posts', $data);
		}

	}