<div id="search">
  <div  id="wrapper" class="containers">
    <div class="navbar-inner">
      <form class="form-inline navbar-search" method="post" action="products.html" >
        <label>
          <input id="srchFld" class="srchTxt" type="text" placeholder="Enter Keyword(s)" style="border:none; background-color:#f1f1f1" />
          <button type="submit" id="submitButton" class="btn btn-primary"><?php echo $search_btn;?></button>
        </label>
		<ul id="search-box">
          <li><a class="t-grey"><?php echo $category_search;?><i class="icon-caret-down"></i></a>
              <ul class="search-down">
               <?php 
					foreach($categories as $category){
					  echo "<li><label><input type='checkbox' value=".intval($category->CatId)."><span>".$this->front_model->format_data($category->CategoryName)."</span></label>";         
					} ?>
                     
              </ul>
          </li>
         </ul>
      </form>
    </div>
  </div>
</div>



<div id="wrapper" class="containers">
  <div class="row"> 
    <!-- Sidebar ================================================== -->
    <div id="sidebar" class="span3 side-span">
      <div class="well well-small">
        <p><?php echo $sidebar_search_fliter_title;?></p>
      </div>
      <form method="#" action="#" class="side-search">
        <div class="side-block">
            <h2><?php echo $sidebar_search_fliter_image_type;?></h2>
            <?php 
              foreach($categories as $category){
                echo "<div><input type='checkbox' class='cateory' value='".intval($category->CatId)."' name='category'><label>".$this->front_model->format_data($category->CategoryName)."</label></div>";
              } ?>
        </div>
        <!--/ side block image type-->
        <div class="side-block">
          <h2><?php echo $sidebar_search_fliter_category;?></h2>
            <div>
                <select name="scategory">
                 <?php 
          				foreach($scategories as $scategory){
          				  echo "<option value='".intval($scategory->SCatId)."'>".$this->front_model->format_data($scategory->SCategoryName)."</option>";
          				} ?>
               </select> 
            </div>  
            <!--/end of div-->
        </div>
        <!--/ side block category type-->
        <div class="side-block" style="border-bottom:none">
          <h2><?php echo $sidebar_search_fliter_orientation;?></h2>
            <div>

            	 <?php 
        				foreach($orientations as $orientation){
        				  echo "<div><input type='checkbox' class='orientation' value='".intval($orientation->OrId)."' name='orientation'><label>".$this->front_model->format_data($orientation->OrName)."</label></div>";
        				} ?>
            </div>  
            <!--/end of div-->
        </div>          
        <!--/ side block oreinetation type-->
        <div class="side-block">
           <input class="btn btn-primary" id="submitButton" type="submit" value="<?php echo $search_btn;?>"></input>
        </div> 
      </form>
    </div>
    <!-- Sidebar end=============================================== -->


    <div class="span9 product-span">
      <h3 class="result"> 12,345 Results </h3>
      <ul class="breadcrumb">
        <li class="active"><a href="index.html">Relevant </a> <span class="divider">|</span></li>
        <li><a href="#">Popular</a><span class="divider">|</span></li>
        <li><a href="#">New</a></li>
        <div class="pagination-block">
          <div  class="pnation"><a href="#" class="pnation-prev">Prev</a></div>
          <div class="pnation">
            <p>1 0f 100</p>
          </div>
          <div class="pnation"><a href="#" class="pnation-next">Next</a></div>
        </div>
      </ul>


      <ul class="thumbnails listing-products">
       <?php 
           if(is_array($kwaai_images)>0):
            foreach($kwaai_images as $kwaai_image):?>
              <li>
                <?php echo form_open('cart/add'); 
                      $pcode = strtolower($kwaai_image->ProductCode);
                ?>
                <div class="product-box"> 
                  <p><a href="<?php echo site_url()."category/product/$pcode" ?>" class="screenshot" rel="<?php echo site_url().'uploads/'.$kwaai_image->ProfileId.'/'.$pcode.'/thumb/detail/'.$kwaai_image->ImageName;?>" title="<?php echo $kwaai_image->ProductName;?>">
                    <img src="<?php echo site_url().'uploads/'.$kwaai_image->ProfileId.'/'.$pcode.'/thumb/listing/'.$kwaai_image->ImageName;?>"> </a></p>
                  <div class="caption">
                    <h4 ><a class="like pull-left " href="javascript:void(0)"> <i class="icon-thumbs-up"></i><span class="like-txt">(10)</span></a>
                      <ul class='star-rating'>
                        <li><a href='#' title='Rate this 1 smile out of 5' class='one-star'>1</a></li>
                        <li><a href='#' title='Rate this 2 smile out of 5' class='two-stars'>2</a></li>
                        <li><a href='#' title='Rate this 3 smile out of 5' class='three-stars'>3</a></li>
                        <li><a href='#' title='Rate this 4 smile out of 5' class='four-stars'>4</a></li>
                        <li><a href='#' title='Rate this 5 smile out of 5' class='five-stars'>5</a></li>
                      </ul>
                      <!-- <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a> -->
                      <?php echo form_hidden('id', $kwaai_image->ProductId); ?>
                      <?php
                         $attributes = 'class = "icon-shopping-cart"';
                         echo form_submit('action', '', $attributes); ?> 
                    </h4>
                    <hr>
                    <span id="i-code"><?php echo $kwaai_image->ProductCode; ?></span>
                    <span id="i-name"><?php echo $kwaai_image->ProductName; ?></span>
                  </div>
                </div>
                <?php echo form_close(); ?>
              </li>
              
        <?php endforeach; endif;?>
       
      </ul>


      <div class="pagination pagination-small pagination-centered">
        <div class="pagination-block">
          <div  class="pnation"><a href="#" class="pnation-prev">Prev</a></div>
          <div class="pnation">
            <p>1 0f 100</p>
          </div>
          <div class="pnation"><a href="#" class="pnation-next">Next</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo site_url();?>themes/js/js/main.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){
  $('input[name="category"]:first').attr("checked",true);
  $('input[name="orientation"]:first').attr("checked",true);
  $('input[name="orientation"]').click(function(){
    $("input[name=orientation]:checkbox").attr("checked", false);
    $(this).attr("checked", true);
  });
  $('input[name="category"]').click(function(){
    $("input[name=category]:checkbox").attr("checked", false);
    $(this).attr("checked", true);
  });

  $('form.side-search').submit(function(e){
    e.preventDefault();
    $('<img>',{
        src : './images/wait.gif',
        class : 'search_loading',
      }).insertAfter($('#sidebar')).wrap('<div class="searching"></div>');
    
    var dataString = $(this).serializeArray();
    $.ajax({
        type: "post",
        url : "<?php echo site_url('category/search');?>",
        data: dataString,
        dataType : 'html',
        success: function(data){
         $('img.search_loading').remove();   
         $('div.searching').remove();
         if(data !=' '){
            $('ul.listing-products li').remove();
            $('ul.listing-products').html(data);
         }
        }
      });

  })
})
</script>