<!doctype html>
<html class="fixed">

    <?php
    $this->load->view('admin/headerlink');
    ?>
    <body>
        <section class="body">

            <!-- start: header -->
            <?php
            $this->load->view('admin/header');
            ?>
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                <?php
                $this->load->view('admin/menu');
                ?>
                <!-- end: sidebar -->

                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>Dashboard</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>Dashboard</span></li>
                            </ol>


                        </div>
                    </header>

                    <!-- start: page -->
                    <div class="row">
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>

                                    <h2 class="panel-title">Pages</h2>

                                </header>
                                <div class="panel-body">
                                    <div class="validation-message">
                                        <ul></ul>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section style="" class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fas fa-address-book"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Contact Us</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        $con = count($this->md->my_select('tbl_contact_us'));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $con?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-contact-us" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fas fa-comments-alt"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Feedback</h4>
                                                                <div class="info">
                                                                    <?php
                                                                        $feed = count($this->md->my_select('tbl_feedback'));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $feed;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-feedback" style="text-decoration:none;"  class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fas fa-envelope-open-text"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Email Subscriber</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        $emails = count($this->md->my_select('tbl_email_subscriber'));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $emails;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-email-subscriber" style="text-decoration:none;"  class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>


                                    </div>

                                </div>

                            </section>
                        </div>
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>

                                    <h2 class="panel-title">User</h2>

                                </header>
                                <div class="panel-body">
                                    <div class="validation-message">
                                        <ul></ul>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section style="" class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Total Member</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        $member = count($this->md->my_select('tbl_register'));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $member;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-member" style="text-decoration:none;"  class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Active Seller</h4>
                                                                <div class="info">
                                                                   <?php 
                                                                        $whh['status'] = 1;
                                                                        $aseller = count($this->md->my_select('tbl_seller','*',$whh));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $aseller;?></strong>
                                                                
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-seller" style="text-decoration:none;"  class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Pending Seller</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        $whhh['status'] = 0;
                                                                        $dseller = count($this->md->my_select('tbl_seller','*',$whhh));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $dseller;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-seller" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>


                                    </div>

                                </div>

                            </section>
                        </div>
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>

                                    <h2 class="panel-title">Location</h2>

                                </header>
                                <div class="panel-body">
                                    <div class="validation-message">
                                        <ul></ul>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section style="" class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fa fa-map-marker-alt"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Country</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        
                                                                        $country = count($this->md->my_select('tbl_location','*',array('label'=>'country')));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $country;?></strong>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-country" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fa fa-map-marker-alt"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">State</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        
                                                                        $state = count($this->md->my_select('tbl_location','*',array('label'=>'state')));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $state;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-state" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fa fa-map-marker-alt"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">City</h4>
                                                                <div class="info">
                                                                   <?php 
                                                                        
                                                                        $city= count($this->md->my_select('tbl_location','*',array('label'=>'city')));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $city;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-city" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>


                                    </div>

                                </div>

                            </section>
                        </div>
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>

                                    <h2 class="panel-title">Caregory</h2>

                                </header>
                                <div class="panel-body">
                                    <div class="validation-message">
                                        <ul></ul>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section style="" class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fa fa-sitemap"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Main Caregory</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        
                                                                        $main = count($this->md->my_select('tbl_category','*',array('label'=>'maincategory')));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $main;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-main-category" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fa fa-sitemap"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Sub Caregory</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        
                                                                        $sub = count($this->md->my_select('tbl_category','*',array('label'=>'subcategory')));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $sub;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-sub-category" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fa fa-sitemap"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Peta Caregory</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        
                                                                        $peta = count($this->md->my_select('tbl_category','*',array('label'=>'petacategory')));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $peta;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-peta-category" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>


                                    </div>

                                </div>

                            </section>
                        </div>
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>

                                    <h2 class="panel-title">Product</h2>

                                </header>
                                <div class="panel-body">
                                    <div class="validation-message">
                                        <ul></ul>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section style="" class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fa fa-database"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Total Product</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        
                                                                        $product = count($this->md->my_select('tbl_product'));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $product;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-product-detail" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fa fa-database"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Active Product</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        
                                                                        $ap = count($this->md->my_select('tbl_product','*',array('status'=>'1')));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $ap;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-product-detail" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fa fa-database"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Deactive Product</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        
                                                                        $dp = count($this->md->my_select('tbl_product','*',array('status'=>'0')));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $dp;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-product-detail" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section style="" class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fa fa-database"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Total Review</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        
                                                                        $re = count($this->md->my_select('tbl_review'));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $re;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-product-review" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fa fa-database"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Active Review</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        
                                                                        $are = count($this->md->my_select('tbl_review','*',array('status'=>'1')));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $are;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-product-review" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fa fa-database"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Deactive Review</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        
                                                                        $dre = count($this->md->my_select('tbl_review','*',array('status'=>'0')));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $dre;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-product-review" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>


                                    </div>

                                </div>

                            </section>
                        </div>
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>

                                    <h2 class="panel-title">Offer</h2>

                                </header>
                                <div class="panel-body">
                                    <div class="validation-message">
                                        <ul></ul>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section style="" class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fa fa-percentage"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Past Offer</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                           $date = date('Y-m-d');
                                                                           
                                                                        $offer = count($this->md->my_query("SELECT * FROM `tbl_offer` WHERE `end_date` < '".$date."' "));
                                                                        
                                                                    ?>
                                                                    <strong class="amount"><?php echo $offer;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-offer" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fa fa-percentage"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Running Offer</h4>
                                                                <div class="info">
                                                                    <?php
                                                                    $date = date('Y-m-d');
                                                                        $roffer = count($this->md->my_query("SELECT * FROM `tbl_offer` WHERE `start_date` <= '".$date."' AND `end_date` >= '".$date."' "));
                                                                    
                                                                      ?>
                                                                    <strong class="amount"><?php echo $roffer; ?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-offer" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-md-12 col-lg-4 col-xl-6">
                                            <section class="panel panel-featured-left panel-featured-tertiary">
                                                <div class="panel-body">
                                                    <div class="widget-summary">
                                                        <div class="widget-summary-col widget-summary-col-icon">
                                                            <div class="summary-icon bg-tertiary">
                                                                <i class="fa fa-percentage"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Future Offer</h4>
                                                                <div class="info">
                                                                     <?php
                                                                    
                                                                        $foffer = count($this->md->my_query("SELECT * FROM `tbl_offer` WHERE `start_date` > '".$date."' "));
                                                                    
                                                                      ?>
                                                                    <strong class="amount"><?php echo $foffer; ?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>manage-offer" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>


                                    </div>

                                </div>

                            </section>
                        </div>
                    </div>


                    <!-- end: page -->
                </section>
            </div>


        </section>

        <!-- Vendor -->
        <?php
        $this->load->view('admin/footerscript');
        ?>
    </body>

</html>