<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Links extends MY_Controller {

  public function __construct()
  {
   	 parent::__construct();    
	 $this->load->model('admin/admin_model');
  }
 
  public function index()
  {
	$data['links'] = $this->admin_model->get_grid('tblsociallinks','LinkId');
	$this->template->write_view('content', 'links/sl_view',$data);
	$this->template->render();
  }

  public function aeddLinks($id = NULL) {
	   $id = (int)$id;
	   $data = $this->_get_datas($id);
	   
	   $this->template->write_view('content', 'links/aedd_links',$data);
	   
	   if ($this->input->post('submit')) {
		   
		   $this->form_validation->set_rules('link_title', 'Link Title', 'trim|required');
		   $this->form_validation->set_rules('status', 'Link Status', 'trim|required');
		   //check whether the form is validated or not
           if($this->form_validation->run() == FALSE){
              $this->template->write_view('content', 'links/aedd_links',$data);
              $this->template->render(); 
           } else {
			   $slink = $this->input->post('link_url');
			   if($id !='') { // update here
					if($this->admin_model->count_no_fields_edit('tblsociallinks','LinkUrl', $slink, 'LinkId', $id) == '0') {  
						$this->db->where('LinkId', $id);			
						$update_data['LinkTitle'] = $this->admin_model->format_data($this->input->post('link_title'));
						$update_data['LinkUrl'] = $this->admin_model->format_data($slink);
						$update_data['Status'] = $this->admin_model->format_data($this->input->post('status'));
						$result = $this->db->update('tblsociallinks', $update_data);
						if($result){
							$this->session->set_flashdata('slink_msg', 'Social Link Updated successfully.');
							redirect('links');
						} else{
							$this->session->set_flashdata('slink_msg', 'Error In Updating SocialLink.');					
						}
					}
					else{
						$this->session->set_flashdata('page_msg', 'Duplicate Page With that Name Exists');				
					}
			   } else { //insert here
				   if($this->admin_model->count_no_fields('tblsociallinks','LinkUrl', $slink ) == '0') { // to check duplication
						$insert_data['LinkTitle'] = $this->admin_model->format_data($this->input->post('link_title'));
						$insert_data['LinkUrl'] = $this->admin_model->format_data($slink);
						$insert_data['Status'] = $this->admin_model->format_data($this->input->post('status'));
						$result = $this->db->insert('tblsociallinks', $insert_data);
						if($result) {
							$this->session->set_flashdata('slink_msg', 'Social Link Added successfully.');
							redirect('links');
						} else{
							$this->session->set_flashdata('slink_msg', 'Error In Adding Social Link.');					
						}
				   }
			   }
		   }
	   }
		$this->template->render();
	  
  }
  
  function changeStatus(){ //Link Status Changing , this method is called via Ajax
		$status['Status'] = $this->input->post('status');
		$id = intval($this->input->post('id'));
		$where = array('LinkId'=>$id);
		if ($this->db->update('tblsociallinks',$status,$where)){
			echo 'success';
		}else{
			echo '';	
		}
 }
 
  function delete($id=NULL){ // Link Deletion
		$id = (int)$id;
		if($this->admin_model->count_row('tblsociallinks', 'LinkId', $id) != 0) { 
			$this->db->where('LinkId', $id);
			$result = $this->db->delete('tblsociallinks');
			if($result){
				$action['slink_msg']	= 'Social Link Successfully Deleted.';
			}else{
				$action['slink_msg']	= 'Error In Deleting Social Links.';	
			}
		}else{ 	
			$action['slink_msg']	= 'No Such Links Found.';
		}
		$this->session->set_flashdata($action);
		redirect('links');
  }
  public function _get_datas($id) {
	  if($id) {
			$links = $this->admin_model->get_single_row('tblsociallinks', 'LinkId', $id);
			if(empty($links)) {
				$error['slink_msg']   = "Invalid Request!";
				$this->session->set_flashdata($error);
				redirect('links');				
			}			
			$data['ltitle'] = $this->admin_model->get_formatted($links->LinkTitle );
			$data['lurl'] = $this->admin_model->get_formatted($links->LinkUrl );
			$data['status'] = intval($links->Status);
		}
		else {
			$data['ltitle'] = '';
			$data['lurl'] = '';
			$data['status'] = '';
		}
		return $data;
  }
 
  
}

/* End of file cms.php */
/* Location: ./application/modules/Links/controllers/Links.php */