<div id="content">
        <div id="contentHeader">
            <h1>Category</h1>
        </div>
        <!-- #contentHeader -->    
        <div class="container">
            <div class="grid-24">
            	<?php if($this->session->flashdata('category_msg')): ?>
                         <div class="notify notify-success">                        
                            <a class="close" href="javascript:;">×</a>                        
                            <h3><?php echo $this->session->flashdata('category_msg');?></h3>                        
                        </div>
                    <?php endif; ?>
                <div class="widget">
                    <div class="widget-header">
                        <span class="icon-article"></span>
                        <h3><?php echo empty($cname)?'Add New Category ': 'Edit Category '?>Information</h3>
                    </div> <!-- .widget-header -->
				 	 <form class="form uniformForm validateForm" enctype="multipart/form-data" method="post" >  
                        <div class="widget-contents">
                          <div class="field-group">
                             <?php if($this->session->userdata('logged_in')):
                                    $session_data = $this->session->userdata('logged_in');
                                   endif;?>
                                    
                                    <div class="field">
                                    	<div class="widget widget-tabs">
                                          <div class="widget-header">
                                            <?php  
                                                  $tabs = ''; $contents = '';      
                                                                                                                            
                                                  $id = $cid;
                                                  foreach($languages as $language){
                                                    $tabs .= "<li><a href=#tab_".intval($language->LangId).">".$this->admin_model->format_data($language->LangName)."</a></li>";         
                                                    $cname = $this->admin_model->get_single_data('tblcategory','CategoryName','CatId',$id);
                                                  
                                                    $id= !empty($id)?$id+1:'';
                                                    $contents .= "<div class=widget-content id=tab_".intval($language->LangId)." style=display: block;>
                                                       <label>Category Name:</label><div class=field><input type=text name=cname[] size=50 id=tab_".intval($language->LangId)."cname value='$cname'></input> </div></div>";
                                                   } 
                                              ?> 
                                            <ul class="tabs left"> 
                                               <?php echo $tabs; ?>
                                            </ul>         
                                          </div> <!-- .widget-header -->
                                          
                                          <?php echo $contents; ?>
                                          
                                          <label>Status:</label>
                                          <div class="field">
                                               <select name="status" id="status" class="validate[required]">
                                                    <option value="" <?php echo( ($status ==-1) ?"Selected":"")?>>Select Status</option>
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
                        </div><!-- .widget-content -->
                        
                  	</form>
                </div><!-- .widget --> 
            </div><!-- .grid --> 
       </div>     
</div>
<script type="text/javascript">
$('document').ready(function(){
 $('ul.tabs li:first-child').addClass('active');
 $('div#tab_1 input').addClass("validate[required]");
});
</script>