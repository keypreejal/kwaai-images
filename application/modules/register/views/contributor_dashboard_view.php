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
          <h2 class="titles"><span class="text"><a href="user-dash.php">My Dashboard:</a> User Name Display</h2>  
          <!--sidebar-->
          <div id="sidebar" class="span3 side-sec">
            <div class="sidey">
              <ul class="nav">                        
                 <li><a href="user-profile.php">Edit Profile</a></li>
                 <li><a href="payment-conf.php">Paypal Configuration</a></li>
                 <li><a href="user-password.php">Change Password</a></li>
              </ul>
            </div>
          </div>
          <!-- Sidebar end=============================================== -->
          <div class="span7 sec-span">
            <h3><i class="icon-user"></i>Kwaai Images</h3>
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
          </div>
          <!--/account info-->
      </div>
    </div>
  </section>
</div>