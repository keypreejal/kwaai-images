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

        <?php if($this->session->flashdata('upload_msg_error')): ?>
             <div class="notify notify-failure">                        
                <a class="close" href="javascript:;">×</a>                        
                <h3><?php echo $this->session->flashdata('upload_msg_error');?></h3>                        
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
            <form method="post" id="uploads-img" enctype="multipart/form-data" action="<?php echo site_url().'dashboard/upload'; ?>" id="product-form" class="product-form"  >
              <?php echo validation_errors(); ?>
              
              <select name="category" id="category" class="required">
                <option value="" >Image Type</option>
                 <?php        
                    foreach($categories as $category){
                        echo "<option value='".intval($category->CatId)."'>".$this->front_model->format_data($category->CategoryName)."</option>";         
                    } ?>
              </select>
              <select name="scategory" id="scategory" class="required">
                <option>Image Category</option>
              </select>
              <select name="orientation" id="orientation" class="required">
                <option value="">Image Orientation</option>
                <?php        
                    foreach($orientations as $orientation){
                        echo "<option value='".intval($orientation->OrId)."'>".$this->front_model->format_data($orientation->OrName)."</option>";         
                    } ?>
              </select>
              <div class="control-group freepaid">
                <div class="controls">
                  <input type="checkbox" name="free-paid" checked="true" value="0"><label class="free">Upload image for FREE</label>
                </div>
                <div class="controls">
                  <input type="checkbox" name="free-paid" value="1"><label class="free">Upload image for Paid</label>
                </div>
              </div>

              <table class="table table-striped shop_attributes tab-table">
                <thead>
                  <th>Upload</th>
                  <th>Size(MB)</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th class="tprice">Price</th>
                </thead>
                <tbody>
                  <tr>
                    <td width="5px;">
                      <img id="preview" src="#" alt="your image" width="180px" height="102px"/>
                      <input type="file" name="upload_image" id="upload_image" class="upload_image required" accept='image/*'>
                    </td>
                    <td>
                      <input type="text" id="product_size" name="product_size" class="product_size required empty" readOnly="true">
                    </td>
                    <td>
                      <input type="text" name="product_title" class="product_title required empty">
                    </td>
                    <td>
                      <textarea name="product_description" class="product_description required empty"></textarea>
                    </td>
                    <td class="tprice">
                      <input type="text" name="product_price" class="product_price empty"></textarea>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="thumb-control-group" style="display:none;">
                <div class="controls">
                  <input type="radio" name="upload-thumb" class="upload-thumb input-radio single" value="No" checked="true">
                  <label class="control-label usingle">Upload Single Image</label>
                </div>
              </div>
              <!--/control-group-->
              <div class="thumb-control-group" style="display:none;">
                <div class="controls">
                  <input type="radio" name="upload-thumb" class="upload-thumb input-radio" value="Yes">
                  <label class="control-label umultiple">Also Like to Create other thumbnail into this image</label>
                </div>
              </div>

              <div class="upload-thumb-dimension" style="display:none">
               
              </div>
              
              <div class="actions divsubmit">
                <input type="hidden" id="pcode" name="pcode">
                <input type="hidden" name="iwidth" id="iwidth">
                <input type="hidden" name="iheight" id="iheight">
                <input type="submit" value="save" name="upload" class="btn btn-inverse btn-signin" tabindex="9">
              </div>
            </form>
        </div>

        <div class="span7 sec-span">

          <!-- Home dashboard -->
          <div class="home">
            <div class="uploaded-images">
              <table class="table table-striped uploads-history tab-table">
                  <tbody>
                    <tr class="">
                      <th>Preview</th>
                      <td>Title</td>
                      <td>Action</td>
                    </tr>
                    <?php 
                   if(is_array($uploaded_images)>0):
                    foreach($uploaded_images as $uploaded_image):?>
                      <tr class="">
                           <td><img width="180" height="102" src="<?php echo site_url().'uploads/'.$uploaded_image->ProfileId.'/'.$uploaded_image->ProductCode.'/thumb/listing/'.$uploaded_image->ImageName;?>" ></td>
                           <td><?php echo $uploaded_image->ProductName; ?></td>
                           <td>
                              <a title="Edit" pcode="<?php echo $uploaded_image->ProductCode;?>" id="eimage" href="javascript:void(0)"><img src="<?php echo base_url(); ?>images/admin/edit.png"></a>
                              <a id="delimage" title="Delete" onclick="return confirm('Are You Sure To Delete This SubCategory?');" href="<?php echo base_url()."dashboard/delete/$uploaded_image->ProductCode";?>"><img src="<?php echo base_url(); ?>images/admin/close.png"></a>
                           </td>
                      </tr>
                    <?php endforeach; endif;?>
                    
                  </tbody>
              </table>
            </div>
            <hr>
            
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
  $('.tprice').hide();
  $('input[name="free-paid"]').click(function(){
      $("input:checkbox").attr("checked", false);
      $(this).attr("checked", true);
      if( $(this).val() == 0)  {
        $('.product_price').removeClass('required');
        $('.tprice').hide();
        $('.product_price').val('');
        $('.single').attr('checked',true);
        $('.upload-thumb-dimension').hide();
        $('form#uploads-img .thumb-control-group').hide();
      } else {
          $('.tprice').show();
          $('.product_price').addClass('required');
          if( $('#preview').attr('src') !=''){
            $('form#uploads-img .thumb-control-group').show();
          }
      }
  });

  $('input[name="product_price"]').keyup(function(e) {
      var value = jQuery(this).val();
      value = value.replace(/[^0-9]+/g, '');
      $(this).val(value);
  });
  $('div.dashboard a,a#home').click(function(){
      var show = $(this).attr('id');
      $('div.dashboard').show();
      $('div#upload-image').hide();
      $('div.sec-span > div').hide();
      $('div.sec-span > div.'+show).show();
      $('.empty').val('');
      $('img#preview').attr('src','');
      $('div.divsubmit #pcode').val('');
      $('div.upload-thumb-dimension p.empty').remove();
  });
  $('a#upload-image').click(function(){
      $('div.dashboard').hide();
      var show = $(this).attr('id');
      $('div#'+show).show();

      var h2 = $('div#upload-image h2.titles');
      var oldh2 = '<h2 class="titles"><i class="icon-upload-alt"></i>Upload your images</h2>';
      h2.replaceWith(oldh2);
      $('div.divsubmit #pcode').val('');
      $('div.upload-thumb-dimension p.empty').remove();
  });

  $('a#eimage').click(function(){
    $('div.dashboard').hide();
    $('div.sec-span > div').hide();
    $('div#upload-image').show();
    var pcode = $(this).attr('pcode');
    $.ajax({
      type: "post",
      url : "<?php echo site_url('dashboard/search_image_datas');?>",
      data: {"pcode":pcode},
      dataType : 'json',
      success: function(data){
        $.each(data, function(index,value){ 
            $('input.upload_image').removeClass('required');
            var isrc = 'uploads/'+value.pid+'/'+value.product_code+'/thumb/listing/'+value.imgname;
            $('div.divsubmit #pcode').val(value.product_code);
            var h2 = $('div#upload-image h2.titles');
            var newh2 = '<h2 class="titles"><i class="icon-upload-alt"></i> Edit your images "'+value.product_name+'" ('+value.product_code+')</h2>';
            h2.replaceWith(newh2);

            //check that free/paid
            var price = value.product_price;
            var othumb = value.other_thumb;
           // alert(price);
            if(price !='') {
               var yesNo = value.other_thumb == 1 ? 'Yes':'No';
               $("input[name=free-paid][value=1]").prop('checked', true);
               $("input[name=free-paid][value=0]").prop('checked', false);
               $('.tprice').show();
               $('div.thumb-control-group').show();
               $("input[name=upload-thumb][value=No]").prop('checked', false);
               $("input[name=upload-thumb][value="+yesNo+"]").prop('checked', true);
               //$("input[name=upload-thumb][value=0]").prop('checked', false);

               if(othumb == 1) {
                $('div.upload-thumb-dimension').append('<p class="empty">Actual size('+value.actual+')</p>');
                $('div.upload-thumb-dimension').append('<p class="empty">Large size('+value.large+')</p>');
                $('div.upload-thumb-dimension').append('<p class="empty">Medium size('+value.medium+')</p>');
                $('div.upload-thumb-dimension').append('<p class="empty">Small size('+value.small+')</p>');
                $('div.upload-thumb-dimension').append('<p class="empty">Xsmall size('+value.xsmall+')</p>');
              }
            } else{
               $("input[name=free-paid][value=0]").prop('checked', true);
               $("input[name=free-paid][value=1]").prop('checked', false);
               $('.tprice').hide();
               $('div.thumb-control-group').hide();
               $('div.upload-thumb-dimension').hide();
            }

            
            $('#category option[value='+value.category_id+']').attr("selected", true); // give the attribute of selected to the specified option
            $('#scategory').append('<option selected=true value='+value.scategory_id+'>'+value.sname+'</option>');  
            $('#orientation option[value='+value.orientation_id+']').attr("selected", true); // give the attribute of selected to the specified option
            $('#product_size').val(value.tsize); 
            $('#preview').attr('src',"<?php echo site_url();?>"+isrc);
            $('.product_title').val(value.product_name);
            $('.product_description').val(value.product_description);
            $('.product_price').val(price);

            
            var labelcrThumb = $('div.thumb-control-group label.umultiple');
            var oldlabelThumb = '<label class="control-label umultiple">Also Like to Create other thumbnail into this image</label>';
            var newhlabelcrThumb = '<label class="control-label umultiple">Uploaded with These sized thumbs into this image</label>';
            othumb == 1?labelcrThumb.replaceWith(newhlabelcrThumb):labelcrThumb.replaceWith(oldlabelThumb);
            othumb == 1?$('div.upload-thumb-dimension').show():'';
            
        }); 
      }
    });
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
      $('#category option').removeAttr("selected");
      $('#category option[value='+categoryid+']').attr("selected", true); // give the attribute of selected to the specified option
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
  $('#scategory').change(function(){
    var scategoryid = $(this).val();
    if(scategoryid != ''){
      $('#scategory option').removeAttr("selected");
      $('#scategory option[value='+scategoryid+']').attr("selected", true); // give the attribute of selected to the specified option
    }
  });
  $('#orientation').change(function(){
    var oid = $(this).val();
    if(oid != ''){
      $('#orientation option').removeAttr("selected");
      $('#orientation option[value='+oid+']').attr("selected", true); // give the attribute of selected to the specified option
    }
  });

  function readURL(input) {
    if (input.files && input.files[0]) {
       // console.log((input.files[0].size/1024)/1024); // mb
        $('div.upload-thumb-dimension').html('');
        var my_rem_size = "<?php echo $available_size; ?>";
        var sel_img_size = ((input.files[0].size/1024)/1024).toFixed(2); //MB
        
        var check = my_rem_size - sel_img_size;
        //console.log(my_rem_size); // mb
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
              $(":input[name='product_title']").focus();
              $('#product_size').val(sel_img_size);
              $('.info-image').show();
              $('.info-image #actual-size').val(width + 'x' + height);
              $('#iwidth').val(width);
              $('#iheight').val(height);
              var j  = 1;

              for(var i=4;i>=1;i--) {
                calWidth = Math.ceil((width/5)*i);
                calHeight = Math.ceil((height/5)*i);
                
                display_dimension = calWidth + 'x' + calHeight;
                $('div.upload-thumb-dimension').append('<p class="empty">'+display_dimension+'</p>');
                //$('.info-image tbody tr').eq(j).find('td').eq(0).find('input[type=text]').val(display_dimension);
                j = j+1;
              }
              if($('input[name="free-paid"]:checked').val() == 1){
                 $('form#uploads-img .thumb-control-group').show();
              }
            };

            // var image = new Image();
            // image.src = e.target.result;
            // image.onload = function() {
            //   var width = this.width;    // Current image width
            //   var height = this.height;  // Current image height
            //   $('#preview').attr('src', this.src);
            //   if($('#preview').attr('src') !=''){
              
            //     $('#preview').attr('src', this.src);
            //     $('.info-image').show();
            //     $('.info-image #actual-size').val(width + 'x' + height);
            //     var j  = 1;
            //     for(var i=4;i>=1;i--) {
            //       calWidth = Math.ceil((width/5)*i);
            //       calHeight = Math.ceil((height/5)*i);
                  
            //       display_dimension = calWidth + 'x' + calHeight;
            //       $('.info-image tbody tr').eq(j).find('td').eq(0).find('input[type=text]').val(display_dimension);
            //       j = j+1;
            //     }
            //   } 
                    
                
            //   }
            // };
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
    $('.empty').val('');
    $('#preview').attr('src','');
    
    readURL(this);
  });

  $('.upload-thumb ').click(function(){
    if($(this).is(':checked')){
      if($(this).val() == 'Yes') {
        $('div.upload-thumb-dimension').show();
      }else {
        $('div.upload-thumb-dimension').hide();
      }
    }
  });

  //form validation 

  // $('form#uploads-img').submit(function(e){
  //   e.preventDefault();
  //   var error = 0;
  //   $('.required').each(function(){
  //      if ($(this).val()==''){
  //        error+=1;
  //        $(this).attr("placeholder", "Required");
  //        $(this).addClass('err');
  //      }
  //   });
    
  //   if(error >0){
  //     return false;
  //   }

  // });

  // $('form#uploads-img').submit(function(e){
  //   e.preventDefault();
  //   var img = $('#preview').attr('src');
  //   var width = $('#iwidth').val();
  //   var height = $('#iheight').val();
  //   dataString = $(this).serializeArray();
  //   dataString.push({ name: "image", value: img });
  //   $.ajax({
  //       data: dataString,
  //       url:"<?php echo site_url();?>"+'dashboard/upload',
  //       type:'POST',
  //       success:function(data){
  //         alert(data);
  //       }
  //   });
  // })
  
  // function checkAvailableSize(){
  //  $.ajax({
  //       data: dataString,
  //       url:"<?php echo site_url();?>"+'dashboard/available_package_size',
  //       type:'POST',
  //       success:function(data){
  //         alert(data);
  //       }
  //   });
  //}
});
</script>
