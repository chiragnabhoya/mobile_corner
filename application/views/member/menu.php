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
                        <a href="<?php echo base_url(); ?>member-dashboard">
                            <i class="fa fa-home"  aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-active">
                        <a href="<?php echo base_url(); ?>member-profile">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li class="nav-active">
                        <a href="<?php echo base_url(); ?>member-address">
                            <i class="fa fa-map-marker-alt"></i>
                            <span>My Address</span>
                        </a>
                    </li>
                    <li class="nav-active">
                        <a href="<?php echo base_url(); ?>member-wishlist">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                            <span>My Wishes</span>
                        </a>
                    </li>
                    <li class="nav-active">
                        <a href="<?php echo base_url(); ?>member-review">
                            <i class="fa fa-comment" aria-hidden="true"></i>
                            <span>My Review</span>
                        </a>
                    </li>
                    <li class="nav">
                        <a href="<?php echo base_url(); ?>member-view-order">
                            <i class="fa fa-bags-shopping" aria-hidden="true"></i>
                            <span>My Orders</span>
                        </a>
                    </li>
                    <li class="nav">
                        <a href="<?php echo base_url(); ?>member-view-bill">
                            <i class="fa fa-receipt" aria-hidden="true"></i>
                            <span>My Bill</span>
                        </a>
                    </li>
                    <li class="nav">
                        <a href="<?php echo base_url(); ?>home">
                            <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                            <span>Back To Home</span>
                        </a>
                    </li>

                      

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