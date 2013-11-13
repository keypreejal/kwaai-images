<style>
#upload_image{
    display: block;
    visibility: hidden;
    width: 0;
    height: 0;
}
</style>
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
                                <div class="field preview">
                                   <span id="img-wrap"><img id="preview-img" src="<?php echo $image_path;?>"/></span>
                                   <a href="javascript:void(0)" title="Edit Image" id="edit">Edit</a>
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
                <input type="file" name="upload_image" id="upload_image" class="upload_image" accept="image/jpeg" />
            </div><!-- .widget-->
        </div>  <!-- .grid-18 --> 
   </div>     <!-- .container --> 
</div>
<script type="text/javascript">
$('document').ready(function(){
    $('#edit').click(function(e){
        e.preventDefault();
        $('#upload_image').trigger('click');
    });
    
    $('#upload_image').change(function(e){
       var $loaded = 0;
        
        var files = e.target.files; // FileList object

        if(files !=''){ $('#preview-img').remove();}
        for (var i = 0, f; f = files[i]; i++) {
          if (!f.type.match('image.*')) {
            continue;
          }
          var reader = new FileReader();
          reader.onload = (function(theFile) {
            return function(e) {
              innerHTML = ['<img height="40px" width="250px" src="', e.target.result,'"/><input type="hidden" name="img" id="preview-edit" value="',e.target.result,'" />'].join('');
                            
              $('div.preview>#img-wrap').html(innerHTML).delay(100).queue(function() {$(this).dequeue(); });
              
              $loaded++;
            };
          })(f);
          reader.readAsDataURL(f);
        }
    });
});
</script>