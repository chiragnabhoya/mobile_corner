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
                        <h2>View Bills</h2>

                        <div class="right-wrapper pull-right" style="margin-right: 25px;">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>member-dashboard">
                                        <i class="fa fa-home" style="font-size: 16px !important;"></i>
                                    </a>
                                </li>
                                <li><span>View Bills</span></li>
                                
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

                            <h2 class="panel-title">Search Bills</h2>
                        </header>
                        <div class="panel-body">
                            <form action="" method="post" name="add">
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-2">
                                        <div class="form-group">                                           
                                            <select name="billno" onchange="member_viewbill('billno',this.value);" class="form-control input-sm mb-md" >
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
                                            <input type="date" onchange="member_viewbill('date',this.value);"  class="form-control input-sm mb-md" >
                                                
                                        </div>  
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">                                           
                                            <select onchange="member_viewbill('productname',this.value);" class="form-control input-sm mb-md" >
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
                                            <select onchange="member_viewbill('seller',this.value);" class="form-control input-sm mb-md" >
                                                <option value="">Select Seller</option>
                                                <?php
                                                $seller = $this->md->my_select('tbl_seller');
                                                foreach($seller as $data)
                                                {
                                                ?>
                                                <option value="<?php echo $data->seller_id; ?>"><?php echo $data->company_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">                                           
                                            <select onchange="member_viewbill('pay_type',this.value);" class="form-control input-sm mb-md" >
                                                <option value="">Payment Type</option>
                                                <option value="cod">Cash On Delivery</option>
                                                <option value="card">Card</option>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">                                           
                                            <select onchange="member_viewbill('promocode',this.value);" class="form-control input-sm mb-md" >
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
        $this->load->view('member/footerscript');
        ?>
        <script type="text/javascript">
            function member_viewbill(action , id)
            {
                $data = {action:action , id: id};

                var path = 'http://localhost/mobile_corner/Backend/member_viewbill/';

                $.post(path, $data, function (output) {
                    $('#search_bill').html(output);
                });
            }
        </script>
    </body>

</html>