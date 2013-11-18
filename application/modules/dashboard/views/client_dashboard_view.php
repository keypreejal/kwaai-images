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
      <div class="span10">  
        <h2 class="titles"><i class="icon-user color"></i> <span class="text"><?php echo $my_account_head;?></span></h2>        

        <!--sidebar-->
        <div id="sidebar" class="span3 side-sec">
          <div class="sidey">
            <ul class="nav">
               <li><a id="home" href="javascript:void(0)"><?php echo $my_account_head; ?></a></li>
               <li><a id="order-history" href="javascript:void(0)"><?php echo $client_dashboard_ohistory; ?></a></li>                         
               <li><a id="edit-profile" href="javascript:void(0)"><?php echo $client_dashboard_eprofile; ?></a></li>
               <li><a id="change-password" href="javascript:void(0)"><?php echo $client_dashboard_cpassword; ?></a></li>
            </ul>
          </div>
        </div>
        <!-- Sidebar end=============================================== -->

        <div class="span7 sec-span">
          <!-- Home dashboard -->
          <div class="home">
            <h3><i class="icon-user color"></i> &nbsp;<?php echo $my_account_head; ?></h3>
            <!-- Your details -->
            <div class="address">
             <address>
              <!-- Your name -->
              <strong>Kwaai Images</strong><br>
              <!-- Phone number -->
              <abbr title="Phone">P:</abbr> (123) 456-7890.<br />
              <a href="mailto:#">info@kwaaiimages.com</a>
             </address>
            </div>
            <hr>
                   
            <h3><?php echo $client_dashboard_mrpurchase; ?></h3>
            <hr>
            <table class="table table-striped tcart">
               <thead>
                 <tr>
                   <th><?php echo $client_dashboard_date;?></th>
                   <th><?php echo $client_dashboard_ithumbnail;?></th>
                   <th><?php echo $client_dashboard_imgid; ?></th>
                   <th><?php echo $client_dashboard_price; ?></th>
                   <th><?php echo $client_dashboard_status; ?></th>
                 </tr>
               </thead>
               <tbody>
                 <tr>
                   <td>25-08-12</td>
                   <td class="ps-img"><a href="product_detail.php"><img alt="" src="themes/images/cart/1.jpg"></a></td>
                   <td>4423</td>
                   <td>$530</td>
                   <td>Completed</td>
                 </tr>
                 <tr>
                   <td>15-02-12</td>
                   <td class="ps-img"><a href="product_detail.php"><img alt="" src="themes/images/cart/5.jpg"></a></td>
                   <td>6643</td>
                   <td>$330</td>
                   <td>Completed</td>
                 </tr>
                 <tr>
                   <td>14-08-12</td>
                   <td class="ps-img"><a href="product_detail.php"><img alt="" src="themes/images/cart/3.jpg"></a></td>
                   <td>1283</td>
                   <td>$230</td>
                   <td>Processing</td>
                 </tr>                                               
               </tbody>
            </table>
          </div>
          <!-- Home dashboard Ends-->

          <!-- order-history -->
          <div class="order-history" style="display:none;">
            <h3><i class="icon-user color"></i> &nbsp;<?php echo $client_dashboard_ohistory; ?></h3>
            <hr>
            <table class="table table-striped tcart">
               <thead>
                 <tr>
                   <th><?php echo $client_dashboard_date;?></th>
                   <th><?php echo $client_dashboard_ithumbnail;?></th>
                   <th><?php echo $client_dashboard_imgid; ?></th>
                   <th><?php echo $client_dashboard_price; ?></th>
                   <th><?php echo $client_dashboard_status; ?></th>
                 </tr>
               </thead>
               <tbody>
                 <tr>
                   <td>25-08-12</td>
                   <td class="ps-img"><a href="product_detail.php"><img alt="" src="themes/images/cart/1.jpg"></a></td>
                   <td>4423</td>
                   <td>$530</td>
                   <td>Completed</td>
                 </tr>
                 <tr>
                   <td>15-02-12</td>
                   <td class="ps-img"><a href="product_detail.php"><img alt="" src="themes/images/cart/5.jpg"></a></td>
                   <td>6643</td>
                   <td>$330</td>
                   <td>Shipped</td>
                 </tr>
                 <tr>
                   <td>14-08-12</td>
                   <td class="ps-img"><a href="product_detail.php"><img alt="" src="themes/images/cart/3.jpg"></a></td>
                   <td>1283</td>
                   <td>$230</td>
                   <td>Processing</td>
                 </tr>                                               
               </tbody>
            </table>
          </div>
          <!-- order-history ends --> 

          <!-- edit-profile -->
          <div class="edit-profile" style="display:none;">
            <h3><i class="icon-edit color"></i> &nbsp;<?php echo $client_dashboard_eprofile; ?></h3>
                  <hr>
            <form action="#" method="post" class="form-stacked">
              <fieldset>
                <div class="control-group">
                  <label class="control-label"><?php echo $name; ?></label>
                  <div class="controls">
                    <input type="text" class="input-xlarge">
                  </div>
                </div>
                <!--/control-group-->
                <div class="control-group">
                  <label class="control-label"><?php echo $register_left_companyname; ?></label>
                  <div class="controls">
                    <input type="text" class="input-xlarge">
                  </div>
                </div>
                <!--/control-group-->
                <div class="control-group">
                  <label class="control-label"><?php echo $phone; ?></label>
                  <div class="controls">
                    <input type="text" class="input-xlarge">
                  </div>
                </div>
                <!--/control-group-->                             
                <div class="actions"><input tabindex="9" class="btn btn-inverse btn-signin" type="submit" value="<?php echo $save_btn; ?>"></div>
              </fieldset>
            </form> 
          </div>
          <!-- edit-profile ends --> 

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
                  <label class="control-label"><?php echo $retype.' '.$password ?></label>
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

        <!--/account info-->
        </div>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">
$(function() {
  $('ul.nav a').click(function(){
      var show = $(this).attr('id');
      
      $('div.sec-span > div').hide();
      $('div.sec-span > div.'+show).show();
  });
});
</script>