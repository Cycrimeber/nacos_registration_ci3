<?php
class Register_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper("url");
    }

    public function saveData($login_data, $profile_data)
    {
        // $login_query = $this->db->insert(array("login" => $login_data, "profile_info" => $profile_data));
        $login_query = $this->db->insert("login", $login_data);
        $profile_query = $this->db->insert("profile_info", $profile_data);
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