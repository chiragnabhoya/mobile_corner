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
                        <h2>Manage Peta Category</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>Category</span></li>
                                <li><span>Peta Category</span></li>
                            </ol>


                        </div>
                    </header>

                    <!-- start: page -->
                <?php 
                    if(isset($editpeta))
                    {
                    ?>
                      <section class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions">
                                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                            </div>

                            <h2 class="panel-title">Edit Peta Category</h2>
                        </header>
                        <form method="POST" action="" name="peta">
                        <div class="panel-body">
                            <div class="col-md-4">
                                <div class="form-group">                                           
                                    <label for="subject">Main Category</label>
                                    <select name="main" onchange="set_combo('sub', this.value)" class="form-control" >
                                        <option value="">Select Main Category</option>
                                        <?php
                                            foreach ($main as $data) {
                                               ?>
                                                <option value="<?php echo $data->category_id; ?>" <?php 
                                                            if (!isset($success)&& set_select('main',$data->category_id))
                                                            {
                                                                echo set_select('main',$data->category_id);
                                                            }
                                                            else {
                                                                if($data->category_id == $sub[0]->parent_id)
                                                                {
                                                                    echo "selected";
                                                                }
                                                                    

                                                            }
                                                ?> ><?php echo $data->name; ?></option>
                                                <?php
                                            }
                                            ?>
                                            }
                                            ?>
                                    </select>
                                    <div class="text-danger ">
                                            <?php
                                            echo form_error('main');
                                            ?>
                                    </div>
                                </div>                                
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">                                           
                                    <label for="subject">Sub Category</label>
                                    <select name="sub" id="sub" class="form-control" >
                                        <option value="">Select Sub Category</option>
                                        <?php
                                                if ($this->input->post('main'))
                                                {
                                                    $wh['parent_id']=$this->input->post('main');
                                                    $record=$this->md->my_select('tbl_category','*',$wh);
                                                    foreach ($record as $data)
                                                    {
                                                    ?>
                                            <option value="<?php $data->category_id; ?>" <?php 
                                                            if (!isset($success)&& set_select('sub',$data->category_id))
                                                            {
                                                                echo set_select('sub',$data->category_id);
                                                            }
                                            ?> ><?php echo $data->name; ?></option>
                                                    <?php
                                                    }

                                                }
                                                else {
                                                    $record=$this->md->my_select('tbl_category','*',array('parent_id'=>$sub[0]->parent_id));
                                                    foreach ($record as $data)
                                                    {
                                                        ?>
                                            <option value="<?php echo $data->category_id ?>" <?php
                                                                if($data->category_id==$editpeta[0]->parent_id)
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
                                            echo form_error('sub');
                                            ?>
                                    </div>
                                </div>                                
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label for="review">Peta Category</label>
                                    <input name="peta" class="form-control" placeholder="Enter Peta Category" value="<?php
                                                   if (!isset($success)&& set_value('peta'))
                                                   {
                                                       echo set_value('peta');
                                                   }else {
                                                        echo $editpeta[0]->name;
                                                    }
                                        ?>">
                                    <div class="text-danger ">
                                            <?php
                                            echo form_error('peta');
                                            ?>
                                    </div>
                                </div>
                                    
                            </div>
                            <div class="row">
                                <div class="col-sm-9 " style="margin-left: 15px; margin-top: 10px;">
                                    <button name="update" value="UPDATE" type="submit"  class="btn button">Update</button>
                                    <button type="reset" id="btn_clear" class="btn btn-default">Clear</button>
                                    <a href="<?php echo base_url('manage-peta-category'); ?>" class="btn btn-default">Cancle</a>
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
                        </div>
                        </form>
                       
                    </section>
                    <?php
                    }
                    else
                    {
            
                ?> 
                      <section class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions">
                                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                            </div>

                            <h2 class="panel-title">Add New Peta Category</h2>
                        </header>
                        <form method="POST" action="" name="peta">
                        <div class="panel-body">
                            <div class="col-md-4">
                                <div class="form-group">                                           
                                    <label for="subject">Main Category</label>
                                    <select name="main" onchange="set_combo('sub', this.value)" class="form-control" >
                                        <option value="">Select Main Category</option>
                                        <?php
                                            foreach ($main as $data) {
                                                ?>
                                                <option value="<?php echo $data->category_id; ?>" <?php 
                                                            if (!isset($success)&& set_select('main',$data->category_id))
                                                            {
                                                                echo set_select('main',$data->category_id);
                                                            }
                                                ?> ><?php echo $data->name; ?></option>
                                                <?php
                                            }
                                            ?>
                                    </select>
                                    <div class="text-danger ">
                                            <?php
                                            echo form_error('main');
                                            ?>
                                    </div>
                                </div>                                
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">                                           
                                    <label for="subject">Sub Category</label>
                                    <select name="sub" id="sub" class="form-control" >
                                        <option value="">Select Sub Category</option>
                                        <?php
                                                if ($this->input->post('main'))
                                                {
                                                    $wh['parent_id']=$this->input->post('main');
                                                    $record = $this->md->my_select('tbl_category','*',$wh);
                                                    foreach ($record as $data)
                                                    {
                                                    ?>
                                            <option value="<?php $data->category_id; ?>" <?php 
                                                            if (!isset($success) && set_select('sub',$data->category_id))
                                                            {
                                                                echo set_select('sub',$data->category_id);
                                                            }
                                            ?> ><?php echo $data->name; ?></option>
                                                    <?php
                                                    }

                                                }
                                            ?>
                                    </select>
                                    <div class="text-danger ">
                                            <?php
                                            echo form_error('sub');
                                            ?>
                                    </div>
                                </div>                                
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label for="review">Peta Category</label>
                                    <input name="peta" class="form-control" placeholder="Enter Peta Category" value="<?php
                                                   if (!isset($success)&& set_value('peta'))
                                                   {
                                                       echo set_value('peta');
                                                   }
                                        ?>">
                                    <div class="text-danger ">
                                            <?php
                                            echo form_error('peta');
                                            ?>
                                    </div>
                                </div>
                                    
                            </div>
                            <div class="row">
                                <div class="col-sm-9 " style="margin-left: 15px; margin-top: 10px;">
                                    <button name="add" value="ADD" type="submit"  class="btn button">Add</button>
                                    <button type="reset" id="btn_clear" class="btn btn-default">Clear</button>
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
                        </div>
                        </form>
                       
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

                            <h2 class="panel-title">View All Peta Category</h2>
                        </header>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
                                <div class="container">
                                    <thead>                                    
                                    <div  class="row">
                                        <tr >
                                            <th style="vertical-align:middle; text-align: center;">No. </th>
                                            <th style="vertical-align:middle; text-align: center;">Main Category</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Sub Category</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Peta Category</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Edit</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Remove</th>
                                        </tr>
                                    </div>
                                    </thead>
                                </div>
                                <tbody>
                                    <?php
                                    $no = 0;
                                     foreach($peta as $data ){
                                         $no++;
                                        ?>
                                    <div  class="row">
                                        <tr>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $no;?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $data->main;?></td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs"><?php echo $data->sub;?></td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs"><?php echo $data->name;?></td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs">
                                                <a href="<?php echo base_url(); ?>edit-peta/<?php echo $data->category_id; ?>">
                                                            <i class="fa fa-pencil" data-toggle="tooltip" title="Edit Data" style="color: grey;"></i>
                                               </a>
                                            </td>
                                            <td data-toggle="modal" data-target="#myModal" style="vertical-align:middle; text-align: center;" class="center hidden-xs">
                                                <a style="cursor:pointer;" onclick="$('#delete-link').attr('href','<?php echo base_url(); ?>delete/peta/<?php echo $data->category_id; ?>')" >
                                                    <i  data-toggle="tooltip" title="Remove Data" class="fa fa-trash" style="color: red;"></i>
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
                                            <p>Are You Sure Want to Delete Peta Category ?</p>
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