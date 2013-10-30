<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

/**
	 * Front Page for this controller.
	 *	This page loads a Front Page of Kwaai
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
	 	* Thiis function Loads a Front form with a view name Front_view.php
	*/


  #...................................##
	public function index()
	{
		
	   	$whereHead = array('status'=>1,'PageLocation'=>2);
	   	$whereFoot = array('status'=>1,'PageLocation'=>1);
	   	$data['pages'] = $this->front_model->get_datas('tblpages','HeaderPosition',$whereHead); //Get Page Name on Header
		$data['slides'] = '';  //No slides Needed in Image
		$data['categories'] = $this->front_model->get_datas('tblcategory','CategoryName',array('status'=>1)); //Category Name Listing in sidebar & category search
		$data['fpages'] = $this->front_model->get_datas('tblpages','FooterPosition',$whereFoot);	 //Get Page Name on Header
		$this->template->set_template('defaultfront');
		$this->template->write_view('content', 'contact/contact_view',$data);
		$this->template->render();
	}
	//End Index Function
  #...................................##


  
}

/* End of file Front.php */
/* Location: ./application/modules/front/controllers/front.php */