<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Checkout - Mobile Corner </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="big-deal">
        <meta name="keywords" content="big-deal">
        <meta name="author" content="big-deal">
        <?php
        $this->load->view('headerlink');
        ?>
    </head>
    <body>
        <!-- loader start -->
        <div class="loader-wrapper">
            <div>
                <img src="<?php echo base_url(); ?>assets/images/loader.gif" alt="loader">
            </div>
        </div>
        <!-- loader end -->

        <!--header start-->
        <?php
        $this->load->view('header');
        ?>
        <!--header end-->

        <!-- breadcrumb start -->
        <div class="breadcrumb-main ">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumb-contain">
                            <div>
                                <h2>Checkout</h2>
                                <ul>
                                    <li><a href="<?php echo base_url('home'); ?>" style="color: #007bff;" >home</a></li>
                                    <li><i class="fa fa-angle-double-right"></i></li>
                                    <li><a>Checkout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb End -->

        <!--section start-->
        <section class="faq-section section-big-py-space bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <form method="post" action="" name="checkout">
                            <div class="accordion theme-accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5  class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <a class="btn" style="background: #00baf2; color: #ffffff; margin-right:10px;">1</a>Billing Confirmation
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="panel-body row">

                                            <?php
                                            $cartdata = $this->md->my_select('tbl_cart', '*', array('register_id' => $this->session->userdata('user')));
                                            $no = 0;
                                            foreach ($cartdata as $item) {
                                                $product = $this->md->my_select('tbl_product', '*', array('product_id' => $item->product_id))[0];
                                                $image = $this->md->my_select('tbl_product_image', '*', array('image_id' => $item->image_id));
                                                $multipath = $image[0]->path;
                                                $path = explode(",", $multipath);
                                                $no++;
                                                ?>
                                                <div class="col-md-4" style=" border-bottom: 0px">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <img style="width:80px; padding:10px;" src="<?php echo base_url() . $path[0]; ?>" alt=""/>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <p style="margin-top:10px; min-height:50px"><?php echo $product->name; ?></p>
                                                            <p style="margin-top:10px;border-bottom:0px;">Qty : <?php echo $item->qty; ?></p>
                                                            <p style="margin-top:10px;">Price : Rs. <?php echo $item->net_price; ?> /-</p>
                                                        </div>

                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>


                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0"><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><a class="btn" style="background: #00baf2; color: #ffffff; margin-right:10px;">2</a>Shopping Information</button></h5></div>
                                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body" id="ship_address">
                                            <div class="panel-body row">
                                                <?php
                                                $address = $this->md->my_select('tbl_shipment', '*', array('register_id' => $this->session->userdata('user')));
                                                foreach ($address as $data) {

                                                    if ($this->session->userdata('shipment_id') == $data->shipment_id) {
                                                        ?>
                                                        <div class="col-md-3" style=" border-bottom: 0px;  margin-top:10px;margin-left:65px;">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <p style="margin-top:10px; min-height:80px"><?php echo $data->address; ?></p>
                                                                    <p style="margin-top:10px;border-bottom:0px;">Type: <?php echo $data->address_type; ?></p>
                                                                    <a  style="margin-top:10px;background:#000; color: white;" class="btn">DELIVER HERE ?</a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="col-md-3" style=" border-bottom: 0px;  margin-top:10px;margin-left:65px;">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <p style="margin-top:10px; min-height:80px"><?php echo $data->address; ?></p>
                                                                    <p style="margin-top:10px;border-bottom:0px;">Type: <?php echo $data->address_type; ?></p>
                                                                    <a onclick="set_address(<?php echo $data->shipment_id ?>)" style="margin-top:10px;background:#00baf2; color: white;" class="btn">DELIVER HERE ?</a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>


                                                    <?php
                                                }
                                                ?>


                                            </div>
                                            <a href="<?php echo base_url(); ?>member-address">
                                                <div style="border: 2px solid #00baf2; text-align: center; margin: 50px; height:50px;">
                                                    <p style="margin-top: 10px; color: #00baf2"> + ADD NEW ADDRESS</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                <a class="btn" style="background: #00baf2; color: #ffffff; margin-right:10px;">3</a>Payment Information
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <b>Select Payment Mode</b>
                                            <br><br>
                                            <label><input type="radio" name="pay_type" value="cod" <?php
                                            if(!isset($success) && set_radio('pay_type','cod'))
                                            {
                                                echo set_radio('pay_type','cod');
                                            }
                                            ?> > Cash On Delivery(COD)</label>
                                            <br>
                                            <label><input type="radio" name="pay_type" value="card" <?php
                                            if(!isset($success) && set_radio('pay_type','card'))
                                            {
                                                echo set_radio('pay_type','card');
                                            }
                                            ?> > Credit/Debit Card</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h5 class="mb-0"><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><a class="btn" style="background: #00baf2; color: #ffffff; margin-right:10px;">4</a>Apply Coupon</button></h5></div>
                                    <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordionExample">
                                        <div class="card-body row">
                                            <div class="col-md-4" style=" border-bottom: 0px">
                                                <div class="row">
                                                    <div style="margin-left:15px;"> 
                                                        <b id="codebtn" style="cursor:pointer;">DO You Have Coupon ?</b>
                                                        <br><br>
                                                        <input class="form-control" id="promocode" name="promocode" type="text" placeholder="Enter Code">
                                                        <div id="code_err" class="text-danger" style="margin-top: 3px;">
                                                        </div>
                                                        <br>
                                                        <input type="button" onclick="set_promocode();" style="margin-top:10px;background:#00baf2; color: white;" class="btn" value="APPLY">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="viewcode" style=" border-bottom: 0px">
                                                <div class="row">
                                                    <b style="margin-left:14px;">Apply Promocode  </b>
                                                    <?php
                                                    $billprice = $this->md->my_query("SELECT SUM(`total_price`) AS sm FROM `tbl_cart` WHERE `register_id` = '" . $this->session->userdata('user') . "'")[0]->sm;
                                                    $where['min_bill_price <='] = $billprice;
                                                    $where['status'] = 1;
                                                    $code = $this->md->my_select('tbl_promocode', '*', $where);
                                                    foreach ($code as $sm) {
                                                        ?>
                                                        <div class="col-md-9" style=" border-bottom: 0px;">

                                                            <p style="margin-top:10px; min-height:50px">Enter code and get RS. <?php echo $sm->amount; ?> /- off On Minimum Bill Price Rs. <?php echo $sm->min_bill_price; ?> /-</p>

                                                        </div>
                                                        <div class="col-md-2" style=" border-bottom: 0px;">
                                                            <a style="margin-top:10px;background:#00baf2; color: white;" class="btn"><?php echo $sm->code; ?></a>

                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                            <div class="col-md-4" id="code_success" style=" border-bottom: 0px">
                                                <?php
                                                if($this->session->userdata('promocode_id'))
                                                {
                                                    $code_detail = $this->md->my_select('tbl_promocode','*',array('promocode_id'=>$this->session->userdata('promocode_id')))[0];
                                                    $amount = $code_detail->amount;

                                                    $pay_price = $billprice - $amount;
                                                ?>
                                                <button type="submit"  name="checkout" value="yes"  style="margin:10px;background:#00baf2; color: white;" class="btn" value="">PAY RS. <?php echo $pay_price; ?> /-SECURELY</button>
                                                <div class="text-success"><?php echo $code_detail->code; ?> is applied successfully and Rs. <?php echo $amount; ?> /- is deduct from Rs. <?php echo $billprice; ?> /-</div>
                                                <?php    
                                                }
                                                else
                                                {
                                                ?>
                                                <button type="submit" name="checkout" value="yes"  style="margin:10px;background:#00baf2; color: white;" class="btn" value="">PAY RS. <?php echo $billprice; ?> /-SECURELY</button>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <?php
                                            $this->session->unset_userdata('shipment_id');
                                            ?>
                                            <div class="col-md-12">
                                                <?php
                                                    if (isset($error)) 
                                                    {
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--Section ends-->


        <!--footer start-->
<?php
$this->load->view('footer');
?>
        <!--footer end-->


        <!-- tap to top -->
        <div class="tap-top">
            <div>
                <i class="fa fa-angle-double-up"></i>
            </div>
        </div>
        <!-- tap to top End -->

        <!-- Add to cart bar -->
        <div id="cart_side" class=" add_to_cart right">
            <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
            <div class="cart-inner">
                <div class="cart_top">
                    <h3>my cart</h3>
                    <div class="close-cart">
                        <a href="javascript:void(0)" onclick="closeCart()">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="cart_media">
                    <ul class="cart_product">
                        <li>
                            <div class="media">
                                <a href="#">
                                    <img alt="" class="mr-3" src="<?php echo base_url(); ?>assets/images/layout-4/product/1.jpg">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        <h4>item name</h4>
                                    </a>
                                    <h4>
                                        <span>1 x $ 299.00</span>
                                    </h4>
                                </div>
                            </div>
                            <div class="close-circle">
                                <a href="#">
                                    <i class="ti-trash" aria-hidden="true"></i>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <a href="#">
                                    <img alt="" class="mr-3" src="<?php echo base_url(); ?>assets/images/layout-4/product/2.jpg">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        <h4>item name</h4>
                                    </a>
                                    <h4>
                                        <span>1 x $ 299.00</span>
                                    </h4>
                                </div>
                            </div>
                            <div class="close-circle">
                                <a href="#">
                                    <i class="ti-trash" aria-hidden="true"></i>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <a href="#"><img alt="" class="mr-3" src="<?php echo base_url(); ?>assets/images/layout-4/product/3.jpg"></a>
                                <div class="media-body">
                                    <a href="#">
                                        <h4>item name</h4>
                                    </a>
                                    <h4><span>1 x $ 299.00</span></h4>
                                </div>
                            </div>
                            <div class="close-circle">
                                <a href="#">
                                    <i class="ti-trash" aria-hidden="true"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <ul class="cart_total">
                        <li>
                            <div class="total">
                                <h5>subtotal : <span>$299.00</span></h5>
                            </div>
                        </li>
                        <li>
                            <div class="buttons">
                                <a href="cart.html" class="btn btn-normal btn-xs view-cart">view cart</a>
                                <a href="#" class="btn btn-normal btn-xs checkout">checkout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Add to cart bar end-->

        <!-- My account bar start-->
        <div id="myAccount" class="add_to_cart right account-bar">
            <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
            <div class="cart-inner">
                <div class="cart_top">
                    <h3>my account</h3>
                    <div class="close-cart">
                        <a href="javascript:void(0)" onclick="closeAccount()">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <form class="theme-form">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Email" required="">
                    </div>
                    <div class="form-group">
                        <label for="review">Password</label>
                        <input type="password" class="form-control" id="review" placeholder="Enter your password" required="">
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-rounded btn-block ">Login</a>
                    </div>
                    <div>
                        <h5 class="forget-class"><a href="forget-pwd.html" class="d-block">forget password?</a></h5>
                        <h6 class="forget-class"><a href="register.html" class="d-block">new to store? Signup now</a></h6>
                    </div>
                </form>
            </div>
        </div>
        <!-- Add to account bar end-->

        <!-- Add to wishlist bar -->
        <?php
         $this->load->view('wish');
       ?>
        <!-- Add to wishlist bar end-->

        <!-- add to  setting bar  start-->
        <div id="mySetting" class="add_to_cart right">
            <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
            <div class="cart-inner">
                <div class="cart_top">
                    <h3>my setting</h3>
                    <div class="close-cart">
                        <a href="javascript:void(0)" onclick="closeSetting()">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="setting-block">
                    <div >
                        <h5>language</h5>
                        <ul>
                            <li><a href="#">english</a></li>
                            <li><a href="#">french</a></li>
                        </ul>
                        <h5>currency</h5>
                        <ul>
                            <li><a href="#">uro</a></li>
                            <li><a href="#">rupees</a></li>
                            <li><a href="#">pound</a></li>
                            <li><a href="#">doller</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add to setting bar end-->

        <!-- latest jquery-->
<?php
$this->load->view('footerscript');
?>
        <script type="text/javascript">
            $(Document).ready(function () {
                $("#viewcode").hide();

                $("#codebtn").click(function () {
                    $("#viewcode").show();
                });
            });
            
            function set_address(id)
            {
                $data = {id: id};

                var path = 'http://localhost/mobile_corner/Backend/set_address/';

                $.post(path, $data, function (output) {
//                    alert(output);
                    $("#ship_address").html(output); 
                });
            }
            
            function set_promocode(id)
            {
                var code = document.getElementById('promocode').value;
                
                if(code == "")
                {
                    $('#code_err').html('Please Enter Coupon Code.');
                }
                else
                {
                    $data = {code: code};

                    var path = 'http://localhost/mobile_corner/Backend/set_promocode/';

                    $.post(path, $data, function (output) {
                        if(output == 2)
                        {
                            $('#code_err').html('Invalid Coupon Code.');
   
                        }
                        else
                        {
//                            alert(output);
                            $("#code_success").html(output); 
                        }
                        
                    });
                }
                
                
            }
        </script>
    </body>

</html>
