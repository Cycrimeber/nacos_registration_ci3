<?php
defined('BASEPATH') or exit('No direct script access allowed');

class generateCertificate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('CreateProfileModel', 'Common_models', 'Profile_Model'));
        $this->load->library(array(''));
    }


    public function index()
    {
        $this->generateCertificate();
    }



    function generateCertificate()
    {
        $user_data = $this->session->userdata('user');
        $user_profile = $this->Profile_Model->get_user_profile($user_data->id);
        $unid = $user_data->unique_id;
        $fullname = $user_profile->firstname . " " . $user_profile->lastname;

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
        $name = ucwords($fullname);
        $mem_number = $unid;
        $join_date = date("Y-m-d");

        // Add text to image
        // imagettftext(image,fontsize,rotation,x-axis,y-axis,$color,"font-type",text);
        $name = imagettftext($image, $font_size1, $rotation, $name_x, $name_y, $black, $font, $name);

        $membership_number = imagettftext($image, $font_size2, $rotation, $mem_num_x, $mem_num_y, $black, $font, $mem_number);

        $join_date_txt = imagettftext($image, $font_size3, $rotation, $date_x, $date_y, $black, $font, $join_date);

        imagejpeg($image, $output);

        // change the status of the certificate from no to yes to control the generate Certificate element on the page. This will prevent every user from generating a certificate multiple times
        $update_certificate_status = $this->Common_models->update_certificate($user_data->id);
        if ($update_certificate_status) {
            redirect('welcome');
        } else {
            redirect(uri_string());
        }
    }
}
