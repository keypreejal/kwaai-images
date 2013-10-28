<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends MY_Controller {

  public function __construct()
  {
   	 parent::__construct();    
	 $this->load->model('admin/admin_model');
	 $this->template->set_template('default');
  }
 
  public function index()
  {
	$data['categories'] = $this->admin_model->get_grid('tblcategory','CatId');
	$this->template->write_view('content', 'categories/categories_view',$data);
	$this->template->render();
  }
  
  public function subCategories() {
	$data['scategories'] = $this->admin_model->get_grid('tblcategorychild','SCatId');
	$this->template->write_view('content', 'categories/scategories_view',$data);
	$this->template->render();
  }

  public function aeddCategories($id = NULL) {
	   $id = (int)$id;
	   $data = $this->_get_datas($id);
	   
	   $this->template->write_view('content', 'categories/aedd_categories',$data);
	   
	   if ($this->input->post('submit')) {
		   
		   $this->form_validation->set_rules('cname', 'Category Title', 'trim|required');
		   $this->form_validation->set_rules('status', 'Category Status', 'trim|required');
		   //check whether the form is validated or not
           if($this->form_validation->run() == FALSE){
               $this->template->write_view('content', 'categories/aedd_categories',$data);
               $this->template->render(); 
           } else {
			   $cname = $this->input->post('cname');
			   if($id !='') { // update here
					if($this->admin_model->count_no_fields_edit('tblcategory','CategoryName', $cname, 'CatId', $id) == '0') {  
						$this->db->where('CatId', $id);			
						$update_data['CategoryName'] = $this->admin_model->format_data($cname);
						$update_data['Status'] = $this->admin_model->format_data($this->input->post('status'));
						$update_data['UpdatedAt'] = date('Y-m-d H:i:s');
						$result = $this->db->update('tblcategory', $update_data);
						if($result){
							$this->session->set_flashdata('category_msg', 'Category Updated successfully.');
							redirect('Categories');
						} else{
							$this->session->set_flashdata('category_msg', 'Error In Updating Category.');					
						}
					}
					else{
						$this->session->set_flashdata('category_msg', 'Duplicate Category With that Name Exists');				
					}
			   } else { //insert here
				   if($this->admin_model->count_no_fields('tblcategory','CategoryName', $cname ) == '0') { // to check duplication
						$insert_data['CategoryName'] = $this->admin_model->format_data($cname);
						$insert_data['Status'] = $this->admin_model->format_data($this->input->post('status'));
						$insert_data['CreatedAt'] = date('Y-m-d H:i:s');
						$result = $this->db->insert('tblcategory', $insert_data);
						if($result) {
							$this->session->set_flashdata('category_msg', 'Category Added successfully.');
							redirect('Categories');
						} else{
							$this->session->set_flashdata('category_msg', 'Error In Adding Category.');					
						}
				   } else {
				   		$this->session->set_flashdata('category_msg', 'Category with that Name Already Exits.');
				   }
			   }
		   }
	   }
		$this->template->render();
  }
  
  function aeddSCategories($id = NULL) {
	   $id = (int)$id;
	   $data = $this->_sget_datas($id);
	   $where = array('status'=>1);
	   $data['categories'] = $this->admin_model->get_all_datas('tblcategory','CategoryName',$where);
	   $this->template->write_view('content', 'categories/aedd_scategories',$data);
	   
	   if ($this->input->post('submit')) {
		   $this->form_validation->set_rules('category', 'Category Name', 'trim|required');
		   $this->form_validation->set_rules('scname', 'SubCategory Name', 'trim|required');
		   $this->form_validation->set_rules('status', 'SubCategory Status', 'trim|required');
		   //check whether the form is validated or not
           if($this->form_validation->run() == FALSE){
               $this->template->write_view('content', 'categories/aedd_scategories',$data);
               $this->template->render(); 
           } else {
			   $scname = $this->input->post('scname');
			   if($id !='') { // update here
					if($this->admin_model->count_no_fields_edit('tblcategorychild','SCategoryName', $scname, 'SCatId', $id) == '0') {  
						$this->db->where('SCatId', $id);			
						$update_data['CatId'] = intval($this->input->post('category'));
						$update_data['SCategoryName'] = $this->admin_model->format_data($scname);
						$update_data['Status'] = $this->admin_model->format_data($this->input->post('status'));
						$update_data['UpdatedAt'] = date('Y-m-d H:i:s');
						$result = $this->db->update('tblcategorychild', $update_data);
						if($result){
							$this->session->set_flashdata('scategory_msg', 'SubCategory Updated successfully.');
							redirect('Categories/subCategories');
						} else{
							$this->session->set_flashdata('scategory_msg', 'Error In Updating SubCategory.');					
						}
					}
					else{
						$this->session->set_flashdata('scategory_msg', 'Duplicate SubCategory With that Name Exists');				
					}
			   } else { //insert here
				   if($this->admin_model->count_no_fields('tblcategorychild','SCategoryName', $scname ) == '0') { // to check duplication
						$insert_data['CatId'] = intval($this->input->post('category'));
						$insert_data['SCategoryName'] = $this->admin_model->format_data($scname);
						$insert_data['Status'] = $this->admin_model->format_data($this->input->post('status'));
						$insert_data['CreatedAt'] = date('Y-m-d H:i:s');
						$result = $this->db->insert('tblcategorychild', $insert_data);
						if($result) {
							$this->session->set_flashdata('scategory_msg', 'SubCategory Added successfully.');
							redirect('Categories/subCategories');
						} else{
							$this->session->set_flashdata('scategory_msg', 'Error In Adding SubCategory.');					
						}
				   }
				   else {
				   		$this->session->set_flashdata('category_msg', 'SubCategory with that Name Already Exits.');
				   }
			   }
		   }
	   }
	   $this->template->render();
  }
  
  function changeStatus(){ //Category Status Changing , this method is called via Ajax 
		$status['Status'] = $this->input->post('status');
		$id = intval($this->input->post('id'));
		$where = array('CatId'=>$id);
		if ($this->db->update('tblcategory',$status,$where)){
			echo 'success';
		}else{
			echo '';	
		}
 }
 function schangeStatus() { //SubCategory Status Changing , this method is called via Ajax 
		$status['Status'] = $this->input->post('status');
		$id = intval($this->input->post('id'));
		$where = array('SCatId '=>$id);
		if ($this->db->update('tblcategorychild',$status,$where)){
			echo 'success';
		}else{
			echo '';	
		}
 }
 
  function delete($id=NULL){ // Category Deletion
		$id = (int)$id;
		if($this->admin_model->count_row('tblcategory', 'CatId', $id) != 0) { 
			$this->db->where('CatId', $id);
			$result = $this->db->delete('tblcategory');
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
		if($this->admin_model->count_row('tblcategorychild', 'CatId', $id) != 0) { 
			$this->db->where('SCatId', $id);
			$result = $this->db->delete('tblcategorychild');
			if($result){
				$action['category_msg']	= 'SubCategory Successfully Deleted.';
			}else{
				$action['category_msg']	= 'Error In Deleting SubCategory.';	
			}
		}else{ 	
			$action['category_msg']	= 'No Such SubCategory Found.';
		}
		$this->session->set_flashdata($action);
		redirect('categories');
  }
  
  function _get_datas($id) { 
	  if($id) {
			$category = $this->admin_model->get_single_row('tblcategory', 'CatId', $id);
			if(empty($category)) {
				$error['category_msg']   = "Invalid Request!";
				$this->session->set_flashdata($error);
				redirect('categories');				
			}			
			$data['cname'] = $this->admin_model->get_formatted($category->CategoryName );
			$data['status'] = intval($category->Status);
		}
		else {
			$data['cname'] = '';
			$data['status'] = -1;
		}
		return $data;
  }
  public function _sget_datas($id) {
	  if($id) {
			$scategory = $this->admin_model->get_single_row('tblcategorychild', 'SCatId', $id);
			if(empty($category)) {
				$error['scategory_msg']   = "Invalid Request!";
				$this->session->set_flashdata($error);
				redirect('categories');				
			}	
			$data['cid'] = $this->admin_model->get_formatted($scategory->CatId);		
			$data['scname'] = $this->admin_model->get_formatted($scategory->SCategoryName);
			$data['status'] = intval($scategory->Status);
		}
		else {
			$data['cid'] = '';
			$data['scname'] = '';
			$data['status'] = -1;
		}
		return $data;
  }
 
  
}

/* End of file cms.php */
/* Location: ./application/modules/Category/controllers/category.php */