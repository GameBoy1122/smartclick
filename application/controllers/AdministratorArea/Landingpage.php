<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Landingpage extends CI_Controller

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

        $this->load->model("Landingpage_model");



        $page = new stdClass();

        $page->get_first = true;

        $page = $this->Landingpage_model->search($page);



        $this->load->view("AdministratorArea/Landingpage/Index", compact("page"));
    }

    public function edit($Landingpage_id = null)

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

		/** ------------------------------------------------------- **/

        $this->load->model("Landingpage_model");
        $this->load->library("encryption_library");
        $this->load->library("response_library");
        $this->load->library("guid_library");

        $Landingpages = $this->Landingpage_model->search();


        /** ------------------------------------------------------- **

         **           POST PHASE

		/** ------------------------------------------------------- **/

        if ($this->input->post()) {

            if ($Landingpage_id != null) {

                $Landingpage = $this->Landingpage_model->find($Landingpage_id);

                $Landingpage->modified_date = date("Y-m-d h:i:s");

                $Landingpage->modified_by = $this->session->userdata("__administrator::administrator_id");
            } else {

                $Landingpage = new stdClass();

                $Landingpage->created_date = date("Y-m-d h:i:s");

                $Landingpage->created_by = $this->session->userdata("__administrator::administrator_id");
            }



            $Landingpage->status = $this->input->post("status");

            $Landingpage->title = $this->input->post("title");
            

            $Landingpage->description = $this->input->post("description");
            




            if ($_FILES['image']['size']['th'] > 0) {
                $_FILES['upload_file']['name'] = $_FILES['image']['name']['th'];

                $_FILES['upload_file']['type'] = $_FILES['image']['type']['th'];

                $_FILES['upload_file']['tmp_name'] = $_FILES['image']['tmp_name']['th'];

                $_FILES['upload_file']['error'] = $_FILES['image']['error']['th'];

                $_FILES['upload_file']['size'] = $_FILES['image']['size']['th'];

                $fileName = date("YmdHis") . "_" . $this->guid_library->generate();

                $config['file_name'] = $fileName;

                $config['upload_path'] = FCPATH . '/assets/uploads/Landingpage/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $config['max_size'] = '0';

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                $uploadCheck = $this->upload->do_upload("upload_file");

                $upload_data = $this->upload->data();

                $file_name = $upload_data['file_name'];



                $Landingpage->image = '/assets/uploads/Landingpage/' . $file_name;
            }

            $Landingpage_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

            if ($Landingpage_validated["code"] == "0x0000-00000") {

                $Landingpage_id = $this->Landingpage_model->save($Landingpage);
                $this->response_library->responseJSON($Landingpage_validated["code"], $Landingpage_validated["message"]);
            } else {

                $this->response_library->responseJSON($Landingpage_validated["code"], $Landingpage_validated["message"]);
            }
        }



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

		/** ------------------------------------------------------- **/

        $Landingpage = $this->Landingpage_model->find($Landingpage_id);





        /** ------------------------------------------------------- **

         **           RENDER VIEW PHASE

		/** ------------------------------------------------------- **/

        $data = array(

            "Landingpage" => $Landingpage

        );

        $this->load->view("AdministratorArea/Landingpage/Edit", $data);
    }



    public function delete($Landingpage_id = null)

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

        /** ------------------------------------------------------- **/

        $this->load->model("Landingpage_model");



        $this->load->library("response_library");



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

        /** ------------------------------------------------------- **/

        $Landingpage = $this->Landingpage_model->find($Landingpage_id);

        $Landingpage->modified_date = date("Y-m-d h:i:s");

        $Landingpage->modified_by = $this->session->userdata("__administrator::administrator_id");

        $Landingpage->status = "REMOVED";



        $Landingpage_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

        if ($Landingpage_validated["code"] == "0x0000-00000") {

            $this->Landingpage_model->save($Landingpage);



            $this->response_library->responseJSON($Landingpage_validated["code"], $Landingpage_validated["message"]);
        } else {

            $this->response_library->responseJSON($Landingpage_validated["code"], $Landingpage_validated["message"]);
        }
    }



    /** ------------------------------------------------------- **

     **           ADDITIONAL SCRIPT

    /** ------------------------------------------------------- **/

    public function datatables()

    {



        $this->load->library("datatables_library");

        $this->load->model("Landingpage_model");



        $model_filter = new stdClass();

        $model_filter->custom_where = "status IN ('ACTIVATE','SUSPEND')";

        $Landingpage = $this->Landingpage_model->search($model_filter);



        print_r(json_encode($Landingpage));
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
