    <!-- #contentHeader -->
<div id="content">
        <div id="contentHeader">
            <h1>Change Password</h1>
        </div>
        <!-- #contentHeader -->    

        <div class="container">

            <div class="grid-24">
              <div class="widget">
                <div class="widget-header">
                    <span class="icon-article"></span>
                    <h3>Change Password Information</h3>
                </div> <!-- .widget-header -->
				        <form class="form uniformForm validateForm" enctype="multipart/form-data" method="post" >  
          	       <div class="widget-content">
                    <div class="field-group">
                     <?php if($this->session->userdata('logged_in')):
                            $session_data = $this->session->userdata('logged_in');
                           endif;
			 ?>
                        <label>User Email:</label>
                        <div class="field">
                            <input type="text" name="user_email" id="user_email" size="20" value="<?php echo $session_data['email'];  ?>"  readonly="readonly"/>            
                        </div>
                        <label>New Password:</label>
                        <div class="field">
                            <input type="password" name="new_password" id="new_password" size="20" class="validate[required]" />            
                         </div>
                        <label>Retype Password:</label>
                        <div class="field">
                            <input type="password" name="retype_password" id="retype_password" size="20" class="validate[required]" />                                </div>
                     </div> <!-- .actions -->
                     <div class="field">
                      <input type="submit" name="submit"class="btn btn-primary" value="Save">
                     </div>
                    </div>
                </form>
                    
                </div><!-- .widget-content -->
            </div><!-- .widget --> 
       </div>     <!-- .grid --> 
</div>        <!-- .container --> 