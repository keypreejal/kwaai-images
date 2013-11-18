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
        <h2 class="titles"><span class="text"><?php echo $register_user_subscription; ?></h2>
        <h3><?php echo $register_user_subscription_plan; ?></h3>
        <div class="subscription">
          <table class="table table-striped shop_attributes tab-table">
              <tbody>
                <tr class="table-head">
                  <th><?php echo $register_user_subscription_tlbpackage; ?></th>
                  <th><?php echo $register_user_subscription_tlbsize; ?></th>
                  <th><?php echo $client_dashboard_price; ?></th>
                  <th><?php echo $register_user_subscription_tlbyear; ?></th>
                  <th style="text-align:right">Subscribe</th>
                </tr>
                <tr class="">
                  <td>Silver </td>
                  <td>1Gb</td>
                  <td>&pound; 100</td>
                  <td>1 Year</td>
                  <td style="text-align:right"><a href="<?php echo site_url().'register/package/s' ?>">Subscribe</a></td>
                </tr>
                <tr class="">
                  <td>Gold </td>
                  <td>3Gb</td>
                  <td>&pound; 250</td>
                  <td>1 Year</td>
                  <td style="text-align:right"><a href="<?php echo site_url().'register/package/g' ?>">Subscribe</a></td>
                </tr>
                <tr class="">
                  <td>Platinum </td>
                  <td>5Gb</td>
                  <td>&pound; 400</td>
                  <td>1 Year</td>
                  <td style="text-align:right"><a href="<?php echo site_url().'register/package/p' ?>">Subscribe</a></td>
                </tr>
              </tbody>
            </table>
        </div>
        <!--end of subscription box--> 
        <h2 class="titles"><span class="text">How do Kwaai Images subscription plans work?</span></h2>
        <p>Kwaai-Images is an Amsterdam based Microstock photography company (Low priced and inclusive stock photography) for images, sketches and paintings. This platform is build for professionals and amateurs, to upload, sale and resale pictures and sketches. Particular for photographers and artist. You can upload and give the pictures a smile or more (rating) and give a short messages (what say people of this Image or Sketch) to the picture or sketch.</p>
        <h3>Subscription options</h3>
        <p>Kwaai-Images is an Amsterdam based Microstock photography company (Low priced and inclusive stock photography) for images, sketches and paintings. This platform is build for professionals and amateurs, to upload, sale and resale pictures and sketches. Particular for photographers and artist. You can upload and give the pictures a smile or more (rating) and give a short messages (what say people of this Image or Sketch) to the picture or sketch.</p>
      </div>
    </div>
  </section>
</div>