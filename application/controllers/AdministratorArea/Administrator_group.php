<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator_group extends CI_Controller
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
        $this->load->view("AdministratorArea/AdministratorGroup/Index");
	}

	public function edit($administrator_group_id = null)
	{
		/** ------------------------------------------------------- **
		 **           CONSTRUCT PHASE
		/** ------------------------------------------------------- **/
		$this->load->model("administrator_group_model");
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

            $administrator_group_id = $this->input->post('administrator_group_id');
            if($administrator_group_id != null)
            {
                $administrator_group = $this->administrator_group_model->find($administrator_group_id);
                $administrator_group->modified_date = date("Y-m-d h:i:s");
                $administrator_group->modified_by = $this->session->userdata("__administrator::administrator_id");
            }
            else
            {
                $administrator_group = new stdClass();
                $administrator_group->created_date = date("Y-m-d h:i:s");
                $administrator_group->created_by = $this->session->userdata("__administrator::administrator_id");
            }

            $administrator_group->name = $this->input->post("name");
            $administrator_group->status = $this->input->post("status");

            // $administrator_group_validated = $this->administrator_group_model->validate($administrator_group);
            $administrator_group_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");
            if($administrator_group_validated["code"] == "0x0000-00000")
            {
                $administrator_group_id = $this->administrator_group_model->save($administrator_group);

                // PERMISSION
                $model_filter = new stdClass();
                $model_filter->where["administrator_group_id"] = $administrator_group_id;
                $this->administrator_group_permission_model->delete($model_filter);


                $request_administrator_group_permissions = $this->input->post("switch[]");

                if(count($request_administrator_group_permissions) > 0)
                {
                    foreach($request_administrator_group_permissions as $request_administrator_group_permission_key => $request_administrator_group_permission)
                    {

                        $model_filter_permissions = new stdClass();
                        $model_filter_permissions->administrator_group_permission_key_id = $request_administrator_group_permission_key;
                        $model_filter_permissions->administrator_group_id = $administrator_group_id;
                        $model_filter_permissions->permission = '["'.$request_administrator_group_permission.'"]';

                        $administrator_group_permission_id = $this->administrator_group_permission_model->save($model_filter_permissions);

                        


                        // $this->administrator_group_permission_model->saveAdministratorGroupPermission($administrator_group_id, $request_administrator_group_permission_key, $request_administrator_group_permission);
                    }
                }

                $this->response_library->responseJSON($administrator_group_validated["code"], $administrator_group_validated["message"]);
            }
            else
            {
                $this->response_library->responseJSON($administrator_group_validated["code"], $administrator_group_validated["message"]);
            }
        }

		/** ------------------------------------------------------- **
		 **           PROCESS PHASE
		/** ------------------------------------------------------- **/
        $administrator_group = $this->administrator_group_model->find($administrator_group_id);
        // $administrator_group_permissions = $this->administrator_group_permission_model->getAdministratorGroupPermissionsByAdministratorGroupId($administrator_group_id);

        $model_filter = new stdClass();
        $model_filter->where["administrator_group_id"] = $administrator_group_id;
        $administrator_group_permissions = $this->administrator_group_permission_model->search($model_filter);


		/** ------------------------------------------------------- **
		 **           RENDER VIEW PHASE
		/** ------------------------------------------------------- **/
        $data = array(
            "administrator_group" => $administrator_group,
            "administrator_group_permissions" => $administrator_group_permissions
        );
        $this->load->view("AdministratorArea/AdministratorGroup/Edit",$data);
	}

    public function delete($administrator_id = null)
    {
        /** ------------------------------------------------------- **
         **           CONSTRUCT PHASE
        /** ------------------------------------------------------- **/
        $this->load->model("administrator_group_model");

        $this->load->library("response_library");

        /** ------------------------------------------------------- **
         **           PROCESS PHASE
        /** ------------------------------------------------------- **/
        $administrator_group = $this->administrator_group_model->find($administrator_id);
        $administrator_group->modified_date = date("Y-m-d h:i:s");
        $administrator_group->modified_by = $this->session->userdata("__administrator::administrator_id");
        $administrator_group->status = "REMOVED";
        $administrator_group_validated = $this->administrator_group_model->validate($administrator_group);
        if($administrator_group_validated["code"] == "0x0000-00000")
        {
            $this->administrator_group_model->save($administrator_group);

            $this->response_library->responseJSON($administrator_group_validated["code"], $administrator_group_validated["message"]);
        }
        else
        {
            $this->response_library->responseJSON($administrator_group_validated["code"], $administrator_group_validated["message"]);
        }
    }

    /** ------------------------------------------------------- **
     **           ADDITIONAL SCRIPT
    /** ------------------------------------------------------- **/
    public function datatables()
    {
            $this->load->library("datatables_library");
            $this->load->model("administrator_group_model");

            $model_filter = new stdClass();
            $model_filter->where["status"] = "ACTIVATE";
            $administrator_group = $this->administrator_group_model->search($model_filter);

            print_r(json_encode($administrator_group)); 

    }
}