<!-- #contentHeader -->
<div id="content">
    <div id="contentHeader">
        <h1>List All Orientation</h1>
    </div>
    <!-- #contentHeader -->    

     <div class="container">
        <div class="grid-18">
            <?php if($this->session->flashdata('orientation_msg')): ?>
                     <div class="notify notify-success">                        
                        <a class="close" href="javascript:;">×</a>                        
                        <h3><?php echo $this->session->flashdata('orientation_msg');?></h3>                        
                    </div>
            <?php endif; ?>

            <div class="widget widget-plain">
        		<table class="table table-bordered table-striped data-table">
                    <thead>
                        <tr>
                            <th>Orientation Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                           if(is_array($orientations)>0):
                            foreach($orientations as $orientation): 
								$enable ='';$disable='';
								$sta = $orientation->Status==1?'Enable':'Disable';
								if ($orientation->Status==1){
									$enable=" selected=selected";
								}else{
									$disable=" selected=selected";
								}
								$setSta = '<span style="margin-left:10px;display:in-line;"><select style="float:none; min-width:100px;" class="sta" name="sta" id="'.$orientation->OrId.'"><option value="1"'.$enable.'>Enable</option><option value="0"'.$disable.'>Disable</option></select>';
						?>
                            <tr class="gradeA">
                                <td><?php echo $orientation->OrName; ?></td>
                                <td><?php echo '<span class="dataSta">'.$sta.'</span>'.$setSta; ?></td>
                                <td class="actiontd">
                                   
                                    <a href="<?php echo base_url(); ?>orientation/aeddOrientation/<?php echo $orientation->OrId ?>"><img src="<?php echo base_url(); ?>images/admin/edit.png"></a>
                                    <a id="delpage" onclick="return confirm(\'Are You Sure To Delete This Orientation?\');" href="<?php echo base_url(); ?>orientation/delete/<?php echo $orientation->OrId ?>"><img src="<?php echo base_url(); ?>images/admin/close.png"></a>
                                </td>
                            </tr>
                    <?php endforeach; endif;?>
                        
                    </tbody>
                </table>
            </div>  <!-- .widget -->  
        </div><!-- .grid --> 
    </div>
</div>     

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
			url:'<?php echo site_url("orientation/changeStatus");?>',
			data:{id:$id,status:$status},
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