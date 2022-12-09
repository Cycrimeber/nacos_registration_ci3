<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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
			$user_id = $this->session->user;
			$this->welcome($user_id->id);
		} else {
			redirect('login');
		}
	}

	public function welcome($user_id)
	{
		$data['user_profile'] = $this->Profile_Model->get_user_profile($user_id);
		$data['get_department'] = $this->Common_models->display_departments();
		$data['get_state'] = $this->Common_models->get_states();
		$data['get_level'] = $this->Common_models->get_level();
		$data['get_zone'] = $this->Common_models->get_zones();
		$this->load->view('header', $data);
		$this->load->view('welcome', $data);
		$this->load->view('footer');
	}
}
