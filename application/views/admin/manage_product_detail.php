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
                        <h2>Manage Product Detail</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>Product</span></li>
                                <li><span>Product Detail</span></li>
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
                                            <th style="vertical-align:middle; text-align: center;">Product Image</th>                                        
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Seller Name</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Price</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">VIew Detail</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Status</th>
                                        </tr>
                                    </div>
                                    </thead>
                                </div>
                                <tbody>
                                    <?php
                                        $no= 0;
                                        foreach ($product as $data)
                                        {
                                            $no++;
                                        ?>
                                    <div  class="row">
                                        <tr>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $no; ?></td>
                                            <td style="vertical-align:middle; text-align: center;">
                                                <?php
                                                $wh['product_id'] = $data->product_id;
                                                $record = $this->md->my_select('tbl_product_image','*',$wh);
                                                $name = $this->md->my_select('tbl_product','*',$wh);
                                                $multipath = $record[0]->path;
                                                $path = explode(",", $multipath);
                                                
                                                ?>
                                                <img src="<?php echo base_url().$path[0]; ?>" style="height: 50px;" data-toggle="tooltip" title="<?php echo $name[0]->name; ?>"  class="img-square" data-lock-picture="assets/images/%21logged-user.jpg">
                                            </td>
                                            <td style="vertical-align:middle; text-align: center;">
                                                <?php
                                                    $name = $this->md->my_select('tbl_seller','*',array('seller_id'=>$data->seller_id))[0]->company_name;
                                                    echo $name; 
                                                ?>
                                            </td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs">
                                                <?php
                                                    $price = $record[0]->price;
                                                    echo $price;
                                                ?>
                                            </td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs"><a href="<?php echo base_url(); ?>detail" style="color: grey;">View Data</a></td>
                                            <td style="vertical-align:middle; text-align: center;" >
                                                <?php
                                                if ($data->status==0)
                                                {
                                                ?>
                                                <i id="product<?php echo $data->product_id; ?>" class="fa fa-toggle-off" onclick="change_status('product','<?php echo $data->product_id; ?>')" style="font-size: 17px; cursor: pointer;" data-toggle="tooltip" title="Dactive"></i>
                                                <?php
                                                }
                                                else
                                                {
                                                ?>
                                                <i id="product<?php echo $data->product_id; ?>" class="fa fa-toggle-on" onclick="change_status('product','<?php echo $data->product_id; ?>')" style="font-size: 17px; color:#00baf2; cursor: pointer;" data-toggle="tooltip" title="Active"></i>
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
        $this->load->view('admin/footerscript');
        ?>
    </body>

</html>