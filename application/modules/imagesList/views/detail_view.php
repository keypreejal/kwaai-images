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
        <h2><a href="#">Strawberry and chocolate, Food stock photography</a></h2>
        <p>ID: 0001</p>
        <p>© Kwaai Images</p>
        <a href="themes/images/detail/detail1.jpg" class="thumbnail" data-fancybox-group="group1" title="Food"><img alt="" src="<?php echo site_url(); ?>themes/images/detail/detail1.jpg"></a>
        <h4 class="pull-left" > <a class="eye pull-left " href="product_details.html"> <i class="icon-eye-open"></i><span class="eye-txt">(10)</span></a> <a class="down pull-left " href="product_details.html"> <i class="icon-download-alt"></i><span class="down-txt">(10)</span></a> </h4>
        <h4 class="pull-right"> <a class="likes pull-left " href="product_details.html"> <i class="icon-thumbs-up"></i><span class="likes-txt">(10)</span></a>
          <ul class='star-rating'>
            <li><a href='#' title='Rate this 1 smile out of 5' class='one-star'>1</a></li>
            <li><a href='#' title='Rate this 2 smile out of 5' class='two-stars'>2</a></li>
            <li><a href='#' title='Rate this 3 smile out of 5' class='three-stars'>3</a></li>
            <li><a href='#' title='Rate this 4 smile out of 5' class='four-stars'>4</a></li>
            <li><a href='#' title='Rate this 5 smile out of 5' class='five-stars'>5</a></li>
          </ul>
          <!---/smile rating-->
        </h4>
      </div>
      <!--/detail image-->
      <div class="span5 d-tab"> <img class="easy-steps" src="<?php echo site_url() ?>themes/images/easy-way.jpg" width="460" height="60" alt="easy steps">
        <ul class="nav nav-tabs" id="myTab">
          <li class="active"><a href="#home">Price</a></li>
          <li class=""><a href="#information">Information</a></li>
          <li class=""><a href="#description">Description</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="home">
            <table class="table table-striped shop_attributes tab-table">
              <tbody>
                <tr class="table-head">
                  <th>Size</th>
                  <th>Pixel / Inches</th>
                  <th>Price</th>
                  <th style="text-align:right">Download</th>
                </tr>
                <tr class="">
                  <td>Standard XS </td>
                  <td>423 x 283 (0.1 MP)</td>
                  <td>&pound; 1.0</td>
                  <td style="text-align:right"><a href="#">Add to cart</a></td>
                </tr>
                <tr class="">
                  <td>Standard S </td>
                  <td>847 x 567 (0.5 MP)</td>
                  <td>&pound; 1.0</td>
                  <td style="text-align:right"><a href="#">Add to cart</a></td>
                </tr>
                <tr class="">
                  <td>Standard M </td>
                  <td>1685 x 1128 (1.9 MP)</td>
                  <td>&pound; 1.0</td>
                  <td style="text-align:right"><a href="#">Add to cart</a></td>
                </tr>
                <tr class="">
                  <td>Standard L </td>
                  <td>2351 x 1574 (3.7 MP)</td>
                  <td>&pound; 1.0</td>
                  <td style="text-align:right"><a href="#">Add to cart</a></td>
                </tr>
                <tr class="">
                  <td>Standard XL </td>
                  <td>3872 x 2592 (10.0 MP)</td>
                  <td>&pound; 1.0</td>
                  <td style="text-align:right"><a href="#">Add to cart</a></td>
                </tr>
              </tbody>
            </table>
            <div class="subsribe-box">
              <p class="pull-left">Discover our monthly plans and <br>
                download images</p>
              <a class="pull-right" href="#">Subscribe</a> </div>
          </div>
          <div class="tab-pane" id="information"> Kwaai-Images is an Amsterdam based Microstock photography company (Low priced and inclusive stock photography) for images, sketches and paintings. This platform is build for professionals and amateurs, to upload, sale and resale pictures and sketches. </div>
          <div class="tab-pane" id="description">
            <p> Kwaai-Images is an Amsterdam based Microstock photography company (Low priced and inclusive stock photography) for images, sketches and paintings. This platform is build for professionals and amateurs, to upload, sale and resale pictures and sketches.</p>
            <p> Kwaai-Images is an Amsterdam based Microstock photography company (Low priced and inclusive stock photography) for images, sketches and paintings. This platform is build for professionals and amateurs, to upload, sale and resale pictures and sketches.</p>
          </div>
        </div>
      </div>
      <!--/tab ending-->
      <div class="row">
      <div class="span10">
        <div  class="recent-posts blocky">
          <h4 class="title"> <span class="pull-center"><span class="text"><span class="line">Similar Pictures</span></span></span> <span class="pull-right"> </span> </h4>
          <div class="my_carousel">
            <div class="carousel_nav pull-right"> 
              <!-- Carousel navigation --> 
              <a class="prev" id="car_prev" href="#"><i class="icon-chevron-left"></i></a> <a class="next" id="car_next" href="#"><i class="icon-chevron-right"></i></a> </div>
            <ul id="carousel_container">
              <!-- Carousel item -->
              <li>
                <div class="product-box">
                  <p><a href="product_detail.php"><img src="<?php echo site_url();?>themes/images/thumb/1.jpg" alt="" /></a></p>
                  <div class="caption">
                    <h4 > <a class="like pull-left " href="product_details.html"> <i class="icon-thumbs-up"></i><span class="like-txt">(10)</span></a>
                      <ul class='star-rating'>
                        <li><a href='#' title='Rate this 1 smile out of 5' class='one-star'>1</a></li>
                        <li><a href='#' title='Rate this 2 smile out of 5' class='two-stars'>2</a></li>
                        <li><a href='#' title='Rate this 3 smile out of 5' class='three-stars'>3</a></li>
                        <li><a href='#' title='Rate this 4 smile out of 5' class='four-stars'>4</a></li>
                        <li><a href='#' title='Rate this 5 smile out of 5' class='five-stars'>5</a></li>
                      </ul>
                      <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a> </h4>
                  </div>
                </div>
              </li>
              <li>
                <div class="product-box">
                  <p><a href="product_detail.php"><img src="<?php echo site_url();?>themes/images/thumb/2.jpg" alt="" /></a></p>
                  <div class="caption">
                    <h4 > <a class="like pull-left " href="product_details.html"> <i class="icon-thumbs-up"></i><span class="like-txt">(10)</span></a>
                      <ul class='star-rating'>
                        <li><a href='#' title='Rate this 1 smile out of 5' class='one-star'>1</a></li>
                        <li><a href='#' title='Rate this 2 smile out of 5' class='two-stars'>2</a></li>
                        <li><a href='#' title='Rate this 3 smile out of 5' class='three-stars'>3</a></li>
                        <li><a href='#' title='Rate this 4 smile out of 5' class='four-stars'>4</a></li>
                        <li><a href='#' title='Rate this 5 smile out of 5' class='five-stars'>5</a></li>
                      </ul>
                      <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a> </h4>
                  </div>
                </div>
              </li>
              <li>
                <div class="product-box">
                  <p><a href="product_detail.php"><img src="<?php echo site_url();?>themes/images/thumb/3.jpg" alt="" /></a></p>
                  <div class="caption">
                    <h4 > <a class="like pull-left " href="product_details.html"> <i class="icon-thumbs-up"></i><span class="like-txt">(10)</span></a>
                      <ul class='star-rating'>
                        <li><a href='#' title='Rate this 1 smile out of 5' class='one-star'>1</a></li>
                        <li><a href='#' title='Rate this 2 smile out of 5' class='two-stars'>2</a></li>
                        <li><a href='#' title='Rate this 3 smile out of 5' class='three-stars'>3</a></li>
                        <li><a href='#' title='Rate this 4 smile out of 5' class='four-stars'>4</a></li>
                        <li><a href='#' title='Rate this 5 smile out of 5' class='five-stars'>5</a></li>
                      </ul>
                      <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a> </h4>
                  </div>
                </div>
              </li>
              <li>
                <div class="product-box">
                  <p><a href="product_detail.php"><img src="<?php echo site_url();?>themes/images/thumb/4.jpg" alt="" /></a></p>
                  <div class="caption">
                    <h4 > <a class="like pull-left " href="product_details.html"> <i class="icon-thumbs-up"></i><span class="like-txt">(10)</span></a>
                      <ul class='star-rating'>
                        <li><a href='#' title='Rate this 1 smile out of 5' class='one-star'>1</a></li>
                        <li><a href='#' title='Rate this 2 smile out of 5' class='two-stars'>2</a></li>
                        <li><a href='#' title='Rate this 3 smile out of 5' class='three-stars'>3</a></li>
                        <li><a href='#' title='Rate this 4 smile out of 5' class='four-stars'>4</a></li>
                        <li><a href='#' title='Rate this 5 smile out of 5' class='five-stars'>5</a></li>
                      </ul>
                      <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a> </h4>
                  </div>
                </div>
              </li>
              <li>
                <div class="product-box">
                  <p><a href="product_detail.php"><img src="<?php echo site_url();?>themes/images/thumb/5.jpg" alt="" /></a></p>
                  <div class="caption">
                    <h4 > <a class="like pull-left " href="product_details.html"> <i class="icon-thumbs-up"></i><span class="like-txt">(10)</span></a>
                      <ul class='star-rating'>
                        <li><a href='#' title='Rate this 1 smile out of 5' class='one-star'>1</a></li>
                        <li><a href='#' title='Rate this 2 smile out of 5' class='two-stars'>2</a></li>
                        <li><a href='#' title='Rate this 3 smile out of 5' class='three-stars'>3</a></li>
                        <li><a href='#' title='Rate this 4 smile out of 5' class='four-stars'>4</a></li>
                        <li><a href='#' title='Rate this 5 smile out of 5' class='five-stars'>5</a></li>
                      </ul>
                      <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a> </h4>
                  </div>
                </div>
              </li>
              <li>
                <div class="product-box">
                  <p><a href="product_detail.php"><img src="<?php echo site_url();?>themes/images/thumb/4.jpg" alt="" /></a></p>
                  <div class="caption">
                    <h4 > <a class="like pull-left " href="<?php echo site_url();?>product_details.html"> <i class="icon-thumbs-up"></i><span class="like-txt">(10)</span></a>
                      <ul class='star-rating'>
                        <li><a href='#' title='Rate this 1 smile out of 5' class='one-star'>1</a></li>
                        <li><a href='#' title='Rate this 2 smile out of 5' class='two-stars'>2</a></li>
                        <li><a href='#' title='Rate this 3 smile out of 5' class='three-stars'>3</a></li>
                        <li><a href='#' title='Rate this 4 smile out of 5' class='four-stars'>4</a></li>
                        <li><a href='#' title='Rate this 5 smile out of 5' class='five-stars'>5</a></li>
                      </ul>
                      <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a> </h4>
                  </div>
                </div>
              </li>
              <li>
                <div class="product-box">
                  <p><a href="product_detail.php"><img src="<?php echo site_url();?>themes/images/thumb/2.jpg" alt="" /></a></p>
                  <div class="caption">
                    <h4 > <a class="like pull-left " href="product_details.html"> <i class="icon-thumbs-up"></i><span class="like-txt">(10)</span></a>
                      <ul class='star-rating'>
                        <li><a href='#' title='Rate this 1 smile out of 5' class='one-star'>1</a></li>
                        <li><a href='#' title='Rate this 2 smile out of 5' class='two-stars'>2</a></li>
                        <li><a href='#' title='Rate this 3 smile out of 5' class='three-stars'>3</a></li>
                        <li><a href='#' title='Rate this 4 smile out of 5' class='four-stars'>4</a></li>
                        <li><a href='#' title='Rate this 5 smile out of 5' class='five-stars'>5</a></li>
                      </ul>
                      <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a> </h4>
                  </div>
                </div>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
        </div>
        <!--/carousel--> 
      </div>
    </div>
    </div>
  </section>
</div>
<script src="<?php echo site_url();?>themes/js/jquery.carouFredSel-6.2.1-packed.js"></script> 
<script src="<?php echo site_url();?>themes/js/custom.js"></script>
<script type="text/javascript">
$(function () {
        $('#myTab a:first').tab('show');
        $('#myTab a').click(function (e) {
          e.preventDefault();
          $(this).tab('show');
        })
      })
</script>