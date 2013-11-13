<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
    *Force file Download
    *Provide files to the user by forcing them to download.
*/
/******************** 
*@file - path to file 
*/  
function force_download($file)  
{  
    if ((isset($file))&&(file_exists($file))) {  
       header("Content-length: ".filesize($file));  
       header('Content-Type: application/octet-stream');  
       header('Content-Disposition: attachment; filename="' . $file . '"');  
       readfile("$file");  
    } else {  
       echo "No file selected";  
    }  
}  