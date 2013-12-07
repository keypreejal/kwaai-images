<div id="search">
  <div  id="wrapper" class="container">
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

<div id="wrapper" class="container">
  <section class="main-content">
    <div class="row">
      <div class="span5 detail-img">
        <h2><?php echo $product->ProductName;?></h2>
        <p>ID:<?php echo $product->ProductCode;?></p>
        <p>© <a href=""><?php echo $contributor_name;?></a></p>
        <div class="thumbnail" title="<?php echo $product->ProductName?>"><img alt="" src="<?php echo site_url().'uploads/'.$product->ProfileId.'/'.$product->ProductCode.'/thumb/detail/'.$product_name?>"></div>
        <h4 class="pull-left" > <a class="eye pull-left " href="product_details.html"> <i class="icon-eye-open"></i><span class="eye-txt">(10)</span></a>  </h4>
        <h4 class="pull-right"> <a class="likes pull-left " href="product_details.html"> <i class="icon-thumbs-up"></i><span class="likes-txt">(10)</span></a>
        </h4>
      </div>
      <!--/detail image-->
      <div class="span5 d-tab">
       <img class="easy-steps" src="<?php echo site_url() ?>themes/images/easy-way.jpg" width="460" height="60" alt="easy steps">
        <div class="detail-info">
        <div class="d-block">
			<h3 class="ttl-d">Image Size</h3>        
            <hr />
            <p>Small, Big</p>
            </div><!--block-->
            <div class="d-block des-block">
			<h3 class="ttl-d">Description</h3>        
            <hr />
            <p><?php echo $product->ProductDescription;?></p>
            </div><!--block-->
             <hr />
            <div class="d-block b-price">
			<h3 class="ttl-d"><?php echo $product->ProductPrice !=''?'$'.$product->ProductPrice:'Free';?></span></h3> 
       <?php echo form_open('cart/add'); ?>
       <?php echo form_hidden('id', $product->ProductId); ?>
        <!-- <a href="#">Add to cart</a> -->
        <?php echo form_submit('action', 'Add to cart'); ?> 
        <?php echo form_close(); ?>
            </div><!--block-->
        </div><!---end of img information--->
        
      </div>
      <!--/tab ending-->
      <div class="span10">
        <div  class="recent-posts blocky">
          <h4 class="title"> <span class="pull-center"><span class="text"><span class="line">Similar Pictures</span></span></span> <span class="pull-right"> </span> </h4>
          <div class="my_carousel">
            <div class="carousel_nav pull-right"> 
              <!-- Carousel navigation --> 
              <a class="prev" id="car_prev" href="#"><i class="icon-chevron-left"></i></a> <a class="next" id="car_next" href="#"><i class="icon-chevron-right"></i></a> </div>
            <ul id="carousel_container">
              <!-- Carousel item -->
              <?php if(is_array($similar_product)>0):
                foreach($similar_product as $similar):
                   $pcode = strtolower($similar->ProductCode);
                  ?>
                  <li>
                    <?php echo form_open('cart/add'); ?>
                      <div class="product-box"> 
                        <p><a href="<?php echo site_url()."category/product/$pcode"?>"><img src="<?php echo site_url().'uploads/'.$similar->ProfileId.'/'.$similar->ProductCode.'/thumb/listing/'.$similar->ImageName;?>" alt="" /></a></p>
                        <div class="caption">
                        <h4 >
                             <a class="like pull-left " href="product_details.html"> <i class="icon-thumbs-up"></i><span class="like-txt">(10)</span></a> 
                             <ul class='star-rating'>
                                <li><a href='#' title='Rate this 1 smile out of 5' class='one-star'>1</a></li>
                                <li><a href='#' title='Rate this 2 smile out of 5' class='two-stars'>2</a></li>
                                <li><a href='#' title='Rate this 3 smile out of 5' class='three-stars'>3</a></li>
                                <li><a href='#' title='Rate this 4 smile out of 5' class='four-stars'>4</a></li>
                                <li><a href='#' title='Rate this 5 smile out of 5' class='five-stars'>5</a></li>
                              </ul>
                        <!-- <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a>  -->
                        <?php echo form_hidden('id', $similar->ProductId); ?>
                        <?php
                           $attributes = 'class = "icon-shopping-cart"';
                           echo form_submit('action', '', $attributes); ?> 
                        </h4>
                        </div>
                      </div>
                    <?php echo form_close(); ?>
                  </li>
              <?php endforeach; endif;?>
              
            </ul>
            <div class="clearfix"></div>
          </div>
        </div>
        <!--/carousel--> 
      </div>
    </div>
  </section>
</div>
<script src="<?php echo site_url();?>themes/js/jquery.carouFredSel-6.2.1-packed.js"></script> 
<script src="<?php echo site_url();?>themes/js/custom.js"></script>
