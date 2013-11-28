<?php
/*
Credits: BitRepository.com
URL: http://www.bitrepository.com/web-programming/php/calculate-the-size-number-of-files-folders-of-a-directory.html
*/

class Directory_calculator {

    var $size_in;
	var $decimals;

    function calculate_whole_directory($directory)
    {
        if ($handle = opendir($directory)) 
        {
        $size = 0;
		$folders = 0;
		$files = 0;

        while (false !== ($file = readdir($handle))) 
		{
            if ($file != "." && $file != "..") 
			{
			    if(is_dir($directory.$file))
			    {
                $array = $this->calculate_whole_directory($directory.$file.'/');
                $size += $array['size'];
				$files += $array['files'];
				$folders += $array['folders'];
			    }
			    else
			    {
                $size += filesize($directory.$file);
				$files++;
			    }
            }
         }
         closedir($handle);
         }

		 $folders++;

    return array('size' => $size, 'files' => $files, 'folders' => $folders);
    }

	function size_calculator($size_in_bytes)
    {
        if($this->size_in == 'B')
        {
        $size = $size_in_bytes;
        }
        elseif($this->size_in == 'KB')
        {
        $size = (($size_in_bytes / 1024));
        }
        elseif($this->size_in == 'MB')
        {
        $size = (($size_in_bytes / 1024) / 1024);
        }
        elseif($this->size_in == 'GB')
        {
        $size = (($size_in_bytes / 1024) / 1024) / 1024;
        }

        $size = round($size, $this->decimals);

		return $size;
	}

	function size($directory)
	{
	$array = $this->calculate_whole_directory($directory);
	$bytes = $array['size'];
	$size = $this->size_calculator($bytes);
	$files = $array['files'];
	$folders = $array['folders'] - 1; // exclude the main folder

	return array('size'    => $size,
		         'files'   => $files,
		         'folders' => $folders);
	}
}
?>