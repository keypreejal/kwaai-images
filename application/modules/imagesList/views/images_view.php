<div id="search">
  <div  id="wrapper" class="containers">
    <div class="navbar-inner">
      <form class="form-inline navbar-search" method="post" action="products.html" >
        <label>
          <input id="srchFld" class="srchTxt" type="text" placeholder="Enter Keyword(s)" style="border:none; background-color:#f1f1f1" />
          <button type="submit" id="submitButton" class="btn btn-primary">Search</button>
        </label>

        <select class="srchTxt" style="width:auto; color:#000;  border:none; background:none">
          <option>Category Search</option>
          <?php 
            foreach($categories as $category){
              echo "<option value=imageslist/category/".intval($category->CatId).">".$this->front_model->format_data($category->CategoryName)."</option>";         
            } ?>
        </select>
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
      <!--<div class="well well-small"><a id="myCart" href="product_summary.html"><img src="themes/images/ico-cart.png" alt="cart">3 Items in your cart  <span class="badge badge-warning pull-right">$155.00</span></a></div>-->
      <ul id="sideManu" class="nav nav-tabs nav-stacked">
        <li class="subMenu open"><a> Type of Image</a>
          <ul class="categories">
            <li><input type="checkbox" class="ck-box" value="any">Any</li>
            <?php 
            foreach($categories as $category){
              echo "<li><input type='checkbox' class='ck-box' value=".intval($category->CatId).">".$this->front_model->format_data($category->CategoryName)."</li>";
            } ?>
          </ul>
        </li>
        <li class="subMenu open"><a> Categories </a>
          <ul class="subcategories">
            <li><input type="checkbox" class="ck-box" value="any">Any</li>
            <?php 
            foreach($scategories as $scategory){
              echo "<li><input type='checkbox' class='ck-box' value=".intval($scategory->SCatId).">".$this->front_model->format_data($scategory->SCategoryName)."</li>";
            } ?>
            
          </ul>
        </li>
        <li class="subMenu open"><a>Orientation</a>
          <ul class="orientation">
            <li><input type="checkbox" class="ck-box" value="any">Any</li>
            <?php 
            foreach($orientations as $orientation){
              echo "<li><input type='checkbox' class='ck-box' value=".intval($orientation->OrId).">".$this->front_model->format_data($orientation->OrName)."</li>";
            } ?>
           
          </ul>
        </li>
      </ul>
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
        <li class="span2">
          <div class="product-box"> <span class="sale_tag"></span>
            <p><a class="btn btn-lg btn-danger" data-behavior="BS.Popover" title="A Title" data-bs-popover-options="
  'content': 'And here\'s some amazing content. It\'s very engaging. right?',
  'location': 'below'
">Mouseover to toggle popover</a></p>
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
        <li class="span2">
          <div class="product-box"> <span class="sale_tag"></span>
            <p><a href="product_detail.php"><img src="themes/images/thumb/2.jpg" alt="" /></a></p>
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
        <li class="span2">
          <div class="product-box">
            <p><a href="product_detail.php"><img src="themes/images/thumb/3.jpg" alt="" /></a></p>
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
        <li class="span2">
          <div class="product-box">
            <p><a href="product_detail.php"><img src="themes/images/thumb/4.jpg" alt="" /></a></p>
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
        <li class="span2">
          <div class="product-box">
            <p><a href="product_detail.php"><img src="themes/images/thumb/5.jpg" alt="" /></a></p>
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
        <li class="span2">
          <div class="product-box"> <span class="sale_tag"></span>
            <p><a href="product_detail.php"><img src="themes/images/thumb/1.jpg" alt="" /></a></p>
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
        <li class="span2">
          <div class="product-box"> <span class="sale_tag"></span>
            <p><a href="product_detail.php"><img src="themes/images/thumb/2.jpg" alt="" /></a></p>
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
        <li class="span2">
          <div class="product-box">
            <p><a href="product_detail.php"><img src="themes/images/thumb/3.jpg" alt="" /></a></p>
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
        <li class="span2">
          <div class="product-box">
            <p><a href="product_detail.php"><img src="themes/images/thumb/4.jpg" alt="" /></a></p>
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
        <li class="span2">
          <div class="product-box">
            <p><a href="product_detail.php"><img src="themes/images/thumb/5.jpg" alt="" /></a></p>
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
        <li class="span2">
          <div class="product-box"> <span class="sale_tag"></span>
            <p><a href="product_detail.php"><img src="themes/images/thumb/1.jpg" alt="" /></a></p>
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
        <li class="span2">
          <div class="product-box"> <span class="sale_tag"></span>
            <p><a href="product_detail.php"><img src="themes/images/thumb/2.jpg" alt="" /></a></p>
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
        <li class="span2">
          <div class="product-box">
            <p><a href="product_detail.php"><img src="themes/images/thumb/3.jpg" alt="" /></a></p>
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
        <li class="span2">
          <div class="product-box">
            <p><a href="product_detail.php"><img src="themes/images/thumb/4.jpg" alt="" /></a></p>
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
        <li class="span2">
          <div class="product-box">
            <p><a href="product_detail.php"><img src="themes/images/thumb/5.jpg" alt="" /></a></p>
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