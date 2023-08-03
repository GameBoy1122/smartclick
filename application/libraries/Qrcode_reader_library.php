<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Qrcode_reader_library
{
    public function __construct()
    {
        require_once APPPATH.'third_party/qrcodereader/autoload.php';
    }

    public function read($path)
    {
        $QRCodeReader = new Libern\QRCodeReader\QRCodeReader();
        $qrcode_text = $QRCodeReader->decode($path);
        echo $qrcode_text;
    }
}