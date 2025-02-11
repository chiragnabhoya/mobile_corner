<header class="header">
    <div class="logo-container">
        <div class="logo" >
            <h3 style="margin: 0px;margin-top: 5px;">Seller Department</h3>
        </div>
        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>
    <!-- start: search & user box -->
    
    
    <div class="header-right">
        
        <?php
        
        
        $wh['seller_id'] = $this->session->userdata('seller');
        $record = $this->md->my_select('tbl_seller','*',$wh);
        
        if ($record[0]->status==0)
        {
        ?>
        <div style="color: red; float: left; width: 300px; margin-top: 8px;">
            <marquee>This Acount is Not Verified. You Can Manage Product After verified By Admin.</marquee>
        </div>
        <?php
        }
        ?>
        
        <span class="separator"></span>

        
        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="<?php echo base_url().$record[0]->profile_pic; ?>" class="img-circle" data-lock-picture="assets/images/%21logged-user.jpg" />
                </figure>
                <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                    <span class="name"><?php echo $record[0]->company_name; ?></span>
                    
                    <span class="role"><i class="fa fa-clock-o"></i> <?php echo date('d-m-Y h:i:s',strtotime($record[0]->last_login));?></span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu"> 
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>seller-setting"><i class="fa fa-cog"></i> Setting</a>
                    </li>
                    
                    <li>
                        <a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>seller-logout"><i class="fa fa-power-off"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>