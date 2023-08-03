<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Bannermain extends CI_Controller

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

        $this->load->model("Bannermain_model");



        $page = new stdClass();

        $page->get_first = true;

        $page = $this->Bannermain_model->search($page);



        $this->load->view("AdministratorArea/Bannermain/Index", compact("page"));

	}

	public function edit($bannermain_id = null)

	{

		/** ------------------------------------------------------- **

		 **           CONSTRUCT PHASE

		/** ------------------------------------------------------- **/

        $this->load->model("bannermain_model");
        $this->load->library("encryption_library");
        $this->load->library("response_library");
        $this->load->library("guid_library");

        $bannermains = $this->bannermain_model->search();


		/** ------------------------------------------------------- **

		 **           POST PHASE

		/** ------------------------------------------------------- **/

        if($this->input->post())

        {

            if($bannermain_id != null)

            {

                $bannermain = $this->bannermain_model->find($bannermain_id);

                $bannermain->modified_date = date("Y-m-d h:i:s");

                $bannermain->modified_by = $this->session->userdata("__administrator::administrator_id");

                

            }

            else

            {

                $bannermain = new stdClass();

                $bannermain->created_date = date("Y-m-d h:i:s");

                $bannermain->created_by = $this->session->userdata("__administrator::administrator_id");

            }



            $bannermain->status = $this->input->post("status");

            $bannermain->title = $this->input->post("title");
            
            $bannermain->description = $this->input->post("description");
            
            $bannermain->link = $this->input->post("link");


            

            if($_FILES['image']['size']['th'] > 0)

            {
                $_FILES['upload_file']['name']= $_FILES['image']['name']['th'];

                $_FILES['upload_file']['type']= $_FILES['image']['type']['th'];

                $_FILES['upload_file']['tmp_name']= $_FILES['image']['tmp_name']['th'];

                $_FILES['upload_file']['error']= $_FILES['image']['error']['th'];

                $_FILES['upload_file']['size']= $_FILES['image']['size']['th'];

                $fileName = date("YmdHis")."_".$this->guid_library->generate();

                $config['file_name'] = $fileName;

                $config['upload_path'] = FCPATH.'/assets/uploads/bannermain/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $config['max_size'] = '0';

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                $uploadCheck = $this->upload->do_upload("upload_file");

                $upload_data = $this->upload->data();

                $file_name = $upload_data['file_name'];

                $bannermain->image = '/assets/uploads/bannermain/'.$file_name;

            }

            $bannermain_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

            if($bannermain_validated["code"] == "0x0000-00000")

            {

                $bannermain_id = $this->bannermain_model->save($bannermain);
                $this->response_library->responseJSON($bannermain_validated["code"], $bannermain_validated["message"]);

            }

            else

            {

                $this->response_library->responseJSON($bannermain_validated["code"], $bannermain_validated["message"]);

            }

        }



		/** ------------------------------------------------------- **

		 **           PROCESS PHASE

		/** ------------------------------------------------------- **/

        $bannermain = $this->bannermain_model->find($bannermain_id);



        

		/** ------------------------------------------------------- **

		 **           RENDER VIEW PHASE

		/** ------------------------------------------------------- **/

        $data = array(

            "bannermain" => $bannermain

        );

        $this->load->view("AdministratorArea/Bannermain/Edit",$data);

	}



    public function delete($bannermain_id = null)

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

        /** ------------------------------------------------------- **/

        $this->load->model("bannermain_model");



        $this->load->library("response_library");



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

        /** ------------------------------------------------------- **/

        $bannermain = $this->bannermain_model->find($bannermain_id);

        $bannermain->modified_date = date("Y-m-d h:i:s");

        $bannermain->modified_by = $this->session->userdata("__administrator::administrator_id");

        $bannermain->status = "REMOVED";



        $bannermain_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

        if($bannermain_validated["code"] == "0x0000-00000")

        {

            $this->bannermain_model->save($bannermain);



            $this->response_library->responseJSON($bannermain_validated["code"], $bannermain_validated["message"]);

        }

        else

        {

            $this->response_library->responseJSON($bannermain_validated["code"], $bannermain_validated["message"]);

        }

    }



    /** ------------------------------------------------------- **

     **           ADDITIONAL SCRIPT

    /** ------------------------------------------------------- **/

    public function datatables()

    {

        

            $this->load->library("datatables_library");

            $this->load->model("bannermain_model");



            $model_filter = new stdClass();

            $model_filter->custom_where = "status IN ('ACTIVATE','SUSPEND')";

            $bannermain = $this->bannermain_model->search($model_filter);



            print_r(json_encode($bannermain)); 

       

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



