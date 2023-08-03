<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Address extends CI_Controller
{
    private $user_info;

    function __construct()
    {
        parent::__construct();

        // Load Models.
        $this->load->model('address_provinces_model');
        $this->load->model('address_districts_model');
        $this->load->model('address_sub_districts_model');
        $this->load->library("Response_library");
    }

    public function get_provinces()
    {
        $code = $this->config->item('RESPONSE_CODE');

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $filter = new stdClass();
            $filter->select = 'id, name_th';
            $data = $this->address_provinces_model->search($filter);
            $result = array();

            foreach ($data as $info) {
                $result[$info->id] = $info->name_th;
            }
            $this->response_library->responseJSON($code['200']['CODE'], $code['200']['MESSAGE'], $result);
        }
    }

    public function get_districts()
    {
        $code = $this->config->item('RESPONSE_CODE');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $param = $this->input->post();

            if (empty($param['address_province_id'])) {
                $this->response_library->responseJSON($code['400']['CODE'], $code['400']['MESSAGE']);
            }

            $filter = new stdClass();
            $filter->select = 'id, name_th';
            $filter->where['province_id'] = $param['address_province_id'];

            $data = $this->address_districts_model->search($filter);
            $result = array();

            foreach ($data as $info) {
                $result[$info->id] = $info->name_th;
            }
            $this->response_library->responseJSON($code['200']['CODE'], $code['200']['MESSAGE'], $result);
        }
        $this->response_library->responseJSON($code['405']['CODE'], $code['405']['MESSAGE']);
    }

    public function get_sub_districts()
    {
        $code = $this->config->item('RESPONSE_CODE');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $param = $this->input->post();

            if (empty($param['address_district_id'])) {
                $this->response_library->responseJSON($code['400']['CODE'], $code['400']['MESSAGE']);
            }

            $filter = new stdClass();
            $filter->select = 'id, name_th';
            $filter->where['districts_id ='] = $param['address_district_id'];

            $data = $this->address_sub_districts_model->search($filter);
            $result = array();

            foreach ($data as $info) {
                $result[$info->id] = $info->name_th;
            }

            $this->response_library->responseJSON($code['200']['CODE'], $code['200']['MESSAGE'], $result);
        }
        $this->response_library->responseJSON($code['405']['CODE'], $code['405']['MESSAGE']);
    }
    public function get_zipcode()
    {
        $code = $this->config->item('RESPONSE_CODE');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $param = $this->input->post();

            if (empty($param['address_subdistrict_id'])) {
                $this->response_library->responseJSON($code['400']['CODE'], $code['400']['MESSAGE']);
            }

            $filter = new stdClass();
            $filter->select = 'id, zip_code';
            $filter->where['id ='] = $param['address_subdistrict_id'];

            $data = $this->address_sub_districts_model->search($filter);
            $result = array();

            foreach ($data as $info) {
                $result[0] = $info->zip_code;
            }

            $this->response_library->responseJSON($code['200']['CODE'], $code['200']['MESSAGE'], $result);
        }
        $this->response_library->responseJSON($code['405']['CODE'], $code['405']['MESSAGE']);
    }
}
