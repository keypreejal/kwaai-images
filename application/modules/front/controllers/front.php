<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller {

/**
	 * Front Page for this controller.
	 *	This page loads a Front Page of Kwaai
	 */
  #............begin constructor........................##
  public function __construct()
  {
   	 parent::__construct();    
	 $this->load->model('front_model');
  }
  #..............end constructor.......................##


	/**
		*Begin Index function for this controller
	 	* Thiis function Loads a Front form with a view name Front_view.php
	*/


  #...................................##
	public function index()
	{
		$data['pages'] = $this->front_model->get_datas('tblpages','PageId');
		$data['slides'] = $this->front_model->get_datas('tblslider','SliderId');
		$this->template->set_template('defaultfront');
		$this->template->write_view('content', 'front/front_view',$data);
		$this->template->render();
	}
	//End Index Function
  #...................................##


  
}

/* End of file Front.php */
/* Location: ./application/modules/front/controllers/front.php */