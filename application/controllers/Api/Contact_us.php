<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_us extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // Load Models.
        $this->load->model('Contact_us_model');
        $this->load->library("Response_library");
    }

    public function get_data()
    {
        $code = $this->config->item('RESPONSE_CODE');

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $filter = new stdClass();
            $filter->select = 'contact_us_id as id,address,email,tel,mobile_phone,';
            $filter->select .= 'facebook,line,location,created_date';
            $data = $this->Contact_us_model->search($filter);
            $this->response_library->responseJSON($code['200']['CODE'], $code['200']['MESSAGE'], $data);
        }
    }
}
