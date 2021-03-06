<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $site_title;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content=" Kwaai-Images is an Amsterdam based Microstock photography company (Low priced and inclusive stock photography) for images, sketches and paintings. This platform is build for professionals and amateurs, to upload, sale and resale pictures and sketches. ">
<meta name="keywords" content="">
<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
<!-- bootstrap -->
<link href="<?php echo site_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo site_url();?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="<?php echo site_url();?>themes/css/bootstrappage.css" rel="stylesheet"/>
<link href="<?php echo site_url();?>themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:300|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'> !-->
<!-- global styles -->
<link href="<?php echo site_url();?>themes/css/flexslider.css" rel="stylesheet"/>
<link href="<?php echo site_url();?>themes/css/main.css" rel="stylesheet"/>

<!-- scripts -->
	<script src="<?php echo site_url();?>themes/js/jquery-1.7.2.min.js"></script>
    <script src="<?php echo site_url();?>bootstrap/js/bootstrap.min.js"></script>       
    <script src="<?php echo site_url();?>themes/js/superfish.js"></script>  
    <script src="<?php echo site_url();?>themes/js/jquery.scrolltotop.js"></script>
    <script src="<?php echo site_url();?>themes/js/jquery.fancybox.js"></script>
<!--[if lt IE 9]>     
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="top-bar" class="container">
  <?php $lang = $this->session->userdata('lang_arr'); ?>
  <div class="row">
    <div class="span8 pull-right">
      <!--language n currency selection-->
      <div class="language pull-right">
        <ul class="user-lang">
          <li>
          <label>   
            <select class="country">
              <?php foreach ($languages as $language) {
                ?>
                  <option value ="<?php echo $language->LangCode; ?>"<?php if($language->LangCode==$lang){
                    echo "selected=selected";} ?>><?php echo $language->LangName; ?>
                  </option>
                <?php
                
              }?>
            </select>
            </label>
          </li>
          <span style="color:#808080">|</span>
          <li>
          <label>
            <select class="currency">
            <option>&euro; Euro</option>
              <option>&pound; GBP</option>
              <option>$ Dollar </option>
              <option>&yen; Yen</option>
            </select>
            </label>
          </li>
        </ul>
      </div>
       <!--end of language n currency selection-->
    </div>
    <div class="span6 pull-right">
      <div class="account pull-right">
        <ul class="user-menu">
          <li class="">
            <?php if($this->session->userdata('signed_in')):
                      $session_data = $this->session->userdata('signed_in');
                  endif;
            ?>
           
             <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span><?php echo $sign_in;?></span></a>
             <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="signin" aria-hidden="false" >
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3>Sign in</h3>
                  </div>
                  <div class="modal-body">
                    <form action="<?php echo site_url().'front/login' ?>" method="post" style:"margin:0">
                      <input type="hidden" name="next" value="/">
                      <fieldset>
                        <div class="control-group">
                          <label class="control-label">Email</label>
                          <div class="controls">
                            <input type="text" placeholder="Enter your email" id="email" name="email" class="input-xlarge">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label">Password</label>
                          <div class="controls">
                            <input type="password" placeholder="Enter your password" id="password" name="password" class="input-xlarge">
                          </div>
                        </div>
                        <div class="control-group">
                          <input tabindex="3" class="btn btn-inverse btn-signin" type="submit" name="submit" value="Sign into your account">
                        </div>
                        <div class="control-group">
                          <label>Don't have an account?<a href="register.php">Sign up for free</a>
                          </label>
                        </div>
                      </fieldset>
                    </form>     		
                  </div>
             </div>
         
          </li>
          <span>|</span>
          <li class="">
             <?php //if($session_data['email']){ ?>
               <!--  <a href="<?php //echo site_url().'dashboard';?>"><span><?php //echo 'Dashboard';?></span></a> -->
             <?php //} else{ ?>
                <a href="<?php echo site_url().'register';?>"><span><?php echo $register;?></span></a>
             <?php //}?>
 		      </li>
          <li>
            <a href="<?php echo site_url().'cart';?>"><?php echo $shopping_baskets;?></a>
            <span class="s-basket"><p><?php echo count($this->cart->contents()).' item';?></p></span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div><!---/top bar---->
<div id="wrapper" class="container">
   <section class="navbar main-menu">
    <div class="navbar-inner main-menu"> <a href="<?php echo site_url();?>" class="logo pull-left"><img src="<?php echo site_url();?>/themes/images/kwaai-logo.png" class="site_logo" alt="The Creative Company | Kwaai-Images.com"></a>
      <nav id="menu" class="pull-right">
        <ul>
         
          <li><a href="<?php echo site_url();?>"><?php echo $lang=='en'?'Home':($lang=='nl'?'huis':'家');?></a></li>
          <?php 
          if(is_array($pages)>0):
            foreach($pages as $page){
             echo "<li><a href=$page->PageSlug>$page->PageTitle</a></li>";
            }
          endif;
		  if(is_array($categories)>0):
		  	$cat = '';
            foreach($categories as $category){
              $cat .= "<li><a href='".site_url()."category/$category->CategoryName'>".$this->front_model->format_data($category->CategoryName)."</a></li>";
			} 
		  endif;
	 	?>
          <li><a href="<?php echo site_url().'category';?>"><?php echo $lang=='en'?'Category':($lang=='nl'?'categorie':'類別');?></a><ul><?php echo $cat;?></ul></li>
          <li><a href="<?php echo site_url().'subscription';?>"><?php echo $lang=='en'?'Subscription':($lang=='nl'?'abonnement':'訂閱');?></a></li>
          <li><a href="<?php echo site_url().'contact';?>"><?php echo $lang=='en'?'Contact Us':($lang=='nl'?'Contacteer ons':'聯繫我們');?></a></li>
        </ul>
      </nav>
    </div>
  </section><!----/main menu---->
  </div><!----./navigation---->
