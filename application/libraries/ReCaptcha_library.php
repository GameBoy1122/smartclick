<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Libraryrecaptcha
{
    public function __construct()
    {
        require_once APPPATH.'third_party/Recaptchalib.php';
    }

    function render()
    {
        $codeigniter_instance =& get_instance();
        return recaptcha_get_html($codeigniter_instance->config->item('CAPTCHA_SITE_KEY'));
    }

    function check()
    {
        $codeigniter_instance =& get_instance();
        $resp = recaptcha_check_answer ($codeigniter_instance->config->item('CAPTCHA_SECRET_KEY'),
            $_SERVER["REMOTE_ADDR"],
            $_POST["recaptcha_challenge_field"],
            $_POST["recaptcha_response_field"]);

        if (!$resp->is_valid) {
            return false;
        } else {
            return true;
        }
    }

    function detail($token)
    {
        $codeigniter_instance =& get_instance();
        $file_path = fopen(FCPATH.'curl_logs/curl-process-log-'.date('Y-m-d').'.txt', 'a+');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $codeigniter_instance->config->item('CAPTCHA_URL'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_STDERR, $file_path);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            http_build_query(
                array(
                    'secret' => $codeigniter_instance->config->item('CAPTCHA_SECRET_KEY'),
                    'response' => $token
                )
            )
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        curl_close ($ch);

        return $server_output;
    }
}