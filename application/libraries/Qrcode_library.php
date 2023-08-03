<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Qrcode_library
{
    public function __construct()
    {
        require_once APPPATH.'third_party/phpqrcode/phpqrcode.php';
    }

    public function get($string, $path = null)
    {
        if($path != null)
        {
            QRcode::png($string, $path);
        }
        else
        {
            QRcode::png($string);
        }
    }
}
