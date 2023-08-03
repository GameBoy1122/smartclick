<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Ourservices extends CI_Controller

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

        $this->load->model("Ourservices_model");



        $page = new stdClass();

        $page->get_first = true;

        $page = $this->Ourservices_model->search($page);



        $this->load->view("AdministratorArea/Ourservices/Index", compact("page"));

	}

	public function edit($Ourservices_id = null)

	{

		/** ------------------------------------------------------- **

		 **           CONSTRUCT PHASE

		/** ------------------------------------------------------- **/

        $this->load->model("Ourservices_model");
        $this->load->library("encryption_library");
        $this->load->library("response_library");
        $this->load->library("guid_library");

        $Ourservicess = $this->Ourservices_model->search();


		/** ------------------------------------------------------- **

		 **           POST PHASE

		/** ------------------------------------------------------- **/

        if($this->input->post())

        {

            if($Ourservices_id != null)

            {

                $Ourservices = $this->Ourservices_model->find($Ourservices_id);

                $Ourservices->modified_date = date("Y-m-d h:i:s");

                $Ourservices->modified_by = $this->session->userdata("__administrator::administrator_id");

                

            }

            else

            {

                $Ourservices = new stdClass();

                $Ourservices->created_date = date("Y-m-d h:i:s");

                $Ourservices->created_by = $this->session->userdata("__administrator::administrator_id");

            }



            $Ourservices->status = $this->input->post("status");
            $Ourservices->title_en = $this->input->post("title_en");
            $Ourservices->title_th = $this->input->post("title_th");
            $Ourservices->title_ae = $this->input->post("title_ae");
            $Ourservices->short_description_en = $this->input->post("short_description_en");
            $Ourservices->short_description_en = $this->input->post("short_description_th");
            $Ourservices->short_description_en = $this->input->post("short_description_ae");
            $Ourservices->description_en = $this->input->post("description_en");
            $Ourservices->description_th = $this->input->post("description_th");
            $Ourservices->description_ae = $this->input->post("description_ae");


            if($_FILES['image']['size']['th'] > 0)

            {
                $_FILES['upload_file']['name']= $_FILES['image']['name']['th'];

                $_FILES['upload_file']['type']= $_FILES['image']['type']['th'];

                $_FILES['upload_file']['tmp_name']= $_FILES['image']['tmp_name']['th'];

                $_FILES['upload_file']['error']= $_FILES['image']['error']['th'];

                $_FILES['upload_file']['size']= $_FILES['image']['size']['th'];

                $fileName = date("YmdHis")."_".$this->guid_library->generate();

                $config['file_name'] = $fileName;

                $config['upload_path'] = FCPATH.'/assets/uploads/Ourservices/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $config['max_size'] = '0';

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                $uploadCheck = $this->upload->do_upload("upload_file");

                $upload_data = $this->upload->data();

                $file_name = $upload_data['file_name'];



                $Ourservices->image = '/assets/uploads/Ourservices/'.$file_name;

            }

            $Ourservices_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

            if($Ourservices_validated["code"] == "0x0000-00000")

            {

                $Ourservices_id = $this->Ourservices_model->save($Ourservices);
                $this->response_library->responseJSON($Ourservices_validated["code"], $Ourservices_validated["message"]);

            }

            else

            {

                $this->response_library->responseJSON($Ourservices_validated["code"], $Ourservices_validated["message"]);

            }

        }



		/** ------------------------------------------------------- **

		 **           PROCESS PHASE

		/** ------------------------------------------------------- **/

        $Ourservices = $this->Ourservices_model->find($Ourservices_id);



        

		/** ------------------------------------------------------- **

		 **           RENDER VIEW PHASE

		/** ------------------------------------------------------- **/

        $data = array(

            "Ourservices" => $Ourservices

        );

        $this->load->view("AdministratorArea/Ourservices/Edit",$data);

	}



    public function delete($Ourservices_id = null)

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

        /** ------------------------------------------------------- **/

        $this->load->model("Ourservices_model");



        $this->load->library("response_library");



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

        /** ------------------------------------------------------- **/

        $Ourservices = $this->Ourservices_model->find($Ourservices_id);

        $Ourservices->modified_date = date("Y-m-d h:i:s");

        $Ourservices->modified_by = $this->session->userdata("__administrator::administrator_id");

        $Ourservices->status = "REMOVED";



        $Ourservices_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

        if($Ourservices_validated["code"] == "0x0000-00000")

        {

            $this->Ourservices_model->save($Ourservices);



            $this->response_library->responseJSON($Ourservices_validated["code"], $Ourservices_validated["message"]);

        }

        else

        {

            $this->response_library->responseJSON($Ourservices_validated["code"], $Ourservices_validated["message"]);

        }

    }



    /** ------------------------------------------------------- **

     **           ADDITIONAL SCRIPT

    /** ------------------------------------------------------- **/

    public function datatables()

    {

        

            $this->load->library("datatables_library");

            $this->load->model("Ourservices_model");



            $model_filter = new stdClass();

            $model_filter->custom_where = "status IN ('ACTIVATE','SUSPEND')";

            $Ourservices = $this->Ourservices_model->search($model_filter);



            print_r(json_encode($Ourservices)); 

       

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



