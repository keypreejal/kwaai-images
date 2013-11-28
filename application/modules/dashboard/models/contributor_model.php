<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Contributor_model extends CI_Model
{
	public $base_dir, $upload_path, $pid, $pcode,$image_data, $thumb , $filename;
	//var $upload_path_path_url;

	function initialise($profileid,$pcode){
		parent::__construct();
		
		$this->upload_path = realpath(APPPATH. "../uploads/$profileid/$pcode/");
		$this->thumb = realpath(APPPATH. "../uploads/$profileid/$pcode/thumb/");
		$this->pid = $profileid;
		$this->pcode =  $pcode;
		$this->load->library('directory_calculator');
		$this->base_dir = APPPATH. "../uploads/$profileid/";
	}
	function do_upload($purchase_psize, $remaining_size, $width =NULL, $height= NULL){
		$ext = end(explode(".", $_FILES["upload_image"]["name"]));
		$this->filename = time().".$ext";
		$remaining_size = $remaining_size*1024; //KB
		
		$config = array(
					/*these two are most*/
					'file_name' => $this->filename,
					'allowed_types' => 'jpg|jpeg|gif|png',
					'upload_path' => $this->upload_path,
					'max_size' => $remaining_size,
					'dname' => 'actual',
					);
		
		/*loads upload library*/
		$this->load->library('upload',$config);
		
		if (!$this->upload->do_upload('upload_image')) {
		    $this->session->set_flashdata('upload_msg_error', $this->upload->display_errors());	
		    redirect('dashboard');
		} else {
			$resize_fail = 0;
		    $this->image_data = $this->upload->data('upload_image');
		    
		  	//calculate remaining size again
			$remaining_size = $this->calculate_size($this->base_dir, $purchase_psize);
			//resize for listing  thumb
			if($remaining_size >0){
				$listconfig = array(
					'source_image' => $this->image_data['full_path'],
					'allowed_types' => 'jpg|jpeg|gif|png', //only accept these file types
					'new_image' => $this->thumb.'/listing/', // to store in thumb folder
					'image_library' => 'gd2',
					'create_thumb' => FALSE,
					'maintain_ratio' => TRUE,
					'width' => 180,
					'height' => 108,
					'dname' => 'listing',
				);
				$this->do_resize($listconfig);
			}else{
				do_detach_all($this->upload_path);
				$this->session->set_flashdata('upload_msg_error','Unable to upload your image the package size exceeded !');	
		    	redirect('dashboard');
				//$resize_fail++;
			}

			//calculate remaining size again
			$remaining_size = $this->calculate_size($this->base_dir, $purchase_psize);
			//resize for detail thumb
			if($remaining_size >0){
				$detailconfig = array(
					'source_image' => $this->image_data['full_path'],
					'allowed_types' => 'jpg|jpeg|gif|png', //only accept these file types
					'new_image' => $this->thumb.'/detail/',
					'image_library' => 'gd2',
					'create_thumb' => FALSE,
					'maintain_ratio' => TRUE,
					'width' => 440,
					'height' => 269,
					'dname' => 'detail',
					);
				$this->do_resize($detailconfig);
			}else{
				do_detach_all($this->upload_path);
				$this->session->set_flashdata('upload_msg_error','Unable to upload your image the package size exceeded !');	
		    	redirect('dashboard');
				//$resize_fail++;
			}

			//insert to the database the actual size image
			$data_variation = array(
	  			'ProductCode' => $this->pcode,
	  			'ProductSize' => $this->image_data['file_size'],
	  			'ImageName' => $this->filename ,
	  			'ProductDimensionName' => $config['dname'],
	  			'ProductDimensions' => $this->image_data['image_width'].'x'.$this->image_data['image_height'],
	  		);
		  	$this->db->insert('tblproductvariations',$data_variation);
			return $resize_fail;
		}
	}

	function do_upload_create_thumbs($purchase_psize, $remaining_size, $width =NULL, $height= NULL) {
		$ext = end(explode(".", $_FILES["upload_image"]["name"]));
		$this->filename = time().".$ext";
		$remaining_size = $remaining_size*1024; //KB
		$config = array(
					/*these two are most*/
					'file_name' => $this->filename,
					'allowed_types' => 'jpg|jpeg|gif|png',
					'upload_path' => $this->upload_path,
					'max_size' => $remaining_size,
					'dname' => 'actual',
					);
		
		/*loads upload library*/
		$this->load->library('upload',$config);
		
		if (!$this->upload->do_upload('upload_image')) {
		    // $this->session->set_flashdata('upload_msg', $this->upload->display_errors());	
		    $this->session->set_flashdata('upload_msg_error','Unable to upload your image the package size exceeded !');	
		    redirect('dashboard');
		} else {
			$resize_fail = 0;
		    $this->image_data = $this->upload->data('upload_image');
		    
		    //calculate remaining size again
			$remaining_size = $this->calculate_size($this->base_dir, $purchase_psize);
			//resize for listing  thumb
			if($remaining_size >0){
				$listconfig = array(
					'source_image' => $this->image_data['full_path'],
					'allowed_types' => 'jpg|jpeg|gif|png', //only accept these file types
					'new_image' => $this->thumb.'/listing/',
					'image_library' => 'gd2',
					'create_thumb' => FALSE,
					'maintain_ratio' => TRUE,
					'width' => 180,
					'height' => 108,
					'dname' => 'listing',
				);
				$this->do_resize($listconfig);
			}else{
				$resize_fail++;
				do_detach_all($this->upload_path);
				$this->session->set_flashdata('upload_msg_error','Unable to upload your image the package size exceeded !');	
		    	redirect('dashboard');
			}

			//calculate remaining size again
			$remaining_size = $this->calculate_size($this->base_dir, $purchase_psize);
			//resize for detail thumb
			if($remaining_size >0){
				$detailconfig = array(
					'source_image' => $this->image_data['full_path'],
					'allowed_types' => 'jpg|jpeg|gif|png', //only accept these file types
					'new_image' => $this->thumb.'/detail/',
					'image_library' => 'gd2',
					'create_thumb' => FALSE,
					'maintain_ratio' => TRUE,
					'width' => 440,
					'height' => 269,
					'dname' => 'detail',
					);
				$this->do_resize($detailconfig);
			}else{
				$resize_fail++;
				do_detach_all($this->upload_path);
				$this->session->set_flashdata('upload_msg_error','Unable to upload your image the package size exceeded !');	
		    	redirect('dashboard');
			}

			//insert to the database the actual size image 
			$data_variation = array(
	  			'ProductCode' => $this->pcode,
	  			'ProductSize' => $this->image_data['file_size'],
	  			'ImageName' => $this->filename ,
	  			'ProductDimensionName' => $config['dname'],
	  			'ProductDimensions' => $this->image_data['image_width'].'x'.$this->image_data['image_height'],
	  		);
		  	$this->db->insert('tblproductvariations',$data_variation);

		  	//form resize other requested size dimension images
		  	//calculate remaining size again
			$remaining_size = $this->calculate_size($this->base_dir, $purchase_psize);
			//resize large thumb
			if($remaining_size >0){
				$lconfig = array(
					'source_image' => $this->image_data['full_path'],
					'allowed_types' => 'jpg|jpeg|gif|png', //only accept these file types
					'new_image' => $this->thumb.'/large/',
					'image_library' => 'gd2',
					'create_thumb' => FALSE,
					'maintain_ratio' => TRUE,
					'width' => $width[0],
					'height' => $height[0],
					'dname' => 'large',
					);
				$this->do_resize($lconfig);
			}else{
				$resize_fail++;
			}
			//calculate remaining size again
			$remaining_size = $this->calculate_size($this->base_dir , $purchase_psize);
			//resize medium thumb
			if($remaining_size >0){
				$mconfig = array(
					'source_image' => $this->image_data['full_path'],
					'allowed_types' => 'jpg|jpeg|gif|png', //only accept these file types
					'new_image' => $this->thumb.'/medium/',
					'image_library' => 'gd2',
					'create_thumb' => FALSE,
					'maintain_ratio' => TRUE,
					'width' => $width[1],
					'height' => $height[1],
					'dname' => 'medium'
					);
				$this->do_resize($mconfig);
			}else{
				$resize_fail++;
			}
			//calculate remaining size again
			$remaining_size = $this->calculate_size($this->base_dir , $purchase_psize);
			//resize small thumb
			if($remaining_size >0){
				$sconfig = array(
					'source_image' => $this->image_data['full_path'],
					'allowed_types' => 'jpg|jpeg|gif|png', //only accept these file types
					'new_image' => $this->thumb.'/small/',
					'image_library' => 'gd2',
					'create_thumb' => FALSE,
					'maintain_ratio' => TRUE,
					'width' => $width[2],
					'height' => $height[2],
					'dname' => 'small'
					);
				$this->do_resize($sconfig);
			}else{
				$resize_fail++;
			}
			//calculate remaining size again
			$remaining_size = $this->calculate_size($this->base_dir , $purchase_psize);
			//resize xsmall thumb
			if($remaining_size >0){
				$xsconfig = array(
					'source_image' => $this->image_data['full_path'],
					'allowed_types' => 'jpg|jpeg|gif|png', //only accept these file types
					'new_image' => $this->thumb.'/xsmall/',
					'image_library' => 'gd2',
					'create_thumb' => FALSE,
					'maintain_ratio' => TRUE,
					'width' => $width[3],
					'height' => $height[3],
					'dname' => 'xsmall'
					);
				$this->do_resize($xsconfig);
			}else{
				$resize_fail++;
			}
			return $resize_fail;
		}
	}

	
	function calculate_size($dir_path, $purchase_psize) {
		$directory = $dir_path;
		//echo $directory;die;
    	$remaining_size;
    	if(file_exists($directory)) {
    		$size_in = 'MB';
			$decimals = 2;
	    	$this->directory_calculator->size_in = $size_in;
	    	$this->directory_calculator->decimals = $decimals;
	    	$array = $this->directory_calculator->size($directory);
	    	$remaining_size = $purchase_psize - $array['size'];
	    }
	    return $remaining_size;
	}
	function do_resize($config) {
		$this->load->library('image_lib');
		if($this->image_data['is_image'] == 1){
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();

			//get the size occupied by the resize image
			$dname = $config['dname'];
			$directory = APPPATH. "../uploads/$this->pid/$this->pcode/thumb/$dname/";
			if(file_exists($directory)) {
	    		$size_in = 'MB';
				$decimals = 2;
		    	$this->directory_calculator->size_in = $size_in;
		    	$this->directory_calculator->decimals = $decimals;
		    	$array = $this->directory_calculator->size($directory);
	    	}
	    	
	    	//insert to the database 
			$data_variation = array(
	  			'ProductCode' => $this->pcode,
	  			'ProductSize' => $array['size'],
	  			'ImageName' => $this->filename,
	  			'ProductDimensionName' => $dname,
	  			'ProductDimensions' => $config['width'].'x'.$config['height'],
	  		);
		  	$this->db->insert('tblproductvariations',$data_variation);
		}
	}

	function do_detach_all($del_dirpath){
		// $mydir = $del_dirpath; 
		// $d = dir($mydir); 
		// while($entry = $d->read()) { 
		//  if ($entry!= "." && $entry!= "..") { 
		//  unlink($entry); 
		//  } 
		// } 
		// $d->close(); 
		// rmdir($mydir); 
		$files = array_diff(scandir($del_dirpath), array('.','..'));
		foreach ($files as $file) {
		    (is_dir("$dir/$file")) ? do_detach_all("$del_dirpath/$file") : unlink("$del_dirpath/$file");
		}
		return rmdir($dir);
	}


	// function do_upload($file_path,$purchase_psize, $remaining_size = NULL , $width, $height){
		
	// 	$resize_fail = 0;
	    
	//     //calculate remaining size again
	// 	$remaining_size = $this->calculate_size($this->base_dir, $purchase_psize);
	// 	//resize large thumb
	// 	if($remaining_size >0){
	// 		$lconfig = array(
	// 			'source_image' => $file_path,
	// 			'allowed_types' => 'jpg|jpeg|gif|png', //only accept these file types
	// 			'new_image' => $this->thumb.'\large',
	// 			'image_library' => 'gd2',
	// 			'create_thumb' => FALSE,
	// 			'maintain_ratio' => TRUE,
	// 			'width' => $width[0],
	// 			'height' => $height[0]
	// 			);
	// 		//print_r($lconfig);die;
	// 		$this->do_resize($lconfig);
	// 	}else{
	// 		return $resize_fail+1; 
	// 		exit;
	// 	}

	// 	//die;
	// 	//calculate remaining size again
	// 	$remaining_size = $this->calculate_size($this->base_dir , $purchase_psize);
	// 	//resize medium thumb
	// 	if($remaining_size >0){
	// 		$mconfig = array(
	// 			'source_image' => $file_path,
	// 			'allowed_types' => 'jpg|jpeg|gif|png', //only accept these file types
	// 			'new_image' => $this->thumb.'\medium',
	// 			'image_library' => 'gd2',
	// 			'create_thumb' => FALSE,
	// 			'maintain_ratio' => TRUE,
	// 			'width' => $width[1],
	// 			'height' => $height[1]
	// 			);
	// 		$this->do_resize($mconfig);
	// 	}else{
	// 		return $resize_fail+2; 
	// 		exit;
	// 	}

	// 	//calculate remaining size again
	// 	$remaining_size = $this->calculate_size($this->base_dir , $purchase_psize);
	// 	//resize small thumb
	// 	if($remaining_size >0){
	// 		$sconfig = array(
	// 			'source_image' => $file_path,
	// 			'allowed_types' => 'jpg|jpeg|gif|png', //only accept these file types
	// 			'new_image' => $this->thumb.'\small',
	// 			'image_library' => 'gd2',
	// 			'create_thumb' => FALSE,
	// 			'maintain_ratio' => TRUE,
	// 			'width' => $width[2],
	// 			'height' => $height[2]
	// 			);
	// 		$this->do_resize($sconfig);
	// 	}else{
	// 		return $resize_fail+3; 
	// 		exit;
	// 	}

		
	// 	//calculate remaining size again
	// 	$remaining_size = $this->calculate_size($this->base_dir , $purchase_psize);
	// 	//resize xsmall thumb
	// 	if($remaining_size >0){
	// 		$xsconfig = array(
	// 			'source_image' => $file_path,
	// 			'allowed_types' => 'jpg|jpeg|gif|png', //only accept these file types
	// 			'new_image' => $this->thumb.'\xsmall',
	// 			'image_library' => 'gd2',
	// 			'create_thumb' => FALSE,
	// 			'maintain_ratio' => TRUE,
	// 			'width' => $width[3],
	// 			'height' => $height[3]
	// 			);
	// 		$this->do_resize($xsconfig);
	// 	}else{
	// 		return $resize_fail+4; 
	// 		exit;
	// 	}
	// 	return $resize_fail;
		
	// }

	


	// function do_resize($config) {
	// 	$this->load->library('image_lib');
	// 	//if($this->image_data['is_image'] == 1){
	// 	$this->image_lib->initialize($config);
	// 	$this->image_lib->resize();
	// 	$this->image_lib->clear();
	// 	//}
	// }
}