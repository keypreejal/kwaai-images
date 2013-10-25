<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Img_Model extends CI_Model {
		public function __construct(){
			parent::__construct();
			$this->load->library('image_lib'); 
		}
		
		function resize($sourceimage,$destinationimage,$width,$height)
		{
			$config['new_image'] = $destinationimage;
			$config['allowed_types'] = 'jpg|jpeg|gif|png';//only accept these file types
			$config['image_library'] = 'gd2';
			$config['source_image']	= $sourceimage;
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = FALSE;
			$config['width'] = $width;
			$config['height'] = $height;
			$config['master_dim'] ='width';
			
			$this->image_lib->initialize($config);
			if(!$this->image_lib->resize()){
				$msg = $this->image_lib->display_errors();
			}else{
				
			$msg = '';
			}
			
			$this->image_lib->clear();
		}
		
		
		
	}
?>