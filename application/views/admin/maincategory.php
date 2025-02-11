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
                        <h2>Manage Main Category</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>Category</span></li>
                                <li><span> Main Category</span></li>
                            </ol>


                        </div>
                    </header>

                    <!-- start: page -->
                    <div class="row">

                        <div class="col-md-6">
                            <form id="selects-form" action="" method="POST" name="maincategory">
                                <?php
                                    if(isset($editmaincategory))
                                    {
                                ?>
                                    <section class="panel">
                                    <header class="panel-heading">
                                        <div class="panel-actions">
                                            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                            <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                        </div>

                                        <h2 class="panel-title">Edit Main Category</h2>

                                    </header>
                                    <div class="panel-body">
                                        <div class="form-group">                                           
                                            <label for="subject">Main Category</label>
                                            <input type="text" name="maincategory" class="form-control" id="" placeholder="Main Category" value="<?php
                                                if(!isset($success) && set_value('maincategory'))
                                                {
                                                    echo set_value('maincategory');
                                                }
                                                else
                                                {
                                                     echo $editmaincategory[0]->name;
                                                }
                                            ?>">
                                            <div class="text-danger ">
                                                   <?php
                                                    echo form_error('maincategory');
                                                    ?>
                                            </div>
                                               
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-9 ">
                                                <button type="submit" value="EDIT" name="edit" class="btn button">Edit</button>
                                                <button type="reset" class="btn btn-default">Clear</button>
                                                <a href="<?php echo base_url('manage-main-category');?>" class="btn btn-default">Cancel</a>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($success)) {
                                            ?>
                                                <br/><br/>
                                                <div class="alert alert-success alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <strong>Ok !</strong> <?php echo $success;?>
                                                </div>
                                                <?php
                                                    }
                                                if(isset($error))
                                                    {
                                                ?>
                                                <br/><br/>
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <strong>Oops !</strong> <?php echo $error;?>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                    </div>

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

                                        <h2 class="panel-title">Add New Main Category</h2>

                                    </header>
                                    <div class="panel-body">
                                        <div class="form-group">                                           
                                            <label for="subject">Main Category</label>
                                            <input type="text" name="maincategory" class="form-control" id="" placeholder="Main Category" value="<?php
                                                if(!isset($success) && set_value('maincategory'))
                                                {
                                                    echo set_value('maincategory');
                                                }
                                            ?>">
                                            <div class="text-danger ">
                                                   <?php
                                                    echo form_error('maincategory');
                                                    ?>
                                            </div>
                                               
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-9 ">
                                                <button type="submit" value="ADD" name="add" class="btn button">Add</button>
                                                <button type="reset" class="btn btn-default">Clear</button>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($success)) {
                                            ?>
                                                <br/><br/>
                                                <div class="alert alert-success alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <strong>Ok !</strong> <?php echo $success;?>
                                                </div>
                                                <?php
                                                    }
                                                if(isset($error))
                                                    {
                                                ?>
                                                <br/><br/>
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <strong>Oops !</strong> <?php echo $error;?>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                    </div>

                                </section>
                                <?php
                                
                                    }
                                ?>

                            </form>
                        </div>

                        <div class="col-md-6">
                            <form id="summary-form" action="http://preview.oklerthemes.com/porto-admin/1.5.4/forms-validation.html" class="form-horizontal">
                                <section class="panel">
                                    <header class="panel-heading">
                                        <div class="panel-actions">
                                            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                            <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                        </div>

                                        <h2 class="panel-title">View All Main Category</h2>

                                    </header>
                                    <div class="panel-body">
                                        <div class="validation-message">
                                            <ul></ul>
                                        </div>
                                        <div class="form-group">

                                            <div class="panel-body">                                                
                                                <table style="margin-top: 0px" class="table table-bordered table-striped mb-none" id="datatable-tabletools"  data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
                                                    <div class="container">
                                                        <thead>                                    
                                                        <div class="row">
                                                            <tr >
                                                                <th style="vertical-align:middle; text-align: center;">No.</th>
                                                                <th style="vertical-align:middle; text-align: center;">Main Category</th>
                                                                <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Edit</th>
                                                                <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Remove</th>
                                                            </tr>
                                                        </div>
                                                        </thead>
                                                    </div>
                                                    <tbody>
                                                        <?php
                                                        $no = 0;
                                                        foreach ($maincategory as $data)
                                                            {
                                                            $no++;
                                                            ?>
                                                        <div  class="row">
                                                            <tr>                                                            
                                                                <td style="vertical-align:middle; text-align: center;"><?php echo $no;?></td>
                                                                <td style="vertical-align:middle; text-align: center;"><?php echo $data->name;?></td>
                                                                <td style="vertical-align:middle; text-align: center;" class="center hidden-xs">
                                                                    <a href="<?php echo base_url();?>edit-main-category/<?php echo $data->category_id;?>" data-toggle="tooltip" title="Edit Data" style="color: grey;" class="fa fa-pencil"></a>
                                                                </td>
                                                                <td data-toggle="modal" data-target="#myModal" style="vertical-align:middle; text-align: center;" class="center hidden-xs">
                                                                        <a onclick="$('#delete-link').attr('href','<?php echo base_url(); ?>delete/maincategory/<?php echo $data->category_id; ?>')">
                                                                            <i data-toggle="tooltip" title="Remove Data" class="fa fa-trash" style="color: red; cursor: pointer;"></i>
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
                                                                <p>Are You Sure Want to Delete Main Category ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal" color: white;margin-left: 10px">Cancel</button>
                                                                <a id="delete-link" class="btn btn-danger" >Yes Delete</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </section>
                            </form>
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