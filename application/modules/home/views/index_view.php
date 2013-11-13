
     <div id="content">

        <div id="contentHeader">
            <h1>Dashboard</h1>
        </div>
        <!-- #contentHeader -->    

        <div class="container">
			 <?php 
				$msg = $this->session->flashdata('successMsg');
				if(!empty($msg)): ?>
				<div class="errinvalid">
				  <?php echo $msg ?>
				</div>
			  <?php endif; ?>
            <div class="grid-18">

                <div class="widget widget-plain">

                    <div class="widget-content">

                        <h2 class="dashboard_title">
                            PANEL SHORTCUTS
                            <span></span>
                        </h2>

                        <div class="dashboard_report first defaultState">
                            <div class="sub">
                               <a href="#"> <span class="value">SUBSCRIPTION</span>
                                List Subscriber</a>
                            </div>
                            <!-- .pad --> </div>
                        <div class="dashboard_report defaultState">
                            <div class="cat">
                               <a href="<?php echo site_url();?>admin/categories/aeddCategories"><span class="value">CATEGORY</span>
                                Add Category </a>
                            </div>
                            <!-- .pad --> </div>

                        <div class="dashboard_report defaultState">
                            <div class="scat">
                               <a href="<?php echo site_url();?>admin/categories/aeddSCategories"> <span class="value">SUBCATEGORY</span>
                                Add New SubCategory</a>
                            </div>
                            <!-- .pad --> </div>

                        <div class="dashboard_report defaultState">
                            <div class="slider">
                               <a href="<?php echo site_url();?>admin/slider/addSlides"> <span class="value">SLIDER</span>
                                Add New Slider</a>
                            </div>
                            <!-- .pad --> </div>
                        
                    </div>
                    <!-- .widget-content --> </div>
                <!-- .widget --> </div>
            <!-- .grid --> </div>
        <!-- .container --> </div>
    <!-- #content -->    