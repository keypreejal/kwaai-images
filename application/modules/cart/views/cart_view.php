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
				<h2 class="ttls"><i class="icon-shopping-cart color"></i> <span class="text">View Cart</span></h2>				
				<?php if ($cart = $this->cart->contents()): ?>
				<table class="table table-striped k-table">
					<thead>
						<tr>
							<th>Remove</th>
							<th>Image Thumbnail</th>
							<th>Image ID</th>
							<th>Image Title</th>
							<th>Price</th>
							
						</tr>
					</thead>
					<tbody>
					<?php 
					foreach ($cart as $item): ?>
						<tr>
							<td><input type="checkbox" value="option1"></td>
							<td><a href="product_detail.php"><img alt="" src="<?php echo site_url().'uploads/'.$item['profileid'].'/'.$item['code'].'/thumb/listing/'.$item['image'];?>"></a></td>
							<td><?php echo $item['code'];?></td>
							<td><?php echo $item['name']; ?></td>
							<td><?php echo $item['price']=='.999999'?'Free':'$'.$item['price'];?></td>
							
						</tr>		
						<?php endforeach; ?>	  
						  
					</tbody>
				</table>
				
				<p class="cart-total right">
					<strong>Sub-Total</strong>:	$ <?php echo $this->cart->total();?><br>
					<strong>Eco Tax (-2.00)</strong>: $2.00<br>
					<strong>VAT (17.5%)</strong>: $17.50<br>
					<strong>Total</strong>: $ <br>
				</p>
				<hr/>
				<p class="buttons center">				
					<!-- <button class="btn" type="button" id="update">Update</button> -->
					<button class="btn" type="button" id="continue">Continue</button>
					<button class="btn btn-inverse" type="submit" id="checkout">Checkout</button>
				</p>	
				<?php  else: ?>
				<div class="no-product-to-cart">
					<p>No product </p>
					<table class="table table-striped k-table">
						<thead>
							<tr>
								<th>Remove</th>
								<th>Image Thumbnail</th>
								<th>Image ID</th>
								<th>Image Title</th>
								<th>Price</th>
								
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
				<?php  endif;?>
			</div>
		</div>
	</section>
</div>