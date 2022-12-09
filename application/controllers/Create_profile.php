<?php
defined('BASEPATH') or exit('No direct script access allowed');
// include_once(dirname(__FILE__) . "/GenerateCertificate.php");

class Create_profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('CreateProfileModel', 'Common_models', 'Profile_Model', 'UpdateProfile_model'));
        // $this->load->library(array('password'));
    }

    public function index()
    {
        if ($this->session->userdata('user')) {
            $user_id = $this->session->user->id;
            if ($this->session->user->unique_id == "") {
                $results['user_profile'] = $this->Profile_Model->get_user_profile($user_id);
                $results['department'] = $this->Common_models->display_departments();
                $results['states'] =  $this->Common_models->get_states();
                $results['zones'] = $this->Common_models->get_zones();
                $results['level'] = $this->Common_models->get_level();
                $this->load->view('header', $results);
                $this->load->view('create_profile', $results);
                $this->load->view('footer');
            } else {
                redirect(base_url('profile'));
            }
        } else {
            redirect(base_url());
        }
    }

    public function create_profile()
    {
        $user_id = $this->session->user->id;

        // $user_id = $this->user_id;
        $results['success'] = '';
        $results['failure'] = '';
        // if ($this->input->post('save')) {
        $this->form_validation->set_rules("zone", "Zone", "trim|required");
        $this->form_validation->set_rules("state", "State", "trim|required");
        $this->form_validation->set_rules("school", "School Name", "trim|required");
        $this->form_validation->set_rules("level", "Level", "trim|required");
        $this->form_validation->set_rules("department", "Department", "trim|required");
        $this->form_validation->set_rules("mobile", "Phone Number", "required|exact_length[11]|numeric");

        if ($this->form_validation->run() === TRUE) {
            $unid = $this->Common_models->generateID();

            // $ori_filename = $_FILES['profile_photo']['name'];
            $new_name =  $unid;
            $config['upload_path'] = './uploads/profile/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']      = '200';
            $config['max_width']     = '1024';
            $config['max_height']    = '768';
            $config['file_name'] = $new_name;
            // $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('profile_photo')) {
                $results['imageError'] = array('imageError', $this->upload->display_errors());
                $results['user_profile'] = $this->Profile_Model->get_user_profile($user_id);
                $results['department'] = $this->Common_models->display_departments();
                $results['states'] =  $this->Common_models->get_states();
                $results['zones'] = $this->Common_models->get_zones();
                $results['level'] = $this->Common_models->get_level();
                $results['failure'] = 'Unable to upload user profile pix';
                $this->load->view("header", $results);
                $this->load->view('create_profile', $results);
                $this->load->view("footer");
            } else {
                $profile_filename = $this->upload->data('file_name');

                $profileData = array(
                    'zone' => $this->input->post('zone', TRUE),
                    'state' => $this->input->post('state', TRUE),
                    'school' => $this->input->post('school', TRUE),
                    'level' => $this->input->post('level', TRUE),
                    'department' => $this->input->post('department', TRUE),
                    'mobile' => $this->input->post('mobile', TRUE),
                    'photo' => $profile_filename,
                    'unique_id' => $unid,
                );
                $loginData = array(
                    'unique_id' => $unid,
                );

                $profileResponse = $this->CreateProfileModel->updateProfile($user_id, $profileData);
                if ($profileResponse === true) {
                    $loginResponse = $this->CreateProfileModel->updateLogin($user_id, $loginData);
                    if ($loginResponse === true) {
                        $user = $this->Profile_Model->get_user_profile($user_id);
                        $firstname = $user->firstname;
                        $surname = $user->lastname;
                        // $this->Common_functions->generateCertificate($unid, $firstname, $surname);
                        $results['success'] = 'User Data Updated successfully.';
                        redirect(base_url('profile'));
                    }
                } else {
                    $results['failure'] = 'Unable to create user';
                    return false;
                }
            }
        } else {
            $results['user_profile'] = $this->Profile_Model->get_user_profile($user_id);
            $results['failure'] = 'Form validation failed';
            $results['department'] = $this->Common_models->display_departments();
            $results['states'] =  $this->Common_models->get_states();
            $results['zones'] = $this->Common_models->get_zones();
            $results['level'] = $this->Common_models->get_level();
            $this->load->view("header", $results);
            $this->load->view('create_profile', $results);
            $this->load->view("footer");
        }
    }
}
