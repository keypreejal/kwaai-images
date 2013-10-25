    <!-- #contentHeader -->
<div id="content">
        <div id="contentHeader">
            <h1>Change Password</h1>
        </div>
        <!-- #contentHeader -->    

        <div class="container">

            <div class="grid-18">
                <div class="widget widget-plain">
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
                        </div>
                        <input type="submit" name="submit"class="btn btn-error" value="Save">
                  </form>
                    
                </div><!-- .widget-content -->
            </div><!-- .widget --> 
       </div>     <!-- .grid --> 
</div>        <!-- .container --> 