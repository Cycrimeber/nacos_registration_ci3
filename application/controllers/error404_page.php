<?php

class Error404_page extends CI_Controller
{
    public function index()
    {
        $this->load->view('error404');
    }
}
