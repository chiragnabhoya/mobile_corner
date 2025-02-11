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
                        <h2>View All Product</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>seller-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>Product</span></li>
                                <li><span>View All Product</span></li>
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

                            <h2 class="panel-title">View All Product Detail</h2>
                        </header>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
                                <div class="container">
                                    <thead>                                    
                                    <div  class="row">
                                        <tr >
                                            <th style="vertical-align:middle; text-align: center;">No.</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Code</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Name</th>
                                            <th style="vertical-align:middle; text-align: center;">Product</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Price</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Status</th>
                                            
                                        </tr>
                                    </div>
                                    </thead>
                                </div>
                                <tbody>
                                    <?php
                                    $no=0;
                                        foreach ($product as $data)
                                        {
                                            $wh['product_id']= $data->product_id;
                                            $record = $this->md->my_select('tbl_product_image','*',$wh);
                                            $multipath = $record[0]->path;
                                            $path= explode(",", $multipath);
                                              
                                            $no++;
                                        ?>
                                    <div  class="row">
                                        <tr>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $no; ?></td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs"><?php echo $data->code; ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $data->name; ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><img src="<?php echo base_url().$path[0]; ?>" style="height: 100px;" data-toggle="tooltip" title="<?php echo $data->name; ?>" ></td>                                            
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs">
                                                <?php echo $record[0]->price; ?></td>                                            
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs">
                                                <?php
                                                if($data->status == 0)
                                                {
                                                 ?>
                                                <span style="color: red;">Pending / Blocked</span>
                                                <?php
                                                }
                                                else
                                                {
                                                 ?>
                                                <span style="color: green;">Active</span>
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
                                            <a href="" type="button" class="btn btn-danger" data-dismiss="modal">Yes Delete</a>
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
        $this->load->view('seller/footerscript');
        ?>
    </body>

</html>