
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

                        <div class="dashboard_report first activeState">
                            <div class="pad">
                                <span class="value">USER</span>
                                ADD NEW USER
                            </div>
                            <!-- .pad --> </div>
                        <div class="dashboard_report defaultState">
                            <div class="pad">
                                <span class="value">USER</span>
                                LIST USER
                            </div>
                            <!-- .pad --> </div>

                        <div class="dashboard_report defaultState">
                            <div class="pad">
                                <span class="value">MAP</span>
                                ADD NEW MAP
                            </div>
                            <!-- .pad --> </div>
                        <div class="dashboard_report defaultState">
                            <div class="pad">
                                <span class="value">MAP</span>
                                LIST AVAILABLE MAP
                            </div>
                            <!-- .pad --> </div>

                    </div>
                    <!-- .widget-content --> </div>
                <!-- .widget --> </div>
            <!-- .grid --> </div>
        <!-- .container --> </div>
    <!-- #content -->    