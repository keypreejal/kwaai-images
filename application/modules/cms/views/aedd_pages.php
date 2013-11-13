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
                    <div class="widget-contents">
                       <div class="field-group">
                             <div class="field">
                               	<div class="widget widget-tabs">
                                 	<div class="widget-header">
                                	<?php
                                  $selected = ($status ==1)?'selected="selected"':'';
                                                  $tabs = ''; $contents = '';      
                                  $id = $pid;
                                  foreach($languages as $language){
                                    $tabs .= "<li><a href=#tab_".intval($language->LangId).">".$this->admin_model->format_data($language->LangName)."</a></li>"; 
                                           
                                                   $tle = $this->admin_model->get_single_data('tblpages','PageTitle','PageId',$id);
                                                   $slg = $this->admin_model->get_single_data('tblpages','PageSlug','PageId',$id);
                                                   $cont = $this->admin_model->get_single_data('tblpages','PageContent','PageId',$id);
                                                                    
                                                   $id= !empty($id)?$id+1:'';
                                          
        
                                     //slug is same for all language
                                     $slug ="<label>Page Slug:</label><div class=field><input type=text name=page_slug id=page_slug size=70 value=$slg></div>";
                                     
                                               $contents .= "<div class=widget-content id=tab_".intval($language->LangId)." style=display: block;> <label>Page Title:</label><div class=field><input type=text name=page_title[] id=tab_".intval($language->LangId)."page_title size=50 class=validate[required] value='$tle'></div>$slug<label>Page Content:</label><div class=field><textarea name=page_content[] id=tab_".intval($language->LangId)."_page_content>$cont</textarea><script type=text/javascript> var editor = CKEDITOR.replace( 'tab_".intval($language->LangId)."_page_content', { enterMode : CKEDITOR.ENTER_BR,defaultLanguage : 'en',entities : true,width: '100%',tabSpaces:10,filebrowserBrowseUrl: '<?php site_url();?>ckeditor/sfilemanager/index.html'});</script></div></div>"; } 
										?>
                                         <ul class="tabs left"> 
											<?php echo $tabs; ?>         
                                         </ul> 
                                     </div>
                                     
                                    <?php echo $contents; ?>
                                    
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
                                    <label>Status:</label>
                                    <div class=field>
                                      <select name="status" id="status" class="validate[required]">
                                        <option value=''>Select Status</option>
                                        <option <?php echo $selected ;?>value=0>Disable</option>
                                        <option <?php echo $selected;?> value=1>Enable</option>
                                      </select>
                                    </div>
                                 
                               </div>   
                             </div>
                        </div>   
                       <div class="field">
                          <input type="submit" name="submit" class="btn btn-primary" value="Save">
                       </div>
                    </div><!-- .widget-contents --> 
                </form>
              </div><!-- .widget --> 
            </div><!-- .grid-24 --> 
       </div>     
</div>

<script type="text/javascript">
$('document').ready(function(){
   $('ul.tabs li:first-child').addClass('active');
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
   $('#tab_1page_title').keyup(function(e){
	    e.preventDefault();
        this.value = this.value.replace(/[^a-zA-Z0-9\s/-]/g,'');
        if(this.value != ''){
          var pslug = $.trim($(this).val());
          pslug = pslug.replace(/[^a-zA-Z0-9/-]/g,'-').toLowerCase();
          full_slug = "<?php echo site_url();?>"+pslug+'.html';
          $('#page_slug,div#tab_2 #page_slug,div#tab_3 #page_slug').val(full_slug);
        }
    });
   $('div#tab_2 #page_slug,div#tab_3 #page_slug').attr('readOnly',true);
	 
}); 
</script>