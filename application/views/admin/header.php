<header class="header">
    <div class="logo-container">
        <div class="logo" >
            <h3 style="margin: 0px;margin-top: 5px;">Administrator Department</h3>
        </div>
        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>
    <!-- start: search & user box -->
    <div class="header-right">
        <span class="separator"></span>

        <?php
        $wh['admin_id'] = $this->session->userdata('admin');
        $record = $this->md->my_select('tbl_admin_login','*',$wh);
        $path= $record[0]->profile_pic;
        ?>
        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="<?php echo base_url().$path; ?>" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/%21logged-user.jpg" />
                </figure>
                <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                    <span class="name">Admin Panel</span>
                    
                    <span class="role"><i class="fa fa-clock-o"></i> <?php echo date('d-m-Y h:i:s',strtotime($record[0]->last_login));?></span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>admin-setting"><i class="fa fa-cog"></i> Setting</a>
                    </li>
                    
                    <li>
                        <a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>admin-logout"><i class="fa fa-power-off"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>