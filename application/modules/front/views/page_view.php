<div id="search">
  <div  id="wrapper" class="container">
    <div class="navbar-inner">
      <form class="form-inline navbar-search" method="post" action="products.html" >
        <label>
          <input id="srchFld" class="srchTxt" type="text" placeholder="Enter Keyword(s)" style="border:none; background-color:#f1f1f1" />
          <button type="submit" id="submitButton" class="btn btn-primary">Search</button>
        </label>

        <select class="srchTxt" style="width:auto; color:#000;  border:none; background:none">
          <option>Category Search</option>
          <?php 
            foreach($categories as $category){
              echo "<option value=imageslist/category/".intval($category->CatId).">".$this->front_model->format_data($category->CategoryName)."</option>";         
            } ?>
        </select>
      </form>
    </div>
  </div>
</div>
<div id="wrapper" class="container">
	<section class="header_text sub">
	<?php if($content->FeatureImage) { ?>
		<img class="pageBanner" src="<?php echo site_url().'featureImg/'.$content->FeatureImage;?>" alt="New products" >
	<?php } ?>
	
	</section>			
	<section class="main-content">				
		<div class="row">
			<div class="span10">					
				<h4 class="title"><span class="text pull-left"><strong><?php echo $content->PageTitle;?>, </strong> Kwaai-Images.com</span></h4>
				<p><?php echo $content->PageContent;?></p>	
			</div>
				
		</div>
	</section>	
</div>		