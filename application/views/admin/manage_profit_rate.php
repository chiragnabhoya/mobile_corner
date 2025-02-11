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
                        <h2>Manage Profit Rate</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>

                                <li><span>Profit Rate</span></li>
                            </ol>


                        </div>
                    </header>

                    <!-- start: page -->
                    <div class="row">
                        <div class="col-md-6">
                            <form id="summary-form" action="http://preview.oklerthemes.com/porto-admin/1.5.4/forms-validation.html" class="form-horizontal">
                                <section class="panel">
                                    
                                    <div class="panel-body" >
                                        <div class="validation-message">
                                            <h2 class="panel-title">Update Profit Rate</h2>

                                        </div>
                                        <form runat="server">
                                            <div class="form-group">
                                                
                                                <div class="col-md-12" style="margin-top: 15px;" >
                                                    
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="col-md-12" style="margin-top: 15px;" >
                                                    <p>Note that here product rate is increase by following percentage and it is your profit</p>
                                                </div>                                            
                                            </div>
                                        </form>
                                        <div class="row">
                                            <div class="col-sm-9  ">
                                                <button class="btn button">Update</button>
                                                <button class="btn button">Clear</button>                                                
                                                <button type="reset" class="btn btn-default">Cancel</button>
                                            </div>
                                        </div>

                                    </div>

                                </section>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form id="selects-form" action="http://preview.oklerthemes.com/porto-admin/1.5.4/forms-validation.html">
                                <section class="panel" >
                                    
                                    <div class="panel-body" >
                                        <div class="form-group">                                           
                                            <div class="clearfix" style=" text-align: center;">
                                                <h1 style=" padding:74px 0px; margin: 0px 0px; color: #fff; background: #00baf2;">Profit Rate:12%</h1>
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