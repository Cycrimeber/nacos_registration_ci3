<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
        // $this->load->library(array('password'));
    }

    public function index()
    {
        // restrict users to go back to login if session has been set
        if ($this->session->userdata('user')) {
            $user = $this->session->user;
            if ($user->unique_id == '') {
                redirect('create_profile');
            } else {
                redirect('profile');
            }
        } else {
            $this->login();
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $msg['login_msg'] = "";

        if ($this->form_validation->run() == FALSE) {
            $msg['login_msg'] = "Validation failed. Please try again";
            $this->load->view('login', $msg);
        } else {

            $email = $this->input->post('email');
            $password = $this->input->post('password');
            // $password_verify = $this->password->verify($password);
            $user = $this->LoginModel->verifyUser($email, $password);

            if ($user == true) {
                $msg['login_msg'] = 'Login successful';
                $this->session->set_userdata('user', $user);
                redirect(uri_string());
            } else {
                $msg['login_msg'] = 'Login failed! Enter a valid user details or click the create account to register   ';
                $this->load->view('login', $msg);
            }
        }
    }
}
