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
                        <h2>Edit Profile</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>seller-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>Edit Profile</span></li>
                            </ol>


                        </div>
                    </header>

                    <!-- start: page -->
                    <div class="row row-custom">
                        <form method="post" action="" name="edit" enctype="multipart/form-data" >
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
                                                    <a href="<?php echo base_url('seller-profile'); ?>" class="btn btn-primary " style="margin-top: 20px;">Cancel</a>
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
                                                    <td><p>Company</p><p>:</p></td>
                                                    <td><input type="text" class="form-control" name="company_name" value="<?php 
                                                    if(!isset($success) && set_value('company_name'))
                                                    {
                                                        echo set_value('company_name');
                                                    }
                                                    else
                                                    {
                                                        echo $record[0]->company_name;
                                                    }
                                                    ?>">
                                                    <div class="text-danger">
                                                        <?php
                                                            echo form_error('company_name');
                                                        ?>
                                                    </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><p>PAN No</p><p>:</p></td>
                                                    <td><input type="text" class="form-control" name="pan_no" value="<?php 
                                                    if(!isset($success) && set_value('pan_no'))
                                                    {
                                                        echo set_value('pan_no');
                                                    }
                                                    else
                                                    {
                                                        echo $record[0]->pan_no;
                                                    }
                                                    ?>">
                                                    <div class="text-danger">
                                                        <?php
                                                            echo form_error('pan_no');
                                                        ?>
                                                    </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><p>GST No</p><p>:</p></td>
                                                    <td><input type="text" class="form-control" name="gst_no" value="<?php 
                                                    if(!isset($success) && set_value('gst_no'))
                                                    {
                                                        echo set_value('gst_no');
                                                    }
                                                    else
                                                    {
                                                        echo $record[0]->gst_no;
                                                    }
                                                    ?>">
                                                    <div class="text-danger">
                                                        <?php
                                                            echo form_error('gst_no');
                                                        ?>
                                                    </div>
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

                                    <h2 class="panel-title">Contact Information</h2>

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

                                            </table>

                                        </div>
                                    </div>

                                </div>

                            </section>

                        </div>
                            <div class="col-md-12"> 
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

                                        <div class="panel-body pro-panel-body">    
                                            <table>
                                                <tr>
                                                    <td><p>Bank Banificiry Name</p><p>:</p></td>
                                                    <td><input type="text" class="form-control" name="bank_banificial_name" value="<?php 
                                                    if(!isset($success) && set_value('bank_banificial_name'))
                                                    {
                                                        echo set_value('bank_banificial_name');
                                                    }
                                                    else
                                                    {
                                                        echo $record[0]->bank_banificial_name;
                                                    }
                                                    ?>">
                                                    <div class="text-danger">
                                                        <?php
                                                            echo form_error('bank_banificial_name');
                                                        ?>
                                                    </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><p>Bank Name</p><p>:</p></td>
                                                    <td><select name="bank_name" class="form-control" >
                                                            <option value="">Select Bank</option>
                                                            <option <?php 
                                                            if(!isset($success) && set_select('bank_name','Male'))
                                                            {
                                                                echo set_select('bank_name','Male');
                                                            }
                                                            else
                                                            {
                                                                if ($record[0]->bank_name == "Male" )
                                                                {
                                                                    echo "selected";
                                                                }
                                                            }
                                                            ?> >State Bank Of India</option>
                                                            
                                                            <option <?php 
                                                            if(!isset($success) && set_select('bank_name','Bank Of India'))
                                                            {
                                                                echo set_select('bank_name','Bank Of India');
                                                            }
                                                            else
                                                            {
                                                                if ($record[0]->bank_name == "Bank Of India" )
                                                                {
                                                                    echo "selected";
                                                                }
                                                            }
                                                            ?> >Bank Of India</option>
                                                            
                                                            <option <?php 
                                                            if(!isset($success) && set_select('bank_name','Male'))
                                                            {
                                                                echo set_select('bank_name','Male');
                                                            }
                                                            else
                                                            {
                                                                if ($record[0]->bank_name == "Male" )
                                                                {
                                                                    echo "selected";
                                                                }
                                                            }
                                                            ?> >State Bank Of India</option>
                                                            
                                                            <option <?php 
                                                            if(!isset($success) && set_select('bank_name','HDFC Bank'))
                                                            {
                                                                echo set_select('bank_name','HDFC Bank');
                                                            }
                                                            else
                                                            {
                                                                if ($record[0]->bank_name == "HDFC Bank" )
                                                                {
                                                                    echo "selected";
                                                                }
                                                            }
                                                            ?> >HDFC Bank</option>
                                                            
                                                            <option <?php 
                                                            if(!isset($success) && set_select('bank_name','Axis Bank'))
                                                            {
                                                                echo set_select('bank_name','Axis Bank');
                                                            }
                                                            else
                                                            {
                                                                if ($record[0]->bank_name == "Axis Bank" )
                                                                {
                                                                    echo "selected";
                                                                }
                                                            }
                                                            ?> >Axis Bank</option>
                                                            
                                                            <option <?php 
                                                            if(!isset($success) && set_select('bank_name','Varachha Bank'))
                                                            {
                                                                echo set_select('bank_name','Varachha Bank');
                                                            }
                                                            else
                                                            {
                                                                if ($record[0]->bank_name == "Varachha Bank" )
                                                                {
                                                                    echo "selected";
                                                                }
                                                            }
                                                            ?> >Varachha Bank</option>
                                                            
                                                        </select>
                                                    <div class="text-danger">
                                                        <?php
                                                            echo form_error('bank_name');
                                                        ?>
                                                    </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><p>Branch Name</p><p>:</p></td>
                                                    <td><input type="text" class="form-control" name="branch_name" value="<?php 
                                                    if(!isset($success) && set_value('branch_name'))
                                                    {
                                                        echo set_value('branch_name');
                                                    }
                                                    else
                                                    {
                                                        echo $record[0]->branch_name;
                                                    }
                                                    ?>">
                                                    <div class="text-danger">
                                                        <?php
                                                            echo form_error('branch_name');
                                                        ?>
                                                    </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><p>IFSC Code</p><p>:</p></td>
                                                    <td><input type="text" class="form-control" name="ifsc_code" value="<?php 
                                                    if(!isset($success) && set_value('name'))
                                                    {
                                                        echo set_value('ifsc_code');
                                                    }
                                                    else
                                                    {
                                                        echo $record[0]->ifsc_code;
                                                    }
                                                    ?>">
                                                    <div class="text-danger">
                                                        <?php
                                                            echo form_error('ifsc_code');
                                                        ?>
                                                    </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><p>Account No</p><p>:</p></td>
                                                    <td><input type="text" class="form-control" name="ac_no" value="<?php 
                                                    if(!isset($success) && set_value('ac_no'))
                                                    {
                                                        echo set_value('ac_no');
                                                    }
                                                    else
                                                    {
                                                        echo $record[0]->ac_no;
                                                    }
                                                    ?>">
                                                    <div class="text-danger">
                                                        <?php
                                                            echo form_error('ac_no');
                                                        ?>
                                                    </div>
                                                    </td>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>

                                </div>

                            </section>

                        </div>
                        <div class="col-md-6">

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

                                        <div class="panel-body pro-panel-body">    
                                            <table>
                                                <?php
                                                $ct = $record[0]->location_id;
                                                $stt = $this->md->my_select('tbl_location','*',array('location_id'=>$ct))[0]->parent_id;
                                                $cntry = $this->md->my_select('tbl_location','*',array('location_id'=>$stt))[0]->parent_id;
                                                ?>
                                                <tr>
                                                    <td><p>Country</p><p>:</p></td>
                                                    <td>
                                                        <select name="country"  class="form-control" >
                                                            <option value="">Select Country</option>
                                                            <?php
                                                            foreach ($country as $data) 
                                                            {
                                                                ?>
                                                                <option value="<?php echo $data->location_id ?>" <?php
                                                                
                                                                    if ($data->location_id == $cntry)
                                                                    {
                                                                        echo "selected";
                                                                    }
                                                                ?> ><?php echo $data->name; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="text-danger">
                                                            <?php
                                                                echo form_error('country');
                                                            ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><p>State</p><p>:</p></td>
                                                    <td><select  class="form-control" name="state" >
                                                            <option value="">Select State</option>
                                                            <?php
                                                            foreach ($state as $data) 
                                                            {
                                                                ?>
                                                            <option value="<?php echo $data->location_id ?>" <?php
                                                                
                                                                    if ($data->location_id == $stt)
                                                                    {
                                                                        echo "selected";
                                                                    }
                                                                ?>  ><?php echo $data->name; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        
                                                        <div class="text-danger">
                                                            <?php
                                                                echo form_error('state');
                                                            ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><p>City</p><p>:</p></td>
                                                    <td><select  class="form-control" name="city" >
                                                            <option value="">Select City</option>
                                                            <?php
                                                            foreach ($city as $data) 
                                                            {
                                                                ?>
                                                            <option value="<?php echo $data->location_id ?>" <?php
                                                                
                                                                    if ($data->location_id == $ct)
                                                                    {
                                                                        echo "selected";
                                                                    }
                                                                ?>  ><?php echo $data->name; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    <div class="text-danger">
                                                        <?php
                                                            echo form_error('city');
                                                        ?>
                                                    </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><p>Address</p><p>:</p></td>
                                                    <td><textarea name="address" class="form-control" style="resize: none;" ><?php 
                                                    if(!isset($success) && set_value('address'))
                                                    {
                                                        echo set_value('address');
                                                    }
                                                    else
                                                    {
                                                        echo $record[0]->address;
                                                    }
                                                    ?></textarea>
                                                    <div class="text-danger">
                                                        <?php
                                                            echo form_error('address');
                                                        ?>
                                                    </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><p>Pin Code</p><p>:</p></td>
                                                    <td><input type="text" class="form-control" name="pincode" value="<?php 
                                                    if(!isset($success) && set_value('pincode'))
                                                    {
                                                        echo set_value('pincode');
                                                    }
                                                    else
                                                    {
                                                        echo $record[0]->pincode;
                                                    }
                                                    ?>">
                                                    <div class="text-danger">
                                                        <?php
                                                            echo form_error('pincode');
                                                        ?>
                                                    </div>
                                                    </td>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>

                                </div>

                            </section>

                        </div>
                            </div>
                        </form>
                    </div>


                    <!-- end: page -->
                </section>
            </div>


        </section>

        <!-- Vendor -->
        <?php
        $this->load->view('seller/footerscript');
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