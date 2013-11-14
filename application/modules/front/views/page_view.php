<div id="search">
  <div  id="wrapper" class="container">
    <div class="navbar-inner">
      <form class="form-inline navbar-search" method="post" action="products.html" >
        <label>
          <input id="srchFld" class="srchTxt" type="text" placeholder="Enter Keyword(s)" style="border:none; background-color:#f1f1f1" />
          <button type="submit" id="submitButton" class="btn btn-primary">Search</button>
        </label>
		<ul id="search-box">
          <li><a class="t-grey">Category Search<i class="icon-caret-down"></i></a>
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
			      		  if(is_array($fpages)>0):
			      		  	echo "<ul class='nav'>";
			      		  		$selan = isset($_GET['lang'])==1?"?&lang=$_GET[lang]":'?&lang=en';
					            foreach($fpages as $fpage){
					             echo "<li><a href=$fpage->PageSlug$selan>$fpage->PageTitle</a></li>";
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
               	</div>
               <!--/account info-->
			</div>
					
		</div>
	</section>
</div>