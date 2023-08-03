<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ourservices extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // Load Models.
        $this->load->model('Ourservices_model');
        $this->load->library("Response_library");
    }

    public function get_data()
    {
        $code = $this->config->item('RESPONSE_CODE');

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $filter = new stdClass();
            $filter->select = 'id,image,title_en,title_th,title_ae,description_en,description_th,description_ae,created_date,status';
            $data = $this->Ourservices_model->search($filter);
            $this->response_library->responseJSON($code['200']['CODE'], $code['200']['MESSAGE'], $data);
        }
    }
    public function get_datadetails()
    {
        $code = $this->config->item('RESPONSE_CODE');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $param = $this->input->post();
            if (empty($param['id'])) {
                $this->response_library->responseJSON($code['400']['CODE'], $code['400']['MESSAGE']);
            }
            $filter = new stdClass();
            $filter->select = 'id,image,title_en,title_th,title_ae,description_en,description_th,description_ae,created_date,status';
            $filter->get_first = true;
            $filter->where['id'] = $param['id'];
            $data = $this->Ourservices_model->search($filter);
            $this->response_library->responseJSON($code['200']['CODE'], $code['200']['MESSAGE'], $data);
        }
        $this->response_library->responseJSON($code['405']['CODE'], $code['405']['MESSAGE']);
    }
}
