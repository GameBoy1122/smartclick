<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Knowledge extends CI_Controller

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

        $this->load->model("Knowledge_model");



        $page = new stdClass();

        $page->get_first = true;

        $page = $this->Knowledge_model->search($page);



        $this->load->view("AdministratorArea/Knowledge/Index", compact("page"));

	}

	public function edit($Knowledge_id = null)

	{

		/** ------------------------------------------------------- **

		 **           CONSTRUCT PHASE

		/** ------------------------------------------------------- **/

        $this->load->model("Knowledge_model");
        $this->load->library("encryption_library");
        $this->load->library("response_library");
        $this->load->library("guid_library");

        $Knowledges = $this->Knowledge_model->search();


		/** ------------------------------------------------------- **

		 **           POST PHASE

		/** ------------------------------------------------------- **/

        if($this->input->post())

        {

            if($Knowledge_id != null)

            {

                $Knowledge = $this->Knowledge_model->find($Knowledge_id);

                $Knowledge->modified_date = date("Y-m-d h:i:s");

                $Knowledge->modified_by = $this->session->userdata("__administrator::administrator_id");

                

            }

            else

            {

                $Knowledge = new stdClass();

                $Knowledge->created_date = date("Y-m-d h:i:s");

                $Knowledge->created_by = $this->session->userdata("__administrator::administrator_id");

            }



            $Knowledge->status = $this->input->post("status");
            $Knowledge->title_en = $this->input->post("title_en");
            $Knowledge->title_th = $this->input->post("title_th");
            $Knowledge->title_ae = $this->input->post("title_ae");
            $Knowledge->short_description_en = $this->input->post("short_description_en");
            $Knowledge->short_description_th = $this->input->post("short_description_th");
            $Knowledge->short_description_ae = $this->input->post("short_description_ae");
            $Knowledge->description_en = $this->input->post("description_en");
            $Knowledge->description_th = $this->input->post("description_th");
            $Knowledge->description_ae = $this->input->post("description_ae");


            if($_FILES['image']['size']['th'] > 0)

            {
                $_FILES['upload_file']['name']= $_FILES['image']['name']['th'];

                $_FILES['upload_file']['type']= $_FILES['image']['type']['th'];

                $_FILES['upload_file']['tmp_name']= $_FILES['image']['tmp_name']['th'];

                $_FILES['upload_file']['error']= $_FILES['image']['error']['th'];

                $_FILES['upload_file']['size']= $_FILES['image']['size']['th'];

                $fileName = date("YmdHis")."_".$this->guid_library->generate();

                $config['file_name'] = $fileName;

                $config['upload_path'] = FCPATH.'/assets/uploads/Knowledge/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $config['max_size'] = '0';

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                $uploadCheck = $this->upload->do_upload("upload_file");

                $upload_data = $this->upload->data();

                $file_name = $upload_data['file_name'];



                $Knowledge->image = '/assets/uploads/Knowledge/'.$file_name;

            }

            $Knowledge_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

            if($Knowledge_validated["code"] == "0x0000-00000")

            {

                $Knowledge_id = $this->Knowledge_model->save($Knowledge);
                $this->response_library->responseJSON($Knowledge_validated["code"], $Knowledge_validated["message"]);

            }

            else

            {

                $this->response_library->responseJSON($Knowledge_validated["code"], $Knowledge_validated["message"]);

            }

        }



		/** ------------------------------------------------------- **

		 **           PROCESS PHASE

		/** ------------------------------------------------------- **/

        $Knowledge = $this->Knowledge_model->find($Knowledge_id);



        

		/** ------------------------------------------------------- **

		 **           RENDER VIEW PHASE

		/** ------------------------------------------------------- **/

        $data = array(

            "Knowledge" => $Knowledge

        );

        $this->load->view("AdministratorArea/Knowledge/Edit",$data);

	}



    public function delete($Knowledge_id = null)

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

        /** ------------------------------------------------------- **/

        $this->load->model("Knowledge_model");



        $this->load->library("response_library");



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

        /** ------------------------------------------------------- **/

        $Knowledge = $this->Knowledge_model->find($Knowledge_id);

        $Knowledge->modified_date = date("Y-m-d h:i:s");

        $Knowledge->modified_by = $this->session->userdata("__administrator::administrator_id");

        $Knowledge->status = "REMOVED";



        $Knowledge_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

        if($Knowledge_validated["code"] == "0x0000-00000")

        {

            $this->Knowledge_model->save($Knowledge);



            $this->response_library->responseJSON($Knowledge_validated["code"], $Knowledge_validated["message"]);

        }

        else

        {

            $this->response_library->responseJSON($Knowledge_validated["code"], $Knowledge_validated["message"]);

        }

    }



    /** ------------------------------------------------------- **

     **           ADDITIONAL SCRIPT

    /** ------------------------------------------------------- **/

    public function datatables()

    {

        

            $this->load->library("datatables_library");

            $this->load->model("Knowledge_model");



            $model_filter = new stdClass();

            $model_filter->custom_where = "status IN ('ACTIVATE','SUSPEND')";

            $Knowledge = $this->Knowledge_model->search($model_filter);



            print_r(json_encode($Knowledge)); 

       

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



