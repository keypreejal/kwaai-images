<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orientation extends MY_Controller {

  public function __construct()
  {
   	 parent::__construct();    
	 $this->load->model('admin/admin_model');
	 $this->template->set_template('default');
  }
 
  public function index() {
	$data['orientations'] = $this->admin_model->get_grid('tblorientation','OrId','','CreatedAt');
	
	$this->template->write_view('content', 'orientation/orientation_view',$data);
	$this->template->render();
  }

  public function aeddOrientation($id = NULL) {
	   $id = (int)$id;
	   $data = $this->_get_datas($id);
	   $where = array('LangStatus'=>1); 
	   $data['languages'] = $this->admin_model->get_all_datas('languagetypes','LangName',$where);
	   $this->template->write_view('content', 'orientation/aedd_orientation',$data);
	   
	   if ($this->input->post('submit')) 
	   {
		   $this->form_validation->set_rules('oname[0]', 'Orientation Name', 'trim|required');
		   $this->form_validation->set_rules('status', 'Page Status', 'trim|required');
		 
		   //check whether the form is validated or not
           if($this->form_validation->run() == FALSE){
               $this->template->write_view('content', 'orientation/aedd_orientation',$data);
               $this->template->render(); 
           } else {
			   $oname = $this->input->post('oname');
			   if($id !='') { // update here
					$utime = date('Y-m-d H:i:s'); 
					for($i=0; $i<count($oname); $i++) {	
						$this->db->where('OrId', $id);			
						$update_data['OrName'] = $this->admin_model->format_data($oname[$i]);
						$update_data['Status'] = $this->admin_model->format_data($this->input->post('status'));
						$update_data['UpdatedAt'] = $utime;
						$id = $id+1;
						$result = $this->db->update('tblorientation', $update_data);
					}
					if($result){
							$this->session->set_flashdata('orientation_msg', 'Orientation Updated successfully.');
							redirect('orientation');
					} else{
						$this->session->set_flashdata('orientation_msg', 'Error In Updating Orientation.');					
					}
					
			   } else { //insert here
				   if($this->admin_model->count_no_fields('tblorientation','OrName', $oname[0] ) == '0') { 
				   		$itime = date('Y-m-d H:i:s');
				   		for($i=0; $i<count($oname); $i++) {
							$insert_data['OrName'] = $this->admin_model->format_data($oname[$i]);
							$insert_data['OrLangId'] = $i+1;
							$insert_data['Status'] = $this->admin_model->format_data($this->input->post('status'));
							$insert_data['CreatedAt'] = $itime;
							$result = $this->db->insert('tblorientation', $insert_data);
						}
						if($result) {
							$this->session->set_flashdata('orientation_msg', 'Orientation Added successfully.');
							redirect('orientation');
						} else{
							$this->session->set_flashdata('orientation_msg', 'Error In Adding Orientation.');	
							redirect('orientation');				
						}
				   }
				   else {
				   		$this->session->set_flashdata('orientation_msg', 'Unable to Add, Orientation with that Name Already Exits.');
						redirect('orientation');
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
		for($i=$id;$i<($id+3);$i++){
			$where = $this->db->where('OrId',$i);	
			$result = $this->db->update('tblorientation',$status,$where);
		}
		if ($result){
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
			$data['oid'] = intval($id);		
			$data['oname'] = $this->admin_model->get_formatted($orient->OrName);
			$data['status'] = intval($orient->Status);
		}
		else {
			$data['oid'] = '';
			$data['oname'] = '';
			$data['status'] = -1;
		}
		return $data;
  }
 
  
}

/* End of file orientation.php */
/* Location: ./application/modules/cms/orientation/orientation.php */