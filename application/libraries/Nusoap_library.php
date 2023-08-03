<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Librarynusoap
{
    private $nusoap_client;
    public function __construct()
    {
        require_once APPPATH.'third_party/nusoap/nusoap.php';
    }

    public function initialServer()
    {
        $this->nusoap_server = new soap_server();
        return $this->nusoap_server;
    }

    public function initialClient($url)
    {
        $this->nusoap_client = new nusoap_client($url, 'wsdl');
        return $this->nusoap_client;
    }
}