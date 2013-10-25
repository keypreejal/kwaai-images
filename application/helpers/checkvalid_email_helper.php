<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
    *Validate email Address
    *E-mail validation is perhaps the most used validation in web forms, this code will validate email address and also optionally check the MX records of the domain provided in email address to make email validation more robust.
*/
function is_valid_email($email, $test_mx = false)  
{  
    if(eregi("^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email))  
        if($test_mx)  
        {  
            list($username, $domain) = split("@", $email);  
            return getmxrr($domain, $mxrecords);  
        }  
        else  
            return true;  
    else  
        return false;  
} 