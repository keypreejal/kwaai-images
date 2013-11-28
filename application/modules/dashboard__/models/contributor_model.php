<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Contributor_model extends CI_Model
{
	public $upload_path, $image_data, $thumb;
	//var $upload_path_path_url;

	function initialise($profileid,$pcode){
		parent::__construct();
		
		$this->upload_path = realpath(APPPATH. "../uploads/$profileid/$pcode");
		$this->thumb = realpath(APPPATH. "../uploads/$profileid/$pcode/thumb");
	}
	function do_upload($remaining_size = NULL){
		$config = array(
					/*these two are most*/
					'allowed_types' => 'jpg|jpeg|gif|png',
					'upload_path' => $this->upload_path,
					'max_size' => $remaining_size // 2MB only
					);
		
		/*loads upload library*/
		$this->load->library('upload',$config);
		
		if (!$this->upload->do_upload('upload_image')) {
		    $error = array('error' => $this->upload->display_errors());
		    //print_r($error);
		    redirect('dashboard',$error);
		} else {
		    $this->image_data = $this->upload->data('upload_image');
			//print_r($this->image_data);
			return 1;
		}

		
	}

	function do_resize($width,$height) {
		$lconfig = array(
					'source_image' => $this->image_data['full_path'],
					'allowed_types' => 'jpg|jpeg|gif|png', //only accept these file types
					'new_image' => $this->thumb.'/large/',
					'image_library' => 'gd2',
					'create_thumb' => FALSE,
					'maintain_ratio' => TRUE,
					'width' => $width[1],
					'height' => $height[1]
					);
		$mconfig = array(
					'source_image' => $this->image_data['full_path'],
					'allowed_types' => 'jpg|jpeg|gif|png', //only accept these file types
					'new_image' => $this->thumb.'/medium/',
					'image_library' => 'gd2',
					'create_thumb' => FALSE,
					'maintain_ratio' => TRUE,
					'width' => $width[2],
					'height' => $height[2]
					);
		$sconfig = array(
					'source_image' => $this->image_data['full_path'],
					'allowed_types' => 'jpg|jpeg|gif|png', //only accept these file types
					'new_image' => $this->thumb.'/small/',
					'image_library' => 'gd2',
					'create_thumb' => FALSE,
					'maintain_ratio' => TRUE,
					'width' => $width[3],
					'height' => $height[3]
					);
		$xsconfig = array(
					'source_image' => $this->image_data['full_path'],
					'allowed_types' => 'jpg|jpeg|gif|png', //only accept these file types
					'new_image' => $this->thumb.'/xsmall/',
					'image_library' => 'gd2',
					'create_thumb' => FALSE,
					'maintain_ratio' => TRUE,
					'width' => $width[4],
					'height' => $height[4]
					);
		$this->load->library('image_lib');
		
		if($this->image_data['is_image'] == 1){
			$this->image_lib->initialize($lconfig);
			$this->image_lib->resize();
			$this->image_lib->clear();
			$this->image_lib->initialize($mconfig);
			$this->image_lib->resize();
			$this->image_lib->clear();
			$this->image_lib->initialize($sconfig);
			$this->image_lib->resize();
			$this->image_lib->clear();
			$this->image_lib->initialize($xsconfig);
			$this->image_lib->resize();
		}
	}
}