<div id="content">
        <div id="contentHeader">
            <h1>Social Link</h1>
        </div>
        <!-- #contentHeader -->    
        <div class="container">
            <div class="grid-18">
            	<?php if($this->session->flashdata('slink_msg')): ?>
                         <div class="notify notify-success">                        
                            <a class="close" href="javascript:;">×</a>                        
                            <h3><?php echo $this->session->flashdata('slink_msg');?></h3>                        
                        </div>
                    <?php endif; ?>
                <div class="widget">
                    <div class="widget-header">
                        <span class="icon-article"></span>
                        <h3><?php echo empty($ltitle)?'Add New Link ': 'Edit Link '?>Information</h3>
                     </div> <!-- .widget-header -->
				 	 <form class="form uniformForm validateForm" enctype="multipart/form-data" method="post" >  
                        <div class="widget-content">
                            <div class="field-group">
                                <?php if($this->session->userdata('logged_in')):
                                        $session_data = $this->session->userdata('logged_in');
                                      endif; ?>
                                    <label>Link Title:</label>
                                    <div class="field">
                                        <input type="text" name="link_title" id="link_title" size="50" value=<?php echo $ltitle;?>"" class="validate[required]"/>            
                                    </div>
                                    <label>Link Url:</label>
                                    <div class="field">
                                    	<input type="text" name="link_url" id="link_url" size="50" value=<?php echo $lurl;?>"" class="validate[required]"/>            
                                    </div>
                                    <label>Status:</label>
                                    <div class="field">
                                       <select name="status" id="status" class="validate[required]">
                                            <option value="">Select Status</option>
                                             <option value="0" <?php echo( ($status ==0) ?"Selected":"")?>>Disable</option>
              								 <option value="1" <?php echo( ($status ==1) ?"Selected":"")?>>Enable</option>
                                        </select>
                                    </div>
                                 </div> <!-- .actions -->
                            <div class="field">
                                <input type="submit" name="submit"class="btn btn-primary" value="Save">
                            </div>
                        </div><!-- .widget-content --> 
                  	</form>
                </div><!-- .widget --> 
            </div>
       </div>     <!-- .grid --> 
</div>