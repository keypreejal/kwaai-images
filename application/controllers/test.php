<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('welcome_message');
		$this->load->model('front/front_model');

		$package_id = $this->front_model->get_single_data('tblprofile','PackageId','ProfileId',1); 
		$purchase_psize = $this->front_model->get_single_data('tblpackage','Size','PackageId',2);  
		$purchase_psize = intval($purchase_psize)*1024; // to mb
		//echo $purchase_psize;die;
		
    	$directory = APPPATH. "../uploads/1/";
		if(file_exists($directory)) {
			$this->load->library('directory_calculator');
    		$size_in = 'MB';
			$decimals = 2;
	    	$this->directory_calculator->size_in = $size_in;
	    	$this->directory_calculator->decimals = $decimals;
	    	$array = $this->directory_calculator->size($directory);
			$array['size'];
			echo $remaining_size = $purchase_psize - $array['size'];die;
    	} else{
    		//$remaining_size = $purchase_psize;
    		echo 'not found directory';die;
    	}


		
		$this->load->library('directory_calculator');
		$size_in = 'MB';
		$decimals = 2;
    	$this->directory_calculator->size_in = $size_in;
    	$this->directory_calculator->decimals = $decimals;
    	$array = $this->directory_calculator->size($directory);
		echo "The directory <em>".$directory."</em> has a size of ".$array['size']." ".$size_in.", ".$array['files']." files & ".$array['folders']." folders.";
		die;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */