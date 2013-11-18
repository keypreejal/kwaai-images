<?php
class MY_Front_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session'); 
        
       if(!$this->session->userdata('lang_arr')){
       	$sess_array = 'en';
		$this->session->set_userdata('lang_arr', $sess_array);
       }
    }
}
?>