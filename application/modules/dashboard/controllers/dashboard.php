<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Front_Controller {

	/**
	 * Dashboard Page for this controller.
	 *	This page loads a Dashboard User Page of Kwaai
	 */
  	#............begin constructor........................##
  	public $data;
	public function __construct()
	{
		parent::__construct();    
		$this->load->model('front/front_model');

		$langCode= $this->session->userdata('lang_arr');
		
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
					'search_btn' =>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','search_btn',$langId),
					'category_search'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','category_search',$langId),
					
					'name'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','name',$langId),
					'register_left_companyname'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_left_companyname',$langId),
					'phone'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','phone',$langId),
					'email_address'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','email_address',$langId),
					'password'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','password',$langId),
					'cpassword'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','cpassword',$langId),
					'register_left_create_account'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_left_create_account',$langId),
					'register_user_subscription'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_user_subscription',$langId),
					'register_user_subscription_plan'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_user_subscription_plan',$langId),
					'register_user_subscription_tlbpackage'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_user_subscription_tlbpackage',$langId),
					'register_user_subscription_tlbsize'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_user_subscription_tlbsize',$langId),
					'register_user_subscription_tlbyear'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_user_subscription_tlbyear',$langId),

					'client_dashboard_ohistory'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','client_dashboard_ohistory',$langId),
					'client_dashboard_eprofile'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','client_dashboard_eprofile',$langId),
					'client_dashboard_cpassword'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','client_dashboard_cpassword',$langId),
					'client_dashboard_mrpurchase'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','client_dashboard_mrpurchase',$langId),
					'client_dashboard_date'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','client_dashboard_date',$langId),
					'client_dashboard_ithumbnail'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','client_dashboard_ithumbnail',$langId),
					'client_dashboard_imgid'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','client_dashboard_imgid',$langId),
					'client_dashboard_price'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','client_dashboard_price',$langId),
					'client_dashboard_status'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','client_dashboard_status',$langId),
					'save_btn'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','save_btn',$langId),
					'client_dashboard_pinformation'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','client_dashboard_pinformation',$langId),
					'old'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','old',$langId),
					'new'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','new',$langId),
					'retype'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','retype',$langId),
					

					'most_popular_pictures'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','most_popular_pictures',$langId),


					//footer constant values
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
		*Begin client function for this controller
	 	* This function Loads a Client Dashboard
	*/
 	#............begin client.......................##
	public function client()
	{
		/*
		get all client data
		$this->data[''] = .......
		*/
		$this->template->set_template('defaultfront');
		$this->template->write_view('content', 'client_dashboard_view',$this->data);
		$this->template->render();
	}
	#.............End client Function......................##


	

	/**
		*Begin Contributor function for this controller
	 	*This function Loads a Contributor Dashboard.
	*/
 	#............begin contributor Function.......................##
	public function contributor($selpackage = NULL)
	{

		/*
		get all contributor data with the selected package {$selpackage} posted.
		$this->data[''] = .......
		*/
		$this->template->set_template('defaultfront');
		$this->template->write_view('content', 'contributor_dashboard_view',$this->data);
		$this->template->render();
	}
	#.............End contributor Function......................##
	
 }


/* End of file Front.php */
/* Location: ./application/modules/dashboard/controllers/dashboard.php */