<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
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
        $this->load->view("AdministratorArea/Home/Index");
	}
    public function index_banner($home_id)
    {
        // $this->load->model("home_banner_model");

        // $model_filter = new stdClass();
        // $model_filter->where['home_id'] = $home_id;
        // $model_filter->get_first = true;
        // $home = $this->home_banner_model->search($model_filter);

        $this->load->view("AdministratorArea/Home/Index_banner", compact("home_id"));
    }

	public function edit($home_banner_id = null)
	{
		/** ------------------------------------------------------- **
		 **           CONSTRUCT PHASE
		/** ------------------------------------------------------- **/
        $this->load->model("home_banner_model");
		
        $this->load->library("encryption_library");
        $this->load->library("response_library");
        $this->load->library("guid_library");

		/** ------------------------------------------------------- **
		 **           POST PHASE
		/** ------------------------------------------------------- **/
        if($this->input->post())
        {
            if($home_banner_id != null)
            {
                $home_banner = $this->home_banner_model->find($home_banner_id);
                $home_banner->modified_date = date("Y-m-d h:i:s");
                $home_banner->modified_by = $this->session->userdata("__administrator::administrator_id");
                
            }
            else
            {
                $home_banner = new stdClass();
                $home_banner->created_date = date("Y-m-d h:i:s");
                $home_banner->created_by = $this->session->userdata("__administrator::administrator_id");

                // $max = $this->home_banner_model->search();
                // $sort = count($max) + 1;
                // $home_banner->sort = $sort;
            }

            if(isset($_FILES['image']['size']['th']))
            {
                $_FILES['upload_file']['name']= $_FILES['image']['name']['th'];
                $_FILES['upload_file']['type']= $_FILES['image']['type']['th'];
                $_FILES['upload_file']['tmp_name']= $_FILES['image']['tmp_name']['th'];
                $_FILES['upload_file']['error']= $_FILES['image']['error']['th'];
                $_FILES['upload_file']['size']= $_FILES['image']['size']['th'];
                if ($_FILES['upload_file']['size'] != 0)
                {
                    if($home_banner_id != null)
                    {
                        $home_banner = $this->home_banner_model->find($home_banner_id);
                        if($_FILES['image']['size']['en'] == 0 && $home_banner->image_en == '' && $home_banner->image_en == null)
                        {
                            $fileName = date("YmdHis")."_".$this->guid_library->generate();
                            $config['file_name'] = $fileName;
                            $config['upload_path'] = FCPATH.'/assets/uploads/home_banner/image_en/';
                            $config['allowed_types'] = 'gif|jpg|png|jpeg';
                            $config['max_size'] = '0';
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            $uploadCheck = $this->upload->do_upload("upload_file");
                                $upload_data = $this->upload->data();
                                $file_name_en = $upload_data['file_name'];

                                $home_banner->image_en = $file_name_en;
                            // print_r("if");die;
                        }
                    }
                    else
                    {
                        if($_FILES['image']['size']['en'] == 0)
                        {
                            $fileName = date("YmdHis")."_".$this->guid_library->generate();
                            $config['file_name'] = $fileName;
                            $config['upload_path'] = FCPATH.'/assets/uploads/home_banner/image_en/';
                            $config['allowed_types'] = 'gif|jpg|png|jpeg';
                            $config['max_size'] = '0';
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            $uploadCheck = $this->upload->do_upload("upload_file");
                                $upload_data = $this->upload->data();
                                $file_name_en = $upload_data['file_name'];

                                $home_banner->image_en = $file_name_en;
                        }
                    }
                    $fileName = date("YmdHis")."_".$this->guid_library->generate();
                    $config['file_name'] = $fileName;
                    $config['upload_path'] = FCPATH.'/assets/uploads/home_banner/image_th/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '0';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    $uploadCheck = $this->upload->do_upload("upload_file");
                    if ($uploadCheck == 1) {
                        $upload_data = $this->upload->data();
                        $file_name =   $upload_data['file_name'];

                        $home_banner->image_th = $file_name;
                    }
                    else
                    {
                        $this->response_library->responseJSON("0x000C-U0001", $this->upload->display_errors());
                    }
                }
            }
            if(isset($_FILES['image']['size']['en']))
            {
                $_FILES['upload_file']['name']= $_FILES['image']['name']['en'];
                $_FILES['upload_file']['type']= $_FILES['image']['type']['en'];
                $_FILES['upload_file']['tmp_name']= $_FILES['image']['tmp_name']['en'];
                $_FILES['upload_file']['error']= $_FILES['image']['error']['en'];
                $_FILES['upload_file']['size']= $_FILES['image']['size']['en'];
                if ($_FILES['upload_file']['size'] != 0)
                {
                    $fileName = date("YmdHis")."_".$this->guid_library->generate();
                    $config['file_name'] = $fileName;
                    $config['upload_path'] = FCPATH.'/assets/uploads/home_banner/image_en/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '0';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    $uploadCheck = $this->upload->do_upload("upload_file");
                    if ($uploadCheck == 1) {
                        $upload_data = $this->upload->data();
                        $file_name =   $upload_data['file_name'];

                        $home_banner->image_en = $file_name;
                    }
                    else
                    {
                        $this->response_library->responseJSON("0x000C-U0001", $this->upload->display_errors());
                    }
                }
            }

            $home_banner->status = $this->input->post("status");
            $home_banner->home_id = $_GET['home'];
            $home_banner->title_th = $this->input->post("title_th");
            $home_banner->title_en = $this->input->post("title_en");
            $home_banner->description_th = $this->input->post("description_th");
            $home_banner->description_en = $this->input->post("description_en");
            $home_banner->url = $this->input->post("url");
            if(!isset($home_banner->url) && $home_banner->url == '' || $home_banner->url == null)
            {
                $home_banner->url = '#';
            }

            $home_banner_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");
            if($home_banner_validated["code"] == "0x0000-00000")
            {
                $home_banner_id = $this->home_banner_model->save($home_banner);


                $this->response_library->responseJSON($home_banner_validated["code"], $home_banner_validated["message"]);
            }
            else
            {
                $this->response_library->responseJSON($home_banner_validated["code"], $home_banner_validated["message"]);
            }
        }

		/** ------------------------------------------------------- **
		 **           PROCESS PHASE
		/** ------------------------------------------------------- **/
        $home_banner = $this->home_banner_model->find($home_banner_id);

        
		/** ------------------------------------------------------- **
		 **           RENDER VIEW PHASE
		/** ------------------------------------------------------- **/
        $data = array(
            "home_banner" => $home_banner
        );
        $this->load->view("AdministratorArea/Home/Edit",$data);
	}

    public function delete($home_banner_id = null)
    {
        /** ------------------------------------------------------- **
         **           CONSTRUCT PHASE
        /** ------------------------------------------------------- **/
        $this->load->model("home_banner_model");

        $this->load->library("response_library");

        /** ------------------------------------------------------- **
         **           PROCESS PHASE
        /** ------------------------------------------------------- **/
        $home_banner = $this->home_banner_model->find($home_banner_id);
        $home_banner->modified_date = date("Y-m-d h:i:s");
        $home_banner->modified_by = $this->session->userdata("__administrator::administrator_id");
        $home_banner->status = "REMOVED";

        $home_banner_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");
        if($home_banner_validated["code"] == "0x0000-00000")
        {
            $this->home_banner_model->save($home_banner);

            $this->response_library->responseJSON($home_banner_validated["code"], $home_banner_validated["message"]);
        }
        else
        {
            $this->response_library->responseJSON($home_banner_validated["code"], $home_banner_validated["message"]);
        }
    }

    /** ------------------------------------------------------- **
     **           ADDITIONAL SCRIPT
    /** ------------------------------------------------------- **/
    public function datatables()
    {
        
            $this->load->library("datatables_library");
            $this->load->model("home_model");

            $model_filter = new stdClass();
            // $model_filter->custom_where = "status IN ('ACTIVATE','SUSPEND')";
            $home = $this->home_model->search($model_filter);

            print_r(json_encode($home)); 
       
    }

    public function datatables_banner($home_id = null)
    {
        
            $this->load->library("datatables_library");
            $this->load->model("home_banner_model");

            $model_filter = new stdClass();
            $model_filter->custom_where = "status IN ('ACTIVATE','SUSPEND')";
            $model_filter->where['home_id'] = $home_id;
            $home_banner = $this->home_banner_model->search($model_filter);

            print_r(json_encode($home_banner)); 
       
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

