<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Menu extends CI_Controller

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

        $this->load->model("Menu_model");



        $page = new stdClass();

        $page->get_first = true;

        $page = $this->Menu_model->search($page);

        // echo "<pre>";
        // print_r($page);
        // exit();

        $this->load->view("AdministratorArea/Menu/Index", compact("page"));
    }

    public function edit($Menu_id = null)

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

		/** ------------------------------------------------------- **/

        $this->load->model("Menu_model");



        $this->load->library("encryption_library");

        $this->load->library("response_library");

        $this->load->library("guid_library");

        $Menu = $this->Menu_model->search();



        /** ------------------------------------------------------- **

         **           POST PHASE

		/** ------------------------------------------------------- **/

        if ($this->input->post()) {



            if ($Menu_id != null) {

                $Menu = $this->Menu_model->find($Menu_id);

                $Menu->modified_date = date("Y-m-d h:i:s");

                $Menu->modified_by = $this->session->userdata("__administrator::administrator_id");
            } else {

                $Menu = new stdClass();

                $Menu->created_date = date("Y-m-d h:i:s");

                $Menu->created_by = $this->session->userdata("__administrator::administrator_id");
            }

            $Menu->status = $this->input->post("status");

            $Menu->title = $this->input->post("title");
            
            $Menu->image = $this->input->post("title");

            $Menu->url = $this->input->post("url");

            $Menu_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

            if ($Menu_validated["code"] == "0x0000-00000") {

                // echo "<pre>";
                // print_r($Menu);
                // exit();

                $Menu_id = $this->Menu_model->save($Menu);

                $this->response_library->responseJSON($Menu_validated["code"], $Menu_validated["message"]);
            } else {

                $this->response_library->responseJSON($Menu_validated["code"], $Menu_validated["message"]);
            }
        }



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

		/** ------------------------------------------------------- **/

        $Menu = $this->Menu_model->find($Menu_id);





        /** ------------------------------------------------------- **

         **           RENDER VIEW PHASE

		/** ------------------------------------------------------- **/

        $data = array(

            "Menu" => $Menu

        );

        $this->load->view("AdministratorArea/Menu/Edit", $data);
    }



    public function delete($Menu_id = null)

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

        /** ------------------------------------------------------- **/

        $this->load->model("Menu_model");



        $this->load->library("response_library");



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

        /** ------------------------------------------------------- **/

        $Menu = $this->Menu_model->find($Menu_id);

        $Menu->modified_date = date("Y-m-d h:i:s");

        $Menu->modified_by = $this->session->userdata("__administrator::administrator_id");

        $Menu->status = "REMOVED";



        $Menu_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

        if ($Menu_validated["code"] == "0x0000-00000") {

            $this->Menu_model->save($Menu);



            $this->response_library->responseJSON($Menu_validated["code"], $Menu_validated["message"]);
        } else {

            $this->response_library->responseJSON($Menu_validated["code"], $Menu_validated["message"]);
        }
    }



    /** ------------------------------------------------------- **

     **           ADDITIONAL SCRIPT

    /** ------------------------------------------------------- **/

    public function datatables()

    {



        $this->load->library("datatables_library");

        $this->load->model("Menu_model");



        $model_filter = new stdClass();

        $model_filter->custom_where = "status IN ('ACTIVATE','SUSPEND')";

        $Menu = $this->Menu_model->search($model_filter);



        print_r(json_encode($Menu));
    }



    public function sort()

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

        /** ------------------------------------------------------- **/

        $this->load->model("Menu_model");



        $this->load->library("response_library");

        $this->load->library("guid_library");



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

        /** ------------------------------------------------------- **/

        $slide_orders = $this->input->post("sort_row");



        foreach ($slide_orders as $order => $Menu_id) {

            $sortable = $this->Menu_model->find($Menu_id);

            $sortable->sort = $order + 1;

            $sortable->status = "ACTIVATE";

            $sortable->modified_date = date("Y-m-d H:i:s");

            $sortable->modified_by = $this->session->userdata("__administrator::administrator_id");



            $this->Menu_model->save($sortable);
        }



        $this->response_library->responseJSON("0x0000-00000", "Process request Complete.");
    }
}
