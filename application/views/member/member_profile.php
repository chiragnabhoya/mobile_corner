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
                        <h2>My Profile</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>member-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>My Profile</span></li>
                            </ol>


                        </div>
                    </header>

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
                                                    <?php
                                                    if(strlen($record[0]->profile_pic))
                                                    {
                                                    ?>
                                                      <img src="<?php echo base_url().$record[0]->profile_pic; ?>" width="100px" style="border: 1px solid grey; border-radius: px;">
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                    <img src="<?php echo base_url(); ?>member_assets/images/blankuser.jpg" width="100px" style="border: 1px solid grey; border-radius: px;">
                                                    <?php
                                                    }
                                                    ?>
                                                    
                                                </div>
                                                <div class="col-md-10" style="">
                                                    <h4 style="vertical-align: top; display: relative;"><?php echo $record[0]->name; ?></h4>
                                                    <a href="<?php echo base_url('member-update-profile'); ?>" class="btn btn-primary" style="display: absolute;">Edit Profile</a>
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
                                                        <td><p>Name</p><p>:</p></td>
                                                        <td><label><?php echo $record[0]->name; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>DOB</p><p>:</p></td>
                                                        <?php                                                            
                                                            if($record[0]->birth_date == "0000-00-00")
                                                            {
                                                            ?>
                                                            <td><label>Not Specified</label></td>
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                            ?>
                                                            <td><label><?php echo date('d-m-Y', strtotime($record[0]->birth_date)); ?></label></td>  
                                                            <?php
                                                                
                                                            }
                                                        ?>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td><p>Gender</p><p>:</p></td>
                                                        <?php                                                            
                                                            if(strlen($record[0]->gender) == 0)
                                                            {
                                                            ?>
                                                            <td><label>Not Specified</label></td>
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                            ?>
                                                            <td style="text-transform: capitalize;"><label><?php echo $record[0]->gender; ?></label></td>  
                                                            <?php
                                                                
                                                            }
                                                        ?>
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

                                        <h2 class="panel-title">Contact Information</h2>

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
                                                        <td><label><?php echo $record[0]->email; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>Contact No</p><p>:</p></td>
                                                        <td><label><?php echo $record[0]->mobile; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>Join Date</p><p>:</p></td>
                                                        <td><label><?php echo date('d-m-Y', strtotime($record[0]->join_date)); ?></label></td>
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