<!doctype html>
<html class="fixed">

		<?php
                $this->load->view('member/headerlink');
                ?>
	<body>
		<section class="body">

			<!-- start: header -->
			<?php
    $this->load->view('member/header');
    ?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
                            <?php
                                $this->load->view('member/menu');
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

                                    <h2 class="panel-title">My Dashboard</h2>

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
                                                                <i class="fa fa-heart"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">My Wishes</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        
                                                                     $whish = count($this->md->my_select('tbl_wishlist','*',array('register_id'=>$this->session->userdata('user'))));                                                                    
                                                                     ?>
                                                                    <strong class="amount"><?php echo $whish;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>member-wishlist" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
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
                                                                <i class="fas fa-receipt"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">My Bills</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        
                                                                         $bill = count($this->md->my_select('tbl_bill','*',array('register_id'=>$this->session->userdata('user'))));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $bill;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>member-view-bill" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
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
                                                                <i class="fa fa-bags-shopping"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">My Orders</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                    $rg = $this->session->userdata('user');
                                                                        $bil = count($this->md->my_query("SELECT t.* FROM `tbl_transaction` AS t , `tbl_bill` AS b WHERE b.`bill_id` = t.`bill_id` AND b.`register_id` = '".$rg."' "));
                           
                                                                    ?>
                                                                    <strong class="amount"><?php echo $bil;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>member-view-order" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
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
                                                               <i class="fas fa-cart-arrow-down"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Total Shopping(&#8377;)</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        
                                                                        $shop = $this->md->my_query("SELECT SUM(t.total_price) AS t_price FROM `tbl_transaction` AS t , `tbl_bill` AS b WHERE b.`bill_id` = t.`bill_id` AND b.`register_id` = '".$rg."' ")[0]->t_price;
                                                                    ?>
                                                                    <strong class="amount"><?php echo $shop;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <!--<a class="text-muted text-uppercase">view all</a>-->
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
                                                                <i class="fas fa-tags"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Total Discount(&#8377;)</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        
                                                                        $are = $this->md->my_query("SELECT SUM(t.discount) AS t_dis FROM `tbl_transaction` AS t , `tbl_bill` AS b WHERE b.`bill_id` = t.`bill_id` AND b.`register_id` = '".$rg."' ")[0]->t_dis;
                                                                    ?>
                                                                    <strong class="amount"><?php echo $are;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
<!--                                                                <a class="text-muted text-uppercase">view all</a>-->
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
                                                                <i class="fas fa-percentage"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">Total Coupon(&#8377;)</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        
                                                                        $cop = $this->md->my_query("SELECT SUM(p.amount) AS t_amt FROM `tbl_promocode` AS p , `tbl_bill` AS b WHERE p.`promocode_id` = b.`promocode_id` AND b.`register_id` = '".$rg."' ")[0]->t_amt;
                                                                    ?>
                                                                    <strong class="amount"><?php echo $cop;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
<!--                                                                <a class="text-muted text-uppercase">view</a>-->
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
                                                                <i class="fa fa-map-marker-alt"></i>
                                                            </div>
                                                        </div>
                                                        <div class="widget-summary-col">
                                                            <div class="summary">
                                                                <h4 class="title">My Address</h4>
                                                                <div class="info">
                                                                    <?php 
                                                                        $address = count($this->md->my_select('tbl_shipment','*',array('register_id'=>$this->session->userdata('user'))));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $address?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a href="<?php echo base_url() ;?>member-address" style="text-decoration:none;" class="text-muted text-uppercase">view all</a>
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
    $this->load->view('member/footerscript');
    ?>
	</body>

</html>