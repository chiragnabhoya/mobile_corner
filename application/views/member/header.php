<header class="header">
    <div class="logo-container">
<!--        <div class="logo" >
            <h3 style="margin: 0px;margin-top: 5px;">Administrator Department</h3>
        </div>-->
        <div class="logo">
            <a href="home"><img style="width: 200px;" src="<?php echo base_url(); ?>assets/images/layout-2/logo/logo1.png" class="img-fluid  " alt="logo"></a>
            <a href="home" style=" padding: 0px;"   > <i class="fa fa-chevron-circle-left"  style="font-size: 18px;"> Back To Home</i> </a>
        </div>
        
        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>
    <!-- start: search & user box -->
    <div class="header-right">
        <span class="separator"></span>

        <?php
        $wh['register_id'] = $this->session->userdata('user');
        $record = $this->md->my_select('tbl_register','*',$wh)[0];              
//        $path= $record[0]->profile_pic;
        ?>
        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <?php
                    if(strlen($record->profile_pic) > 0)
                    {
                    ?>
                    <img src="<?php echo base_url().$record->profile_pic; ?>"  class="img-circle" data-lock-picture="assets/images/%21logged-user.jpg" />
                    <?php
                    }
                    else
                    {
                    ?>
                    <img src="<?php echo base_url(); ?>member_assets/images/blankuser.jpg"  class="img-circle" data-lock-picture="assets/images/%21logged-user.jpg" />
                    <?php
                    }
                    ?>
                    </figure>
                <div class="profile-info">
                    <span class="name"><?php echo $record->name; ?></span>
                    
                    <span class="role"><i class="fa fa-clock-o"></i> <?php echo date('d-m-Y h:i:s',strtotime($record->last_login));?></span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>member-change-password"><i class="fa fa-cog"></i> Setting</a>
                    </li>
                    
                    <li>
                        <a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>member-logout"><i class="fa fa-power-off"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>