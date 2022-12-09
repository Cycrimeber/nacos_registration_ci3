<?php
class Profile_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper("url");
    }

    public function index()
    {
    }

    public function get_user_profile($user_id)
    {
        $query = $this->db->get_where('profile_info', array('student_id' => $user_id));
        if ($query->num_rows() > 0) {
            return $query->row();
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
