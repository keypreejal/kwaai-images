<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
//this helper allows you to check the data format and returns true if it is in YYYY-MM-DD format
function checkDateFormat($date)
{
    //match the format of the date
    if (preg_match ("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $date, $parts))
    {
        //check weather the date is valid of not
        if(checkdate($parts[2],$parts[3],$parts[1]))
            return true;
        else
        return false;
    }
    else
        return false;
}