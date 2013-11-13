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
  	#............begin Index........................##
	public function index()
	{
		$langCode = $this->input->get('lang');
		$langId = $this->front_model->get_single_data('languagetypes','LangId','LangCode',$langCode);
		$whereHead = array('status'=>1,'PageLocation'=>2,'PageLangId'=>$langId);
	   	$whereFoot = array('status'=>1,'PageLocation'=>1,'PageLangId'=>$langId);
	    $whereLang = array('LangStatus'=>1);
		$data = array(
					'languages' =>$this->front_model->get_datas('languagetypes','LangName',$whereLang),	
					'pages' => $this->front_model->get_datas('tblpages','HeaderPosition',$whereHead,'PageSlug'), //get Header Menu Name
					'slides' => '', //No slides Needed in Image as requirement in Design
					'categories' => $this->front_model->get_datas('tblcategory','CategoryName',array('status'=>1,'CatLangId'=>$langId),'CreatedAt'), //Category Name Listing in sidebar & category search
					'scategories' => $this->front_model->get_datas('tblcategorychild','SCategoryName',array('status'=>1,'SCatLangId'=>$langId),'CreatedAt'), //SCategory Name Listing in sidebar 
					'orientations' => $this->front_model->get_datas('tblorientation','OrName',array('status'=>1,'OrLangId'=>$langId),'CreatedAt'), //Orientation Name Listing in sidebar 
					'fpages' => $this->front_model->get_datas('tblpages','FooterPosition',$whereFoot,'PageSlug'),	 //get Footer Menu Name
					'facebook' => $this->front_model->get_single_data('tblsitesettings','Value','Name','facebook-link'),
					'twitter' => $this->front_model->get_single_data('tblsitesettings','Value','Name','twitter-link'),
					'gplus' => $this->front_model->get_single_data('tblsitesettings','Value','Name','google-plus')
					);
		$this->template->set_template('defaultfront');
		$this->template->write_view('content', 'imageslist/images_view',$data);
		$this->template->render();
	}
	#.............End Index Function......................##


  
}

/* End of file images.php */
/* Location: ./application/modules/front/controllers/images.php */