<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."/third_party/phpexcel/PHPExcel.php";

class Php_excel_library extends PHPExcel
{
    public function __construct()
    {
        parent::__construct();

        PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
    }

    public function getHeaderTitleStyle()
    {
        $return = array(
            'font'  => array(
                'bold'  => true,
                'color' => array('rgb' => '000000'),
                'size'  => 15,
                'name'  => 'Verdana'
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
            )
        );
        return $return;
    }

    public function getHeaderPrefixStyle()
    {
        $return = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
            )
        );
        return $return;
    }

    public function getHeaderExtensionStyle()
    {
        $return = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
            )
        );
        return $return;
    }

    public function getLv1HeaderColumnStyle()
    {
        $return = array(
            'font'  => array(
                'color' => array('rgb' => '000000'),
                'size'  => 13,
                'name'  => 'Verdana'
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'CECECE')
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => '000000')
                )
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
            )
        );

        return $return;
    }

    public function getHeaderColumnStyle()
    {
        $return = array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'CECECE')
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => '000000')
                )
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
            )
        );

        return $return;
    }

    public function getHighlightSuccess()
    {
        $return = array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '3ADF00')
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => '000000')
                )
            )
        );

        return $return;
    }

    public function getHighlightWarning()
    {
        $return = array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'FFFF00')
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => '000000')
                )
            )
        );

        return $return;
    }
}