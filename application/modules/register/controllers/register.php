<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends MY_Front_Controller {

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

		 $langCode= $this->session->userdata('lang_arr');
		
		 $langId = $this->front_model->get_single_data('tbllanguagetypes','LangId','LangCode',$langCode);
		 $whereHead = array('status'=>1,'HeaderPosition >='=>0,'PageLangId'=>$langId);
	   	 $whereFoot = array('status'=>1,'FooterPosition >='=>0,'PageLangId'=>$langId);
	   	 $whereLang = array('LangStatus'=>1);

	   	 $this->data = array(
	   				'languages' =>$this->front_model->get_datas('tbllanguagetypes','LangName',$whereLang),	
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
					'register_left_ftitle'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_left_ftitle',$langId),
					'register_left_amsignin'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_left_amsignin',$langId),
					'name'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','name',$langId),
					'register_left_companyname'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_left_companyname',$langId),
					'phone'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','phone',$langId),
					'email_address'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','email_address',$langId),
					'password'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','password',$langId),
					'cpassword'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','cpassword',$langId),
					'required'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','required',$langId),
					'agree'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','agree',$langId),
					'register_left_terms_of_service'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_left_terms_of_service',$langId),
					'register_left_create_account'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_left_create_account',$langId),
					'register_right_thanku' =>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_right_thanku',$langId),
					'register_user_tell_us'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_user_tell_us',$langId),
					'register_user_purpose'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_user_purpose',$langId),
					'register_user_client'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_user_client',$langId),
					'register_user_contributor'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_user_contributor',$langId),
					'register_user_join'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_user_join',$langId),
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
		$this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone no', 'trim|required');
		//check whether the form is validated or not
        if($this->form_validation->run() == FALSE){
            $this->template->write_view('content', 'register_view',$this->data);
            $this->template->render(); 
        } else {
        	if ($this->input->post('join')) {
				$ut = $this->input->post('user-type') == 'client'?1:2;
				$name = $this->input->post('full_name');
				$email = $this->input->post('email_address');
				//$pass = 
				if($ut == 1) {
					//if user is a normal client(customer) redirect to his dashboard 
					$data = array(
								'UserId' => $ut,
								'PackageId' => 0, // it is client so no package is selected
								'UserName' => $name,
								'CompanyName ' => $this->input->post('company_name'),
								'Phone' => $this->input->post('phone'),
								'EmailAddress' => $email,
								'Password' => $this->input->post('password')
								);
			  		$result = $this->db->insert('tblprofile',$data);
			  		if($result){
			  			/**
						* START A SESSION WITH THE USERNAME USERTYPE(PACKAGEID) AND EMAIL IN THE SESSION DATA
						*/
						$sess_array = array();
						$login_array = array(
									'package' =>0,
									'email'=>$email,
									);
						
						$this->session->set_userdata('signed_in', $login_array);//set the session name logged_in with the array data
			  			redirect("dashboard","refresh");
			  		}
				} else{
					
					#if user want to be the contributor(photographer) h/she has to choose available package 
					$this->template->set_template('defaultfront');
					$this->template->write_view('content', 'package_view',$this->data);
					$this->template->render();

				}
			} else {
				/*these value are post via register_view.php and we append to the global data array 
				 *it is used in userview for hidden field value
				 */
				$this->data['full_name']  = $this->input->post('full_name');
				$this->data['company_name']  = $this->input->post('company_name');
				$this->data['phone']  = $this->input->post('phone');
				$this->data['email_address']  = $this->input->post('email_address');
				$this->data['password']  = md5($this->input->post('password'));

				$this->template->set_template('defaultfront');
				$this->template->write_view('content', 'user_view',$this->data);
				$this->template->render();
			}
		}
		
	}
	#............End user Function......................


	/**
		*Begin package function for this controller
	 	*This function is used to save the package the contributor chooses.
	*/
 	#............begin package Function.......................##
	public function package($package = NULL)
	{
		//redirect("dashboard/contributor/$package","refresh");
		redirect("dashboard","refresh");
	}
	#............End package Function......................
	

	
 }


/* End of file Front.php */
/* Location: ./application/modules/register/controllers/register.php */