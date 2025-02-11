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
                        <a href="<?php echo base_url(); ?>admin-dashboard">
                            <i class="fa fa-home"  aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                            <span>Pages</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo base_url(); ?>manage-contact-us">
                                    Contact Us
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>manage-feedback">
                                    Feedback
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>manage-email-subscriber">
                                    Email Subscriber
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>manage-banner">
                                    Banner
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>Users</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo base_url(); ?>manage-member">
                                    Member
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>manage-seller">
                                    Seller
                                </a>
                            </li>                                                                                        										
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                            <span>Location</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo base_url(); ?>manage-country">
                                    Country
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>manage-state">
                                    State
                                </a>
                            </li> 
                            <li>
                                <a href="<?php echo base_url(); ?>manage-city">
                                    City
                                </a>
                            </li>    

                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a >
                            <i class="fa fa-sitemap" aria-hidden="true"></i>
                            <span>Category</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo base_url(); ?>manage-main-category">
                                    Main Category
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>manage-sub-category">
                                    Sub Category
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>manage-peta-category">
                                    Peta Category
                                </a>
                            </li>                                                                                        										
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a >
                            <i class="fa fa-database" aria-hidden="true"></i>
                            <span>Product</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo base_url(); ?>manage-product-detail">
                                    Product Detail
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>manage-product-review">
                                    Procuct Review
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>manage-offer">
                                    Offers
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>manage-promocode">
                                    Promocode
                                </a>
                            </li> 
                            <li>
                                <a href="<?php echo base_url(); ?>manage-commission">
                                    Commission
                                </a>
                            </li> 

                        </ul>
                    </li>
<!--                    <li class="nav">
                        <a href="<?php echo base_url(); ?>manage-profit-rate" >
                            <i class="fas fa-analytics" aria-hidden="true"></i>
                            <span>Profit Rate</span>
                        </a>
                    </li>-->
                    <li class="nav">
                        <a href="<?php echo base_url(); ?>manage-view-bill">
                            <i class="fas fa-receipt"  aria-hidden="true"></i>
                            <span>View Bills</span>
                        </a>
                    </li>
                    <li class="nav">
                        <a href="<?php echo base_url(); ?>manage-view-transaction">
                            <i class="fas fa-file-invoice"  aria-hidden="true"></i>
                            <span>View Transaction</span>
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