<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Contact_us extends CI_Controller

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
 
        $this->load->model("Contact_us_model");



        $page = new stdClass();

        $page->get_first = true;

        $page = $this->Contact_us_model->search($page);



        $this->load->view("AdministratorArea/Contact_us/Index", compact("page"));

	}

	public function edit($Contact_us_id = null)

	{

		/** ------------------------------------------------------- **

		 **           CONSTRUCT PHASE

		/** ------------------------------------------------------- **/

        $this->load->model("Contact_us_model");
        $this->load->library("encryption_library");
        $this->load->library("response_library");
        $this->load->library("guid_library");

        $Contact_uss = $this->Contact_us_model->search();


		/** ------------------------------------------------------- **

		 **           POST PHASE

		/** ------------------------------------------------------- **/

        if($this->input->post())

        {

            if($Contact_us_id != null)

            {

                $Contact_us = $this->Contact_us_model->find($Contact_us_id);

                $Contact_us->modified_date = date("Y-m-d h:i:s");

                $Contact_us->modified_by = $this->session->userdata("__administrator::administrator_id");

                

            }

            else

            {

                $Contact_us = new stdClass();

                $Contact_us->created_date = date("Y-m-d h:i:s");

                $Contact_us->created_by = $this->session->userdata("__administrator::administrator_id");

            }

            $Contact_us->status = $this->input->post("status");
            $Contact_us->address = $this->input->post("address");
            $Contact_us->email = $this->input->post("email");
            $Contact_us->tel = $this->input->post("tel");
            $Contact_us->mobile_phone = $this->input->post("mobile_phone");
            $Contact_us->facebook = $this->input->post("facebook");
            $Contact_us->line = $this->input->post("line");
            $Contact_us->location = $this->input->post("location");
 
            $Contact_us_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

            if($Contact_us_validated["code"] == "0x0000-00000")

            {

                $Contact_us_id = $this->Contact_us_model->save($Contact_us);
                $this->response_library->responseJSON($Contact_us_validated["code"], $Contact_us_validated["message"]);

            }

            else

            {

                $this->response_library->responseJSON($Contact_us_validated["code"], $Contact_us_validated["message"]);

            }

        }



		/** ------------------------------------------------------- **

		 **           PROCESS PHASE

		/** ------------------------------------------------------- **/

        $Contact_us = $this->Contact_us_model->find($Contact_us_id);



        

		/** ------------------------------------------------------- **

		 **           RENDER VIEW PHASE

		/** ------------------------------------------------------- **/

        $data = array(

            "Contact_us" => $Contact_us

        );

        $this->load->view("AdministratorArea/Contact_us/Edit",$data);

	}



    public function delete($Contact_us_id = null)

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

        /** ------------------------------------------------------- **/

        $this->load->model("Contact_us_model");



        $this->load->library("response_library");



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

        /** ------------------------------------------------------- **/

        $Contact_us = $this->Contact_us_model->find($Contact_us_id);

        $Contact_us->modified_date = date("Y-m-d h:i:s");

        $Contact_us->modified_by = $this->session->userdata("__administrator::administrator_id");

        $Contact_us->status = "REMOVED";



        $Contact_us_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

        if($Contact_us_validated["code"] == "0x0000-00000")

        {

            $this->Contact_us_model->save($Contact_us);



            $this->response_library->responseJSON($Contact_us_validated["code"], $Contact_us_validated["message"]);

        }

        else

        {

            $this->response_library->responseJSON($Contact_us_validated["code"], $Contact_us_validated["message"]);

        }

    }



    /** ------------------------------------------------------- **

     **           ADDITIONAL SCRIPT

    /** ------------------------------------------------------- **/

    public function datatables()

    {

        

            $this->load->library("datatables_library");

            $this->load->model("Contact_us_model");



            $model_filter = new stdClass();

            $model_filter->custom_where = "status IN ('ACTIVATE','SUSPEND')";

            $Contact_us = $this->Contact_us_model->search($model_filter);



            print_r(json_encode($Contact_us)); 

       

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



