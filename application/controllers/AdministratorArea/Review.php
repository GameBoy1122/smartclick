<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Review extends CI_Controller

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

        $this->load->model("Review_model");



        $page = new stdClass();

        $page->get_first = true;

        $page = $this->Review_model->search($page);



        $this->load->view("AdministratorArea/Review/Index", compact("page"));

	}

	public function edit($Review_id = null)

	{

		/** ------------------------------------------------------- **

		 **           CONSTRUCT PHASE

		/** ------------------------------------------------------- **/

        $this->load->model("Review_model");
        $this->load->library("encryption_library");
        $this->load->library("response_library");
        $this->load->library("guid_library");

        $Reviews = $this->Review_model->search();


		/** ------------------------------------------------------- **

		 **           POST PHASE

		/** ------------------------------------------------------- **/

        if($this->input->post())

        {

            if($Review_id != null)

            {

                $Review = $this->Review_model->find($Review_id);

                $Review->modified_date = date("Y-m-d h:i:s");

                $Review->modified_by = $this->session->userdata("__administrator::administrator_id");

                

            }

            else

            {

                $Review = new stdClass();

                $Review->created_date = date("Y-m-d h:i:s");

                $Review->created_by = $this->session->userdata("__administrator::administrator_id");

            }



            $Review->status = $this->input->post("status");
            $Review->name_en = $this->input->post("name_en");
            $Review->name_th = $this->input->post("name_th");
            $Review->name_ae = $this->input->post("name_ae");
            $Review->description_en = $this->input->post("description_en");
            $Review->description_th = $this->input->post("description_th");
            $Review->description_ae = $this->input->post("description_ae");
            $Review->review_en = $this->input->post("review_en");
            $Review->review_th = $this->input->post("review_th");
            $Review->review_ae = $this->input->post("review_ae");


            if($_FILES['image']['size']['th'] > 0)

            {
                $_FILES['upload_file']['name']= $_FILES['image']['name']['th'];

                $_FILES['upload_file']['type']= $_FILES['image']['type']['th'];

                $_FILES['upload_file']['tmp_name']= $_FILES['image']['tmp_name']['th'];

                $_FILES['upload_file']['error']= $_FILES['image']['error']['th'];

                $_FILES['upload_file']['size']= $_FILES['image']['size']['th'];

                $fileName = date("YmdHis")."_".$this->guid_library->generate();

                $config['file_name'] = $fileName;

                $config['upload_path'] = FCPATH.'/assets/uploads/Review/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $config['max_size'] = '0';

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                $uploadCheck = $this->upload->do_upload("upload_file");

                $upload_data = $this->upload->data();

                $file_name = $upload_data['file_name'];



                $Review->image = '/assets/uploads/Review/'.$file_name;

            }

            $Review_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

            if($Review_validated["code"] == "0x0000-00000")

            {

                $Review_id = $this->Review_model->save($Review);
                $this->response_library->responseJSON($Review_validated["code"], $Review_validated["message"]);

            }

            else

            {

                $this->response_library->responseJSON($Review_validated["code"], $Review_validated["message"]);

            }

        }



		/** ------------------------------------------------------- **

		 **           PROCESS PHASE

		/** ------------------------------------------------------- **/

        $Review = $this->Review_model->find($Review_id);



        

		/** ------------------------------------------------------- **

		 **           RENDER VIEW PHASE

		/** ------------------------------------------------------- **/

        $data = array(

            "Review" => $Review

        );

        $this->load->view("AdministratorArea/Review/Edit",$data);

	}



    public function delete($Review_id = null)

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

        /** ------------------------------------------------------- **/

        $this->load->model("Review_model");



        $this->load->library("response_library");



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

        /** ------------------------------------------------------- **/

        $Review = $this->Review_model->find($Review_id);

        $Review->modified_date = date("Y-m-d h:i:s");

        $Review->modified_by = $this->session->userdata("__administrator::administrator_id");

        $Review->status = "REMOVED";



        $Review_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

        if($Review_validated["code"] == "0x0000-00000")

        {

            $this->Review_model->save($Review);



            $this->response_library->responseJSON($Review_validated["code"], $Review_validated["message"]);

        }

        else

        {

            $this->response_library->responseJSON($Review_validated["code"], $Review_validated["message"]);

        }

    }



    /** ------------------------------------------------------- **

     **           ADDITIONAL SCRIPT

    /** ------------------------------------------------------- **/

    public function datatables()

    {

        

            $this->load->library("datatables_library");

            $this->load->model("Review_model");



            $model_filter = new stdClass();

            $model_filter->custom_where = "status IN ('ACTIVATE','SUSPEND')";

            $Review = $this->Review_model->search($model_filter);



            print_r(json_encode($Review)); 

       

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



