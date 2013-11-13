    <?php
   
     
    if ( ! function_exists('absolute_path'))
     
    {
     
        function absolute_path($path = '')
     
        {
     
            $abs_path = str_replace('system/',$path, BASEPATH);
     
            //Add a trailing slash if it doesn't exist.
     
            $abs_path = preg_replace("#([^/])/*$#", "\\1/", $abs_path);
     
            return $abs_path;
     
        }
     
    }