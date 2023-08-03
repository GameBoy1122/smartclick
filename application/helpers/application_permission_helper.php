<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function checkAdministratorPermission ($request_permission, $require_permission_key){
    $codeigniter_instance =& get_instance();
    $administrator_permissions = $codeigniter_instance->session->userdata("__administrator_permissions");
    $administrator_group_permissions = $codeigniter_instance->session->userdata("__administrator_group_permissions");

    if(isset($administrator_permissions[$request_permission]) && in_array($require_permission_key, $administrator_permissions[$request_permission])){
        return true;
    }
    else if(isset($administrator_group_permissions[$request_permission]) && in_array($require_permission_key, $administrator_group_permissions[$request_permission])){
        return true;
    }
    else{
        return false;
    }
}

function checkAuditorPermission ($request_permission, $require_permission_key){
    $codeigniter_instance =& get_instance();
    $auditor_permissions = $codeigniter_instance->session->userdata("__auditor_permissions");
    $auditor_group_permissions = $codeigniter_instance->session->userdata("__auditor_group_permissions");

    // print_r($auditor_group_permissions);
    // exit();

    if(isset($auditor_permissions[$request_permission]) && in_array($require_permission_key, $auditor_permissions[$request_permission])){
        return true;
    }
    // else if(isset($auditor_group_permissions[$request_permission]) && in_array($require_permission_key, $auditor_group_permissions[$request_permission])){
    //     return true;
    // }
    else{
        return false;
    }
}