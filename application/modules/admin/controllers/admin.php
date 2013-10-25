<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

/**
	 * Login Page for this controller.
	 *	This page loads a login form validates a login form and if validated create a session and redirect to dashboard
	 */
  #............begin constructor........................##
  public function __construct()
  {
   	 parent::__construct();    
	 $this->load->model('admin_model');
	 $this->load->model('slider/img_model','image');
  }
  #..............end constructor.......................##


	/**
		*Begin Index function for this controller
	 	* Thiis function Loads a login form with a view name login_view.php
	*/


  #...................................##
	public function index()
	{
		$this->admin_model->check_logged_in();
		$this->load->view('login_view');
	}
	//End Index Function
  #...................................##


   #...................................##
	/**
		*Begin Function Verifylogin
	 	* This function validates the login form against the blank username and password
	*/
	public function verifyLogin()
	{
    		#this sets the validations for the email and the password fields
    		  $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
    		  $this->form_validation->set_rules('password', 'Password','trim|required|xss_clean');
    		#checks the validation and returns to login page if validations goes false
    		if($this->form_validation->run() == FALSE){
         	  #Field validation failed.  User redirected to login page
         		 $this->load->view('login_view');
       	}
       	else{
       		 	$this->checklogin();
        #calls a checklogin function to check username and password in database
       	}
	}
	#ends verifylogin function
  #.................................##

  #.................................##
	/**
		*Begin Function checklogin
	 	* This function generally takes the user login input and match the input with the username and password in the database and if matches redirect to dashboard and else redirect to login page
	*/
	public function checklogin()
   	{
		#gets email
		$email = mysql_real_escape_string($this->input->post('email'));
		
		#gets password
		$password = mysql_real_escape_string($this->input->post('password'));
		
		#query the database
		$result = $this->admin_model->validatelogin($email, $password);#calls a model name user with login function
		if($result){
					/**
						   * START A SESSION WITH THE USERNAME IN THE SESSION DATA
					   */
					$sess_array = array();
					foreach($result as $row)
					{
					$sess_array = array(
								'id' => $row->UserID,
								'username' => $row->UserName,
								'user_type'=>$row->UserType,
								'email'=>$row->UserEmail,
								'statuss'=>$row->UserStatus
						 );
				}#...............end foreach.......##
			   $this->session->set_userdata('logged_in', $sess_array);//set the session name logged_in with the array data
			   #...........redirect to home page......##
			   redirect('home','refresh');
		
		}else{
		 $this->session->set_flashdata('invalidlogin',"Invalid UserEmail And Password");
		 redirect('admin');
	  }
   	#.........endif..........##
   	  
 }
  #end function checklogin
  #....................................................##

  #..............BEGIN FUNCTION LOGOUT...........##
  #destroy session and redirect to index page#
  public function logout(){
    session_destroy();
    redirect('admin');

  }
  #...................END LOGOUT.................##
  
  
  #..............BEGIN FUNCTION CHANGE PASSWORD...........##
  public function changePassword() {
	   $this->template->write_view('content', 'admin/cpassword');
	   if ($this->input->post('submit')) 
	   {
		    $this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
            $this->form_validation->set_rules('retype_password', 'Retype Password', 'trim|required');
            
			#gets password
			$password = mysql_real_escape_string($this->input->post('new_password'));
			$rpassword =  mysql_real_escape_string($this->input->post('retype_password'));
			
			if($password == $rpassword) {
				$email = $this->input->post('email');
				$id = $this->admin_model->get_single_data('tbladmin', 'UserID', 'UserEmail', $email);
				if($id){
					$this->db->where('UserID', $id);
					$update_data['password'] = md5($password);
					$result = $this->db->update('tbladmin', $update_data);
					
					if($result) {
						$this->session->set_flashdata('successMsg',"Password Changed Successfully");
						redirect('home','refresh');
					}
					
				}
			}
		   
	   }
	   $this->template->render();
  }
  
}

/* End of file Login.php */
/* Location: ./application/modules/login/controllers/login.php */