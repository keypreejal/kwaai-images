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

        <div class="span5 span5-box">          
          <?php echo $register_right_thanku;?>
        </div>
        <!-- /thanks -->

        <div class="span4" style="margin-left:0; ">          
          <h2 class="titles"><span class="text"><?php echo $register_left_ftitle;?></h2>  
          <form id="register-form" action="<?php echo site_url();?>register/user" method="post" class="form-stacked">
            <a class="a-singin" name="#login"><?php echo $register_left_amsignin;?></a>  
              <fieldset>
                <div class="control-group">
                  <label class="control-label"><?php echo $name;?><span>*</span></label>
                  <div class="controls">
                    <input type="text" name="full_name" class="input-xxlarge required">
                  </div>
                </div>
                <!--/control-group-->
                <div class="control-group">
                  <label class="control-label"><?php echo $register_left_companyname;?></label>
                  <div class="controls">
                    <input type="text" name="company_name" class="input-xxlarge ">
                  </div>
                </div>
                <!--/control-group-->
                <div class="control-group">
                  <label class="control-label"><?php echo $phone;?><span>*</span></label>
                  <div class="controls">
                    <input type="text" name="phone" class="input-xxlarge required">
                  </div>
                </div>
                <!--/control-group-->
                <div class="control-group">
                  <label class="control-label"><?php echo $email_address;?><span>*</span></label>
                  <div class="controls">
                    <input type="text" id="email_address" name="email_address" class="input-xxlarge required">
                  </div>
                </div>
                <!--/control-group-->
                <div class="control-group">
                  <label class="control-label"><?php echo $password;?><span>*</span></label>
                  <div class="controls">
                    <input type="password" name="password" class="input-xxlarge required">
                  </div>
                </div> 
                <!--/control-group-->  
                <div class="control-group">
                  <label class="control-label"><?php echo $cpassword;?><span>*</span></label>
                  <div class="controls">
                    <input type="password" name="cpassword" class="input-xxlarge required">
                  </div>
                </div> 
                <!--/control-group-->                                         
                <div class="control-group">
                  <label><?php echo $required;?></label>
                  <input type="checkbox" name="agreebox" id="agreebox"  style="float:left; margin-right:10px" value="">
                    <label><?php echo $agree;?> <a href="#"><?php echo $register_left_terms_of_service;?></a></label>
                </div>
                <!--/control-group-->
                <div class="actions">
                  <input type="submit" name="register" tabindex="9" class="btn btn-inverse btn-signin"  value="<?php echo $register_left_create_account;?>">
                </div>
              </fieldset>
          </form>         
        </div>
      </div>     
 </section>
</div><!---/main container-->
<script>
// $('form#register-form').submit(function(e){
//     e.preventDefault();
    
//     var error =0;
//     $('.required').each(function(){
//        if ($(this).val()==''){
//          error+=1;
//          $(this).attr("placeholder", "Required");
//          $(this).addClass('err');
//        }
//     });
//     var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
//     if( !emailReg.test( $('#email_address').val() ) ) {
//        $("#email_address").val('');
//        $("#email_address").focus();
//        $("#email_address").attr("placeholder", "Invalid Email");
//        return(false);
//     }
    
// });
</script>