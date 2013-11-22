<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Contributor_model extends CI_Model
{
	public $upload_path;
	//var $upload_path_path_url;

	function initialise($profileid,$pcode){
		parent::__construct();
		
		$this->upload_path = realpath(APPPATH. "../uploads/$profileid/$pcode");
		//echo $this->upload_path_path;die;

		//$this->upload_path_path_url = base_url().'uploads/pid/';
	}
	function do_upload(){
		$config = array(
					/*these two are most*/
					'allowed_types' => 'jpg|jpeg|gif|png',
					'upload_path' => $this->upload_path,
					//'max_size' => 2000 // 2MB only
					);
		//print_r($config);die;
		/*loads upload library*/
		$this->load->library('upload',$config);
		
		if (!$this->upload->do_upload('upload_image')) // input name (type file)
		{
		    $error = array('error' => $this->upload->display_errors());
		   // $this->load->view('upload_form',$error);
		   
		} else {
		    $image_data = $this->upload->data('upload_image');
			//print_r($image_data);die;
		}

		$config = array(
					'source_image' => $image_data['full_path'],
					'new_image' => $this->upload_path.'/thumbs',
					'maintain_ratio' => true,
					'width' => 150,
					'height' => 100
					);
		/*load image library*/
		$this->load->library('image_lib',$config);
		$this->image_lib->resize();


	}

	

   
}