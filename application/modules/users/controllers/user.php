<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();    
	}
  
	public function addedit()
	{
		$this->load->view('user_view');
	}
	

}