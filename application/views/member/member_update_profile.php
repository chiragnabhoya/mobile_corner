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
                        <h2>Edit Profile</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>member-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>Edit Profile</span></li>
                            </ol>


                        </div>
                    </header>

                    <!-- start: page -->
                    <div class="row row-custom">
                        <form method="post" action="" name="edit" enctype="multipart/form-data">
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
                                                    <img id="blah" src="<?php echo base_url().$record[0]->profile_pic; ?>" width="100px" style="border: 1px solid grey; border-radius: px;">
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                    <img id="blah" src="<?php echo base_url(); ?>member_assets/images/blankuser.jpg" width="100px" style="border: 1px solid grey; border-radius: px;">
                                                    <?php
                                                    }
                                                     ?>
                                                </div>
                                                <div class="col-md-4" style="">
                                                    <input type="file" name="profile" id="imgInp" class="form-control">
                                                    <input type="submit" name="edit" class="btn btn-primary " style="margin-top: 20px;" value="Save">
                                                    <a href="<?php echo base_url('member-profile'); ?>" class="btn btn-primary " style="margin-top: 20px;">Cancel</a>
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

                                        <div class="panel-body pro-panel-body">    
                                            <table>
                                                <tr>
                                                    <td><p>Name</p><p>:</p></td>
                                                    <td><input type="text" class="form-control" name="name" value="<?php 
                                                    if(!isset($success) && set_value('name'))
                                                    {
                                                        echo set_value('name');
                                                    }
                                                    else
                                                    {
                                                        echo $record[0]->name;
                                                    }
                                                    ?>">                                                    
                                                <div class="text-danger">
                                                    <?php
                                                        echo form_error('name');
                                                    ?>
                                                </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><p>DOB</p><p>:</p></td>
                                                    <td><input type="date" class="form-control" name="birth_date" value="<?php 
                                                    if(!isset($success) && set_value('birth_date'))
                                                    {
                                                        echo set_value('birth_date');
                                                    }
                                                    else
                                                    {
                                                        echo $record[0]->birth_date;
                                                    }
                                                    ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><p>Gender</p><p>:</p></td>
                                                    <td><select class="form-control" name="gender">
                                                            <option value="" >Select Gender</option>
                                                            <option <?php 
                                                            if(!isset($success) && set_select('gender','Male'))
                                                            {
                                                                echo set_select('gender','Male');
                                                            }
                                                            else
                                                            {
                                                                if ($record[0]->gender == "Male" )
                                                                {
                                                                    echo "selected";
                                                                }
                                                            }
                                                            ?> >Male</option>
                                                            <option <?php 
                                                            if(!isset($success) && set_select('gender','Female'))
                                                            {
                                                                echo set_select('gender','Female');
                                                            }
                                                            else
                                                            {
                                                                if ($record[0]->gender == "Female" )
                                                                {
                                                                    echo "selected";
                                                                }
                                                            }
                                                            ?> >Female</option>
                                                        </select>
                                                    </td>
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

                                        <div class="panel-body pro-panel-body">    
                                            <table>
                                                <tr>
                                                    <td><p>Email</p><p>:</p></td>
                                                    <td><input type="text" class="form-control" name="email" value="<?php 
                                                    if(!isset($success) && set_value('email'))
                                                    {
                                                        echo set_value('email');
                                                    }
                                                    else
                                                    {
                                                        echo $record[0]->email;
                                                    }
                                                    ?>">
                                                        <div class="text-danger">
                                                            <?php
                                                                if(isset($email_error))
                                                                {
                                                                    echo $email_error;
                                                                }
                                                            ?>
                                                            
                                                            <?php
                                                                echo form_error('email');
                                                            ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><p>Contact No</p><p>:</p></td>
                                                    <td><input type="text" class="form-control" name="mobile" value="<?php 
                                                    if(!isset($success) && set_value('mobile'))
                                                    {
                                                        echo set_value('mobile');
                                                    }
                                                    else
                                                    {
                                                        echo $record[0]->mobile;
                                                    }
                                                    ?>">
                                                        <div class="text-danger">
                                                            <?php
                                                                echo form_error('mobile');
                                                            ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><p>Join Date</p><p>:</p></td>
                                                    <td><input type="text" class="form-control" readonly="" disabled="" value="<?php 
                                                    
                                                        echo date('d-m-Y', strtotime($record[0]->join_date));                                                    
                                                    
                                                    ?>"></td>
                                                </tr>

                                            </table>

                                        </div>
                                    </div>

                                </div>

                            </section>

                        </div>
                        
                        </form>
                    </div>
                    <!-- end: page -->
                </section>
            </div>


        </section>

        <!-- Vendor -->
        <?php
        $this->load->view('member/footerscript');
        ?>
        <script type="text/javascript">
        function readURL(input) 
        {
            if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
          }

          $("#imgInp").change(function() {
            readURL(this);
          });
        </script>
    </body>

</html>