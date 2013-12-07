<style type="text/css">
  
  .img-preview{
    position:relative;
    display:block;
    width:150px;
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
    margin:0 10px 10px 0;
	    padding:10px;
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
            <h1>List All Pages</h1>
        </div>
        <!-- #contentHeader -->    

        <div class="container">
            <div class="grid-24">
            		<?php if($this->session->flashdata('cms_msg')): ?>
                         <div class="notify notify-success">                        
                            <a class="close" href="javascript:;">×</a>                        
                            <h3><?php echo $this->session->flashdata('cms_msg');?></h3>                        
                        </div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('spages_msg')): ?>
                         <div class="notify notify-success">                        
                            <a class="close" href="javascript:;">×</a>                        
                            <h3><?php echo $this->session->flashdata('spages_msg');?></h3>                        
                        </div>
                    <?php endif; ?>
                   <a class="btn btn-small" href="<?php echo base_url(); ?>admin/cms/aeddPages">Add Page</a>
                   <div class="widget widget-table">
                        <div class="widget-header">
                            <span class="icon-list"></span>
                            <h3 class="icon chart">Page Table</h3>        
                        </div>
                        <div class="widget-content">
                            <table class="table table-bordered table-striped data-table">
                                <thead>
                                    <tr>
                                        <th>Feature Image</th>
                                        <th>Page Title</th>                                    
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(is_array($pages)>0):
                                        foreach($pages as $page): 
                      										$enable ='';$disable='';
                                          $sta = $page->Status==1?'Enable':'Disable';
                                          if ($page->Status==1){
                                            $enable=" selected=selected";
                                          }else{
                                            $disable=" selected=selected";
                                          }
                                          $setSta = '<span style="margin-left:10px;display:in-line;"><select style="float:none; min-width:100px;" class="sta" name="sta" id="'.$page->PageId.'"><option value="1"'.$enable.'>Enable</option><option value="0"'.$disable.'>Disable</option></select>';

                      								?>
                                        <tr class="gradeA">
                                            <td><div class="image-container">
                                                    <div class="img-preview"><form name="imgform" class="imgform"><img src="<?php echo site_url().'featureImg/thumb/'.$page->FeatureImage;?>"/></form></div>
                                                    <input type="button" name="add" class="add" value="Add"  />
                                                    <input type="button" id="remove" rid="<?php echo $page->PageId;?>" value="Remove"/>
                                                    <input type="file" pid="<?php echo $page->PageId;?>" name="upload_image" class="upload_image" accept="image/jpeg" style="visibility:hidden;" />
                                                </div>
                                            </td>
                                            <td><?php echo $page->PageTitle ; ?></td>
                                            <td><?php echo '<span class="dataSta">'.$sta.'</span>'.$setSta; ?></td>
                                            <td class="actiontd">
                                               <?php echo $page->HasSubPage==1?'<a title="View Subpage" href='.base_url().'admin/cms/subPages/'.$page->PageId.'><img src='.base_url().'images/admin/view.png></a>':'';?>
                                               <a title="Add Subpage" href="<?php echo base_url(); ?>admin/cms/addSubPages/<?php echo $page->PageId ?>"><img src="<?php echo base_url(); ?>images/admin/add.png"></a>
                                                <a title="Edit" href="<?php echo base_url(); ?>admin/cms/aeddPages/<?php echo $page->PageId ?>"><img src="<?php echo base_url(); ?>images/admin/edit.png"></a>
                                                <a title="Delete" id="delpage" onclick="return confirm('Are You Sure To Delete This Page?');" href="<?php echo base_url(); ?>cms/delete/<?php echo $page->PageId ?>"><img src="<?php echo base_url(); ?>images/admin/close.png"></a>
                                            </td>
                                        </tr>
                                <?php endforeach;  endif;?>
                                    
                                </tbody>
                            </table>
                        </div>
                 	</div>   
                </div><!-- .widget-content -->
            </div><!-- .widget --> 
       </div>     <!-- .grid --> 
</div>        <!-- .container --> 

<script type="text/javascript">
$('document').ready(function(){
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
            url:'<?php echo site_url("cms/changeStatus");?>',
            data:{id:$id,status:$status,tbl:'tblpages',tid:'PageId'},
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
                    url:'<?php echo site_url("cms/upload");?>'+'/'+id,
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
                url:'<?php echo site_url("cms/RemoveFeatureImage");?>'+'/'+id,
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