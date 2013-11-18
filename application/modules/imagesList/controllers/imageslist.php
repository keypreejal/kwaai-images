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
		$langCode= $this->session->userdata('lang_arr');
		$langId = $this->front_model->get_single_data('languagetypes','LangId','LangCode',$langCode);
		$whereHead = array('status'=>1,'PageLocation'=>2,'PageLangId'=>$langId);
	   	$whereFoot = array('status'=>1,'FooterPosition >='=>0,'FooterPosition <'=>1000,'PageLangId'=>$langId);
	    $whereLang = array('LangStatus'=>1);
		$data = array(
					'languages' =>$this->front_model->get_datas('languagetypes','LangName',$whereLang),	
					'pages' => $this->front_model->get_datas('tblpages','HeaderPosition',$whereHead,'PageSlug'), //get Header Menu Name
					'categories' => $this->front_model->get_datas('tblcategory','CategoryName',array('status'=>1,'CatLangId'=>$langId),'CreatedAt'), //Category Name Listing in sidebar & category search
					'scategories' => $this->front_model->get_datas('tblcategorychild','SCategoryName',array('status'=>1,'SCatLangId'=>$langId),'CreatedAt'), //SCategory Name Listing in sidebar 
					'orientations' => $this->front_model->get_datas('tblorientation','OrName',array('status'=>1,'OrLangId'=>$langId),'CreatedAt'), //Orientation Name Listing in sidebar 
					'fpages' => $this->front_model->get_datas('tblpages','FooterPosition',$whereFoot,'PageSlug'),	 //get Footer Menu Name
					'facebook' => $this->front_model->get_single_data('tblsitesettings','Value','Name','facebook-link'),
					'twitter' => $this->front_model->get_single_data('tblsitesettings','Value','Name','twitter-link'),
					'gplus' => $this->front_model->get_single_data('tblsitesettings','Value','Name','google-plus'),

					//language constants values
					'sign_in' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sign_in',$langId),
					'register' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register',$langId),
					'shopping_baskets' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','shopping_baskets',$langId),
					'search_for_images' =>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','search_for_images',$langId),
					'search_btn' 	=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','search_btn',$langId),
					'category_search'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','category_search',$langId),
					'sidebar_search_fliter_title'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sidebar_search_fliter_title',$langId),
					'sidebar_search_fliter_image_type'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sidebar_search_fliter_image_type',$langId),
					'sidebar_search_fliter_category'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sidebar_search_fliter_category',$langId),
					'sidebar_search_fliter_orientation'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sidebar_search_fliter_orientation',$langId),
					'my_account_head' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','my_account_head',$langId),
					'my_account_sign_up_free' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','my_account_sign_up_free',$langId),
					'need_help' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help',$langId),
					'need_help_faqs' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_faqs',$langId),
					'need_help_contact_us' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_contact_us',$langId),
					'need_help_site_map' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_site_map',$langId),
					'follow_us' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','follow_us',$langId),
					'all_right_reserve' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','all_right_reserve',$langId),
					'site_title'=> $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','site_title',$langId),
					);
		$this->template->set_template('defaultfront');
		$this->template->write_view('content', 'imageslist/images_view',$data);
		$this->template->render();
	}
	#.............End Index Function......................##


  
}

/* End of file images.php */
/* Location: ./application/modules/front/controllers/images.php */