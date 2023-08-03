<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Training_place extends CI_Controller

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
 
        $this->load->model("Training_place_model");



        $page = new stdClass();

        $page->get_first = true;

        $page = $this->Training_place_model->search($page);



        $this->load->view("AdministratorArea/Training_place/Index", compact("page"));

	}

	public function edit($Training_place_id = null)

	{

		/** ------------------------------------------------------- **

		 **           CONSTRUCT PHASE

		/** ------------------------------------------------------- **/

        $this->load->model("Training_place_model");
        $this->load->library("encryption_library");
        $this->load->library("response_library");
        $this->load->library("guid_library");

        $Training_places = $this->Training_place_model->search();


		/** ------------------------------------------------------- **

		 **           POST PHASE

		/** ------------------------------------------------------- **/

        if($this->input->post())

        {

            if($Training_place_id != null)

            {

                $Training_place = $this->Training_place_model->find($Training_place_id);

                $Training_place->modified_date = date("Y-m-d h:i:s");

                $Training_place->modified_by = $this->session->userdata("__administrator::administrator_id");

                

            }

            else

            {

                $Training_place = new stdClass();

                $Training_place->created_date = date("Y-m-d h:i:s");

                $Training_place->created_by = $this->session->userdata("__administrator::administrator_id");

            }

            $Training_place->status = $this->input->post("status");
            $Training_place->address = $this->input->post("address");
            $Training_place->location = $this->input->post("location");
 
            $Training_place_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

            if($Training_place_validated["code"] == "0x0000-00000")

            {

                $Training_place_id = $this->Training_place_model->save($Training_place);
                $this->response_library->responseJSON($Training_place_validated["code"], $Training_place_validated["message"]);

            }

            else

            {

                $this->response_library->responseJSON($Training_place_validated["code"], $Training_place_validated["message"]);

            }

        }



		/** ------------------------------------------------------- **

		 **           PROCESS PHASE

		/** ------------------------------------------------------- **/

        $Training_place = $this->Training_place_model->find($Training_place_id);



        

		/** ------------------------------------------------------- **

		 **           RENDER VIEW PHASE

		/** ------------------------------------------------------- **/

        $data = array(

            "Training_place" => $Training_place

        );

        $this->load->view("AdministratorArea/Training_place/Edit",$data);

	}



    public function delete($Training_place_id = null)

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

        /** ------------------------------------------------------- **/

        $this->load->model("Training_place_model");



        $this->load->library("response_library");



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

        /** ------------------------------------------------------- **/

        $Training_place = $this->Training_place_model->find($Training_place_id);

        $Training_place->modified_date = date("Y-m-d h:i:s");

        $Training_place->modified_by = $this->session->userdata("__administrator::administrator_id");

        $Training_place->status = "REMOVED";



        $Training_place_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

        if($Training_place_validated["code"] == "0x0000-00000")

        {

            $this->Training_place_model->save($Training_place);



            $this->response_library->responseJSON($Training_place_validated["code"], $Training_place_validated["message"]);

        }

        else

        {

            $this->response_library->responseJSON($Training_place_validated["code"], $Training_place_validated["message"]);

        }

    }



    /** ------------------------------------------------------- **

     **           ADDITIONAL SCRIPT

    /** ------------------------------------------------------- **/

    public function datatables()

    {

        

            $this->load->library("datatables_library");

            $this->load->model("Training_place_model");



            $model_filter = new stdClass();

            $model_filter->custom_where = "status IN ('ACTIVATE','SUSPEND')";

            $Training_place = $this->Training_place_model->search($model_filter);



            print_r(json_encode($Training_place)); 

       

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

        

        foreach($slide_orders as $order => $banner_id)

        {

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



