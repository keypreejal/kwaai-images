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
                            <a class="close" href="javascript:;"></a>                        
                            <h3><?php echo $this->session->flashdata('subpages_msg');?></h3>                        
                        </div>
              <?php endif; ?>
              <div class="widget">
                <div class="widget-header">
                    <span class="icon-article"></span>
                    <h3><?php echo empty($sptitle)?'Add New SubPage on Page '.'"'.$pageTitle.'"': 'Edit SubPage '.'"'.$pageTitle.'""'?></h3>
                </div> <!-- .widget-header -->
                <form class="form uniformForm validateForm" enctype="multipart/form-data" method="post" >  
                  <div class="widget-contents">
                    <div class="field-group">
                       <div class="widget widget-tabs">
                        <?php
                           $selected = ($status ==1)?'selected="selected"':'';
							 	           $stabs = ''; $contents = '';      
                           $id = $spid;
                           foreach($languages as $language){
                             $stabs .= "<li><a href=#tab_".intval($language->LangId).">".$this->admin_model->format_data($language->LangName)."</a></li>"; 
								   
          								   $tle = $this->admin_model->get_single_data('tblpagechild','SPageTitle','SPageId',$id);
          								   $slg = $this->admin_model->get_single_data('tblpagechild','SPageSlug','SPageId',$id);
          								   $cont = $this->admin_model->get_single_data('tblpagechild','SPageContent','SPageId',$id);
                                                  
          								   $id= !empty($id)?$id+1:'';
                             //slug is same for all language
                             $slug = "<label>SubPage Slug:</label><div class=field><input type=text name=spage_slug id=spage_slug size=70 value=$slg></div>";

								             $contents .= "<div class=widget-content id=tab_".intval($language->LangId)." style=display: block;><label>SubPage Title:</label><div class=field><input type=text name=spage_title[] id=tab_".intval($language->LangId)."spage_title size=50 value='$tle'></div>$slug<label>SubPage Content:</label><div class=field><textarea name=spage_content[] id=tab_".intval($language->LangId)."_spage_content>$cont</textarea><script type=text/javascript>var editor = CKEDITOR.replace( 'tab_".intval($language->LangId)."_spage_content', { enterMode : CKEDITOR.ENTER_BR, defaultLanguage : 'en', entities : true, width: '100%', tabSpaces:10, filebrowserBrowseUrl: '<?php site_url();?>ckeditor/sfilemanager/index.html'}); </script></div></div>";
            								}
            							?>    
                            <ul class="tabs left"> 
                               <?php echo $stabs; ?>
                            </ul>   
                            <?php echo $contents; ?>
                            <label>Status:</label>
                            <div class=field>
                              <select name="status" id="status" class="validate[required]">
                                <option value=''>Select Status</option>
                                <option <?php echo $selected;?> value=0>Disable</option>
                                <option <?php echo $selected;?> value=1>Enable</option>
                              </select>
                            </div>
                         
                       </div>   
                    </div>   
                    	<div class="field">
                     	<input type="hidden" name="page_id" value="<?php echo $pageId;?>">
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
	  $('div#tab_1 input').addClass("validate[required]");
    $('#tab_1spage_title').keyup(function(e){
        e.preventDefault();
        this.value = this.value.replace(/[^a-zA-Z0-9\s/-]/g,'');
        if(this.value != ''){
          var pageTitle = "<?php echo $pageTitle;?>";
          var spslug = $.trim($(this).val());
          pageTitle = pageTitle.replace(/[^a-zA-Z0-9/-]/g,'-').toLowerCase();
          spslug = spslug.replace(/[^a-zA-Z0-9/-]/g,'-').toLowerCase();
          full_slug = "<?php echo site_url();?>"+pageTitle+'/'+spslug+'.html'; 
          $('#spage_slug,div#tab_2 #spage_slug,div#tab_3 #spage_slug').val(full_slug);
        }
    });
    $('div#tab_2 #spage_slug,div#tab_3 #spage_slug').attr('readOnly',true);
	
}); 
</script>