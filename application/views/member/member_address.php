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
                        <h2>Manage Address</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>Manage Address</span></li>
                                
                            </ol>


                        </div>
                    </header>

                    <!-- start: page -->
                    
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions">
                                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                            </div>

                            <h2 class="panel-title">My Address</h2>
                        </header>
                        <div class="panel-body">
                            <form action="" method="post" name="add">
                                <div class="col-md-4">
                                    <div class="form-group">                                           
                                        <label for="subject">Country</label>
                                        <label for="subject">Country</label>
                                        <select name="country" onchange="set_combo('state', this.value)" class="form-control" >
                                            <option value="">Select Country</option>
                                            <?php
                                            foreach ($country as $data) 
                                            {
                                                ?>
                                                <option value="<?php echo $data->location_id ?>" <?php
                                                if(!isset($success) &&set_select('country', $data->location_id))
                                                {
                                                        echo set_select('country',$data->location_id);
                                                    
                                                }
                                                        
                                                ?> ><?php echo $data->name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>

                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('country');
                                            ?>
                                        </div>
                                        
                                    </div>  
                                  
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">                                           
                                        <label for="subject">State</label>
                                        <select name="state" id="state" onchange="set_combo('city', this.value)" class="form-control" >
                                            <option value="">Select State</option>
                                            <?php
                                                if($this->input->post('country'))
                                                {
                                                    $wh['parent_id']= $this->input->post('country');
                                                    $state = $this->md->my_select('tbl_location','*',$wh);
                                                    
                                                    foreach($state as $data)
                                                    {
                                                    ?>
                                                    <option value="<?php echo $data->location_id; ?>" <?php
                                                    if(!isset($success) && set_select('state',$data->location_id) )
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
                                        <select name="city" id="city"  class="form-control" >
                                            <option value="">Select City</option>
                                            <?php
                                                if($this->input->post('state'))
                                                {
                                                    $wh['parent_id']= $this->input->post('state');
                                                    $city=$this->md->my_select('tbl_location','*',$wh);
                                                    
                                                    foreach($city as $data)
                                                    {
                                                    ?>
                                                    <option value="<?php echo $data->location_id; ?>" <?php
                                                    if(!isset($success) && set_select('city',$data->location_id))
                                                    {
                                                        echo set_select('city',$data->location_id);
                                                    }
                                                        
                                                    ?> ><?php echo $data->name; ?></option>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                        </select>

                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('city');
                                            ?>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                    <div class="col-md-12">
                                          <br>
                                        <div class="form-group">
                                        <label for="review">Address</label>
                                        <textarea  name="address"class="form-control" style="resize: none;" ><?php
                                                    if(!isset($success) && set_value('address',$this->input->post))
                                                    {
                                                        echo set_value('address',$this->input->post);
                                                    }
                                                        
                                                    ?></textarea>
                                        </div>
                                        <div class="text-danger ">
                                            <?php
                                            echo form_error('address');
                                            ?>
                                        </div>
                                    </div>
                                 <div class="col-md-12">
                                   
                                    <label>Address Type</label>
                                   
                                    
                                    <label><input style="margin-left: 10px;" type="radio" name="gender" value="home" <?php
                                                    if(!isset($success) && set_radio('gender','home'))
                                                    {
                                                        echo set_radio('gender','home');
                                                    }
                                                    ?>> Home</label>
                                   
                                    <label> <input style="margin-left: 10px;" type="radio" name="gender" value="office" <?php
                                                    if(!isset($success) && set_radio('gender','office'))
                                                    {
                                                        echo set_radio('gender','office');
                                                    }
                                                    ?>> Office</label>
                                     <div class="text-danger ">
                                        <?php
                                        echo form_error('gender');
                                        ?>
                                    </div>
                                 </div>
                                        
                                
                                
                                <div class="row">
                                    <div class="col-sm-9 " style="margin-left: 15px; margin-top: 10px;">
                                        <button name="add" type="submit" value="ADD" class="btn button">Add</button>
                                        <button type="reset" id="" class="btn btn-default">Clear</button>
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
                    

                    <section class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions">
                                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                            </div>

                            <h2 class="panel-title">View My Address</h2>
                        </header>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
                                
                                    <thead>                                    
                                    
                                        <tr >
                                            <th style="vertical-align:middle; text-align: center;">No. </th>
                                            <th style="vertical-align:middle; text-align: center;">Country</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">State</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">City</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Address</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Remove</th>
                                        </tr>
                                    
                                    </thead>
                                
                                <tbody>
                                    <?php
                                    $no=0;
                                    foreach ($address as $data) 
                                        {
                                        
                                            $whh['location_id'] = $data->location_id;
                                            $city = $this->md->my_select('tbl_location','*',$whh)[0];
                                            
                                            $where['location_id'] = $city->parent_id;
                                            $state = $this->md->my_select('tbl_location','*',$where)[0];
                                            
                                            $wheree['location_id'] = $state->parent_id;
                                            $country = $this->md->my_select('tbl_location','*',$wheree)[0];
                                            $no++;
                                        ?>
                                    
                                        <tr>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $no; ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $country->name;?></td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs"><?php echo $state->name; ?></td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs"><?php echo  $city->name; ?></td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs"><?php echo $data->address; ?></td>
                                            <td data-toggle="modal" data-target="#myModal" style="vertical-align:middle; text-align: center;" class="center hidden-xs">
                                                <a onclick="$('#delete-link').attr('href','<?php echo base_url(); ?>delete/address/<?php echo $data->shipment_id; ?>')" >
                                                    <i data-toggle="tooltip" title="Remove Data" class="fa fa-trash" style="color: red;cursor:pointer;"></i>
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
        $this->load->view('member/footerscript');
        ?>
    </body>

</html>