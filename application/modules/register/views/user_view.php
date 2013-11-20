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
        <div class="span4" style="margin-left:0; ">         
          <h2 class="titles"><span class="text"><?php echo $register_user_tell_us; ?></h2> 
          <form action="<?php echo site_url();?>register/user" method="post" class="form-stacked">
            <p><?php echo $register_user_purpose?></p>  
            <fieldset>
              <div class="control-group">
                <div class="controls">
                  <input type="radio" name="user-type" class="input-radio" value="client" checked="true">
                  <label class="control-label"><?php echo $register_user_client; ?></label>
                </div>
              </div>
              <!--/control-group-->
               <div class="control-group">
                 <div class="controls">
                  <input type="radio" name="user-type" class="input-radio" value="contributor">
                  <label class="control-label"><?php echo $register_user_contributor; ?></label>
                </div>
                </div>
              <!--/control-group-->
              <div class="actions">
                <input type="hidden" name="full_name" value="<?php echo $full_name;?>"></input>
                <input type="hidden" name="email_address" value="<?php echo $email_address;?>"></input>
                <input type="hidden" name="company_name" value="<?php echo $company_name;?>"></input>
                <input type="hidden" name="phone" value="<?php echo $phone;?>"></input>
                <input type="hidden" name="password" value="<?php echo $password;?>" style="display:none;"></input>
                <input type="submit" name="join"class="btn btn-inverse btn-signin" value="<?php echo $register_user_join; ?>">
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