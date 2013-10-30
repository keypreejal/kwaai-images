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
                            <a class="close" href="javascript:;">Ã—</a>                        
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
                            
                            <label>Page Title:</label>
                            <div class="field">
                                <input type="text" name="page_title" id="page_title" size="50" value="<?php echo $ptitle;?>" class="validate[required]"/>            
                            </div>
                            <label>Page Slug:</label>
                            <div class="field">
                                <input type="text" name="page_slug" id="page_slug" size="70" value="<?php echo $pslug;?>"/>            
                            </div>
                            <label>Location:</label>
                            <div class="field">
                              <select name="page_location" id="page_location" class="validate[required]">
                                <option value="" <?php echo( ($plocation ==-1) ?"Selected":"")?>>Select Page Location</option>
                                <option value="0" <?php echo( ($plocation ==0) ?"Selected":"")?>>Header</option>
                                <option value="1" <?php echo( ($plocation ==1) ?"Selected":"")?>>Footer</option>
                                <option value="2" <?php echo( ($plocation ==2) ?"Selected":"")?>>Both</option>
                              </select>
                            </div>
                            <div class="hposition" style="display:none;">
                                <label>Header Position:</label>
                                <div class="field">
                                    <input type="text" name="header_position" id="header_position" size="10" value="<?php echo $hposition==-1?'':$hposition;?>"/>           
                                </div>
                              </div>
                            <div class="fposition" style="display:none;">
                                <label>Footer Position:</label>
                                <div class="field">
                                    <input type="text" name="footer_position" id="footer_position" size="10" value="<?php echo $fposition==-1?'':$fposition;?>"/>            
                                </div>
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
                                <option value="" <?php echo( ($status ==-1) ?"Selected":"")?>>Select Status</option>
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
   var hpos = "<?php echo $hposition;?>";
   var fpos = "<?php echo $fposition;?>"; 
   if(  hpos !=-1){
       $('div.hposition').show();
   }if( fpos !=-1) { 
        $('div.fposition').show();
   }
  
   $('#header_position,#footer_position').keyup(function(e){
       e.preventDefault();
       this.value = this.value.replace(/[^0-9\.]/g,'');
   });

  
    $('#page_title').keyup(function(e){
        e.preventDefault();
        this.value = this.value.replace(/[^a-zA-Z0-9\s/-]/g,'');
        if(this.value != ''){
          var pslug = $.trim($(this).val());
          pslug = pslug.replace(/[^a-zA-Z0-9/-]/g,'-').toLowerCase();
          full_slug = "<?php echo site_url();?>"+pslug+'.html';
          $('#page_slug').val(full_slug);
        }
    });
    

    $('#page_location').live('change',function(){
      var pl = $(this).val();
      if(pl !=''){
        if(pl == 0) {
          $('input#header_position').addClass('validate[required]');
          $('input#footer_position').removeClass('validate[required]');
          $('div.hposition').show(); $('div.fposition').hide();
          $('input#footer_position').removeAttr('value');
        } else if(pl == 1){
          $('input#footer_position').addClass('validate[required]');
          $('input#header_position').removeClass('validate[required]');
          $('div.fposition').show(); $('div.hposition').hide();
          $('input#header_position').removeAttr('value');
        }else if(pl == 2){
          $('input#header_position').addClass('validate[required]');
          $('input#footer_position').addClass('validate[required]');
          $('div.hposition').show(); $('div.fposition').show();
        }
      } else {
        $('div.hposition').hide();
        $('div.fposition').hide();
        $('input#header_position').removeClass('validate[required]');
        $('input#footer_position').removeClass('validate[required]');
        $('input#header_position').removeAttr('value');
        $('input#footer_position').removeAttr('value');
      }
    });
}); 
</script>