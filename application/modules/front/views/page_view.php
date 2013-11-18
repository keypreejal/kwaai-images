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
				<!--sidebar-->
			    <div id="sidebar" class="span3 side-sec">
			      	<div class="sidey">
			      		 <?php
			      		  if(is_array($sidepages)>0):
			      		  	echo "<ul class='nav'>";
			      		  				      		  		
					            foreach($sidepages as $sidepage){
					             echo "<li><a href=$sidepage->PageSlug>$sidepage->PageTitle</a></li>";
					            }
				            echo "</ul>";
				          endif;?>
			        </div>
			    </div>
   				<!-- Sidebar end=============================================== -->    
    			<div class="span7 sec-span">
                  <h2 class="titles"><span class="text"><?php echo $content->PageTitle;?></span></h2>
                  <?php if($content->FeatureImage) { ?>
						<img class="pageBanner" src="<?php echo site_url().'featureImg/'.$content->FeatureImage;?>" alt="New products" >
				  <?php } ?>
                  <div class="text-area">
                  	<?php echo $content->PageContent;?>
                  </div>

                  	<?php if(is_array($scontents)>0) :
                  			$subpage = '';
                  			foreach($scontents as $scontent){
                  		   	$subpage .="<div class='accordion-group'>
									  <div class='accordion-heading'>
										<h4><a class='accordion-toggle collapsed' data-toggle='collapse' data-parent='#accordion2' href=#$scontent->SPageId>$scontent->SPageTitle</a></h4>
									  </div>
									  <div id=$scontent->SPageId class='accordion-body collapse'>
										<div class='accordion-inner'>
											$scontent->SPageContent;
										</div>
									  </div>
									</div>
								";
                  		   }
                  	?>
		                  	<div class='accordion' id='accordion2'>
                            	<?php echo $subpage;?>
					        </div>
			    	<?php endif; ?>

               	</div>
               <!--/account info-->
			</div>
					
		</div>
	</section>
</div>
<script type="text/javascript">
$(function(){
	$curlocation = $(location).attr('href');
	//alert($curlocation);
	$('ul.nav>li a').each(function(){
		if($(this).attr('href') == $curlocation) {
			$(this).parent().addClass('active');
		}
	});
});
</script>