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
                        <h2>Manage Member</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>Users</span></li>
                                <li><span>Member</span></li>
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

                            <h2 class="panel-title">View All Member</h2>
                        </header>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
                                <div class="container">
                                    <thead>                                    
                                    <div  class="row">
                                        <tr >
                                        <th style="vertical-align:middle; text-align: center;">No.</th>
                                        <th style="vertical-align:middle; text-align: center;">Profile</th>
                                        <th style="vertical-align:middle; text-align: center;">Name</th>
                                        <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Email</th>
                                        <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Status</th>
                                        <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Remove</th>
                                        </tr>
                                    </div>
                                    </thead>
                                </div>
                                <tbody>
                                    <?php
                                        $no=0;
                                        foreach ($member as $data)
                                        {
                                            $no++;
                                        ?>
                                    <div  class="row">
                                        <tr>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $no; ?></td>
                                            <td style="vertical-align:middle; text-align: center;">
                                                <?php
                                                    if(strlen($data->profile_pic) > 0)
                                                    {
                                                    ?>
                                                    <img src="<?php echo base_url().$data->profile_pic; ?>"  class="img-circle" style="width: 30px;" data-toggle="tooltip" title="<?php echo $data->name; ?>"  />
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                    <img src="<?php echo base_url(); ?>member_assets/images/blankuser.jpg"  class="img-circle" style="width: 30px;" data-toggle="tooltip" title="<?php echo $data->name; ?>" />
                                                    <?php
                                                    }
                                                ?>
                                            </td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $data->name; ?></td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs"><?php echo $data->email; ?></td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs">
                                                <?php
                                                if ($data->status==0)
                                                {
                                                ?>
                                                <i id="member<?php echo $data->register_id; ?>" class="fa fa-toggle-off" onclick="change_status('member','<?php echo $data->register_id; ?>')" style="font-size: 17px; cursor: pointer;" data-toggle="tooltip" title="Dactive"></i>
                                                <?php
                                                }
                                                else
                                                {
                                                ?>
                                                <i id="member<?php echo $data->register_id; ?>" class="fa fa-toggle-on" onclick="change_status('member','<?php echo $data->register_id; ?>')" style="font-size: 17px; color:#00baf2; cursor: pointer;" data-toggle="tooltip" title="Active"></i>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td data-toggle="modal" data-target="#myModal" style="vertical-align:middle; text-align: center;" class="center hidden-xs">
                                                <a onclick="$('#delete-link').attr('href','<?php echo base_url(); ?>delete/member/<?php echo $data->register_id; ?>')" data-toggle="tooltip" title="Remove Data" class="fa fa-trash" style="color: red;"></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?> 
                            </table>
                                </tbody>
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog" style="z-index: 9999;">

                                    <!-- Modal content-->
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Confirmation </h4>
                                        </div>
                                        <div class="modal-body" style="margin-top: 10px;">
                                            <p>Are You Sure Want to Delete Member ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal" color: white;margin-left: 10px">Cancel</button>
                                            <a  id="delete-link" type="button" class="btn btn-danger" >Yes Delete</a>
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