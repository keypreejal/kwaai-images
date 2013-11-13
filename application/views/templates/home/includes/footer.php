
</div> <!-- #wrapper -->
<div id="footer">
    Copyright &copy; 2013, Kwaai Image
</div>

<script src="<?php echo base_url(); ?>javascripts/all.js"></script>

<script type="text/javascript">
	
	var cur = "<?php echo $this->uri->segment(2); ?>";
	$('.nav').removeClass('active');
	$('#'+cur).addClass('active');
	if(cur ==''){
		$('#navDashboard').addClass('active');
	} 
</script>
</body>
</html>