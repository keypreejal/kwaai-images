<div id="content">
    <div id="contentHeader">
        <h1>Edit Slide</h1>
    </div>
    <!-- #contentHeader -->  

   <div class="container">
        <div class="grid-18">
        	<div class="widget">
                <form class="form uniformForm validateForm" enctype="multipart/form-data" method="post" >  
                    <div class="widget-content">
                       <div class="field-group">
                             <?php if($this->session->userdata('logged_in')):
                                    $session_data = $this->session->userdata('logged_in');
                                   endif;
                             ?>
                                <label>Preview:</label>
                                <div class="field">
                                   <img src="<?php echo $image_path;?>"/>
                                </div>
                                <label>Title:</label>
                                <div class="field">
                                  <input type="text" name="title" id="" value="<?php echo $title;?>" />
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
                    </div> <!-- .widget-content-->
                </form>    
            </div><!-- .widget-->
        </div>  <!-- .grid-18 --> 
   </div>     <!-- .container --> 
</div>