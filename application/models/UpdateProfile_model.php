<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UpdateProfile_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper("url");
    }

    public function updateProfile($user_id, $data)
    {
        $this->db->where('student_id', $user_id);
        $this->db->update('profile_info', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateImage($user_id, $imageData)
    {
        $this->db->where('student_id', $user_id);
        $this->db->update('profile_info', $imageData);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePassword($user_id, $newPassword)
    {
        $this->db->where('id', $user_id);
        $this->db->update('login', $newPassword);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
