<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_Model');
        // $this->load->library(array('password'));
    }

    public function index()
    {
        $this->load->view('register_view');

        if (isset($_POST['register_member'])) {
            $this->register_member();
        }
    }

    public function register_member()
    {
        $results['success'] = '';
        $results['failure'] = '';

        $this->form_validation->set_rules("fname", "Firstname", "trim|required");
        $this->form_validation->set_rules("lname", "Surname", "trim|required");
        // $this->form_validation->set_rules("uname", "Username", "trim|required|min_length[3]");
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
        $this->form_validation->set_rules("password", "Password", "trim|required|min_length[6]|max_length[20]");
        $this->form_validation->set_rules("cpassword", "Confirm Password", "trim|required|min_length[6]|max_length[20]|matches[password]");

        if ($this->form_validation->run() === TRUE) {
            $password = $this->input->post('password', TRUE);
            // $hash = $this->password->hash($password);
            $login_data = array(
                'email' => $this->input->post('email', TRUE),
                'password' => $password,
            );
            $profile_data = array(
                'firstname' => $this->input->post('fname', TRUE),
                'lastname' => $this->input->post('lname', TRUE),
                'email' => $this->input->post('email', TRUE),
            );

            $response = $this->Register_Model->saveData($login_data, $profile_data);
            if ($response === true) {
                // $results['success'] = 'Registration successfully.';
                echo "<script>alert('Registration Successful');</script>";
                redirect(base_url('Login'));
            } else {
                // $results['failure'] = 'Registration failed. Please try again';
                echo "<script>alert('Registration failed');</script>";
                redirect(uri_string());
            }
        }
    }
}
