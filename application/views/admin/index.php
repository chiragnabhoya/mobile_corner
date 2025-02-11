<!doctype html>
<html class="fixed">
    <?php
    $this->load->view('admin/headerlink');
    ?>
    <body>
        <!-- start: page -->
        <section class="body-sign">
            <div class="center-sign" >
                <div style="margin-left: 28%;">
                    <a href="<?php echo base_url(); ?>home" class="logo pull-left">
                        <img src="<?php echo base_url(); ?>admin_assets/images/logo1.png" height="54" alt="Porto Admin" />
                    </a>
                </div>

                <div class="panel panel-sign" style="margin-top: 60px;  ">
                    <div class="panel-body login-border">
                        <form action="" method="post" name="login">
                            <div class="form-group mb-lg">
                                <label>Email</label>
                                <div class="input-group input-group-icon">
                                    <input name="email" type="text" class="form-control input-lg" value="<?php 
                                               if ($this->input->cookie('admin_email'))
                                               {
                                                   echo $this->input->cookie('admin_email');
                                               }
                                    ?>" />

                                </div>
                            </div>
                            <div class="form-group mb-lg">
                                <div class="clearfix">
                                    <label class="pull-left">Password</label>
                                    <a href="<?php echo base_url('admin-forget-password'); ?>" class="pull-right" style="color: #777;">Lost Password?</a>
                                </div>
                                <div class="input-group ">
                                    <input name="ps" type="password" id="txt1" class="form-control input-lg" value="<?php 
                                               if ($this->input->cookie('admin_password'))
                                               {
                                                   echo $this->input->cookie('admin_password');
                                               }
                                    ?>"/>
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg" style=" font-size: 20px;">
                                            <i class="fa fa-toggle-off " id="showpass1" style="margin-right: 10px;"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="checkbox-custom checkbox-default">
                                        <input id="RememberMe" name="svp" value="yes" type="checkbox" <?php 
                                               if ($this->input->cookie('admin_email'))
                                               {
                                                   echo "checked";
                                               }
                                    ?>/>
                                        <label for="RememberMe">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <button type="submit" name="login" value="yes" class="btn button ">Sign In</button>
                                </div>
                                <?php
                                if (isset($error)) 
                                    {
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
                            </div>


                        </form>
                    </div>
                </div>

                <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2021. All Rights Reserved.</p>
            </div>
        </section>
        <!-- end: page -->

        <!-- Vendor -->
       <?php
    $this->load->view('admin/footerscript');
    ?>
    </body>

    
</html>