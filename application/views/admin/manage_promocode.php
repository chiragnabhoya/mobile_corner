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
                        <h2>Manage Promocode</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>Product</span></li>
                                <li><span>Promocode</span></li>
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

                            <h2 class="panel-title">Add New Promocode</h2>
                        </header>
                        <form action="" method="POST" name="promocode">
                        <div class="panel-body">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="review">Promocode</label>
                                    <input class="form-control" name="promocode" placeholder="Enter Promocode" id="exampleFormControlTextarea1" rows="2" style="resize: none" value="<?php
                                                if(!isset($success) && set_value('promocode'))
                                                {
                                                    echo set_value('promocode');
                                                }
                                            ?>">
                                            <div class="text-danger ">
                                                   <?php
                                                    echo form_error('promocode');
                                                    ?>
                                            </div>
                                </div>                            
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="review">Amount</label>
                                    <input class="form-control" name="amount" placeholder="Enter Amount" id="exampleFormControlTextarea1" rows="2" style="resize: none" value="<?php
                                                if(!isset($success) && set_value('amount'))
                                                {
                                                    echo set_value('amount');
                                                }
                                            ?>">
                                            <div class="text-danger ">
                                                   <?php
                                                    echo form_error('amount');
                                                    ?>
                                            </div>
                                </div>                           
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label for="review">Minimum Bill Price</label>
                                    <input class="form-control" name="mbp" placeholder="Enter Minimum Bill Price" id="exampleFormControlTextarea1" rows="2" style="resize: none" value="<?php
                                                if(!isset($success) && set_value('mbp'))
                                                {
                                                    echo set_value('mbp');
                                                }
                                            ?>">
                                            <div class="text-danger ">
                                                   <?php
                                                    echo form_error('mbp');
                                                    ?>
                                            </div>
                                </div>                                
                            </div>
                            <div class="row">
                                <div col-md-12>
                                <div class="col-sm-9 " style="margin-left: 15px; margin-top: 10px;">
                                    <button type="submit" name="add" value="ADD" class="btn button">Add</button>
                                    <button type="reset" id="btn_clear" class="btn btn-default">Clear</button>
                                
                                    <div col-md-6>
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
                        </div>
                        </form>

                    </section>

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
                                <div class="container">
                                    <thead>                                    
                                    <div  class="row">
                                        <tr >
                                            <th style="vertical-align:middle; text-align: center;">No. </th>
                                            <th style="vertical-align:middle; text-align: center;">Promocode</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Amount</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Minimum Bill Price</th>
                                            <th style="vertical-align:middle; text-align: center;" class="hidden-xs">Status</th>
                                        </tr>
                                    </div>
                                    </thead>
                                </div>
                                <tbody>
                                    <?php
                                    $no=0;
                                    foreach ($promocode as $data)
                                        {
                                        $no++;
                                        ?>
                                    <div  class="row">
                                        <tr>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $no;?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo $data->code;?></td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs"><?php echo $data->amount;?></td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs"><?php echo $data->min_bill_price;?></td>
                                            <td style="vertical-align:middle; text-align: center;" class="center hidden-xs"><i class="fa fa-toggle-on" style="font-size: 17px; color:#00baf2;" data-toggle="tooltip" title="Active"></i></td></tr>
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