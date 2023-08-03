<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // Load Models.
        $this->load->model('Bannermain_model');
        $this->load->library("Response_library");
    }

    public function get_data()
    {
        $code = $this->config->item('RESPONSE_CODE');

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $filter = new stdClass();
            $filter->select = 'bannermain_id as id,image,created_date,status';
            $filter->where['status ='] = 'ACTIVATE';
            $data = $this->Bannermain_model->search($filter);
            $this->response_library->responseJSON($code['200']['CODE'], $code['200']['MESSAGE'], $data);
        }
    }
}
