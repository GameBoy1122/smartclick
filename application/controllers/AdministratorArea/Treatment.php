<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Treatment extends CI_Controller

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

        $this->load->model("Treatment_model");



        $page = new stdClass();

        $page->get_first = true;

        $page = $this->Treatment_model->search($page);



        $this->load->view("AdministratorArea/Treatment/Index", compact("page"));

	}

	public function edit($Treatment_id = null)

	{

		/** ------------------------------------------------------- **

		 **           CONSTRUCT PHASE

		/** ------------------------------------------------------- **/

        $this->load->model("Treatment_model");
        $this->load->library("encryption_library");
        $this->load->library("response_library");
        $this->load->library("guid_library");

        $Treatments = $this->Treatment_model->search();


		/** ------------------------------------------------------- **

		 **           POST PHASE

		/** ------------------------------------------------------- **/

        if($this->input->post())

        {

            if($Treatment_id != null)

            {

                $Treatment = $this->Treatment_model->find($Treatment_id);

                $Treatment->modified_date = date("Y-m-d h:i:s");

                $Treatment->modified_by = $this->session->userdata("__administrator::administrator_id");

                

            }

            else

            {

                $Treatment = new stdClass();

                $Treatment->created_date = date("Y-m-d h:i:s");

                $Treatment->created_by = $this->session->userdata("__administrator::administrator_id");

            }



            $Treatment->status = $this->input->post("status");
            $Treatment->title_en = $this->input->post("title_en");
            $Treatment->title_th = $this->input->post("title_th");
            $Treatment->title_ae = $this->input->post("title_ae");
            $Treatment->description_en = $this->input->post("description_en");
            $Treatment->description_th = $this->input->post("description_th");
            $Treatment->description_ae = $this->input->post("description_ae");


            if($_FILES['image']['size']['th'] > 0)

            {
                $_FILES['upload_file']['name']= $_FILES['image']['name']['th'];

                $_FILES['upload_file']['type']= $_FILES['image']['type']['th'];

                $_FILES['upload_file']['tmp_name']= $_FILES['image']['tmp_name']['th'];

                $_FILES['upload_file']['error']= $_FILES['image']['error']['th'];

                $_FILES['upload_file']['size']= $_FILES['image']['size']['th'];

                $fileName = date("YmdHis")."_".$this->guid_library->generate();

                $config['file_name'] = $fileName;

                $config['upload_path'] = FCPATH.'/assets/uploads/Treatment/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $config['max_size'] = '0';

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                $uploadCheck = $this->upload->do_upload("upload_file");

                $upload_data = $this->upload->data();

                $file_name = $upload_data['file_name'];



                $Treatment->image = '/assets/uploads/Treatment/'.$file_name;

            }

            $Treatment_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

            if($Treatment_validated["code"] == "0x0000-00000")

            {

                $Treatment_id = $this->Treatment_model->save($Treatment);
                $this->response_library->responseJSON($Treatment_validated["code"], $Treatment_validated["message"]);

            }

            else

            {

                $this->response_library->responseJSON($Treatment_validated["code"], $Treatment_validated["message"]);

            }

        }



		/** ------------------------------------------------------- **

		 **           PROCESS PHASE

		/** ------------------------------------------------------- **/

        $Treatment = $this->Treatment_model->find($Treatment_id);



        

		/** ------------------------------------------------------- **

		 **           RENDER VIEW PHASE

		/** ------------------------------------------------------- **/

        $data = array(

            "Treatment" => $Treatment

        );

        $this->load->view("AdministratorArea/Treatment/Edit",$data);

	}



    public function delete($Treatment_id = null)

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

        /** ------------------------------------------------------- **/

        $this->load->model("Treatment_model");



        $this->load->library("response_library");



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

        /** ------------------------------------------------------- **/

        $Treatment = $this->Treatment_model->find($Treatment_id);

        $Treatment->modified_date = date("Y-m-d h:i:s");

        $Treatment->modified_by = $this->session->userdata("__administrator::administrator_id");

        $Treatment->status = "REMOVED";



        $Treatment_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

        if($Treatment_validated["code"] == "0x0000-00000")

        {

            $this->Treatment_model->save($Treatment);



            $this->response_library->responseJSON($Treatment_validated["code"], $Treatment_validated["message"]);

        }

        else

        {

            $this->response_library->responseJSON($Treatment_validated["code"], $Treatment_validated["message"]);

        }

    }



    /** ------------------------------------------------------- **

     **           ADDITIONAL SCRIPT

    /** ------------------------------------------------------- **/

    public function datatables()

    {

        

            $this->load->library("datatables_library");

            $this->load->model("Treatment_model");



            $model_filter = new stdClass();

            $model_filter->custom_where = "status IN ('ACTIVATE','SUSPEND')";

            $Treatment = $this->Treatment_model->search($model_filter);



            print_r(json_encode($Treatment)); 

       

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



