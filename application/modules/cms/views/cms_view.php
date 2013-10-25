
<!-- #contentHeader -->
<div id="content">
        <div id="contentHeader">
            <h1>List All Pages</h1>
        </div>
        <!-- #contentHeader -->    

        <div class="container">
            <div class="grid-18">
            		<?php if($this->session->flashdata('cms_msg')): ?>
                         <div class="notify notify-success">                        
                            <a class="close" href="javascript:;">×</a>                        
                            <h3><?php echo $this->session->flashdata('cms_msg');?></h3>                        
                        </div>
                    <?php endif; ?>
                   <div class="widget widget-plain">
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
                                        <td><img src="<?php echo site_url().'featureImg/thumb/'.$page->FeatureImage; ?>"></td>
                                        <td><?php echo $page->PageTitle ; ?></td>
                                        <td><?php echo '<span class="dataSta">'.$sta.'</span>'.$setSta; ?></td>
                                        <td class="actiontd">
                                           
                                            <a href="<?php echo base_url(); ?>cms/aeddPages/<?php echo $page->PageId ?>"><img src="<?php echo base_url(); ?>images/admin/edit.png"></a>
                                            <a id="delpage" onclick="return confirm(\'Are You Sure To Delete This Page?\');" href="<?php echo base_url(); ?>cms/delete/<?php echo $page->PageId ?>"><img src="<?php echo base_url(); ?>images/admin/close.png"></a>
                                        </td>
                                    </tr>
                            <?php endforeach; endif;?>
                                
                            </tbody>
                        </table><!-- .table close -->
                 	</div><!-- .widget -->    
            </div> <!-- .grid --> 
        </div> <!-- .container --> 
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
            url:'<?php echo site_url("cms/changeStatus");?>',
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