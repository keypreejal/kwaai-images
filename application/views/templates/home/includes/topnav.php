 <div id="topNav">
         <ul>
            <li>
               <a href="javascript:void">
                Welcome 
                    <?php if($this->session->userdata('logged_in')):
                                    $session_data=$this->session->userdata('logged_in');
                                    echo ' '.$session_data['username'];
                    endif;
                     ?>
               </a>
                
                <!-- <div id="menuProfile" class="menu-container menu-dropdown">
                    <div class="menu-content">
                        <ul class="">
                            <li><a href="javascript:;">Edit Profile</a></li>
                            <li><a href="javascript:;">Edit Settings</a></li>
                            <li><a href="javascript:;">Suspend Account</a></li>
                        </ul>
                    </div>
                </div> -->
            </li>
            <!-- <li><a href="javascript:;">Upgrade</a></li> -->
            <li><a href="<?php echo base_url(); ?>home/logout">Logout</a></li>
         </ul>
    </div> <!-- #topNav -->