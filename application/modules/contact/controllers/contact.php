<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

  public function __construct()
  {
   	 parent::__construct();    
   	 $this->load->model('front/front_model');
	   $this->template->set_template('defaultfront');
  }
 
  public function index()
  {
  	$data['slides'] = '';
  	$data['pages'] = $this->front_model->get_datas('tblpages','PageId');
	
	  $this->template->write_view('content', 'contact/contact_view',$data);
	  $this->template->render();
  }

  
 

  
}

/* End of file about.php */
/* Location: ./application/modules/about/controllers/about.php */