<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Common_models extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper("url");
    }
    function generateID()
    {
        $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ' . '0123456789'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';
        foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];
        return $rand;
    }


    public function get_states()
    {
        $query = $this->db->get('states');
        return $query->result();
    }

    public function display_departments()
    {
        $query = $this->db->get('department');
        return $query->result();
    }

    public function get_zones()
    {
        $query = $this->db->get('zones');
        return $query->result();
    }

    public function get_level()
    {
        $query = $this->db->get('level');
        return $query->result();
    }

    public function update_certificate($user_id)
    {
        $this->db->where('student_id', $user_id);
        $this->db->update('profile_info', array('certificate' => 'yes'));
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
