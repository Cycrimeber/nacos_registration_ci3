<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Update_profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('');
        $this->load->model(array('Profile_Model', 'Common_models', 'UpdateProfile_model'));
        $this->load->helper('form');
    }

    // Edit and update profile
    public function edit($user_id)
    {
        $results = array(
            'user_profile' => $this->Profile_Model->get_user_profile($user_id),
            'department' => $this->Common_models->display_departments(),
            'states' => $this->Common_models->get_states(),
            'zones' => $this->Common_models->get_zones(),
            'level' => $this->Common_models->get_level(),
        );
        $this->load->view("header", $results);
        $this->load->view('update_profile', $results);
        $this->load->view("footer");
    }

    public function update_profile($user_id)
    {
        $this->form_validation->set_rules("firstname", "Firstname", "trim|required");
        $this->form_validation->set_rules("surname", "Surname", "trim|required");
        $this->form_validation->set_rules("school", "School Name", "trim|required");
        $this->form_validation->set_rules("mobile", "Phone Number", "exact_length[11]|numeric");

        if ($this->form_validation->run()) {
            // hidden field bearing old image name
            $old_imageName = $this->input->post('old_image_name');
            $new_imageName = $_FILES['profile_photo_update']['name'];

            // check if new image is uploaded
            if ($new_imageName == TRUE) {
                $unid = $this->session->user->unique_id;
                // get file extension
                $ext = explode('/', $_FILES['profile_photo_update']['type']);

                $update_filename = time() . "-" . $unid . "." . $ext[1];

                $config = [
                    'upload_path' => './uploads/profile/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'file_name' => $update_filename,
                ];
                // $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('profile_photo_update')) {
                    if (file_exists("./uploads/profile/" . $old_imageName)) {
                        unlink('./uploads/profile/' . $old_imageName);
                    }
                    $update_filename = $this->upload->data('file_name');
                }
            } else {
                $update_filename = $old_imageName;
            }
            $profileData = array(
                'firstname' => $this->input->post('firstname', TRUE),
                'lastname' => $this->input->post('surname', TRUE),
                'zone' => $this->input->post('zone', TRUE),
                'state' => $this->input->post('state', TRUE),
                'school' => $this->input->post('school', TRUE),
                'level' => $this->input->post('level', TRUE),
                'department' => $this->input->post('department', TRUE),
                'mobile' => $this->input->post('mobile', TRUE),
                'photo' => $update_filename,
            );
            $user = new UpdateProfile_model;
            $res = $user->updateProfile($user_id, $profileData);
            $this->session->set_flashdata('status', 'Profile updated successfully!');
            redirect(base_url('edit_profile/' . $user_id));
        } else {
            return $this->edit($user_id);
        }
    }

    // Edit and Update Pssword

    public function edit_password($user_id)
    {
        $results = array(
            'user_profile' => $this->Profile_Model->get_user_profile($user_id),
            'department' => $this->Common_models->display_departments(),
            'states' => $this->Common_models->get_states(),
            'zones' => $this->Common_models->get_zones(),
            'level' => $this->Common_models->get_level(),
        );
        $this->load->view("header", $results);
        $this->load->view('update_password', $results);
        $this->load->view("footer");
    }

    public function updatePassword($user_id)
    {
        // $user_id =  $this->session->user->id;
        $user_password = $this->session->user->password;

        if (isset($_POST['update_password'])) {
            $results['message'] = '';
            $this->form_validation->set_rules("old_password", "Current Password", "trim|required|min_length[6]|max_length[20]");
            $this->form_validation->set_rules("new_password", "Password", "trim|required|min_length[6]|max_length[20]");
            $this->form_validation->set_rules("new_cpassword", "Confirm New Password", "trim|required|min_length[6]|max_length[20]|matches[new_password]");

            if ($this->form_validation->run() === TRUE) {
                $old_password = $this->input->post('old_password', TRUE);
                $new_password = $this->input->post('new_password', TRUE);
                $cfmNew_password = $this->input->post('new_cpassword', TRUE);
                if ($old_password == $user_password) {
                    $data = array(
                        'password' => $new_password,
                    );
                    $response = $this->UpdateProfile_model->updatePassword($user_id, $data);
                    if ($response === true) {
                        // echo "<script>alert('Password updated successfully!');</script>";
                        $this->session->set_flashdata('status', 'Password updated successfully!');
                        redirect(base_url('edit_password/' . $user_id));
                    } else {
                        $results['message'] = 'Unable to update password. Please try again!';
                        $results['user_profile'] = $this->Profile_Model->get_user_profile($user_id);
                        $this->load->view("header", $results);
                        $this->load->view('update_password', $results);
                        $this->load->view("footer");
                    }
                } else {
                    $results['message'] = 'Incorrent password entered!';
                    $results['user_profile'] = $this->Profile_Model->get_user_profile($user_id);
                    $this->load->view("header", $results);
                    $this->load->view('update_password', $results);
                    $this->load->view("footer");
                }
            } else {
                echo "validation failed";
            }
        }
        $results['user_profile'] = $this->Profile_Model->get_user_profile($user_id);
        $this->load->view("header", $results);
        $this->load->view('update_password', $results);
        $this->load->view("footer");
    }
}
