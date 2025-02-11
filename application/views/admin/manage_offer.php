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
                        <h2>Manage Offer</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>Procuct</span></li>
                                <li><span>Offer</span></li>
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

                            <h2 class="panel-title">Add New Offer</h2>
                        </header>
                        <div class="panel-body">
                            <form method="post" action="" name="offer">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="review">Offer Name</label>
                                                <input class="form-control" name="name" placeholder="Enter Offer Name" value="<?php 
                                                if(!isset($success) && set_value('name'))
                                                {
                                                    echo set_value('name');
                                                }
                                                ?>" >
                                                <div class="text-danger ">
                                                    <?php
                                                    echo form_error('name');
                                                    ?>
                                                </div>
                                            </div>  <br>                                      
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="review">Rate(%)</label>
                                                <input class="form-control" name="rate" placeholder="Enter Rate" value="<?php 
                                                if(!isset($success) && set_value('rate'))
                                                {
                                                    echo set_value('rate');
                                                }
                                                ?>" > 
                                                <div class="text-danger ">
                                                    <?php
                                                    echo form_error('rate');
                                                    ?>
                                                </div>
                                            </div>   <br>                                     
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="review">Minimum Price</label>
                                                <input class="form-control" name="min_price" placeholder="Enter Minimum Price" value="<?php 
                                                if(!isset($success) && set_value('min_price'))
                                                {
                                                    echo set_value('min_price');
                                                }
                                                ?>" > 
                                                <div class="text-danger ">
                                                    <?php
                                                    echo form_error('min_price');
                                                    ?>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="review">Maximum Price</label>
                                                <input class="form-control" name="max_price" placeholder="Enter Maximum Price" value="<?php 
                                                if(!isset($success) && set_value('max_price'))
                                                {
                                                    echo set_value('max_price');
                                                }
                                                ?>" > 
                                                <div class="text-danger ">
                                                    <?php
                                                    echo form_error('max_price');
                                                    ?>
                                                </div>
                                            </div> <br>                                       
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="review">Start Date</label>
                                                <input type="date" name="start_date" class="form-control" placeholder="Enter Start Date" value="<?php 
                                                if(!isset($success) && set_value('start_date'))
                                                {
                                                    echo set_value('start_date');
                                                }
                                                ?>" >  
                                                <div class="text-danger ">
                                                    <?php
                                                    echo form_error('start_date');
                                                    ?>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="review">End Date</label>
                                                <input type="date" name="end_date" class="form-control" placeholder="Enter End Date" value="<?php 
                                                if(!isset($success) && set_value('end_date'))
                                                {
                                                    echo set_value('end_date');
                                                }
                                                ?>" >  
                                                <div class="text-danger ">
                                                    <?php
                                                    echo form_error('end_date');
                                                    ?>
                                                </div>
                                            </div>  <br>                                      
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6" >
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">                                           
                                                <label for="subject">Main Catagory</label>
                                                <select class="form-control" name="main" onchange="set_combo('sub',this.value)" >
                                                    <option value="">Select Main Catagory</option>
                                                    <?php
                                                    foreach($main as $data)
                                                    {
                                                    ?>
                                                    <option value="<?php echo $data->category_id; ?>" <?php 
                                                    if(!isset($success) && set_select('main',$data->category_id))
                                                    {
                                                        echo set_select('main',$data->category_id);
                                                    }
                                                    ?> ><?php echo $data->name; ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>  <br>                               
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">                                           
                                                <label for="subject">Sub Catagory</label>
                                                <select id="sub" class="form-control" name="sub" onchange="set_combo('peta',this.value)" >
                                                    <option value="">Select Sub Catagory</option>
                                                    <?php
                                                    if($this->input->post('main'))
                                                    {
                                                        $wh['parent_id'] = $this->input->post('main');
                                                        $sub = $this->md->my_select('tbl_category','*',$wh);
                                                        
                                                        foreach ($sub as $data)
                                                        {
                                                        ?>
                                                    <option value="<?php echo $data->category_id; ?>" <?php 
                                                    if(!isset($success) && set_select('sub',$data->category_id))
                                                    {
                                                        echo set_select('sub',$data->category_id);
                                                    }
                                                    ?> ><?php echo $data->name; ?></option>
                                                        <?php
                                                        }
                                                    }
                                                    ?>

                                                </select>
                                            </div>  <br>                               
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group" >                                           
                                                <label for="subject">Peta Catagory</label>
                                                <select id="peta" class="form-control" name="peta" >
                                                    <option value="">Select Peta Catagory</option>
                                                    <?php
                                                    if($this->input->post('sub'))
                                                    {
                                                        $wh['parent_id'] = $this->input->post('sub');
                                                        $peta = $this->md->my_select('tbl_category','*',$wh);
                                                        
                                                        foreach ($peta as $data)
                                                        {
                                                        ?>
                                                    <option value="<?php echo $data->category_id; ?>" <?php 
                                                    if(!isset($success) && set_select('peta',$data->category_id))
                                                    {
                                                        echo set_select('peta',$data->category_id);
                                                    }
                                                    ?> ><?php echo $data->name; ?></option>
                                                        <?php
                                                        }
                                                    }
                                                    ?>

                                                </select>
                                            </div> <br>                                
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 " style="margin-left: 15px; margin-top: 10px;">
                                        <input type="submit" name="add" class="btn button" value="Add">
                                        <input type="reset" id="btn_clear" class="btn btn-default" value="Clear">
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

                            <h2 class="panel-title">View All Offer</h2>
                        </header>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
                                <div class="container">
                                    <thead>                                    
                                    <div  class="row">
                                        <tr >
                                            <th style="vertical-align:middle; text-align: center;">No. </th>
                                            <th style="vertical-align:middle; text-align: center;">Offer Name</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Rate</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Minimum Price</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Maximum Price</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Start Date</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">End Date</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Main Category</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Sub Category</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Peta Category</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Status</th>                           

                                        </tr>
                                    </div>
                                    </thead>
                                </div>
                                <tbody>
                                    <?php
                                    $no=0;
                                    foreach($offer as $data)
                                    {
                                        $no++;
                                        ?>
                                    <div  class="row">
                                        <tr>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $no; ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $data->name; ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $data->rate; ?>%</td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $data->min_price; ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $data->max_price; ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo date('d-m-Y',strtotime($data->start_date)) ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo date('d-m-Y', strtotime($data->end_date)); ?></td>
                                            <td style="vertical-align:middle; text-align: center;">
                                            <?php
                                            if($data->label == "All")
                                            {
                                                echo "All";
                                            }
                                            else if($data->label == "main")
                                            {
                                                $wh['category_id'] = $data->category_id;
                                                $name = $this->md->my_select('tbl_category','*',$wh)[0]->name;
                                                echo $name;
                                            }else if($data->label == "sub")
                                            {
                                                $name = $this->md->my_query("SELECT m.name as main , s.name as sub FROM `tbl_category`as m , `tbl_category` as s where m.`category_id` = s.`parent_id` AND s.`category_id`=".$data->category_id.";")[0]->main;
                                                echo $name;
                                            }
                                            else if($data->label == "peta")
                                            {
                                                $name = $this->md->my_query("SELECT m.name as main , s.name as sub , p.name as peta FROM `tbl_category`as m , `tbl_category` as s , `tbl_category` as p where m.`category_id` = s.`parent_id` AND s.`category_id` = p.`parent_id` AND p.`category_id`=".$data->category_id.";")[0]->main;
                                                echo $name;
                                            }                                            
                                            ?>
                                            </td>
                                            <td style="vertical-align:middle; text-align: center;">
                                                <?php
                                            if($data->label == "All")
                                            {
                                                echo "All";
                                            }
                                            else if($data->label == "main")
                                            {
                                                echo "-";
                                            }else if($data->label == "sub")
                                            {
                                                $name = $this->md->my_query("SELECT m.name as main , s.name as sub FROM `tbl_category`as m , `tbl_category` as s where m.`category_id` = s.`parent_id` AND s.`category_id`=".$data->category_id.";")[0]->sub;
                                                echo $name;
                                            }
                                            else if($data->label == "peta")
                                            {
                                                $name = $this->md->my_query("SELECT m.name as main , s.name as sub , p.name as peta FROM `tbl_category`as m , `tbl_category` as s , `tbl_category` as p where m.`category_id` = s.`parent_id` AND s.`category_id` = p.`parent_id` AND p.`category_id`=".$data->category_id.";")[0]->sub;
                                                echo $name;
                                            }                                            
                                            ?>
                                            </td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs">
                                            <?php
                                            if($data->label == "All")
                                            {
                                                echo "All";
                                            }
                                            else if($data->label == "main")
                                            {
                                                echo "-";
                                            }else if($data->label == "sub")
                                            {
                                                echo "-";
                                            }
                                            else if($data->label == "peta")
                                            {
                                                $name = $this->md->my_query("SELECT m.name as main , s.name as sub , p.name as peta FROM `tbl_category`as m , `tbl_category` as s , `tbl_category` as p where m.`category_id` = s.`parent_id` AND s.`category_id` = p.`parent_id` AND p.`category_id`=".$data->category_id.";")[0]->peta;
                                                echo $name;
                                            }                                            
                                            ?>
                                            </td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs">
                                            <?php 
                                            if($data->status == 1)
                                            {
                                            ?>
                                            <span style="color: green;">Active</span>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <span style="color: red;">Deactive</span>
                                            <?php
                                            }
                                            ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                            </table>

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