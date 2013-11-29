<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Front_Controller {

	/**
	 * Dashboard Page for this controller.
	 *	This page loads a Dashboard User Page of Kwaai
	 */
  	#............begin constructor........................##
  	public $data,$langId;
	public function __construct()
	{
		parent::__construct();    
		$this->load->model('front/front_model');
		$this->load->model('dashboard/contributor_model');
		$langCode= $this->session->userdata('lang_arr');
		
		$this->langId = $this->front_model->get_single_data('tbllanguagetypes','LangId','LangCode',$langCode);
		$whereHead = array('status'=>1,'HeaderPosition >='=>0,'PageLangId'=>$this->langId);
	   	$whereFoot = array('status'=>1,'FooterPosition >='=>0,'PageLangId'=>$this->langId);
	   	$whereLang = array('LangStatus'=>1);

	   	$this->data = array(
	   				'languages' =>$this->front_model->get_datas('tbllanguagetypes','LangName',$whereLang),	
					'pages' => $this->front_model->get_datas('tblpages','HeaderPosition',$whereHead,'PageSlug'), //get Header Menu Name
					'slides' => $this->front_model->get_datas('tblslider','SliderId'.''), //get slider 
					'categories' => $this->front_model->get_datas('tblcategory','CategoryName',array('Status'=>1,'CatLangId'=>$this->langId),'CreatedAt'), //Category Name Listing category search
					'scategories' => $this->front_model->get_datas('tblcategorychild','SCategoryName',array('Status'=>1,'IsFeatured'=>1,'SCatLangId'=>$this->langId),'CreatedAt'), //SCategory Name Listing in Browse by category 
					'orientations' => $this->front_model->get_datas('tblorientation','OrName',array('Status'=>1,'OrLangId'=>$this->langId),'CreatedAt'), //Orientation Name Listing 
					
					'fpages' => $this->front_model->get_datas('tblpages','FooterPosition',$whereFoot,'PageSlug'),	 //get Footer Menu Name
					'facebook' => $this->front_model->get_single_data('tblsitesettings','Value','Name','facebook-link'),
					'twitter' => $this->front_model->get_single_data('tblsitesettings','Value','Name','twitter-link'),
					'gplus' => $this->front_model->get_single_data('tblsitesettings','Value','Name','google-plus'),

					//language constants values
					'sign_in' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','sign_in',$this->langId),
					'register' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register',$this->langId),
					'shopping_baskets' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','shopping_baskets',$this->langId),
					'search_btn' =>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','search_btn',$this->langId),
					'category_search'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','category_search',$this->langId),
					
					'name'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','name',$this->langId),
					'register_left_companyname'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_left_companyname',$this->langId),
					'phone'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','phone',$this->langId),
					'email_address'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','email_address',$this->langId),
					'password'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','password',$this->langId),
					'cpassword'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','cpassword',$this->langId),
					'register_left_create_account'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_left_create_account',$this->langId),
					'register_user_subscription'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_user_subscription',$this->langId),
					'register_user_subscription_plan'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_user_subscription_plan',$this->langId),
					'register_user_subscription_tlbpackage'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_user_subscription_tlbpackage',$this->langId),
					'register_user_subscription_tlbsize'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_user_subscription_tlbsize',$this->langId),
					'register_user_subscription_tlbyear'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','register_user_subscription_tlbyear',$this->langId),

					'client_dashboard_ohistory'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','client_dashboard_ohistory',$this->langId),
					'client_dashboard_eprofile'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','client_dashboard_eprofile',$this->langId),
					'client_dashboard_cpassword'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','client_dashboard_cpassword',$this->langId),
					'client_dashboard_mrpurchase'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','client_dashboard_mrpurchase',$this->langId),
					'client_dashboard_date'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','client_dashboard_date',$this->langId),
					'client_dashboard_ithumbnail'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','client_dashboard_ithumbnail',$this->langId),
					'client_dashboard_imgid'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','client_dashboard_imgid',$this->langId),
					'client_dashboard_price'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','client_dashboard_price',$this->langId),
					'client_dashboard_status'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','client_dashboard_status',$this->langId),
					'save_btn'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','save_btn',$this->langId),
					'client_dashboard_pinformation'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','client_dashboard_pinformation',$this->langId),
					'old'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','old',$this->langId),
					'new'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','new',$this->langId),
					'retype'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','retype',$this->langId),
					

					'most_popular_pictures'=>$this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','most_popular_pictures',$this->langId),


					//footer constant values
					'my_account_head' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','my_account_head',$this->langId),
					'my_account_sign_up_free' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','my_account_sign_up_free',$this->langId),
					'need_help' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help',$this->langId),
					'need_help_faqs' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_faqs',$this->langId),
					'need_help_contact_us' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_contact_us',$this->langId),
					'need_help_site_map' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','need_help_site_map',$this->langId),
					'follow_us' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','follow_us',$this->langId),
					'all_right_reserve' => $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','all_right_reserve',$this->langId),
					'site_title'=> $this->front_model->get_single_constant_data('tblconstantsvalue','KeywordValue','ConstantCode','site_title',$this->langId),

					'available_size' => $this->available_package_size() // check available package size
					);
		
	}
	#..............end constructor.......................##

	/**
		*Begin Index function for this controller
	 	* This function Loads a Dashboar
	*/
 	#............begin Index.......................##
	public function index()
	{	#if $session_data['user_type']<=0 then it is a client(customer)
		// $loged = $this->session->userdata('signed_in');
		
		// if($loged['package']<=0) { 
		// 	$email = $loged['email'];
		// 	$user = $this->front_model->get_single_row('tblprofile', 'EmailAddress ', $email);  // get content of that user
			
		// 	$profileid = $user->ProfileId;
		// 	$this->data['phone_no'] = $user->Phone;
		// 	$this->data['email'] = $email;
		// 	$this->data['uname'] = $user->UserName;
		// 	$this->data['cname'] = $user->CompanyName;
			
		// 	if($this->input->post('eprofile')) { 
		// 		$update_profile = array(
		// 						'UserName' =>$this->input->post('euname'),
		// 						'CompanyName ' =>	$this->input->post('ecname'),
		// 						'Phone' => 	$this->input->post('ephoneno'),
		// 						);
		// 		$result = $this->front_model->update_data('tblprofile',$update_profile,'ProfileId',$profileid);
		// 		if($result){
		// 			$this->session->set_flashdata('updated_msg', 'Your Profile Updated successfully.');
		// 			redirect("dashboard","refresh");
		// 		} else{
		// 			$this->session->set_flashdata('category_msg', 'Error In Updating Your Profile.');					
		// 		}
		// 	}
		// 	if($this->input->post('cpassword')) {
		// 		$opass = $this->input->post('opassword');
		// 		$npass = $this->input->post('npassword');
		// 		$rpass = $this->input->post('rpassword');

		// 		if($npass == $rpass) {
		// 			$update_password = array(
		// 								'Password'  => md5($npass)
		// 								);
		// 			$this->front_model->update_data('tblprofile',$update_password,'ProfileId',$profileid);
		// 			redirect("dashboard","refresh");
		// 		}
		// 	}
		// 	$this->template->set_template('defaultfront');
		// 	$this->template->write_view('content', 'client_dashboard_view',$this->data);
		// 	$this->template->render();
		// } else {
			/*
			get all contributor data with the selected package {$selpackage} posted.
			$this->data[''] = .......
			*/
			$where = array('ProfileId'=>1);  // profile id then taken from session
			$this->data['uploaded_images'] = $this->front_model->get_multi_grid('tblproducts','tblproductvariations','ProductId','tblproducts.ProductCode = tblproductvariations.ProductCode',$where);
			
			$this->template->set_template('defaultfront');
			$this->template->write_view('content', 'contributor_dashboard_view',$this->data);
			$this->template->render();
		//}
		
	}
	#.............End Index Function......................##


	#..............BEGIN FUNCTION upload...........##
  	# upload images, add and edit
  	public function upload() {
  		if($this->input->post('upload')) {
  			$code = $this->input->post('pcode');
			if($code !='') { 
				// update here
				$free_paid = $this->input->post('free-paid');
				$this->form_validation->set_rules('product_title', 'Image Title', 'trim|required');
		   		$this->form_validation->set_rules('product_description', 'Image Description', 'trim|required');
		   		if($free_paid ==1){
		   			$this->form_validation->set_rules('product_price', 'Image Price', 'trim|required');
		   		}
			    //check whether the form is validated or not
	            if($this->form_validation->run() == FALSE){
	           	  $this->template->set_template('defaultfront');
	              $this->template->write_view('content', 'contributor_dashboard_view',$this->data);
	              $this->template->render(); 
	            } else {
	            	$uploaded_new =  $_FILES["upload_image"]["name"];

	            	//$package_id = $this->front_model->get_single_data('tblprofile','PackageId','ProfileId',$pid); 
					//$purchase_psize = $this->front_model->get_single_data('tblpackage','Size','PackageId',$package_id);  
					$purchase_psize = $this->front_model->get_single_data('tblpackage','Size','PackageId',1); 
					$purchase_psize = intval($purchase_psize)*1024; // to mb
					
	            	$cid = intval($this->input->post('category'));
	            	$scid = intval($this->input->post('scategory'));
	            	$oid = intval($this->input->post('orientation'));

	            	$title = $this->input->post('product_title');
					$description = $this->input->post('product_description');
					$size = $this->input->post('product_size');
					$price = $this->input->post('product_price');

					$width = $this->input->post('iwidth');
					$height = $this->input->post('iwidth');
					
					$uthumb = $this->input->post('upload-thumb');

	            	if($uploaded_new != '' ) {
	            		/*this means he had selected new image and may change other fields
	            		 *so we now r doing a fresh upload
	            		 */
	            		$pid = 1; //profile id(login id ) of photographer: this will be from session after login
	            		$this->contributor_model->do_detach_all(APPPATH. "../uploads/$pid/$code/");
	            		mkdir(APPPATH. "../uploads/$pid/$code/", 777, true); //  again create that folder with same name to store images
						// delete all datas form the database,which have the product code $code
						$this->db->delete('tblproducts', array('ProductCode' => $code));
						$this->db->delete('tblproductvariations', array('ProductCode' => $code));

						/* now fresh insert with that code
						 * calculate size 
						 */
						if($this->front_model->count_no_fields('tblproducts','ProductName', $title ) == '0') {
							$this->load->library('directory_calculator');
					    	$directory = APPPATH. "../uploads/$pid/";
					      	$remaining_size = $this->contributor_model->calculate_size($directory, $purchase_psize);
					      	if($remaining_size >0) {
					      		//upload for single image
					      		if($uthumb == 'No'){
					      			mkdir(APPPATH. "../uploads/$pid/$code/thumb", 777, true); //to store the listing image thumb
									mkdir(APPPATH. "../uploads/$pid/$code/thumb/detail", 777, true); // to store detail size thumb
									mkdir(APPPATH. "../uploads/$pid/$code/thumb/listing", 777, true); // to store detail size thumb
									$this->contributor_model->initialise($pid,$code);
						    		$isresize = $this->contributor_model->do_upload($purchase_psize,$remaining_size,$width,$height);

						    		/*$isresize = 0 images is uploaded*/
						    		if($isresize == 0) {
						    			$data = array(
								  			'CategoryId' => $cid,
								  			'SCategoryId' => $scid,
								  			'OrId' => $oid,
								  			'ProfileId' => $pid,
								  			'ProductCode' => $code,
											'ProductName' => $title,
											'ProductDescription' => $description,
											'ProductPrice' => $price,
											'OtherThumb' => 0,
											'TotalSize' => $this->contributor_model->calculate_size($directory, $purchase_psize)
							    		);
							    		$result = $this->db->insert('tblproducts',$data);
							    		if($result) {
									    	$this->session->set_flashdata('upload_msg', 'Edited successfully.');
											redirect('dashboard');
										} 
						    		}
					      		} 
					      		else{
					      			mkdir(APPPATH. "../uploads/$pid/$code/thumb", 777, true); //to store the listing image thumb
									mkdir(APPPATH. "../uploads/$pid/$code/thumb/detail", 777, true); // to store detail size thumb
									mkdir(APPPATH. "../uploads/$pid/$code/thumb/listing", 777, true); // to store detail size thumb
									mkdir(APPPATH. "../uploads/$pid/$code/thumb/large", 777, true); //to store large size thumb
									mkdir(APPPATH. "../uploads/$pid/$code/thumb/medium", 777, true); //to store large size thumb 
									mkdir(APPPATH. "../uploads/$pid/$code/thumb/small", 777, true); // to store small size thumb
									mkdir(APPPATH. "../uploads/$pid/$code/thumb/xsmall", 777, true); // to store xsmall size thumb
					      			//upload and create different dimension images
					      			for($i=4; $i>=1; $i--) {
						                // move/resize images
										$calWidth[] = ceil(($width/5)*$i);
					                  	$calHeight[] = ceil(($height/5)*$i);
					                }
						    		$this->contributor_model->initialise($pid,$code);
						    		$isresize = $this->contributor_model->do_upload_create_thumbs($purchase_psize,$remaining_size,$calWidth,$calHeight);
						    		
						    		/*$isresize = 0 means all images are uploaded*/
						    		if($isresize == 0) {
						    			$data = array(
								  			'CategoryId' => $cid,
								  			'SCategoryId' => $scid,
								  			'OrId' => $oid,
								  			'ProfileId' => $pid,
								  			'ProductCode' => $code,
											'ProductName' => $title,
											'ProductDescription' => $description,
											'ProductPrice' => $price,
											'OtherThumb' => 1,
											'TotalSize' => $this->contributor_model->calculate_size($directory, $purchase_psize)
							    		);
							    		$result = $this->db->insert('tblproducts',$data);
							    		if($result) {
									    	$this->session->set_flashdata('upload_msg', 'Edited successfully.');
											redirect('dashboard');
										} 
						    		}
					      		}
					    	}
					    	else{
					    		rmdir(APPPATH. "../uploads/$pid/$code/");
								$this->session->set_flashdata('upload_msg_error', 'Unable to Edit,Your Package size exceeded !');
								redirect('dashboard');
					    	}
				    	}
	            	} 
	            	else {
	            		//this means he had not change new image and done changed other things  only
			      		$update_data = array(
					  			'CategoryId' => $cid,
					  			'SCategoryId' => $scid,
					  			'OrId' => $oid,
					  			'ProductName' => $title,
								'ProductDescription' => $description,
								'ProductPrice' => $price,
							);
			      		$this->db->where('ProductCode', $code);
			    		$result = $this->db->update('tblproducts',$update_data);
			    		if($result) {
					    	$this->session->set_flashdata('upload_msg', 'Image Uploaded successfully.');
							redirect('dashboard');
						} 
	            	}
	            }
			} else {
				//insert here
				$free_paid = $this->input->post('free-paid');
				$this->form_validation->set_rules('product_title', 'Image Title', 'trim|required');
		   		$this->form_validation->set_rules('product_description', 'Image Description', 'trim|required');
		   		if($free_paid ==1){
		   			$this->form_validation->set_rules('product_price', 'Image Price', 'trim|required');
		   		}
			    //check whether the form is validated or not
	            if($this->form_validation->run() == FALSE){
	           	  $this->template->set_template('defaultfront');
	              $this->template->write_view('content', 'contributor_dashboard_view',$this->data);
	              $this->template->render(); 
	            } else {
	            	$pid = 1; //profile id(login id ) of photographer: this will be from session after login
					$pcode = $this->front_model->extract_unique_pcode('tblproducts','ProductCode'); // generate unique product code
					$path = realpath(APPPATH. "../uploads/$pid/$pcode/");
					if (!file_exists($path)) {
						mkdir(APPPATH. "../uploads/$pid/$pcode/", 777, true); // to store images
					}
					//$package_id = $this->front_model->get_single_data('tblprofile','PackageId','ProfileId',$pid); 
					//$purchase_psize = $this->front_model->get_single_data('tblpackage','Size','PackageId',$package_id);  
					$purchase_psize = $this->front_model->get_single_data('tblpackage','Size','PackageId',1); 
					$purchase_psize = intval($purchase_psize)*1024; // to mb
					
	            	$cid = intval($this->input->post('category'));
	            	$scid = intval($this->input->post('scategory'));
	            	$oid = intval($this->input->post('orientation'));

	            	
	            	
					$title = $this->input->post('product_title');
					$description = $this->input->post('product_description');
					$size = $this->input->post('product_size');
					$price = $this->input->post('product_price');

					$width = $this->input->post('iwidth');
					$height = $this->input->post('iwidth');
					
					$uthumb = $this->input->post('upload-thumb');

					if($this->front_model->count_no_fields('tblproducts','ProductName', $title ) == '0') {
						$this->load->library('directory_calculator');
				    	$directory = APPPATH. "../uploads/$pid/";
				    	
				      	$remaining_size = $this->contributor_model->calculate_size($directory, $purchase_psize);
				      	if($remaining_size >0) {
				      		//upload for single image
				      		if($uthumb == 'No'){
				      			mkdir(APPPATH. "../uploads/$pid/$pcode/thumb", 777, true); //to store the listing image thumb
								mkdir(APPPATH. "../uploads/$pid/$pcode/thumb/detail", 777, true); // to store detail size thumb
								mkdir(APPPATH. "../uploads/$pid/$pcode/thumb/listing", 777, true); // to store detail size thumb
								$this->contributor_model->initialise($pid,$pcode);
					    		$isresize = $this->contributor_model->do_upload($purchase_psize,$remaining_size,$width,$height);

					    		/*$isresize = 0 images is uploaded*/
					    		if($isresize == 0) {
					    			$data = array(
							  			'CategoryId' => $cid,
							  			'SCategoryId' => $scid,
							  			'OrId' => $oid,
							  			'ProfileId' => $pid,
							  			'ProductCode' => $pcode,
										'ProductName' => $title,
										'ProductDescription' => $description,
										'ProductPrice' => $price,
										'OtherThumb' => 0,
										'TotalSize' => $this->contributor_model->calculate_size($directory, $purchase_psize)
						    		);
						    		$result = $this->db->insert('tblproducts',$data);
						    		if($result) {
								    	$this->session->set_flashdata('upload_msg', 'Image Uploaded successfully.');
										redirect('dashboard');
									} 
					    		}
				      		} 
				      		else{
				      			mkdir(APPPATH. "../uploads/$pid/$pcode/thumb", 777, true); //to store the listing image thumb
								mkdir(APPPATH. "../uploads/$pid/$pcode/thumb/detail", 777, true); // to store detail size thumb
								mkdir(APPPATH. "../uploads/$pid/$pcode/thumb/listing", 777, true); // to store detail size thumb
								mkdir(APPPATH. "../uploads/$pid/$pcode/thumb/large", 777, true); //to store large size thumb
								mkdir(APPPATH. "../uploads/$pid/$pcode/thumb/medium", 777, true); //to store large size thumb 
								mkdir(APPPATH. "../uploads/$pid/$pcode/thumb/small", 777, true); // to store small size thumb
								mkdir(APPPATH. "../uploads/$pid/$pcode/thumb/xsmall", 777, true); // to store xsmall size thumb
				      			//upload and create different dimension images
				      			for($i=4; $i>=1; $i--) {
					                // move/resize images
									$calWidth[] = ceil(($width/5)*$i);
				                  	$calHeight[] = ceil(($height/5)*$i);
				                }
					    		$this->contributor_model->initialise($pid,$pcode);
					    		$isresize = $this->contributor_model->do_upload_create_thumbs($purchase_psize,$remaining_size,$calWidth,$calHeight);
					    		
					    		/*$isresize = 0 means all images are uploaded*/
					    		if($isresize == 0) {
					    			$data = array(
							  			'CategoryId' => $cid,
							  			'SCategoryId' => $scid,
							  			'OrId' => $oid,
							  			'ProfileId' => $pid,
							  			'ProductCode' => $pcode,
										'ProductName' => $title,
										'ProductDescription' => $description,
										'ProductPrice' => $price,
										'OtherThumb' => 1,
										'TotalSize' => $this->contributor_model->calculate_size($directory, $purchase_psize)
						    		);
						    		$result = $this->db->insert('tblproducts',$data);
						    		if($result) {
								    	
								    	$this->session->set_flashdata('upload_msg', 'Image Uploaded successfully.');
										redirect('dashboard');
									} 
					    		}
				      		}
				    	}
				    	else{
				    		rmdir(APPPATH. "../uploads/$pid/$pcode/");
							$this->session->set_flashdata('upload_msg_error', 'Unable to upload image,Your Package size exceeded !');
							redirect('dashboard');
				    	}
				    }

				  
			    }
			}
		}
  	}
	#...................END upload.................##

	#..............BEGIN FUNCTION search_image_datas...........##
  	# this function is called via ajax when user edit the image
	public function search_image_datas() {
		$imgcode = $this->input->post('pcode');
		$rdata = $this->front_model->get_single_row('tblproducts', 'ProductCode', $imgcode);
		$rdimdata = $this->front_model->get_single_row('tblproductvariations', 'ProductCode', $imgcode);

		$actual = $large = $medium = $small =  $xsmall = '';
		if($rdata->OtherThumb == 1) {
			$actual = $this->front_model->get_single_data('tblproductvariations','ProductDimensions','ProductDimensionName','actual'); 
			$large = $this->front_model->get_single_data('tblproductvariations','ProductDimensions','ProductDimensionName','large'); 
			$medium = $this->front_model->get_single_data('tblproductvariations','ProductDimensions','ProductDimensionName','medium'); 
			$small = $this->front_model->get_single_data('tblproductvariations','ProductDimensions','ProductDimensionName','small'); 
			$xsmall = $this->front_model->get_single_data('tblproductvariations','ProductDimensions','ProductDimensionName','xsmall'); 
		}

		$sname = $this->front_model->get_single_data('tblcategorychild','SCategoryName','SCatId',$rdata->SCategoryId); 
		$data = array();
	 	$datas[] = array(
	 				'pid' => $rdata->ProfileId,
	 				'product_code' =>$rdata->ProductCode, 
	 				'product_name' =>$rdata->ProductName,
					'product_description' =>$rdata->ProductDescription,
					'product_price' => $rdata->ProductPrice,
					'other_thumb' => $rdata->OtherThumb,
					'category_id' => $rdata->CategoryId,
					'scategory_id' => $rdata->SCategoryId,
					'sname' => $sname, 
					'orientation_id' => $rdata->OrId,
					'imgname' => $rdimdata->ImageName,
					'tsize' => $rdata->TotalSize,
					'actual' => $actual,
					'large' => $large,
					'medium' => $medium,
					'small' => $small,
					'xsmall' => $xsmall,
					);
	 	echo json_encode($datas);
	}

	// public function upload() {
	// 		$pid = 1; //profile id(login id ) of photographer
	// 		$pcode = $this->front_model->extract_unique_pcode('tblproducts','ProductCode'); // generate unique product code
	// 		$path = realpath(APPPATH. "../uploads/$pid/$pcode/");
	// 		if (!file_exists($path)) {
	// 			mkdir(APPPATH. "../uploads/$pid/$pcode/", 777, true);
	// 			mkdir(APPPATH. "../uploads/$pid/$pcode/thumb", 777, true);
	// 			mkdir(APPPATH. "../uploads/$pid/$pcode/thumb/large", 777, true);
	// 			mkdir(APPPATH. "../uploads/$pid/$pcode/thumb/medium", 777, true);
	// 			mkdir(APPPATH. "../uploads/$pid/$pcode/thumb/small", 777, true);
	// 			mkdir(APPPATH. "../uploads/$pid/$pcode/thumb/xsmall", 777, true);
	// 		}
	// 		//$package_id = $this->front_model->get_single_data('tblprofile','PackageId','ProfileId',$pid); 
	// 		//$purchase_psize = $this->front_model->get_single_data('tblpackage','Size','PackageId',$package_id);  
	// 		$purchase_psize = $this->front_model->get_single_data('tblpackage','Size','PackageId',1);  
	// 		$purchase_psize = intval($purchase_psize)*1024; // to mb

 //        	$cid = $this->input->post('category');
 //        	$scid = $this->input->post('scategory');
 //        	$oid = $this->input->post('orientation');

 //        	$title = $this->input->post('product_title');
	// 		$description = $this->input->post('product_description');
	// 		$dimension = $this->input->post('dimension');
	// 		$size = $this->input->post('size');
	// 		$price = $this->input->post('price');
	// 		$sstatus = $this->input->post('size_status');

 //        	$this->load->library('directory_calculator');
	//     	$directory = APPPATH. "../uploads/$pid/";
	//       	$remaining_size = $this->contributor_model->calculate_size($directory, $purchase_psize);

	//       	if($remaining_size >0) {
	//       		$img = $this->input->post('image');

	//       		$base64img = explode(',',$img);
	// 			$data = base64_decode($base64img[1]);
	// 			$replacearr = array('data:image/',';base64');
	// 			$ext = str_replace($replacearr,'',$base64img[0]);
	// 			$filename = time().".$ext";
	// 			$file_path = APPPATH. "../uploads/$pid/$pcode/".$filename;
	// 			file_put_contents($file_path, $data);

	// 			//calculate remaining size again after upload of big size img
	// 			$remaining_size = $this->contributor_model->calculate_size($directory, $purchase_psize);

	//       		$width = $this->input->post('awidth');
	//       		$height = $this->input->post('aheight');
	//       		$calWidth = array(); $calHeight = array();
	      		
 //                for($i=4; $i>=1; $i--) {
 //                	// move/resize images
	// 				$calWidth[] = ceil(($width/5)*$i);
 //                  	$calHeight[] = ceil(($height/5)*$i);
 //                }
	//       		//echo $calWidth;die;

	//     		$this->contributor_model->initialise($pid,$pcode);
	//     		$isresize = $this->contributor_model->do_upload($file_path,$purchase_psize,$remaining_size,$calWidth,$calHeight);
	//     		if($this->front_model->count_no_fields('tblproducts','ProductName', $title ) == '0') {
	//     			$data = array(
	// 		  			'CategoryId' => $cid,
	// 		  			'SCategoryId' => $scid,
	// 		  			'OrId' => $oid,
	// 		  			'ProfileId' => $pid,
	// 		  			'ProductCode' => $pcode,
	// 					'ProductName' => $title,
	// 					'ProductDescription' => $description,
	// 	    		);
	// 	    		$result = $this->db->insert('tblproducts',$data);
	// 	    		if($result) {
	// 			    	$width = array(); $height = array();
	// 			    	for($i=0; $i<count($dimension); $i++) {
	// 			    		/*insert to db*/
	// 			    		$data_variation = array(
	// 					  			'ProductCode' => $pcode,
	// 					  			//'ProductSize' => $dimension[$i],
	// 					  			'ProductDimensions' => $dimension[$i],
	// 					  			'Price' => $price[$i],
	// 					  			'Status' => $sstatus[$i]
	// 					  	);
	// 					  	$this->db->insert('tblproductvariations',$data_variation);
	// 			    	}
	// 			    	$this->session->set_flashdata('upload_msg', 'Image Uploaded successfully.');
	// 				} else{
	// 					$this->session->set_flashdata('upload_msg', 'Error In Adding Image.');					
	// 				}
	//     		}

	//     		echo $isresize;

	//     		/* $isresize = 0 means all image r uploaded
	//     		/* $isresize = 1 means only actual size image uploaded
	//     		/* $isresize = 2 means only actual and large image uploaded
	//     		/* $isresize = 3 means only actual,large and medium image uploaded
	//     		/* $isresize = 4 means only actual,large,medium and small image uploaded
	//     		*/


	//     	}
	// }

	#...................END upload.................##


	#..............BEGIN FUNCTION LOGOUT...........##
  	#destroy session and redirect to index page#
  	public function logout(){
    	session_destroy();
    	redirect('front');
  	}
	#...................END LOGOUT.................##


  	/**
		*Begin available_package_size function for this controller
	 	*This function is caled via ajax to check the available package size.
	*/
 	#............begin contributor Function.......................##
  	public function available_package_size() {
  		$pid = 1; //profile id(login id ) of photographer
  		//$package_id = $this->front_model->get_single_data('tblprofile','PackageId','ProfileId',$pid); 
		$purchase_psize = $this->front_model->get_single_data('tblpackage','Size','PackageId',1);  
		$purchase_psize = intval($purchase_psize)*1024; // to mb

		$this->load->library('directory_calculator');
		$directory = APPPATH. "../uploads/$pid/";
		$remaining_size;
		if(file_exists($directory)) {
			$size_in = 'MB';
			$decimals = 2;
	    	$this->directory_calculator->size_in = $size_in;
	    	$this->directory_calculator->decimals = $decimals;
	    	$array = $this->directory_calculator->size($directory);
			$remaining_size = $purchase_psize - $array['size'];
		} else{
			$remaining_size = $purchase_psize;
		}
		return $remaining_size;
  	}
  	
	/**
		*Begin search_scategory function for this controller
	 	*This function is called via ajax to load subcategory when category is selected.
	*/
 	#............begin contributor Function.......................##
	public function search_scategory()
	{
		$id = $this->input->post('cid');
		$langCode= $this->session->userdata('lang_arr');  
		$id = $langCode=='en'?$id:($langCode =='nl'?$id-1:$id-2);
	    $scategories = $this->front_model->get_datas('tblcategorychild','SCategoryName',array('CatId'=>$id,'Status'=>1,'SCatLangId'=>$this->langId),'CreatedAt');
		$scategory = array();
		foreach($scategories as $scat) {
			$scategory[]= array('scid' =>$scat->SCatId,
								'name' =>$scat->SCategoryName
								 );
		}
		echo json_encode($scategory);
	}
	#.............End search_scategory Function......................##


	/**
		*Begin Contributor function for this controller
	 	*This function Loads a Contributor Dashboard.
	*/
 	#............begin contributor Function.......................##
	// public function contributor($selpackage = NULL)
	// {

	// 	/*
	// 	get all contributor data with the selected package {$selpackage} posted.
	// 	$this->data[''] = .......
	// 	*/
	// 	$this->template->set_template('defaultfront');
	// 	$this->template->write_view('content', 'contributor_dashboard_view',$this->data);
	// 	$this->template->render();
	// }
	#.............End contributor Function......................##
	
 }


/* End of file Front.php */
/* Location: ./application/modules/dashboard/controllers/dashboard.php */