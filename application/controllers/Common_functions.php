<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Common_functions extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Common_models', 'Profile_Model'));
    }

    public function index()
    {
        redirect('login');
    }


    function generateID()
    {
        $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ' . '0123456789'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';
        foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];
        return $rand;
    }

    function generateCertificate($unid, $firstname, $surname)
    {
        // $user_data = $this->session->userdata('user');
        // $user_profile = $this->Profile_Model->get_user_profile($user_data->id);
        // $unid = $user_data->unique_id;
        // $fullname = $user_profile->firstname . " " . $user_profile->lastname;

        // path to save the image
        $output = "./certificate/images/" . $unid . ".jpg";

        // create image
        $image = imagecreatefromjpeg("./certificate/certificate.jpg");
        $blue = imagecolorallocate($image, 95, 23, 255);

        // change image colors
        $white = imagecolorallocate($image, 255, 255, 255);
        $black = imagecolorallocate($image, 0, 0, 0);
        $font_size1 = 100;
        $font_size2 = 60;
        $font_size3 = 80;
        $rotation = 0;
        $name_x = 500;
        $name_y = 1250;
        $mem_num_x = 1230;
        $mem_num_y = 1510;
        $date_x = 700;
        $date_y = 1700;
        $font = "./certificate/AGENCYR.TTF";
        $name = $firstname . " " . $surname;
        $mem_number = $unid;
        $join_date = date("Y-m-d");

        // Add text to image
        // imagettftext(image,fontsize,rotation,x-axis,y-axis,$color,"font-type",text);
        $name = imagettftext($image, $font_size1, $rotation, $name_x, $name_y, $black, $font, $name);

        $membership_number = imagettftext($image, $font_size2, $rotation, $mem_num_x, $mem_num_y, $black, $font, $mem_number);

        $join_date_txt = imagettftext($image, $font_size3, $rotation, $date_x, $date_y, $black, $font, $join_date);

        imagejpeg($image, $output);
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
