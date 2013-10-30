<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<div id="content">
        <div id="contentHeader">
            <h1>SubPages of <?php echo $pageTitle;?></h1>
        </div>
        <!-- #contentHeader -->    
        <div class="container">
            <div class="grid-24">
              <?php if($this->session->flashdata('subpages_msg')): ?>
                         <div class="notify notify-success">                        
                            <a class="close" href="javascript:;">Ã—</a>                        
                            <h3><?php echo $this->session->flashdata('subpages_msg');?></h3>                        
                        </div>
              <?php endif; ?>
              <div class="widget">
                <div class="widget-header">
                    <span class="icon-article"></span>
                    <h3><?php echo empty($sptitle)?'Add New SubPage on Page '.'"'.$pageTitle.'"': 'Edit SubPage '.'"'.$pageTitle.'""'?></h3>
                </div> <!-- .widget-header -->
                <form class="form uniformForm validateForm" enctype="multipart/form-data" method="post" >  
                    <div class="widget-content">
                        <div class="field-group">
                            <?php if($this->session->userdata('logged_in')):
                                $session_data = $this->session->userdata('logged_in');
                            endif; ?>
                            
                            <label>SubPage Title:</label>
                            <div class="field">
                                <input type="text" name="spage_title" id="spage_title" size="50" value="<?php echo $sptitle;?>" class="validate[required]"/>            
                            </div>
                            <label>SubPage Slug:</label>
                            <div class="field">
                                <input type="text" name="spage_slug" id="spage_slug" size="70" value="<?php echo $spslug;?>"/>            
                            </div>
                            
                            

                            <label>SubPage Content:</label>
                            <div class="field">
                               <textarea name="spage_content" id="spage_content"><?php echo $spcontent;?></textarea> 
                               <?php //echo $this->ckeditor->editor("page_content","$pcontent"); ?>
                               <script type="text/javascript">      
                                  var editor = CKEDITOR.replace( 'spage_content', {
                                  enterMode : CKEDITOR.ENTER_BR,
                                  defaultLanguage : 'en',
                                  entities : true,
                                  width: '100%',
                                  tabSpaces:10,
                                  filebrowserBrowseUrl: '<?php echo site_url();?>ckeditor/sfilemanager/index.html'
                                  });
                               </script>
                             </div>
                            <label>Status:</label>
                            <div class="field">
                              <select name="status" id="status" class="validate[required]">
                                <option value="" <?php echo( ($status ==-1) ?"Selected":"")?>>Select Status</option>
                                <option value="0" <?php echo( ($status ==0) ?"Selected":"")?>>Disable</option>
                                <option value="1" <?php echo( ($status ==1) ?"Selected":"")?>>Enable</option>
                              </select>
                            </div>
                        </div>
                        <div class="field">
                          <input type="hidden" name="page_id" value="<?php echo $pageId;?>">
                          <input type="submit" name="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div><!-- .widget-content --> 
                </form>
              </div><!-- .widget --> 
            </div><!-- .grid-24 --> 
       </div>     
</div>

<script type="text/javascript">

$('document').ready(function(){
    $('#spage_title').keyup(function(e){
        e.preventDefault();
        this.value = this.value.replace(/[^a-zA-Z0-9\s/-]/g,'');
        if(this.value != ''){
          var pageTitle = "<?php echo $pageTitle;?>";
          var spslug = $.trim($(this).val());
          pageTitle = pageTitle.replace(/[^a-zA-Z0-9/-]/g,'-').toLowerCase();
          spslug = spslug.replace(/[^a-zA-Z0-9/-]/g,'-').toLowerCase();
          full_slug = "<?php echo site_url();?>"+pageTitle+'/'+spslug+'.html';
          $('#spage_slug').val(full_slug);
        }
    });
}); 
</script>