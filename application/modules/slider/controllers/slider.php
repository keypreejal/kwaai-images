<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Slider extends MY_Controller {

  public function __construct() {
   	 parent::__construct();    
	 $this->load->model('admin/admin_model');
	 $this->load->model('img_model','image');
  }
 
   public function index() {
   		$this->template->set_template('default');
   		$data['slides'] = $this->admin_model->get_grid('tblslider','SliderId');
   		$this->template->write_view('content', 'slider/slider_view',$data);
		$this->template->render();
   }
	
   public function addSlides() {
   		$data['slides'] = $this->admin_model->get_grid('tblslider','SliderId');
   		$this->template->write_view('content', 'slider/add_slides');
		$this->template->render();
   }
   public function editSlides($id=Null) {
   		$id = (int)$id;
		$data = $this->formData($id);

   		$this->template->write_view('content', 'slider/edit_slides',$data);
   		if ($this->input->post('submit')) {
   			/*create directory for images start*/
			$tmp = './sliderImg/tmp/';
			$dest = './sliderImg/'; 
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

	   					
			$update_data['Title '] = $this->input->post('title');
			$update_data['Status'] = intval($this->input->post('status'));
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
				$this->image->resize($tmp_file_path,$thumb,250,100);
				$this->image->resize($tmp_file_path,$dest,1600,425);
				@unlink($tmp_file_path);
				$update_data['ImageName'] = $filename;

				//unlink old image
				$image_name = $this->admin_model->get_single_data('tblslider','ImageName',array('SliderId'=>$id));
				if($image_name)
				{
					 @unlink($dest.$image_name);
					 @unlink($thumb.$image_name);
				}
			}
			$this->db->where('SliderId', $id);
			$result = $this->db->update('tblslider', $update_data);
			if($result){
				$this->session->set_flashdata('slider_msg', 'Slider Updated successfully.');
				redirect('slider');
			} else{
				$this->session->set_flashdata('slider_msg', 'Error In Updating Slider.');					
			}
		}
		$this->template->render();
   }
   
   public function upload()	{					
		/*create directory for images start*/
		$tmp = './sliderImg/tmp/';
		$dest = './sliderImg/'; 
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
		for($i=0;$i<count($img);$i++) {
			
			//upload images to tmp folder
			
			$base64img = explode(',',$img[$i]);
			$data = base64_decode($base64img[1]);
			$replacearr = array('data:image/',';base64');
			$ext = str_replace($replacearr,'',$base64img[0]);
			$filename = time().$i.".$ext";
			$tmp_file_path = $tmp.$filename;
			file_put_contents($tmp_file_path, $data);
				
			// move/resize images
			
			$this->image->resize($tmp_file_path,$thumb,250,100);
			$this->image->resize($tmp_file_path,$dest,1600,425);
			@unlink($tmp_file_path);
			
			$title  = $this->input->post('title');
			$status = $this->input->post('image_status');
			
			$data = array(
				'ImageName'	=> $filename,
				'Title'			=> $title[$i],
				'Status'		=> $status[$i]
			);
			$this->db->insert('tblslider',$data);
		}
   }

	public function changeStatus(){ //Slider Status Changing , this method is called via Ajax 
		$status['Status'] = $this->input->post('status');
		$id = intval($this->input->post('id'));
		$where = array('SliderId'=>$id);
		if ($this->db->update('tblslider',$status,$where)){
			echo 'success';
		}else{
			echo '';	
		}
 	}
	public function delete($id=NULL)
	{
		 $id = (int)$id;
		 if($id > 0)
		 {
			 $image_name = $this->admin_model->get_single_data('tblslider','ImageName',array('SliderId'=>$id));
			 if($image_name)
			 {
				 $result = $this->db->delete('tblslider',array('SliderId'=>$id));
				 if($result){
						$default ='./sliderImg/'.$image_name;
						$thumb = './sliderImg/thumb/'.$image_name;
						@unlink($default);@unlink($thumb);
						$action['slider_msg']	= 'Image Successfully Deleted.';
					}else{
						$action['trip_msg']	= 'Error In Deleting Image.';	
					}
					$this->session->set_flashdata($action);
			 }else
			 {
				$action['trip_msg']	= 'No Such Image Found.';
				$this->session->set_flashdata($action); 
			 }
		 }
		 redirect('slider');
	}

	function formData($id)
	{	
		if($id > 0)	{
			$query = $this->db->get_where('tblslider',array('SliderId '=>$id));
			$result = $query->row();
			if(!empty($result))	{
				$data['slider_id ']	 = $result->SliderId;
				$data['image_path']  = base_url().'sliderImg/thumb/'.$result->ImageName;
				$data['title']		 = $result->Title ;
				$data['status']		 = $result->Status;
			} else{
				redirect('admin/trip');	
			}
			
		} else {
			$data['slider_id']	 = '';
			$data['image_path']  = '';
			$data['title']		 = '';
			$data['status']		 = '';
		}
		return $data;
	}
  
}

/* End of file Login.php */
/* Location: ./application/modules/slider/controllers/slider.php */