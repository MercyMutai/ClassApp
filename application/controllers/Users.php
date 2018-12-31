<?php

class Users extends CI_Controller{

    public function index()
    {
        $data['title'] = 'Login';

        $this->form_validation->set_rules('uid', 'Username', 'required');
        $this->form_validation->set_rules('pwd', 'Password', 'required');

        if(!$this->form_validation->run()){
            $this->load->view('templates/header');
            $this->load->view('users/index', $data);
            $this->load->view('templates/footer');            
        }else{
            //Getting the username
            $username = $this->input->post('uid');
            //Getting and hashing the pwd
            $password = md5($this->input->post('pwd'));

            $userdetails = $this->user->login($username, $password);

            if($userdetails){
                //Create session
                $data = array(
                    'id' => $userdetails->id,
                    'uid' => $userdetails->username,
                    'name' => $userdetails->name,
                    'image' => $userdetails->image,
                    'regno' => $userdetails->reg_no,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($data);

                //set Success Message message
                $this->session->set_flashdata('success_msg', 'You are now logged in');
                redirect('index.php');
            }else{
                //Set Error message
                $this->session->set_flashdata('error_msg', 'Wrong login credentials');
                redirect('index.php/user');

            }

        }

    }

    public function logout()
    {
        //Unsetting user data
        $keys = array('id', 'uid', 'name' ,'regno', 'logged_in');
        $this->session->unset_userdata($keys);

        //Setting message and redirecting
        $this->session->set_flashdata('success_msg', 'You are now logged out');
        redirect('index.php');
    }

    public function register()
    {
        $data['title'] = 'Register';

        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('regno', 'Registration Number', 'required|callback_check_regno_exists');
        $this->form_validation->set_rules('uid', 'Username', 'required|callback_check_uid_exists');
        $this->form_validation->set_rules('email', 'Email Address', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('pwd', 'Password', 'required');
        $this->form_validation->set_rules('cpwd', 'Confirm Password', 'matches[pwd]');

        if(!$this->form_validation->run()){
            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');  
        }else{
            //Encrypt password
            $encrypted_pwd = md5($this->input->post('pwd'));

            if($this->user->register($encrypted_pwd)){
                $this->session->set_flashdata('success_msg', 'You are now registered you can log in');
                redirect('index.php');
            }
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';

        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('uid', 'Username', 'required');

        if(!$this->form_validation->run()){
            $this->load->view('templates/header.php');
            $this->load->view('users/edit.php', $data);
            $this->load->view('templates/footer.php');
        }else{
            $regno = $this->session->userdata('regno');

            //Upload file configurations
            $config['upload_path']          = './assets/images/avatars';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            $image = 'avatar.png';

            if (!$this->upload->do_upload('pic')) {
                var_dump($this->upload->display_errors());
                die();
            }else{
                $image = $_FILES['pic']['name'];
            }
            if($this->user->update($regno, $image)){
                $this->session->set_flashdata('success_msg', 'Account Updated');
            }else{
                $this->session->set_flashdata('error_msg', 'Update Failed');
            }

            redirect('index.php/user/edit');
        }

    }

    //Utility functions

    public function check_regno_exists($value)
    {
        $this->form_validation->set_message('check_regno_exists', 'Registration number already taken');
        return $this->user->reg_no_exists($value);
    }


    public function check_uid_exists($value)
    {
        $this->form_validation->set_message('check_uid_exists', 'Username already taken');
        return $this->user->username_exists($value);
    }

    public function check_email_exists($value)
    {
        $this->form_validation->set_message('check_email_exists', 'Email already taken');
        return $this->user->email_exists($value);
    }

}