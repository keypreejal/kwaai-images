<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Admin_model extends CI_Model
{
    public function __construct()
    {
      parent::__construct();


    }
    /**
      *Begin function login
      * This gets the parameters as usename and password from the controller and validates with the username and password in the database
    */
    function validatelogin($username, $password)
    {
      $this -> db -> select('*');
       $this -> db -> from('tbladmin');
       $this -> db -> where('UserEmail = ' . "'" . $username . "'");
       $this -> db -> where('Password = ' . "'" .md5($password) . "'");
       $this -> db -> limit(1);

      $query = $this -> db -> get();//gets the result from query
       if($query -> num_rows() == 1){
            return $query->result();
       }
       else{
         return false;
       }
    }//end function validatelogin
	
	/**
	  * @updateLoginChanges
	  *add the new details in the usertable such as login ip login date time
	*/
	public function updateLoginChanges($data,$id){ 
		$this->db->where('UserID', $id);
		$this->db->update('users', $data); 
	}
 
 	function check_logged_in()
	{
		if($this->session->userdata('logged_in') )
		{
			redirect('home','refresh');
		}
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
	
	function get_all_datas($table_name,$order_field,$where){
		$this->db->order_by($order_field,'DESC');
		if (is_array($where) && !empty($where)){
			$this->db->where($where);
		}
		$query = $this->db->get($table_name);			
		return $query->result();
	}
	
	function count_no_fields_edit($table_name,$field_name,$value,$id,$uid)
	{
		$this->db->where($id.' !=', $uid);
		$this->db->where($field_name, trim($value));
		$this->db->from($table_name);					
		return $this->db->count_all_results();
	}
	
	function count_no_fields($table_name,$field_name,$value)
	{
		$this->db->where($field_name, trim($value));
		$this->db->from($table_name);					
		return $this->db->count_all_results();
	}
	
	function count_row($table_name, $field, $id)
	{
		$this->db->where($field, $id);
		$this->db->from($table_name);
		return $this->db->count_all_results();
	}
	public function get_grid($table_name,$primary_field) 
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

}
//end of class
//end of file login_model.php
//file_location:application/modules/login/models/login-model.php

