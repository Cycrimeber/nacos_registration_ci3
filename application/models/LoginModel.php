<?php

class LoginModel extends CI_Model
{

    public function verifyUser($email, $password)
    {
        $query = $this->db->get_where('login', array('email' => $email, 'password' => $password));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
}
