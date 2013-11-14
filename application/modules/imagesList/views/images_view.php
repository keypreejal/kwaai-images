<div id="search">
  <div  id="wrapper" class="containers">
    <div class="navbar-inner">
      <form class="form-inline navbar-search" method="post" action="products.html" >
        <label>
          <input id="srchFld" class="srchTxt" type="text" placeholder="Enter Keyword(s)" style="border:none; background-color:#f1f1f1" />
          <button type="submit" id="submitButton" class="btn btn-primary">Search</button>
        </label>
		<ul id="search-box">
          <li><a class="t-grey">Category Search<i class="icon-caret-down"></i></a>
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
        <p> Filter search results</p>
      </div>
     <form method="#" action="#" class="side-search">
      <div class="side-block">
          <h2>Image Types</h2>
          <?php 
            foreach($categories as $category){
              echo "<div><input type='checkbox' class='image' id='".intval($category->CatId)."' name='image'><label>".$this->front_model->format_data($category->CategoryName)."</label></div>";
            } ?>
         
      </div>
      <!--/ side block image type-->
      <div class="side-block">
        <h2>Category</h2>
          <div>
              <select>
               <?php 
				foreach($scategories as $scategory){
				  echo "<option>".$this->front_model->format_data($scategory->SCategoryName)."</option>";
				} ?>
             </select> 
          </div>  
          <!--/end of div-->
          </div>
      <!--/ side block category type-->
      <div class="side-block" style="border-bottom:none">
        <h2>Orientation</h2>
          <div>
          	 <?php 
				foreach($orientations as $orientation){
				  echo "<div><input type='checkbox' class='image' id='".intval($orientation->OrId)."' name='image'><label>".$this->front_model->format_data($orientation->OrName)."</label></div>";
				} ?>
          </div>  
          <!--/end of div-->
      </div>          
      <!--/ side block oreinetation type-->
      <div class="side-block">
         <button class="btn btn-primary" id="submitButton" type="submit">Search</button>
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
        
        <li>
          <div class="product-box"> 

            <p> <a href="detail.php" class="screenshot" rel="themes/images/thumb-large/1.jpg" title=":Bird"><img src="themes/images/thumb/1.jpg"> </a></p>
            <div class="caption">
              <h4 > <a class="like pull-left " href="product_details.html"> <i class="icon-thumbs-up"></i><span class="like-txt">(10)</span></a>
                <ul class='star-rating'>
                  <li><a href='#' title='Rate this 1 smile out of 5' class='one-star'>1</a></li>
                  <li><a href='#' title='Rate this 2 smile out of 5' class='two-stars'>2</a></li>
                  <li><a href='#' title='Rate this 3 smile out of 5' class='three-stars'>3</a></li>
                  <li><a href='#' title='Rate this 4 smile out of 5' class='four-stars'>4</a></li>
                  <li><a href='#' title='Rate this 5 smile out of 5' class='five-stars'>5</a></li>
                </ul>
                <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a> 
              </h4>
              <hr>
              <span id="i-id">00011</span>
              <span id="i-name">Kwaai Images</span>
            </div>
          </div>
        </li>
        <!--/thumbnail-->
        <li>
          <div class="product-box"> 
            <p><a href="detail.php" class="screenshot" rel="themes/images/thumb-large/2.jpg" title=":Bird"><img src="themes/images/thumb/2.jpg"> </a></p>
            <div class="caption">
              <h4 > <a class="like pull-left " href="product_details.html"> <i class="icon-thumbs-up"></i><span class="like-txt">(10)</span></a>
                <ul class='star-rating'>
                  <li><a href='#' title='Rate this 1 smile out of 5' class='one-star'>1</a></li>
                  <li><a href='#' title='Rate this 2 smile out of 5' class='two-stars'>2</a></li>
                  <li><a href='#' title='Rate this 3 smile out of 5' class='three-stars'>3</a></li>
                  <li><a href='#' title='Rate this 4 smile out of 5' class='four-stars'>4</a></li>
                  <li><a href='#' title='Rate this 5 smile out of 5' class='five-stars'>5</a></li>
                </ul>
                <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a> 
              </h4>
              <hr>
              <span id="i-id">00011</span>
              <span id="i-name">Kwaai Images</span>
            </div>
          </div>
        </li>
        <!--/thumbnail-->
        <li>
          <div class="product-box"> 
            <p><a href="detail.php" class="screenshot" rel="themes/images/thumb-large/3.jpg" title=":Bird"><img src="themes/images/thumb/3.jpg"> </a></p>
            <div class="caption">
              <h4 > <a class="like pull-left " href="product_details.html"> <i class="icon-thumbs-up"></i><span class="like-txt">(10)</span></a>
                <ul class='star-rating'>
                  <li><a href='#' title='Rate this 1 smile out of 5' class='one-star'>1</a></li>
                  <li><a href='#' title='Rate this 2 smile out of 5' class='two-stars'>2</a></li>
                  <li><a href='#' title='Rate this 3 smile out of 5' class='three-stars'>3</a></li>
                  <li><a href='#' title='Rate this 4 smile out of 5' class='four-stars'>4</a></li>
                  <li><a href='#' title='Rate this 5 smile out of 5' class='five-stars'>5</a></li>
                </ul>
                <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a> 
              </h4>
              <hr>
              <span id="i-id">00011</span>
              <span id="i-name">Kwaai Images</span>
            </div>
          </div>
        </li>
        <!--/thumbnail-->
        <li>
          <div class="product-box"> 
            <p><a href="detail.php" class="screenshot" rel="themes/images/thumb-large/4.jpg" title=":Bird"><img src="themes/images/thumb/4.jpg"> </a></p>
            <div class="caption">
              <h4 > <a class="like pull-left " href="product_details.html"> <i class="icon-thumbs-up"></i><span class="like-txt">(10)</span></a>
                <ul class='star-rating'>
                  <li><a href='#' title='Rate this 1 smile out of 5' class='one-star'>1</a></li>
                  <li><a href='#' title='Rate this 2 smile out of 5' class='two-stars'>2</a></li>
                  <li><a href='#' title='Rate this 3 smile out of 5' class='three-stars'>3</a></li>
                  <li><a href='#' title='Rate this 4 smile out of 5' class='four-stars'>4</a></li>
                  <li><a href='#' title='Rate this 5 smile out of 5' class='five-stars'>5</a></li>
                </ul>
                <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a> 
              </h4>
              <hr>
              <span id="i-id">00011</span>
              <span id="i-name">Kwaai Images</span>
            </div>
          </div>
        </li>
        <!--/thumbnail-->
        <li>
          <div class="product-box"> 
            <p><a href="detail.php" class="screenshot" rel="themes/images/thumb-large/5.jpg" title=":Bird"><img src="themes/images/thumb/5.jpg"> </a></p>
            <div class="caption">
              <h4 > <a class="like pull-left " href="product_details.html"> <i class="icon-thumbs-up"></i><span class="like-txt">(10)</span></a>
                <ul class='star-rating'>
                  <li><a href='#' title='Rate this 1 smile out of 5' class='one-star'>1</a></li>
                  <li><a href='#' title='Rate this 2 smile out of 5' class='two-stars'>2</a></li>
                  <li><a href='#' title='Rate this 3 smile out of 5' class='three-stars'>3</a></li>
                  <li><a href='#' title='Rate this 4 smile out of 5' class='four-stars'>4</a></li>
                  <li><a href='#' title='Rate this 5 smile out of 5' class='five-stars'>5</a></li>
                </ul>
                <a class="pull-right" href="#"> <i class="icon-shopping-cart"></i></a> 
              </h4>
              <hr>
              <span id="i-id">00011</span>
              <span id="i-name">Kwaai Images</span>
            </div>
          </div>
        </li>
        <!--/thumbnail-->
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
