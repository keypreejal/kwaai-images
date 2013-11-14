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
        <h2 class="titles"><span class="text">Subscriptions</h2> 
        <h3>Build your own Subscription plans</h3>
        <div class="row feature_box">
          <div class="span3">
            <div class="subscription">
              <div class="one"> 
                <h2 class="titles"><span class="texzt">Silver</span></h2>
                <span class="n-big">&euro; 200</span>
                <p>Space for 1GB</p>
                <a class="btn btn-primary" href="#">BUY</a>
              </div>
            </div>
          </div>
          <div class="span3">
            <div class="subscription">
              <div class="two"> 
                <h2 class="titles"><span class="text">Gold</span></h2>
                <span class="n-big">&euro; 200</span>
                <p>Space for 2GB</p>
                <a class="btn btn-primary" href="#">BUY</a>
              </div>
            </div>
          </div>
          <div class="span3">
            <div class="subscription">
              <div class="three"> 
                <h2 class="titles"><span class="text">Platinum</span></h2>
                <span class="n-big">&euro; 200</span>
                <p>Space for 3GB</p>
                <a class="btn btn-primary" href="#">BUY</a>
              </div>
            </div>
          </div>
        </div>
      <!--/feature box-->
      </div>      
    </div>
  </section>      
</div><!---/main container--->