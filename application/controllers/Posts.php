<?php 

	/**
	 * Posts controller
	 */
	class Posts extends CI_Controller
	{

		public function index()
		{
			$data['title'] = 'Latest Posts';
			$data['posts'] = $this->post->get_posts();
			
			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug)
		{
			$data['post'] = $this->post->get_posts($slug);

			$this->load->view('templates/header');
			$this->load->view('posts/single', $data);
			$this->load->view('templates/footer');
		}

		public function create($value='')
		{
			$data['title'] = 'Create Post';

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if (!$this->form_validation->run()) {
				$this->load->view('templates/header');
				$this->load->view('posts/create', $data);
				$this->load->view('templates/footer');
			}else{
				$letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890_';
				$slug = substr(str_shuffle($letters), 0, 5);

				if($this->post->add_post($slug)){
					$this->session->set_flashdata('success_msg', 'Post added');
					redirect('index.php/posts');
				}else{
					$this->session->set_flashdata('error_msg', 'Operation Failed');
					redirect('index.php/post/create');
				}
			}

		}

		public function edit($slug)
		{
			$data['title'] = 'Edit Post';

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if (!$this->form_validation->run()) {
				$data['post'] = $this->post->get_posts($slug);

				$this->load->view('templates/header');
				$this->load->view('posts/edit', $data);
				$this->load->view('templates/footer');
			}else{

				if($this->post->edit_post($slug)){
					$this->session->set_flashdata('success_msg', 'Post Updated');
					redirect('index.php/posts');
				}else{
					$this->session->set_flashdata('error_msg', 'Operation Failed');
					redirect('index.php/post/create');
				}
			}

		}

		public function delete($slug)
		{
			if ($this->post->delete($slug)) {
				$this->session->set_flashdata('success_msg', 'Post Deleted');
				redirect('index.php/posts');
			} else {
				$this->session->set_flashdata('error_msg', 'Post Deletion Failed');
				redirect('index.php/post/'.$slug);
			}
			
		}

	}