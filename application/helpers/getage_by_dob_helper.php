<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
//Calculate age using date of birth

function age($date){
    $year_diff = '';
    $time = strtotime($date);
    if(FALSE === $time){
        return '';
    }

    $date = date('Y-m-d', $time);
    list($year,$month,$day) = explode("-",$date);
    $year_diff = date("Y") – $year;
    $month_diff = date("m") – $month;
    $day_diff = date("d") – $day;
    if ($day_diff < 0 || $month_diff < 0) $year_diff–;

    return $year_diff;
}