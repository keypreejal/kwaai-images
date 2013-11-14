<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends MY_Controller {

  public function __construct()
  {
   	 parent::__construct();    
	 $this->load->model('admin/admin_model');
	 $this->load->model('slider/img_model','image');

  }
 
  public function index()
  {
  	$data['pages'] = $this->admin_model->get_grid('tblpages','PageId','','PageSlug');
	
	$this->template->write_view('content', 'cms/cms_view',$data);
	$this->template->render();
  }

  public function subPages($id=Null) {
  	$where = array('PageId'=>$id);
  	$data['spages'] = $this->admin_model->get_grid('tblpagechild','SPageId',$where,'PageId');
	$data['pageTitle'] = $this->admin_model->get_single_data('tblpages', 'PageTitle', 'PageId',$id);
	$this->template->write_view('content', 'cms/cms_sview',$data);
	$this->template->render();
  }

  public function aeddPages($id = NULL) {
	   $id = (int)$id;
	   $data = $this->_get_datas($id);

	   $where = array('LangStatus'=>1);
	   $data['languages'] = $this->admin_model->get_all_datas('languagetypes','LangName',$where);
	   $this->template->write_view('content', 'cms/aedd_pages',$data);
	   
	   if ($this->input->post('submit')) 
	   {
		  
	   	   	$this->form_validation->set_rules('page_title[0]', 'Page Title', 'trim|required');
		   	$this->form_validation->set_rules('status', 'Page Status', 'trim|required');
		   //check whether the form is validated or not
           if($this->form_validation->run() == FALSE){
              $this->template->write_view('content', 'cms/aedd_pages',$data);
              $this->template->render(); 
           } else {
           	   $ptitle = $this->input->post('page_title');
           	   $content = $this->input->post('page_content');
			   $slug = $this->input->post('page_slug');
			   
			   $hpos = $this->input->post('header_position')==''?-1:$this->input->post('header_position');
			   $fpos = $this->input->post('footer_position')==''?-1:$this->input->post('footer_position');
			   $status = $this->input->post('status');

           	   if($id !='') { // update here
				  for($i=0; $i<count($ptitle); $i++) {	
					$this->db->where('PageId', $id);			
					$update_data['PageTitle'] = $ptitle[$i];
					$update_data['PageSlug'] = $slug;
					$update_data['PageContent'] =  $content[$i];
					$update_data['PageLocation'] = intval($this->input->post('page_location'));
					$update_data['HeaderPosition'] = intval($hpos);
					$update_data['FooterPosition'] = intval($fpos);
					$update_data['Status'] = $status;
					$id = $id+1;
					$result = $this->db->update('tblpages', $update_data);
				  }
				  if($result){
					$this->session->set_flashdata('pages_msg', 'Page Updated successfully.');
					redirect('cms');
				  } else{
					$this->session->set_flashdata('pages_msg', 'Error In Updating Page.');
				  }
			   } else { //insert here
				   for($i=0;$i<count($ptitle);$i++){
					   if($this->admin_model->count_no_fields('tblpages','PageTitle', $ptitle[$i] ) == '0') {
						  $data = array(
									'PageTitle' => $ptitle[$i],
									'PageLangId' => $i+1,
									'PageContent' => $content[$i],
									'PageSlug' => $slug,
									'PageLocation' => intval($this->input->post('page_location')),
									'HeaderPosition' => intval($hpos),
									'FooterPosition' => intval($fpos),
									'Status' => $status
						  );
						  $result = $this->db->insert('tblpages',$data);
					   }
				   }
				  if($result) {
						$this->session->set_flashdata('pages_msg', 'Page Added successfully.');
						redirect('cms');
				  } else{
						$this->session->set_flashdata('pages_msg', 'Error In Adding Page.');					
				  }
			  }
		   }
	   }
		$this->template->render();
  }
 
 public function addSubPages($pid = NULL)  {
 	 $pid = (int)$pid;

 	 // prepare data for add subpage
 	 $where = array('LangStatus'=>1); 
 	 $data = array(
 	 			'pid' =>'',
 	 			'pageId' => $pid,
 	 			'languages' => $this->admin_model->get_all_datas('languagetypes','LangName',$where), 
				'pageTitle' => $this->admin_model->get_single_data('tblpages', 'PageTitle', 'PageId',$pid),
				'status' => -1
				);
 	 $this->template->write_view('content', 'cms/aedd_spages',$data);
	 if ($this->input->post('submit')) 
	 {
		   $this->form_validation->set_rules('spage_title[0]', 'Sub Page Title', 'trim|required');
		   $this->form_validation->set_rules('status', 'SubPage Status', 'trim|required');
		   //check whether the form is validated or not
           if($this->form_validation->run() == FALSE){
              $this->template->write_view('content', 'cms/aedd_spages',$data);
              $this->template->render(); 
           } else {
           	   $sptitle = $this->input->post('spage_title');
           	   $content = $this->input->post('spage_content');
			   $slug = $this->input->post('spage_slug');
			   $status = $this->input->post('status');
			   
			   //insert here
			   for($i=0;$i<count($sptitle);$i++){
			  	 if($this->admin_model->count_no_fields('tblpagechild','SPageTitle', $sptitle[$i] ) == '0') {
					$data = array(
						'PageId' => $this->admin_model->format_data($this->input->post('page_id')),		
						'SPageTitle' => $this->admin_model->format_data($sptitle[$i]),
						'SPageLangId' => $i+1,
						'SPageContent' => $content[$i],
						'SPageSlug' => $this->admin_model->format_data($slug),
						'Status' => intval($status)
					);
					$result = $this->db->insert('tblpagechild',$data);
			  	 }
			   }
				if($result) {
					$i = $pid;
					$j = $i+3;
					for($i; $i<$j; $i++){
						$this->db->where('PageId',$i);	
						$update_data['HasSubPage'] = 1;
						$result = $this->db->update('tblpages', $update_data);
					}
					if($result) {
						$this->session->set_flashdata('spages_msg', 'SubPage Added successfully.');
						redirect('cms');
					}
				} else{
					$this->session->set_flashdata('spages_msg', 'Error In Adding SubPage.');					
				}
			   
		   }
	 }
	 $this->template->render();
 }

 public function editSubpage($id=NULL) {
 	$spid  = intval($id);
 	// prepare data for edit subpage
	$spages = $this->admin_model->get_single_row('tblpagechild', 'SPageId', $spid);

 	if(empty($spages)) {
		$error['spage_msg']   = "Invalid Request!";
		$this->session->set_flashdata($error);
		redirect('cms/subPage');				
	}	
	 $where = array('LangStatus'=>1); 
 	 $data = array(
 	 			'spid' =>$spid,
 	 			'pageId' => $this->admin_model->get_formatted($spages->PageId),
 	 			'languages' => $this->admin_model->get_all_datas('languagetypes','LangName',$where), 
				'pageTitle' => $this->admin_model->get_single_data('tblpages', 'PageTitle', 'PageId',$spages->PageId),
				'status' => intval($spages->Status)
			);


	$this->template->write_view('content', 'cms/aedd_spages',$data);
 	if ($this->input->post('submit')) 
	{
		   $this->form_validation->set_rules('spage_title[0]', 'Sub Page Title', 'trim|required');
		   $this->form_validation->set_rules('status', 'SubPage Status', 'trim|required');
		   //check whether the form is validated or not
           if($this->form_validation->run() == FALSE){
              $this->template->write_view('content', 'cms/aedd_spages',$data);
              $this->template->render(); 
           } else {
			 	// update here
	 		 	$sptitle = $this->input->post('spage_title');
	 		 	$content = $this->input->post('spage_content');
				$slug = $this->input->post('spage_slug');
				$status = $this->input->post('status');
	 		 	for($i=0; $i<count($sptitle); $i++) {	
					$this->db->where('SPageId', $spid);	
					$update_data['PageId'] = $this->admin_model->format_data($this->input->post('page_id'));		
					$update_data['SPageTitle'] = $this->admin_model->format_data($sptitle[$i]);
					$update_data['SPageSlug'] = $this->admin_model->format_data($slug);
					
					$update_data['SPageContent'] = $content[$i];
					$update_data['Status'] = $status;
					$spid = $spid+1;
					$result = $this->db->update('tblpagechild', $update_data);
				}
				if($result){
					$i = $spages->PageId;
					$j = $i+3;
					for($i ; $i<$j; $i++){
						$this->db->where('PageId',$i);	
						$update_data_parent['HasSubPage'] = 1;
						$result = $this->db->update('tblpages', $update_data_parent);
					}
					if($result) {
						$this->session->set_flashdata('spages_msg', 'SubPage Updated successfully.');
						$pid = $this->admin_model->get_single_data('tblpagechild','PageId','SPageId',$id);
						redirect("admin/cms/subPages/$pid");
					}
				} else{
					$this->session->set_flashdata('spages_msg', 'Error In Updating SubPage.');					
				}
			}
	}
	$this->template->render();
 }

  public function upload($id=NULL)	{	
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
		$img = $this->input->post('img');
		$id = intval($id);
		
		$image_name = $this->admin_model->get_single_data('tblpages','FeatureImage','PageId',$id);				
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
		$this->image->resize($tmp_file_path,$dest,940,'');
		@unlink($tmp_file_path);

		for($i=$id;$i<($id+3);$i++){
			$this->db->where('PageId',$i);	
			$update_data['FeatureImage'] = $filename;
			$result = $this->db->update('tblpages', $update_data);
		}
	}

  function changeStatus(){ //Page Status Changing , this method is called via Ajax 
		$status['Status'] = $this->input->post('status');
		$id = intval($this->input->post('id'));
		$table = $this->input->post('tbl');
		$tid = $this->input->post('tid');
		
		for($i=$id;$i<($id+3);$i++){
			$where = $this->db->where($tid,$i);	
			$result = $this->db->update($table, $status);
		}
		if ($result){
			echo 'success';
		}else{
			echo '';	
		}
 }
 
  function delete($id=NULL){ // Page Deletion
		$id = (int)$id;
		if($this->admin_model->count_row('tblpages', 'PageId', $id) != 0) {
			//unlink old image
			$image_name = $this->admin_model->get_single_data('tblpages','FeatureImage','PageId',$id); //get featureImge name
			$hsp = $this->admin_model->get_single_data('tblpages','HasSubPage','PageId',$id); // check if it has subpage or not
			
			for($i=$id;$i<($id+3);$i++){
				$this->db->where('PageId',$i);	
				$result = $this->db->delete('tblpages');
			}
			if($result){
				if($image_name) {
					 $dest = './featureImg/';
			 		 $thumb = $dest.'thumb/'; 
					 @unlink($dest.$image_name);
					 @unlink($thumb.$image_name);
				} 
				if( $hsp != Null){ //Delete Subpage if it has 
					for($i=$id;$i<($id+3);$i++){
						$this->db->where('PageId',$i);	
						$this->db->delete('tblpagechild');
					}
				}
				$action['page_msg']	= 'Page Successfully Deleted.';
			}else{
				$action['page_msg']	= 'Error In Deleting Page.';	
			}
		}else{ 	
			$action['page_msg']	= 'No Such Page Found.';
		}
		$this->session->set_flashdata($action);
		redirect('cms');
  }

  function sdelete($id=NULL){ // SubPage Deletion
		$id = (int)$id;
		$pid = $this->admin_model->get_single_data('tblpagechild','PageId','SPageId',$id); 
		if($this->admin_model->count_row('tblpagechild', 'SPageId', $id) != 0) {
			for($i=$id;$i<($id+3);$i++){
				$this->db->where('SPageId',$i);	
				$result = $this->db->delete('tblpagechild');
			}
			if($result){
				$action['spage_msg']	= 'Subpage Successfully Deleted.';
				if($this->admin_model->count_no_fields('tblpagechild', 'PageId', $pid)<=0){
					for($i=$pid;$i<($pid+3);$i++){
						$this->db->where('PageId',$i);	
						$update_data['HasSubPage'] = 0;
						$result = $this->db->update('tblpages', $update_data);
					}
					if($result) {
						redirect("cms");
					}
				}
			}else{
				$action['spage_msg']	= 'Error In Deleting SubPage.';	
			}
		}else{ 	
			$action['spage_msg']	= 'No Such SubPage Found.';
		}
		$this->session->set_flashdata($action);
		redirect("cms/subPages/$pid");
  }

  function RemoveFeatureImage($id=NULL){ // Feature Image Deletion(Update)
	$id = (int)$id;
	//unlink old image
	$image_name = $this->admin_model->get_single_data('tblpages','FeatureImage','PageId',$id);
	for($i=$id;$i<($id+3);$i++){
		$this->db->where('PageId',$i);	
		$update_data['FeatureImage'] = '';
		$result = $this->db->update('tblpages', $update_data);
	}
	if($result){
		if($image_name) {
			 $dest = './featureImg/';
			 $thumb = $dest.'thumb/'; 
			 @unlink($dest.$image_name);
			 @unlink($thumb.$image_name);
			 echo 'success';
		}
	}
 }

  public function _get_datas($id) { // get data for page
	  if($id) {
			$pages = $this->admin_model->get_single_row('tblpages', 'PageId', $id);
			if(empty($pages)) {
				$error['page_msg']   = "Invalid Request!";
				$this->session->set_flashdata($error);
				redirect('cms');				
			}	
			$data['pid'] = intval($id);
			$data['ptitle'] = $this->admin_model->get_formatted($pages->PageTitle);
			$data['pslug'] = $this->admin_model->get_formatted($pages->PageSlug);
			$data['plocation'] = intval($pages->PageLocation);
			$data['hposition'] = intval($pages->HeaderPosition);
			$data['fposition'] = intval($pages->FooterPosition);
			$data['status'] = intval($pages->Status);
		}
		else {
			$data['pid'] = '';
			$data['ptitle'] = '';
			$data['pslug']  = '';
			$data['plocation'] = -1;
			$data['hposition'] = -1;
			$data['fposition'] = -1;
			$data['status'] = -1;
		}
		return $data;
  }

  

  
}

/* End of file cms.php */
/* Location: ./application/modules/cms/controllers/cms.php */