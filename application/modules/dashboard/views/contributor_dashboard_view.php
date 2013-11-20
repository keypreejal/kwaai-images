<div id="search">
  <div  id="wrapper" class="container">
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
<div id="wrapper" class="container">
  <section class="main-content">
    <div class="row">
      <div class="span10">
        <h2 class="titles"><span class="text"><a class="show" id="home" href="javascript:void(0)"><i class="icon-home"></i>My Dashboard:</a> User Name Display</span></h2>
        <!--sidebar-->
        <div id="sidebar" class="span3 side-sec">
          <div class="sidey">
            <div class="dashboard">
              <div class="block-title ttl-bg">
                <h3>Account Information</h3>
              </div>
              <div class="block-title">
                <h3>Paypal Configuration <span class="pull-right"><a id="paypal-conf" href="javascript:void(0)">Edit</a></span></h3>
              </div>
              <div class="block-title">
                <h3>Personal Information<span class="pull-right"><a id="personal-info" href="javascript:void(0)">Edit</a></span></h3>
              </div>
              <ul class="dashbar">
                <li><span>Member ID:</span>A1234</li>
                <li><span>Name:</span>Account Holder</li>
                <li><span>Email:</span>user@hotmail.com</li>
                <li><span>Password:</span><a id="change-password" href="javascript:void(0)">Modify</a></li>
                <li><span>Address: </span><a id="personal-info" href="javascript:void(0)">Edit</a></li>
                <li><span>Zip/Postal Code: </span><a id="personal-info" href="javascript:void(0)">Edit</a></li>
                <li><span>Country </span>Nepal</li>
                <li><span>Phone: </span><a id="personal-info" href="javascript:void(0)">Edit</a></li>
                <li><span>Joined: </span>November 15, 2013</li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Sidebar end=============================================== -->

        <div class="span7 sec-span">

          <!-- Home dashboard -->
          <div class="home">
            <h2 class="titles"><i class="icon-upload-alt"></i>Upload your images</h2>
            <form>
              <input type="file">
              <p>Upload your images</p>
            </form>
            <hr>
            <!--upload form-->
            <div class="overview">
              <h3><i class="icon-bar-chart"></i>User's Account Statistics:</h3>
              <!-- Your details -->
              <table class="table table-striped shop_attributes tab-table">
                <tbody>
                  <tr class="">
                    <th>Package</th>
                    <td>Silver</td>
                    <td><a href="#">Upgrade</a></td>
                    <td></td>
                  </tr>
                  <tr class="">
                    <th>Space</th>
                    <td>1Gb</td>
                    <th>Used Space</th>
                    <td>500Mb</td>
                  </tr>
                  <tr class="">
                    <th>Uploaded Files</th>
                    <td>100</td>
                    <th>Uploads This Month</th>
                    <td>100</td>
                  </tr>
                  <tr class="">
                    <th>Total Sales</th>
                    <td>100</td>
                    <th>Sales This Month</th>
                    <td>100</td>
                  </tr>
                  <tr class="">
                    <th>My Earnings</th>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr class="">
                    <th>Total Earnings</th>
                    <td>&pound; 300</td>
                    <th>Earning This Month</th>
                    <td>&pound; 50</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- End Home dashboard -->

          <!-- paypal configuration !-->
          <div class="paypal-conf" style="display:none;">
            <h3>Your Paypal Configuration Here</h3>
            <hr>
            <form action="#" method="post" class="form-stacked">
              <fieldset>
                <div class="control-group">
                  <label class="control-label">Pypal ID</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge">
                  </div>
                </div>
                <!--/control-group-->
                <div class="actions">
                  <input tabindex="9" class="btn btn-inverse btn-signin" type="submit" value="<?php echo $save_btn; ?>">
                </div>
              </fieldset>
            </form>
          </div>
          <!-- End paypal configuration !-->

          <!-- Personal Information !-->
          <div class="personal-info" style="display:none;">
            <ul class="nav nav-tabs" id="myTab">
              <li class="active"><a href="#profile">Private Profile</a></li>
              <li class=""><a href="#public">Public Profile</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="profile">
                <h2 class="titles"><span class="text">Personal Information</span></h2>
                <p> These details are for iStock use only and will never be shared with anyone else. For more information, review our privacy policy.</p>
                <p>If you become an iStock contributor, it's important that you provide your real name (no nicknames) and correct address, as we use this information for payouts. You won't be able to change your name</p>
                <form action="#" method="post" class="form-stacked">
                  <fieldset>
                    <div class="span4 side-sec">
                      <div class="control-group">
                        <label class="control-label">First Name</label>
                        <div class="controls">
                          <input type="text" class="input-xxlarge">
                        </div>
                      </div>
                      
                      <!--/control-group-->
                      <div class="control-group">
                        <label class="control-label">Last Name</label>
                        <div class="controls">
                          <input type="text" class="input-xxlarge">
                        </div>
                      </div>
                      <!--/control-group-->
                      <div class="control-group">
                        <label class="control-label">Email address</label>
                        <div class="controls">
                          <input type="text" class="input-xxlarge">
                        </div>
                      </div>
                      <!--/control-group-->
                      <div class="control-group">
                        <label class="control-label">Address 1</label>
                        <div class="controls">
                          <input type="text" class="input-xxlarge">
                        </div>
                      </div>
                      <!--/control-group-->
                      <div class="control-group">
                        <label class="control-label">Address 2</label>
                        <div class="controls">
                          <input type="text" class="input-xxlarge">
                        </div>
                      </div>
                      <!--/control-group-->
                      <div class="control-group">
                        <label class="control-label">City/Town</label>
                        <div class="controls">
                          <input type="text" class="input-xxlarge">
                        </div>
                      </div>
                      <!--/control-group-->
                      <div class="control-group">
                        <label class="control-label">State/Province</label>
                        <div class="controls">
                          <input type="text" class="input-xxlarge">
                        </div>
                      </div>
                      <!--/control-group-->
                      <div class="control-group">
                        <label class="control-label">Zip/Postal Code</label>
                        <div class="controls">
                          <input type="text" class="input-xxlarge">
                        </div>
                      </div>
                      <!--/control-group-->
                      <div class="control-group">
                        <label class="control-label">Country/Region</label>
                        <div class="controls">
                          <select>
                            <option>Select a country</option>
                            <option>Nepal</option>
                          </select>
                        </div>
                      </div>
                      <!--/control-group-->
                      <div class="control-group">
                        <label class="control-label">Phone Number</label>
                        <div class="controls">
                          <input type="text" class="input-xxlarge">
                        </div>
                      </div>
                      <!--/control-group-->
                      <div class="control-group">
                        <label class="control-label">Fax Number(Optional)</label>
                        <div class="controls">
                          <input type="text" class="input-xxlarge">
                        </div>
                      </div>
                      <!--/control-group-->
                      <div class="actions">
                        <input tabindex="9" class="btn btn-inverse btn-signin" type="submit" value="<?php echo $save_btn; ?>">
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
              <!-- /tab 1 -->
              <div class="tab-pane" id="public">
                <p>Everyone can see the information in your public profile. You can edit it at any time.</p>
                <h3>About Yourself</h3>
                <form action="#" method="post" class="form-stacked">
                  <fieldset>
                    <div class="span4 side-sec">
                      <div class="control-group">
                        <label class="control-label">Upload Picture</label>
                        <div class="controls">
                          <input type="file">
                          <p>Minimum Size: 40x40, Maximum Size: 200x200</p>
                        </div>
                      </div>
                      <!--/control-group-->
                      <div class="control-group">
                        <label class="control-label">Biography</label>
                        <div class="controls">
                          <textarea class="input-xxlarge"></textarea>
                        </div>
                      </div>
                      <!--/control-group-->
                      <div class="control-group">
                        <label class="control-label">About Me</label>
                        <div class="controls">
                          <input type="text" class="input-xxlarge">
                        </div>
                      </div>
                      <!--/control-group-->
                      <div class="control-group">
                        <label class="control-label">Interests</label>
                        <div class="controls">
                          <input type="text" class="input-xxlarge">
                        </div>
                      </div>
                      <!--/control-group-->
                      <div class="control-group">
                        <label class="control-label"><?php echo $register_left_companyname; ?></label>
                        <div class="controls">
                          <input type="text" class="input-xxlarge">
                        </div>
                      </div>
                      <!--/control-group-->
                      <div class="control-group">
                        <label class="control-label">Company Website</label>
                        <div class="controls">
                          <input type="text" class="input-xxlarge">
                        </div>
                      </div>
                      <!--/control-group-->
                      <div class="control-group">
                        <label class="control-label">Company Pone Number</label>
                        <div class="controls">
                          <input type="text" class="input-xxlarge">
                        </div>
                      </div>
                      <!--/control-group-->
                      <div class="control-group">
                        <label class="control-label">Company Fax Number</label>
                        <div class="controls">
                          <input type="text" class="input-xxlarge">
                        </div>
                      </div>
                      <!--/control-group-->
                      <div class="actions">
                        <input tabindex="9" class="btn btn-inverse btn-signin" type="submit" value="<?php echo $save_btn; ?>">
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
              <!-- /tab 2 --> 
            </div>
          </div>
          <!-- End Personal Information !-->

          <!-- change password -->
          <div class="change-password" style="display:none;">
            <h3><?php echo $client_dashboard_pinformation; ?></h3>
            <form action="#" method="post" class="form-stacked">
              <fieldset>
                <div class="control-group">
                  <label class="control-label"><?php echo $old.' '.$password; ?></label>
                  <div class="controls">
                    <input type="password" class="input-xlarge">
                  </div>
                </div> 
                <!--/control-group-->  
              <div class="control-group">
                  <label class="control-label"><?php echo $new.' '.$password; ?></label>
                  <div class="controls">
                    <input type="password" class="input-xlarge">
                  </div>
                </div> 
                <!--/control-group-->  
                <div class="control-group">
                  <label class="control-label"><?php echo $retype.' '.$password; ?></label>
                  <div class="controls">
                    <input type="password" class="input-xlarge">
                  </div>
                </div> 
                <!--/control-group-->             
                <div class="actions"><input tabindex="9" class="btn btn-inverse btn-signin" type="submit" value="<?php echo $save_btn; ?>"></div>
              </fieldset>
            </form>  
          </div>
          <!-- change password ends --> 


        </div>
        <!--/account info--> 
        
      </div>
    </div>

    <div class="row">
      <div class="span10">
        <div  class="recent-posts blocky">
          <h4 class="title"> <span class="pull-center"><span class="text"><span class="line"><?php echo $most_popular_pictures; ?></span></span></span> <span class="pull-right"> </span> </h4>
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
  </section>
</div>

<script src="<?php echo site_url();?>themes/js/jquery.carouFredSel-6.2.1-packed.js"></script> 
<script src="<?php echo site_url();?>themes/js/custom.js"></script>

<script type="text/javascript">
$(function() {
  $('div.dashboard a,a#home').click(function(){
      var show = $(this).attr('id');
      $('div.sec-span > div').hide();
      $('div.sec-span > div.'+show).show();
  });

  $('#myTab a:first').tab('show');
  $('#myTab a').live('click',function (e) {
    e.preventDefault();
    $(this).tab('show');
  }); 

 
});
</script>
