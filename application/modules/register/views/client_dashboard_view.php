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
        <h2 class="titles"><i class="icon-user color"></i> <span class="text">My Account</span></h2>        

        <!--sidebar-->
        <div id="sidebar" class="span3 side-sec">
          <div class="sidey">
            <ul class="nav">
               <li><a href="myaccount.php">My Account</a></li>
               <li><a href="orderhistory.php">Order History</a></li>                         
               <li><a href="editprofile.php">Edit Profile</a></li>
               <li><a href="password.php">Change Password</a></li>
            </ul>
          </div>
        </div>
        <!-- Sidebar end=============================================== -->

        <div class="span7 sec-span">
          <h3><i class="icon-user color"></i> &nbsp;My Account</h3>
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
                   
          <h3>My Recent Purchases</h3>
          <hr>
           <table class="table table-striped tcart">
             <thead>
               <tr>
                 <th>Date</th>
                 <th>Image Thumbnail</th>
                 <th>Image ID</th>
                 <th>Price</th>
                 <th>Status</th>
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
        <!--/account info-->
      </div>
    </div>
  </section>
</div>
 