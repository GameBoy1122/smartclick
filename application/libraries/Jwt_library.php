<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Libraryjwt
{
    private $jwt_instance;
    public function __construct()
    {
        require_once APPPATH.'third_party/jwt/JWT.php';
        require_once APPPATH.'third_party/jwt/BeforeValidException.php';
        require_once APPPATH.'third_party/jwt/ExpiredException.php';
        require_once APPPATH.'third_party/jwt/SignatureInvalidException.php';
    }

    public function instance()
    {
        $this->jwt_instance = new \Firebase\JWT\JWT;
        return $this->jwt_instance;
    }

    public function encode($pay_load,$key=null)
    {
        $codeigniter_instance =& get_instance();
        if($key == null)
        {
            $key = $codeigniter_instance->config->item('JWT_DEFAULT_KEY');
        }
        $this->jwt_instance = new \Firebase\JWT\JWT;
        try
        {
            $encoded = $this->jwt_instance->encode($pay_load, $key);
            return $encoded;
        }
        catch (Exception $exception)
        {
            return null;
        }
    }

    public function decode($encoded,$key=null)
    {
        $codeigniter_instance =& get_instance();
        if($key == null)
        {
            $key = $codeigniter_instance->config->item('JWT_DEFAULT_KEY');
        }
        $this->jwt_instance = new \Firebase\JWT\JWT;
        try
        {
            $decoded = $this->jwt_instance->decode($encoded, $key, array('HS256'));
            return $decoded;
        }
        catch (Exception $exception)
        {
            return null;
        }
    }
}