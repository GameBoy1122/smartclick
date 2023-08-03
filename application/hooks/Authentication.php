<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Authentication {

    public function verifySession()
    {
        /** ------------------------------------------------------- **
         **           CONSTRUCT PHASE
         * /** ------------------------------------------------------- **/
        $codeigniter_instance =& get_instance();

        /** ------------------------------------------------------- **
         **           PROCESS PHASE
         * /** ------------------------------------------------------- **/
        $directory = strtolower($codeigniter_instance->router->directory);
        $controller = strtolower($codeigniter_instance->router->fetch_class());
        $function = strtolower($codeigniter_instance->router->fetch_method());

        if($controller != "authentication" && $function != "login")
        {
            if($directory == "administratorarea/")
            {
                $administrator_id = $codeigniter_instance->session->userdata("__administrator::administrator_id");

                if($administrator_id == null)
                {
                    $codeigniter_instance->session->sess_destroy();
                    redirect(base_url("Authentication/Login"));
                }
            }
            else if($directory == "auditorarea/")
            {
                $auditor_id = $codeigniter_instance->session->userdata("__auditor::auditor_id");

                if($auditor_id == null)
                {
                    $codeigniter_instance->session->sess_destroy();
                    redirect(base_url("Authentication/Login"));
                }
            }

            if($codeigniter_instance->config->item("FORCE_LOGOUT") == true)
            {
                $codeigniter_instance->session->sess_destroy();
                redirect(base_url("Authentication/Login"));
            }
        }
    }
}