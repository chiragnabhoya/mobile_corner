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
                        <h2>View Transaction</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>View Transaction</span></li>
                                
                            </ol>


                        </div>
                    </header>

                    <!-- start: page -->
                    <!--search bill-->
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions">
                                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                            </div>

                            <h2 class="panel-title">Search Transaction</h2>
                        </header>
                        <div class="panel-body">
                            <form action="" method="post" name="add">
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-2">
                                        <div class="form-group">                                           
                                            <select name="billno" onchange="admin_transaction('billno',this.value);" class="form-control input-sm mb-md" >
                                                <option value="">Bill No.</option>
                                                <?php
                                                $bill = $this->md->my_select('tbl_bill');
                                                foreach($bill as $data)
                                                {
                                                ?>
                                                <option><?php echo $data->bill_id; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">                                           
                                            <input type="date" onchange="admin_transaction('date',this.value);"  class="form-control input-sm mb-md" >
                                                
                                        </div>  
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">                                           
                                            <select onchange="admin_transaction('productname',this.value);" class="form-control input-sm mb-md" >
                                                <option value="">Select Product</option>
                                                <?php
                                                $product = $this->md->my_select('tbl_product');
                                                foreach($product as $data)
                                                {
                                                ?>
                                                <option value="<?php echo $data->product_id; ?>"><?php echo $data->name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">                                           
                                            <select onchange="admin_transaction('member',this.value);" class="form-control input-sm mb-md" >
                                                <option value="">Select Member</option>
                                                <?php
                                                $member = $this->md->my_select('tbl_register');
                                                foreach($member as $data)
                                                {
                                                ?>
                                                <option value="<?php echo $data->register_id; ?>"><?php echo $data->name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">                                           
                                            <select onchange="admin_transaction('pay_type',this.value);" class="form-control input-sm mb-md" >
                                                <option value="">Payment Type</option>
                                                <option value="cod">Cash On Delivery</option>
                                                <option value="card">Card</option>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">                                           
                                            <select onchange="admin_transaction('promocode',this.value);" class="form-control input-sm mb-md" >
                                                <option value="">Coupon</option>
                                                <?php
                                                $promocode = $this->md->my_select('tbl_promocode');
                                                foreach($promocode as $data)
                                                {
                                                ?>
                                                <option value="<?php echo $data->promocode_id; ?>"><?php echo $data->code; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>  
                                    </div>
                                    
                                </div>
                                
                                
                                <div class="row" style="margin-top: 10px; text-align: center;">
                                    <button class="btn" style="background: #00baf2; color: white; padding: 6px 60px;"><i class="fa fa-search"></i> Search Transaction</button>
                                </div>
                            </form>
                        </div>

                    </section>
                    
                    <!--view bill-->
                    <section class="panel" id="search_bill">
                        


                    </section>


                    <!-- end: page -->
                </section>
            </div>


        </section>

        <!-- Vendor -->
        <?php
        $this->load->view('admin/footerscript');
        ?>
        <script type="text/javascript">
            function admin_transaction(action , id)
            {
                $data = {action:action , id: id};

                var path = 'http://localhost/mobile_corner/Backend/admin_transaction/';

                $.post(path, $data, function (output) {
                    $('#search_bill').html(output);
                });
            }
        </script>
    </body>

</html>