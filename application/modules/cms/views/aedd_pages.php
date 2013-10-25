<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<div id="content">
        <div id="contentHeader">
            <h1>Pages</h1>
        </div>
        <!-- #contentHeader -->    
        <div class="container">
            <div class="grid-24">
            	<?php if($this->session->flashdata('pages_msg')): ?>
                         <div class="notify notify-success">                        
                            <a class="close" href="javascript:;">×</a>                        
                            <h3><?php echo $this->session->flashdata('pages_msg');?></h3>                        
                        </div>
              <?php endif; ?>
              <div class="widget">
                <div class="widget-header">
                    <span class="icon-article"></span>
                    <h3><?php echo empty($ptitle)?'Add New Page ': 'Edit Page '?>Information</h3>
                </div> <!-- .widget-header -->
				 	      <form class="form uniformForm validateForm" enctype="multipart/form-data" method="post" >  
                    <div class="widget-content">
                        <div class="field-group">
                            <?php if($this->session->userdata('logged_in')):
                                $session_data = $this->session->userdata('logged_in');
                            endif; ?>
                            <label>Feature Image:</label>
                            <div class="field">
                                <input type="file" name="upload_image" id="upload_image" />  
                                <div class="prevew" style="float:right;"><?php echo $ipath !=''?("<img id=uimg src=".site_url()."featureImg/thumb/$ipath>"):''?></div>         
                            </div>
                            <label>Page Title:</label>
                            <div class="field">
                                <input type="text" name="page_title" id="page_title" size="50" value=<?php echo $ptitle;?>"" class="validate[required]"/>            
                            </div>
                            <label>Page Content:</label>
                            <div class="field">
                               <textarea name="page_content" id="page_content"><?php echo $pcontent;?></textarea> 
                               <?php //echo $this->ckeditor->editor("page_content","$pcontent"); ?>
                               <script type="text/javascript">      
                                  var editor = CKEDITOR.replace( 'page_content', {
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
                                <option value="">Select Status</option>
                                <option value="0" <?php echo( ($status ==0) ?"Selected":"")?>>Disable</option>
      								          <option value="1" <?php echo( ($status ==1) ?"Selected":"")?>>Enable</option>
                              </select>
                            </div>
                        </div>
                        <div class="field">
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
    $('#upload_image').change(function(e){
       var $loaded = 0;
        
        var files = e.target.files; // FileList object
        if(files !=''){ $('#uimg').remove();}
        for (var i = 0, f; f = files[i]; i++) {
          if (!f.type.match('image.*')) {
            continue;
          }
          var reader = new FileReader();
          reader.onload = (function(theFile) {
            return function(e) {
              var spn = document.createElement('span');
                spn.innerHTML = ['<img height="75px" width="75px" src="', e.target.result,'"/><input type="hidden" name="img" id="preview-feat" value="',e.target.result,'" />'].join('');
                            
              $('.prevew').append(spn).delay(100).queue(function() {$(this).dequeue(); });
              
              $loaded++;
            };
          })(f);
          reader.readAsDataURL(f);
        }
    });
}); 
</script>