<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
    *Destroy Directory
    *Delete a directory including its contents.
*/
/***** 
*@dir - Directory to destroy 
*@virtual[optional]- whether a virtual directory 
*/  
function destroyDir($dir, $virtual = false)  
{  
    $ds = DIRECTORY_SEPARATOR;  
    $dir = $virtual ? realpath($dir) : $dir;  
    $dir = substr($dir, -1) == $ds ? substr($dir, 0, -1) : $dir;  
    if (is_dir($dir) && $handle = opendir($dir))  
    {  
        while ($file = readdir($handle))  
        {  
            if ($file == '.' || $file == '..')  
            {  
                continue;  
            }  
            elseif (is_dir($dir.$ds.$file))  
            {  
                destroyDir($dir.$ds.$file);  
            }  
            else  
            {  
                unlink($dir.$ds.$file);  
            }  
        }  
        closedir($handle);  
        rmdir($dir);  
        return true;  
    }  
    else  
    {  
        return false;  
    }  
}