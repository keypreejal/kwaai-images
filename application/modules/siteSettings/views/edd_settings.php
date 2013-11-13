<div id="content">
        <div id="contentHeader">
            <h1>Site Settings</h1>
        </div>
        <!-- #contentHeader -->    
        <div class="container">
            <div class="grid-24">
            	<?php if($this->session->flashdata('settings_msg')): ?>
                         <div class="notify notify-success">                        
                            <a class="close" href="javascript:;">×</a>                        
                            <h3><?php echo $this->session->flashdata('settings_msg');?></h3>                        
                        </div>
                    <?php endif; ?>
                <div class="widget">
                    <div class="widget-header">
                        <span class="icon-article"></span>
                        <h3>Edit Settings Information</h3>
                     </div> <!-- .widget-header -->
				 	 <form class="form uniformForm validateForm" enctype="multipart/form-data" method="post" >  
                        <div class="widget-content">
                            <div class="field-group">
                                <?php if($this->session->userdata('logged_in')):
                                        $session_data = $this->session->userdata('logged_in');
                                      endif; ?>
                                    <label>Title:</label>
                                    <div class="field">
                                        <input type="text" name="site_title" id="site_title" size="50" value="<?php echo $stitle;?>" readOnly="true" class="validate[required]"/>            
                                    </div>
                                    <label>Value:</label>
                                    <div class="field">
                                    	<input type="text" name="site_value" id="site_value" size="50" value="<?php echo $svalue;?>" class="validate[required]"/>            
                                    </div>
                                    <?php if($stitle == 'contact-email'){?>
                                    <script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
                                    <label>Others:</label>
                                    <div class="field">
                                        <textarea name="others" id="others"><?php echo $others;?></textarea> 
                                        <script type="text/javascript">      
                                          var editor = CKEDITOR.replace( 'others', {
                                          enterMode : CKEDITOR.ENTER_BR,
                                          defaultLanguage : 'en',
                                          entities : true,
                                          width: '100%',
                                          tabSpaces:10,
                                          filebrowserBrowseUrl: '<?php echo site_url();?>ckeditor/sfilemanager/index.html'
                                          });
                                       </script>
                                    </div>
                                    <?php }?>
                                    <label>Status:</label>
                                    <div class="field">
                                       <select name="status" id="status" class="validate[required]">
                                            <option value="" <?php echo( ($status ==-1) ?"Selected":"")?>>Select Status</option>
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