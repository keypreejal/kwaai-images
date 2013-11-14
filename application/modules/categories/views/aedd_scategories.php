<div id="content">
        <div id="contentHeader">
            <h1>SubCategory</h1>
        </div>
        <!-- #contentHeader -->    
        <div class="container">
            <div class="grid-24">
            	<?php if($this->session->flashdata('scategory_msg')): ?>
                         <div class="notify notify-success">                        
                            <a class="close" href="javascript:;">×</a>                        
                            <h3><?php echo $this->session->flashdata('scategory_msg');?></h3>                        
                        </div>
                    <?php endif; ?>
                <div class="widget">
                    <div class="widget-header">
                        <span class="icon-article"></span>
                        <h3><?php echo empty($scname)?'Add New SubCategory ': 'Edit SubCategory '?>Information</h3>
                    </div> <!-- .widget-header -->
				 	 <form class="form uniformForm validateForm" enctype="multipart/form-data" method="post" >  
                        <div class="widget-contents">
                            <div class="field-group">
                                 <?php if($this->session->userdata('logged_in')):
                                        $session_data = $this->session->userdata('logged_in');
                                       endif;
                                 ?>
                                 <div class="field">
                                 	<div class="widget widget-tabs">
                                      <div class="widget-header">
                                      	<?php  
										  $tabs = ''; $contents = '';      
																													
										  $id = $scid; 
                                         
										  foreach($languages as $language){
											$tabs .= "<li><a href=#tab_".intval($language->LangId).">".$this->admin_model->format_data($language->LangName)."</a></li>";         
											$scname = $this->admin_model->get_single_data('tblcategorychild','SCategoryName','SCatId',$id);
										  
											$id= !empty($id)?$id+1:'';
											$contents .= "<div class=widget-content id=tab_".intval($language->LangId)." style=display: block;>
											   <label>SubCategory Name:</label><div class=field><input type=text name=scname[] size=50 id=tab_".intval($language->LangId)."scname value='$scname'></input> </div></div>";
										   } 
										?> 
										<ul class="tabs left"> 
										   <?php echo $tabs; ?>
										</ul>   
                                      </div> <!-- .widget-header -->
                                      
                                      <label>Select Category:</label>
                                        <div class="field">
                                           <select name="category" id="category" class="validate[required]">
                                                <option value="">Select Category Name</option>
                                                  <?php 				
                                                    foreach($categories as $category){
                                                        $selected = (($catid == intval($category->CatId))?' selected="selected"':'');
                                                        echo "<option value='".intval($category->CatId)."'".$selected.">".$this->admin_model->format_data($category->CategoryName)."</option>";					
                                                    } ?>
                                            </select>
                                        </div>
                                        <?php echo $contents; ?>
                                                                               
                                        <label>IsFeatured:</label>
                                        <div class="field">
                                            <select name="featured" id="featured" class="validate[required]">
                                                <option value="">Is Featured</option>
                                                 <option value="1" <?php echo( ($featured ==1) ?"Selected":"")?>>Yes</option>
                                                 <option value="0" <?php echo( ($featured ==0) ?"Selected":"")?>>No</option>
                                            </select>
                                        </div>
                                        
                                        <label>Status:</label>
                                        <div class="field">
                                           <select name="status" id="status" class="validate[required]">
                                                <option value="">Select Status</option>
                                                 <option value="0" <?php echo( ($status ==0) ?"Selected":"")?>>Disable</option>
                                                 <option value="1" <?php echo( ($status ==1) ?"Selected":"")?>>Enable</option>
                                            </select>
                                        </div>
                                      
                                    </div>
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
<script type="text/javascript">
$('document').ready(function(){
 $('ul.tabs li:first-child').addClass('active');
 $('div#tab_1 input').addClass("validate[required]");
});
</script>