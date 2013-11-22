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
            <?php echo validation_errors(); ?>
            <div class="form-error-wrap" style="display:none;"></div>
            <a class="a-singin" name="#login"><?php echo $register_left_amsignin;?></a>  
              <fieldset>
                <div class="control-group">
                  <label class="control-label"><?php echo $name;?><span>*</span></label>
                  <div class="controls">
                    <input type="text" name="full_name" class="input-xxlarge required" value="<?php echo set_value('full_name')?>">
                  </div>
                </div>
                <!--/control-group-->
                <div class="control-group">
                  <label class="control-label"><?php echo $register_left_companyname;?></label>
                  <div class="controls">
                    <input type="text" name="company_name" class="input-xxlarge " value="<?php echo set_value('full_name')?>">
                  </div>
                </div>
                <!--/control-group-->
                <div class="control-group">
                  <label class="control-label"><?php echo $phone;?><span>*</span></label>
                  <div class="controls">
                    <input type="text" name="phone" class="input-xxlarge required" value="<?php echo set_value('phone')?>">
                  </div>
                </div>
                <!--/control-group-->
                <div class="control-group">
                  <label class="control-label"><?php echo $email_address;?><span>*</span></label>
                  <div class="controls">
                    <input type="text" id="email_address" name="email_address" class="input-xxlarge required" value="<?php echo set_value('email_address')?>">
                  </div>
                </div>
                <!--/control-group-->
                <div class="control-group">
                  <label class="control-label"><?php echo $password;?><span>*</span></label>
                  <div class="controls">
                    <input type="password" name="password" class="input-xxlarge required" >
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
                  <label>Secuity Code<span>*</span></label>
                  <div style="height:27px;width:75px;color:#ffffff;font-size:22px;font-family:Verdana, Geneva, sans-serif;background-color:#000000;"><?php echo $_SESSION['security_code'];?></div>
                    <input name="captcha" type="text" value="" class="required" id="captcha"/>
                </div>
                <!--/control-group-->
                <!--/control-group-->                                         
                <div class="control-group">
                  <label><?php echo $required;?></label>
                  <input type="checkbox" name="agreebox" id="agreebox"  style="float:left; margin-right:10px" value="1">
                    <label><?php echo $agree;?> <a href="#"><?php echo $register_left_terms_of_service;?></a></label>
                </div>
                <!--/control-group-->
                <div class="actions">
                  <input name="isemailexist" value="0" id="isemailexist" type="hidden" />
                  <input type="submit" name="register" tabindex="9" class="btn btn-inverse btn-signin"  value="<?php echo $register_left_create_account;?>">
                </div>
              </fieldset>
          </form>         
        </div>
      </div>     
 </section>
</div><!---/main container-->
<script>
// $('document').ready(function(){
//   $('form#register-form').submit(function(){
//     var errs = 0,
//       ajax_respo = '',
//       err_msg = '',
//       cot_emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
//       captcha_code = $.trim($('#captcha').val());
      
      
//       var fname       = $(':input[name=full_name]'),
//           phone       = $(':input[name=phone]'),
//           email       = $(':input[name=email_address]'),
//           password    = $(':input[name=password]'),
//           cpassword   = $(':input[name=cpassword]'),
//           captcha     = $(':input[name=captcha]'),
//           term        = $(':input[name=agreebox]').val();
      
//       if(fname.val().length < 5){
//         fname.closest('div.control-group').find('label').addClass('error');
//         fname.addClass('input-focus');
//         err_msg += '<li>Username must be at least 5 characters.</li>';
//         errs++;
//       }
      
//       if(email.val().length < 1){
//         email.closest('div.control-group').find('label').addClass('error');
//         email.addClass('input-focus');
//         err_msg += '<li>Please provide your Email</li>';
//         errs++;
//       }else{
//         if(!(email.val().match(cot_emailReg))){
//           email.closest('div.control-group').find('label').addClass('error');
//           email.addClass('input-focus');
//           err_msg += '<li>Please provide valid Email.</li>';
//           errs++; 
//         }
//       }

      
      
//       if(password.val().length < 5){
//         password.closest('div.control-group').find('label').addClass('error');
//         password.addClass('input-focus');
//         err_msg += '<li>Password must be at least 5 characters.</li>';
//         errs++;
//       }
      
//       if(cpassword.val().length < 1){
//         cpassword.closest('div.control-group').find('label').addClass('error');
//         cpassword.addClass('input-focus');
//         err_msg += '<li>Please confirm your password</li>';
//         errs++;
//       }
      
//       if(captcha_code.length < 1){
//         captcha.closest('div.control-group').find('label').addClass('error');
//         captcha.addClass('input-focus');
//         err_msg += '<li>Please enter security code</li>';
//         errs++;
//       }
      
//       if(password.val() != cpassword.val()){
//           err_msg += '<li>Confirm password doesn\'t match</li>';
//           $('form#register-form div.form-error-wrap').html('<ul>'+err_msg+'</ul>').fadeIn('slow');  
//           errs++;    
//       }
           
//      if(!$('#agreebox').attr('checked')){
//         err_msg += '<li>You must accept terms and conditions.</li>';
//         $('form#register-form div.form-error-wrap').html('<ul>'+err_msg+'</ul>').fadeIn('slow');  
//         errs++;
//      }

//     if(err_msg.length > 0){
//       $('form#register-form div.form-error-wrap').html('<ul>'+err_msg+'</ul>').fadeIn('slow');
      
//     }
      
//     if(errs > 0){
//       $('html, body').animate({scrollTop:250}, 'slow');
//       return false;
//     }else{      
//         captcha_code = $('#captcha').val();
//         ajax_respo = $.ajax({
//             url:'<?php echo site_url('captcha/captcha_text.php');?>',
//             data: {"source":"contact"},
//             type:'POST',
//             async: false,
//             dataType:'html',
//             success: function(msg){
//               return true;
//             }
//           });
//         if(captcha_code != ajax_respo['responseText']){
//           err_msg += '<li>Invalid security code.</li>';
//           $('form#register-form div.form-error-wrap').html('<ul>'+err_msg+'</ul>').fadeIn('slow');  
//           $('html, body').animate({scrollTop:250}, 'slow');
//           return false;
//         }
//     }
//   });
  
//   $('#email_address').change(function(e){
//       e.preventDefault();
//       email = $(this).val();
//       $.ajax({
//         type  :"post",
//         url   :'<?php echo site_url('register/isEmailExist');?>',
//         data  :{"email":email},
//         success:function(data) {   
//            if(data !=''){
//               alert(data);
//            }
//         }
//       });  
//     });

    
 

// });


</script>