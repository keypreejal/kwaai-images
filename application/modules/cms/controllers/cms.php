<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends MY_Controller {

  public function __construct()
  {
   	 parent::__construct();    
	 $this->load->model('admin/admin_model');
	 $this->load->model('slider/img_model','image');
	 $this->template->set_template('default');
	 
  }
 
  public function index()
  {
	$data['pages'] = $this->admin_model->get_grid('tblpages','PageId');
	
	$this->template->write_view('content', 'cms/cms_view',$data);
	$this->template->render();
  }

  public function aeddPages($id = NULL) {
	   $id = (int)$id;
	   $data = $this->_get_datas($id);
	   $this->template->write_view('content', 'cms/aedd_pages',$data);
	   
	   if ($this->input->post('submit')) 
	   {
		   $this->form_validation->set_rules('page_title', 'Page Title', 'trim|required');
		   $this->form_validation->set_rules('status', 'Page Status', 'trim|required');
		   //check whether the form is validated or not
           if($this->form_validation->run() == FALSE){
              $this->template->write_view('content', 'cms/aedd_pages',$data);
              $this->template->render(); 
           } else {
           	   /*create directory for images start*/
				$tmp = './featureImg/tmp/';
				$dest = './featureImg/'; 
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

			   $ptitle = $this->input->post('page_title');
			   if($id !='') { // update here
					if($this->admin_model->count_no_fields_edit('tblpages','PageTitle', $ptitle, 'PageId', $id) == '0') {  
						$this->db->where('PageId', $id);			
						$update_data['PageTitle'] = $this->admin_model->format_data($ptitle);
						$update_data['PageContent'] = $this->admin_model->format_data($this->input->post('page_content'));
						$update_data['Status'] = $this->admin_model->format_data($this->input->post('status'));
						$img = $this->input->post('img');
						if($img !='') {
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
							$this->image->resize($tmp_file_path,$dest,1600,425);
							@unlink($tmp_file_path);
							$update_data['FeatureImage'] = $filename;
						}
						$result = $this->db->update('tblpages', $update_data);
						if($result){
							$this->session->set_flashdata('pages_msg', 'Page Updated successfully.');
							redirect('cms');
						} else{
							$this->session->set_flashdata('pages_msg', 'Error In Updating Page.');					
						}
					}
					else{
						$this->session->set_flashdata('page_msg', 'Duplicate Page With that Name Exists');				
					}
			   } else { //insert here
				   if($this->admin_model->count_no_fields('tblpages','PageTitle', $ptitle ) == '0') {
				   		
						$img = $this->input->post('img');
							
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
						$this->image->resize($tmp_file_path,$dest,1600,425);
						@unlink($tmp_file_path);
							
						$data = array(
							'FeatureImage'	=> $filename,
							'PageTitle' => $ptitle,
							'PageContent' => $this->input->post('page_content'),
							'Status' => $this->admin_model->format_data($this->input->post('status'))
						);
						$result = $this->db->insert('tblpages',$data);
						
						if($result) {
							$this->session->set_flashdata('pages_msg', 'Page Added successfully.');
							redirect('cms');
						} else{
							$this->session->set_flashdata('pages_msg', 'Error In Adding Page.');					
						}
				   }
				   else {
				   		$this->session->set_flashdata('pages_msg', 'Page with that Name Already Exits.');
				   }
			   }
		   }
	   }
		$this->template->render();
  }
  
  function changeStatus(){ //Page Status Changing , this method is called via Ajax 
		$status['Status'] = $this->input->post('status');
		$id = intval($this->input->post('id'));
		$where = array('PageId'=>$id);
		if ($this->db->update('tblpages',$status,$where)){
			echo 'success';
		}else{
			echo '';	
		}
 }
 
  function delete($id=NULL){ // Page Deletion
		$id = (int)$id;
		if($this->admin_model->count_row('tblpages', 'PageId', $id) != 0) {
			$this->db->where('PageId', $id);
			$result = $this->db->delete('tblpages');
			if($result){
				$action['user_msg']	= 'page Successfully Deleted.';
			}else{
				$action['user_msg']	= 'Error In Deleting Page.';	
			}
		}else{ 	
			$action['user_msg']	= 'No Such Page Found.';
		}
		$this->session->set_flashdata($action);
		redirect('cms');
  }
  public function _get_datas($id) {
	  if($id) {
			$pages = $this->admin_model->get_single_row('tblpages', 'PageId', $id);
			if(empty($pages)) {
				$error['page_msg']   = "Invalid Request!";
				$this->session->set_flashdata($error);
				redirect('cms');				
			}		
			$data['ipath'] = $this->admin_model->get_formatted($pages->FeatureImage);	
			$data['ptitle'] = $this->admin_model->get_formatted($pages->PageTitle);
			$data['pcontent'] = $this->admin_model->get_formatted($pages->PageContent);
			$data['status'] = intval($pages->Status);
		}
		else {
			$data['ipath'] = '';
			$data['ptitle'] = '';
			$data['pcontent'] = '';
			$data['status'] = -1;
		}
		return $data;
  }
 

  
}

/* End of file cms.php */
/* Location: ./application/modules/cms/controllers/cms.php */