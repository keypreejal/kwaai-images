<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {

	/**
	 * Cart Page for this controller.
	 *	This page loads a Cart Page of Kwaai
	 */
  	#............begin constructor........................##
  	public $data ,$langId;
	public function __construct()
	{
		parent::__construct();  

		$this->load->model('front/front_model');

		$langCode= $this->session->userdata('lang_arr');
		$this->langId = $this->front_model->get_single_data('tbllanguagetypes','LangId','LangCode',$langCode);
		$whereHead = array('status'=>1,'HeaderPosition >='=>0,'PageLangId'=>$this->langId);
	   	$whereFoot = array('status'=>1,'FooterPosition >='=>0,'FooterPosition <'=>1000,'PageLangId'=>$this->langId);
	   	$whereSide = array('status'=>1,'FooterPosition >='=>0,'PageLangId'=>$this->langId);
	   	$whereLang = array('LangStatus'=>1);
	   	$this->data = array(
	   				'languages' =>$this->front_model->get_datas('tbllanguagetypes','LangName',$whereLang),	
					'pages' => $this->front_model->get_datas('tblpages','HeaderPosition',$whereHead,'PageSlug'), //get Header Menu Name
					'slides' => $this->front_model->get_datas('tblslider','SliderId'.''), //get slider 
					'categories' => $this->front_model->get_datas('tblcategory','CategoryName',array('status'=>1,'CatLangId'=>$this->langId),'CreatedAt'), //Category Name Listing category search
					'scategories' => $this->front_model->get_datas('tblcategorychild','SCategoryName',array('status'=>1,'IsFeatured'=>1,'SCatLangId'=>$this->langId),'CreatedAt'), //SCategory Name Listing in Browse by category 
					'fpages' => $this->front_model->get_datas('tblpages','FooterPosition',$whereFoot,'PageSlug'),	 //get Footer Menu Name
					'sidepages' => $this->front_model->get_datas('tblpages','FooterPosition',$whereSide,'PageSlug'),	 //get Footer Menu Name
					'facebook' => $this->front_model->get_single_data('tblsitesettings','Value','Name','facebook-link'),
					'twitter' => $this->front_model->get_single_data('tblsitesettings','Value','Name','twitter-link'),
					'gplus' => $this->front_model->get_single_data('tblsitesettings','Value','Name','google-plus'),
					'site_title'=> 'kwaai-images.com | cart',

					//language constants values
					'sign_in' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sign_in',$this->langId),
					'register' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register',$this->langId),
					'shopping_baskets' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','shopping_baskets',$this->langId),
					'search_for_images' =>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','search_for_images',$this->langId),
					'search_btn' 	=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','search_btn',$this->langId),
					'category_search'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','category_search',$this->langId),
					

					//footer constant values
					'my_account_head' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','my_account_head',$this->langId),
					'my_account_sign_up_free' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','my_account_sign_up_free',$this->langId),
					'need_help' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help',$this->langId),
					'need_help_faqs' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_faqs',$this->langId),
					'need_help_contact_us' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_contact_us',$this->langId),
					'need_help_site_map' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_site_map',$this->langId),
					'follow_us' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','follow_us',$this->langId),
					'all_right_reserve' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','all_right_reserve',$this->langId),
					);
	}
	#..............end constructor.......................##


	/**
		*Begin Index function for this controller
	 	* This function Loads a Front form with a view name cart_view.php
	*/
 	#............begin Index.......................##
	public function index()
	{
		/*
		get all client data
		$this->data[''] = .......
		*/
		$this->template->set_template('defaultfront');
		$this->template->write_view('content', 'cart_view',$this->data);
		$this->template->render();
	}
	#.............End Index Function......................##



	/**
		*Begin add function for this controller
	 	* This function add the product to the cart
	*/
 	#............begin add.......................##
	public function add() {
		$pid = $this->input->post('id');
		$product = $this->front_model->get_single_row('tblproducts', 'ProductId', $pid);

		$image = $this->front_model->get_single_data('tblproductvariations','ImageName','ProductCode', $product->ProductCode);
		$price = $product->ProductPrice ==''?10:$product->ProductPrice;
		$data = array(
               'id'      => $pid,
               'qty'     => 1,
               'price'   => $price,
               'name'    => $product->ProductName,
               'image'  => $image,
               'code' => $product->ProductCode,
               'size' => $product->TotalSize
            );

		$this->cart->insert($data); 
		
		$this->session->set_flashdata('cart_smsg', 'Product Added to cart');

		$this->template->set_template('defaultfront');
		$this->template->write_view('content', 'cart_view',$this->data);
		$this->template->render();
		

		
	}
	#.............End add Function......................##

	
 }

/* End of file Front.php 
/* Location: ./application/modules/cart/controllers/cart.php */