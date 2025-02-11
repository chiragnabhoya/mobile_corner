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
                        <h2>Manage Setting</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>Pages</span></li>
                                <li><span>Setting</span></li>
                            </ol>


                        </div>
                    </header>

                    <!-- start: page -->
                    <div class="row">
                        <div class="col-md-6">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>

                                    <h2 class="panel-title">Change Profile</h2>

                                </header>
                                <div class="panel-body" style="height: 291px;">
                                    <div class="validation-message">
                                        <ul></ul>
                                    </div>
                                    <form method="post" action="" name="changeprofile" enctype="multipart/form-data" >
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <center>
                                                    <?php
                                                    $path=$this->md->my_select('tbl_admin_login','*',array('admin_id'=>$this->session->userdata('admin')))[0]->profile_pic;
                                                    ?>
                                                    <img src="<?php echo base_url().$path; ?>" class="img-circle img-center" id="blah" style="width: 100px; ">        
                                                </center>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="file" name="photo" id="imgInp">                                                
                                            </div>                                            
                                        </div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-sm-9 col-md-offset-3 ">
                                                    <button type="submit" value="Adit Profile" name="btn_profile"class="btn button">Edit Profile</button>
                                                    <button type="reset" class="btn btn-default">Cancel</button>
                                                </div>
                                                <?php
                                                if (isset($photo_err)) {
                                                    ?>
                                                    <br/><br/>
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <strong>Oops !</strong> <?php echo $photo_err; ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                    
                                                <?php
                                                if (isset($success)) {
                                                    ?>
                                                    <br/><br/>
                                                    <div class="alert alert-success alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <strong>Ok !</strong> <?php echo $success; ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </form>


                                </div>

                            </section>

                        </div>
                        <div class="col-md-6">
                            <section class="panel" >
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>

                                    <h2 class="panel-title">Change Password</h2>

                                </header>
                                <div class="panel-body" >
                                    <form method="post" action="" name="changeps">
                                        <div class="form-group">                                           
                                            <div class="clearfix">
                                                <label class="pull-left">Current Password</label>
                                            </div>
                                            <div class="input-group ">

                                                <input name="cps" type="password" id="txt2" class="form-control "  style="border-width: 1px 0px 1px 1px"/>
                                                <span class="input-group-addon" style="background: #fff; ">
                                                    <span class="icon icon-lg" style=" font-size: 17px;">
                                                        <i class="fa fa-toggle-off " id="showpass2" style="margin-right: 10px;"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="clearfix">
                                                <label class="pull-left">New Password</label>
                                            </div>
                                            <div class="input-group ">
                                                <input name="nps" type="password" id="txt3" class="form-control" style="border-width: 1px 0px 1px 1px" />
                                                <span class="input-group-addon" style="background: #fff; height: auto;" >
                                                    <span class="icon icon-lg" style=" font-size: 17px;">
                                                        <i class="fa fa-toggle-off " id="showpass3" style="margin-right: 10px;"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="clearfix">
                                                <label class="pull-left">Confirm Password</label>

                                            </div>
                                            <div class="input-group ">
                                                <input name="cnps" type="password" id="txt4" class="form-control" style="border-width: 1px 0px 1px 1px" />
                                                <span class="input-group-addon" style="background: #fff; ">
                                                    <span class="icon icon-lg" style=" font-size: 17px;">
                                                        <i class="fa fa-toggle-off " id="showpass4" style="margin-right: 10px;"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-9 ">
                                                <button type="submit" name="btn_ps" value="CHANGE" class="btn button">Change</button>
                                                <button type="reset"  value="CLEAR"class="btn btn-default">Clear</button>
                                                <?php
                                                if (isset($error)) {
                                                    ?>
                                                    <br/><br/>
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <strong>Oops !</strong> <?php echo $error; ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                                <?php
                                                if (form_error('nps') || form_error('cnps')) {
                                                    ?>
                                                    <br/><br/>
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <strong>Oops !</strong> <?php echo form_error('nps'); ?>
                                                        <strong>Oops !</strong> <?php echo form_error('cnps'); ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>




                                            </div>
                                        </div>
                                    </form>
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