<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Solution_category extends CI_Controller

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

        $this->load->model("Solution_category_model");



        $page = new stdClass();

        $page->get_first = true;

        $page = $this->Solution_category_model->search($page);



        $this->load->view("AdministratorArea/Solution_category/Index", compact("page"));

	}

	public function edit($Solution_category_id = null)

	{

		/** ------------------------------------------------------- **

		 **           CONSTRUCT PHASE

		/** ------------------------------------------------------- **/

        $this->load->model("Solution_category_model");
        $this->load->library("encryption_library");
        $this->load->library("response_library");
        $this->load->library("guid_library");

        $Solution_categorys = $this->Solution_category_model->search();


		/** ------------------------------------------------------- **

		 **           POST PHASE

		/** ------------------------------------------------------- **/

        if($this->input->post())

        {

            if($Solution_category_id != null)

            {

                $Solution_category = $this->Solution_category_model->find($Solution_category_id);

                $Solution_category->modified_date = date("Y-m-d h:i:s");

                $Solution_category->modified_by = $this->session->userdata("__administrator::administrator_id");

                

            }

            else

            {

                $Solution_category = new stdClass();

                $Solution_category->created_date = date("Y-m-d h:i:s");

                $Solution_category->created_by = $this->session->userdata("__administrator::administrator_id");

            }



            $Solution_category->status = $this->input->post("status");
            $Solution_category->title_en = $this->input->post("title_en");
            $Solution_category->title_th = $this->input->post("title_th");
            $Solution_category->short_description_en = $this->input->post("short_description_en");
            $Solution_category->short_description_th = $this->input->post("short_description_th");
            $Solution_category->description_en = $this->input->post("description_en");
            $Solution_category->description_th = $this->input->post("description_th");


            if($_FILES['image']['size']['th'] > 0)

            {
                $_FILES['upload_file']['name']= $_FILES['image']['name']['th'];

                $_FILES['upload_file']['type']= $_FILES['image']['type']['th'];

                $_FILES['upload_file']['tmp_name']= $_FILES['image']['tmp_name']['th'];

                $_FILES['upload_file']['error']= $_FILES['image']['error']['th'];

                $_FILES['upload_file']['size']= $_FILES['image']['size']['th'];

                $fileName = date("YmdHis")."_".$this->guid_library->generate();

                $config['file_name'] = $fileName;

                $config['upload_path'] = FCPATH.'/assets/uploads/Solution_category/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $config['max_size'] = '0';

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                $uploadCheck = $this->upload->do_upload("upload_file");

                $upload_data = $this->upload->data();

                $file_name = $upload_data['file_name'];



                $Solution_category->image = '/assets/uploads/Solution_category/'.$file_name;

            }

            $Solution_category_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

            if($Solution_category_validated["code"] == "0x0000-00000")

            {

                $Solution_category_id = $this->Solution_category_model->save($Solution_category);
                $this->response_library->responseJSON($Solution_category_validated["code"], $Solution_category_validated["message"]);

            }

            else

            {

                $this->response_library->responseJSON($Solution_category_validated["code"], $Solution_category_validated["message"]);

            }

        }



		/** ------------------------------------------------------- **

		 **           PROCESS PHASE

		/** ------------------------------------------------------- **/

        $Solution_category = $this->Solution_category_model->find($Solution_category_id);



        

		/** ------------------------------------------------------- **

		 **           RENDER VIEW PHASE

		/** ------------------------------------------------------- **/

        $data = array(

            "Solution_category" => $Solution_category

        );

        $this->load->view("AdministratorArea/Solution_category/Edit",$data);

	}



    public function delete($Solution_category_id = null)

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

        /** ------------------------------------------------------- **/

        $this->load->model("Solution_category_model");



        $this->load->library("response_library");



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

        /** ------------------------------------------------------- **/

        $Solution_category = $this->Solution_category_model->find($Solution_category_id);

        $Solution_category->modified_date = date("Y-m-d h:i:s");

        $Solution_category->modified_by = $this->session->userdata("__administrator::administrator_id");

        $Solution_category->status = "REMOVED";



        $Solution_category_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

        if($Solution_category_validated["code"] == "0x0000-00000")

        {

            $this->Solution_category_model->save($Solution_category);



            $this->response_library->responseJSON($Solution_category_validated["code"], $Solution_category_validated["message"]);

        }

        else

        {

            $this->response_library->responseJSON($Solution_category_validated["code"], $Solution_category_validated["message"]);

        }

    }



    /** ------------------------------------------------------- **

     **           ADDITIONAL SCRIPT

    /** ------------------------------------------------------- **/

    public function datatables()

    {

        

            $this->load->library("datatables_library");

            $this->load->model("Solution_category_model");



            $model_filter = new stdClass();

            $model_filter->custom_where = "status IN ('ACTIVATE','SUSPEND')";

            $Solution_category = $this->Solution_category_model->search($model_filter);



            print_r(json_encode($Solution_category)); 

       

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



