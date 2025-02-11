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
                        <h2>My Profile</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>seller-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>My Profile</span></li>
                            </ol>


                        </div>
                    </header>
                    
                    <?php
                    $wh['seller_id'] = $this->session->userdata('seller');
                    $record =$this->md->my_select('tbl_seller','*',$wh)[0];
                    ?>

                    <!-- start: page -->
                    <div class="row row-custom">
                        
                        <div class="col-md-12 ">
                            
                                <section class="panel">

                                    <div class="panel-body">
                                        <div class="validation-message">
                                            <ul></ul>
                                        </div>
                                        <div class="form-group">
                                            <div class="panel-body">
                                                <div class="col-md-2" >                                                
                                                    <img src="<?php echo base_url().$record->profile_pic; ?>" width="100px" style="border: 1px solid grey; border-radius: px;">
                                                </div>
                                                <div class="col-md-10" style="">
                                                    <h4 style="vertical-align: top; display: relative;"><?php echo $record->company_name; ?></h4>
                                                    <a href="<?php echo base_url('seller-update-profile'); ?>" class="btn btn-primary" style="display: absolute;">Edit Profile</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </section>
                            
                        </div>
                        <div class="col-md-6 ">
                         
                                <section class="panel">
                                    <header class="panel-heading">
                                        <div class="panel-actions">
                                            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                            <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                        </div>

                                        <h2 class="panel-title">Basic Information</h2>

                                    </header>
                                    <div class="panel-body">
                                        <div class="validation-message">
                                            <ul></ul>
                                        </div>
                                        <div class="form-group">

                                            <div class="panel-body profile-panel-body">    
                                                <table>
                                                    <tr>
                                                        <td><p>Company</p><p>:</p></td>
                                                        <td><label><?php echo $record->company_name; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>PAN No</p><p>:</p></td>
                                                        <td><label><?php echo $record->pan_no; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>GST No</p><p>:</p></td>
                                                        <td><label><?php echo $record->gst_no; ?></label></td>
                                                    </tr>
                                                </table>

                                            </div>
                                        </div>

                                    </div>

                                </section>
                          
                        </div>
                        <div class="col-md-6 ">
                           
                                <section class="panel">
                                    <header class="panel-heading">
                                        <div class="panel-actions">
                                            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                            <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                        </div>

                                        <h2 class="panel-title">Cantact Information</h2>

                                    </header>
                                    <div class="panel-body">
                                        <div class="validation-message">
                                            <ul></ul>
                                        </div>
                                        <div class="form-group">

                                            <div class="panel-body profile-panel-body">    
                                                <table>
                                                    <tr>
                                                        <td><p>Email</p><p>:</p></td>
                                                        <td><label><?php echo $record->email; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>Contact No</p><p>:</p></td>
                                                        <td><label><?php echo $record->mobile; ?></label></td>
                                                    </tr>

                                                </table>

                                            </div>
                                        </div>

                                    </div>

                                </section>
                           
                        </div>
                        <div class="col-md-6 ">
                           
                                <section class="panel">
                                    <header class="panel-heading">
                                        <div class="panel-actions">
                                            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                            <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                        </div>

                                        <h2 class="panel-title">Bank Information</h2>

                                    </header>
                                    <div class="panel-body">
                                        <div class="validation-message">
                                            <ul></ul>
                                        </div>
                                        <div class="form-group">

                                            <div class="panel-body profile-panel-body">    
                                                <table>
                                                    <tr>
                                                        <td><p>Bank Banificiry Name</p><p>:</p></td>
                                                        <td><label><?php echo $record->bank_banificial_name; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>Bank Name</p><p>:</p></td>
                                                        <td><label><?php echo $record->bank_name; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>Branch Name</p><p>:</p></td>
                                                        <td><label><?php echo $record->branch_name; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>IFSC Code</p><p>:</p></td>
                                                        <td><label><?php echo $record->ifsc_code; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>Account No</p><p>:</p></td>
                                                        <td><label><?php echo $record->ac_no; ?></label></td>
                                                    </tr>
                                                </table>

                                            </div>
                                        </div>

                                    </div>

                                </section>
                           
                        </div>
                        <div class="col-md-6 ">
                          
                                <section class="panel">
                                    <header class="panel-heading">
                                        <div class="panel-actions">
                                            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                            <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                        </div>

                                        <h2 class="panel-title">Location Information</h2>

                                    </header>
                                    <div class="panel-body">
                                        <div class="validation-message">
                                            <ul></ul>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            $city = $record->location_id;
                                            $data = $this->md->my_query("SELECT ct.`name` AS 'city' ,s.`name` AS 'state' ,c.`name` AS 'country' FROM `tbl_location` AS ct , `tbl_location`AS s , `tbl_location`AS c  WHERE c.`location_id`= s.`parent_id`AND s.`location_id`= ct.`parent_id` AND ct.`location_id` = $city")[0];
                                            ?>
                                            <div class="panel-body profile-panel-body">    
                                                <table>
                                                    <tr>
                                                        <td><p>Country</p><p>:</p></td>
                                                        <td><label><?php echo $data->country; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>State</p><p>:</p></td>
                                                        <td><label><?php echo $data->state; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>City</p><p>:</p></td>
                                                        <td><label><?php echo $data->city; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>Address</p><p>:</p></td>
                                                        <td><label><?php echo $record->address; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>Pin Code</p><p>:</p></td>
                                                        <td><label><?php echo $record->pincode; ?></label></td>
                                                    </tr>
                                                </table>

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