<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller
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
        $this->load->view("AdministratorArea/Administrator/Index");
    }

    public function edit($administrator_id = null)
    {
        /** ------------------------------------------------------- **
         **           CONSTRUCT PHASE
        /** ------------------------------------------------------- **/
        
        $this->load->model("administrator_model");
        $this->load->model("administrator_group_model");
        $this->load->model("administrator_information_model");
        $this->load->model("administrator_permission_model");
        $this->load->model("administrator_permission_key_model");
        $this->load->model("administrator_group_permission_model");
        $this->load->model("administrator_group_permission_key_model");

        $this->load->library("encryption_library");
        $this->load->library("response_library");
        $this->load->library("guid_library");

        /** ------------------------------------------------------- **
         **           POST PHASE
        /** ------------------------------------------------------- **/
        if($this->input->post())
        {
            if($administrator_id != null)
            {
                $administrator = $this->administrator_model->find($administrator_id);
                $administrator->modified_date = date("Y-m-d h:i:s");
                $administrator->modified_by = $this->session->userdata("__administrator::administrator_id");
                // $one = false;
            }
            else
            {
                $administrator = new stdClass();
                $administrator->created_date = date("Y-m-d h:i:s");
                $administrator->created_by = $this->session->userdata("__administrator::administrator_id");
                // $one = true;
            }

            $administrator->username = $this->input->post("username");
            $administrator->email = $this->input->post("email");
            $administrator->administrator_group_id = $this->input->post("administrator_group_id");
            $administrator->status = $this->input->post("status");

            if($this->input->post("password") != "" && ($this->input->post("password") == $this->input->post("retype_password")))
            {
                $administrator->password = $this->encryption_library->encryptPassword($this->input->post("password"));
            }

            $administrator_validated = $this->administrator_model->validate($administrator);
            if($administrator_validated["code"] == "0x0000-00000")
            {
                $administrator_id = $this->administrator_model->save($administrator);
                
                // PERMISSION
                $model_filter = new stdClass();
                $model_filter->where["administrator_id"] = $administrator_id;
                $this->administrator_permission_model->delete($model_filter);
                $request_administrator_permissions = $this->input->post("administrator_permission");
                if(count($request_administrator_permissions) > 0)
                {
                    foreach($request_administrator_permissions as $request_administrator_permission_key => $request_administrator_permission)
                    {
                        $this->administrator_permission_model->saveAdministratorPermission($administrator_id, $request_administrator_permission_key, $request_administrator_permission);
                    }
                }

                $this->response_library->responseJSON($administrator_validated["code"], $administrator_validated["message"]);
            }
            else
            {
                $this->response_library->responseJSON($administrator_validated["code"], $administrator_validated["message"]);
            }
        }

        /** ------------------------------------------------------- **
         **           PROCESS PHASE
        /** ------------------------------------------------------- **/
        $administrator = $this->administrator_model->getAdministrator($administrator_id);

        $model_filter = new stdClass();
        $model_filter->where["status"] = "ACTIVATE";
        $administrator_group = $this->administrator_group_model->search($model_filter);

        $administrator_information = $this->administrator_information_model->getAdministratorInformationByAdministratorId($administrator_id);
        $administrator_permissions = $this->administrator_permission_model->getAdministratorPermissionsByAdministratorId($administrator_id);

        /** ------------------------------------------------------- **
         **           RENDER VIEW PHASE
        /** ------------------------------------------------------- **/
        $data = array(
            "administrator" => $administrator,
            "administrator_group" => $administrator_group,
            "administrator_information" => $administrator_information,
            "administrator_permissions" => $administrator_permissions
        );
        $this->load->view("AdministratorArea/Administrator/Edit",$data);
    }

    public function delete($administrator_id = null)
    {
        /** ------------------------------------------------------- **
         **           CONSTRUCT PHASE
        /** ------------------------------------------------------- **/
        $this->load->model("administrator_model");

        $this->load->library("response_library");

        /** ------------------------------------------------------- **
         **           PROCESS PHASE
        /** ------------------------------------------------------- **/
        $administrator = $this->administrator_model->find($administrator_id);
        $administrator->modified_date = date("Y-m-d h:i:s");
        $administrator->modified_by = $this->session->userdata("__administrator::administrator_id");
        $administrator->status = "REMOVED";
        // $administrator_validated = $this->Administrator->validate($administrator);
        $administrator_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");
        if($administrator_validated["code"] == "0x0000-00000")
        {
            $this->administrator_model->save($administrator);

            $this->response_library->responseJSON($administrator_validated["code"], $administrator_validated["message"]);
        }
        else
        {
            $this->response_library->responseJSON($administrator_validated["code"], $administrator_validated["message"]);
        }
    }

    /** ------------------------------------------------------- **
     **           ADDITIONAL SCRIPT
    /** ------------------------------------------------------- **/
    public function datatables()
    {
        
            $this->load->library("datatables_library");
            $this->load->model("administrator_model");

            $model_filter = new stdClass();
            $model_filter->join = array("administrator_group" => "administrator_group_id");
            $model_filter->custom_where = "administrator.status IN ('ACTIVATE','SUSPEND')";
            $administrator = $this->administrator_model->search($model_filter);

            // $count = count($administrator);

            // $administrator = array("meta"=>array("page" =>1,"pages"=>2, "perpage"=>-1,"total"=> $count,"sort"=>"asc","field"=>"administrator::administrator_id"),"data" => $administrator);

            print_r(json_encode($administrator)); 
       
    }

    // public function select2($function)
    // {
    //     $this->load->library("response_library");

    //     if($function == "edit_administrator_group")
    //     {
    //         $this->load->model("administrator_group_model");
    //         $model_filter = new stdClass();
    //         $model_filter->where["status"] = "ACTIVATE";
    //         $model_filter->custom_where = "administrator_group.administrator_group_id != '1'";
    //         if($this->input->get("search") != "")
    //         {
    //             $model_filter->like["name"] = $this->input->get("search");
    //         }
    //         $administrator_groups = $this->administrator_group_model->search($model_filter);
    //         $this->response_library->responseJSON("0x0000-00000", "Select2 data generated complete.", $administrator_groups);
    //     }
    // }
}