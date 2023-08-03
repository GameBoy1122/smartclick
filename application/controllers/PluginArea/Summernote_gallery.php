<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Summernote_gallery extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function getDirectory()
	{
        $this->load->library("summernote_gallery_library");
        $this->load->library("response_library");

		$physical_path = FCPATH."/assets/plugins/summernote_gallery/";
		$this->response_library->responseJSON("0x0000-00000", "Directory collected complete.", $this->summernote_gallery_library->getDirectory($physical_path ,null));
	}

    public function getImage()
    {
        $this->load->library("summernote_gallery_library");
        $this->load->library("response_library");

        $path = $_GET["path"];
        $physical_path = FCPATH."/assets/plugins/summernote_gallery/".$path;
        $this->response_library->responseJSON("0x0000-00000", "Image collected complete.", $this->summernote_gallery_library->getImage($physical_path, $_GET["path"]));
    }

    public function addFolder()
    {
        $this->load->library("response_library");

        $folder_name = $_GET["folder_name"];
        $physical_path = FCPATH."/assets/plugins/summernote_gallery/".$folder_name;
        mkdir($physical_path);
        $this->response_library->responseJSON("0x0000-00000", "Create folder success.");
    }

    public function addSubFolder()
    {
        $this->load->library("response_library");

        $path = $_GET["path"];
        $folder_name = $_GET["folder_name"];
        $physical_path = FCPATH."/assets/plugins/summernote_gallery/".$path."/".$folder_name;
        mkdir($physical_path);
        $this->response_library->responseJSON("0x0000-00000", "Create sub folder success.");
    }

    public function renameFolder()
    {
        $this->load->library("response_library");

        $path = $_GET["path"];
        $parent_path = $_GET["parent_path"];
        $folder_name = $_GET["folder_name"];
        $physical_path = FCPATH."/assets/plugins/summernote_gallery/".$path;
        $new_physical_path = FCPATH."/assets/plugins/summernote_gallery/".$parent_path."/".$folder_name;
        rename($physical_path, $new_physical_path);
        $this->response_library->responseJSON("0x0000-00000", "Rename folder success.");
    }

    public function deleteFolder()
    {
        $this->load->library("summernote_gallery_library");
        $this->load->library("response_library");

        $path = $_GET["path"];
        $physical_path = FCPATH."/assets/plugins/summernote_gallery/".$path;
        $this->summernote_gallery_library->deleteFolder($physical_path);
        $this->response_library->responseJSON("0x0000-00000", "Delete folder success.");
    }

    public function upload()
    {
        $this->load->library("response_library");

        $path = $_GET["path"];
        $physical_path = FCPATH.'/assets/plugins/summernote_gallery/'.$path;

        $_FILES['upload_file']['name']= $_FILES['file']['name'];
        $_FILES['upload_file']['type']= $_FILES['file']['type'];
        $_FILES['upload_file']['tmp_name']= $_FILES['file']['tmp_name'];
        $_FILES['upload_file']['error']= $_FILES['file']['error'];
        $_FILES['upload_file']['size']= $_FILES['file']['size'];

        if ($_FILES['upload_file']['size'] != 0)
        {
            $fileName = $_FILES['upload_file']['name'];
            $config['file_name'] = $fileName;
            $config['upload_path'] = $physical_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '0';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $uploadCheck = $this->upload->do_upload("upload_file");
            if ($uploadCheck == 1) {
                $upload_data = $this->upload->data();
                $fileName =   $upload_data['file_name'];

                $this->response_library->responseJSON("0x0000-00000", "Upload image success.");
            }
            else
            {
                $this->response_library->responseJSON("0x0000-00001", $this->upload->display_error());
            }
        }
    }

    public function deleteImage()
    {
        $this->load->library("response_library");
        
        $file_path = $_GET["file_path"];
        $path = FCPATH."/assets/plugins/summernote_gallery/".$file_path;
        unlink($path);
        $this->response_library->responseJSON("0x0000-00000", "Delete image success.");
    }
}