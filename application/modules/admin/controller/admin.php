<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends MX_Controller {
 
	public function index( )
	{
		$this->load->view('admin_view');
	}
}