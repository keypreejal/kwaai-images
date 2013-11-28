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
         <?php if($this->session->flashdata('upload_msg')): ?>
             <div class="notify notify-success">                        
                <a class="close" href="javascript:;">×</a>                        
                <h3><?php echo $this->session->flashdata('upload_msg');?></h3>                        
            </div>
        <?php endif; ?>
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
                <h3><a id="upload-image" href="javascript:void(0)">Upload Image</a></h3>
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
        <div class="span10" id="upload-image" style="display:none; margin-left:0;">
           <h2 class="titles"><i class="icon-upload-alt"></i>Upload your images</h2>
            <form id="uploads-img" enctype="multipart/form-data" action="<?php echo site_url().'dashboard/upload'; ?>" id="product-form" class="product-form" method="post" >
              <?php echo validation_errors(); ?>
              <?php //echo display_errors(); ?>
              <select name="category" id="category" class="required">
                <option value="">Image Type</option>
                 <?php        
                    foreach($categories as $category){
                        echo "<option name='cid' value='".intval($category->CatId)."'>".$this->front_model->format_data($category->CategoryName)."</option>";         
                    } ?>
              </select>
              <select name="scategory" id="scategory" class="required">
                <option value="">Image Category</option>
              </select>
              <select name="orientation" id="orientation" class="required">
                <option value="" name='oid'>Image Orientation</option>
                <?php        
                    foreach($orientations as $orientation){
                        echo "<option value='".intval($orientation->OrLangId)."'>".$this->front_model->format_data($orientation->OrName)."</option>";         
                    } ?>
              </select>

              <table class="table table-striped shop_attributes tab-table">
                <thead>
                  <th>Upload</th>
                  <th>Title</th>
                  <th>Description</th>
                </thead>
                <tbody>
                  <tr>
                    <td width="5px;">
                      <img id="preview" src="#" alt="your image" width="100px" height="100px"/>
                      <input type="file" name="upload_image" id="upload_image" class="upload_image" value="" accept="image/jpeg">
                    </td>
                    <td>
                      <input type="text" name="product_title">
                    </td>
                    <td>
                      <textarea name="product_description"></textarea>
                    </td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-striped info-image tab-table" style="display:none">
                <thead>
                  <th>Dimension</th>
                  <th>Price</th>
                  <th>Status</th>
                </thead>
                <tbody>
                <!--BEGIN TR-->
                  <tr>
                    <td>Actual<input type="text" name="dimension[]" id="actual-size" readOnly="true"></td>
                    <td><input type="text" name="price[]"></td>
                    <td><select name="size_status[]">
                        <option value=1>Enable</option>
                        <option value=0>Disable</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Standard L <input type="text" name="dimension[]" id="sl-size" readOnly="true">
                       <img id="lpreview" src="#" alt="your image" width="100px" height="100px"/>
                    </td>
                    <td><input type="text" name="price[]"></td>
                    <td><select name="size_status[]">
                        <option value=1>Enable</option>
                        <option value=0>Disable</option>
                      </select>
                    </td>
                  </tr>
               
                  <tr>
                    <td>Standard M <input type="text" name="dimension[]" readOnly="true"></td>
                    <td><input type="text" name="price[]"></td>
                    <td><select name="size_status[]">
                        <option value=1>Enable</option>
                        <option value=0>Disable</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Standard S<input type="text" name="dimension[]" readOnly="true"></td>
                    <td><input type="text" name="price[]"></td>
                    <td><select name="size_status[]">
                        <option value=1>Enable</option>
                        <option value=0>Disable</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Standard XS<input type="text" name="dimension[]" readOnly="true"></td>
                    <td><input type="text" name="price[]"></td>
                    <td><select name="size_status[]">
                        <option value=1>Enable</option>
                        <option value=0>Disable</option>
                      </select>
                    </td>
                  </tr> 
                  
                </tbody>
              </table>
              <div class="actions">
                <input type="submit" value="save" name="upload" class="btn btn-inverse btn-signin" tabindex="9">
              </div>
            </form>
        </div>

        <div class="span7 sec-span">

          <!-- Home dashboard -->
          <div class="home">
           
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
  var my_rem_size = "<?php echo $available_size; ?>";
  $('div.dashboard a,a#home').click(function(){
      var show = $(this).attr('id');
      $('div.dashboard').show();
       $('div#upload-image').hide();
      $('div.sec-span > div').hide();
      $('div.sec-span > div.'+show).show();
  });
  $('a#upload-image').click(function(){
      $('div.dashboard').hide();
      var show = $(this).attr('id');
      $('div#'+show).show();
  });

  $('#myTab a:first').tab('show');
  $('#myTab a').live('click',function (e) {
    e.preventDefault();
    $(this).tab('show');
  }); 

  $('#myTitle a:first').tab('show');
  $('#myTitle a').live('click',function (e) {
    e.preventDefault();
    $(this).tab('show');
  }); 

  $('#myDescription a:first').tab('show');
  $('#myDescription a').live('click',function (e) {
    e.preventDefault();
    $(this).tab('show');
  }); 

  
  $('#category').change(function(){
    var categoryid = $(this).val();
    if(categoryid != ''){
      $('<img>',{
        src : './images/admin/load.gif',
        class : 'ajax_loading',
      }).insertAfter($(this));
      $.ajax({
        type: "post",
        url : "<?php echo site_url('dashboard/search_scategory');?>",
        data: {"cid":categoryid},
        dataType : 'json',
        success: function(data){
         $('img.ajax_loading').remove();               
          if(data){     
            var option;
            $.each(data, function(index,value){ 
              option += "<option value=" + value.scid + ">" + value.name + "</option>";
            });   
            $('#scategory').html('<option value="">Image Category</option>'+option);  
          }
        }
      });
    }else{
      $('#scategory').html('<option value="">Image Category</option>');
    }

  });

  function readURL(input) {
    if (input.files && input.files[0]) {
        console.log((input.files[0].size/1024)/1024); // mb
        var sel_img_size = (input.files[0].size/1024)/1024; //MB
        var check = my_rem_size - sel_img_size;
        console.log(my_rem_size); // mb
        if(check<=0) {
          alert('You cannot upload this file('+sel_img_size+'MB),Size exceeded with Your purchased package size');
        } else { 
          var reader = new FileReader();
          reader.onload = function (e) {
            var image = new Image();
            image.src = e.target.result;
            image.onload = function() {
              var width = this.width;    // Current image width
              var height = this.height;  // Current image height

              $('#preview').attr('src', this.src);
              $('.info-image').show();
              $('.info-image #actual-size').val(width + 'x' + height);
              var j  = 1;
              for(var i=4;i>=1;i--) {
                calWidth = Math.ceil((width/5)*i);
                calHeight = Math.ceil((height/5)*i);
                
                display_dimension = calWidth + 'x' + calHeight;
                $('.info-image tbody tr').eq(j).find('td').eq(0).find('input[type=text]').val(display_dimension);
                j = j+1;
              }
            };
          }
          reader.readAsDataURL(input.files[0]);
        }
        
      }
  }
  $("#upload_image").click(function(){
    var cat = $('#category').val();
    var scat = $('#scategory').val();
    var ori = $('#orientation').val();
    if(cat == ''){ alert('Choose Image Type');return false;}
    if(scat == ''){ alert('Choose Image Category');return false;}
    if(ori == ''){ alert('Choose Image Orientation');return false;}
    
  });
  $("#upload_image").change(function(){
      readURL(this);
  });

  $('form#uploads-img').submit(function(e){
    e.preventDefault();
    var data = $(this).serializeArray();
    
    $.ajax({
        url:"<?php echo site_url();?>"+'dashboard/upload',
        data:data,
        type:'POST',
        success:function(data){
            if(data!=''){
              alert(data);
              
            } 
        }
    });
  })
  
});
</script>
