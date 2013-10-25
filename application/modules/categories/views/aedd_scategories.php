<div id="content">
        <div id="contentHeader">
            <h1>Add SubCategory</h1>
        </div>
        <!-- #contentHeader -->    
        <div class="container">
            <div class="grid-18">
            	<?php if($this->session->flashdata('orientation_msg')): ?>
                         <div class="notify notify-success">                        
                            <a class="close" href="javascript:;">×</a>                        
                            <h3><?php echo $this->session->flashdata('orientation_msg');?></h3>                        
                        </div>
                    <?php endif; ?>
                <div class="widget">
                    <div class="widget-header">
                        <span class="icon-article"></span>
                        <h3><?php echo empty($scname)?'Add New SubCategory ': 'Edit SubCategory '?>Information</h3>
                    </div> <!-- .widget-header -->
				 	 <form class="form uniformForm validateForm" enctype="multipart/form-data" method="post" >  
                        <div class="widget-content">
                            <div class="field-group">
                                 <?php if($this->session->userdata('logged_in')):
                                        $session_data = $this->session->userdata('logged_in');
                                       endif;
                                 ?>
                                 	<label>Select Category:</label>
                                    <div class="field">
                                       <select name="category" id="category" class="validate[required]">
                                            <option value="">Select Category Name</option>
                                              <?php 				
												foreach($categories as $category){
													$selected = (($cid == intval($category->CatId))?' selected="selected"':'');
													echo "<option value='".intval($category->CatId)."'".$selected.">".$this->admin_model->format_data($category->CategoryName)."</option>";					
												} ?>
                                        </select>
                                    </div>
                                    
                                    <label>SubCategory Name:</label>
                                    <div class="field">
                                        <input type="text" name="scname" id="scname" size="50" value=<?php echo $this->admin_model->format_data($scname);?>"" class="validate[required]"/>            
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
                          </div>
                        
                  	</form>
                 	 
                </div><!-- .widget-content -->
            </div><!-- .widget --> 
       </div>     <!-- .grid --> 
</div>