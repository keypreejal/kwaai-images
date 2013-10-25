<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orientation extends MY_Controller {

  public function __construct()
  {
   	 parent::__construct();    
	 $this->load->model('admin/admin_model');
  }
 
  public function index() {
	$data['orientations'] = $this->admin_model->get_grid('tblorientation','OrId');
	
	$this->template->write_view('content', 'orientation/orientation_view',$data);
	$this->template->render();
  }

  public function aeddOrientation($id = NULL) {
	   $id = (int)$id;
	   $data = $this->_get_datas($id);
	   $this->template->write_view('content', 'orientation/aedd_orientation',$data);
	   
	   if ($this->input->post('submit')) 
	   {
		   $this->form_validation->set_rules('oname', 'Orientation Name', 'trim|required');
		   $this->form_validation->set_rules('status', 'Page Status', 'trim|required');
		 
		   //check whether the form is validated or not
           if($this->form_validation->run() == FALSE){
               $this->template->write_view('content', 'orientation/aedd_orientation',$data);
               $this->template->render(); 
           } else {
			   $oname = $this->input->post('oname');
			   if($id !='') { // update here
					if($this->admin_model->count_no_fields_edit('tblorientation','OrName', $oname, 'OrId', $id) == '0') {  
						$this->db->where('OrId', $id);			
						$update_data['OrName'] = $this->admin_model->format_data($oname);
						$update_data['Status'] = $this->admin_model->format_data($this->input->post('status'));
						$update_data['UpdatedAt'] = date('Y-m-d H:i:s');
						$result = $this->db->update('tblorientation', $update_data);
						if($result){
							$this->session->set_flashdata('orientation_msg', 'Orientation Updated successfully.');
							redirect('orientation');
						} else{
							$this->session->set_flashdata('orientation_msg', 'Error In Updating Orientation.');					
						}
					}
					else{
						$this->session->set_flashdata('orientation_msg', 'Duplicate Orientation With that Name Exists');				
					}
			   } else { //insert here
				   if($this->admin_model->count_no_fields('tblorientation','OrName', $oname ) == '0') { 
						$insert_data['OrName'] = $this->admin_model->format_data($oname);
						$insert_data['Status'] = $this->admin_model->format_data($this->input->post('status'));
						$insert_data['CreatedAt'] = date('Y-m-d H:i:s');
						$result = $this->db->insert('tblorientation', $insert_data);
						if($result) {
							$this->session->set_flashdata('orientation_msg', 'Orientation Added successfully.');
							redirect('orientation');
						} else{
							$this->session->set_flashdata('orientation_msg', 'Error In Adding Orientation.');					
						}
				   }
			   }
		   }
	   }
		$this->template->render();
  }
  
  function changeStatus(){  //Orientation Status Changing , this method is called via Ajax 
		$status['Status'] = $this->input->post('status');
		$id = intval($this->input->post('id'));
		$where = array('OrId'=>$id);
		if ($this->db->update('tblorientation',$status,$where)){
			echo 'success';
		}else{
			echo '';	
		}
 }
 
  function delete($id=NULL){ // Orientation Deletion
		$id = (int)$id;
		if($this->admin_model->count_row('tblorientation', 'OrId', $id) != 0) {
			$this->db->where('OrId', $id);
			$result = $this->db->delete('tblorientation');
			if($result){
				$action['orientation_msg']	= 'Orientation Successfully Deleted.';
			}else{
				$action['orientation_msg']	= 'Error In Deleting Orientation.';	
			}
		}else{ 	
			$action['orientation_msg']	= 'No Such Orientation Found.';
		}
		$this->session->set_flashdata($action);
		redirect('orientation');
  }
  
  public function _get_datas($id) {
	  if($id) {
			$orient = $this->admin_model->get_single_row('tblorientation', 'OrId', $id);
			if(empty($orient)) {
				$error['orientation_msg']   = "Invalid Request!";
				$this->session->set_flashdata($error);
				redirect('orientation');				
			}			
			$data['oname'] = $this->admin_model->get_formatted($orient->OrName);
			$data['status'] = intval($orient->Status);
		}
		else {
			$data['oname'] = '';
			$data['status'] = '';
		}
		return $data;
  }
 
  
}

/* End of file orientation.php */
/* Location: ./application/modules/cms/orientation/orientation.php */