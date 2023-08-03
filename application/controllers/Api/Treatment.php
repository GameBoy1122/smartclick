<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Treatment extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // Load Models.
        $this->load->model('Treatment_model');
        $this->load->library("Response_library");
    }

    public function get_data()
    {
        $code = $this->config->item('RESPONSE_CODE');

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $filter = new stdClass();
            $filter->select = 'id,image,title_en,title_th,title_ae,description_en,description_th,description_ae,created_date,status';
            $data = $this->Treatment_model->search($filter);
            $this->response_library->responseJSON($code['200']['CODE'], $code['200']['MESSAGE'], $data);
        }
    }
}
