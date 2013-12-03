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
      </section>
      <section class="main-content">        
        <div class="row"> 
        <h4><span>Contact Us</span></h4>      
          <div class="span5">
            <div>
              <?php echo $others;?>
            </div>
          </div>
          <div class="span5" style="margin-left:0">
            <?php if($this->session->flashdata('contact_msg')): ?>
                   <div class="notify notify-success">                        
                      <a class="close" href="javascript:;">×</a>                        
                      <h3><?php echo $this->session->flashdata('contact_msg');?></h3>                        
                  </div>
            <?php endif; ?>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            <form method="post" action="<?php echo site_url();?>contact" id="contact-form">
               <?php echo validation_errors(); ?>
              <fieldset>
                <div class="clearfix">
                  <label for="name"><span>Name:*</span></label>
                  <div class="input">
                    <input tabindex="1" size="18" id="name" name="name" type="text" value="<?php echo set_value('name');?>" class="input-xlarge required"  placeholder="Name">
                  </div>
                </div>
                
                <div class="clearfix">
                  <label for="email"><span>Email:*</span></label>
                  <div class="input">
                    <input tabindex="2" size="25" id="email" name="email" type="text" value="<?php echo set_value('email');?>" class="input-xlarge required" placeholder="Email Address">
                  </div>
                </div>
                
                <div class="clearfix">
                  <label for="message"><span>Message:*</span></label>
                  <div class="input">
                    <textarea tabindex="3" class="input-xlarge required" id="message" name="message" rows="7" placeholder="Message"><?php echo set_value('first_name');?></textarea>
                  </div>
                </div>
                 <span>
                    <label for="captcha"><span>Secuity Code:*</span></label> 
                    <div style="height:27px;width:75px;color:#ffffff;font-size:22px;font-family:Verdana, Geneva, sans-serif;background-color:#000000;"><?php echo $_SESSION['security_code'];?></div>
                    <input name="captcha" type="text" value="" class="required" id="captcha"/>
                </span>

                <div class="actions">
                 <!-- <button tabindex="3" type="submit" name="submit" class="btn btn-inverse"></button> !-->
                   <input type="submit" name="submit" class="btn btn-inverse" value="Send message">
                </div>
              </fieldset>
            </form>
          </div>        
        </div>
      </section>      
     <!-- <section class="google_map">
        <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=74%2F6+Nguy%E1%BB%85n+V%C4%83n+Tho%E1%BA%A1i,+S%C6%A1n+Tr%C3%A0,+%C4%90%C3%A0+N%E1%BA%B5ng,+Vi%E1%BB%87t+Nam&amp;aq=0&amp;oq=74%2F6+Nguyen+Van+Thoai+Da+Nang,+Viet+Nam&amp;sll=37.0625,-95.677068&amp;sspn=41.546728,79.013672&amp;ie=UTF8&amp;hq=&amp;hnear=74+Nguy%E1%BB%85n+V%C4%83n+Tho%E1%BA%A1i,+Ng%C5%A9+H%C3%A0nh+S%C6%A1n,+Da+Nang,+Vietnam&amp;t=m&amp;ll=16.064537,108.24151&amp;spn=0.032992,0.039396&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
      </section>  -->
</div>
<script>
$('form#contact-form').submit(function(){
    var error =0;
    $('.required').each(function(){
       if ($(this).val()==''){
         error++;
         $(this).attr("placeholder", "Required");
         $(this).addClass('err');
                   }
    });
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if( !emailReg.test( $('#email').val() ) ) {
       $("#email").val('');
       $("#email").focus();
       $("#email").attr("placeholder", "Invalid Email");
       error++;
       return false;
    }
    if(error > 0){
        return false;
     }else{
        captcha_code = $('#captcha').val();
        ajax_respo = $.ajax({
                        url:'<?php echo site_url('captcha/captcha_text.php');?>',
                        data: {"source":"contact"},
                        type:'POST',
                        async: false,
                        dataType:'html',
                        success: function(msg){
                           return true;
                        }
                      });
          if(captcha_code != ajax_respo['responseText']){
            $('#captcha').css('border','1px solid #f00');
            return false;
          }
     }
});
</script>

