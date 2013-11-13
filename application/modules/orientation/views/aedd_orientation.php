<div id="content">
    <div id="contentHeader">
        <h1>Orientation</h1>
    </div>
    <!-- #contentHeader -->    
    <div class="container">
        <div class="grid-24">
            <?php if($this->session->flashdata('orientation_msg')): ?>
                 <div class="notify notify-success">                        
                    <a class="close" href="javascript:;">×</a>                        
                    <h3><?php echo $this->session->flashdata('orientation_msg');?></h3>                        
                </div>
            <?php endif; ?>
            <div class="widget">
                <div class="widget-header">
                    <span class="icon-article"></span>
                    <h3><?php echo empty($oname)?'Add New Oreientation ': 'Edit Orientation '?>Information</h3>
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
                                                                                                                    
                                          $id = $oid;
                                          foreach($languages as $language){
                                            $tabs .= "<li><a href=#tab_".intval($language->LangId).">".$this->admin_model->format_data($language->LangName)."</a></li>";         
                                            $oname = $this->admin_model->get_single_data('tblorientation','OrName','OrId',$id);
                                          
                                            $id= !empty($id)?$id+1:'';
                                            $contents .= "<div class=widget-content id=tab_".intval($language->LangId)." style=display: block;>
                                               <label>Orientation Name:</label><div class=field><input type=text name=oname[] size=50 id=tab_".intval($language->LangId)."oname value='$oname'></input> </div></div>";
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
                            <input type="submit" name="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                </form>
            </div><!-- .widget -->
        </div> <!-- .grid -->
    </div>   <!--container-->  
</div>
<script type="text/javascript">
$('document').ready(function(){
 $('ul.tabs li:first-child').addClass('active');
 $('div#tab_1 input').addClass("validate[required]");
});
</script>