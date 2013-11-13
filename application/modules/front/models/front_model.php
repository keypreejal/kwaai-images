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
	
	function get_datas($table_name,$order_field,$where=NULL,$group=NULL){
		$this->db->order_by($order_field,'DESC');
		if (is_array($where) && !empty($where)){
			$this->db->where($where);
		}
		if(!empty($group)){
			$this->db->group_by($group);
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
	function get_single_constant_data($table_name, $field, $field_name, $field_value,$langid)
	{
		$this->db->select($field);
		$this->db->where($field_name, $field_value);
		$this->db->where('KeywordLangId', $langid);
		$query = $this->db->get($table_name)->row();	
		
		if($query) {
			return $query->$field;
		}
		return '';
	}
	
	function get_single_row($table_name, $field, $value, $lfield=Null, $lvalue=NULL)
	{
		if(!empty($lfield) && !empty($lvalue)){
			$this->db->where($lfield, trim($lvalue));
		}	
		$this->db->where($field, trim($value));
		$query = $this->db->get($table_name);
		return $query->row();
	}

	function generateCode($characters) {
		$possible = '123456789bcdfghjkmnpqrstvwxyz';
		$code = '';
		$i = 0;
		while ($i < $characters) { 
			$code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
			$i++;
		}
		return $code;
	}
}
//end of class
//end of file login_model.php
//file_location:application/modules/login/models/login-model.php

