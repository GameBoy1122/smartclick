<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Libraryemail
{
    public function sendEmail($message,$to_email,$subject)
    {
        $codeigniter_instance =& get_instance();

        $from_name = $codeigniter_instance->config->item('EMAIL_SYSTEM_NAME');
        $from_email = $codeigniter_instance->config->item('EMAIL_SYSTEM_EMAIL');

        $config["protocol"] = $codeigniter_instance->config->item('EMAIL_PROTOCOL');
        $config["smtp_host"] = $codeigniter_instance->config->item('EMAIL_HOST');
        $config["smtp_port"] = $codeigniter_instance->config->item('EMAIL_PORT');
        $config["smtp_user"] = $codeigniter_instance->config->item('EMAIL_USERNAME');
        $config["smtp_pass"] = $codeigniter_instance->config->item('EMAIL_PASSWORD');
        $config["mailtype"] = $codeigniter_instance->config->item('EMAIL_TYPE');
        $config["charset"] = $codeigniter_instance->config->item('EMAIL_CHARSET');
        $config["newline"] = "\r\n";

        $codeigniter_instance->load->library("email",$config);
        $codeigniter_instance->email->from($codeigniter_instance->config->item('EMAIL_USERNAME'),$codeigniter_instance->config->item('WEBSITE_NAME'));
        $codeigniter_instance->email->to($to_email);
        $codeigniter_instance->email->subject($subject);
        $codeigniter_instance->email->message($message);
        if($codeigniter_instance->email->send()){
            return true;
        }else{
            return false;
        }
    }

    public function userAuthenticationForgotPassword($user)
    {
        $codeigniter_instance =& get_instance();

        $user_object = new stdClass();
        $user_object->administrartor_user_id = $user->user_id;
        $user_object->username = $user->username;
        $user_object->temporary_password = $user->temporary_password;
        $user_object->temporary_password_expire = $user->temporary_password_expire;

        $url = base_url("UserArea/Authentication/ResetPassword/")."?message=".base64_encode(json_encode($user_object));
        $data = array(
            "user" => $user,
            "url" => $url
        );

        $message = $codeigniter_instance->load->view("EmailTemplate/UserAuthenticationForgotPassword",$data,true);
        $response = $this->sendEmail($message,$user->email,$codeigniter_instance->config->item('WEBSITE_NAME')." : Password Recovery");

        return $response;
    }
}