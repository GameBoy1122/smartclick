<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

// GET NAME
function getFullMonth ($month){
    $date_object   = DateTime::createFromFormat('!m', $month);
    return $date_object->format('F');
}
function getFullDayFromDate ($date){
    $name = date('l', strtotime($date));
    return $name;
}

// CHECK DATE
function checkWeekDay ($date){
    $week_day = date('w', strtotime($date));
    return ($week_day == 0 || $week_day == 6);
}

// MAKE DATE
function makeFullDate ($year, $month, $date, $mode = "LEADZERO"){
    if($mode == "LEADZERO"){
        return $year."-".str_pad($month,2,"0",STR_PAD_LEFT)."-".str_pad($date,2,"0",STR_PAD_LEFT);
    }else{
        return $year." ".$month." ".$date;
    }
}

