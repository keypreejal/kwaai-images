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
	 	* This function Loads a Front form with a view name Front_view.php
	*/
 	#............begin Index.......................##
	public function index()
	{
		$langCode = $this->input->get('lang');
		$langId = $this->front_model->get_single_data('languagetypes','LangId','LangCode',$langCode);
		$whereHead = array('status'=>1,'HeaderPosition >='=>0,'PageLangId'=>$langId);
	   	$whereFoot = array('status'=>1,'FooterPosition >='=>0,'PageLangId'=>$langId);
	   	$whereLang = array('LangStatus'=>1);
	   	
	   	$subcats = $this->front_model->get_datas('tblcategorychild','SCategoryName',array('status'=>1,'SCatLangId'=>$langId),'CreatedAt');
	   	$countcat = count($subcats);
		for($i=0;$i<5;$i++) { // random 5 subcategory
			if($countcat>=5){
	   			$index = array_rand($subcats);
		   		$randomfive[] = $subcats[$index];
		   		unset($subcats[$index]);
	   		}
			else{
				$randomfive = $subcats;
			}	
		}
		$data = array(
	   				'languages' =>$this->front_model->get_datas('languagetypes','LangName',$whereLang),	
					'pages' => $this->front_model->get_datas('tblpages','HeaderPosition',$whereHead,'PageSlug'), //get Header Menu Name
					'slides' => $this->front_model->get_datas('tblslider','SliderId'.''), //get slider 
					'categories' => $this->front_model->get_datas('tblcategory','CategoryName',array('status'=>1,'CatLangId'=>$langId),'CreatedAt'), //Category Name Listing category search
					'scategories' => $this->front_model->get_datas('tblcategorychild','SCategoryName',array('status'=>1,'IsFeatured'=>1,'SCatLangId'=>$langId),'CreatedAt'), //SCategory Name Listing in Browse by category 
					'randoms' =>$randomfive,
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
					'browse_by_category' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','browse_by_category',$langId),
					'make_money' =>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','make_money',$langId),
					'most_popular_pictures' =>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','most_popular_pictures',$langId),
					'package' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sign_in',$langId),
					'most_popular_pictures' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','most_popular_pictures',$langId),
					'subscription_options' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','subscription_options',$langId),
					'subscription_options_gstarted' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','subscription_options_gstarted',$langId),
					'sign_up_for_free' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sign_up_for_free',$langId),
					'sign_up_for_free_dregister' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sign_up_for_free_dregister',$langId),
					'search_tips' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','search_tips',$langId),
					'search_tips_dguide' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','search_tips_dguide',$langId),
					'my_account_head' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','my_account_head',$langId),
					'my_account_sign_up_free' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','my_account_sign_up_free',$langId),
					'need_help' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help',$langId),
					'need_help_search_tips' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_search_tips',$langId),
					'need_help_contact_us' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_contact_us',$langId),
					'need_help_site_map' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_site_map',$langId),
					'follow_us' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','follow_us',$langId),
					'all_right_reserve' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','all_right_reserve',$langId),
					'site_title'=> $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','site_title',$langId),

					);
		
		$this->template->set_template('defaultfront');
		$this->template->write_view('content', 'front/front_view',$data);
		$this->template->render();
	}
	#.............End Index Function......................##


	/**
		*Begin page function for this controller
	 	* This function Loads a pages content, takes slug as a parameter with a view name page_view.php
	*/
 	#............begin pages Function.......................##
	public function pages($slug)
	{
		$slug = site_url().$slug.'.html'; 
		$langCode = $this->input->get('lang');
		$langId = $this->front_model->get_single_data('languagetypes','LangId','LangCode',$langCode);
		$whereHead = array('status'=>1,'HeaderPosition >='=>0,'PageLangId'=>$langId);
	   	$whereFoot = array('status'=>1,'FooterPosition >='=>0,'PageLangId'=>$langId);
	   	$whereLang = array('LangStatus'=>1);
	    $data = array(
	    			'languages' =>$this->front_model->get_datas('languagetypes','LangName',$whereLang),	
					'pages' => $this->front_model->get_datas('tblpages','HeaderPosition',$whereHead,'PageSlug'), //get Header Menu Name
					'categories' => $this->front_model->get_datas('tblcategory','CategoryName',array('status'=>1,'CatLangId'=>$langId),'CreatedAt'), //Category Name Listing in sidebar & category search
					'content' => $this->front_model->get_single_row('tblpages', 'PageSlug', $slug, 'PageLangId',$langId),  // get content of that page
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
					'browse_by_category' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','browse_by_category',$langId),
					'make_money' =>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','make_money',$langId),
					'most_popular_pictures' =>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','most_popular_pictures',$langId),
					'package' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sign_in',$langId),
					'most_popular_pictures' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','most_popular_pictures',$langId),
					'subscription_options' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','subscription_options',$langId),
					'subscription_options_gstarted' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','subscription_options_gstarted',$langId),
					'sign_up_for_free' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sign_up_for_free',$langId),
					'sign_up_for_free_dregister' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sign_up_for_free_dregister',$langId),
					'search_tips' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','search_tips',$langId),
					'search_tips_dguide' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','search_tips_dguide',$langId),
					'my_account_head' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','my_account_head',$langId),
					'my_account_sign_up_free' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','my_account_sign_up_free',$langId),
					'need_help' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help',$langId),
					'need_help_search_tips' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_search_tips',$langId),
					'need_help_contact_us' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_contact_us',$langId),
					'need_help_site_map' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_site_map',$langId),
					'follow_us' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','follow_us',$langId),
					'all_right_reserve' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','all_right_reserve',$langId),
					'site_title'=> $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','site_title',$langId),
					);
	   	
	   	
		$this->template->set_template('defaultfront');
		$this->template->write_view('content', 'front/page_view',$data);
		$this->template->render();
		
	}
	#............End pages Function......................
 }

/* End of file Front.php */
/* Location: ./application/modules/front/controllers/front.php */