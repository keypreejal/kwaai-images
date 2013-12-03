<footer>
<section id="footer-bar">
    <div class="container" style="background:none">
      <div class="span4">
        <h4>Kwaai Images</h4>
        <ul class="nav">
          <?php 
          //$selan = isset($_GET['lang'])==1?"?&lang=$_GET[lang]":'?&lang=en';
          if(is_array($fpages)>0):
            foreach($fpages as $fpage){
             echo "<li><a href=$fpage->PageSlug>$fpage->PageTitle</a></li>";
            }
          endif;
          ?>
        </ul>
      </div>
      <div class="span2">
        <h4><?php echo $my_account_head;?></h4>
        <ul class="nav  nowidth">
          <li><a href="#"><?php echo $my_account_head;?></a></li>
          <li><a href="#"><?php echo $sign_in;?></a></li>
          <li><a href="register.php"><?php echo $my_account_sign_up_free;?></a></li>
        </ul>
      </div>
      <div class="span2">
        <h4><?php echo $need_help;?></h4>
        <ul class="nav  nowidth">
          <li><a href="<?php echo site_url().'contact';?>"><?php echo $need_help_contact_us;?></a></li>
          <li><a href="<?php echo site_url().'faqs.html';?>"><?php echo $need_help_faqs?></a></li>
          <li><a href="<?php echo site_url().'sitemap';?>"><?php echo $need_help_site_map;?></a></li>
        </ul>
      </div>
      <div class="span2 foot-last">
        <p style="float:left; font-size:13px; font-weight:bold; color:#fff; line-height:29px; "><?php echo $follow_us;?></p>
        <span class="social_icons"> <a target="_blank" class="facebook" href="<?php echo $facebook;?>"><i class="icon-facebook"></i></a> <a class="twitter" href="<?php echo $twitter;?>"><i class="icon-twitter"></i></a> <a class="google" target="_blank" href="<?php echo $gplus;?>"><i class="icon-google-plus"></i></a> </span> </div>
        <a href="#"><img src="<?php echo site_url();?>themes/images/paypao.jpg" width="174" height="53"  alt="paypal" align="right"></a>
    </div>
  </section>
  
  <section id="copyright"> <div class="container"><span><?php echo $all_right_reserve;?></span> <span class="pull-right"><a href="#"><img src="<?php echo site_url();?>themes/images/truste.jpg" width="137" height="45" alt="truste"></a></span></div></section>
  </footer><!---f/ooter !-->
</body>
</html>
<script src="<?php echo site_url();?>themes/js/common.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
	
	$('select.country').live('change',function(){
    langCode = $(this).val();
	  data = 'language='+langCode;
	  $.post('<?php echo base_url(); ?>setlang',data,function(res){
      if(res==1){
        window.location.href = '<?php echo current_url(); ?>';
      }
    });
	 });
});
</script>