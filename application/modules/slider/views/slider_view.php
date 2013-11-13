<!-- #contentHeader -->
<div id="content">
  <div id="contentHeader">
      <h1>List All Slides</h1>
  </div>
  <!-- #contentHeader -->    

  <div class="container">
    <div class="grid-24">
      <div class="widget widget-table">
        <div class="widget-header">
            <span class="icon-list"></span>
            <h3 class="icon chart">Slider Table</h3>        
        </div>
        <div class="widget-content">
          <table class="table table-bordered table-striped data-table">
             <thead>
                <tr>
                    <th>Preview Image</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                   if(is_array($slides)>0):
                    foreach($slides as $slide): 
                        $enable ='';$disable='';
                        $sta = $slide->Status==1?'Enable':'Disable';
                        if ($slide->Status==1){
                          $enable=" selected=selected";
                        }else{
                          $disable=" selected=selected";
                        }
                        $setSta = '<span style="margin-left:10px;display:in-line;"><select style="float:none; min-width:100px;" class="sta" name="sta" id="'.$slide->SliderId.'"><option value="1"'.$enable.'>Enable</option><option value="0"'.$disable.'>Disable</option></select>';
                    ?>
                        <tr class="gradeA">
                            <td><img src="<?php echo base_url().'sliderImg/thumb/'.$slide->ImageName; ?>" ></td>
                            <td><?php echo $slide->Title; ?></td>
                            <td><?php echo '<span class="dataSta">'.$sta.'</span>'.$setSta; ?></td>
                            <td class="actiontd">
                               
                                <a title="Edit" href="<?php echo base_url(); ?>admin/slider/editSlides/<?php echo $slide->SliderId ?>"><img src="<?php echo base_url(); ?>images/admin/edit.png"></a>
                                <a id="delpage" onclick="return confirm('Are You Sure To Delete This Slide?');"  title="Delete" href="<?php echo base_url(); ?>slider/delete/<?php echo $slide->SliderId ?>"><img src="<?php echo base_url(); ?>images/admin/close.png"></a>
                            </td>
                        </tr>
                <?php endforeach; endif;?>
              </tbody>
          </table>
      </div>
      </div><!-- .widget-content -->
    </div><!-- .grid --> 
  </div><!-- .container --> 
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
      url:'<?php echo site_url("slider/changeStatus");?>',
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