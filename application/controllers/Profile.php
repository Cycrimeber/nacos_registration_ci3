<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper(array('form'));
        $this->load->model(array('Profile_Model', 'Common_models'));
    }

    public function index()
    {
        if ($this->session->userdata('user')) {
            $user = $this->session->userdata('user');
            $this->profile($user->id);
        } else {
            redirect(base_url());
        }
    }

    public function profile($user_id)
    {
        $data['user_profile'] = $this->Profile_Model->get_user_profile($user_id);
        $data['get_department'] = $this->Common_models->display_departments();
        $data['get_state'] = $this->Common_models->get_states();
        $data['get_level'] = $this->Common_models->get_level();
        $data['get_zone'] = $this->Common_models->get_zones();
        $this->load->view('header', $data);
        $this->load->view('profile', $data);
        $this->load->view('footer');
    }
}
