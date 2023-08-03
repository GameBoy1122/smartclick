<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class News extends CI_Controller

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

        $this->load->model("News_model");



        $page = new stdClass();

        $page->get_first = true;

        $page = $this->News_model->search($page);



        $this->load->view("AdministratorArea/News/Index", compact("page"));

	}

	public function edit($News_id = null)

	{

		/** ------------------------------------------------------- **

		 **           CONSTRUCT PHASE

		/** ------------------------------------------------------- **/

        $this->load->model("News_model");
        $this->load->library("encryption_library");
        $this->load->library("response_library");
        $this->load->library("guid_library");

        $Newss = $this->News_model->search();


		/** ------------------------------------------------------- **

		 **           POST PHASE

		/** ------------------------------------------------------- **/

        if($this->input->post())

        {

            if($News_id != null)

            {

                $News = $this->News_model->find($News_id);

                $News->modified_date = date("Y-m-d h:i:s");

                $News->modified_by = $this->session->userdata("__administrator::administrator_id");

                

            }

            else

            {

                $News = new stdClass();

                $News->created_date = date("Y-m-d h:i:s");

                $News->created_by = $this->session->userdata("__administrator::administrator_id");

            }



            $News->status = $this->input->post("status");

            $News->title = $this->input->post("title");
            
            $News->description = $this->input->post("description");
            
            $News->link = $this->input->post("link");


            

            if($_FILES['image']['size']['th'] > 0)

            {
                $_FILES['upload_file']['name']= $_FILES['image']['name']['th'];

                $_FILES['upload_file']['type']= $_FILES['image']['type']['th'];

                $_FILES['upload_file']['tmp_name']= $_FILES['image']['tmp_name']['th'];

                $_FILES['upload_file']['error']= $_FILES['image']['error']['th'];

                $_FILES['upload_file']['size']= $_FILES['image']['size']['th'];

                $fileName = date("YmdHis")."_".$this->guid_library->generate();

                $config['file_name'] = $fileName;

                $config['upload_path'] = FCPATH.'/assets/uploads/News/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $config['max_size'] = '0';

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                $uploadCheck = $this->upload->do_upload("upload_file");

                $upload_data = $this->upload->data();

                $file_name = $upload_data['file_name'];



                $News->image = '/assets/uploads/News/'.$file_name;

                

            }

            $News_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

            if($News_validated["code"] == "0x0000-00000")

            {

                $News_id = $this->News_model->save($News);
                $this->response_library->responseJSON($News_validated["code"], $News_validated["message"]);

            }

            else

            {

                $this->response_library->responseJSON($News_validated["code"], $News_validated["message"]);

            }

        }



		/** ------------------------------------------------------- **

		 **           PROCESS PHASE

		/** ------------------------------------------------------- **/

        $News = $this->News_model->find($News_id);



        

		/** ------------------------------------------------------- **

		 **           RENDER VIEW PHASE

		/** ------------------------------------------------------- **/

        $data = array(

            "News" => $News

        );

        $this->load->view("AdministratorArea/News/Edit",$data);

	}



    public function delete($News_id = null)

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

        /** ------------------------------------------------------- **/

        $this->load->model("News_model");



        $this->load->library("response_library");



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

        /** ------------------------------------------------------- **/

        $News = $this->News_model->find($News_id);

        $News->modified_date = date("Y-m-d h:i:s");

        $News->modified_by = $this->session->userdata("__administrator::administrator_id");

        $News->status = "REMOVED";



        $News_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

        if($News_validated["code"] == "0x0000-00000")

        {

            $this->News_model->save($News);



            $this->response_library->responseJSON($News_validated["code"], $News_validated["message"]);

        }

        else

        {

            $this->response_library->responseJSON($News_validated["code"], $News_validated["message"]);

        }

    }



    /** ------------------------------------------------------- **

     **           ADDITIONAL SCRIPT

    /** ------------------------------------------------------- **/

    public function datatables()

    {

        

            $this->load->library("datatables_library");

            $this->load->model("News_model");



            $model_filter = new stdClass();

            $model_filter->custom_where = "status IN ('ACTIVATE','SUSPEND')";

            $News = $this->News_model->search($model_filter);



            print_r(json_encode($News)); 

       

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



