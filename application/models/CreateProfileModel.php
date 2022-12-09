<?php
class CreateProfileModel extends CI_Model
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

    public function updateLogin($user_id, $unid)
    {
        $this->db->where('id', $user_id);
        $this->db->update('login', $unid);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}



// public function display_States() {
//     $query = $this->db->get('states');
//     return $query->result();
// }

// public function display_department() {
//     $query = $this->db->get('department');
//     return $query->result();
// }