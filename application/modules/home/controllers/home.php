<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();
       
    }
    public function index()
    {
     	  // $this->load->library('template');
      //sets the template that u want to use
        $this->template->set_template('default');
  			$this->template->write_view('content', 'index_view');
  			$this->template->render();
  		
    }
	
  #.........logout........#
  public function logout()
  {
    
  	$this->session->unset_userdata('logged_in');
   	$this->session->sess_destroy();
    $data = $this->nocache();
   	redirect('admin',$data);
  }  
  #........end logout.....#

  function nocache()
  {
      $this->output->set_header("HTTP/1.0 200 OK");
      $this->output->set_header("HTTP/1.1 200 OK");
      $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
      $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
      $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
      $this->output->set_header('Pragma: no-cache');
      
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */