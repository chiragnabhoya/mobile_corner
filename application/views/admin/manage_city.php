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
                        <h2>Manage City</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>Location</span></li>
                                <li><span>City</span></li>
                            </ol>


                        </div>
                    </header>

                    <!-- start: page -->
                    <?php
                    if(isset($editcity))
                    {
                    ?>
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions">
                                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                            </div>

                            <h2 class="panel-title">Edit City</h2>
                        </header>
                        <div class="panel-body">
                            <form action="" method="post" name="add">
                                <div class="col-md-4">
                                    <div class="form-group">                                           
                                        <label for="subject">Country</label>
                                        <select name="country" onchange="set_combo('state', this.value)" class="form-control" >
                                            <option value="">Select Country</option>
                                            <?php
                                            foreach ($country as $data) {
                                                ?>
                                                <option value="<?php echo $data->location_id; ?>" <?php 
                                                            if (!isset($success)&& set_select('country',$data->location_id))
                                                            {
                                                                echo set_select('country',$data->location_id);
                                                            }
                                                            else {
                                                                if($data->location_id==$state[0]->parent_id)
                                                                {
                                                                    echo "selected";
                                                                }
                                                                    

                                                            }
                                                ?> ><?php echo $data->name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        
                                    </div>  
                                    <div class="text-danger ">
                                            <?php                                            
                                            echo form_error('country');
                                            ?>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">                                           
                                        <label for="subject">State</label>
                                        <select name="state" id="state" class="form-control" >
                                            <option value="">Select State</option>
                                            <?php
                                                if ($this->input->post('country'))
                                                {
                                                    $wh['parent_id']=$this->input->post('country');
                                                    $record=$this->md->my_select('tbl_location','*',$wh);
                                                    foreach ($record as $data)
                                                    {
                                                    ?>
                                            <option value="<?php $data->location_id; ?>" <?php 
                                                            if (!isset($success)&& set_select('state',$data->location_id))
                                                            {
                                                                echo set_select('state',$data->location_id);
                                                            }
                                            ?> ><?php echo $data->name; ?></option>
                                                    <?php
                                                    }

                                                }
                                                else {
                                                    $record=$this->md->my_select('tbl_location','*',array('parent_id'=>$state[0]->parent_id));
                                                    foreach ($record as $data)
                                                    {
                                                        ?>
                                            <option value="<?php echo $data->location_id ?>" <?php
                                                                if($data->location_id==$editcity[0]->parent_id)
                                                                {
                                                                    echo "selected";
                                                                }
                                            ?> ><?php echo $data->name ?></option>
                                                        <?php
                                                    }

                                                }
                                            ?>
                                        </select>
                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('state');
                                            ?>
                                        </div>
                                    </div>                                
                                </div>
                                <div class="col-md-4" >
                                    <div class="form-group">
                                        <label for="review">City</label>
                                        <input name="city" class="form-control" placeholder="Enter City" value="<?php
                                                   if (!isset($success)&& set_value('city'))
                                                   {
                                                       echo set_value('city');
                                                   }
                                                    else {
                                                        echo $editcity[0]->name;
                                                    }
                                        ?>">
                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('city');
                                            ?>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 " style="margin-left: 15px; margin-top: 10px;">
                                        <button name="update" type="submit" value="UPDATE" class="btn button">Update</button>
                                        <button type="reset" id="" class="btn btn-default">Clear</button>
                                        <a href="<?php echo base_url('manage-city'); ?>" class="btn btn-default">Cancle</a>
                                         <?php
                                            if (isset($success)) {
                                                ?>
                                                <br/><br/>
                                                <div class="alert alert-success " role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <strong>Ok !</strong> <?php echo $success; ?>
                                                </div>
                                                <?php
                                            }
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
                                    </div>
                                </div>
                            </form>
                        </div>

                    </section>
                    <?php 
                    }
                    else {
                    ?>
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions">
                                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                            </div>

                            <h2 class="panel-title">Add New City</h2>
                        </header>
                        <div class="panel-body">
                            <form action="" method="post" name="add">
                                <div class="col-md-4">
                                    <div class="form-group">                                           
                                        <label for="subject">Country</label>
                                        <select name="country" onchange="set_combo('state', this.value)" class="form-control" >
                                            <option value="">Select Country</option>
                                            <?php
                                            foreach ($country as $data) {
                                                ?>
                                                <option value="<?php echo $data->location_id; ?>" <?php 
                                                            if (!isset($success)&& set_select('country',$data->location_id))
                                                            {
                                                                echo set_select('country',$data->location_id);
                                                            }
                                                ?> ><?php echo $data->name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        
                                    </div>  
                                    <div class="text-danger ">
                                            <?php                                            
                                            echo form_error('country');
                                            ?>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">                                           
                                        <label for="subject">State</label>
                                        <select name="state" id="state" class="form-control" >
                                            <option value="">Select State</option>
                                            <?php
                                                if ($this->input->post('country'))
                                                {
                                                    $wh['parent_id']=$this->input->post('country');
                                                    $record=$this->md->my_select('tbl_location','*',$wh);
                                                    foreach ($record as $data)
                                                    {
                                                    ?>
                                            <option value="<?php $data->location_id; ?>" <?php 
                                                            if (!isset($success)&& set_select('state',$data->location_id))
                                                            {
                                                                echo set_select('state',$data->location_id);
                                                            }
                                            ?> ><?php echo $data->name; ?></option>
                                                    <?php
                                                    }

                                                }
                                            ?>
                                        </select>
                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('state');
                                            ?>
                                        </div>
                                    </div>                                
                                </div>
                                <div class="col-md-4" >
                                    <div class="form-group">
                                        <label for="review">City</label>
                                        <input name="city" class="form-control" placeholder="Enter City" value="<?php
                                                   if (!isset($success)&& set_value('city'))
                                                   {
                                                       echo set_value('city');
                                                   }
                                        ?>">
                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('city');
                                            ?>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 " style="margin-left: 15px; margin-top: 10px;">
                                        <button name="add" type="submit" value="ADD" class="btn button">Add</button>
                                        <button type="reset" id="" class="btn btn-default">Clear</button>
                                         <?php
                                            if (isset($success)) 
                                            {
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
                                </div>
                            </form>
                        </div>

                    </section>
                    <?php
                    }
                    ?>

                    <section class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions">
                                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                            </div>

                            <h2 class="panel-title">View All City</h2>
                        </header>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
                                
                                    <thead>                                    
                                    
                                        <tr >
                                            <th style="vertical-align:middle; text-align: center;">No. </th>
                                            <th style="vertical-align:middle; text-align: center;">Country</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">State</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">City</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Edit</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Remove</th>
                                        </tr>
                                    
                                    </thead>
                                
                                <tbody>
                                    <?php
                                    $no=0;
                                    foreach ($city as $data) {
                                        $no++;
                                        ?>
                                    
                                        <tr>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $no; ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $data->country; ?></td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs"><?php echo $data->state; ?></td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs"><?php echo $data->name; ?></td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs">
                                                        <a href="<?php echo base_url(); ?>edit-city/<?php echo $data->location_id; ?>">
                                                            <i class="fa fa-pencil" data-toggle="tooltip" title="Edit Data" style="color: grey;"></i>
                                                        </a></td>
                                            <td data-toggle="modal" data-target="#myModal" style="vertical-align:middle; text-align: center;" class="center hidden-xs">
                                                <a onclick="$('#delete-link').attr('href','<?php echo base_url(); ?>delete/city/<?php echo $data->location_id; ?>')" >
                                                    <i data-toggle="tooltip" title="Remove Data" class="fa fa-trash" style="color: red;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                            </table>
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog" style="z-index: 9999;">

                                    <!-- Modal content-->
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Confirmation </h4>
                                        </div>
                                        <div class="modal-body" style="margin-top: 10px;">
                                            <p>Are You Sure Want to Delete City ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal" color: white;margin-left: 10px">Cancel</button>
                                            <a id="delete-link" type="button" class="btn btn-danger" >Yes Delete</a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>


                    </section>


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