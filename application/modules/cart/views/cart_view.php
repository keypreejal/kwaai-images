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
				<h2 class="titles"><i class="icon-shopping-cart color"></i> <span class="text">View Cart</span></h2>				
				<table class="table table-striped k-table">
					<thead>
						<tr>
							<th>Remove</th>
							<th>Image Thumbnail</th>
							<th>Image ID</th>
							<th>Image Size</th>
							<th>Price</th>
							
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><input type="checkbox" value="option1"></td>
							<td><a href="product_detail.php"><img alt="" src="themes/images/cart/2.jpg"></a></td>
							<td>000111</td>
							<td>
								<select class="i_size">
									<option>Standard XS</option>
									<option>Standard S</option>
									<option>Standard M</option>
									<option>Standard L</option>
									<option>Standard XL</option>
								</select>
							</td>
							<td>$2,350.00</td>
							
						</tr>			  
						<tr>
							<td><input type="checkbox" value="option1"></td>
							<td><a href="product_detail.php"><img alt="" src="themes/images/cart/1.jpg"></a></td>
							<td>003333</td>
							<td>
								<select class="i_size">
									<option>Standard XS</option>
									<option>Standard S</option>
									<option>Standard M</option>
									<option>Standard L</option>
									<option>Standard XL</option>
								</select>
							</td>
							<td>$1,150.00</td>
							
						</tr>
						<tr>
							<td><input type="checkbox" value="option1"></td>
							<td><a href="product_detail.php"><img alt="" src="themes/images/cart/3.jpg"></a></td>
							<td>002222</td>
							<td>
								<select class="i_size">
									<option>Standard XS</option>
									<option>Standard S</option>
									<option>Standard M</option>
									<option>Standard L</option>
									<option>Standard XL</option>
								</select>
							</td>
							<td>$1,210.00</td>
							
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td style="text-align:right; font-weight:bold; padding-right:20px">Total</td>
							
							<td><strong>$3,600.00</strong></td>
						</tr>		  
					</tbody>
				</table>

				<p class="cart-total right">
					<strong>Sub-Total</strong>:	$100.00<br>
					<strong>Eco Tax (-2.00)</strong>: $2.00<br>
					<strong>VAT (17.5%)</strong>: $17.50<br>
					<strong>Total</strong>: $119.50<br>
				</p>
				<hr/>
				<p class="buttons center">				
					<button class="btn" type="button" id="update">Update</button>
					<button class="btn" type="button" id="continue">Continue</button>
					<button class="btn btn-inverse" type="submit" id="checkout">Checkout</button>
				</p>					
			</div>
		</div>
	</section>
</div>