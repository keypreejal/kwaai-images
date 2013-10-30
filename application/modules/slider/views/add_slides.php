<style>
#upload_image{
display: block;
    visibility: hidden;
    width: 0;
    height: 0;
}
.thumb {
	height: 75px;
	border: 1px solid rgb(0,0,0);
	margin: 10px 5px 0px 0px;
}
</style>
<!-- #contentHeader -->
<div id="content">
    <div id="contentHeader">
        <h1>Add Slider Images</h1>
    </div>
    <!-- #contentHeader -->    

   <div class="container">
        <div class="grid-18">
            <div class="widget-plain">
            	<form id="slider-form" class="slider-form" method="post" >
            		<input multiple="multiple" type="file" name="upload_image[]" id="upload_image" class="upload_image" accept="image/jpeg" style="display:inline-block;" />
 					<input type="button" name="add" id="add" value="Add Images" style="float:left;" />
                </form>
                
                <div id="content-body" class="prev-div" style="display:none;">
                    <div class="image-tools-wrap" style="float:right;">
                        <input type="button" name="addImg" id="pre_addimg" value="Add Images" />
                        <input type="button" name="cancel" id="cancel" value="Cancel" onclick="window.location='<?php echo site_url();?>slider';"/>
                       
                    </div><br/><br/>
                    <section class="item">
                        <form id="preview_form"  method="post" class="validate_form" enctype="multipart/form-data">
                            <div class="form_inputs" id="slider-content">
                                <fieldset id="sdel">
                                  <table id="sli-cont" class="table table-striped" width="100%" border="0">
                                    <thead>
                                      <tr>
                                        <th scope="col">Preview Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                  </table>
                                </fieldset>
                            </div>
                        </form>
                        </section>
				</div> 
            </div><!-- .widget-plain -->
        </div><!-- .container --> 
   </div><!-- .container --> 
</div>       
<script type="text/javascript">

var preview=false;
$('document').ready(function(){
	$('#add,#pre_addimg').click(function(e){
		e.preventDefault();
		$('#upload_image').trigger('click');
	});
	
	$('#upload_image').change(function(e){
				
		var $slider ='',$status_action;var $loaded = 0;
		
		$slider = '<td><input type="text" name="title[]" class="title"></td>';
		
		$status_action = '';
		
		var files = e.target.files; // FileList object
		for (var i = 0, f; f = files[i]; i++) {
		  if (!f.type.match('image.*')) {
			continue;
		  }
		  var reader = new FileReader();
		  reader.onload = (function(theFile) {
			return function(e) {
			  var tr = document.createElement('tr');
				tr.innerHTML = ['<td><img class="thumb" src="', e.target.result,
								'" title="', escape(theFile.name), '"/><input type="hidden" name="img[]" id="slide" value="',e.target.result,'" /></td>'+$slider+'<td id="st"><select name=image_status[] style="width:100px;"><option value="1">Enable</option><option value="0">Disable</option></select></td><td><img src="<?php echo site_url();?>images/admin/upload.png" class="uploadIt" title="Upload Now" style="margin-left:5px; cursor:pointer;" />&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo site_url();?>/images/admin/cross.png" class="delete" title="Delete This Image" style="margin-left:5px; cursor:pointer;" /></td>'].join('');
			  $('.prev-div table#sli-cont tbody').append(tr).delay(100).queue(function() {$(this).dequeue(); });
			  $('.prev-div').show();
			  $('#add').hide();
			   $loaded++;
			};
		  })(f);
		  reader.readAsDataURL(f);
		}
	});	
	
	$(document).on('click','img.uploadIt',function(e){
		e.preventDefault();
		var tdlength=$("tabl#sli-cont thead tr th").length;
		var thisTr = $(this).closest('tr');var thisUp = $(this);var showdel='f';
		
			thisUp.hide();thisUp.next('.delete').hide();
			$('<img>',{
				src : '<?php echo site_url();?>/images/load.gif',
				class : 'loading',
			}).insertAfter($(this));
			$('body').append('<form class="wrapform" name="formwrap" style="display:none;">'+thisTr.html()+'</form>');	
			$.ajax({
				url:'<?php echo site_url("slider/upload");?>',
				data:thisTr.find("select, input").serialize(),
				type:'POST',
				async:true,
				dataType:"json",
				success: function(data){
					$('img.loading').remove();
					thisTr.find('td:last').append('<span>Uploaded Successfully</span>');
					},
				error:function(data){
					$('form.wrapform').remove();$('img.loading').remove();
					$('form#preview_form input,select,textarea').remove();
					$('table#sli-cont').find('img.uploadIt,img.delete').remove();
					alert('Error : Reload and Try again');
				}
			});
	});
	
	$('.delete').live('click',function(){
			$(this).closest('tr').remove();
	});
	
});
</script>