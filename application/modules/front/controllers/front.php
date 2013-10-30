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
		$whereHead = array('status'=>1,'PageLocation'=>2);
	   	$whereFoot = array('status'=>1,'PageLocation'=>1);
	   	$data['pages'] = $this->front_model->get_datas('tblpages','HeaderPosition',$whereHead); //get Header Menu Name
		$data['slides'] = $this->front_model->get_datas('tblslider','SliderId'.''); //get slider 
		$data['categories'] = $this->front_model->get_datas('tblcategory','CategoryName',array('status'=>1)); //Category Name Listing in sidebar & category search
		$data['scategories'] = $this->front_model->get_datas('tblcategorychild','SCategoryName',array('status'=>1)); //SCategory Name Listing in sidebar 
		$data['fpages'] = $this->front_model->get_datas('tblpages','FooterPosition',$whereFoot);	 //get Footer Menu Name
		$this->template->set_template('defaultfront');
		$this->template->write_view('content', 'front/front_view',$data);
		$this->template->render();
	}
	//End Index Function
  #...................................##

#...................................##
	public function pages($slug)
	{
		$slug = site_url().$slug.'.html'; 
		$whereHead = array('status'=>1,'PageLocation'=>2);
	   	$whereFoot = array('status'=>1,'PageLocation'=>1);
	   	$data['pages'] = $this->front_model->get_datas('tblpages','HeaderPosition',$whereHead); //get Header Menu Name
	   	
	    $data['slides'] = ''; //No slides Need in Pages
		
		
	    $data['content'] = $this->front_model->get_single_row('tblpages', 'PageSlug', $slug); 
	    
	    //print_r($content);die;
	   // if( is_array($content)>0) {
	    	/*$data = array(
					'title' => $this->front_model->get_formatted($content->PageTitle),
					'content' =>  $this->front_model->get_formatted($content->PageContent)
					);*/
	   /* } /*else{
	    	$scontent = $this->front_model->get_single_row('tblpagechild', 'SPageSlug', $slug); // get Title n Content n slug of that SubPage
	    	if(is_array($scontent)>0){
	    		$data = array(
					'title ' => $this->front_model->get_formatted($scontent->SPageTitle ),
					'content' =>  $this->front_model->get_formatted($scontent->SPageContent )
				);
	    	}
	    	
	    }*/
	    
	    
		$data['fpages'] = $this->front_model->get_datas('tblpages','FooterPosition',$whereFoot); //get Footer Menu Name

		$this->template->set_template('defaultfront');
		$this->template->write_view('content', 'front/page_view',$data);
		$this->template->render();
	}
	//End Index Function
  #...................................##

  
}

/* End of file Front.php */
/* Location: ./application/modules/front/controllers/front.php */