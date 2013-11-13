
    <!-- #contentHeader -->
<div id="content">
        <div id="contentHeader">
            <h1>List All Category</h1>
        </div>
        <!-- #contentHeader -->    

        <div class="container">
            <div class="grid-24">
            	   <?php if($this->session->flashdata('category_msg')): ?>
                         <div class="notify notify-success">                        
                            <a class="close" href="javascript:;">×</a>                        
                            <h3><?php echo $this->session->flashdata('category_msg');?></h3>                        
                        </div>
                    <?php endif; ?>
                   <a class="btn btn-small" href="<?php echo base_url(); ?>admin/categories/aeddCategories">Add Category</a>
                   <div class="widget widget-table">
                        <div class="widget-header">
                            <span class="icon-list"></span>
                            <h3 class="icon chart">Category Table</h3>        
                        </div>
                        <div class="widget-content">
                    		<table class="table table-bordered table-striped data-table">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                       if(is_array($categories)>0):
                                        foreach($categories as $category): 
    										$enable ='';$disable='';
    										$sta = $category->Status==1?'Enable':'Disable';
    										if ($category->Status==1){
    											$enable=" selected=selected";
    										}else{
    											$disable=" selected=selected";
    										}
    										$setSta = '<span style="margin-left:10px;display:in-line;"><select style="float:none; min-width:100px;" class="sta" name="sta" id="'.$category->CatId.'"><option value="1"'.$enable.'>Enable</option><option value="0"'.$disable.'>Disable</option></select>';
    								?>
                                        <tr class="gradeA">
                                            <td><?php echo $category->CategoryName; ?></td>
                                            <td><?php echo '<span class="dataSta">'.$sta.'</span>'.$setSta; ?></td>
                                            <td class="actiontd">
                                               
                                                <a title="Edit" href="<?php echo base_url(); ?>admin/categories/aeddCategories/<?php echo $category->CatId ?>"><img src="<?php echo base_url(); ?>images/admin/edit.png"></a>
                                                <a id="delpage" title="Delete" onclick="return confirm('Are You Sure To Delete This Category?');" href="<?php echo base_url(); ?>categories/delete/<?php echo $category->CatId ?>"><img src="<?php echo base_url(); ?>images/admin/close.png"></a>
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
			data:{id:$id,status:$status,tbl:'tblcategory',tid:'CatId'},
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
});
</script>