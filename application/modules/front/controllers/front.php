<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller {

	/**
	 * Front Page for this controller.
	 *	This page loads a Front Page of Kwaai
	 */
  	#............begin constructor........................##
  	public $data ,$langId;
	public function __construct()
	{
		parent::__construct();    
		$this->load->model('front_model');

		$langCode = $this->input->get('lang');
		$this->langId = $this->front_model->get_single_data('languagetypes','LangId','LangCode',$langCode);
		$whereHead = array('status'=>1,'HeaderPosition >='=>0,'PageLangId'=>$this->langId);
	   	$whereFoot = array('status'=>1,'FooterPosition >='=>0,'FooterPosition <'=>1000,'PageLangId'=>$this->langId);
	   	$whereSide = array('status'=>1,'FooterPosition >='=>0,'PageLangId'=>$this->langId);
	   	$whereLang = array('LangStatus'=>1);
	   	$this->data = array(
	   				'languages' =>$this->front_model->get_datas('languagetypes','LangName',$whereLang),	
					'pages' => $this->front_model->get_datas('tblpages','HeaderPosition',$whereHead,'PageSlug'), //get Header Menu Name
					'slides' => $this->front_model->get_datas('tblslider','SliderId'.''), //get slider 
					'categories' => $this->front_model->get_datas('tblcategory','CategoryName',array('status'=>1,'CatLangId'=>$this->langId),'CreatedAt'), //Category Name Listing category search
					'scategories' => $this->front_model->get_datas('tblcategorychild','SCategoryName',array('status'=>1,'IsFeatured'=>1,'SCatLangId'=>$this->langId),'CreatedAt'), //SCategory Name Listing in Browse by category 
					'fpages' => $this->front_model->get_datas('tblpages','FooterPosition',$whereFoot,'PageSlug'),	 //get Footer Menu Name
					'sidepages' => $this->front_model->get_datas('tblpages','FooterPosition',$whereSide,'PageSlug'),	 //get Footer Menu Name
					'facebook' => $this->front_model->get_single_data('tblsitesettings','Value','Name','facebook-link'),
					'twitter' => $this->front_model->get_single_data('tblsitesettings','Value','Name','twitter-link'),
					'gplus' => $this->front_model->get_single_data('tblsitesettings','Value','Name','google-plus'),

					//language constants values
					'sign_in' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sign_in',$this->langId),
					'register' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register',$this->langId),
					'shopping_baskets' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','shopping_baskets',$this->langId),
					'search_for_images' =>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','search_for_images',$this->langId),
					'search_btn' 	=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','search_btn',$this->langId),
					'category_search'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','category_search',$this->langId),
					'browse_by_category' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','browse_by_category',$this->langId),
					'make_money' =>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','make_money',$this->langId),
					'most_popular_pictures' =>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','most_popular_pictures',$this->langId),
					'package' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sign_in',$this->langId),
					'most_popular_pictures' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','most_popular_pictures',$this->langId),
					'subscription_options' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','subscription_options',$this->langId),
					'subscription_options_gstarted' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','subscription_options_gstarted',$this->langId),
					'sign_up_for_free' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sign_up_for_free',$this->langId),
					'sign_up_for_free_dregister' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sign_up_for_free_dregister',$this->langId),
					'search_tips' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','search_tips',$this->langId),
					'search_tips_dguide' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','search_tips_dguide',$this->langId),
					'my_account_head' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','my_account_head',$this->langId),
					'my_account_sign_up_free' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','my_account_sign_up_free',$this->langId),
					'need_help' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help',$this->langId),
					'need_help_faqs' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_faqs',$this->langId),
					'need_help_contact_us' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_contact_us',$this->langId),
					'need_help_site_map' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_site_map',$this->langId),
					'follow_us' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','follow_us',$this->langId),
					'all_right_reserve' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','all_right_reserve',$this->langId),
					'site_title'=> $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','site_title',$this->langId),

					);
	}
	#..............end constructor.......................##


	/**
		*Begin Index function for this controller
	 	* This function Loads a Front form with a view name Front_view.php
	*/
 	#............begin Index.......................##
	public function index()
	{
		$subcats = $this->front_model->get_datas('tblcategorychild','SCategoryName',array('status'=>1,'SCatLangId'=>$this->langId),'CreatedAt');
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
		
		$this->data['randoms'] = $randomfive;
		$this->template->set_template('defaultfront');
		$this->template->write_view('content', 'front/front_view',$this->data);
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
		$slug = $slug.'.html'; 
		$snslug = site_url().$slug; 
		$this->data['content'] = $this->front_model->get_single_row('tblpages', 'PageSlug', $snslug, 'PageLangId',$this->langId);  // get content of that page
	   	
	   	$hsp = $this->front_model->get_single_data('tblpages','HasSubPage','PageSlug',$this->data['content']->PageSlug); //see if it got subpage:1 or 0/Null
	   	$this->data['scontents'] ='';$pageid='';
	   	if($hsp == 1) { 
	   		$pagid = $this->data['content']->PageId;
	   		$pageid = $this->langId==3?$pagid-2:($this->langId==2?$pagid-1:$pagid);
	   		$this->data['scontents'] = $this->front_model->get_datas('tblpagechild', 'SPageTitle',array('PageId'=>$pageid,'Status'=>1,'SPageLangId'=>$this->langId),'CreatedAt');  // get content of that Subpage
	   	}

	 	$this->template->set_template('defaultfront');
		$this->template->write_view('content', 'front/page_view',$this->data);
		$this->template->render();
		
	}
	#............End pages Function......................
 }

/* End of file Front.php 
/* Location: ./application/modules/front/controllers/front.php */