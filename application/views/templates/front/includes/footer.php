<footer>
<section id="footer-bar">
    <div class="container" style="background:none">
      <div class="span4">
        <h4>Kwaai Images</h4>
        <ul class="nav">
          <?php 
          if(is_array($fpages)>0):
            foreach($fpages as $fpage){
             echo "<li><a href=$fpage->PageSlug>$fpage->PageTitle</a></li>";
            }
          endif;
          ?>
        </ul>
      </div>
      <div class="span2">
        <h4>My Account</h4>
        <ul class="nav  nowidth">
          <li><a href="#">My Account</a></li>
          <li><a href="#">Sign in</a></li>
          <li><a href="register.php">Sign up for free</a></li>
        </ul>
      </div>
      <div class="span2">
        <h4>Need Help?</h4>
        <ul class="nav  nowidth">
          <li><a href="#">Search tips &amp; tricks</a></li>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">Site map</a></li>
        </ul>
      </div>
      <div class="span2 foot-last">
        <p style="float:left; font-size:13px; font-weight:bold; color:#fff; line-height:29px; ">Follow us:</p>
        <span class="social_icons"> <a class="facebook" href="#"><i class="icon-facebook"></i></a> <a class="twitter" href="#"><i class="icon-twitter"></i></a> <a class="google" href="#"><i class="icon-google-plus"></i></a> </span> </div>
        <a href="#"><img src="themes/images/paypao.jpg" width="174" height="53"  alt="paypal" align="right"></a>
    </div>
  </section>
  
  <section id="copyright"> <div class="container"><span>All contents &copy; copyright 2013 Kwaai Images, Inc. All rights reserved.</span> <span class="pull-right"><a href="#"><img src="themes/images/truste.jpg" width="137" height="45" alt="truste"></a></span></div></section>
  </footer><!---f/ooter !-->

<script src="<?php echo site_url();?>themes/js/common.js"></script> 
<script src="<?php echo site_url();?>themes/js/jquery.flexslider-min.js"></script> 
<script type="text/javascript">
    $(function() {
      $(document).ready(function() {
        $('.flexslider').flexslider({
          animation: "fade",
          slideshowSpeed: 4000,
          animationSpeed: 600,
          controlNav: false,
          directionNav: true,
          controlsContainer: ".flex-container" // the container that holds the flexslider
        });
      });
    });
</script>