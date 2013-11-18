<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setlang extends MY_Front_Controller {

	
	/**
	 * Setlang Page for this controller.
	 *	Is used to set Langugage post via jquery
	 */
  	#............begin constructor........................##
  	public function __construct()
	{
		parent::__construct(); 
	}

	public function index(){
		$lang = $this->input->post('language');
		$this->session->set_userdata('lang_arr', $lang);
		echo 1;
	}
}  