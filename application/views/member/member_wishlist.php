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
                        <h2>My Wishes</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>My Wishes</span></li>
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

                            <h2 class="panel-title">My Wishes</h2>
                        </header>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
                                <div class="container">
                                    <thead>                                    
                                    <div  class="row">
                                        <tr >
                                        <th style="vertical-align:middle; text-align: center;">No.</th>
                                        <th style="vertical-align:middle; text-align: center;">Product Image</th>                                        
                                        <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Product Name</th>                                        
                                        <th style="vertical-align:middle; text-align: center;" class="hidden-xs">View Detail</th>                                        
                                        <th style="vertical-align:middle; text-align: center;" class="hidden-xs"><a>Remove</a></th>
                                       
                                        </tr>
                                    </div>
                                    </thead>
                                </div>
                                <tbody>
                                    <?php
                                    $wish = $this->md->my_select('tbl_wishlist','*',array('register_id'=>$this->session->userdata('user')));
                                    $no=0;
                                    foreach ($wish as $data) 
                                    {
                                        $name = $this->md->my_select('tbl_product','*',array('product_id'=>$data->product_id))[0]->name;
                                        $multipath = $this->md->my_select('tbl_product_image','*',array('product_id'=>$data->product_id))[0]->path;
                                        $path = explode(",", $multipath);
                                        $no++;
                                        ?>
                                    <div  class="row">
                                        <tr>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $no; ?></td>
                                            
                                            <td style="vertical-align:middle; text-align: center;"><img src="<?php echo base_url().$path[0]; ?>" style="height: 50px;" data-toggle="tooltip" title="" alt="Joseph Doe" class="img-square" data-lock-picture="assets/images/%21logged-user.jpg"></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $name; ?></td>                                            
                                            <td style="vertical-align:middle; text-align: center;"><a href="<?php echo base_url() ?>product-detail/<?php echo $data->product_id; ?>" target="_new">View Detail</a></td>                                            
                                            <td data-toggle="modal" data-target="#myModal" style="vertical-align:middle; text-align: center;" class="center hidden-xs">
                                                <a onclick="$('#delete-link').attr('href','<?php echo base_url() ?>delete/wishlist/<?php echo $data->wish_id; ?>')" data-toggle="tooltip" title="Remove Data" class="fa fa-trash" style="color: red;"></a>
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
                                            <p>Are You Sure Want to Delete Product Detail ?</p>
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
            </div>


        </section>

        <!-- Vendor -->
        <?php
        $this->load->view('member/footerscript');
        ?>
    </body>

</html>