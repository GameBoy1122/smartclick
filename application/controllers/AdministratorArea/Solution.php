<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Solution extends CI_Controller

{

    function __construct()

    {

        parent::__construct();
    }



    /** ------------------------------------------------------- **

     **           MANDATORY SCRIPT

    /** ------------------------------------------------------- **/

    public function index()

    {

        $this->load->model("Solution_model");



        $page = new stdClass();

        $page->get_first = true;

        $page = $this->Solution_model->search($page);



        $this->load->view("AdministratorArea/Solution/Index", compact("page"));
    }

    public function edit($Solution_id = null)

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

		/** ------------------------------------------------------- **/

        $this->load->model("Solution_model");
        $this->load->library("encryption_library");
        $this->load->library("response_library");
        $this->load->library("guid_library");

        $Solutions = $this->Solution_model->search();


        /** ------------------------------------------------------- **

         **           POST PHASE

		/** ------------------------------------------------------- **/

        if ($this->input->post()) {

            if ($Solution_id != null) {

                $Solution = $this->Solution_model->find($Solution_id);

                $Solution->modified_date = date("Y-m-d h:i:s");

                $Solution->modified_by = $this->session->userdata("__administrator::administrator_id");
            } else {

                $Solution = new stdClass();

                $Solution->created_date = date("Y-m-d h:i:s");

                $Solution->created_by = $this->session->userdata("__administrator::administrator_id");
            }



            $Solution->status = $this->input->post("status");
            $Solution->solution_category_id = $this->input->post("Category");
            $Solution->title_en = $this->input->post("title_en");
            $Solution->title_th = $this->input->post("title_th");
            $Solution->short_description_en = $this->input->post("short_description_en");
            $Solution->short_description_th = $this->input->post("short_description_th");
            $Solution->description_en = $this->input->post("description_en");
            $Solution->description_th = $this->input->post("description_th");
            // echo '<pre>';
            // print_r($this->input->post("Category"));
            // exit();

            if ($_FILES['image']['size']['th'] > 0) {
                $_FILES['upload_file']['name'] = $_FILES['image']['name']['th'];

                $_FILES['upload_file']['type'] = $_FILES['image']['type']['th'];

                $_FILES['upload_file']['tmp_name'] = $_FILES['image']['tmp_name']['th'];

                $_FILES['upload_file']['error'] = $_FILES['image']['error']['th'];

                $_FILES['upload_file']['size'] = $_FILES['image']['size']['th'];

                $fileName = date("YmdHis") . "_" . $this->guid_library->generate();

                $config['file_name'] = $fileName;

                $config['upload_path'] = FCPATH . '/assets/uploads/Solution/thumbnail/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $config['max_size'] = '0';

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                $uploadCheck = $this->upload->do_upload("upload_file");

                $upload_data = $this->upload->data();

                $file_name = $upload_data['file_name'];



                $Solution->image = '/assets/uploads/Solution/thumbnail/' . $file_name;
            }

            if ($_FILES['icon']['size']['th'] > 0) {
                $_FILES['upload_file']['name'] = $_FILES['icon']['name']['th'];

                $_FILES['upload_file']['type'] = $_FILES['icon']['type']['th'];

                $_FILES['upload_file']['tmp_name'] = $_FILES['icon']['tmp_name']['th'];

                $_FILES['upload_file']['error'] = $_FILES['icon']['error']['th'];

                $_FILES['upload_file']['size'] = $_FILES['icon']['size']['th'];

                $fileName_icon = date("YmdHis") . "_" . $this->guid_library->generate();

                $config['file_name'] = $fileName_icon;

                $config['upload_path'] = FCPATH . '/assets/uploads/Solution/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $config['max_size'] = '0';

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                $uploadCheck = $this->upload->do_upload("upload_file");

                $upload_data = $this->upload->data();

                $file_name = $upload_data['file_name'];



                $Solution->icon = '/assets/uploads/Solution/' . $file_name;
            }

            $Solution_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

            if ($Solution_validated["code"] == "0x0000-00000") {

                $Solution_id = $this->Solution_model->save($Solution);
                $this->response_library->responseJSON($Solution_validated["code"], $Solution_validated["message"]);
            } else {

                $this->response_library->responseJSON($Solution_validated["code"], $Solution_validated["message"]);
            }
        }



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

		/** ------------------------------------------------------- **/

        $Solution = $this->Solution_model->find($Solution_id);





        /** ------------------------------------------------------- **

         **           RENDER VIEW PHASE

		/** ------------------------------------------------------- **/

        $data = array(

            "Solution" => $Solution

        );

        $this->load->view("AdministratorArea/Solution/Edit", $data);
    }



    public function delete($Solution_id = null)

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

        /** ------------------------------------------------------- **/

        $this->load->model("Solution_model");



        $this->load->library("response_library");



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

        /** ------------------------------------------------------- **/

        $Solution = $this->Solution_model->find($Solution_id);

        $Solution->modified_date = date("Y-m-d h:i:s");

        $Solution->modified_by = $this->session->userdata("__administrator::administrator_id");

        $Solution->status = "REMOVED";



        $Solution_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

        if ($Solution_validated["code"] == "0x0000-00000") {

            $this->Solution_model->save($Solution);



            $this->response_library->responseJSON($Solution_validated["code"], $Solution_validated["message"]);
        } else {

            $this->response_library->responseJSON($Solution_validated["code"], $Solution_validated["message"]);
        }
    }



    /** ------------------------------------------------------- **

     **           ADDITIONAL SCRIPT

    /** ------------------------------------------------------- **/

    public function datatables()

    {



        $this->load->library("datatables_library");

        $this->load->model("Solution_model");



        $model_filter = new stdClass();

        $model_filter->custom_where = "status IN ('ACTIVATE','SUSPEND')";

        $Solution = $this->Solution_model->search($model_filter);



        print_r(json_encode($Solution));
    }



    public function sort()

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

        /** ------------------------------------------------------- **/

        $this->load->model("banner_model");



        $this->load->library("response_library");

        $this->load->library("guid_library");



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

        /** ------------------------------------------------------- **/

        $slide_orders = $this->input->post("sort_row");



        foreach ($slide_orders as $order => $banner_id) {

            $sortable = $this->banner_model->find($banner_id);

            $sortable->sort = $order + 1;

            $sortable->status = "ACTIVATE";

            $sortable->modified_date = date("Y-m-d H:i:s");

            $sortable->modified_by = $this->session->userdata("__administrator::administrator_id");



            $this->banner_model->save($sortable);
        }



        $this->response_library->responseJSON("0x0000-00000", "Process request Complete.");
    }
}
