<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Front_model extends CI_Model
{
    public function __construct()
    {
      parent::__construct();
    }

    function format_data($data)
	{		
		$data = mysql_real_escape_string(trim($data));
		return $data; 
	}
    function get_formatted($data)
	{
		$data = (empty($data)?"":stripslashes($data));
		return $data;
	}
	
	function get_datas($table_name,$order_field,$where=NULL){
		$this->db->order_by($order_field,'ASC');
		if (is_array($where) && !empty($where)){
			$this->db->where($where);
		}
		$query = $this->db->get($table_name);			
		return $query->result();
	}
	
	function get_single_data($table_name, $field, $field_name, $field_value)
	{
		$this->db->select($field);
		$this->db->where($field_name, $field_value);
		$query = $this->db->get($table_name)->row();		
		if($query) {
			return $query->$field;
		}
		return '';
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

