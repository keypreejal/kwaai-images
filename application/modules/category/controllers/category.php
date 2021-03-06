<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

  	/**
	 * Images for this controller.
	 *	This page loads a Images Page of Kwaai
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
					'orientations' => $this->front_model->get_datas('tblorientation','OrName',array('status'=>1,'OrLangId'=>$this->langId),'CreatedAt'), //Orientation Name Listing in sidebar 
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
					'sidebar_search_fliter_title'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sidebar_search_fliter_title',$this->langId),
					'sidebar_search_fliter_image_type'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sidebar_search_fliter_image_type',$this->langId),
					'sidebar_search_fliter_category'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sidebar_search_fliter_category',$this->langId),
					'sidebar_search_fliter_orientation'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sidebar_search_fliter_orientation',$this->langId),
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
	 	* Thiis function Loads a Front form with a view name images_view.php
	*/
  	#............begin Index........................##
	public function index()
	{
		$this->data['kwaai_images'] = $this->front_model->get_multi_grid('tblproducts','tblproductvariations','ProductId','tblproducts.ProductCode = tblproductvariations.ProductCode','',10);
		
		$this->template->set_template('defaultfront');
		$this->template->write_view('content', 'category/category_view',$this->data);
		$this->template->render();
	}
	#.............End Index Function......................##


	/**
		*Begin search function for this controller
	 	* Thiis function Loads a related category image via ajax call
	*/
  	#............begin search........................##
	public function search()
	{
		$catid = $this->input->post('category');
		$scatid = $this->input->post('scategory');
		$orid = $this->input->post('orientation');

		$langCode= $this->session->userdata('lang_arr');  
		$catid = $langCode=='en'?$catid:($langCode =='nl'?$catid-1:$catid-2);
		$scatid = $langCode=='en'?$scatid:($langCode =='nl'?$scatid-1:$scatid-2);
		$orid = $langCode=='en'?$orid:($orid =='nl'?$orid-1:$orid-2);

		$data = array();
		$where = array('CategoryId'=>$catid,'SCategoryId'=>$scatid,'OrId'=>$orid);
		$kwaai_images = $this->front_model->get_multi_grid('tblproducts','tblproductvariations','ProductId','tblproducts.ProductCode = tblproductvariations.ProductCode',$where,10);
	 	
		$li = '';
	 	if(is_array($kwaai_images)>0){
            foreach($kwaai_images as $kwaai_image ) {
              $li .= "<li><form accept-charset='utf-8' method='post' action='".site_url()."cart/add'>
              				<div class='product-box'> 
               <p><a title='".$kwaai_image->ProductName."' rel='".site_url()."/uploads/1/ZQB419/thumb/detail/".$kwaai_image->ImageName."' class='screenshot imgtest' href='".site_url()."/category/product/".strtolower($kwaai_image->ProductCode)."'>
                     <img src='".site_url()."uploads/".$kwaai_image->ProfileId."/".strtolower($kwaai_image->ProductCode)."/thumb/listing/".$kwaai_image->ImageName."'></a></p>
                     <div class='caption'>
                      <h4><a href='javascript:void(0)' class='like pull-left'><i class='icon-thumbs-up'></i><span class='like-txt'>(10)</span></a>
                      <ul class='star-rating'>
                        <li><a class='one-star' title='Rate this 1 smile out of 5' href='#'>1</a></li>
                        <li><a class='two-stars' title='Rate this 2 smile out of 5' href='#'>2</a></li>
                        <li><a class='three-stars' title='Rate this 3 smile out of 5' href='#'>3</a></li>
                        <li><a class='four-stars' title='Rate this 4 smile out of 5' href='#'>4</a></li>
                        <li><a class='five-stars' title='Rate this 5 smile out of 5' href='#'>5</a></li>
                      </ul><input type='hidden' value='".strtolower($kwaai_image->ProductId)."' name='id'>
                      <input type='submit' class='icon-shopping-cart' value='' name='action'> 
                    </h4><hr><span id='i-code'>".strtolower($kwaai_image->ProductCode)."</span>
                     <span id='i-name'>".$kwaai_image->ProductName."</span>
                     </div>
              </div></form></li>";
       		}
       }
       echo $li;


		//echo json_encode($kwaai_images['ProductId']);
	}
	#.............End search Function......................##


   /**
		*Begin product function for this controller
	 	* This function Loads a detail_view of product
	*/
 	#............begin pages Function.......................##
	public function product($code = NULL)
	{
		$this->data['product'] = $this->front_model->get_single_row('tblproducts', 'ProductCode', $code);
		$this->data['contributor_name'] = $this->front_model->get_single_data('tblprofile','UserName','ProfileId',$this->data['product']->ProfileId); 
		$this->data['product_name'] = $this->front_model->get_single_data('tblproductvariations','ImageName','ProductCode',$code); 

		//$this->data['similar_product'], is for the carasoul data: get only 10 data 
		$where = array('ProfileId' => $this->data['product']->ProfileId);
		$this->data['similar_product'] =$this->front_model->get_multi_grid('tblproducts','tblproductvariations','ProductName','tblproducts.ProductCode = tblproductvariations.ProductCode',$where,10);

	 	$this->template->set_template('defaultfront');
		$this->template->write_view('content', 'category/detail_view',$this->data);
		$this->template->render();
		
	}
	#............End pages Function......................
}

/* End of file images.php */
/* Location: ./application/modules/front/controllers/images.php */