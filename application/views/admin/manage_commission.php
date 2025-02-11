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
                        <h2>Manage Commission</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>

                                <li><span>Product</span></li>
                                <li><span>Commission</span></li>
                            </ol>


                        </div>
                    </header>

                    <!-- start: page -->
                    <div class="row">
                        <div class="col-md-6">
                            <form method="post" action="" name="update">
                                <section class="panel">
                                    <header class="panel-heading">
                                        <div class="panel-actions">
                                            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                            <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                        </div>

                                        <h2 class="panel-title">Set Commission</h2>

                                    </header>
                                    <div class="panel-body" >
                                        <div class="validation-message">
                                            <label for="subject">Update Commission</label>

                                        </div>
                                        
                                            <div class="form-group">
                                                
                                                <div class="col-md-12" style="margin-top: 0px;" >
                                                    
                                                    <input type="text" name="rate" value="<?php echo $rate[0]->rate; ?>" class="form-control">
                                                </div>
                                                <div class="col-md-12" style="margin-top: 15px;" >
                                                    <p>Note that here product rate is increase by following percentage and it is your profit</p>
                                                </div>     
                                                <div class="col-md-12 text-danger">
                                                    <?php
                                                if (form_error('rate')) {
                                                    echo form_error('rate');
                                                }
                                                ?>
                                                </div>
                                            </div>
                                        
                                        <div class="row">
                                            <div class="col-md-1 col-sm-9 ">
                                                <input type="submit" name="update" value="UPDATE" class="btn button">                                                
                                            </div>
                                        </div>

                                    </div>

                                </section>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form id="selects-form" action="http://preview.oklerthemes.com/porto-admin/1.5.4/forms-validation.html">
                                <section class="panel" >
                                    <header class="panel-heading">
                                        <div class="panel-actions">
                                            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                            <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                        </div>

                                        <h2 class="panel-title">View Commission</h2>

                                    </header>
                                    <div class="panel-body" >
                                        <div class="form-group">                                           
                                            <div class="clearfix" style=" text-align: center;">
                                                <h1 style=" padding:60px 0px; margin: 10px 0px; color: #fff; background: #00baf2;">Profit Rate:<?php echo $rate[0]->rate; ?>%</h1>
                                            </div>
                                            
                                        </div>

                                        
                                    </div>

                                </section>

                            </form>
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