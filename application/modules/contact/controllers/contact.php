<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
error_reporting(1);
class Contact extends CI_Controller {

	/**
	 * Contact Page for this controller.
	 *	This page loads a Contact Page of Kwaai
	 */
  	#............begin constructor........................##
	public function __construct()
	{
	   	parent::__construct();    
		$this->load->model('front/front_model');
		$this->load->library('email');
		$_SESSION['security_code'] = $this->front_model->generateCode(5);
	}
  #..............end constructor.......................##


	/**
		*Begin Index function for this controller
	 	* This function Loads a Front form with a view name contact_view.php
	*/
	#............begin Index.......................##
	public function index()
	{
		$langCode = $this->input->get('lang');
		$langId = $this->front_model->get_single_data('languagetypes','LangId','LangCode',$langCode);
	   	$whereHead = array('status'=>1,'HeaderPosition >='=>0,'PageLangId'=>$langId);
	   	$whereFoot = array('status'=>1,'FooterPosition >='=>0,'PageLangId'=>$langId);
	    $whereLang = array('LangStatus'=>1);

		$data = array(
					'languages' =>$this->front_model->get_datas('languagetypes','LangName',$whereLang),	
					'pages' => $this->front_model->get_datas('tblpages','HeaderPosition',$whereHead,'PageSlug'), //get Header Menu Name
					'slides' => '', //No slides Needed in Image
					'categories' => $this->front_model->get_datas('tblcategory','CategoryName',array('status'=>1,'CatLangId'=>$langId),'CreatedAt'), //Category Name Listing in sidebar & category search
					'others'=> $this->front_model->get_single_data('tblsitesettings','Others','Name','contact-email'),
					'fpages' => $this->front_model->get_datas('tblpages','FooterPosition',$whereFoot,'PageSlug'),	 //get Footer Menu Name
					'facebook' => $this->front_model->get_single_data('tblsitesettings','Value','Name','facebook-link'),
					'twitter' => $this->front_model->get_single_data('tblsitesettings','Value','Name','twitter-link'),
					'gplus' => $this->front_model->get_single_data('tblsitesettings','Value','Name','google-plus'),
					'site_title'=> 'kwaai-images.com | contact',

					//language constants values
					'sign_in' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sign_in',$langId),
					'register' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register',$langId),
					'shopping_baskets' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','shopping_baskets',$langId),
					'search_btn' 	=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','search_btn',$langId),
					'category_search'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','category_search',$langId),
					'my_account_head' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','my_account_head',$langId),
					'my_account_sign_up_free' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','my_account_sign_up_free',$langId),
					'need_help' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help',$langId),
					'need_help_faqs' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_faqs',$langId),
					'need_help_contact_us' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_contact_us',$langId),
					'need_help_site_map' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_site_map',$langId),
					'follow_us' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','follow_us',$langId),
					'all_right_reserve' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','all_right_reserve',$langId),
					
					);

		$this->template->set_template('defaultfront');
		if($this->input->post('submit')){
			//validation starts
		    $this->form_validation->set_rules('name','Name','required|xss_clean|callback_alpha_space');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('message', 'Message','xss_clean');
			$this->form_validation->set_rules('captcha', 'Security Code','required|xss_clean|callback_captcha_check');
			if($this->form_validation->run() == FALSE){
              $this->template->write_view('content', 'contact/contact_view',$data);
              $this->template->render(); 
	        } else {
	        	$contact_email = $this->front_model->get_single_data('tblsitesettings','Value','Name','contact-email');
					
				$config['protocol'] = 'sendmail';
				$config['charset'] = 'iso-8859-1';
				$config['mailtype'] = 'html';
				$config['crlf'] = '\n';		
				$config['newline'] = '\n';
				$this->email->initialize($config);

								
				$this->email->from($this->input->post('email'),$this->input->post('name'));
				$this->email->to($contact_email);
				$this->email->subject('Contact From Kwaai');
				$this->email->message($this->input->post('message'));

				if($this->email->send()){
					$this->session->set_flashdata('contact_msg', 'Message Sent Sucessfully.');	
				}
	        }
		}
		$this->template->write_view('content', 'contact/contact_view',$data);
		$this->template->render();
	}
	#.................End Index Function..................##


  
}

/* End of file Front.php */
/* Location: ./application/modules/front/controllers/contact.php */