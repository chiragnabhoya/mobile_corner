<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            <!--nav-->&nbsp; 
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="nav-active">
                        <a href="<?php echo base_url(); ?>seller-dashboard">
                            <i class="fa fa-home"  aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-active">
                        <a href="<?php echo base_url(); ?>seller-profile">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>My Profile</span>
                        </a>
                        
                    </li>    
                    <?php
                    $wh['seller_id'] = $this->session->userdata('seller');
                    $status = $this->md->my_select('tbl_seller','*',$wh)[0]->status;
                    
                    if ($status==1)
                    { 
                    ?>
                    
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-database" aria-hidden="true"></i>
                            <span>My Product</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo base_url(); ?>seller-add-new-product">                                    
                                    Add New Product
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>seller-view-all-product">
                                    View All Product
                                </a>
                            </li>                            
                        </ul>
                    </li>
                    
                    <?php
                    }
                    ?>

                </ul>
            </nav>


        </div>

        <script>
            // Maintain Scroll Position
            if (typeof localStorage !== 'undefined') {
                if (localStorage.getItem('sidebar-left-position') !== null) {
                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                            sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                    sidebarLeft.scrollTop = initialPosition;
                }
            }
        </script>

    </div>

</aside>