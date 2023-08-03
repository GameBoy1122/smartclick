<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Fpdf_library
{
    public function __construct()
    {
        require_once APPPATH.'third_party/fpdf/custom_fpdf.php';
    }

    public function get()
    {
        $pdf = new custom_fpdf();
        return $pdf;
    }
}