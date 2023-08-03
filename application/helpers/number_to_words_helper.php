<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function number_to_words_thai($number)
{
    $number = str_replace(",", "", $number);
    $num_decimals = "";

    if (strpos($number, '.') !== false) {
        list($number, $num_decimals) = explode('.', $number, 2);
        $num_decimals = (int)$num_decimals;
    }

    $numbers = array(
        '',
        'หนึ่ง',
        'สอง',
        'สาม',
        'สี่',
        'ห้า',
        'หก',
        'เจ็ด',
        'แปด',
        'เก้า',
        'สิบ'
    );

    $positions = array(
        '',
        'สิบ',
        'ร้อย',
        'พัน',
        'หมื่น',
        'แสน',
        'ล้าน'
    );

    $num_length = strlen($number);
    $result = '';
    $last_digit = '';

    for ($i = 0; $i < $num_length; $i++) {
        $digit = substr($number, $i, 1);
        $position = $num_length - $i - 1;

        if ($digit == '0') {
            if ($position % 6 == 0 && $result != '') {
                $result .= $positions[$position];
            }
        } else {
            if ($digit == '1' && $position % 6 == 1 && $result != '') {
                $result .= $positions[$position];
            } else {
                $result .= $numbers[$digit] . $positions[$position];
            }
        }

        $last_digit = $digit;
    }

    $result .= 'บาท';

    if ($num_decimals != "") {
        $result .= number_to_words_thai($num_decimals);
        $result .= 'สตางค์';
    }

    return $result;
}
