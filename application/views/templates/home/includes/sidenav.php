    <div id="sidebar">      
        <ul id="mainNav">           
            <li id="navDashboard" class="nav active">
                <span class="icon-home"></span>
                <a href="<?php echo base_url(); ?>home">Dashboard</a>                
            </li>
                         
            <li id="navPages" class="nav">
                <span class="icon-image"></span>
                <a href="javascript:;">Feature Image Slider</a>             
                <ul class="subNav">
                  <li><a href="<?php echo base_url(); ?>admin/slider/addSlides">Add Slides</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/slider">List Slider Images</a></li>
                </ul>                       
            </li>
            <li id="navPages" class="nav">
                <span class="icon-award-fill"></span>
                <a href="javascript:;">Subscriber</a>             
                <ul class="subNav">
                   <li><a href="<?php echo base_url(); ?>users">List User</a></li>
                </ul>                       
            </li>   
            <li id="navPages" class="nav">
                <span class="icon-book-alt"></span>
                <a href="javascript:;">Cms Pages</a>             
                <ul class="subNav">
                  <li><a href="<?php echo base_url(); ?>admin/cms/aeddPages">Add Pages</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/cms">List Pages</a></li>
                </ul>                       
            </li>  
            <li id="navPages" class="nav">
                <span class="icon-star"></span>
                <a href="javascript:;">Categories</a>             
                <ul class="subNav">
                  <li><a href="<?php echo base_url(); ?>admin/categories/aeddCategories">Add Categories</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/categories">List Categories</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/categories/aeddSCategories">Add SubCategories</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/categories/subCategories">List SubCategories</a></li>
                </ul>                       
            </li> 
            <li id="navPages" class="nav">
                <span class="icon-box"></span>
                <a href="javascript:;">Orientation</a>             
                <ul class="subNav">
                  <li><a href="<?php echo base_url(); ?>admin/orientation/aeddOrientation">Add Orientation</a></li>
                   <li><a href="<?php echo base_url(); ?>admin/orientation">List Orientation</a></li>
                </ul>                       
            </li>
            <li id="navPages" class="nav">
                <span class="icon-link"></span>
                <a href="javascript:;">Social Links</a>             
                <ul class="subNav">
                  <li><a href="<?php echo base_url(); ?>admin/links/aeddLinks">Add Links</a></li>
                   <li><a href="<?php echo base_url(); ?>admin/links">List Links</a></li>
                </ul>                       
            </li>                 
            <li id="navPages" class="nav">
                <span class="icon-user"></span>
                <a href="javascript:;">Account</a>             
                <ul class="subNav">
                    <li><a href="<?php echo base_url(); ?>admin/changePassword">Change Password</a></li>
                   
                </ul>                       
            </li>   
        </ul>
    </div> <!-- #sidebar -->
