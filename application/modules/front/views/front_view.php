<?php if(is_array($slides)>0): ?>
    <div class="src-img">
      <h2><?php echo $search_for_images;?></h2>
      <div class="navbar-inner home-search">
        <form class="form-inline navbar-search" method="post" action="products.html" >
            <label>
              <input id="srchFld" class="srchTxt" type="text" placeholder="Enter Keyword(s)" style="border:none; background-color:#f1f1f1" />
              <button type="submit" id="submitButton" class="btn btn-primary"><?php echo $search_btn; ?></button>
            </label>
            <br>
            <ul id="search-box">
              <li><a><?php echo $category_search;?><i class="icon-caret-down"></i></a>
                  <ul class="search-down">
                   <?php 
                    foreach($categories as $category){
                      echo "<li><label><input type='checkbox' id=".intval($category->CatId)."><span>".$this->front_model->format_data($category->CategoryName)."</span></label>";        
                    } ?>
                  </ul>
              </li>
          </ul>
        </form>
      </div>
    </div>
    <div class='banner'>
      <div  class='homepage-slider' id='home-slider'>
        <div class='flexslider'>
          <ul class='slides'>
          <?php foreach($slides as $slide) { ?>
            <li><img src="<?php echo site_url().'sliderImg/'.$slide->ImageName;?>" alt='' /> </li>
          <?php } ?>
          </ul>
        </div>
      </div>
    </div>
<?php endif;?>

<div id="wrapper" class="container">
  <section class="header_text"> 
  	<div class="row">
       <div class="span4 pull-left home-cat">
            <h2><?php echo $browse_by_category;?></h2>
            <ul>
              <?php 
                foreach($scategories as $scategory){
                  echo "<li><a href=imageslist/subcategory/".strtolower($this->front_model->format_data($scategory->SCategoryName))." title=".$this->front_model->format_data($scategory->SCategoryName).">".$this->front_model->format_data($scategory->SCategoryName)."</a></li>";
               } ?>
                
            </ul>
        </div>
       <div class="span6 pull-right offer-home">
          <?php echo $make_money;?>
              <a class="btn btn-primary" href="register.php">Join Now</a>
        </div>
  	</div> 
  </section>
  <section class="main-content">
    <div class="row">
      <div class="span10">
        <div  class="recent-posts blocky">
         <h4 class="title"><span class="pull-center"><span class="text"><span class="line"><?php echo $most_popular_pictures;?></span></span></span> <span class="pull-right"></span></h4>
         <div class="my_carousel">
               <div class="carousel_nav pull-right">
                   <!-- Carousel navigation -->
                   <a class="prev" id="car_prev" href="#"><i class="icon-chevron-left"></i></a>
                   <a class="next" id="car_next" href="#"><i class="icon-chevron-right"></i></a>
               </div>
               <ul id="carousel_container">
                     <!-- Carousel item -->
                    <li>
                      <div class="product-box"> 
                        <p><a href="product_detail.php"><img src="themes/images/thumb/1.jpg" alt="" /></a></p>
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
                        <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a> 
                        
                        </h4>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="product-box"> 
                        <p><a href="product_detail.php"><img src="themes/images/thumb/2.jpg" alt="" /></a></p>
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
                        <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a> 
                        
                        </h4>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="product-box">
                        <p><a href="product_detail.php"><img src="themes/images/thumb/3.jpg" alt="" /></a></p>
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
                        <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a> 
                        
                        </h4>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="product-box">
                        <p><a href="product_detail.php"><img src="themes/images/thumb/4.jpg" alt="" /></a></p>
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
                        <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a> 
                        
                        </h4>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="product-box">
                        <p><a href="product_detail.php"><img src="themes/images/thumb/5.jpg" alt="" /></a></p>
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
                        <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a> 
                        
                        </h4>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="product-box">
                        <p><a href="product_detail.php"><img src="themes/images/thumb/4.jpg" alt="" /></a></p>
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
                        <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a> 
                        
                        </h4>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="product-box"> 
                        <p><a href="product_detail.php"><img src="themes/images/thumb/2.jpg" alt="" /></a></p>
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
                        <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a> 
                        
                        </h4>
                        </div>
                      </div>
                    </li>
               </ul>
               <div class="clearfix"></div>
         </div>
        </div>
        
        <div class="row">
			<div class="span10">
				<div id="myCarousel-2" class="myCarousel carousel slide">
					<div class="carousel-inner" style="border-bottom:none">
                        <div class="active item">
                            <ul class="thumbnails">	
							  <?php foreach($randoms as $random): ?>
                                  <li class="span3">
                                    <div class="product-box">
                                      <span class="sale_tag"></span>
                                      <p><a href="#"><img src="<?php echo site_url().'featureSubCat/'.$random->FeatureImage;?>" alt="" /></a></p>
                                      <a href="imageslist/subcategory/<?php echo $random->SCategoryName;?>" class="title a-position"><?php echo $random->SCategoryName;?></a>
                                    </div>
                                  </li>
                              <?php endforeach; ?>											
                            </ul>
                        </div>
                        <div class="item">
                            <ul class="thumbnails">
                                
                                <li class="span3">
                                    <div class="product-box">
                                        <p><a href="products.php"><img src="themes/images/home-cat/cat3.jpg" alt="" /></a></p>
                                        <a href="products.php" class="title a-position">City</a>
                                    
                                    </div>
                                </li>
                                <li class="span3">
                                    <div class="product-box">
                                        <p><a href="products.php"><img src="themes/images/home-cat/cat2.jpg" alt="" /></a></p>
                                        <a href="products.php" class="title a-postion">Cars</a>
                                    
                                    </div>
                                </li>
                                                                                                                                                                    
                            </ul>
                        </div>
					</div>							
				</div>
			</div>						
		</div>
        
        <div class="row feature_box">
          <div class="span3">
            <div class="service">
              <div class="responsive"> <img src="themes/images/subscription-icon.jpg" alt="" />
                <?php echo $subscription_options;?>
                <a href="#"><?php echo $subscription_options_gstarted;?></a>
				      </div>
            </div>
          </div>
          <div class="span3">
            <div class="service">
              <div class="customize"> <img src="themes/images/signin.jpg" alt="" />
                <?php echo $sign_up_for_free;?>
                <a href="#"><?php echo $sign_up_for_free_dregister;?></a>
              </div>
            </div>
          </div>
          <div class="span3">
            <div class="service">
              <div class="support"> <img src="themes/images/search.jpg" alt="" />
                <?php echo $search_tips;?>
                <br>
                <a href="#"><?php echo $search_tips_dguide;?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>   
</div><!---/main container--->

<script src="themes/js/common.js"></script> 
<script src="themes/js/jquery.flexslider-min.js"></script> 
<script src="themes/js/jquery.carouFredSel-6.2.1-packed.js"></script> 
<script src="themes/js/custom.js"></script>
<script type="text/javascript">
$(function() {
	$('.flexslider').flexslider({
          animation: "fade",
          slideshowSpeed: 4000,
          animationSpeed: 600,
          controlNav: false,
          directionNav: true,
          controlsContainer: ".flex-container" // the container that holds the flexslider
    });
});
</script>