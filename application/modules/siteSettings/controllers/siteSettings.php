<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SiteSettings extends MY_Controller {

  public function __construct()
  {
   	 parent::__construct();    
	 $this->load->model('admin/admin_model');
	 $this->template->set_template('default');
  }
 
  public function index()
  {
  	$data['settings'] = $this->admin_model->get_grid('tblsitesettings','Id');
	$this->template->write_view('content', 'siteSettings/sitesettings_view',$data);
	$this->template->render();
  }

  public function eddSettings($id = NULL) {
	   $id = (int)$id; 
	   $data = $this->_get_datas($id);
	   
	   $this->template->write_view('content', 'siteSettings/edd_settings',$data);
	   
	   if ($this->input->post('submit')) {
		   
		   $this->form_validation->set_rules('site_value', 'Site Value', 'trim|required');
		   $this->form_validation->set_rules('status', 'Site Status', 'trim|required');
		   //check whether the form is validated or not
           if($this->form_validation->run() == FALSE){
              $this->template->write_view('content', 'siteSettings/aeddSettings',$data);
              $this->template->render(); 
           } else {
			   $svalue = $this->input->post('site_value');
			   if($id !='') { // update here
					if($this->admin_model->count_no_fields_edit('tblsitesettings','Value', $svalue, 'Id', $id) == '0') {  
						$this->db->where('Id', $id);			
						$update_data['Value'] = $this->admin_model->format_data($svalue);
						$update_data['Others'] = $this->admin_model->get_formatted($this->input->post('others'));
						$update_data['Status'] = $this->admin_model->format_data($this->input->post('status'));
						$result = $this->db->update('tblsitesettings', $update_data);
						if($result){
							$this->session->set_flashdata('settings_msg', 'Site Setting Updated successfully.');
							redirect('siteSettings');
						} else{
							$this->session->set_flashdata('settings_msg', 'Error In Updating Site Setting.');					
						}
					}
					else{
						$this->session->set_flashdata('settings_msg', 'Duplicate Site Setting With that Value Exists');				
					}
			   }
		   }
	   }
		$this->template->render();
	  
  }
  
  function changeStatus(){ //Setting Changing , this method is called via Ajax
		$status['Status'] = $this->input->post('status');
		$id = intval($this->input->post('id'));
		$where = array('Id'=>$id);
		if ($this->db->update('tblsitesettings',$status,$where)){
			echo 'success';
		}else{
			echo '';	
		}
 }
 
  
  public function _get_datas($id) {
	  if($id) {
			$settings = $this->admin_model->get_single_row('tblsitesettings', 'Id', $id);
			if(empty($settings)) {
				$error['settings_msg']   = "Invalid Request!";
				$this->session->set_flashdata($error);
				redirect('siteSettings');				
			}			
			$data['stitle'] = $this->admin_model->get_formatted($settings->Name );
			$data['svalue'] = $this->admin_model->get_formatted($settings->Value);
			$data['others'] = $this->admin_model->get_formatted($settings->Others);
			$data['status'] = intval($settings->Status);
		}
		else {
			$data['stitle'] = '';
			$data['svalue'] = '';
			$data['others'] = '';
			$data['status'] = -1;
		}
		return $data;
  }
 
  
}

/* End of file cms.php */
/* Location: ./application/modules/siteSettings/controllers/siteSettings.php */