<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends MY_Controller {
  /**
	 * Constructure for this controller.
	 * 	
	 */
  #............begin constructor........................##
  public function __construct()
  {
   	 parent::__construct();    
	 $this->load->model('admin/admin_model');
	 $this->load->model('slider/img_model','image');
	 $this->template->set_template('default');
  }
 
  public function index()
  {
	$data['categories'] = $this->admin_model->get_grid('tblcategory','CatId','','CreatedAt');
	$this->template->write_view('content', 'categories/categories_view',$data);
	$this->template->render();
  }
  
  public function subCategories() {
	$data['scategories'] = $this->admin_model->get_grid('tblcategorychild','SCatId','','CreatedAt');
	$this->template->write_view('content', 'categories/scategories_view',$data);
	$this->template->render();
  }

  public function aeddCategories($id = NULL) {
	   $id = (int)$id;
	   $data = $this->_get_datas($id);
	   
	   $where = array('LangStatus'=>1); 
	   $data['languages'] = $this->admin_model->get_all_datas('languagetypes','LangName',$where);
	   $this->template->write_view('content', 'categories/aedd_categories',$data);
	   
	   if ($this->input->post('submit')) {
		   
		   $this->form_validation->set_rules('cname[0]', 'Category Title', 'trim|required');
		   $this->form_validation->set_rules('status', 'Category Status', 'trim|required');
		   //check whether the form is validated or not
           if($this->form_validation->run() == FALSE){
               $this->template->write_view('content', 'categories/aedd_categories',$data);
               $this->template->render(); 
           } else {
			   $cname = $this->input->post('cname');
			   if($id !='') { // update here
					$utime = date('Y-m-d H:i:s'); 
					for($i=0; $i<count($cname); $i++) {	
						$this->db->where('CatId', $id);			
						$update_data['CategoryName'] = $this->admin_model->format_data($cname[$i]);
						$update_data['Status'] = $this->admin_model->format_data($this->input->post('status'));
						$update_data['UpdatedAt'] = $utime;
						$id = $id+1;
						$result = $this->db->update('tblcategory', $update_data);
					}
					if($result){
							$this->session->set_flashdata('category_msg', 'Category Updated successfully.');
							redirect('Categories');
					} else{
						$this->session->set_flashdata('category_msg', 'Error In Updating Category.');					
					}
			   } else { //insert here
				   if($this->admin_model->count_no_fields('tblcategory','CategoryName', $cname[0] ) == '0') { // to check duplication
				   		$itime = date('Y-m-d H:i:s');
				   		for($i=0; $i<count($cname); $i++) {	
							$insert_data['CategoryName'] = $this->admin_model->format_data($cname[$i]);
							$insert_data['CatLangId'] = $i+1;
							$insert_data['Status'] = $this->admin_model->format_data($this->input->post('status'));
							$insert_data['CreatedAt'] = $itime;
							$result = $this->db->insert('tblcategory', $insert_data);
						}
						if($result) {
							$this->session->set_flashdata('category_msg', 'Category Added successfully.');
							redirect('Categories');
						} else{
							$this->session->set_flashdata('category_msg', 'Error In Adding Category.');					
						}
				   } else {
				   		$this->session->set_flashdata('category_msg', 'Unable to Add, Category with that Name Already Exits.');
						redirect('Categories');
				   }
			   }
		   }
	   }
		$this->template->render();
  }
  
  function aeddSCategories($id = NULL) {
	   $id = (int)$id;
	   $data = $this->_sget_datas($id);
	   $where = array('Status'=>1);
	   $data['categories'] = $this->admin_model->get_all_datas('tblcategory','CategoryName',$where,'CreatedAt');
	   $whereLang = array('LangStatus'=>1); 
	   $data['languages'] = $this->admin_model->get_all_datas('languagetypes','LangName',$whereLang);
	   $this->template->write_view('content', 'aedd_scategories',$data);
	   
	   if ($this->input->post('submit')) {
		   $this->form_validation->set_rules('category', 'Category Name', 'trim|required');
		   $this->form_validation->set_rules('scname[0]', 'SubCategory Name', 'trim|required');
		   $this->form_validation->set_rules('status', 'SubCategory Status', 'trim|required');
		   //check whether the form is validated or not
           if($this->form_validation->run() == FALSE){
               $this->template->write_view('content', 'categories/aedd_scategories',$data);
               $this->template->render(); 
           } else {
			   $scname = $this->input->post('scname');
			   if($id !='') { // update here
					$utime = date('Y-m-d H:i:s'); 
					for($i=0; $i<count($scname); $i++) {	
						$this->db->where('SCatId', $id);			
						$update_data['CatId'] = intval($this->input->post('category'));
						$update_data['SCategoryName'] = $this->admin_model->format_data($scname[$i]);
						$update_data['IsFeatured'] = intval($this->input->post('featured'));
						$update_data['Status'] = $this->admin_model->format_data($this->input->post('status'));
						$update_data['UpdatedAt'] = $utime;
						$id = $id+1;
						$result = $this->db->update('tblcategorychild', $update_data);
					}
					if($result){
						$this->session->set_flashdata('scategory_msg', 'SubCategory Updated successfully.');
						redirect('Categories/subCategories');
					} else{
						$this->session->set_flashdata('scategory_msg', 'Error In Updating SubCategory.');					
					}
					
			   } else { //insert here
				   if($this->admin_model->count_no_fields('tblcategorychild','SCategoryName', $scname[0] ) == '0') { // to check duplication
				   		$itime = date('Y-m-d H:i:s');
				   		for($i=0; $i<count($scname); $i++) {	
							$insert_data['CatId'] = intval($this->input->post('category'));
							$insert_data['SCatLangId'] = $i+1;
							$insert_data['SCategoryName'] = $this->admin_model->format_data($scname[$i]);
							$insert_data['IsFeatured'] = intval($this->input->post('featured'));
							$insert_data['Status'] = $this->admin_model->format_data($this->input->post('status'));
							$insert_data['CreatedAt'] = $itime;
							$result = $this->db->insert('tblcategorychild', $insert_data);
						}
						if($result) {
							$this->session->set_flashdata('scategory_msg', 'SubCategory Added successfully.');
							redirect('Categories/subCategories');
						} else{
							$this->session->set_flashdata('scategory_msg', 'Error In Adding SubCategory.');					
						}
				   }
				   else {
				   		$this->session->set_flashdata('scategory_msg', 'Unable to Add, SubCategory with that Name Already Exits.');
						redirect('Categories/subCategories');
				   }
			   }
		   }
	   }
	   $this->template->render();
  }
  
  function changeStatus(){ //Status Changing , this method is called via Ajax 
	$status['Status'] = $this->input->post('status');
	$id = intval($this->input->post('id'));
	$table = $this->input->post('tbl');
	$tid = $this->input->post('tid');
	for($i=$id;$i<($id+3);$i++){
		$where = $this->db->where($tid,$i);	
		$result = $this->db->update($table, $status);
	}
	//$where = array($tid=>$id);
	if ($result){
		echo 'success';
	}else{
		echo '';	
	}
 }
 function changeFeature(){ //Feature Changing , this method is called via Ajax 
 	$feat['IsFeatured'] = $this->input->post('feat');
	$id = intval($this->input->post('id'));
	for($i=$id;$i<($id+3);$i++){
		$where = $this->db->where('SCatId',$i);	
		$result = $this->db->update('tblcategorychild',$feat,$where);
	}
	if ($result){
		echo 'success';
	}else{
		echo '';	
	}
 }
  
  function delete($id=NULL){ // Category Deletion
		$id = (int)$id;
		if($this->admin_model->count_row('tblcategory', 'CatId', $id) != 0) { 
			for($i=$id;$i<($id+3);$i++){
				$this->db->where('CatId',$i);	
				$result = $this->db->delete('tblcategory');
			}
			if($result){
				$this->db->where('CatId', $id);
				$this->db->delete('tblcategorychild');
				$action['category_msg']	= 'Category Successfully Deleted.';
			}else{
				$action['category_msg']	= 'Error In Deleting Category.';	
			}
		}else{ 	
			$action['category_msg']	= 'No Such Category Found.';
			$this->session->set_flashdata($action);
		}
		redirect('categories');
  }
  function sdelete($id=NULL){ //SubCategory Deletion
		$id = (int)$id;
		if($this->admin_model->count_row('tblcategorychild', 'SCatId', $id) != 0) { 
			$image_name = $this->admin_model->get_single_data('tblcategorychild','FeatureImage','SCatId',$id); //get featureImge name
			for($i=$id;$i<($id+3);$i++){
				$this->db->where('SCatId',$i);	
				$result = $this->db->delete('tblcategorychild');
			}
			if($result){
				if($image_name) {
					 $dest = './featureSubCat/';
			 		 $thumb = $dest.'thumb/'; 
					 @unlink($dest.$image_name);
					 @unlink($thumb.$image_name);
				} 
				$action['category_msg']	= 'SubCategory Successfully Deleted.';
			}else{
				$action['category_msg']	= 'Error In Deleting SubCategory.';	
			}
		}else{ 	
			$action['category_msg']	= 'No Such SubCategory Found.';
		}
		$this->session->set_flashdata($action);
		redirect('categories/subCategories');
  }
  
  function _get_datas($id) { 
	  if($id) {
			$category = $this->admin_model->get_single_row('tblcategory', 'CatId', $id);
			if(empty($category)) {
				$error['category_msg']   = "Invalid Request!";
				$this->session->set_flashdata($error);
				redirect('categories');				
			}	
					
			//$data['cname'] = $this->admin_model->get_formatted($category->CategoryName );
			$data['status'] = intval($category->Status);
			$data['cid'] = intval($id);
		}
		else {
			//$data['cname'] = '';
			$data['cid'] = '';
			$data['status'] = -1;
		}
		return $data;
  }
  public function _sget_datas($id) {
	  if($id) {
			$scategory = $this->admin_model->get_single_row('tblcategorychild', 'SCatId', $id);
			if(empty($scategory)) {
				$error['scategory_msg']   = "Invalid Request!";
				$this->session->set_flashdata($error);
				redirect('categories');				
			}	
			$data['scid'] = $this->admin_model->get_formatted($id);

			$data['catid'] = $this->admin_model->get_formatted($scategory->CatId);
			$data['featured'] = intval($scategory->IsFeatured );
			$data['status'] = intval($scategory->Status);
		}
		else {
			$data['scid'] = '';
			$data['catid'] = '';
			$data['featured'] = -1;
			$data['status'] = -1;
		}
		return $data;
  }
 
   public function upload($id=NULL)	{	
  		/*create directory for images start*/
		$tmp = './featureSubCat/tmp/';
		$dest = './featureSubCat/'; 
		$thumb = $dest.'thumb/';
		if(!file_exists($dest)){
			mkdir($dest);
			$str ='<html><head><title>403 Forbidden</title></head><body><p>Directory access is forbidden.</p></body></html>';
			$file = fopen($dest.'/index.html',"wb");
			fwrite($file,$str);
			fclose($file);
			
		}
		if(!file_exists($thumb)){
			mkdir($thumb);
			$str ='<html><head><title>403 Forbidden</title></head><body><p>Directory access is forbidden.</p></body></html>';
			$file = fopen($thumb.'/index.html',"wb");
			fwrite($file,$str);
			fclose($file);
		}
		if(!file_exists($tmp))
			mkdir($tmp);
		/*create directory for images ends */
		$img = $this->input->post('img');
		$id = intval($id);
		$image_name = $this->admin_model->get_single_data('tblcategorychild','FeatureImage','SCatId',$id);				
		if($image_name) {
			 @unlink($dest.$image_name);
			 @unlink($thumb.$image_name);
		}
		//upload images to tmp folder
		$base64img = explode(',',$img);
		$data = base64_decode($base64img[1]);
		$replacearr = array('data:image/',';base64');
		$ext = str_replace($replacearr,'',$base64img[0]);
		$filename = time().".$ext";
		$tmp_file_path = $tmp.$filename;
		file_put_contents($tmp_file_path, $data);
			
		// move/resize images
		
		$this->image->resize($tmp_file_path,$thumb,100,100);
		$this->image->resize($tmp_file_path,$dest,188,183);
		@unlink($tmp_file_path);
		for($i=$id;$i<($id+3);$i++){
			$this->db->where('SCatId',$i);	
			$update_data['FeatureImage'] = $filename;
			$result = $this->db->update('tblcategorychild', $update_data);
		}
	}
   function RemoveFeatureImage($id=NULL){ // Feature Image Deletion(Update)
		$id = (int)$id;
		//unlink old image
		$image_name = $this->admin_model->get_single_data('tblcategorychild','FeatureImage','SCatId',$id);
		for($i=$id;$i<($id+3);$i++){
			$this->db->where('SCatId',$i);	
			$update_data['FeatureImage'] = '';
			$result = $this->db->update('tblcategorychild', $update_data);
		}
		if($result){
			if($image_name) {
				 $dest = './featureSubCat/';
				 $thumb = $dest.'thumb/'; 
				 @unlink($dest.$image_name);
				 @unlink($thumb.$image_name);
				 echo 'success';
			}
			
		}
 	}
}

/* End of file cms.php */
/* Location: ./application/modules/Category/controllers/category.php */