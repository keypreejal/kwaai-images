<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	
	/**
	 * Register Page for this controller.
	 *	This page loads a Register User Page of Kwaai
	 */
  	#............begin constructor........................##
  	public $data;
	public function __construct()
	{
		 parent::__construct();    
		 $this->load->model('front/front_model');

		 $langCode = $this->input->get('lang');
		 $langId = $this->front_model->get_single_data('languagetypes','LangId','LangCode',$langCode);
		 $whereHead = array('status'=>1,'HeaderPosition >='=>0,'PageLangId'=>$langId);
	   	 $whereFoot = array('status'=>1,'FooterPosition >='=>0,'PageLangId'=>$langId);
	   	 $whereLang = array('LangStatus'=>1);

	   	 $this->data = array(
	   				'languages' =>$this->front_model->get_datas('languagetypes','LangName',$whereLang),	
					'pages' => $this->front_model->get_datas('tblpages','HeaderPosition',$whereHead,'PageSlug'), //get Header Menu Name
					'slides' => $this->front_model->get_datas('tblslider','SliderId'.''), //get slider 
					'categories' => $this->front_model->get_datas('tblcategory','CategoryName',array('status'=>1,'CatLangId'=>$langId),'CreatedAt'), //Category Name Listing category search
					'scategories' => $this->front_model->get_datas('tblcategorychild','SCategoryName',array('status'=>1,'IsFeatured'=>1,'SCatLangId'=>$langId),'CreatedAt'), //SCategory Name Listing in Browse by category 
					
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
					'need_help_faqs' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_faqs',$langId),
					'need_help_contact_us' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_contact_us',$langId),
					'need_help_site_map' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_site_map',$langId),
					'follow_us' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','follow_us',$langId),
					'all_right_reserve' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','all_right_reserve',$langId),
					'site_title'=> $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','site_title',$langId),

					);

	}
	#..............end constructor.......................##


	/**
		*Begin Index function for this controller
	 	* This function Loads a Register form with a view name register_view.php
	*/
 	#............begin Index.......................##
	public function index()
	{
		$this->template->set_template('defaultfront');
		$this->template->write_view('content', 'register_view',$this->data);
		$this->template->render();
	}
	#.............End Index Function......................##


	/**
		*Begin user function for this controller
	 	*This function Loads a user dashboard, checks which user & rediret to its respective dashboard
	*/
 	#............begin user Function.......................##
	public function user()
	{
		if ($this->input->post('submit')) {
			$ut = $this->input->post('user-type');
			if($ut == 'client') {
				/*
				get all user data
				$this->data[''] = .......
				*/
				$this->template->set_template('defaultfront');
				$this->template->write_view('content', 'client_dashboard_view',$this->data);
				$this->template->render();
			} else{
				$this->package();
			}
		} else{
			$this->template->set_template('defaultfront');
			$this->template->write_view('content', 'user_view',$this->data);
			$this->template->render();
		}
	}
	#............End user Function......................


	/**
		*Begin package function for this controller
	 	*This function is used to save the package the contributor chooses.
	*/
 	#............begin user Function.......................##
	public function package()
	{
		if ($this->input->post('submit')) {
			$this->template->set_template('defaultfront');
			$this->template->write_view('content', 'package_view',$this->data);
			$this->template->render();
		} 
	}

	/**
		*Begin cdashboard function for this controller
	 	*This function is used to save the package the contributor chooses and redirect to the contributor dashboard.
	*/
 	#............begin user Function.......................##
	public function cdashboard()
	{
		/*
		get all user data
		$this->data[''] = .......
		*/
		$this->template->set_template('defaultfront');
		$this->template->write_view('content', 'contributor_dashboard_view',$this->data);
		$this->template->render();
	}
 }


/* End of file Front.php */
/* Location: ./application/modules/register/controllers/register.php */