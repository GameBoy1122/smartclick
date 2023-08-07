<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Seminar extends CI_Controller

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

        $this->load->model("Seminar_model");



        $page = new stdClass();

        $page->get_first = true;

        $page = $this->Seminar_model->search($page);



        $this->load->view("AdministratorArea/Seminar/Index", compact("page"));

	}

	public function edit($Seminar_id = null)

	{

		/** ------------------------------------------------------- **

		 **           CONSTRUCT PHASE

		/** ------------------------------------------------------- **/

        $this->load->model("Seminar_model");
        $this->load->library("encryption_library");
        $this->load->library("response_library");
        $this->load->library("guid_library");

        $Seminars = $this->Seminar_model->search();


		/** ------------------------------------------------------- **

		 **           POST PHASE

		/** ------------------------------------------------------- **/

        if($this->input->post())

        {

            if($Seminar_id != null)

            {

                $Seminar = $this->Seminar_model->find($Seminar_id);

                $Seminar->modified_date = date("Y-m-d h:i:s");

                $Seminar->modified_by = $this->session->userdata("__administrator::administrator_id");

                

            }

            else

            {

                $Seminar = new stdClass();

                $Seminar->created_date = date("Y-m-d h:i:s");

                $Seminar->created_by = $this->session->userdata("__administrator::administrator_id");

            }



            $Seminar->status = $this->input->post("status");
            $Seminar->title_en = $this->input->post("title_en");
            $Seminar->title_th = $this->input->post("title_th");
            $Seminar->short_description_en = $this->input->post("short_description_en");
            $Seminar->short_description_th = $this->input->post("short_description_th");
            $Seminar->description_en = $this->input->post("description_en");
            $Seminar->description_th = $this->input->post("description_th");


            if($_FILES['image']['size']['th'] > 0)

            {
                $_FILES['upload_file']['name']= $_FILES['image']['name']['th'];

                $_FILES['upload_file']['type']= $_FILES['image']['type']['th'];

                $_FILES['upload_file']['tmp_name']= $_FILES['image']['tmp_name']['th'];

                $_FILES['upload_file']['error']= $_FILES['image']['error']['th'];

                $_FILES['upload_file']['size']= $_FILES['image']['size']['th'];

                $fileName = date("YmdHis")."_".$this->guid_library->generate();

                $config['file_name'] = $fileName;

                $config['upload_path'] = FCPATH.'/assets/uploads/Seminar/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $config['max_size'] = '0';

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                $uploadCheck = $this->upload->do_upload("upload_file");

                $upload_data = $this->upload->data();

                $file_name = $upload_data['file_name'];



                $Seminar->image = '/assets/uploads/Seminar/'.$file_name;

            }

            $Seminar_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

            if($Seminar_validated["code"] == "0x0000-00000")

            {

                $Seminar_id = $this->Seminar_model->save($Seminar);
                $this->response_library->responseJSON($Seminar_validated["code"], $Seminar_validated["message"]);

            }

            else

            {

                $this->response_library->responseJSON($Seminar_validated["code"], $Seminar_validated["message"]);

            }

        }



		/** ------------------------------------------------------- **

		 **           PROCESS PHASE

		/** ------------------------------------------------------- **/

        $Seminar = $this->Seminar_model->find($Seminar_id);



        

		/** ------------------------------------------------------- **

		 **           RENDER VIEW PHASE

		/** ------------------------------------------------------- **/

        $data = array(

            "Seminar" => $Seminar

        );

        $this->load->view("AdministratorArea/Seminar/Edit",$data);

	}



    public function delete($Seminar_id = null)

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

        /** ------------------------------------------------------- **/

        $this->load->model("Seminar_model");



        $this->load->library("response_library");



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

        /** ------------------------------------------------------- **/

        $Seminar = $this->Seminar_model->find($Seminar_id);

        $Seminar->modified_date = date("Y-m-d h:i:s");

        $Seminar->modified_by = $this->session->userdata("__administrator::administrator_id");

        $Seminar->status = "REMOVED";



        $Seminar_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

        if($Seminar_validated["code"] == "0x0000-00000")

        {

            $this->Seminar_model->save($Seminar);



            $this->response_library->responseJSON($Seminar_validated["code"], $Seminar_validated["message"]);

        }

        else

        {

            $this->response_library->responseJSON($Seminar_validated["code"], $Seminar_validated["message"]);

        }

    }



    /** ------------------------------------------------------- **

     **           ADDITIONAL SCRIPT

    /** ------------------------------------------------------- **/

    public function datatables()

    {

        

            $this->load->library("datatables_library");

            $this->load->model("Seminar_model");



            $model_filter = new stdClass();

            $model_filter->custom_where = "status IN ('ACTIVATE','SUSPEND')";

            $Seminar = $this->Seminar_model->search($model_filter);



            print_r(json_encode($Seminar)); 

       

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



