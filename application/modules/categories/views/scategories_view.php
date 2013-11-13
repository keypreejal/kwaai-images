<style type="text/css">
  
  .img-preview{
    position:relative;
    display:block;
    width:100px;
    height:100px;
    background:#efefef;
    border:1px solid #FFF;
  }
  .img-preview img{
    position:absolute;
    top:0;
    left:0;
  }
  .image-container{
    float:left;
    margin:0 10px 10px 0;
    border:2px solid #ccc;
    padding:10px;
    background:#FFF;
  }
  .image-container:last-child{margin-right:0;}
  .image-container.over{
    border: 2px dashed #000;
  }
  .get-image,.del-image{
    margin-top:10px !important;
    display:block !important;
  }
  </style>
<!-- #contentHeader -->
<div id="content">
        <div id="contentHeader">
            <h1>List All SubCategory</h1>
        </div>
        <!-- #contentHeader -->    
        <div class="container">
            <div class="grid-24">
            	    <?php if($this->session->flashdata('scategory_msg')): ?>
                         <div class="notify notify-success">                        
                            <a class="close" href="javascript:;">×</a>                        
                            <h3><?php echo $this->session->flashdata('scategory_msg');?></h3>                        
                        </div>
                    <?php endif; ?>
                   <a class="btn btn-small" href="<?php echo base_url(); ?>admin/categories/aeddSCategories">Add SubCategory</a>
                   <div class="widget widget-table">
                        <div class="widget-header">
                            <span class="icon-list"></span>
                            <h3 class="icon chart">SubCategory Table</h3>        
                        </div>
                        <div class="widget-content">
                    		<table class="table table-bordered table-striped data-table">
                                <thead>
                                    <tr>
                                        <th>Feature Image</th>
                                        <th>SubCategory Name</th>
                                        <th>Is Featured</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                       if(is_array($scategories)>0):
                                        foreach($scategories as $scategory): 
    										$enable ='';$disable='';
    										$sta = $scategory->Status==1?'Enable':'Disable';
    										if ($scategory->Status==1){
    											$enable=" selected=selected";
    										}else{
    											$disable=" selected=selected";
    										}
    										$setSta = '<span style="margin-left:10px;display:in-line;"><select style="float:none; min-width:100px;" class="sta" name="sta" id="'.$scategory->SCatId.'"><option value="1"'.$enable.'>Enable</option><option value="0"'.$disable.'>Disable</option></select>';

                                            $fenable ='';$fdisable='';
                                            $feat = $scategory->IsFeatured==1?'Yes':'No';
                                            if ($scategory->IsFeatured==1){
                                                $fenable=" selected=selected";
                                            }else{
                                                $fdisable=" selected=selected";
                                            }
                                            $setFeat = '<span style="margin-left:10px;display:in-line;"><select style="float:none; min-width:100px;" class="feat" name="feat" id="'.$scategory->SCatId.'"><option value="1"'.$fenable.'>Yes</option><option value="0"'.$fdisable.'>No</option></select>';
    								?>
                                        <tr class="gradeA">
                                            <td><div class="image-container">
                                                    <div class="img-preview"><form name="imgform" class="imgform"><img src="<?php echo site_url().'featureSubCat/thumb/'.$scategory->FeatureImage;?>"/></form></div>
                                                    <input type="button" name="add" class="add" value="Add" style="float:left;" />
                                                    <input type="button" id="remove" rid="<?php echo $scategory->SCatId;?>" value="Remove" style="float:left;" />
                                                    <input type="file" pid="<?php echo $scategory->SCatId;?>" name="upload_image" class="upload_image" accept="image/jpeg" style="visibility:hidden;" />
                                                </div>
                                            </td>
                                            <td><?php echo $scategory->SCategoryName; ?></td>
                                            <td><?php echo '<span class="dataFeat">'.$feat.'</span>'.$setFeat; ?></td>
                                            <td><?php echo '<span class="dataSta">'.$sta.'</span>'.$setSta; ?></td>
                                            <td class="actiontd">
                                               
                                                <a title="Edit" href="<?php echo base_url(); ?>admin/categories/aeddSCategories/<?php echo $scategory->SCatId ?>"><img src="<?php echo base_url(); ?>images/admin/edit.png"></a>
                                                <a id="delpage" title="Delete" onclick="return confirm('Are You Sure To Delete This SubCategory?');" href="<?php echo base_url(); ?>categories/sdelete/<?php echo $scategory->SCatId ?>"><img src="<?php echo base_url(); ?>images/admin/close.png"></a>
                                            </td>
                                        </tr>
                                <?php endforeach; endif;?>
                                    
                                </tbody>
                            </table>
                         </div>
                 	</div>   
                </div><!-- .widget-content -->
            </div><!-- .widget --> 
       </div>     <!-- .grid --> 
</div>        <!-- .container --> 
<script type="text/javascript">
$(document).ready(function(e) {
	$('select.sta').live('change',function(e){
        e.preventDefault();
        $('<img>',{
            src : '<?php echo site_url();?>/images/admin/load.gif',
            class : 'loading',
        }).insertAfter($(this));
        var $id = parseInt($(this).attr('id'));
        var $status = parseInt($(this).val());
        var $this = $(this).closest('td');
        var text = $(this).find("option:selected").text();
        $.ajax({
            url:'<?php echo site_url("categories/changeStatus");?>',
            data:{id:$id,status:$status,tbl:'tblcategorychild',tid:'SCatId'},
            type:'POST',
            dataType:"html",
            success: function(data){
                $('img.loading').remove();
                if (data){
                    $($this).find('span.dataSta').text('').text(text);
                }else{
                    alert('Try Again'); 
                }
            }
        });
    });

    $('select.feat').live('change',function(e){
        e.preventDefault();
        $('<img>',{
            src : '<?php echo site_url();?>/images/admin/load.gif',
            class : 'loading',
        }).insertAfter($(this));
        var $id = parseInt($(this).attr('id'));
        var $feat = parseInt($(this).val());
        var $this = $(this).closest('td');
        var text = $(this).find("option:selected").text();
        $.ajax({
            url:'<?php echo site_url("categories/changeFeature");?>',
            data:{id:$id,feat:$feat},
            type:'POST',
            dataType:"html",
            success: function(data){
                $('img.loading').remove();
                if (data){
                    $($this).find('span.dataFeat').text('').text(text);
                }else{
                    alert('Try Again'); 
                }
            }
        });
    });

    $('.add').live('click',function(e){
        e.preventDefault();
        $(this).closest('td').find('.upload_image').trigger('click');
    });
    
    $('.upload_image').change(function(e){
       var $loaded = 0;
        var ip = $(this).closest('td').find('div.img-preview>form.imgform');
        var id = $(this).attr('pid'); 
      
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
              spn.innerHTML = ['<img height="100px" width="100px" src="', e.target.result,'"/><input type="hidden" name="img" class="preview-feat" value="',e.target.result,'" />'].join('');
             
              ip.html(spn).delay(100).queue(function() {$(this).dequeue(); });
              var data = ip.find("input").serialize();
              
               $.ajax({
                    url:'<?php echo site_url("categories/upload");?>'+'/'+id,
                    data:data,
                    type:'POST',
                });
              $loaded++;
            };
          })(f);
          reader.readAsDataURL(f);
        }
    }); 
    
       
    $('#remove').live('click',function(){
        var id = $(this).attr('rid'); 
        var img = $(this).closest('td').find('div.img-preview>form.imgform >img');
        $.ajax({
                url:'<?php echo site_url("categories/RemoveFeatureImage");?>'+'/'+id,
                type:'POST',
                success:function(data){
                    if(data!=''){
                       img.remove(); 
                    } else{
                        alert('Error');
                    }
                }
        });
       
    });
});
</script>