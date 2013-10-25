

<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

  <title> Admin - Login</title>

  <meta charset="utf-8" />
  <meta name="description" content="" />
  <meta name="author" content="" />   
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>./stylesheets/reset.css" type="text/css" media="screen" title="no title" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>./stylesheets/text.css" type="text/css" media="screen" title="no title" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>./stylesheets/buttons.css" type="text/css" media="screen" title="no title" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>./stylesheets/theme-default.css" type="text/css" media="screen" title="no title" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>./stylesheets/login.css" type="text/css" media="screen" title="no title" />
</head>

<body>

<div id="login">
  <h1>App Login</h1>
  <?php 
    $error = $this->session->flashdata('invalidlogin');
    if(!empty($error)): ?>
    <div class="errinvalid">
      <?php echo $error ?>
    </div>
  <?php endif; ?>
  <div id="login_panel">
    <form action="<?php echo base_url(); ?>admin/verifyLogin" method="post" accept-charset="utf-8">   
      <div class="login_fields">
        <div class="field">
          <label for="email">Email</label>
          <input type="text" name="email" value="<?php echo set_value('email') ?>" id="email" tabindex="1" placeholder="email@example.com" />
          <?php if(form_error('email')): ?>
          <div class="erruser"><?php echo form_error('email') ?></div>  
          <?php endif; ?> 
        </div>
        
        <div class="field">
          <label for="password">Password <small><a href="javascript:;">Forgot Password?</a></small></label>
          <input type="password" name="password" value="<?php echo set_value('password') ?>" id="password" tabindex="2" placeholder="password" />
          <?php if(form_error('password')): ?>
          <div class="errpass"><?php echo form_error('password') ?></div>  
          <?php endif; ?>    
        </div>
      </div> <!-- .login_fields -->
      
      <div class="login_actions">
        <button type="submit" class="btn btn-primary" tabindex="3">Login</button>
      </div>
    </form>
  </div> <!-- #login_panel -->    
</div> <!-- #login -->

<script src="<?php echo base_url(); ?>javascripts/all.js"></script>


</body>
</html>