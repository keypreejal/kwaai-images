<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ImagesList extends CI_Controller {

/**
	 * Images for this controller.
	 *	This page loads a Images Page of Kwaai
	 */
  #............begin constructor........................##
  public function __construct()
  {
   	 parent::__construct();    
	 $this->load->model('front/front_model');
  }
  #..............end constructor.......................##


	/**
		*Begin Index function for this controller
	 	* Thiis function Loads a Front form with a view name images_view.php
	*/


  #...................................##
	public function index()
	{
		$whereHead = array('status'=>1,'PageLocation'=>2);
	   	$whereFoot = array('status'=>1,'PageLocation'=>1);
	   	$data['pages'] = $this->front_model->get_datas('tblpages','HeaderPosition',$whereHead); //Get Page Name on Header
		$data['slides'] = ''; //No slides Needed in Image

		
	   	$data['categories'] = $this->front_model->get_datas('tblcategory','CategoryName',array('status'=>1)); //Category Name Listing in sidebar & category search
	   	$data['scategories'] = $this->front_model->get_datas('tblcategorychild','SCategoryName',array('status'=>1)); //SCategory Name Listing in sidebar 
	   	$data['orientations'] = $this->front_model->get_datas('tblorientation','OrName',array('status'=>1)); //Orientation Name Listing in sidebar 

		$data['fpages'] = $this->front_model->get_datas('tblpages','FooterPosition',$whereFoot);	//Get Page Name on Header
		$this->template->set_template('defaultfront');
		$this->template->write_view('content', 'imageslist/images_view',$data);
		$this->template->render();
	}
	//End Index Function
  #...................................##


  
}

/* End of file images.php */
/* Location: ./application/modules/front/controllers/images.php */