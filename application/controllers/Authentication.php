<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		/** ------------------------------------------------------- **
		 **           CONSTRUCTION PHASE
		/** ------------------------------------------------------- **/
		$this->load->model("Administrator_model");
		$this->load->model("Administrator_authentication_model");
		$this->load->model("Administrator_information_model");
		$this->load->model("Administrator_permission_model");
		$this->load->model("Administrator_group_permission_model");
       
		$this->load->library("Encryption_library");
		$this->load->library("Mobile_detect_library");
		$this->load->library("Response_library");

		/** ------------------------------------------------------- **
		 **           PROCESS PHASE
		/** ------------------------------------------------------- **/
		if($this->input->post())
		{
			$username = $this->input->post('Username');
			$password = $this->input->post('Password');

            if($this->input->post("login_type") == "ADMINISTRATOR")
            {
                $model_filter = new stdClass();
                $model_filter->join = array(
                    "administrator_group" => "administrator_group_id"
                );
                $model_filter->custom_where = "(administrator.username = '".$username."' OR administrator.email = '".$username."') AND administrator.status = 'ACTIVATE' AND administrator_group.status = 'ACTIVATE'";
                $model_filter->get_first = true;

                $administrator = $this->Administrator_model->search($model_filter);



                if($administrator != null)
                {
                    $check_password = false;
                    if($this->encryption_library->verifyPassword($password, $administrator->{"administrator::password"}))
                    {
                        $check_password = true;
                    }
                    else if($this->encryption_library->verifyPassword($password, $administrator->{"administrator::temporary_password"}) && strtotime("now") <= strtotime($administrator->{"administrator::temporary_password_expire"}))
                    {
                        $check_password = true;
                    }

                    if($check_password == true)
                    {
                        $this->session->set_userdata(array("__login_type" => "ADMINISTRATOR"));
                        // COLLECT USER & USER GROUP DATA
                        $this->session->set_userdata(array("__administrator::administrator_id" => $administrator->{"administrator::administrator_id"}));
                        $this->session->set_userdata(array("__administrator::username" => $administrator->{"administrator::username"}));
                        $this->session->set_userdata(array("__administrator::email" => $administrator->{"administrator::email"}));
                        $this->session->set_userdata(array("__administrator_group::administrator_group_id" => $administrator->{"administrator_group::administrator_group_id"}));
                        $this->session->set_userdata(array("__administrator_group::name" => $administrator->{"administrator_group::name"}));

                        // COLLECT USER INFORMATION
                        $administrator_information = $this->Administrator_information_model->getAdministratorInformationByAdministratorId($administrator->{"administrator::administrator_id"});
                        $this->session->set_userdata(array("__administrator_information" => $administrator_information));

                        // COLLECT USER PERMISSION
                        $administrator_permissions = $this->Administrator_permission_model->getAdministratorPermissionsByAdministratorId($administrator->{"administrator::administrator_id"});
                        $this->session->set_userdata(array("__administrator_permissions" => $administrator_permissions));

                        // COLLECT USER GROUP PERMISSION
                        $administrator_group_permissions = $this->Administrator_group_permission_model->getAdministratorGroupPermissionsByAdministratorGroupId($administrator->{"administrator_group::administrator_group_id"});
                        $this->session->set_userdata(array("__administrator_group_permissions" => $administrator_group_permissions));

                        // STAMP AUTHENTICATION
                        $administrator_authentication = new stdClass();
                        $administrator_authentication->administrator_id = $administrator->{"administrator::administrator_id"};
                        $administrator_authentication->session = json_encode($this->session->userdata());
                        $administrator_authentication->user_agent = $this->input->user_agent();
                        $administrator_authentication->device_type = $this->mobile_detect_library->getDeviceType();
                        $administrator_authentication->device_model = $this->mobile_detect_library->getDeviceModel();
                        $administrator_authentication->device_os = $this->mobile_detect_library->getDeviceOS();
                        $administrator_authentication->login_date = date("Y-m-d H:i:s");
                        $administrator_authentication->online_date = date("Y-m-d H:i:s");
                        $administrator_authentication->online_area = "";

                        $this->Administrator_authentication_model->save($administrator_authentication);

                        $this->response_library->responseJSON("0x0000-00000", "Login Success. Session was created.");
                    }
                    else
                    {
                        $this->response_library->responseJSON("0x000A-AU001", "Username or Password incorrect.");
                    }
                }
                else
                {
                    $this->response_library->responseJSON("0x000A-AU001", "Username or Password incorrect.");
                }
            }
            else
            {
                $this->response_library->responseJSON("0x000A-AU001", "Username or Password incorrect.");
                
            }
		}

		$this->load->view('Authentication/Login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url("Authentication/Login"));
	}
}