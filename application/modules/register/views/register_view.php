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

        <div class="span5 span5-box">          
          <h2 class="titles"><span class="text">Thanks for choosing Kwaai Images</span></h2>
          <p><strong>Everything you need</strong></p>
          <p>Kwaai-Images is an Amsterdam based Microstock photography company (Low priced and inclusive stock photography) for images, sketches and paintings. This platform is build for professionals and amateurs, to upload, sale and resale pictures and sketches. Particular for photographers and artist. You can upload and give the pictures a smile or more (rating) and give a short messages (what say people of this Image or Sketch) to the picture or sketch.</p>
        </div>
        <!-- /thanks -->

        <div class="span4" style="margin-left:0; ">          
          <h2 class="titles"><span class="text">Register Form</h2>  
          <form action="<?php echo site_url();?>register/user" method="post" class="form-stacked">
            <a class="a-singin" name="#login">Already a member? Sign in...</a>  
              <fieldset>
                <div class="control-group">
                  <label class="control-label">Full Name<span>*</span></label>
                  <div class="controls">
                    <input type="text" class="input-xxlarge">
                  </div>
                </div>
                <!--/control-group-->
                <div class="control-group">
                  <label class="control-label">Company Name</label>
                  <div class="controls">
                    <input type="text" class="input-xxlarge">
                  </div>
                </div>
                <!--/control-group-->
                <div class="control-group">
                  <label class="control-label">Phone<span>*</span></label>
                  <div class="controls">
                    <input type="text" class="input-xxlarge">
                  </div>
                </div>
                <!--/control-group-->
                <div class="control-group">
                  <label class="control-label">Email address<span>*</span></label>
                  <div class="controls">
                    <input type="password" class="input-xxlarge">
                  </div>
                </div>
                <!--/control-group-->
                <div class="control-group">
                  <label class="control-label">Password<span>*</span></label>
                  <div class="controls">
                    <input type="password" class="input-xxlarge">
                  </div>
                </div> 
                <!--/control-group-->  
                <div class="control-group">
                  <label class="control-label">Confirm Password<span>*</span></label>
                  <div class="controls">
                    <input type="password" class="input-xxlarge">
                  </div>
                </div> 
                <!--/control-group-->                                         
                <div class="control-group">
                  <label>(* required field...)</label>
                  <input type="checkbox" name="agreebox" style="float:left; margin-right:10px">
                    <label>I agree to the <a href="#">Terms of Service</a></label>
                </div>
                <!--/control-group-->
                <div class="actions"><input tabindex="9" class="btn btn-inverse btn-signin" type="submit" value="Create your account"></div>
              </fieldset>
          </form>         
        </div>
      </div>     
 </section>
</div><!---/main container-->