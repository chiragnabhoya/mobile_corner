<!doctype html>
<html class="fixed">

		<?php
                $this->load->view('seller/headerlink');
                ?>
	<body>
		<section class="body">

			<!-- start: header -->
			<?php
    $this->load->view('seller/header');
    ?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
                            <?php
                                $this->load->view('seller/menu');
                              ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>
					
                                                <div class="right-wrapper pull-right" style="margin-right: 25px;">
							<ol class="breadcrumbs">
								<li>
                                                                    <a href="<?php echo base_url(); ?>seller-dashboard">
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
                                                                        
                                                                        $product = count($this->md->my_select('tbl_product','*',array('seller_id'=>$this->session->userdata('seller'))));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $product;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a class="text-muted text-uppercase">view all</a>
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
                                                                        
                                                                        $ap = count($this->md->my_select('tbl_product','*',array('seller_id'=>$this->session->userdata('seller'),'status'=>'1')));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $ap;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a class="text-muted text-uppercase">view all</a>
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
                                                                        
                                                                        $dp = count($this->md->my_select('tbl_product','*',array('seller_id'=>$this->session->userdata('seller'),'status'=>'0')));
                                                                    ?>
                                                                    <strong class="amount"><?php echo $dp;?></strong>
                                                                </div>
                                                            </div>
                                                            <div class="summary-footer">
                                                                <a class="text-muted text-uppercase">view all</a>
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
    $this->load->view('seller/footerscript');
    ?>
	</body>

</html>