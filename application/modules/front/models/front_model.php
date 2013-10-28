<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Front_model extends CI_Model
{
    public function __construct()
    {
      parent::__construct();


    }
    
	public function get_datas($table_name,$primary_field) 
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$query = $this->db->get();
		if($query->num_rows()>0){
		  return $query->result();
		}
		else{
		  return false;
		}
	}
	
	function get_single_row($table_name, $field, $value)
	{
		$this->db->where($field, trim($value));
		$query = $this->db->get($table_name);
		return $query->row();
	}
}
//end of class
//end of file login_model.php
//file_location:application/modules/login/models/login-model.php

