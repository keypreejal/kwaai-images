<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ckeditorconfig {

    public function __construct()
    {
        // Do something with $params
        $CI =& get_instance();
		$CI->load->library('ckeditor');
		$CI->load->library('ckfinder');
		//configure base path of ckeditor folder
        $CI->ckeditor->basePath =base_url().'asset/ckeditor/';
        //$this->ckeditor->config['toolbar'] = 'Full';
        $CI->ckeditor->config['toolbar'] = array(
                                                    array(
                                                     'Source', '-', 'Bold', 'Italic','Anchor',
                                                     'Image', 'Underline', '-','Cut',
                                                     'Copy','Paste','PasteText',
                                                     'PasteFromWord','-','Undo','Redo'
                                                     ,'-','NumberedList','BulletedList'
                                                    )
                                                );
        $CI->ckeditor->config['width'] = '600px';
        $CI->ckeditor->config['height'] = '250px'; 
        $CI->ckeditor->config['language'] = 'en';       
        //configure ckfinder with ckeditor config
        echo $CI->ckfinder->SetupCKEditor($CI->ckeditor,base_url().'asset/ckfinder');
		
    }
}

