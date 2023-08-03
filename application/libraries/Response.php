<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Response
{
    public function responseJSON($code, $message, $data = null)
    {
        header('Content-Type: application/json');

        echo json_encode(array(
            "code" => $code,
            "message" => $message,
            "data" => $data,
        ));
        
        exit();
    }

    public function responseJSONGB($resultCode, $referenceNo, $gbpReferenceNo){
        header('Content-Type: application/json');

        echo json_encode(array(
            "resultCode" => $resultCode,
            "referenceNo" => $referenceNo,
            "gbpReferenceNo" => $gbpReferenceNo,
        ));
        
        exit();
    }
}