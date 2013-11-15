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
        <div class="span4" style="margin-left:0; ">         
          <h2 class="titles"><span class="text">Tell us about yourself</h2> 
          <form action="<?php echo site_url();?>register/user" method="post" class="form-stacked">
            <p>You are primarily purchasing content for?</p>  
            <fieldset>
              <div class="control-group">
                <div class="controls">
                  <input type="radio" name="user-type" class="input-radio" value="client" checked="true">
                  <label class="control-label">I'm signing up to become Your Client</label>
                </div>
              </div>
              <!--/control-group-->
               <div class="control-group">
                 <div class="controls">
                  <input type="radio" name="user-type" class="input-radio" value="contributor">
                  <label class="control-label">I'm signing up to become Kwaai Images Contributor</label>
                </div>
                </div>
              <!--/control-group-->
              <div class="actions">
                <input type="submit" name="submit"class="btn btn-inverse btn-signin" value="Join">
              </div>
            </fieldset>
          </form>         
        </div>
      </div>      
    </div>
  </section>      
</div><!---/main container-->

<script type="text/javascript">
  $(function(){
    $('input [name="user-type"]').click(function(){
      if($('input [name="user-type"]').is(':checked')){
       $('input [name="user-type"]').attr('disabled' , true) 
      }
    });
  });
</script>