<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['RESPONSE_CODE'] = array(
    '200' => array(
        'CODE'      => '0x0000-00000',
        'MESSAGE'   => 'Process Request Complete.'
    ),
    '400' => array(
        'CODE'      => '0x8000-00000',
        'MESSAGE'   => 'กรุณากรอกข้อมูลให้ครบ'
    ),
    '405' => array(
        'CODE'      => '0x9000-00000',
        'MESSAGE'   => 'Method Invalid.'
    )
);
